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
        $data["files"] = $this->task_model->getfile();
        $this->load->view("admin/file", $data);
    }

    function download($id)
	{
		$data = $this->db->get_where('task',['task_id'=>$id])->row();
		force_download('upload/project/'.$data->file,NULL);
    }
    
    function delete($id)
	{
		$data = $this->db->get_where('task',['task_id'=>$id])->row();
        unlink('upload/project/'.$data->file);

        $sql = "UPDATE task SET file='default.zip' WHERE task_id='$id'";
        $this->db->query($sql);
        $this->session->set_flashdata('filedel', '<div class="alert alert-success" role="alert">
                data has been deleted !</div>');
        redirect('admin/file');
	}
}