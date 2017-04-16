<?php 
defined('BASEPATH') or exit ('Access denied');

class model extends CI_Model
{

	public function __construct()
	{

		parent::__construct();
	
	}
	
	public function GetId($id)
	{

		$result = $this->db->get_where('ci_members_tbl', array('id'=>$id));
		return $result->row_array();

	}

	public function ShowAllUsers()
	{

		$result = $this->db->get('ci_members_tbl');
		return $result->result();

	}

	public function CreateUser($data)
	{

		$check =  $this->db->select('lastname')
						   ->from('ci_members_tbl')
						   ->where(array('lastname' => $data['lastname']))
						   ->get();
		if($check->num_rows() > 0){
			$this->session->set_flashdata('notification','duplicated');
			return $check;
		} else {
			$result = $this->db->insert('ci_members_tbl',$data);
			$this->session->set_flashdata('notification','success');
			return $result;
		}

	}

	public function UpdateUsers($data,$id)
	{

		$this->db->where(['id'=>$id]);
		$result = $this->db->update('ci_members_tbl',$data);
		$this->session->set_flashdata('notification','update');
		return $result;
		
	}

	public function DeleteUser($id)
	{

		$this->db->where(['id' => $id]);
		$result = $this->db->delete('ci_members_tbl');
		$this->session->set_flashdata('notification','delete');
		return $result;

	}

}