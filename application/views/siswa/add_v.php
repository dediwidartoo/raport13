<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Siswa
    <small>SMK Terpadu Hadziqiyyah Nalumsari</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i> Siswa</a></li>

    <li><a href="#">Tambah Siswa</a></li>
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
        echo form_open('url', $atribut_form);
      ?>
        <div class="col-md-6">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">NIS</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputEmail3" placeholder="Nomor Induk Siswa">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Nama Siswa">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Tempat, Tanggal Lahir</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Tempat Lahir Siswa">
            </div>
            <div class="col-sm-4 date">
              <input type="text" class="form-control" id="datepicker" placeholder="Tanggal Lahir Siswa">
            </div>
          </div>
          <!-- <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Jenis Kelamin</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Nama Siswa">
            </div>
          </div> -->
          <div class="form-group">
          <label for="inputPassword3" class="col-sm-3 control-label">Jenis Kelamin</label>
            <div class="col-sm-9">
              <label class="hover">
                <input type="radio" name="r3" class="flat-red" checked>Laki-laki
              </label>
              <label>
                <input type="radio" name="r3" class="flat-red">Perempuan
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Agama</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Nama Siswa">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Status Keluarga</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Nama Siswa">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Anak Ke</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Nama Siswa">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Alamat</label>
            <div class="col-sm-9">
              <textarea class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Telp</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Nama Siswa">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Asal Sekolah</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Nama Siswa">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Diterima</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="mydate" placeholder="Nama Siswa">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Nama Ayah</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputEmail3" placeholder="Nomor Induk Siswa">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Nama Ibu</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Nama Siswa">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Alamat Orang Tua</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Tempat Lahir Siswa">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Pekerjaan Ayah</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Tanggal Lahir Siswa">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Pekerjaan Ibu</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Nama Siswa">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Nama Wali</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Nama Siswa">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Alamat Wali</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Nama Siswa">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Telp. Wali</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Nama Siswa">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Pekerjaan Wali</label>
            <div class="col-sm-9">
              <textarea class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Foto</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Nama Siswa">
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
    })
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