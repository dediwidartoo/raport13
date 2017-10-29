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

	/*function detail($id_kurikulum)
	{
		$where			= array('id_kurikulum' => $id_kurikulum);
		$data['konten']	= $this->Mdl_kurikulum->daftar_kurikulum($where, 'tbl_kurikulum')->result();
        $data['agamaku']  = $this->Mdl_kurikulum->agama_kurikulum($id_kurikulum);
		$this->template->load('template', 'kurikulum/detail_v', $data);
	}*/

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
            $id                 = $this->uri->segment(3);
            $where              = array('kd_kurikulum' => $kd_kurikulum );
            $data['kurikulum']  = $this->Mdl_kurikulum->daftar_kurikulum($where, 'tbl_kurikulum')->result();
            $this->template->load('template', 'kurikulum/edit_v', $data);
        }
    }

    function update()
    {
        $this->load->model('Mdl_kurikulum', 'mod');
        $data = array(
            'kd_kurikulum'      =>$this->input->post('kd_kurikulum', TRUE),
            'nama_kurikulum'    =>$this->input->post('nama_kurikulum', TRUE),
            'is_aktif'          =>$this->input->post('is_aktif', TRUE)
        );
        $this->mod->update($data);
        redirect('kurikulum');
    }

    function delete()
    {
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            # proses hapu  s
            $this->db->where('kd_kurikulum', $id);
            $this->db->delete('tbl_kurikulum');
            redirect('kurikulum','refresh');
        }
        else {
            redirect('kurikulum','refresh');
        }
    }

    function detail()
    {
        $info_sekolah   = "SELECT js.jumlah_kelas
                            FROM tbl_jenjang_sekolah as js, tbl_sekolah_info as si
                            WHERE js.id_jenjang=si.id_jenjang_sekolah";
        $data['info']   = $this->db->query($info_sekolah)->row_array();
        $this->template->load('template', 'kurikulum/detail_v', $data);
    }

    function data_kurikulum_detail()
    {
        $kd_jurusan     = $_GET['jurusan'];
        $kelas          = $_GET['kelas'];
        $kd_kurikulum   = $_GET['kd_kurikulum'];
        if ($kelas=='semua_kelas') {
            $selected_kelas='';
        }else {
            $selected_kelas="AND tkd.kelas='$kelas'";
        }
        echo "<table id='mytable' class='table table-striped table-bordered table-hover table-full-width dataTable' cellspacing='0' width='100%''>
        <thead>
            <tr>
              <th>No.</th>
              <th>Kode Mapel</th>
              <th>Mata Pelajaran</th>
              <th>Kelas</th>
              <th>Aksi</th>
            </tr>
        </thead>";
        $sql = "SELECT tm.kd_mapel, tm.nama_mapel, tj.nama_jurusan, 
        tkd.kelas, tkd.kd_kurikulum_detail, tkd.kd_kurikulum 
        FROM tbl_kurikulum_detail as tkd, tbl_kurikulum as tk, tbl_mapel as tm, tbl_jurusan as tj
        WHERE tkd.kd_kurikulum=tk.kd_kurikulum AND tkd.kd_mapel=tm.kd_mapel 
        AND tkd.kd_jurusan=tj.kd_jurusan $selected_kelas AND tkd.kd_kurikulum='$kd_kurikulum' AND tkd.kd_jurusan='$kd_jurusan'";  
        $kurikulum = $this->db->query($sql)->result();
        $no=1;
        foreach ($kurikulum as $row) {
            echo "<tr><td>$no</td><td>$row->kd_mapel</td><td>$row->nama_mapel</td><td>$row->kelas</td><td>".anchor('kurikulum/delete_detail/'.$row->kd_kurikulum_detail.'/'.$row->kd_kurikulum, '<i class="fa fa-trash"></i>', 'class="btn btn-danger btn-xs" title="Delete" onclick="return konfirmasi_hapus()"')."</td></tr>";
            $no++;
        }
        echo "</table>";
    }

    function delete_detail()
    {
        $id             = $this->uri->segment(3);
        $id_kurikulum   = $this->uri->segment(4);
        if (!empty($id)) {
            # proses hapus
            $this->db->where('kd_kurikulum_detail', $id);
            $this->db->delete('tbl_kurikulum_detail');
        }
        redirect('kurikulum/detail/'.$id_kurikulum,'refresh');
    }

    function add_detail()
    {
        if (isset($_POST['submit'])) {
            $this->Mdl_kurikulum->add_kurikulum_detail();
            redirect('kurikulum/detail/'.$this->input->post('kd_kurikulum'),'refresh');
        }else {
            $info_sekolah   = "SELECT js.jumlah_kelas
                            FROM tbl_jenjang_sekolah as js, tbl_sekolah_info as si
                            WHERE js.id_jenjang=si.id_jenjang_sekolah";
            $data['info']   = $this->db->query($info_sekolah)->row_array();
        }
        $this->template->load('template', 'kurikulum/add_detail_v', $data);
    }
}