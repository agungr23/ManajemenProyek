<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model
{
    private $_table = "client";

    public $client_id;
    public $image = "default.jpg";
    public $name; 
    public $address;
    public $industry;
    public $email;

    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'address',
            'label' => 'Address',
            'rules' => 'required'],
            
            ['field' => 'industry',
            'label' => 'Industry',
            'rules' => 'required'],

            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required']

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["client_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->client_id = uniqid();
        $this->image = $this->_uploadImage();
        $this->name = $post["name"];
		$this->address = $post["address"];
        $this->industry = $post["industry"];
        $this->email = $post["email"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->client_id = $post["id"];

        if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
		}

        $this->name = $post["name"];
		$this->address = $post["address"];
        $this->industry = $post["industry"];
        $this->email = $post["email"];
        $this->db->update($this->_table, $this, array('client_id' => $post['id']));
    }

    public function delete($id)
    {
		$this->_deleteImage($id);
        return $this->db->delete($this->_table, array("client_id" => $id));
	}
	
	private function _uploadImage()
	{
		$config['upload_path']          = './upload/client/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $this->client_id;
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
	}

	private function _deleteImage($id)
	{
		$client = $this->getById($id);
		if ($client->image != "default.jpg") {
			$filename = explode(".", $client->image)[0];
			return array_map('unlink', glob(FCPATH."upload/client/$filename.*"));
		}
	}

}
