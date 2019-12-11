
<div class="card ">
  <h4 class="card-header m-0 font-weight-bold text-primary">DATA SURAT KELUAR</h4>
  <div class="card-body">
  <button class="btn btn-success" onclick="add_keluar()"><i class="glyphicon glyphicon-plus"></i> Add Surat Keluar</button>
	<button class="btn btn-default" onclick="reload_table_keluar()"> Reload <i class="fas fa-retweet"></i></button>

<div class="table-responsive mt-3">
    <table class="table table-bordered table-striped" id="table_keluar">
<thead>


<tr>
<th scope="col">No</th>
<th scope="col">Tanggal Surat</th>
<th scope="col">Tanggal Kirim</th>
<th scope="col">Nomor</th>
<th scope="col">Hal</th>
<th scope="col">Kepada</th>
<th scope="col">Alamat</th>
<th scope="col">Pengirim</th>
<th scope="col">Keterangan</th>
<th scope="col">Action</th>

</tr>
</thead>
<tbody></tbody>
</table>

<div class="modal fade" id="modal_keluar">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						<form action="#" id="form_keluar" class="form-horizontal" method="post" enctype="multipart/form-data" >
            <div class="modal-body">
						<input type="hidden" value="id_tc_surat_keluar" name="id_tc_surat_keluar"/> 

  <div class="form-row">
    <div class="col">
		<label class="control-label col-md-6">Tanggal Surat</label>
    <input type="date" class="form-control input-sm" id="tgl_surat" name="tgl_surat">
    </div>
    <div class="col">
		<label class="control-label col-md-6">Tanggal Kirim</label>
		<input type="date" class="form-control input-sm" id="tgl_kirim" name="tgl_kirim">
    </div>
  </div>


	<div class="form-row mt-3">
    <div class="col">
		<label class="control-label col-md-6">Nomor Surat</label>
		<input type="text" class="form-control input-sm" id="nomor" name="nomor">
    </div>
    <div class="col">
		<label class="control-label col-md-6">Pengirim Surat</label>
		<select name="pengirim" id="pengirim" class="form-control">
				 <option value="">--Select Pengirim--</option>
          <option value="nusamed healthcare"> nusamed healthcare</option>
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

	 <div class="form-group mt-3">
	 <label class="control-label col-md-6">Keterangan</label>
		 <div class="col-md-12">
		 <textarea type="text" class="form-control" id="keterangan" name="keterangan"> </textarea>
		 <span class="help-block"></span>
		 </div>
	 </div>

 	<div class="form-row mt-3">
    <div class="col">
		<label class="control-label col-md-6">Keapada</label>
		<select name="id_mt_client" id="id_mt_client" class="form-control">
				 <option value="">--Select Tujuan--</option>
				 <?php foreach($client as $cl) : ?>
                <option value="<?= $cl['id_mt_client'] ?>"> <?= $cl['nm_persero'] ?></option>
                <?php endforeach ?>
          </select>
    </div>
    <div class="col">
		<label class="control-label col-md-6">Alamat</label>
		<input type="text" class="form-control input-sm" id="alamat" name="alamat">
    </div>
  </div>


	<div class="form-row mt-3">
    <div class="col">
		<label class="control-label col-md-6">File Upload</label>
		<input type="file" class="form-control input-sm" id="url_scan" name="url_scan">
    </div>
  </div>
	
<div class="form-group mt-3">
  <div class="form-check">
	<label class="form-check-label" for="status_surat" > Rahasia ? <i class="fa fa-edit ml-2"></i></label>
  <input class="form-check-input" type="checkbox" value="Rahasia" name="status_surat" id="status_surat" >
  </div>
</div>
    </div>
        <div class="modal-footer justify-content-between">
				<button type="button" id="btnSave_keluar" onclick="save_keluar()" class="btn btn-primary">Save</button>
	      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      </div>
      <!-- /.modal -->