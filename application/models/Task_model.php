<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model
{
    private $_table = "task";

    public $task_id;
    public $task_name;
    public $instruction; 
    public $project_id;
    public $task_status_id;
    public $user_id;

    public function rules()
    {
        return [
            ['field' => 'task_name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'instruction',
            'label' => 'Instruction',
            'rules' => 'required']
            
            // ['field' => 'industry',
            // 'label' => 'Industry',
            // 'rules' => 'required'],

            // ['field' => 'email',
            // 'label' => 'Email',
            // 'rules' => 'required']

        ];
    }

    public function getAll()
    {
        // return $this->db->get($this->_table)->result();
        return $this->db->query("SELECT task.task_id as task_id,task.task_name,task.instruction,task_status.status as status,
        project.name as proj_name,users.full_name as person
        FROM task,task_status,users,project WHERE task.project_id=project.project_id 
        AND task.task_status_id=task_status.task_status_id AND task.user_id=users.user_id")->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["task_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->task_id = uniqid();
        $this->task_name = $post["task_name"];
        $this->instruction = $post["instruction"];
		$this->project_id = $post["project_id"];
        $this->task_status_id = $post["task_status_id"];
        $this->user_id = $post["user_id"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->task_id = $post["id"];

        // if (!empty($_FILES["image"]["name"])) {
        //     $this->image = $this->_uploadImage();
        // } else {
        //     $this->image = $post["old_image"];
		// }

        $this->task_name = $post["task_name"];
        $this->instruction = $post["instruction"];
		$this->project_id = $post["project_id"];
        $this->task_status_id = $post["task_status_id"];
        $this->user_id = $post["user_id"];
        $this->db->update($this->_table, $this, array('task_id' => $post['id']));
    }

    public function delete($id)
    {
		// $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("task_id" => $id));
	}
	
	// private function _uploadImage()
	// {
	// 	$config['upload_path']          = './upload/client/';
	// 	$config['allowed_types']        = 'gif|jpg|png';
	// 	$config['file_name']            = $this->client_id;
	// 	$config['overwrite']			= true;
	// 	$config['max_size']             = 1024; // 1MB
	// 	// $config['max_width']            = 1024;
	// 	// $config['max_height']           = 768;

	// 	$this->load->library('upload', $config);

	// 	if ($this->upload->do_upload('image')) {
	// 		return $this->upload->data("file_name");
	// 	}
		
	// 	return "default.jpg";
	// }

	// private function _deleteImage($id)
	// {
	// 	$client = $this->getById($id);
	// 	if ($client->image != "default.jpg") {
	// 		$filename = explode(".", $client->image)[0];
	// 		return array_map('unlink', glob(FCPATH."upload/client/$filename.*"));
	// 	}
    // }
    
    public function getprofile() {
        $this->db->select('project.*, proj_status.status as status_project, client.name as client_name');
        $this->db->from('project','proj_status','client');
        $this->db->join('proj_status','project.proj_status_id=proj_status.proj_status_id');
        $this->db->join('client','project.client_id=client.client_id');
        $query = $this->db->get();
        if($id != null) {
            $this->db->where('project_id',$id);
        }
        return $query;
    }

}
