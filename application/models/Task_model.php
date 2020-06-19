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
    public $file;

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
        $this->file = $this->_uploadFile();
		$this->project_id = $post["project_id"];
        $this->task_status_id = $post["task_status_id"];
        $this->user_id = $post["user_id"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->task_id = $post["id"];
        $this->task_name = $post["task_name"];
        $this->instruction = $post["instruction"];

        if (!empty($_FILES["image"]["name"])) {
            $this->file = $this->_uploadFile();
        } else {
            $this->file = $post["old_image"];
		}

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
    
    private function _uploadFile()
	{
		$config['upload_path']          = './upload/project/';
		$config['allowed_types']        = 'rar|zip';
		$config['file_name']            = $this->task_name.'-'.$this->fungsi->user_login()->full_name;
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
    
    private function _deleteFile($id)
	{
		$task = $this->getById($id);
		if ($task->file != "default.zip") {
			$filename = explode(".", $task->file)[0];
			return array_map('unlink', glob(FCPATH."upload/project/$filename.*"));
		}
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
    
    public function gettask() {
        // $this->db->select('t.*, task_status.*, users.*, project.*');
        // $this->db->from('project p,task_status ts,users u,task t');
        // $this->db->join('project','t.project_id=project.project_id');
        // $this->db->join('task_status','t.task_status_id=task_status.task_status_id');
        // $this->db->join('users','t.user_id=users.user_id');
        // $array = array('user_id' => $this->fungsi->user_login()->user_id);
        // $this->db->where($array);
        // $query = $this->db->get();
        // if($id != null) {
            
        // }

        $sa = $this->fungsi->user_login()->user_id;

        return $this->db->query("SELECT task.task_id as task_id,task.task_name,task.instruction,task_status.status as status,
        project.name as proj_name,users.full_name as person,task.file,task.project_id,task.task_status_id,task.user_id
        FROM task join task_status join users join project on task.project_id=project.project_id 
        AND task.task_status_id=task_status.task_status_id AND task.user_id=users.user_id 
        where users.user_id='$sa'")->result();
    }

    public function namafile() {
        $a = $this->fungsi->user_login()->user_id;
        return $this->db->query("SELECT name FROM project WHERE project_id='$a'")->result();
    }

    public function getnamaproject($id = null)
    {
        // $i = $this->task_id;
        $this->db->select('name');
        $this->db->from('project');
        $this->db->join('task','task.project_id=project.project_id');
        // $this->db->where('task_id', $i);
        if($id != null) {
            $this->db->where('task.task_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('task');
        if($id != null) {
            $this->db->where('task_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function gett($id = null)
    {
        // $id = $this->fungsi->namafiletask()->task_id;
        $this->db->from('project');
        
        if($id != null) {
            $this->db->where('project_id', $this->fungsi->namafiletask()->project_id);
        }
        $query = $this->db->get();
        return $query;
    }



}
