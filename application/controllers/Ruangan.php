<?php 

class Ruangan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('Ssp');
		$this->load->model('Mdl_ruangan');
	}

	function data()
	{
		$table 		= 'tbl_ruangan';
        $primaryKey = 'kd_ruangan';
        $columns 	= array(
            array('db' => 'kd_ruangan', 'dt' => 'kd_ruangan'),
            array('db' => 'nama_ruangan', 'dt' => 'nama_ruangan'),
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
                'db' => 'kd_ruangan',
                'dt' => 'aksi',
                'formatter' => function($d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('ruangan/edit/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-info btn-xs" title="Edit"').'
                    '.anchor('ruangan/delete/'.$d, '<i class="fa fa-trash"></i>', 'class="btn btn-danger btn-xs" title="Delete" onclick="return konfirmasi_hapus()"').'
                    '.anchor('ruangan/detail/'.$d, '<i class="fa fa-list"></i>', 'class="btn btn-primary btn-xs" title="Detail ruangan"');
                }
            ),
            /*array(
                'db' => 'id_ruangan',
                'dt' => 'detail',
                'formatter' => function($id) {
                    return anchor('ruangan/detail/'.$id, '<i class="fa fa-list"></i>', 'class="btn btn-primary btn-xs" title="Detail ruangan"');
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
		$this->template->load('template', 'ruangan/list_v');
	}

	function detail($id_ruangan)
	{
		$where			= array('id_ruangan' => $id_ruangan);
		$data['konten']	= $this->Mdl_ruangan->daftar_ruangan($where, 'tbl_ruangan')->result();
        $data['agamaku']  = $this->Mdl_ruangan->agama_ruangan($id_ruangan);
		$this->template->load('template', 'ruangan/detail_v', $data);
	}

	function add()
	{
		if (isset($_POST['submit'])) {
			$this->Mdl_ruangan->save();
			redirect('ruangan','refresh');
		} else {
			$this->template->load('template', 'ruangan/add_v');
		}
	}

    public function edit($kd_ruangan)
    {
        if (isset($_POST['submit'])) {
            $this->Mdl_ruangan->update();
            redirect('ruangan','refresh');
        }
        else{
            $id             = $this->uri->segment(3);
            $where          = array('kd_ruangan' => $kd_ruangan );
            $data['ruangan']  = $this->Mdl_ruangan->daftar_ruangan($where, 'tbl_ruangan')->result();
            $this->template->load('template', 'ruangan/edit_v', $data);
        }
    }

    function update()
    {
        $this->load->model('Mdl_ruangan', 'mod');
        $data = array(
            'kd_ruangan'        =>$this->input->post('kd_ruangan', TRUE),
            'nama_ruangan'      =>$this->input->post('nama_ruangan', TRUE)
        );
        $this->mod->update($data);
        redirect('ruangan');
    }

    function delete()
    {
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            # proses hapus
            $this->db->where('kd_ruangan', $id);
            $this->db->delete('tbl_ruangan');
            redirect('ruangan','refresh');
        }
        else {
            redirect('ruangan','refresh');
        }
    }
}