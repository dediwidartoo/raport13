<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Siswa
    <small>SMK Terpadu Hadziqiyyah Nalumsari</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i> Siswa</a></li>

    <li><a href="#">Edit Siswa</a></li>
    <li class="active">Blank page</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Siswa</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
      </div>
    </div> 
    <div class="box-body">
      <!-- form start -->
      <?php
      $atribut_form = array(
        'class' => 'form-horizontal form-label-left',
        'novalidate'=> '',
        'data-parsley-validate'=>''
        );
        echo form_open('siswa/update', $atribut_form);

        //echo form_hidden('id', $siswa['nis']);
        
      foreach($siswa as $k0 => $v0) {
        $id_siswa       = $v0->id_siswa;
        $nis            = $v0->nis;
        $nama           = $v0->nama_siswa;
        $temp_lahir     = $v0->temp_lahir;
        $tgl_lahir      = $v0->tgl_lahir;
        $j_kelamin      = $v0->j_kelamin;
        $agama          = $v0->agama;
        $status_keluarga= $v0->status_keluarga;
        $anak_ke        = $v0->anak_ke;
        $alamat         = $v0->alamat;
        $telp           = $v0->telp;
        $asal_sekolah   = $v0->asal_sekolah;
        $kelas_diterima = $v0->kelas_diterima;
        $tgl_diterima   = $v0->tgl_diterima;
        $nama_ayah      = $v0->nama_ayah;
        $nama_ibu       = $v0->nama_ibu;
        $alamat_orangtua= $v0->alamat_orangtua;
        $pekerjaan_ayah = $v0->pekerjaan_ayah;
        $pekerjaan_ibu  = $v0->pekerjaan_ibu;
        $nama_wali      = $v0->nama_wali;
        $alamat_wali    = $v0->alamat_wali;
        $telp_wali      = $v0->telp_wali;
        $pekerjaan_wali = $v0->pekerjaan_wali;
        $foto           = $v0->foto;
      }
      ?>
      <div class="col-md-12">
        <div class="col-md-6">
          <!-- <input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>"> -->
          <?php echo form_input(array('name' => 'id_siswa', 'value' => $id_siswa, 'type' => 'hidden')); ?>
          <div class="form-group">
            <label class="col-sm-3 control-label">NIS</label>
            <div class="col-sm-9">
              <input type="text" readonly="" class="form-control" name="nis" placeholder="Nomor Induk Siswa" value="<?php echo $nis; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nama_siswa" placeholder="Nama Lengkap Siswa" value="<?php echo $nama; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Tempat, Tanggal Lahir</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="temp_lahir" placeholder="Tempat Lahir Siswa" value="<?php echo $temp_lahir; ?>">
            </div>
            <div class="col-sm-4 date">
              <input type="date" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir Siswa" id="datepicker" value="<?php echo $tgl_lahir; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Jenis Kelamin</label>
            <div class="col-sm-3">
              <label>
                <input type="radio" name="j_kelamin" value="L" <?php echo ($j_kelamin== 'L') ?  "checked" : "" ; ?> class="flat-red"> Laki-laki
              </label>
            </div>
            <div class="col-sm-3">
              <label>
                <input type="radio" name="j_kelamin" value="P" <?php echo ($j_kelamin== 'P') ?  "checked" : "" ; ?> class="flat-red"> Perempuan
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Agama</label>
            <div class="col-sm-9">
            <?php 
            echo form_dropdown('agama', array('islam' =>'ISLAM', 'kristen' =>'KRISTEN', 'budha' =>'BUDHA', 'hindu' =>'HINDU', 'katolik' =>'KATOLIK'), $agama, "class='form-control'");
            ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Status Keluarga</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="status_keluarga" placeholder="Status dalam keluarga" value="<?php echo $status_keluarga; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Anak Ke</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" name="anak_ke" placeholder="Anak" min="1" value="<?php echo $anak_ke; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Alamat</label>
            <div class="col-sm-9">
              <textarea class="form-control" name="alamat" placeholder="Alamat siswa" value=""><?php echo $alamat; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Telp</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="telp" placeholder="Telepon" value="<?php echo $telp; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Asal Sekolah</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="asal_sekolah" placeholder="Asal Sekolah Siswa" value="<?php echo $asal_sekolah; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Tanggal Diterima</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="mydate" name="tgl_diterima" placeholder="Tanggal diterima" value="<?php echo $tgl_diterima; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Kelas Diterima</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" name="kelas_diterima" placeholder="Diterima di kelas?" min="1" value="<?php echo $kelas_diterima; ?>">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="col-sm-3 control-label">Nama Ayah</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nama_ayah" placeholder="Nama Lengkap Ayah" value="<?php echo $nama_ayah; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Nama Ibu</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nama_ibu" placeholder="Nama Lengkap Ibu" value="<?php echo $nama_ibu; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Alamat Orang Tua</label>
            <div class="col-sm-9">
              <textarea class="form-control" name="alamat_orangtua" placeholder="Alamat Orang tua" value=""><?php echo $alamat_orangtua; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Pekerjaan Ayah</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" value="<?php echo $pekerjaan_ayah; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Pekerjaan Ibu</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" value="<?php echo $pekerjaan_ibu; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Nama Wali</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nama_wali" placeholder="Nama Wali Siswa" value="<?php echo $nama_wali; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Alamat Wali</label>
            <div class="col-sm-9">
              <textarea class="form-control" name="alamat_wali" placeholder="Alamat Wali" value=""><?php echo $alamat_wali; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Telp. Wali</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="telp_wali" placeholder="Telepon Wali" value="<?php echo $telp_wali; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Pekerjaan Wali</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="pekerjaan_wali" placeholder="Pekerjaan Wali" value="<?php echo $pekerjaan_wali; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Foto</label>
            <div class="col-sm-9">
              <input type="file" name="foto">
            </div>
          </div>
        </div>
        <div class="form-group col-md-12">
        <label class="col-sm-2"></label>
          <div class="col-sm-4">
            <button type="submit" name="submit" class="btn btn-success" onclick="return konfirmasi_edit();"><i class="fa fa-upload"></i> Kirim</button>
            <?php 
              $back = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';
              echo anchor($back,'<i class="fa fa-share"></i> Kembali',array('class'=>'btn btn-danger'));
            ?>
          </div>
        </div>
      </div>
      <!-- /.box-footer -->
      <?php 
        echo form_close();
      ?>
    </div>
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

<!-- Custom Konfirmasi -->
<script src="<?php echo base_url(); ?>assets/bower_components/konfirmasi/js/konfirmasi_edit.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      format: "dd-mm-yyyy",
      autoclose: true,
      orientation: "bottom auto",
    });
    $("#mydate").datepicker({
      format: "dd-mm-yyyy",
      autoclose: true,
      orientation: "auto top",
    }).datepicker("setDate", new Date()
    );
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
  })
</script>