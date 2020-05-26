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
            $this->load->model('user_model');
            $query = $this->user_model->login($post);
            if($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'user_id' => $row->user_id,
                    'role' => $row->role
                );
                $this->session->set_userdata($params);
                echo "<script>
                    alert('selamat, login berhasil');
                    window.location='".site_url('admin')."';
                </script>";
            } else {
                echo "<script>
                    alert('login gagal, periksa username / password anda');
                    window.location='".site_url('admin')."';
                </script>";
            }
        }
        
    }
}
