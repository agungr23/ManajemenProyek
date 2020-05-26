<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class tasks_status extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("task_status_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["tasks_status"] = $this->task_status_model->getAll();
        // $this->load->view("admin/client/list", $data);
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

        // $this->load->view("admin/client/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/tasks_status');
       
        $task_status = $this->task_status_model;
        $validation = $this->form_validation;
        // $validation->set_rules($client->rules());

        // if ($validation->run()) {
        //     $client->update();
        //     $this->session->set_flashdata('success', 'Berhasil disimpan');
        // }

        $data["task_status"] = $task_status->getById($id);
        if (!$data["task_status"]) show_404();
        
        // $this->load->view("admin/client/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->task_status_model->delete($id)) {
            redirect(site_url('admin/tasks_status'));
        }
    }
}
