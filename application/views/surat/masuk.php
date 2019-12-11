
<div class="card ">
  <h4 class="card-header m-0 font-weight-bold text-primary">DATA SURAT MASUK</h4>
  <div class="card-body">
  <?php if($this->session->userdata('role_id') == '1'){  ?> 
  <button class="btn btn-success" onclick="add_masuk()"><i class="glyphicon glyphicon-plus"></i> Add Surat Masuk</button>
  <?php } ?> 
	<button class="btn btn-default" onclick="reload_table_masuk()"> Reload <i class="fas fa-retweet"></i></button>


<div class="table-responsive mt-3">
    <table id="table_masuk" class="table display responsive nowrap" width="100%">
<thead>

<tr>
<th scope="col">No</th>
<th scope="col">View</th>
<th scope="col">Tanggal Terima</th>
<th scope="col">Nomor</th>
<th scope="col">Perihal</th>
<th scope="col">Kepada</th>
<!-- <th scope="col">Alamat</th> -->
<th scope="col">Pengirim</th>
<th scope="col">Keterangan</th>
<th scope="col">Keperluan</th>
<th scope="col">Status</th>
<?php if($this->session->userdata('role_id') == '1'){  ?> 
<th scope="col">Action</th> 
<?php } ?> 
<?php if($this->session->userdata('role_id') == '2'){  ?> 
<th scope="col">Disposisi</th>
<?php } ?>
<?php if($this->session->userdata('role_id') == '4'){  ?> 
<th scope="col">Action</th>
<?php } ?> 
</tr>
</thead>
<tbody></tbody>
</table>

<div class="modal fade" id="modal_masuk">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						<form action="" id="form_masuk" class="form-horizontal" method="post" enctype="multipart/form-data" >
            <div class="modal-body">
						<input type="hidden" value="id_tc_surat_masuk" id="id_tc_surat_masuk" name="id_tc_surat_masuk"/> 


  <div class="form-row">
    <div class="col">
		<label class="control-label col-md-6">Tanggal Terima</label>
      <input type="date" class="form-control" id="tgl_terima" name="tgl_terima">
    </div>
    <div class="col">
		<label class="control-label col-md-6">Tanggal Surat</label>
      <input type="date" class="form-control" id="tgl_terima" name="tgl_terima" placeholder="State">
    </div>
  </div>

	<div class="form-row mt-3">
    <div class="col">
		<label class="control-label col-md-6">Nomor Surat</label>
		<input type="text" class="form-control input-sm" id="nomor" name="nomor">
    </div>
    <div class="col">
		<label class="control-label col-md-6">Penerima Surat</label>
		<select name="penerima" id="penerima" class="form-control">
					<option value="">--Select Penerima--</option>
								 <option value="Sekretariat"> Sekretariat </option>
					 </select>
    </div>
  </div>

 
	 <div class="form-group mt-3">
	 <label class="control-label col-md-6">Perihal</label>
		 <div class="col-md-12">
		 <textarea type="text" class="form-control" id="hal" name="hal"> </textarea>
		 <span class="help-block"></span>
		 </div>
	 </div>

	 <div class="form-group mt-3">
	 <label class="control-label col-md-6">Agenda</label>
		 <div class="col-md-12">
		 <textarea type="text" class="form-control" id="agendaris" name="agendaris"> </textarea>
		 <span class="help-block"></span>
		 </div>
	 </div>

 	<div class="form-row mt-3">
    <div class="col">
		<label class="control-label col-md-6">Pengirim</label>
			<select name="pengirim" id="pengirim" class="form-control">
					<option value="">--Select Pengirim--</option>
					<?php foreach($client as $cl) : ?>
								 <option value="<?= $cl['id_mt_client'] ?>"> <?= $cl['nm_persero'] ?></option>
								 <?php endforeach ?>
					 </select>
    </div>
    <div class="col">
		<label class="control-label col-md-6">Alamat Pengirim</label>
		<input type="text" class="form-control input-sm" id="alamat_pengirim" name="alamat_pengirim">
    </div>
  </div>

	<div class="form-row mt-3">
    <div class="col">
		<label class="control-label col-md-6">Kepada</label>
		<select name="kepada" id="kepada" class="form-control">
					<option value="">--Select Kepada--</option>
								 <option value="Kepala RSUW"> Kepala RSUW</option>
		</select>
    </div>
    <div class="col">
		<label class="control-label col-md-6">File Upload</label>
		<input type="file" id="url_scan" name="url_scan">
    </div>
  </div>
	
