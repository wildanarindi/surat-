<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RS Wonolangan | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- DataTables -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/datatables/DataTables-1.10.20/css/dataTables.jqueryui.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/datatables/DataTables-1.10.20/css/dataTables.jqueryui.min.css">

   <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/datatables/Responsive-2.2.3/css/responsive.bootstrap4.min.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/datatables/Buttons-1.6.1/css/buttons.bootstrap4.min.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/datatables/Scroller-2.0.1/css/scroller.bootstrap4.min.css">

   <!-- <link href="<?= base_url(); ?>assets/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet"> -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php
$user['dd_user']=$this->db->get_where('dd_user', ['username' => $this->session->userdata('username')])->row_array();?>
<?php 
$user['menu'] = $this->db->get('user_menu')->result_array();?>
<?php 
$user['subMenu'] = $this->db->get('user_sub_menu')->result_array();?>
<?php
$data['title'] = 'Menu Management';?>
<?php $this->load->view('templates/topbar',$user);?>
<?php $this->load->view('templates/sidebar',$user);?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <?php $this->load->view('templates/header',$user);?>   

  <?php echo $main_view;?>   
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.1-pre
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
<!-- DataTables -->
<!-- <script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script> -->
<!-- <script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script> -->

<script src="<?= base_url(); ?>assets/datatables/DataTables-1.10.20/js/jquery.dataTables.js"></script> 
<script src="<?= base_url(); ?>assets/datatables/DataTables-1.10.20/js/jquery.dataTables.min.js" ></script>
<script src="<?= base_url(); ?>assets/datatables/DataTables-1.10.20/js/dataTables.jqueryui.min.js" ></script>
<!-- <script src="<?= base_url(); ?>assets/datatables/DataTables-1.10.20/js/jquery.dataTables.js"></script> -->

<script src="<?= base_url(); ?>assets/datatables/Responsive-2.2.3/js/responsive.bootstrap4.min.js" ></script>
<script src="<?= base_url(); ?>assets/datatables/Buttons-1.6.1/js/buttons.bootstrap4.min.js" ></script>
<script src="<?= base_url(); ?>assets/datatables/Scroller-2.0.1/js/scroller.bootstrap4.min.js" ></script>


<!-- Custom scripts for Sweetalert-->
<script src="<?= base_url(); ?>assets/js/SweetAlert/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/js/SweetAlert/myscript.js"></script>
<!-- <script src="<?= base_url(); ?>assets/js/bootstrap-datepicker.min.js')?>"></script> -->


<!--User -->


<script type="text/javascript"> // Tabel User ---------------------------------------------------
var save_user_method; //for save method string
var table_user;
$(document).ready(function() {
    //datatables

// Data Table User --------------------------------------------------------------------------------------
    table = $('#table_user').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "rowReorder": {
            		"selector": "td:nth-child(2)"
			},
	"responsive": true,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?=site_url('admin/ajax_list_user'); ?>",
            "type": "POST"

        },
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
    });

    //datepicker
    //  $('.datepicker').datepicker({
    //         autoclose: true,
    //         format: "yyyy-mm-dd",
    //         todayHighlight: true,
    //         orientation: "top auto",
    //         todayBtn: true,
    //         todayHighlight: true,  
    //     });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    });
// End Data Table User --------------------------------------------------------------------------------------

// Tambah Data Table User --------------------------------------------------------------------------------------
    function add_user()
    {
        save_method = 'add';
        $('#form_user')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_user').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add User'); // Set Title to Bootstrap modal title
    }
// End Tambah Data Table User --------------------------------------------------------------------------------------

// Edit Data Table User --------------------------------------------------------------------------------------
    function edit_user(id)
    {
        save_method = 'update';
        $('#form_user')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?=site_url('admin/ajax_edit_user/');?>" + id,
            beforeSend :function () { // swetalert ----------------------
                        swal({
                            title: 'Menunggu',
                            html: 'Memproses data',
                            timer: 500,
                            onOpen: () => {
                              swal.showLoading()
                            }
                          })      
                        },
                    //   data: {editnama:editnama,editalamat:editalamat,id:id}, // ambil datanya dari form yang ada di variabel

        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_dd_user"]').val(data.id_dd_user);
            $('[name="name"]').val(data.name);
            $('[name="username"]').val(data.username);
            $('[name="role_id"]').val(data.role_id);
            $('[name="id_active"]').val(data.id_active);

	         $('[name="username"]').attr('readonly', 'readonly');

            $('#modal_user').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit User'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
// End Edit Data Table User --------------------------------------------------------------------------------------

// Reload Data Table User --------------------------------------------------------------------------------------
    function reload_table_user()
    {
    $('#table_user').DataTable().ajax.reload();
    }
// End Reload Data Table User --------------------------------------------------------------------------------------

// Save Data Table User --------------------------------------------------------------------------------------
    function save()
    {
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url ="<?php echo site_url('admin/ajax_add_user')?>";
    } else {
        url ="<?php echo site_url('admin/ajax_update_user'); ?>";
    }

      // ajax adding data to database
        $.ajax({
        url : url,
        beforeSend :function () { // swetalert ----------------------
                        swal({
                            title: 'Menunggu',
                            html: 'Memproses data',
                            timer: 500,
                            onOpen: () => {
                              swal.showLoading()
                            }
                          })      
                        }, // Batas swetalert ------------------------

        type: "POST",
        data: $('#form_user').serialize(),
        dataType: "JSON",
        success: function(data)
        {
        if(data.status) //if success close modal and reload ajax table
            {
                reload_table_user();
                swal({
                    type: 'success',
                    title: 'Update User',
                    text: 'Anda Berhasil Mengubah Data User'
                })
                $('#modal_user').modal('hide'); 
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
          },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
        }
    });
    }
