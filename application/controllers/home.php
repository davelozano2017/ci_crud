<?php 

defined('BASEPATH') or exit ('Access denied.');

class home extends CI_Controller 
{

	public function index()
	{	
		$data['result'] = $this->model->ShowAllUsers();
		$this->load->view('template/header/header');
		$this->load->view('template/index',$data);
		$this->load->view('template/footer/footer');
	}

}