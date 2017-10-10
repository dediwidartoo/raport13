<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Siswa
    <small>SMK Terpadu Hadziqiyyah Nalumsari</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i> Siswa</a></li>

    <li><a href="#">Daftar Siswa</a></li>
    <li class="active">Blank page</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Daftar Siswa</h3>

      <div class="box-tools pull-right">
        <?php echo anchor('guru/add', '<i class="fa fa-plus-square"></i>', 'class="btn btn-box-tool" data-toggle="tooltip" title="Tambah Data"'); ?>
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
      </div>
    </div> 
    <div class="box-body">
      <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
        <thead>
            <tr>
              <th>No.</th>
              <th>NUPTK</th>
              <th>NAMA GURU</th>
              <th>JENIS KELAMIN</th>
              <th>AKSI</th>
            </tr>
        </thead>
      </table>
    </div>
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.0/jquery.dataTables.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script>  -->

<script>
    $(document).ready(function() {
        var t = $('#mytable').DataTable( {
            "ajax": '<?php echo site_url('guru/data'); ?>',
            "order": [[ 2, 'asc' ]],
            "columns": [
                { 
                  "data"     : null,
                  "width"    : "50px",
                  "sClass"   : "text-left",
                  "orderable": false
                },
                { 
                  "data"  : "nuptk",
                  "width" : "120px",
                  "sClass": "text-center"
                },
                { 
                  "data" : "nama_guru" 
                },
                { 
                  "data" : "jenis_kelamin" 
                },
                { 
                  "data" : "aksi",
                  "width" : "120px",
                  "sClass": "text-center"
                }
            ]
        } );
            
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search : 'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    } );
</script>
<!-- Custom Konfirmasi -->
<script src="<?php echo base_url(); ?>assets/bower_components/konfirmasi/js/konfirmasi_hapus.js"></script>