// End Save Data Table User --------------------------------------------------------------------------------------

// Delete Data Table User --------------------------------------------------------------------------------------
    function delete_user(id)
    {
        if(confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('admin/ajax_delete_user')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    //if success reload ajax table
                    $('#modal_user').modal('hide');
                    reload_table_user();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });
        }
    }
// End Delete Data Table User --------------------------------------------------------------------------------------

</script> 


<script type="text/javascript"> // Tabel Surat Masuk --------------------------------------------------------------
var save_masuk_method; //for save method string
var table_masuk;
$(document).ready(function() {
    //datatables

// Data Table Surat Masuk --------------------------------------------------------------------------------------
    table = $('#table_masuk').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "rowReorder": {
            		"selector": "td:nth-child(2)"
			},
	    "responsive": true,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?=site_url('surat/ajax_list_masuk'); ?>",
            "type": "POST"

        },
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
    });

     //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    });
// End Data Table Surat Masuk --------------------------------------------------------------------------------------

// Tambah Data Table Surat Masuk --------------------------------------------------------------------------------------
    function add_masuk(){
        save_masuk_method = 'add';
        $('#form_masuk')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        
        $('[name="nomor"]').removeAttr('readonly', 'readonly');
    
        $('[name="tgl_terima"]').removeAttr('readonly', 'readonly');
        $('[name="tgl_surat"]').removeAttr('readonly', 'readonly');
        $('[name="tgl_input"]').removeAttr('readonly', 'readonly');
        $('[name="penerima"]').removeAttr('readonly', 'readonly');
        $('[name="hal"]').removeAttr('readonly', 'readonly');
        $('[name="agendaris"]').removeAttr('readonly', 'readonly');
        $('[name="status"]').removeAttr('readonly', 'readonly');
        $('[name="kepada"]').removeAttr('readonly', 'readonly');
        $('[name="alamat_pengirim"]').removeAttr('readonly', 'readonly');
        $('[name="pengirim"]').removeAttr('readonly', 'readonly');

        $('#modal_masuk').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add masuk'); // Set Title to Bootstrap modal title
    }
// End Tambah Data Table Surat Masuk --------------------------------------------------------------------------------------

