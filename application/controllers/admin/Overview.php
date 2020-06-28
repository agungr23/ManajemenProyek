<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));

	}

	public function index()
	{
		$januari = $this->januari();
		$februari = $this->februari();
		$maret = $this->maret();
		$april = $this->april();
		$mei = $this->mei();
		$juni = $this->juni();
		$juli = $this->juli();
		$agustus = $this->agustus();
		$september = $this->september();
		$oktober = $this->oktober();
		$november = $this->november();
		$desember = $this->desember();
		$maxchart = $this->maxchart();
		$thnow = $this->tahunsekarang();
		$data = ['januari' => $januari, 'februari' => $februari, 'maret' => $maret,
				'april' => $april, 'mei' => $mei, 'juni' => $juni,
				'juli' => $juli, 'agustus' => $agustus, 'september' => $september,
				'oktober' => $oktober, 'november' => $november, 'desember' => $desember,
				'maxchart' => $maxchart, 'thnow' => $thnow];
        $this->load->view("admin/overview", $data);
	}

	public function januari() 
	{
		return $this->db->query("SELECT COUNT(project_id) AS jum from project 
		WHERE year(project_started)=year(now()) AND 
		month(project_started)=01")->result();
	}
	public function februari() 
	{
		return $this->db->query("SELECT COUNT(project_id) AS jum from project 
		WHERE year(project_started)=year(now()) AND 
		month(project_started)=02")->result();
	}
	public function maret() 
	{
		return $this->db->query("SELECT COUNT(project_id) AS jum from project 
		WHERE year(project_started)=year(now()) AND 
		month(project_started)=03")->result();
	}
	public function april() 
	{
		return $this->db->query("SELECT COUNT(project_id) AS jum from project 
		WHERE year(project_started)=year(now()) AND 
		month(project_started)=04")->result();
	}
	public function mei() 
	{
		return $this->db->query("SELECT COUNT(project_id) AS jum from project 
		WHERE year(project_started)=year(now()) AND 
		month(project_started)=05")->result();
	}
	public function juni() 
	{
		return $this->db->query("SELECT COUNT(project_id) AS jum from project 
		WHERE year(project_started)=year(now()) AND 
		month(project_started)=06")->result();
	}
	public function juli() 
	{
		return $this->db->query("SELECT COUNT(project_id) AS jum from project 
		WHERE year(project_started)=year(now()) AND 
		month(project_started)=07")->result();
	}
	public function agustus() 
	{
		return $this->db->query("SELECT COUNT(project_id) AS jum from project 
		WHERE year(project_started)=year(now()) AND 
		month(project_started)=08")->result();
	}
	public function september() 
	{
		return $this->db->query("SELECT COUNT(project_id) AS jum from project 
		WHERE year(project_started)=year(now()) AND 
		month(project_started)=09")->result();
	}
	public function oktober() 
	{
		return $this->db->query("SELECT COUNT(project_id) AS jum from project 
		WHERE year(project_started)=year(now()) AND 
		month(project_started)=10")->result();
	}
	public function november() 
	{
		return $this->db->query("SELECT COUNT(project_id) AS jum from project 
		WHERE year(project_started)=year(now()) AND 
		month(project_started)=11")->result();
	}
	public function desember() 
	{
		return $this->db->query("SELECT COUNT(project_id) AS jum from project 
		WHERE year(project_started)=year(now()) AND 
		month(project_started)=12")->result();
	}
	public function maxchart()
	{
		return $this->db->query("SELECT COUNT(project_id) AS jum from project 
		WHERE year(project_started)=year(now())")->result();
	}
	public function tahunsekarang()
	{
		return $this->db->query("SELECT year(now()) as tahun")->result();
	}
}
