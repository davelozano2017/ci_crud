<?php 
defined('BASEPATH') or exit ('No direct script allowed.');

class model extends CI_Model
{

	public function GetAllUsers()
	{
		
		$result = $this->db->get('ci_members_tbl');
		return $result->result();

	}

	public function CreateUsers($data)
	{
		
		$check = $this->db->select('username')->from('ci_members_tbl')->where(array('username' => $data['username']))->get();
		if($check->num_rows() > 0)
		{
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

	public function DeleteUsers($id)
	{
		$this->db->where(['id'=>$id]);
		$result = $this->db->delete('ci_members_tbl');
		$this->session->set_flashdata('notification','delete');
		return $result;
	}

	public function GetId($id)
	{

		$result = $this->db->get_where('ci_members_tbl',array('id'=>$id));
		return $result->row_array();

	}

}