// Edit Data Table Surat Masuk --------------------------------------------------------------------------------------
    function edit_masuk(id){
        save_masuk_method = 'update';
        $('#form_masuk')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('surat/ajax_edit_masuk/');?>" + id,
            beforeSend :function () { // swetalert ----------------------
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                timer: 500,
                                onOpen: () => {
                                swal.showLoading()
                                }
                            })      
                            }, // Batas swetalert ------------------------
            type: "GET",
            enctype:"multipart/form-data",
            dataType: "JSON",
            success: function(data)
            {
            $('[name="id_tc_surat_masuk"]').val(data.id_tc_surat_masuk);
            $('[name="tgl_terima"]').val(data.tgl_terima);
            $('[name="tgl_surat"]').val(data.tgl_surat);
            $('[name="tgl_input"]').val(data.tgl_input);
            $('[name="penerima"]').val(data.penerima);
            $('[name="nomor"]').val(data.nomor);
            $('[name="hal"]').val(data.hal);
            $('[name="agendaris"]').val(data.agendaris);
            $('[name="status"]').val(data.status);
            $('[name="kepada"]').val(data.kepada);
            //    $('[name="keterangan"]').val(data.keterangan);
            $('[name="alamat_pengirim"]').val(data.alamat_pengirim);
            $('[name="pengirim"]').val(data.pengirim);
            //    $('[name="url_scan"]').val(data.url_scan);

            $('[name="nomor"]').attr('readonly', 'readonly');
        
                $('[name="tgl_terima"]').removeAttr('readonly', 'readonly');
                $('[name="tgl_surat"]').removeAttr('readonly', 'readonly');
                $('[name="tgl_input"]').removeAttr('readonly', 'readonly');
                $('[name="penerima"]').removeAttr('readonly', 'readonly');
                $('[name="hal"]').removeAttr('readonly', 'readonly');
                $('[name="agendaris"]').removeAttr('readonly', 'readonly');
                $('[name="status"]').removeAttr('readonly', 'readonly');
                $('[name="kepada"]').removeAttr('readonly', 'readonly');
                $('[name="alamat_pengirim"]').removeAttr('readonly', 'readonly');
                $('[name="pengirim"]').removeAttr('readonly', 'readonly');

                $('#modal_masuk').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Masuk'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
// End Edit Data Table Surat Masuk --------------------------------------------------------------------------------------

// Reload Data Table Surat Masuk --------------------------------------------------------------------------------------
    function reload_table_masuk()
    {
        $('#table_masuk').DataTable().ajax.reload();
    }
// End Reload Data Table Surat Masuk --------------------------------------------------------------------------------------

// Save Data Table Surat Masuk --------------------------------------------------------------------------------------
    function save_masuk()
        {
        $('#btnSave_masuk').text('saving...'); //change button text
        $('#btnSave_masuk').attr('disabled',true); //set button disable 
        var url;
        var form10 = $('#form_masuk')[0];
            // Create an FormData object 
            var data = new FormData(form10);

        if(save_masuk_method == 'add'){
            url ="<?php echo site_url('surat/ajax_add_masuk')?>";
        } else {
            url ="<?php echo site_url('surat/ajax_update_masuk'); ?>";
        }
        // ajax adding data to database
            $.ajax({
            url : url,
            type: "POST",
            enctype: 'multipart/form-data',
            data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
            dataType: "JSON",

            success: function(data)
            {
            if(data.status === false)//if success close modal and reload ajax table
                {
                    alert(data.kliru);
                }
                else
                {
                    // alert(data.kliru);
                    reload_table_masuk();
                    swal({
                        type: 'success',
                        title: 'Data Surat Masuk',
                        text: 'Anda Berhasil Memasukkan Surat Masuk'
                    })
                    $('#modal_masuk').modal('hide');
                    
                }
                $('#btnSave_masuk').text('save'); //change button text
                $('#btnSave_masuk').attr('disabled',false); //set button enable 
            },
            error: function (jqXHR, textStatus, errorThrown)
                {
                alert('Error adding / update data');
                $('#btnSave_masuk').text('save'); //change button text
                $('#btnSave_masuk').attr('disabled',false); //set button enable 
            }
        });
        }
// End Save Data Table Surat Masuk --------------------------------------------------------------------------------------

// Delete Data Table Surat Masuk --------------------------------------------------------------------------------------
    function delete_masuk(id){
        if(confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('surat/ajax_delete_masuk')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                //if success reload ajax table
                $('#modal_masuk').modal('hide');
                reload_table_masuk();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

        }
    }
// End Delete Data Table Surat Masuk --------------------------------------------------------------------------------------

// Detail Data Table Surat Masuk --------------------------------------------------------------------------------------
    function detail_masuk(id){
        // save_masuk_method = 'update';
        $('#form_detail_masuk')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('surat/ajax_detail_masuk/');?>" + id,
            beforeSend :function () { // swetalert ----------------------
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                timer: 500,
                                onOpen: () => {
                                swal.showLoading()
                                }
                            })      
                            }, // Batas swetalert ------------------------
            type: "GET",
            enctype:"multipart/form-data",
            dataType: "JSON",
            success: function(data)
            {
            // $('select[name="sub_category"]').empty();
            // $.each(data, function(key, value) {
            //     if(subcategory_id==value.subcategory_id){

            $('[name="id_tc_surat_masuk"]').val(data.id_tc_surat_masuk);
            $('[name="tgl_terima"]').val(data.tgl_terima);
            $('[name="tgl_surat"]').val(data.tgl_surat);
            $('[name="tgl_input"]').val(data.tgl_input);
            $('[name="penerima"]').val(data.penerima);
            $('[name="nomor"]').val(data.nomor);
            $('[name="hal"]').val(data.hal);
            $('[name="agendaris"]').val(data.agendaris);
            $('[name="status"]').val(data.status);
            $('[name="kepada"]').val(data.kepada);
            $('[name="keterangan"]').val(data.keterangan);
            $('[name="alamat_pengirim"]').val(data.alamat_pengirim);
            $('[name="pengirim"]').val(data.nm_persero);
            $('[name="komentar"]').val(data.komentar);
            //    $('[name="url_scan"]').val(data.url_scan);

            $('[name="nomor"]').attr('readonly', 'readonly');
            $('[name="tgl_terima"]').attr('readonly', 'readonly');
            $('[name="tgl_surat"]').attr('readonly', 'readonly');
            $('[name="tgl_input"]').attr('readonly', 'readonly');
            $('[name="penerima"]').attr('readonly', 'readonly');
            $('[name="hal"]').attr('readonly', 'readonly');
            $('[name="agendaris"]').attr('readonly', 'readonly');
            $('[name="status"]').attr('readonly', 'readonly');
            $('[name="kepada"]').attr('readonly', 'readonly');
            $('[name="alamat_pengirim"]').attr('readonly', 'readonly');
            $('[name="pengirim"]').attr('readonly', 'readonly');
            $('[name="komentar"]').attr('readonly', 'readonly');
            $('[name="keterangan"]').attr('readonly', 'readonly');

                $('#modal_detail_masuk').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Detail Surat Masuk'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
// End Detail Data Table Surat Masuk --------------------------------------------------------------------------------------

</script>

<script type="text/javascript"> // Tabel Surat Masuk (Keperluan) -------------------------------------------------------------
var save_diteruskan_method; //for save method string
var table_masuk;

// Reload Data Surat Masuk (Keperluan) --------------------------------------------------------------------------------------
    function reload_table_masuk()
        {
        $('#table_masuk').DataTable().ajax.reload();
        }
// End Reload Data Surat Masuk (Keperluan) --------------------------------------------------------------------------------------

// Edit Data Surat Masuk (Keperluan) --------------------------------------------------------------------------------------
    function edit_diteruskan(id)
    {
        save_diteruskan_method = 'update';
        $('#form_diteruskan_masuk')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?=site_url('surat/ajax_edit_diteruskan/');?>" + id,
            beforeSend :function () { // swetalert ----------------------
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                timer: 500,
                                onOpen: () => {
                                swal.showLoading()
                                }
                            })      
                            }, // Batas swetalert ------------------------
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id_tc_surat_masuk"]').val(data.id_tc_surat_masuk);
            $('[name="keperluan"]').val(data.keperluan);

                $('#modal_diteruskan_masuk').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Keperluan'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
// End Edit Data Surat Masuk (Keperluan) --------------------------------------------------------------------------------------