<div class="form-group mt-3">
  <div class="form-check">
	<label class="form-check-label" for="status" > Rahasia ? <i class="fa fa-edit ml-2"></i></label>
  <input class="form-check-input" type="checkbox" 
  value="Rahasia" name="status" id="status" >
 
  </div>
</div>
</form>
            </div>
            <div class="modal-footer justify-content-between">
						<button type="button" id="btnSave_masuk" onclick="save_masuk()" class="btn btn-primary">Save</button>
	          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<!-- // modaaal disposisi -->
<div class="modal fade" id="modal_disposisi" role="dialog">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body form">
	<form action="#" id="form_disposisi" class="form-horizontal">
	<div class="form-body">
	<input type="hidden" value="id_tc_surat_masuk" name="id_tc_surat_masuk"/> 
  <div class="card">
  <div class="card-header bg-primary">
  <h6 class="m-0 font-weight-bold text-white"><span>  Disposisi</span></h6>
  </div>
  <div class="card-body">
  <?php foreach($disposisi as $dis) : ?>
			<div class="form-group mt-2">
          <div class="custom-control custom-checkbox">
              <input class="minimal-red" type="checkbox" name="keterangan[]" value="<?= $dis['id'] ?>"> <?= $dis['type'] ?>
      </div>
	</div>
	<?php endforeach ?>
  </div>
</div>

<div class="card">
  <div class="card-header bg-primary">
  <h6 class="m-0 font-weight-bold text-white"><span>  Catatan</span></h6>
  </div>
  <div class="card-body">
  <div class="form-group">
		 <div class="col-md-12">
		 <textarea type="text" class="form-control" id="komentar" name="komentar"> </textarea>
		 <span class="help-block"></span>
		 </div>
	 </div>
  </div>
</div>


	</form>
	</div>
      <div class="modal-footer justify-content-between">
        <button type="button" id="btnSave_disposisi" onclick="save_disposisi()" class="btn btn-primary">Save</button>
	      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
         </div>
    </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </div>

<!-- // ----------------------------------------------------------------------------------------------------------- -->
      <div class="modal fade" id="modal_detail_masuk">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						<form action="" id="form_detail_masuk" class="form-horizontal" method="post" enctype="multipart/form-data" >
            <div class="modal-body">
						<input type="hidden" value="id_tc_surat_masuk" id="id_tc_surat_masuk" name="id_tc_surat_masuk"/> 

  <div class="form-row">
    <div class="col">
		<label class="control-label col-md-6">Tanggal Terima</label>
      <input type="date" class="form-control" id="tgl_terima" name="tgl_terima">
    </div>
    <div class="col">
		<label class="control-label col-md-6">Tanggal Surat</label>
      <input type="date" class="form-control" id="tgl_terima" name="tgl_terima" placeholder="State">
    </div>
  </div>

	<div class="form-row mt-3">
    <div class="col">
		<label class="control-label col-md-6">Nomor Surat</label>
		<input type="text" class="form-control input-sm" id="nomor" name="nomor">
    </div>
    <div class="col">
		<label class="control-label col-md-6">Penerima Surat</label>
    <input type="text" class="form-control" id="penerima" name="penerima" >
		<!-- <select name="penerima" id="penerima" class="form-control">
					<option value="">--Select Penerima--</option>
					<?php foreach($karyawan as $cl) : ?>
								 <option value="<?= $cl['nama_pegawai'] ?>"> <?= $cl['nama_pegawai'] ?></option>
								 <?php endforeach ?>
					 </select> -->
    </div>
  </div>

 
	 <div class="form-group mt-3">
	 <label class="control-label col-md-6">Perihal</label>
		 <div class="col-md-12">
		 <textarea type="text" class="form-control" id="hal" name="hal"> </textarea>
		 <span class="help-block"></span>
		 </div>
	 </div>

	 <div class="form-group mt-3">
	 <label class="control-label col-md-6">Agenda</label>
		 <div class="col-md-12">
		 <textarea type="text" class="form-control" id="agendaris" name="agendaris"> </textarea>
		 <span class="help-block"></span>
		 </div>
	 </div>

 	<div class="form-row mt-3">
    <div class="col">
		<label class="control-label col-md-6">Pengirim</label>
    <input type="text" class="form-control input-sm" id="pengirim" name="pengirim" >
			
    </div>
    <div class="col">
		<label class="control-label col-md-6">Alamat Pengirim</label>
		<input type="text" class="form-control input-sm" id="alamat_pengirim" name="alamat_pengirim">
    </div>
  </div>

	<div class="form-row mt-3">
    <div class="col">
		<label class="control-label col-md-6">Kepada</label>
    <input type="text" class="form-control input-sm" id="kepada" name="kepada">
    </div>
    <div class="col">
		<label class="control-label col-md-6">File Upload</label>
    <img src="<?= base_url ('surkeluar/'); ?>" class="img-thumbnail">
		<!-- <input type="file" id="url_scan" name="url_scan"> -->
    </div>
  </div>
	
