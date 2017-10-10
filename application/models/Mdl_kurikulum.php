<?php
class Mdl_kurikulum extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function daftar_kurikulum($where,$table)
	{
		return $this->db->get_where($table, $where);
	}

	function agama_kurikulum()
	{
		$this->db->select('tbl_agama.nama_agama');
		$this->db->from('tbl_agama');
		$this->db->join('tbl_kurikulum', 'tbl_agama.kd_agama = tbl_kurikulum.kd_agama');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
	        $results = $query->result_array();
	    }
	    return $results;
	}

	function save()
	{
		$data = array(
			'nama_kurikulum' 		=>$this->input->post('nama_kurikulum', TRUE),
			'is_aktif'					=>$this->input->post('is_aktif',			 TRUE),
			);
		$this->db->insert('tbl_kurikulum', $data);
	}

	function update($data)
	{
		$this->db->set($data);
		$this->db->where('kd_kurikulum', $data['kd_kurikulum']);
		$this->db->update('tbl_kurikulum', $data);
	}
}