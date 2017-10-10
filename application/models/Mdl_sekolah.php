<?php 

class Mdl_sekolah extends CI_Model
{
	
	function update()
	{
		$data = array(
			'nama_sekolah' 		=> $this->input->post('nama_sekolah', TRUE),
			'id_jenjang_sekolah'=> $this->input->post('id_jenjang_sekolah', TRUE),
			'alamat_sekolah' 	=> $this->input->post('alamat_sekolah', TRUE),
			'email' 	=> $this->input->post('email_sekolah', TRUE),
			'telp'		=> $this->input->post('telp_sekolah', TRUE),
		);
		$id_sekolah = $this->input->post('id_sekolah');
		$this->db->where('id_sekolah', $id_sekolah);
		$this->db->update('tbl_sekolah_info', $data);
	}
}