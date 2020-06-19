<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tasksfu extends CI_Controller
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
        $data["tasks"] = $this->task_model->gettask();
        $this->load->view("admin/task/listfu", $data);
        // $data1["tasks"] = $this->task_model->gettask();
        // $this->load->view("admin/task/listfu", $data1);
    }

    public function add()
    {
        $task = $this->task_model;
        $validation = $this->form_validation;
        $validation->set_rules($task->rules());

        if ($validation->run()) {
            $task->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/task/listfu");
        // $user = $this->user_model->getAll();
        // $project = $this->project_model->getAll();
        // $task_status = $this->task_status_model->getAll();
        // $data = ['users' => $user, 'tasks_status' => $task_status, 'projects' => $project];
        // $this->load->view("admin/task/listfu", $data);
    }

    public function editt($id = null)
    {
        // if (!isset($id)) redirect('admin/tasksfu');
       
        $task = $this->task_model;
        // $validation = $this->form_validation;
        // $validation->set_rules($task->rules());

        // if ($validation->run()) {
        //     $task->update();
        //     $this->session->set_flashdata('success', 'Berhasil disimpan');
        // }
        if ($task->update()) {
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        // $data["tasksfu"] = $task->getById($id);
        // if (!$data["tasksfu"]) show_404();
        
        $data["tasks"] = $this->task_model->gettask();
        
        $this->load->view("admin/task/listfu", $data);
        // $user = $this->user_model->getAll();
        // $project = $this->project_model->getAll();
        // $task_status = $this->task_status_model->getAll();
        // $data = ['users' => $user, 'tasks_status' => $task_status, 'projects' => $project, 'task' => $task->getById($id)];
        
        // $this->load->view("admin/tasksfu", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->task_model->delete($id)) {
            redirect(site_url('admin/tasks'));
        }
    }

    private function uploadFile()
	{
		$config['upload_path']          = './upload/project/';
		$config['allowed_types']        = 'zip|rar';
		$config['file_name']            = $this->fungsi->user_login()->full_name;
		$config['overwrite']			= true;
		$config['max_size']             = 102400; // 100MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}
		
		return "default.zip";
    }

    
}
