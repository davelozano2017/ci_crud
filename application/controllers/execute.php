<?php 

defined('BASEPATH') or exit ('Access denied.');

class execute extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();

	}

	public function insert()
	{
		$required = 'trim|required|regex_match[/^([a-zA-Z]|\s)+$/]|xss_clean';
		$this->form_validation->set_rules('lastname','Last Name',$required);
		$this->form_validation->set_rules('firstname','First Name',$required);
		$this->form_validation->set_rules('middlename','Middle Name',$required);

		if($this->form_validation->run() == FALSE)
		{
			
			$data = array('errors' => validation_errors());
			$this->session->set_flashdata($data);
			redirect('home','refresh');

		}
		
		$data = array(
			'lastname' 		=> $this->input->post('lastname'),
			'firstname' 	=> $this->input->post('firstname'),
			'middlename' 	=> $this->input->post('middlename')
			);

		$result = $this->model->CreateUser($data);
		$this->session->set_flashdata('notification','success');
		if($result) 
		{
			redirect('home','refresh');
		}

	}

	public function delete($id)
	{

		$result = $this->model->DeleteUser($id);
		$this->session->set_flashdata('notification','delete');
		if($result)
		{
			redirect('home','refresh');
		}

	}

	public function edit($id)
	{

		$id = $this->uri->segment(3);
		$data['result'] = $this->model->GetId($id);
		$this->load->view('template/header/header');
		$this->load->view('template/edit',$data);
		$this->load->view('template/footer/footer');

	}

	public function update($id)
	{
		
		$required = 'trim|required|regex_match[/^([a-zA-Z]|\s)+$/]|xss_clean';
		$this->form_validation->set_rules('lastname','Last Name',$required);
		$this->form_validation->set_rules('firstname','First Name',$required);
		$this->form_validation->set_rules('middlename','Middle Name',$required);

		if($this->form_validation->run() == FALSE)
		{
			$data = array('errors' => validation_errors());
			$this->session->set_flashdata($data);
			redirect('execute/edit/'.$id,'refresh');
		}

		$data = array(
			'lastname' 		=> $this->input->post('lastname'),
			'firstname' 	=> $this->input->post('firstname'),
			'middlename' 	=> $this->input->post('middlename')
			);

		$result = $this->model->UpdateUsers($data,$id);
		$this->session->set_flashdata('notification','update');
		if($result)
		{
			redirect('home','refresh');
		}

	}

}
