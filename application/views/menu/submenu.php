
<div class="card ">
  <h4 class="card-header m-0 font-weight-bold text-primary">DATA SUBMENU MANAGEMENT</h4>
  <div class="card-body">
  <button class="btn btn-success" onclick="add_submenu()"><i class="glyphicon glyphicon-plus"></i> Add SubMenu</button>
	<button class="btn btn-default" onclick="reload_table_submenu()"> Reload <i class="fas fa-retweet"></i></button>

<div class="table-responsive mt-3">
    <table id="table_submenu" class="table display responsive hover" width="100%">
<thead>


<tr>
<th scope="col">No</th>
<th scope="col">Title</th>
<th scope="col">Menu</th>
<th scope="col">Url</th>
<th scope="col">Icon</th>
<th scope="col">Active</th>
<th scope="col">Action</th>

</tr>
</thead>
<tbody></tbody>
</table>

<div class="modal fade" id="modal_submenu" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body form">
	<form action="#" id="form_submenu" class="form-horizontal">
	<div class="form-body">
	<input type="hidden" value="id" name="id"/> 
 	

	<div class="form-group">
	<label class="control-label col-md-6">Title</label>
		<div class="col-md-9">
 	<input type="text" class="form-control input-sm" id="title" name="title">
		<span class="help-block"></span>
		</div>
	</div>
	<div class="form-group">
    <label class="control-label col-md-3">Menu</label>
     <div class="col-md-9">
         <select name="menu_id" id="menu_id" class="form-control">
				 <option value="">--Select Tujuan--</option>
				 <?php foreach($menu as $cl) : ?>
                <option value="<?= $cl['id'] ?>"> <?= $cl['menu'] ?></option>
                <?php endforeach ?>
          </select>
          <span class="help-block"></span>
      </div>
  </div>
	<div class="form-group">
	<label class="control-label col-md-6">Url</label>
		<div class="col-md-9">
 	<input type="text" class="form-control input-sm" id="url" name="url">
		<span class="help-block"></span>
		</div>
	</div>

	<div class="form-group">
	<label class="control-label col-md-6">Icon</label>
		<div class="col-md-9">
 	<input type="text" class="form-control input-sm" id="icon" name="icon">
		<span class="help-block"></span>
		</div>
	</div>

  <div class="form-group">
  <div class="form-check">
  <input class="form-check-input" type="checkbox" 
  value="1" name="id_active" id="id_active" checked>
  <label class="form-check-label" for="id_active" >
    Active ?
  </label>
  </div>
</div>

	</div>
	</form>
	</div>
            <div class="modal-footer justify-content-between">
            <button type="button" id="btnSave_submenu" onclick="save_submenu()" class="btn btn-primary">Save</button>
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