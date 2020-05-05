<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Project_status_model extends CI_Model
{
    private $_table = "proj_status";

    public $proj_status_id;
    public $status;


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["proj_status_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->proj_status_id = uniqid();
        $this->status = $post["status"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->proj_status_id = $post["id"];
        $this->status = $post["status"];
        $this->db->update($this->_table, $this, array('proj_status_id' => $post['id']));
    }

    public function delete($id)
    {
		$this->_deleteImage($id);
        return $this->db->delete($this->_table, array("proj_status_id" => $id));
	}
	
	

}
