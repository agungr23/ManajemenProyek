<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->view('admin/register_page.php');
    }

    public function index()
    {
        $post = $this->input->post(null, TRUE);
        
        if(isset($post['register'])) {
            $this->load->model('user_model');
            $query = $this->user_model->register();
            echo "<script>
                    alert('registration successful');
                    window.location='".site_url('admin/login')."';
                </script>";
        }
    }

    // public function logout()
    // {
    //     $this->session->sess_destroy();
    //     redirect(site_url('admin/login'));
    // }

    // public function test()
    // {
    //     $this->output
    //     ->set_content_type('application/json')
    //     ->set_output(json_encode(array('foo' => 'bar')));
    // }


}