<div class="form-group mt-3">
  <div class="form-check">
	<label class="form-check-label" for="status" > Rahasia ? <i class="fa fa-edit ml-2"></i></label>
  <input class="form-check-input" type="checkbox" 
  value="Rahasia" name="status" id="status" >
  </div>
</div>

<div class="card">
  <div class="card-header bg-warning">
  <h6 class="m-0 font-weight-bold text-dark"><span>  Disposisi</span></h6>
  </div>
  <div class="card-body">
  <div class="form-group">
	 <label class="control-label col-md-6">Keterangan</label>
		 <div class="col-md-12">
		 <textarea type="text" class="form-control" id="keterangan" name="keterangan"> </textarea>
		 <span class="help-block"></span>
		 </div>
	 </div>

   <div class="form-group mt-3">
	 <label class="control-label col-md-4">Catatan</label>
		 <div class="col-md-12">
		 <textarea type="text" class="form-control" id="komentar" name="komentar"> </textarea>
		 <span class="help-block"></span>
		 </div>
	 </div>
   </div>
</div>
</form>
            </div>
            <div class="modal-footer justify-content-between bg-primary">
						<!-- <button type="button" id="btnSave_masuk" onclick="save_masuk()" class="btn btn-primary">Save</button> -->
	          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal_diteruskan_masuk">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Small Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <form action="" id="form_diteruskan_masuk" class="form-horizontal" method="post" enctype="multipart/form-data" >
            <div class="modal-body">
						<input type="hidden" value="id_tc_surat_masuk" id="id_tc_surat_masuk" name="id_tc_surat_masuk"/> 
            
            <div class="form-row">
            <div class="col">
            <label class="control-label col-md-6">Diteruskan</label>
            <select name="keperluan" id="keperluan" class="form-control">
                  <option value="">--Diteruskan Kepada--</option>
                  <?php foreach($nama as $cl) : ?>
                        <option value="<?= $cl['name'] ?>"> <?= $cl['name'] ?></option>
                        <?php endforeach ?>
            </select>
            </div>
            </div>

            </form>
            <div class="modal-footer justify-content-between">
            <button type="button" id="btnSave_diteruskan" onclick="save_diteruskan()" class="btn btn-primary">Save</button>
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal_diterima_masuk">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Small Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <form action="" id="form_diterima_masuk" class="form-horizontal" method="post" enctype="multipart/form-data" >
            <div class="modal-body">
						<input type="hidden" value="id_tc_surat_masuk" id="id_tc_surat_masuk" name="id_tc_surat_masuk"/> 
            
            <div class="form-row">
            <div class="col">
            <label class="control-label col-md-6">Diterima</label>
            <select name="flag_status" id="flag_status" class="form-control" placeholder="Status">
                        <option value="Telah Diterima"> Diterima </option>
            </select>
            </div>
            </div>

            </form>
            <div class="modal-footer justify-content-between">
            <button type="button" id="btnSave_diterima" onclick="save_diterima()" class="btn btn-primary">Save</button>
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      </div>
      <!-- /.modal -->