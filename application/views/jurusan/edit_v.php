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
      <h3 class="box-title">Edit Siswa</h3>

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
        echo form_open('jurusan/update', $atribut_form);

        //echo form_hidden('id', $siswa['nis']);
        
      foreach($jurusan as $k0 => $v0) {
        $kd_jurusan       = $v0->kd_jurusan;
        $nama_jurusan     = $v0->nama_jurusan;
      }
      ?>
      <div class="col-md-12">
        <div class="col-md-6">
          <div class="form-group">
            <label class="col-sm-3 control-label">Kode Ruang</label>
            <div class="col-sm-9">
              <input type="text" readonly="" class="form-control" name="kd_jurusan" placeholder="Masukkan Kode jurusan" value="<?php echo $kd_jurusan; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Nama Ruang</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nama_jurusan" placeholder="Masukkan Nama jurusan" value="<?php echo $nama_jurusan; ?>">
            </div>
          </div>
        </div>
        <div class="form-group col-md-12">
        <label class="col-sm-2"></label>
          <div class="col-sm-4">
            <button type="submit" name="submit" class="btn btn-success" onclick="return konfirmasi_edit();"><i class="fa fa-upload"></i> SIMPAN</button>
            <?php 
              $back = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';
              echo anchor($back,'<i class="fa fa-share"></i> KEMBALI',array('class'=>'btn btn-danger'));
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