// Save Data Surat Masuk (Keperluan) --------------------------------------------------------------------------------------
    function save_diteruskan()
        {
        $('#btnSave_diteruskan').text('saving...'); //change button text
        $('#btnSave_diteruskan').attr('disabled',true); //set button disable 
        var url;

        if(save_diteruskan_method == 'add') {
            url ="<?php echo site_url('surat/ajax_add_diteruskan')?>";
        } else {
            url ="<?php echo site_url('surat/ajax_update_diteruskan'); ?>";
        }

        // ajax adding data to database
            $.ajax({
            url : url,
            beforeSend :function () { // swetalert ----------------------
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                timer: 500,
                                onOpen: () => {
                                swal.showLoading()
                                }
                            })      
                            }, // Batas swetalert ------------------------
            type: "POST",
            data: $('#form_diteruskan_masuk').serialize(),
            dataType: "JSON",
            success: function(data)
            {
            if(data.status === false)//if success close modal and reload ajax table
                {
                    alert(data.kliru);
                }
                else
                {
                    reload_table_masuk();
                    swal({
                        type: 'success',
                        title: 'Data Surat Masuk',
                        text: 'Anda Berhasil Memasukkan Surat Masuk'
                    })
                    $('#modal_diteruskan_masuk').modal('hide');
                    
                }
                $('#btnSave_diteruskan').text('save'); //change button text
                $('#btnSave_diteruskan').attr('disabled',false); //set button enable 
            },
            error: function (jqXHR, textStatus, errorThrown)
                {
                alert('Error adding / update data');
                $('#btnSave_diteruskan').text('save'); //change button text
                $('#btnSave_diteruskan').attr('disabled',false); //set button enable 
            }
        });
        }
// End Save Data Surat Masuk (Keperluan) --------------------------------------------------------------------------------------

</script>

<script type="text/javascript"> // Tabel Surat Masuk (Diterima) -------------------------------------------------------------
var save_diterima_method; //for save method string
var table_masuk;

// Reload Data Surat Masuk (Diterima) --------------------------------------------------------------------------------------
    function reload_table_masuk()
        {
        $('#table_masuk').DataTable().ajax.reload();
        }
// End Reload Data Surat Masuk (Diterima) --------------------------------------------------------------------------------------

// Edit Data Surat Masuk (Keperluan) --------------------------------------------------------------------------------------
    function edit_diterima(id)
    {
        save_diterima_method = 'update';
        $('#form_diterima_masuk')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?=site_url('surat/ajax_edit_diterima/');?>" + id,
            beforeSend :function () { // swetalert ----------------------
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                timer: 500,
                                onOpen: () => {
                                swal.showLoading()
                                }
                            })      
                            }, // Batas swetalert ------------------------
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
            $('[name="id_tc_surat_masuk"]').val(data.id_tc_surat_masuk);
            $('[name="flag_status"]').val(data.flag_status);

                $('#modal_diterima_masuk').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Diterima'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
// End Edit Data Surat Masuk (Keperluan) --------------------------------------------------------------------------------------

// Save Data Surat Masuk (Keperluan) --------------------------------------------------------------------------------------
    function save_diterima()
        {
        $('#btnSave_diterima').text('saving...'); //change button text
        $('#btnSave_diterima').attr('disabled',true); //set button disable 
        var url;

        if(save_diterima_method == 'add') {
            url ="<?php echo site_url('surat/ajax_add_diterima')?>";
        } else {
            url ="<?php echo site_url('surat/ajax_update_diterima'); ?>";
        }

        // ajax adding data to database
            $.ajax({
            url : url,
            beforeSend :function () { // swetalert ----------------------
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                timer: 500,
                                onOpen: () => {
                                swal.showLoading()
                                }
                            })      
                            }, // Batas swetalert ------------------------
            type: "POST",
            data: $('#form_diterima_masuk').serialize(),
            dataType: "JSON",
            success: function(data)
            {
            if(data.status === false)//if success close modal and reload ajax table
                {
                    alert(data.kliru);
                }
                else
                {
                    reload_table_masuk();
                    swal({
                        type: 'success',
                        title: 'Data Surat Masuk',
                        text: 'Anda Berhasil Memasukkan Surat Masuk'
                    })
                    $('#modal_diterima_masuk').modal('hide');
                    
                }
                $('#btnSave_diterima').text('save'); //change button text
                $('#btnSave_diterima').attr('disabled',false); //set button enable 
            },
            error: function (jqXHR, textStatus, errorThrown)
                {
                alert('Error adding / update data');
                $('#btnSave_diterima').text('save'); //change button text
                $('#btnSave_diterima').attr('disabled',false); //set button enable 
            }
        });
        }
// End Save Data Surat Masuk (Keperluan) --------------------------------------------------------------------------------------

</script>

<script type="text/javascript"> // Surat Masuk (Disposisi) ------------------------------------------------------------------
var save_disposisi_method; //for save method string
var table_masuk;

// Reload Data Surat Masuk (Disposisi) --------------------------------------------------------------------------------------
    function reload_table_masuk()
    {
        $('#table_masuk').DataTable().ajax.reload();
    }
// End Reload Data Surat Masuk (Disposisi) --------------------------------------------------------------------------------------

// Edit Data Surat Masuk (Disposisi) --------------------------------------------------------------------------------------
    function edit_disposisi(id)
    {
        save_disposisi_method = 'update';
        $('#form_disposisi')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?=site_url('surat/ajax_edit_disposisi/');?>" + id,
            beforeSend :function () { // swetalert ----------------------
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                timer: 500,
                                onOpen: () => {
                                swal.showLoading()
                                }
                            })      
                            }, // Batas swetalert ------------------------
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id_tc_surat_masuk"]').val(data.id_tc_surat_masuk);
            $('[name="keterangan"]').val(data.keterangan);
            $('[name="komentar"]').val(data.komentar);

            $('[name="komentar"]').removeAttr('readonly', 'readonly');
            //    $('[name="nomor"]').attr('readonly', 'readonly');

                $('#modal_disposisi').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Disposisi'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
// End Edit Data Surat Masuk (Disposisi) --------------------------------------------------------------------------------------

