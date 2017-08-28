<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Siswa
    <small>SMK Terpadu Hadziqiyyah Nalumsari</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i> Siswa</a></li>

    <li><a href="#">Detail Siswa</a></li>
    <li class="active">Blank page</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
      	<h3 class="box-title">Detail Siswa</h3>

      	<div class="box-tools pull-right">
      	<?php 
			$back = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';
			echo anchor($back,'<i class="fa fa-arrow-left"></i>',array('type'=>'button', 'class'=>'btn btn-box-tool', 'data-widget'=>'back', 'data-toggle'=>'tooltip', 'title'=>'Back'));
		?>
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
      </div>
    </div> 
    <div class="box-body">
    	<table class="table table-striped table-hover">
			<tbody>
				<?php
					//$no = 1;
					foreach ($konten as $k0 => $v0) {
						/*$id_siswa  	= $v0['id_siswa'];
						$nis 		= $v0['nis'];
						$nama   	= $v0['nama_siswa'];
						$temp_lahir = $v0['temp_lahir'];
						$tgl_lahir 	= $v0['tgl_lahir'];
						$j_kelamin	= $v0['j_kelamin'];
						$agama 		= $v0['agama'];
						$status_keluarga= $v0['status_keluarga'];
						$anak_ke 	= $v0['anak_ke'];
						$alamat 	= $v0['alamat'];
						$telp 		= $v0['telp'];
						$asal_sekolah 	= $v0['asal_sekolah'];
						$kelas_diterima	= $v0['kelas_diterima'];
						$tgl_diterima 	= $v0['tgl_diterima'];
						$nama_ayah 	= $v0['nama_ayah'];
						$nama_ibu 	= $v0['nama_ibu'];
						$alamat_orangtua= $v0['alamat_orangtua'];
						$pekerjaan_ayah = $v0['pekerjaan_ayah'];
						$pekerjaan_ibu 	= $v0['pekerjaan_ibu'];
						$nama_wali 	= $v0['nama_wali'];
						$alamat_wali 	= $v0['alamat_wali'];
						$telp_wali 	= $v0['telp_wali'];
						$pekerjaan_wali = $v0['pekerjaan_wali'];
						$foto 		= $v0['foto'];*/

						$id_siswa  		= $v0->id_siswa;
						$nis 			= $v0->nis;
						$nama   		= $v0->nama_siswa;
						$temp_lahir 	= $v0->temp_lahir;
						$tgl_lahir 		= $v0->tgl_lahir;
						$j_kelamin		= $v0->j_kelamin;
						$agama 			= $v0->agama;
						$status_keluarga= $v0->status_keluarga;
						$anak_ke 		= $v0->anak_ke;
						$alamat 		= $v0->alamat;
						$telp 			= $v0->telp;
						$asal_sekolah 	= $v0->asal_sekolah;
						$kelas_diterima	= $v0->kelas_diterima;
						$tgl_diterima 	= $v0->tgl_diterima;
						$nama_ayah 		= $v0->nama_ayah;
						$nama_ibu 		= $v0->nama_ibu;
						$alamat_orangtua= $v0->alamat_orangtua;
						$pekerjaan_ayah = $v0->pekerjaan_ayah;
						$pekerjaan_ibu 	= $v0->pekerjaan_ibu;
						$nama_wali 		= $v0->nama_wali;
						$alamat_wali 	= $v0->alamat_wali;
						$telp_wali 		= $v0->telp_wali;
						$pekerjaan_wali = $v0->pekerjaan_wali;
						$foto 			= $v0->foto;
				?>
				<tr>
				    <td rowspan="13">
				      <img src="<?php echo base_url(); ?>assets/foto/koala.jpg" class="img-rounded" width="90px">
				    </td>
			  	</tr>
				<tr>
					<td width="15%">NIS</td>
					<td>:</td>
					<td width="34%"><?php echo $nis; ?></td>
					<td width="15%">kelas_diterima</td>
					<td>:</td>
					<td width="34%"><?php echo $kelas_diterima; ?></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><strong><?php echo $nama; ?></strong></td>
					<td>tgl_diterima</td>
					<td>:</td>
					<td><?php echo $tgl_diterima; ?></td>
				</tr>
				<tr>
					<td>temp_lahir</td>
					<td>:</td>
					<td><?php echo $temp_lahir; ?></td>
					<td>nama_ayah</td>
					<td>:</td>
					<td><?php echo $nama_ayah; ?></td>
				</tr>
				<tr>
					<td>tgl_lahir</td>
					<td>:</td>
					<td><?php echo $tgl_lahir; ?></td>
					<td>nama_ayah</td>
					<td>:</td>
					<td><?php echo $nama_ayah; ?></td>
				</tr>
				<tr>
					<td>j_kelamin</td>
					<td>:</td>
					<td><?php echo $j_kelamin; ?></td>
					<td>nama_ibu</td>
					<td>:</td>
					<td><?php echo $nama_ibu; ?></td>
				</tr>
				<tr>
					<td>agama</td>
					<td>:</td>
					<td><?php echo $agama; ?></td>
					<td>alamat_orangtua</td>
					<td>:</td>
					<td><?php echo $alamat_orangtua; ?></td>
				</tr>
				<tr>
					<td>status_keluarga</td>
					<td>:</td>
					<td><?php echo $status_keluarga; ?></td>
					<td>pekerjaan_ayah</td>
					<td>:</td>
					<td><?php echo $pekerjaan_ayah; ?></td>
				</tr>
				<tr>
					<td>anak_ke</td>
					<td>:</td>
					<td><?php echo $anak_ke; ?></td>
					<td>pekerjaan_ibu</td>
					<td>:</td>
					<td><?php echo $pekerjaan_ibu; ?></td>
				</tr>
				<tr>
					<td>alamat</td>
					<td>:</td>
					<td><?php echo $alamat; ?></td>
					<td>nama_wali</td>
					<td>:</td>
					<td><?php echo $nama_wali; ?></td>
				</tr>
				<tr>
					<td>telp</td>
					<td>:</td>
					<td><?php echo $telp; ?></td>
					<td>alamat_wali</td>
					<td>:</td>
					<td><?php echo $alamat_wali; ?></td>
				</tr>
				<tr>
					<td>asal_sekolah</td>
					<td>:</td>
					<td><?php echo $asal_sekolah; ?></td>
					<td>telp_wali</td>
					<td>:</td>
					<td><?php echo $telp_wali; ?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>pekerjaan_wali</td>
					<td>:</td>
					<td><?php echo $pekerjaan_wali; ?></td>
				</tr>
				<!-- <tr>
					<td><a href="#"><?php echo $nama; ?></a></td>
					<td class="text-center"><?php echo $lulus; ?></td>
					<td class="text-center"><?php echo $kelas; ?></td>
					<td class="text-center"><?php echo $camat; ?></td>
					<td  width="50"><?php echo anchor('#'.$id,"<span class='fa fa-edit' aria-hidden='true'> Edit</span>",array('title'=>'Edit data', 'class'=>'btn btn-info btn-xs')); ?></td>
					<td  width="40"><?php echo anchor('#'. $id,"<span class='fa fa-trash' aria-hidden='true'> Hapus</span>",array('title'=>'Hapus data', 'class'=>'btn btn-danger btn-xs', 'onclick'=>'return konfirmasi();')); ?></td>
				</tr> -->
				<?php } ?>
			</tbody>

		</table>
	</div>
</div>
<!-- /.box -->

</section>
<!-- /.content -->

<script type="text/javascript" language="JavaScript" >
	function konfirmasi() {
		tanya = confirm("Anda yakin ingin menghapus data ini ?");
		if (tanya==true) return true;
        else return false;
    }
</script>