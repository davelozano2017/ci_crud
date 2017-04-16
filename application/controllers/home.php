<?php 
defined('BASEPATH') or exit ('No direct script allowed.');

class home extends CI_Controller
{

	public function index()
	{
		$data['url'] = base_url().'execute/';
		$data['result'] = $this->model->GetAllUsers();
		$this->load->view('template/header/header');
		$this->load->view('template/home',$data);
		$this->load->view('template/footer/footer');

	}

}