// Save Data Surat Masuk (Disposisi) --------------------------------------------------------------------------------------
    function save_disposisi()
        {
        $('#btnSave_disposisi').text('saving...'); //change button text
        $('#btnSave_disposisi').attr('disabled',true); //set button disable 
        var url;

        if(save_disposisi_method == 'add') {
            url ="<?php echo site_url('surat/ajax_add_disposisi')?>";
        } else {
            url ="<?php echo site_url('surat/ajax_update_disposisi'); ?>";
        }

        // ajax adding data to database
            $.ajax({
            url : url,
            beforeSend :function () { // swetalert ----------------------
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                timer: 500,
                                onOpen: () => {
                                swal.showLoading()
                                }
                            })      
                            }, // Batas swetalert ------------------------
            type: "POST",
            data: $('#form_disposisi').serialize(),
            dataType: "JSON",
            success: function(data)
            {
            if(data.status === false)//if success close modal and reload ajax table
                {
                    alert(data.kliru);
                }
                else
                {
                    reload_table_masuk();
                    swal({
                        type: 'success',
                        title: 'Data Surat Masuk',
                        text: 'Anda Berhasil Memasukkan Surat Masuk'
                    })
                    $('#modal_disposisi').modal('hide');
                    
                }
                $('#btnSave_disposisi').text('save'); //change button text
                $('#btnSave_disposisi').attr('disabled',false); //set button enable 
            },
            error: function (jqXHR, textStatus, errorThrown)
                {
                alert('Error adding / update data');
                $('#btnSave_disposisi').text('save'); //change button text
                $('#btnSave_disposisi').attr('disabled',false); //set button enable 
            }
        });
        }
// End Save Data Surat Masuk (Disposisi) --------------------------------------------------------------------------------------

</script>

<script type="text/javascript"> // Data tabel Surat Keluar ---------------------------------------------------------------
var save_keluar_method; //for save method string
var table_keluar;
$(document).ready(function() {
    //datatables

// Data Table Surat Keluar --------------------------------------------------------------------------------------   
        table = $('#table_keluar').DataTable({ 

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "rowReorder": {
                        "selector": "td:nth-child(2)"
                },
            "responsive": true,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?=site_url('surat/ajax_list_keluar'); ?>",
                "type": "POST"

            },
            //Set column definition initialisation properties.
            "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            ],
        });

        //datepicker
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,  
        });

        //set input/textarea/select event when change value, remove class error and remove text help block 
        $("input").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
    });
// End Data Table Surat Keluar --------------------------------------------------------------------------------------

// Tambah Data Table Surat Keluar -------------------------------------------------------------------------------------- 
    function add_keluar()
    {
        save_keluar_method = 'add';
        $('#form_keluar')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('[name="nomor"]').removeAttr('readonly', 'readonly');
        $('#modal_keluar').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add keluar'); // Set Title to Bootstrap modal title
    }
// End Tambah Data Table Surat Keluar -------------------------------------------------------------------------------------- 

// Edit Data Table Surat Keluar -------------------------------------------------------------------------------------- 
    function edit_keluar(id)
    {
        save_keluar_method = 'update';
        $('#form_keluar')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?=site_url('surat/ajax_edit_keluar/');?>" + id,
            beforeSend :function () { // swetalert ----------------------
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                timer: 500,
                                onOpen: () => {
                                swal.showLoading()
                                }
                            })      
                            }, // Batas swetalert ------------------------

            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id_tc_surat_keluar"]').val(data.id_tc_surat_keluar);
            $('[name="tgl_surat"]').val(data.tgl_surat);
            $('[name="tgl_kirim"]').val(data.tgl_kirim);
            $('[name="nomor"]').val(data.nomor);
            $('[name="hal"]').val(data.hal);
            $('[name="agendaris"]').val(data.agendaris);
            $('[name="id_mt_client"]').val(data.id_mt_client);
            $('[name="alamat"]').val(data.alamat);
            $('[name="tgl_input"]').val(data.tgl_input);
            $('[name="pengirim"]').val(data.pengirim);
            $('[name="url_scan"]').val(data.url_scan);
            //    $('[name="url_draft"]').val(data.url_draft);
            //    $('[name="url_lampiran"]').val(data.url_lampiran);
            //  $('[name="keterangan"]').val(data.keterangan);
                $('[name="nomor"]').attr('readonly', 'readonly');
                
                $('#modal_keluar').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Keluar'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
// End Edit Data Table Surat Keluar -------------------------------------------------------------------------------------- 

// Reload Data Table Surat Keluar --------------------------------------------------------------------------------------
    function reload_table_keluar()
        {
        $('#table_keluar').DataTable().ajax.reload();
        }
// End Reload Data Table Surat Keluar --------------------------------------------------------------------------------------

// Save Data Table Surat Keluar --------------------------------------------------------------------------------------
    function save_keluar()
        {
        $('#btnSave_keluar').text('saving...'); //change button text
        $('#btnSave_keluar').attr('disabled',true); //set button disable 
        var url;

        if(save_keluar_method == 'add') {
            url ="<?php echo site_url('surat/ajax_add_keluar')?>";
        } else {
            url ="<?php echo site_url('surat/ajax_update_keluar'); ?>";
        }

        // ajax adding data to database
            $.ajax({
            url : url,
            beforeSend :function () { // swetalert ----------------------
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                timer: 500,
                                onOpen: () => {
                                swal.showLoading()
                                }
                            })      
                            }, // Batas swetalert ------------------------

            type: "POST",
            data: $('#form_keluar').serialize(),
            dataType: "JSON",
            success: function(data)
            {
            if(data.status === false)//if success close modal and reload ajax table
                {
                    alert(data.kliru);
                }
                else
                {
                    reload_table_keluar();
                    swal({
                        type: 'success',
                        title: 'Data Surat Keluar',
                        text: 'Anda Berhasil Memasukkan Surat Keluar'
                    })
                    $('#modal_keluar').modal('hide');    
                }
                $('#btnSave_keluar').text('save'); //change button text
                $('#btnSave_keluar').attr('disabled',false); //set button enable 
            },
            error: function (jqXHR, textStatus, errorThrown)
                {
                alert('Error adding / update data');
                $('#btnSave_keluar').text('save'); //change button text
                $('#btnSave_keluar').attr('disabled',false); //set button enable 
            }
        });
        }
