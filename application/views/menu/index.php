
<div class="card ">
  <h4 class="card-header m-0 font-weight-bold text-primary">MENU MANAGEMENT</h4>
  <div class="card-body">
  <button class="btn btn-success" onclick="add_menu()"><i class="glyphicon glyphicon-plus"></i> Add Menu Managemnt</button>
	<button class="btn btn-default" onclick="reload_table_menu()"> Reload <i class="fas fa-retweet"></i></button>

<div class="table-responsive mt-3">
    <table id="table_menu" class="table display responsive nowrap" width="100%">
<thead>

<tr>
<th scope="col">No</th>
<th scope="col">Menu Management</th>
<th scope="col">Action</th>

</tr>
</thead>
<tbody></tbody>
</table>

<div class="modal fade" id="modal_menu" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body form">
	<form action="#" id="form_menu" class="form-horizontal">
	<div class="form-body">
	<input type="hidden" value="id" name="id"/> 
 	

	<div class="form-group">
	<label class="control-label col-md-6">Menu Management</label>
		<div class="col-md-9">
 	<input type="text" class="form-control input-sm" id="menu" name="menu">
		<span class="help-block"></span>
		</div>
	</div>
	
	</div>
	</form>
	</div>
            <div class="modal-footer justify-content-between">
            <button type="button" id="btnSave_menu" onclick="save_menu()" class="btn btn-primary">Save</button>
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