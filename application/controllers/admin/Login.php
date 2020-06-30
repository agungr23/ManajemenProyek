<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model("user_model");
    //     $this->load->library('form_validation');
    //     $this->load->helper('fungsi');
    //     // $this->output->enable_profiler(TRUE);
    // }

    // public function index()
    // {
    //     if ($this->input->post()) {
    //         if ($this->user_model->doLogin()) redirect(site_url('admin'));
    //     }
    //     $this->load->view("admin/login_page.php");
    // }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('admin/login'));
    }

    // public function test()
    // {
    //     $this->output
    //     ->set_content_type('application/json')
    //     ->set_output(json_encode(array('foo' => 'bar')));
    // }

    public function __construct() {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->view('admin/login_page.php');
    }

    public function index() {
        // $this->load->view("admin/login_page.php");
        $post = $this->input->post(null, TRUE);
        
        if(isset($post['login'])) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->load->model('user_model');
            $query = $this->user_model->login($post);
            $result = $this->db->get('users');
            if($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'user_id' => $row->user_id,
                    'role' => $row->role,
                    'photo' => $row->photo,
                    'last_login'=>date('Y-m-d H:i:s')
                );
                $this->session->set_userdata($params);
                //remember me
                if(!empty($this->input->post("rememberme"))) {
                    setcookie ("loginId", $username);  
                    setcookie ("loginPass", $password);
                  } else {
                    setcookie ("loginId",""); 
                    setcookie ("loginPass","");
                  }    
                echo "<script>
                    alert('selamat, login berhasil');
                    window.location='".site_url('admin')."';
                </script>";
                // $this->db->where('user_id',$result->user_id);
                // $this->db->update('users', array('last_login'=> date('Y-m-d H:i:s')));
                $this->user_model->_updateLastLogin();
                return true;
            } else {
                echo "<script>
                    alert('login gagal, periksa username / password anda');
                    window.location='".site_url('admin/login')."';
                </script>";
            }
        }
        
    }

}
