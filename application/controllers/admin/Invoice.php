<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("user_model");
		$this->load->model("task_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));

	}

	public function index()
	{
		$show = $this->show();
        $showw = $this->showw();
        $data = ['invos' => $show, 'invs' => $showw];
        $this->load->view("admin/invoice", $data);
	}

	public function show() 
	{
		$id = $this->input->get('id');
		
		return $this->db->query('SELECT full_name,phone,email FROM users WHERE role="admin"')->result();
	}

	public function showw() 
	{
		$id = $this->input->get('id');
		
		return $this->db->query('SELECT DISTINCT project.name as np,task.task_name as namatask,task.instruction as namainstruksi,
		task_status.status as namastatus
		FROM project JOIN task JOIN task_status JOIN users 
		ON project.project_id=task.project_id AND task.task_status_id=task_status.task_status_id 
		AND task.user_id=users.user_id WHERE task.task_id="'.$id.'"')->result();
	}
}
