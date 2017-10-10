<?php 

class Jurusan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('Ssp');
		$this->load->model('Mdl_jurusan');
	}

	function data()
	{
		$table 		= 'tbl_jurusan';
        $primaryKey = 'kd_jurusan';
        $columns 	= array(
            array('db' => 'kd_jurusan', 'dt' => 'kd_jurusan'),
            array('db' => 'nama_jurusan', 'dt' => 'nama_jurusan'),
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
                'db' => 'kd_jurusan',
                'dt' => 'aksi',
                'formatter' => function($d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('jurusan/edit/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-info btn-xs" title="Edit"').'
                    '.anchor('jurusan/delete/'.$d, '<i class="fa fa-trash"></i>', 'class="btn btn-danger btn-xs" title="Delete" onclick="return konfirmasi_hapus()"').'
                    '.anchor('jurusan/detail/'.$d, '<i class="fa fa-list"></i>', 'class="btn btn-primary btn-xs" title="Detail jurusan"');
                }
            ),
            /*array(
                'db' => 'id_jurusan',
                'dt' => 'detail',
                'formatter' => function($id) {
                    return anchor('jurusan/detail/'.$id, '<i class="fa fa-list"></i>', 'class="btn btn-primary btn-xs" title="Detail jurusan"');
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
		$this->template->load('template', 'jurusan/list_v');
	}

	function detail($id_jurusan)
	{
		$where			= array('id_jurusan' => $id_jurusan);
		$data['konten']	= $this->Mdl_jurusan->daftar_jurusan($where, 'tbl_jurusan')->result();
        $data['agamaku']  = $this->Mdl_jurusan->agama_jurusan($id_jurusan);
		$this->template->load('template', 'jurusan/detail_v', $data);
	}

	function add()
	{
		if (isset($_POST['submit'])) {
			$this->Mdl_jurusan->save();
			redirect('jurusan','refresh');
		} else {
			$this->template->load('template', 'jurusan/add_v');
		}
	}

    public function edit($kd_jurusan)
    {
        if (isset($_POST['submit'])) {
            $this->Mdl_jurusan->update();
            redirect('jurusan','refresh');
        }
        else{
            $id             = $this->uri->segment(3);
            $where          = array('kd_jurusan' => $kd_jurusan );
            $data['jurusan']  = $this->Mdl_jurusan->daftar_jurusan($where, 'tbl_jurusan')->result();
            $this->template->load('template', 'jurusan/edit_v', $data);
        }
    }

    function update()
    {
        $this->load->model('Mdl_jurusan', 'mod');
        $data = array(
            'kd_jurusan'        =>$this->input->post('kd_jurusan', TRUE),
            'nama_jurusan'      =>$this->input->post('nama_jurusan', TRUE)
        );
        $this->mod->update($data);
        redirect('jurusan');
    }

    function delete()
    {
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            # proses hapus
            $this->db->where('kd_jurusan', $id);
            $this->db->delete('tbl_jurusan');
            redirect('jurusan','refresh');
        }
        else {
            redirect('jurusan','refresh');
        }
    }
}