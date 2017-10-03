<?php
class Mdl_siswa extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function daftar_siswa($where,$table)
	{
		/*$this->db->select('*');
		$this->db->from('tbl_siswa');
		$this->db->order_by('id_siswa', 'asc');
		$query=$this->db->get();
		$result = $query->result_array();
		return $result;*/
		return $this->db->get_where($table, $where);
	}

	function save()
	{
		$data = array(
			'nis'				=>$this->input->post('nis', TRUE),
			'nama_siswa' 		=>$this->input->post('nama_siswa', TRUE),
			'temp_lahir' 		=>$this->input->post('temp_lahir', TRUE),
			'tgl_lahir' 		=>$this->input->post('tgl_lahir', TRUE),
			'j_kelamin' 		=>$this->input->post('j_kelamin', TRUE),
			/*'agama' 			=>$this->input->post('agama', TRUE),*/
			'kd_agama' 			=>$this->input->post('agama', TRUE),
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
		$this->db->insert('tbl_siswa', $data);
	}

	/*function update()
	{
		$data = array(
			'nis'				=>$this->input->post('nis', TRUE),
			'nama_siswa' 		=>$this->input->post('nama_siswa', TRUE),
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
		$id_siswa = $this->input->post('nis');
		$this->db->where('id_siswa', $id_siswa);
		$this->db->update('tbl_siswa', $data);
	}*/

	function update($data)
	{
		$this->db->set($data);
		$this->db->where('id_siswa', $data['id_siswa']);
		$this->db->update('tbl_siswa', $data);
	}
}