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

		$result = $this->db->insert('ci_members_tbl',$data);
		return $result;

	}

	public function UpdateUsers($data,$id)
	{

		$this->db->where(['id'=>$id]);
		$result = $this->db->update('ci_members_tbl',$data);
		return $result;
		
	}

	public function DeleteUser($id)
	{

		$this->db->where(['id' => $id]);
		$result = $this->db->delete('ci_members_tbl');
		return $result;

	}

}