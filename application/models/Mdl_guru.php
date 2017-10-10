<?php
class Mdl_guru extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function daftar_guru($where,$table)
	{
		return $this->db->get_where($table, $where);
	}

	function save()
	{
		$data = array(
			'nuptk'			=>$this->input->post('nuptk', TRUE),
			'nama_guru' 	=>$this->input->post('nama_guru', TRUE),
			'jenis_kelamin' =>$this->input->post('j_kelamin', TRUE)
		);
		$this->db->insert('tbl_guru', $data);
	}

	function update($data)
	{
		$this->db->set($data);
		$this->db->where('id_guru', $data['id_guru']);
		$this->db->update('tbl_guru', $data);
	}
}