// End Save Data Table Surat Keluar --------------------------------------------------------------------------------------

// Delete Data Table Surat Keluar --------------------------------------------------------------------------------------
    function delete_keluar(id)
    {
        if(confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('surat/ajax_delete_keluar')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                //if success reload ajax table
                $('#modal_keluar').modal('hide');
                reload_table_keluar();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

        }
    }
// End Delete Data Table Surat Keluar --------------------------------------------------------------------------------------

</script>

<script type="text/javascript"> // Data Tabel Menu Management ------------------------------------------------------------
var save_menu_method; //for save method string
var table_menu; 
$(document).ready(function() {
    //datatables

// Data Table Menu Management --------------------------------------------------------------------------------------
        table = $('#table_menu').DataTable({ 

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "rowReorder": {
                        "selector": "td:nth-child(2)"
                },
            "responsive": true,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?=site_url('menu/ajax_list_menu'); ?>",
                "type": "POST"

            },
            //Set column definition initialisation properties.
            "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            ],
        });

        //datepicker
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,  
        });

        //set input/textarea/select event when change value, remove class error and remove text help block 
        $("input").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
    });
// End Data Table Menu Management --------------------------------------------------------------------------------------

// Tambah Data Table Menu Management --------------------------------------------------------------------------------------
    function add_menu()
    {
        save_menu_method = 'add';
        $('#form_menu')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_menu').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add Menu'); // Set Title to Bootstrap modal title
    }
// End Tambah Data Table Menu Management --------------------------------------------------------------------------------------

// Edit Data Table Menu Management --------------------------------------------------------------------------------------
    function edit_menu(id)
    {
        save_menu_method = 'update';
        $('#form_menu')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?=site_url('menu/ajax_edit_menu/');?>" + id,
            beforeSend :function () { // swetalert ----------------------
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                timer: 500,
                                onOpen: () => {
                                swal.showLoading()
                                }
                            })      
                            }, // Batas swetalert ------------------------
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id"]').val(data.id);
            $('[name="menu"]').val(data.menu);
            
            //  $('[name="keterangan"]').val(data.keterangan);             
                $('#modal_menu').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Menu'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
// End Edit Data Table Menu Management --------------------------------------------------------------------------------------

// Reload Data Table Menu Management --------------------------------------------------------------------------------------
    function reload_table_menu()
        {
        $('#table_menu').DataTable().ajax.reload();
        }
// End Reload Data Table Menu Management --------------------------------------------------------------------------------------

// Save Data Table Menu Management --------------------------------------------------------------------------------------
    function save_menu()
        {
        $('#btnSave_menu').text('saving...'); //change button text
        $('#btnSave_menu').attr('disabled',true); //set button disable 
        var url;

        if(save_menu_method == 'add') {
            url ="<?php echo site_url('menu/ajax_add_menu')?>";
        } else {
            url ="<?php echo site_url('menu/ajax_update_menu'); ?>";
        }

        // ajax adding data to database
            $.ajax({
            url : url,
            beforeSend :function () { // swetalert ----------------------
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                timer: 500,
                                onOpen: () => {
                                swal.showLoading()
                                }
                            })      
                            }, // Batas swetalert ------------------------
            type: "POST",
            data: $('#form_menu').serialize(),
            dataType: "JSON",
            success: function(data)
            {
            if(data.status === false)//if success close modal and reload ajax table
                {
                    alert(data.kliru);
                }
                else
                {
                    reload_table_menu();
                    swal({
                        type: 'success',
                        title: 'Data User Menu',
                        text: 'Anda Berhasil Memasukkan User Menu'
                    })
                    $('#modal_menu').modal('hide');
                }
                $('#btnSave_menu').text('save'); //change button text
                $('#btnSave_menu').attr('disabled',false); //set button enable 
            },
            error: function (jqXHR, textStatus, errorThrown)
                {
                alert('Error adding / update data');
                $('#btnSave_menu').text('save'); //change button text
                $('#btnSave_menu').attr('disabled',false); //set button enable 
            }
        });
        }
// End Save Data Table Menu Management --------------------------------------------------------------------------------------

// Delete Data Table Menu Management --------------------------------------------------------------------------------------
    function delete_menu(id)
    {
        if(confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('menu/ajax_delete_menu')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                //if success reload ajax table
                $('#modal_menu').modal('hide');
                reload_table_menu();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

        }
    }
// End Delete Data Table Menu Management --------------------------------------------------------------------------------------

</script>

<script type="text/javascript"> // Data Tabel SubMenu Management ------------------------------------------------------------
var save_submenu_method; //for save method string
var table_submenu; 
$(document).ready(function() {
        //datatables

// Data Table SubMenu Management --------------------------------------------------------------------------------------
        table = $('#table_submenu').DataTable({ 

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "rowReorder": {
                        "selector": "td:nth-child(2)"
                },
            "responsive": true,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?=site_url('menu/ajax_list_submenu'); ?>",
                "type": "POST"

            },
            //Set column definition initialisation properties.
            "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            ],
        });

        //datepicker
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,  
        });

        //set input/textarea/select event when change value, remove class error and remove text help block 
        $("input").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
    });
