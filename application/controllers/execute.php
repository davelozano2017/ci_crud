<?php 
defined('BASEPATH') or exit ('No direct script allowed.');

class execute extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}


	public function pasa($value)
	{
		return $this->input->post($value);
	}

	public function validate($a,$b,$c)
	{
		return $this->form_validation->set_rules($a,$b,$c);
	}

	public function insert()
	{
		$a = array('lastname','firstname','middlename','username','password','cpassword');
		$b = array('Last Name', 'First Name', 'Middle Name', 'Username', 'Password','Confirm Password');
		$complete = 'trim|required|regex_match[/^([a-zA-Z]|\s)+$/]|xss_clean';
		$tingi = 'trim|required|xss_clean';
		$match = 'trim|required|xss_clean|matches[password]';
		$this->validate($a[0],$b[0],$complete);
		$this->validate($a[1],$b[1],$complete);
		$this->validate($a[2],$b[2],$complete);
		$this->validate($a[3],$b[3],$tingi);
		$this->validate($a[4],$b[4],$tingi);
		$this->validate($a[5],$b[5],$match);
		
		if($this->form_validation->run() == FALSE)
		{
			$data = array('errors' => validation_errors(' <i class="fa fa-remove"></i> '));
			$this->session->set_flashdata($data);
			redirect('home','refresh');
		}
		$data = array(
			$a[0] => $this->pasa($a[0]),
			$a[1] => $this->pasa($a[1]),
			$a[2] => $this->pasa($a[2]),
			$a[3] => $this->pasa($a[3]),
			$a[4] => $this->bcrypt->hash_password($a[4])
			);

		$result = $this->model->CreateUsers($data);
		if($result)
		{
			redirect('home','refresh');
		}
	}

	public function edit($id)
	{
		
		$data['errors'] = $this->session->flashdata('errors');
		$id = $this->uri->segment(3);
		$data['result'] = $this->model->GetId($id);
		$this->load->view('template/header/header');
		$this->load->view('template/edit',$data);
		$this->load->view('template/footer/footer');

	}


	public function update($id)
	{

		$a = array('lastname','firstname','middlename','username');
		$b = array('Last Name', 'First Name', 'Middle Name', 'Username');
		$complete = 'trim|required|regex_match[/^([a-zA-Z]|\s)+$/]|xss_clean';
		$complete = 'trim|required|regex_match[/^([a-zA-Z]|\s)+$/]|xss_clean';
		$tingi = 'trim|required|xss_clean';
		$this->validate($a[0],$b[0],$complete);
		$this->validate($a[1],$b[1],$complete);
		$this->validate($a[2],$b[2],$complete);
		$this->validate($a[3],$b[3],$tingi);

		if($this->form_validation->run() == FALSE)
		{
			$data = array('errors' => validation_errors(' <i class="fa fa-remove"></i> '));
			$this->session->set_flashdata($data);
			redirect('execute/edit/'.$id,'refresh');
		}

		$data = array(
			$a[0] => $this->pasa($a[0]),
			$a[1] => $this->pasa($a[1]),
			$a[2] => $this->pasa($a[2]),
			$a[3] => $this->pasa($a[3])
			);

		$result = $this->model->UpdateUsers($data,$id);
		if($result)
		{
			redirect('home','refresh');
		}

	}

	public function delete($id)
	{

		$result = $this->model->DeleteUsers($id);
		if($result)
		{
			redirect('home','refresh');
		}

	}

}