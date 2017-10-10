<?php 

class Guru extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('Ssp');
		$this->load->model('Mdl_guru');
	}

	function data()
	{
		$table 		= 'tbl_guru';
        $primaryKey = 'id_guru';
        $columns 	= array(
            array('db' => 'id_guru', 'dt' => 'id_guru'),
            array('db' => 'nuptk', 'dt' => 'nuptk'),
            array('db' => 'nama_guru', 'dt' => 'nama_guru'),
            array(
                'db'        => 'jenis_kelamin',
                'dt'        => 'jenis_kelamin',
                'formatter' => function($k) {
                    return $k=='L'?'Laki-laki':'Perempuan';
                }
            ),
            array(
                'db'        => 'id_guru',
                'dt'        => 'aksi',
                'formatter' => function($d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('guru/edit/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-info btn-xs" title="Edit"').'
                    '.anchor('guru/delete/'.$d, '<i class="fa fa-trash"></i>', 'class="btn btn-danger btn-xs" title="Delete" onclick="return konfirmasi_hapus()"').'
                    '.anchor('guru/detail/'.$d, '<i class="fa fa-list"></i>', 'class="btn btn-primary btn-xs" title="Detail guru"');
                }
            ),
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
		$this->template->load('template', 'guru/list_v');
	}

	function detail($id_guru)
	{
		$where			= array('id_guru' => $id_guru);
		$data['konten']	= $this->Mdl_guru->daftar_guru($where, 'tbl_guru')->result();
        $data['agamaku']  = $this->Mdl_guru->agama_guru($id_guru);
		$this->template->load('template', 'guru/detail_v', $data);
	}

	function add()
	{
		if (isset($_POST['submit'])) {
			$this->Mdl_guru->save();
			redirect('guru','refresh');
		} else {
			$this->template->load('template', 'guru/add_v');
		}
	}

    public function edit($id_guru)
    {
        if (isset($_POST['submit'])) {
            $this->Mdl_guru->update();
            redirect('guru','refresh');
        }
        else{
            $id             = $this->uri->segment(3);
            $where          = array('id_guru' => $id_guru );
            $data['guru']  = $this->Mdl_guru->daftar_guru($where, 'tbl_guru')->result();
            $this->template->load('template', 'guru/edit_v', $data);
        }
    }

    function update()
    {
        $this->load->model('Mdl_guru', 'mod');
        $data = array(
            'id_guru'         =>$this->input->post('id_guru', TRUE),
            'nuptk'         =>$this->input->post('nuptk', TRUE),
            'nama_guru'     =>$this->input->post('nama_guru', TRUE),
            'jenis_kelamin' =>$this->input->post('j_kelamin', TRUE)
        );
        $this->mod->update($data);
        redirect('guru');
    }

    function delete()
    {
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            # proses hapus
            $this->db->where('id_guru', $id);
            $this->db->delete('tbl_guru');
            redirect('guru','refresh');
        }
        else {
            redirect('guru','refresh');
        }
    }
}