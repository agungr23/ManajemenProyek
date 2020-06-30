<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("email_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["email"] = $this->email_model->getAll();
        $this->load->view("admin/email_company", $data);
    }

    public function add()
    {
        $task_status = $this->task_status_model;
        $validation = $this->form_validation;
        // $validation->set_rules($client->rules());

        // if ($validation->run()) {
        //     $client->save();
        //     $this->session->set_flashdata('success', 'Berhasil disimpan');
        // }

        // $this->load->view("admin/email_company");
    }

    public function edit()
    {
        // if (!isset($id)) redirect('admin/email_company');
       
        $email = $this->email_model;
        $validation = $this->form_validation;
        $validation->set_rules($email->rules());

        if ($validation->run()) {
            $email->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["email"] = $email->getAll();
        // if (!$data["email"]) show_404();
        
        $this->load->view("admin/email_company", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->task_status_model->delete($id)) {
            redirect(site_url('admin/tasks_status'));
        }
    }
}
