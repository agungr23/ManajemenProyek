<?php

class Fungsi {
    protected $ci;

    public function __construct() {
        $this->ci =& get_instance();
    }

    function user_login() {
        $this->ci->load->model('user_model');
        $user_id = $this->ci->session->userdata('user_id');
        $user_data = $this->ci->user_model->get($user_id)->row();
        return $user_data;
    }

    function namafiletask() {
        $this->ci->load->model('task_model');
        // $user_id = $this->ci->session->userdata('user_id');
        // $user_id = $this->ci->task_model->getById();
        $user_data = $this->ci->task_model->get()->row();
        return $user_data;
    }

    function namafiletaskk() {
        $this->ci->load->model('task_model');
        // $project_id = $this->namafiletask()->task_id;
        $user_data = $this->ci->task_model->gett()->row();
        return $user_data;
    }

    function dashboarduser() {
        $this->ci->load->model('user_model');
        $user_data = $this->ci->user_model->get()->num_rows();
        return $user_data;
    }
    function dashboardtask() {
        $this->ci->load->model('task_model');
        $user_data = $this->ci->task_model->get()->num_rows();
        return $user_data;
    }
    function dashboardproject() {
        $this->ci->load->model('project_model');
        $user_data = $this->ci->project_model->get()->num_rows();
        return $user_data;
    }
    function dashboardclient() {
        $this->ci->load->model('client_model');
        $user_data = $this->ci->client_model->get()->num_rows();
        return $user_data;
    }


} 