<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("user_model");
        $this->load->model("email_model");
		// if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));

	}

	public function index()
	{
        $data["email"] = $this->email_model->getAll();
        $this->load->view("admin/forgot_password", $data);
    }
    
    public function forgotpassword()
    {
        $this->form_validation->set_rules('forgot_email','Email','trim|required|valid_email');
        if($this->form_validation->run() == false) {
            $data["email"] = $this->email_model->getAll();
            $this->load->view("admin/forgot_password", $data);
        } else {
            $email = $this->input->post('forgot_email');
            $sip = $this->db->get_where('users', ['email' => $email])->row_array();

            if($sip) { 
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('ihi', '<div class="alert alert-success" role="alert">
                Please check your email to reset your password !</div>');
                redirect('admin/forgot_password');
                
            } else {
                $this->session->set_flashdata('ihi', '<div class="alert alert-danger" role="alert">
                Email is not registered !</div>');
                redirect('admin/forgot_password');
            }
        }
    }

    private function _sendEmail($token, $type) 
    {
        $config = [
            'protocol' => $this->input->post('protocol'),
            'smtp_host' => $this->input->post('smtp_host'),
            'smtp_user' => $this->input->post('smtp_user'),
            'smtp_pass' => $this->input->post('smtp_pass'),
            'smtp_port' => $this->input->post('smtp_port'),
            'mailtype' => $this->input->post('mailtype'),
            'charset' => $this->input->post('charset'),
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);

        $this->email->from($this->input->post('smtp_user'), $this->input->post('name'));
        $this->email->to($this->input->post('forgot_email'));

        if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a 
            href="'.base_url().'admin/forgot_password/resetpass?email='.$this->input->post('forgot_email')
            .'&token='.urlencode($token).'">Reset Password</a>');
        }

        if($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function resetPass() 
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $sip = $this->db->get_where('users', ['email' => $email])->row_array();

        if($sip) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePass();
            } else {
                $this->session->set_flashdata('ihi', '<div class="alert alert-danger" role="alert">
                Reset password failed ! Wrong token</div>');
                redirect('admin/login');
            }
        } else {
            $this->session->set_flashdata('ihi', '<div class="alert alert-danger" role="alert">
                Reset password failed ! Wrong email</div>');
                redirect('admin/login');
        }
    }

    public function changePass() 
    {
        if(!$this->session->userdata('reset_email')) {
            redirect('admin/login');
        }

        $this->form_validation->set_rules('password1', 'new password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'repeat password', 'required|trim|min_length[3]|matches[password1]');
        
        if($this->form_validation->run() == false) {
            $this->load->view("admin/change_password");
        } else {
            $password = sha1($this->input->post('password1'));
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('users');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('ihi', '<div class="alert alert-success" role="alert">
                Password has been changed! please login</div>');
                redirect('admin/login');
        }
        
    }
}
