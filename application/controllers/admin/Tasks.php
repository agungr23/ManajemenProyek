<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("task_model");
        $this->load->model("email_model");
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
        $this->load->view("admin/task/list", $data);
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
            $this->_sendEmail();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        // $this->load->view("admin/task/new_form");
        $user = $this->user_model->getAll();
        $project = $this->project_model->getAll();
        $task_status = $this->task_status_model->getAll();
        $email = $this->email_model->getAll();
        $data = ['users' => $user, 'tasks_status' => $task_status, 'projects' => $project, 'email' => $email];
        $this->load->view("admin/task/new_form", $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/tasks');
       
        $task = $this->task_model;
        $validation = $this->form_validation;
        $validation->set_rules($task->rules());

        if ($validation->run()) {
            $task->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        // $data["task"] = $task->getById($id);
        // if (!$data["task"]) show_404();
        
        // $this->load->view("admin/task/edit_form", $data);
        $user = $this->user_model->getAll();
        $project = $this->project_model->getAll();
        $task_status = $this->task_status_model->getAll();
        $data = ['users' => $user, 'tasks_status' => $task_status, 'projects' => $project, 'task' => $task->getById($id)];
        
        $this->load->view("admin/task/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->task_model->delete($id)) {
            redirect(site_url('admin/tasks'));
        }
    }

    private function _sendEmail() 
    {
        $config = [
            'protocol' => $this->input->post('protocol'),
            'smtp_host' => $this->input->post('smtp_host'),
            'smtp_user' => $this->input->post('smtp_user'),
            'smtp_pass' => $this->input->post('smtp_pass'),
            'smtp_port' => $this->input->post('smtp_port'),
            'mailtype' => $this->input->post('mailtype'),
            'charset' => $this->input->post('charset'),
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);

        $this->email->from($this->input->post('smtp_user'), $this->input->post('name'));
        $this->email->to($this->input->post('emailsend'));
        $this->email->subject('New Task from Kodegiri');
        $this->email->message('you have a new task. lets check now : <a 
        href="'.base_url().'admin/login">Click Here</a>');
        

        if($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    
}
