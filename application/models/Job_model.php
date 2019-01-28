<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_model extends CI_Model {

	public function __construct() 
	{
		$this->load->database();
	}

	//listing
	public function listing() 
	{
		$this->db->select("*");
    	$this->db->from("tbl_job");
    	$this->db->order_by("id_job", "desc");
    	$query = $this->db->get();
    	return $query->result();
	}

	//listing
	public function detail($id_job) 
	{
		$query = $this->db->get_where('tbl_job', array('id_job'	=>	$id_job));
		return $query->row();
	}

	//tambah
	public function tambah($data)
	{
		$this->db->insert('tbl_job', $data);
	}

	//edit
	public function edit($data)
	{
		$this->db->where('id_job', $data['id_job']);
		$this->db->update('tbl_job', $data);
	}

	//edit
	public function delete($data)
	{
		$this->db->where('id_job', $data['id_job']);
		$this->db->delete('tbl_job', $data);
	}
}