// End Data Table SubMenu Management --------------------------------------------------------------------------------------

// Tambah Data Table SubMenu Management --------------------------------------------------------------------------------------
    function add_submenu()
    {
        save_submenu_method = 'add';
        $('#form_submenu')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_submenu').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add SubMenu'); // Set Title to Bootstrap modal title
    }

// End Tambah Data Table SubMenu Management --------------------------------------------------------------------------------------

// Edit Data Table SubMenu Management --------------------------------------------------------------------------------------
    function edit_submenu(id)
    {
        save_submenu_method = 'update';
        $('#form_submenu')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?=site_url('menu/ajax_edit_submenu/');?>" + id,
            beforeSend :function () { // swetalert ----------------------
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                timer: 500,
                                onOpen: () => {
                                swal.showLoading()
                                }
                            })      
                            }, // Batas swetalert ------------------------

            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
            $('[name="id"]').val(data.id);
            $('[name="title"]').val(data.title);
            $('[name="menu_id"]').val(data.menu_id);
            $('[name="url"]').val(data.url);
            $('[name="icon"]').val(data.icon);
            $('[name="id_active"]').val(data.id_active);
            
            //  $('[name="keterangan"]').val(data.keterangan);             
                $('#modal_submenu').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit SubMenu'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
// End Edit Data Table SubMenu Management --------------------------------------------------------------------------------------

// Reload Data Table SubMenu Management --------------------------------------------------------------------------------------
    function reload_table_submenu()
        {
        $('#table_submenu').DataTable().ajax.reload();
        }
// End Reload Data Table SubMenu Management --------------------------------------------------------------------------------------

// Save Data Table SubMenu Management --------------------------------------------------------------------------------------
    function save_submenu()
        {
        $('#btnSave_submenu').text('saving...'); //change button text
        $('#btnSave_submenu').attr('disabled',true); //set button disable 
        var url;

        if(save_submenu_method == 'add') {
            url ="<?php echo site_url('menu/ajax_add_submenu')?>";
        } else {
            url ="<?php echo site_url('menu/ajax_update_submenu'); ?>";
        }

        // ajax adding data to database
            $.ajax({
            url : url,
            beforeSend :function () { // swetalert ----------------------
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                timer: 500,
                                onOpen: () => {
                                swal.showLoading()
                                }
                            })      
                            }, // Batas swetalert ------------------------

            type: "POST",
            data: $('#form_submenu').serialize(),
            dataType: "JSON",
            success: function(data)
            {
            if(data.status === false)//if success close modal and reload ajax table
                {
                    alert(data.kliru);
                }
                else
                {
                    reload_table_submenu();
                    swal({
                        type: 'success',
                        title: 'Data SubMenu',
                        text: 'Anda Berhasil Memasukkan Data SubMenu'
                    })
                    $('#modal_submenu').modal('hide');
                    
                }
                $('#btnSave_submenu').text('save'); //change button text
                $('#btnSave_submenu').attr('disabled',false); //set button enable 
            },
            error: function (jqXHR, textStatus, errorThrown)
                {
                alert('Error adding / update data');
                $('#btnSave_submenu').text('save'); //change button text
                $('#btnSave_submenu').attr('disabled',false); //set button enable 
            }
        });
        }
// End Save Data Table SubMenu Management --------------------------------------------------------------------------------------

// Delete Data Table SubMenu Management --------------------------------------------------------------------------------------
    function delete_submenu(id)
    {
        if(confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('menu/ajax_delete_submenu')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                //if success reload ajax table
                $('#modal_submenu').modal('hide');
                reload_table_submenu();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });
        }
    }
// End Delete Data Table SubMenu Management --------------------------------------------------------------------------------------

</script>

<script type="text/javascript"> // Data Tabel Role ----------------------------------------------------------------------
var save_role_method; //for save method string
var table_role; 
$(document).ready(function() {
        //datatables
// Data Table Role --------------------------------------------------------------------------------------        
        table = $('#table_role').DataTable({ 

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "rowReorder": {
                        "selector": "td:nth-child(2)"
                },
            "responsive": true,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?=site_url('admin/ajax_list_role'); ?>",
                "type": "POST"

            },
            //Set column definition initialisation properties.
            "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            ],
        });

        //datepicker
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,  
        });

        //set input/textarea/select event when change value, remove class error and remove text help block 
        $("input").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
    });
// End Data Table Role --------------------------------------------------------------------------------------        

// Tambah Data Table Role --------------------------------------------------------------------------------------        
    function add_role()
    {
        save_role_method = 'add';
        $('#form_role')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_role').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add Role'); // Set Title to Bootstrap modal title
    }
// Edit Tambah Data Table Role --------------------------------------------------------------------------------------        

// Edit Data Table Role --------------------------------------------------------------------------------------        
    function edit_role(id)
    {
        save_role_method = 'update';
        $('#form_role')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?=site_url('admin/ajax_edit_role/');?>" + id,
            beforeSend :function () { // swetalert ----------------------
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                timer: 500,
                                onOpen: () => {
                                swal.showLoading()
                                }
                            })      
                            }, // Batas swetalert ------------------------
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id"]').val(data.id);
            $('[name="role"]').val(data.role);
            $('[name="n_menu"]').val(data.n_menu);
            
            //  $('[name="keterangan"]').val(data.keterangan);             
                $('#modal_role').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Role'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
// End Edit Data Table Role --------------------------------------------------------------------------------------        

// Reload Data Table Role --------------------------------------------------------------------------------------        
    function reload_table_role()
        {
        $('#table_role').DataTable().ajax.reload();
        }
// End Reload Data Table Role --------------------------------------------------------------------------------------        

