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
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('siswa/edit/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-info btn-xs" title="Edit"').'
                    '.anchor('siswa/delete/'.$d, '<i class="fa fa-trash"></i>', 'class="btn btn-danger btn-xs" title="Delete" onclick="return konfirmasi_hapus()"').'
                    '.anchor('siswa/detail/'.$d, '<i class="fa fa-list"></i>', 'class="btn btn-primary btn-xs" title="Detail Siswa"');
                }
            ),
            /*array(
                'db' => 'id_siswa',
                'dt' => 'detail',
                'formatter' => function($id) {
                    return anchor('siswa/detail/'.$id, '<i class="fa fa-list"></i>', 'class="btn btn-primary btn-xs" title="Detail Siswa"');
                }
            )*/
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

    public function edit($id_siswa)
    {
        if (isset($_POST['submit'])) {
            $this->Mdl_siswa->update();
            redirect('siswa','refresh');
        }
        else{
            $id             = $this->uri->segment(3);
            //$data['siswa']  = $this->db->get_where('tbl_siswa', array('id_siswa' => $id))->row_array();
            $where          = array('id_siswa' => $id_siswa );
            $data['siswa']  = $this->Mdl_siswa->daftar_siswa($where, 'tbl_siswa')->result();
            $this->template->load('template', 'siswa/edit_v', $data);
        }
    }

    function update()
    {
        $this->load->model('Mdl_siswa', 'mod');
        $data = array(
            'id_siswa'          =>$this->input->post('id_siswa', TRUE),
            'nis'               =>$this->input->post('nis', TRUE),
            'nama_siswa'        =>$this->input->post('nama_siswa', TRUE),
            'temp_lahir'        =>$this->input->post('temp_lahir', TRUE),
            'tgl_lahir'         =>$this->input->post('tgl_lahir', TRUE),
            'j_kelamin'         =>$this->input->post('j_kelamin', TRUE),
            /*'agama'             =>$this->input->post('agama', TRUE),*/
            'kd_agama'          =>$this->input->post('agama', TRUE),
            'status_keluarga'   =>$this->input->post('status_keluarga', TRUE),
            'anak_ke'           =>$this->input->post('anak_ke', TRUE),
            'alamat'            =>$this->input->post('alamat', TRUE),
            'telp'              =>$this->input->post('telp', TRUE),
            'asal_sekolah'      =>$this->input->post('asal_sekolah', TRUE),
            'kelas_diterima'    =>$this->input->post('kelas_diterima', TRUE),
            'tgl_diterima'      =>$this->input->post('tgl_diterima', TRUE),
            'nama_ayah'         =>$this->input->post('nama_ayah', TRUE),
            'nama_ibu'          =>$this->input->post('nama_ibu', TRUE),
            'alamat_orangtua'   =>$this->input->post('alamat_orangtua', TRUE),
            'pekerjaan_ayah'    =>$this->input->post('pekerjaan_ayah', TRUE),
            'pekerjaan_ibu'     =>$this->input->post('pekerjaan_ibu', TRUE),
            'nama_wali'         =>$this->input->post('nama_wali', TRUE),
            'alamat_wali'       =>$this->input->post('alamat_wali', TRUE),
            'telp_wali'         =>$this->input->post('telp_wali', TRUE),
            'pekerjaan_wali'    =>$this->input->post('pekerjaan_wali', TRUE),
            'foto'              =>$this->input->post('foto', TRUE)
        );
        $this->mod->update($data);
        redirect('siswa');
    }

    function delete()
    {
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            # proses hapus
            $this->db->where('id_siswa', $id);
            $this->db->delete('tbl_siswa');
            redirect('siswa','refresh');
        }
        else {
            redirect('siswa','refresh');
        }
    }
}