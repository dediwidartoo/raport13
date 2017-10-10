<?php 

class Kurikulum extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('Ssp');
		$this->load->model('Mdl_kurikulum');
	}

	function data()
	{
		$table 		= 'tbl_kurikulum';
        $primaryKey = 'kd_kurikulum';
        $columns 	= array(
            array('db' => 'kd_kurikulum', 'dt' => 'kd_kurikulum'),
            array('db' => 'nama_kurikulum', 'dt' => 'nama_kurikulum'),
            array(
                'db' => 'is_aktif',
                'dt' => 'is_aktif',
                'formatter' => function($d) {
                    return $d=='y'?'Aktif':'Tidak Aktif';
                }
            ),
            array(
                'db' => 'kd_kurikulum',
                'dt' => 'aksi',
                'formatter' => function($d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('kurikulum/edit/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-info btn-xs" title="Edit"').'
                    '.anchor('kurikulum/delete/'.$d, '<i class="fa fa-trash"></i>', 'class="btn btn-danger btn-xs" title="Delete" onclick="return konfirmasi_hapus()"').'
                    '.anchor('kurikulum/detail/'.$d, '<i class="fa fa-eye"></i>', 'class="btn btn-primary btn-xs" title="Detail kurikulum"');
                }
            ),
            /*array(
                'db' => 'id_kurikulum',
                'dt' => 'detail',
                'formatter' => function($id) {
                    return anchor('kurikulum/detail/'.$id, '<i class="fa fa-list"></i>', 'class="btn btn-primary btn-xs" title="Detail kurikulum"');
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
		$this->template->load('template', 'kurikulum/list_v');
	}

	function detail($id_kurikulum)
	{
		$where			= array('id_kurikulum' => $id_kurikulum);
		$data['konten']	= $this->Mdl_kurikulum->daftar_kurikulum($where, 'tbl_kurikulum')->result();
        $data['agamaku']  = $this->Mdl_kurikulum->agama_kurikulum($id_kurikulum);
		$this->template->load('template', 'kurikulum/detail_v', $data);
	}

	function add()
	{
		if (isset($_POST['submit'])) {
			$this->Mdl_kurikulum->save();
			redirect('kurikulum','refresh');
		} else {
			$this->template->load('template', 'kurikulum/add_v');
		}
	}

    public function edit($kd_kurikulum)
    {
        if (isset($_POST['submit'])) {
            $this->Mdl_kurikulum->update();
            redirect('kurikulum','refresh');
        }
        else{
            $id             = $this->uri->segment(3);
            $where          = array('kd_kurikulum' => $kd_kurikulum );
            $data['kurikulum']  = $this->Mdl_kurikulum->daftar_kurikulum($where, 'tbl_kurikulum')->result();
            $this->template->load('template', 'kurikulum/edit_v', $data);
        }
    }

    function update()
    {
        $this->load->model('Mdl_kurikulum', 'mod');
        $data = array(
            'kd_kurikulum'    =>$this->input->post('kd_kurikulum', TRUE),
            'nama_kurikulum'    =>$this->input->post('nama_kurikulum', TRUE),
            'is_aktif'              =>$this->input->post('is_aktif', TRUE)
        );
        $this->mod->update($data);
        redirect('kurikulum');
    }

    function delete()
    {
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            # proses hapus
            $this->db->where('kd_kurikulum', $id);
            $this->db->delete('tbl_kurikulum');
            redirect('kurikulum','refresh');
        }
        else {
            redirect('kurikulum','refresh');
        }
    }
}