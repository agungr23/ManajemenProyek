<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model
{
    private $_table = "email_company";

    public $email_id;
    public $protocol;
    public $smtp_host;
    public $smtp_user;
    public $smtp_pass;
    public $smtp_port;
    public $mailtype;
    public $charset;

    public function rules()
    {
        return [
            ['field' => 'smtp_user',
            'label' => 'Email',
            'rules' => 'required|valid_email'],

            ['field' => 'smtp_pass',
            'label' => 'Password',
            'rules' => 'required']

        ];
    }


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["email_id" => $id])->row();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->email_id = $post["id"];
        $this->protocol = $post["protocol"];
        $this->smtp_host = $post["smtp_host"];
        $this->smtp_user = $post["smtp_user"];
        $this->smtp_pass = $post["smtp_pass"];
        $this->smtp_port = $post["smtp_port"];
        $this->mailtype = $post["mailtype"];
        $this->charset = $post["charset"];
        $this->db->update($this->_table, $this, array('email_id' => $post['id']));
    }

}
