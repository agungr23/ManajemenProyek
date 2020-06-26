<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("task_model");
        $this->load->model("project_model");
        $this->load->model("task_status_model");
        $this->load->model("user_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["tasks"] = $this->task_model->getAll();
        $this->load->view("admin/file", $data);
        // $data1["tasks"] = $this->task_model->gettask();
        // $this->load->view("admin/task/listfu", $data1);
    }
}