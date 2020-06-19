<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));

	}

	public function index()
	{
        // load view admin/overview.php
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
}
