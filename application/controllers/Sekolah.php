<?php

class Sekolah extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mdl_sekolah');
	}

	function index()
	{
		if (isset($_POST['submit'])) {
			$this->Mdl_sekolah->update();
			redirect('sekolah','refresh');
		}
		else {
			$data['info']	= $this->db->get_where('tbl_sekolah_info', array('id_sekolah'=>1))->row_array();
			$this->template->load('template', 'info_sekolah_v', $data);
		}
	}
}