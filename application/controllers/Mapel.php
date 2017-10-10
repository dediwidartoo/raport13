<?php 

class Mapel extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('Ssp');
		$this->load->model('Mdl_mapel');
	}

	function data()
	{
		$table 		= 'tbl_mapel';
        $primaryKey = 'kd_mapel';
        $columns 	= array(
            array('db' => 'kd_mapel', 'dt' => 'kd_mapel'),
            array('db' => 'nama_mapel', 'dt' => 'nama_mapel'),
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
                'db' => 'kd_mapel',
                'dt' => 'aksi',
                'formatter' => function($d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('mapel/edit/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-info btn-xs" title="Edit"').'
                    '.anchor('mapel/delete/'.$d, '<i class="fa fa-trash"></i>', 'class="btn btn-danger btn-xs" title="Delete" onclick="return konfirmasi_hapus()"').'
                    '.anchor('mapel/detail/'.$d, '<i class="fa fa-list"></i>', 'class="btn btn-primary btn-xs" title="Detail mapel"');
                }
            ),
            /*array(
                'db' => 'id_mapel',
                'dt' => 'detail',
                'formatter' => function($id) {
                    return anchor('mapel/detail/'.$id, '<i class="fa fa-list"></i>', 'class="btn btn-primary btn-xs" title="Detail mapel"');
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
		$this->template->load('template', 'mapel/list_v');
	}

	function detail($id_mapel)
	{
		$where			= array('id_mapel' => $id_mapel);
		$data['konten']	= $this->Mdl_mapel->daftar_mapel($where, 'tbl_mapel')->result();
        $data['agamaku']  = $this->Mdl_mapel->agama_mapel($id_mapel);
		$this->template->load('template', 'mapel/detail_v', $data);
	}

	function add()
	{
		if (isset($_POST['submit'])) {
			$this->Mdl_mapel->save();
			redirect('mapel','refresh');
		} else {
			$this->template->load('template', 'mapel/add_v');
		}
	}

    public function edit($kd_mapel)
    {
        if (isset($_POST['submit'])) {
            $this->Mdl_mapel->update();
            redirect('mapel','refresh');
        }
        else{
            $id             = $this->uri->segment(3);
            //$data['mapel']  = $this->db->get_where('tbl_mapel', array('id_mapel' => $id))->row_array();
            $where          = array('kd_mapel' => $kd_mapel );
            $data['mapel']  = $this->Mdl_mapel->daftar_mapel($where, 'tbl_mapel')->result();
            $this->template->load('template', 'mapel/edit_v', $data);
        }
    }

    function update()
    {
        $this->load->model('Mdl_mapel', 'mod');
        $data = array(
            'kd_mapel'      =>$this->input->post('kd_mapel', TRUE),
            'nama_mapel'        =>$this->input->post('nama_mapel', TRUE)
            );
        $this->mod->update($data);
        redirect('mapel');
    }

    function delete()
    {
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            # proses hapus
            $this->db->where('kd_mapel', $id);
            $this->db->delete('tbl_mapel');
            redirect('mapel','refresh');
        }
        else {
            redirect('mapel','refresh');
        }
    }
}