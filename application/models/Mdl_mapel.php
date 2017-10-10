<?php
class Mdl_mapel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function daftar_mapel($where,$table)
	{
		/*$this->db->select('*');
		$this->db->from('tbl_mapel');
		$this->db->order_by('id_mapel', 'asc');
		$query=$this->db->get();
		$result = $query->result_array();
		return $result;*/
		return $this->db->get_where($table, $where);
	}

	function agama_mapel()
	{
		$this->db->select('tbl_agama.nama_agama');
		$this->db->from('tbl_agama');
		$this->db->join('tbl_mapel', 'tbl_agama.kd_agama = tbl_mapel.kd_agama');
		/*$this->db->query('SELECT tbl_agama.nama_agama FROM tbl_agama JOIN tbl_mapel WHERE tbl_agama.kd_agama = tbl_mapel.kd_agama');*/
		$query = $this->db->get();
		if($query->num_rows() > 0) {
	        $results = $query->result_array();
	    }
	    return $results;
	}

	function save()
	{
		$data = array(
			'kd_mapel'		=>$this->input->post('kd_mapel', TRUE),
			'nama_mapel' 		=>$this->input->post('nama_mapel', TRUE)
			);
		$this->db->insert('tbl_mapel', $data);
	}

	/*function update()
	{
		$data = array(
			'nis'				=>$this->input->post('nis', TRUE),
			'nama_mapel' 		=>$this->input->post('nama_mapel', TRUE),
			'temp_lahir' 		=>$this->input->post('temp_lahir', TRUE),
			'tgl_lahir' 		=>$this->input->post('tgl_lahir', TRUE),
			'j_kelamin' 		=>$this->input->post('j_kelamin', TRUE),
			'agama' 			=>$this->input->post('agama', TRUE),
			'status_keluarga' 	=>$this->input->post('status_keluarga', TRUE),
			'anak_ke' 			=>$this->input->post('anak_ke', TRUE),
			'alamat' 			=>$this->input->post('alamat', TRUE),
			'telp' 				=>$this->input->post('telp', TRUE),
			'asal_sekolah' 		=>$this->input->post('asal_sekolah', TRUE),
			'kelas_diterima'	=>$this->input->post('kelas_diterima', TRUE),
			'tgl_diterima' 		=>$this->input->post('tgl_diterima', TRUE),
			'nama_ayah' 		=>$this->input->post('nama_ayah', TRUE),
			'nama_ibu' 			=>$this->input->post('nama_ibu', TRUE),
			'alamat_orangtua' 	=>$this->input->post('alamat_orangtua', TRUE),
			'pekerjaan_ayah' 	=>$this->input->post('pekerjaan_ayah', TRUE),
			'pekerjaan_ibu' 	=>$this->input->post('pekerjaan_ibu', TRUE),
			'nama_wali' 		=>$this->input->post('nama_wali', TRUE),
			'alamat_wali' 		=>$this->input->post('alamat_wali', TRUE),
			'telp_wali' 		=>$this->input->post('telp_wali', TRUE),
			'pekerjaan_wali' 	=>$this->input->post('pekerjaan_wali', TRUE),
			'foto' 				=>$this->input->post('foto', TRUE)
			);
		$id_mapel = $this->input->post('nis');
		$this->db->where('id_mapel', $id_mapel);
		$this->db->update('tbl_mapel', $data);
	}*/

	function update($data)
	{
		$this->db->set($data);
		$this->db->where('kd_mapel', $data['kd_mapel']);
		$this->db->update('tbl_mapel', $data);
	}
}