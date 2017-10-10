<?php
class Mdl_tahunakademik extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function daftar_tahunakademik($where,$table)
	{
		/*$this->db->select('*');
		$this->db->from('tbl_tahunakademik');
		$this->db->order_by('id_tahunakademik', 'asc');
		$query=$this->db->get();
		$result = $query->result_array();
		return $result;*/
		return $this->db->get_where($table, $where);
	}

	function agama_tahunakademik()
	{
		$this->db->select('tbl_agama.nama_agama');
		$this->db->from('tbl_agama');
		$this->db->join('tbl_tahunakademik', 'tbl_agama.kd_agama = tbl_tahunakademik.kd_agama');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
	        $results = $query->result_array();
	    }
	    return $results;
	}

	function save()
	{
		$data = array(
			'nama_tahunakademik' 		=>$this->input->post('nama_tahunakademik', TRUE),
			'is_aktif'					=>$this->input->post('is_aktif',			 TRUE),
			);
		$this->db->insert('tbl_tahunakademik', $data);
	}

	function update($data)
	{
		$this->db->set($data);
		$this->db->where('kd_tahunakademik', $data['kd_tahunakademik']);
		$this->db->update('tbl_tahunakademik', $data);
	}
}