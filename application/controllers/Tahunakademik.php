<?php 

class Tahunakademik extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('Ssp');
		$this->load->model('Mdl_tahunakademik');
	}

	function data()
	{
		$table 		= 'tbl_tahunakademik';
        $primaryKey = 'kd_tahunakademik';
        $columns 	= array(
            array('db' => 'kd_tahunakademik', 'dt' => 'kd_tahunakademik'),
            array('db' => 'nama_tahunakademik', 'dt' => 'nama_tahunakademik'),
            array(
                'db' => 'is_aktif',
                'dt' => 'is_aktif',
                'formatter' => function($d) {
                    return $d=='y'?'Aktif':'Tidak Aktif';
                }
            ),
            array(
                'db' => 'kd_tahunakademik',
                'dt' => 'aksi',
                'formatter' => function($d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('tahunakademik/edit/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-info btn-xs" title="Edit"').'
                    '.anchor('tahunakademik/delete/'.$d, '<i class="fa fa-trash"></i>', 'class="btn btn-danger btn-xs" title="Delete" onclick="return konfirmasi_hapus()"').'
                    '.anchor('tahunakademik/detail/'.$d, '<i class="fa fa-list"></i>', 'class="btn btn-primary btn-xs" title="Detail tahunakademik"');
                }
            ),
            /*array(
                'db' => 'id_tahunakademik',
                'dt' => 'detail',
                'formatter' => function($id) {
                    return anchor('tahunakademik/detail/'.$id, '<i class="fa fa-list"></i>', 'class="btn btn-primary btn-xs" title="Detail tahunakademik"');
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
		$this->template->load('template', 'tahunakademik/list_v');
	}

	function detail($id_tahunakademik)
	{
		$where			= array('id_tahunakademik' => $id_tahunakademik);
		$data['konten']	= $this->Mdl_tahunakademik->daftar_tahunakademik($where, 'tbl_tahunakademik')->result();
        $data['agamaku']  = $this->Mdl_tahunakademik->agama_tahunakademik($id_tahunakademik);
		$this->template->load('template', 'tahunakademik/detail_v', $data);
	}

	function add()
	{
		if (isset($_POST['submit'])) {
			$this->Mdl_tahunakademik->save();
			redirect('tahunakademik','refresh');
		} else {
			$this->template->load('template', 'tahunakademik/add_v');
		}
	}

    public function edit($kd_tahunakademik)
    {
        if (isset($_POST['submit'])) {
            $this->Mdl_tahunakademik->update();
            redirect('tahunakademik','refresh');
        }
        else{
            $id             = $this->uri->segment(3);
            $where          = array('kd_tahunakademik' => $kd_tahunakademik );
            $data['tahunakademik']  = $this->Mdl_tahunakademik->daftar_tahunakademik($where, 'tbl_tahunakademik')->result();
            $this->template->load('template', 'tahunakademik/edit_v', $data);
        }
    }

    function update()
    {
        $this->load->model('Mdl_tahunakademik', 'mod');
        $data = array(
            'kd_tahunakademik'    =>$this->input->post('kd_tahunakademik', TRUE),
            'nama_tahunakademik'    =>$this->input->post('nama_tahunakademik', TRUE),
            'is_aktif'              =>$this->input->post('is_aktif', TRUE)
        );
        $this->mod->update($data);
        redirect('tahunakademik');
    }

    function delete()
    {
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            # proses hapus
            $this->db->where('kd_tahunakademik', $id);
            $this->db->delete('tbl_tahunakademik');
            redirect('tahunakademik','refresh');
        }
        else {
            redirect('tahunakademik','refresh');
        }
    }
}