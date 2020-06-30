<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct()
    {
    parent::__construct();
    $this->load->library('form_validation');
		$this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));

	}

	public function index()
	{
        
        $this->load->view("admin/profile");
	}

	public function edit($id = null)
    {
		$user = $this->user_model;
		if ($user->updateprofile()) {
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect (site_url('admin/profile'));
		}
		// $user->updateprofile();
        //     $this->session->set_flashdata('success', 'Berhasil disimpan');
        // if (!isset($id)) redirect('admin/profile');
       
        // $user = $this->user_model;
        // $validation = $this->form_validation;
        // $validation->set_rules($user->rules());

        // if ($validation->run()) {
        //     $user->update();
        //     $this->session->set_flashdata('success', 'Berhasil disimpan');
        // }

        // $data["user"] = $user->getById($id);
        // if (!$data["user"]) show_404();
		
		// $this->load->view("admin/profile", $data);
		
		$this->load->view("admin/profile");
		// redirect (site_url('admin/profile'));
    }

    public function changepassword()
    {
      $data['user'] = $this->db->get_where ('users', ['username' => $this->fungsi->user_login()->username]);
      
      $this->form_validation->set_rules('currentpw', 'current password', 'required|trim');
      $this->form_validation->set_rules('newpw', 'new password', 'required|trim|min_length[3]|matches[repeatpw]');
      $this->form_validation->set_rules('repeatpw', 'repeat password', 'required|trim|min_length[3]|matches[newpw]');
      // $user = $this->user_model;
      // $validation = $this->form_validation;
      // $validation->set_rules($user->rules());
      
      if($this->form_validation->run() == false) {
        $this->load->view("admin/profile", $data);
      } else {
        $current_password = sha1($this->input->post('currentpw'));
        $new_password = sha1($this->input->post('newpw'));
        if($current_password != $this->fungsi->user_login()->password) {
          $this->session->set_flashdata('changepw', '<div class="alert alert-danger" role="alert">
          Wrong current password!</div>');
          redirect('admin/profile');
        } else {
          if($current_password == $new_password) {
            $this->session->set_flashdata('changepw', '<div class="alert alert-danger" role="alert">
            New password cannot be the same as current password!</div>');
            redirect('admin/profile');
          } else {
            //password sudah ok
            // $password_hash = sha1($new_password);

            $this->db->set('password', $new_password);
            $this->db->where('username', $this->fungsi->user_login()->username);
            $this->db->update('users');
            $this->session->set_flashdata('changepw', '<div class="alert alert-success" role="alert">
            Password changed!</div>');
            redirect('admin/profile');
          }
        }
      }
    }
}
