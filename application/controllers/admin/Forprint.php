<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Forprint extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('rupiah_helper');
		$this->load->model("project_model");
		$this->load->model("client_model");
		$this->load->model("task_model");
		$this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));

	}

	public function index()
	{
        $data["projects"] = $this->project_model->getAll();
        $this->load->view("admin/project_print", $data);
	}

	public function project()
	{
        $data["projects"] = $this->project_model->getAll();
        $this->load->view("admin/project_print", $data);
	}

	public function client()
	{
        $data["clients"] = $this->client_model->getAll();
        $this->load->view("admin/client_print", $data);
	}

	public function task()
	{
        $data["tasks"] = $this->task_model->getAll();
        $this->load->view("admin/task_print", $data);
	}

	public function user()
	{
        $data["users"] = $this->user_model->getAll();
        $this->load->view("admin/user_print", $data);
	}
}