// Save Data Table Role --------------------------------------------------------------------------------------        
    function save_role()
        {
        $('#btnSave_role').text('saving...'); //change button text
        $('#btnSave_role').attr('disabled',true); //set button disable 
        var url;

        if(save_role_method == 'add') {
            url ="<?php echo site_url('admin/ajax_add_role')?>";
        } else {
            url ="<?php echo site_url('admin/ajax_update_role'); ?>";
        }

        // ajax adding data to database
            $.ajax({
            url : url,
            beforeSend :function () { // swetalert ----------------------
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                timer: 500,
                                onOpen: () => {
                                swal.showLoading()
                                }
                            })      
                            }, // Batas swetalert ------------------------
            type: "POST",
            data: $('#form_role').serialize(),
            dataType: "JSON",
            success: function(data)
            {
            if(data.status === false)//if success close modal and reload ajax table
                {
                    alert(data.kliru);
                }
                else
                {
                    reload_table_role();
                    swal({
                        type: 'success',
                        title: 'Data User Role',
                        text: 'Anda Berhasil Memasukkan Data Role'
                    })
                    $('#modal_role').modal('hide');  
                }
                $('#btnSave_role').text('save'); //change button text
                $('#btnSave_role').attr('disabled',false); //set button enable 
            },
            error: function (jqXHR, textStatus, errorThrown)
                {
                alert('Error adding / update data');
                $('#btnSave_role').text('save'); //change button text
                $('#btnSave_role').attr('disabled',false); //set button enable 
            }
        });
        }
// End Save Data Table Role --------------------------------------------------------------------------------------        

// Delete Data Table Role --------------------------------------------------------------------------------------        

    function delete_role(id)
    {
        if(confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('admin/ajax_delete_role')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                //if success reload ajax table  
                $('#modal_role').modal('hide');
                reload_table_role();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });
        }
    }

// End Delete Data Table Role --------------------------------------------------------------------------------------        

</script>

<script type="text/javascript">
var save_access_method; //for save method string
var table_access; 
$(document).ready(function() {
    //datatables
// Data Table Access --------------------------------------------------------------------------------------            
    table = $('#table_access').DataTable({ 

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "rowReorder": {
                            "selector": "td:nth-child(2)"
                    },
                "responsive": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?=site_url('admin/ajax_list_access'); ?>",
                    "type": "POST"

                },
                //Set column definition initialisation properties.
                "columnDefs": [
                { 
                    "targets": [ -1 ], //last column
                    "orderable": false, //set not orderable
                },
                ],
            });

            //datepicker
            $('.datepicker').datepicker({
                autoclose: true,
                format: "yyyy-mm-dd",
                todayHighlight: true,
                orientation: "top auto",
                todayBtn: true,
                todayHighlight: true,  
            });

            //set input/textarea/select event when change value, remove class error and remove text help block 
            $("input").change(function(){
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function(){
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function(){
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
// End Data Table Access --------------------------------------------------------------------------------------            

// Edit Data Table Access --------------------------------------------------------------------------------------            
    function edit_access(id)
    {
        save_access_method = 'update';
        $('#form_access')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?=site_url('admin/ajax_edit_access/');?>" + id,
            beforeSend :function () { // swetalert ----------------------
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                timer: 500,
                                onOpen: () => {
                                swal.showLoading()
                                }
                            })      
                            }, // Batas swetalert ------------------------
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id"]').val(data.id);
                $('[name="access"]').val(data.access);
            
                        
                $('#modal_access').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Access'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

// End Edit Data Table Access --------------------------------------------------------------------------------------            

// Reload Data Table Access --------------------------------------------------------------------------------------            
    function reload_table_access()
        {
        $('#table_access').DataTable().ajax.reload();
        }
// End Reload Data Table Access --------------------------------------------------------------------------------------            

// Save Data Table Access --------------------------------------------------------------------------------------            
    function save_access()
        {
        $('#btnSave_access').text('saving...'); //change button text
        $('#btnSave_access').attr('disabled',true); //set button disable 
        var url;

        if(save_access_method == 'add') {
            url ="<?php echo site_url('admin/ajax_add_access')?>";
        } else {
            url ="<?php echo site_url('admin/ajax_update_access'); ?>";
        }

        // ajax adding data to database
            $.ajax({
            url : url,
            beforeSend :function () { // swetalert ----------------------
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                timer: 500,
                                onOpen: () => {
                                swal.showLoading()
                                }
                            })      
                            }, // Batas swetalert ------------------------
            type: "POST",
            data: $('#form_access').serialize(),
            dataType: "JSON",
            success: function(data)
            {
            if(data.status === false)//if success close modal and reload ajax table
                {
                    alert(data.kliru);
                }
                else
                {
                    reload_table_access();
                    swal({
                        type: 'success',
                        title: 'Data User Role',
                        text: 'Anda Berhasil Memasukkan Data Access'
                    })
                    $('#modal_access').modal('hide');  
                }
                $('#btnSave_access').text('save'); //change button text
                $('#btnSave_access').attr('disabled',false); //set button enable 
            },
            error: function (jqXHR, textStatus, errorThrown)
                {
                alert('Error adding / update data');
                $('#btnSave_access').text('save'); //change button text
                $('#btnSave_access').attr('disabled',false); //set button enable 
            }
        });
        }
// End Save Data Table Access --------------------------------------------------------------------------------------            

// Delete Data Table Access --------------------------------------------------------------------------------------            
    function delete_access(id)
    {
        if(confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('admin/ajax_delete_access')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                //if success reload ajax table  
                $('#modal_access').modal('hide');
                reload_table_access();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });
        }
    }
// End Delete Data Table Access --------------------------------------------------------------------------------------            

</script>


</body>
</html>

