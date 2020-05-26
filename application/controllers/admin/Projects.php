<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("project_model");
        $this->load->model("task_model");
        $this->load->model("client_model");
        $this->load->model("project_status_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        // $data1["tasks"] = $this->task_model->getAll();
        $data["projects"] = $this->project_model->getAll();
        $this->load->view("admin/project/list", $data);
        // $this->load->view("admin/project/list_task", $data1);
    }

    public function add()
    {
        $project = $this->project_model;
        $validation = $this->form_validation;
        $validation->set_rules($project->rules());

        if ($validation->run()) {
            $project->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        // $data["clients"] = $this->client_model->getAll();
        $client = $this->client_model->getAll();
        $project_status = $this->project_status_model->getAll();
        $data = ['clients' => $client, 'projects_status' => $project_status];
        $this->load->view("admin/project/new_form", $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/projects');
       
        $project = $this->project_model;
        $validation = $this->form_validation;
        $validation->set_rules($project->rules());

        if ($validation->run()) {
            $project->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        // $data["project"] = $project->getById($id);
        $client = $this->client_model->getAll();
        $project_status = $this->project_status_model->getAll();
        $data = ['clients' => $client, 'projects_status' => $project_status, 'project' => $project->getById($id)];
        if (!$data["project"]) show_404();
        
        $this->load->view("admin/project/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->project_model->delete($id)) {
            redirect(site_url('admin/projects'));
        }
    }
}
