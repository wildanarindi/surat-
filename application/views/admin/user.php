
<div class="card ">
  <h4 class="card-header m-0 font-weight-bold text-primary"><?= $title; ?></h4>
  <div class="card-body">
	<button class="btn btn-default" onclick="reload_table_user()"> Reload <i class="fas fa-retweet"></i></button>
<div class="table-responsive mt-3">
    <table id="table_user" class="table display responsive nowrap" width="100%">
<thead>
<tr>
<th scope="col">No</th>
<th scope="col">Name</th>
<th scope="col">Username</th>
<th scope="col">Role</th>
<th scope="col">Active</th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody></tbody>
</table>

<div class="modal fade" id="modal_user" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body form">
	<form action="#" id="form_user" class="form-horizontal">
	<div class="form-body">
	<input type="hidden" value="id_dd_user" name="id_dd_user"/> 
 	

	<div class="form-group">
	<label class="control-label col-md-3">Nama</label>
		<div class="col-md-9">
 	<input type="text" class="form-control input-sm" id="name" name="name">
		<span class="help-block"></span>
		</div>
	</div>

	<div class="form-group">
	<label class="control-label col-md-3">Username</label>
		<div class="col-md-9">
 	<input type="text" class="form-control input-sm" id="username" name="username">
		<span class="help-block"></span>
		</div>
	</div>

	<div class="form-group">
    <label class="control-label col-md-3">Role</label>
     <div class="col-md-9">
     <select name="role_id" id="role_id" class="form-control">
        <option value="">---Select Role</option>
        <?php foreach($role as $m) : ?>
        <option value="<?= $m['id']; ?>"><?=$m['role']; ?></option>
        <?php endforeach; ?>
        </select>
          <span class="help-block"></span>
      </div>
  </div>

  <div class="form-group">
	<label class="control-label col-md-3">aktive</label>
		<div class="col-md-9">
 	<input type="text" class="form-control input-sm" id="id_active" name="id_active">
		<span class="help-block"></span>
		</div>
	</div>

	</div>
	</form>
	</div>
            <div class="modal-footer justify-content-between">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </div>
      </div>
      <!-- /.modal -->