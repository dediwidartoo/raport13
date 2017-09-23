<?php 

class Siswa extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('Ssp');
		$this->load->model('Mdl_siswa');
	}

	function data()
	{
		$table 		= 'tbl_siswa';
        $primaryKey = 'id_siswa';
        $columns 	= array(
        	array('db' => 'id_siswa', 'dt' => 'id_siswa'),
        	array(
                'db' => 'foto',
                'dt' => 'foto',
                'formatter' => function( $d) {
                    return "<img src='http://localhost/raport13/assets/foto/koala.jpg'>";
                }
            ),
            array('db' => 'nis', 'dt' => 'nis'),
            array('db' => 'nama_siswa', 'dt' => 'nama'),
            array('db' => 'temp_lahir', 'dt' => 'temp_lahir'),
            array('db' => 'tgl_lahir', 'dt' => 'tgl_lahir'),
            /*array('db' => 'j_kelamin', 'dt' => 'j_kelamin'),
            array('db' => 'agama', 'dt' => 'agama'),
            array('db' => 'status_keluarga', 'dt' => 'status_keluarga'),
            array('db' => 'anak_ke', 'dt' => 'anak_ke'),
            array('db' => 'alamat', 'dt' => 'alamat'),
            array('db' => 'telp', 'dt' => 'telp'),
            array('db' => 'asal_sekolah', 'dt' => 'asal_sekolah'),
            array('db' => 'kelas_diterima', 'dt' => 'kelas_diterima'),
            array('db' => 'tgl_diterima', 'dt' => 'tgl_diterima'),
            array('db' => 'nama_ayah', 'dt' => 'nama_ayah'),
            array('db' => 'nama_ibu', 'dt' => 'nama_ibu'),
            array('db' => 'alamat_orangtua', 'dt' => 'alamat_orangtua'),
            array('db' => 'pekerjaan_ayah', 'dt' => 'pekerjaan_ayah'),
            array('db' => 'pekerjaan_ibu', 'dt' => 'pekerjaan_ibu'),
            array('db' => 'nama_wali', 'dt' => 'nama_wali'),
            array('db' => 'alamat_wali', 'dt' => 'alamat_wali'),
            array('db' => 'telp_wali', 'dt' => 'telp_wali'),
            array('db' => 'pekerjaan_wali', 'dt' => 'pekerjaan_wali'),*/
            array(
                'db' => 'id_siswa',
                'dt' => 'aksi',
                'formatter' => function($d) {
                    return "<a href='edit.php?id=$d'>EDIT</a>";
                }
            ),
            array(
                'db' => 'id_siswa',
                'dt' => 'detail',
                'formatter' => function($id) {
                    return "<a href='detail/$id'>Detail</a>";
                }
            )
        );
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );
 
        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
	}

	function index()
	{
		$this->template->load('template', 'siswa/list_v');
	}

	function detail($id_siswa)
	{
		$where			= array('id_siswa' => $id_siswa);
		$data['konten']	= $this->Mdl_siswa->daftar_siswa($where, 'tbl_siswa')->result();
		$this->template->load('template', 'siswa/detail_v', $data);
	}

	function add()
	{
		if (isset($_POST['submit'])) {
			$this->Mdl_siswa->save();
			redirect('siswa','refresh');
		} else {
			$this->template->load('template', 'siswa/add_v');
		}
	}
}