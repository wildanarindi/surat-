<!-- Begin Page Content -->

<div class="container mt-3">
      <div class="card" style="background-color: #FFFFFF">
        <div class="card-body pl-5 pb-5">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" style="font-color: #FFFFFF"><?= $title; ?></h1>
    <form action="" method="post">
    <input type="hidden" name="id_dd_user" value="<?= $dd_user['id_dd_user']; ?>">
    <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name"name="name" value="<?= $dd_user ['name']; ?>" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username"name="username" value="<?= $dd_user ['username']; ?>" readonly>
      <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
  </div>

    <div class="form-group row">
    <label for="role_id" class="col-sm-2 col-form-label">Role</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="role_id"name="role_id" 
      value="<?= $dd_user ['role_id']; ?>">
      <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    </div>

    <div class="form-group row">
    <label for="id_active" class="col-sm-2 col-form-label">Active</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="id_active"name="id_active" 
      value="<?= $dd_user ['id_active']; ?>">
      <?= form_error('id_active', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    </div>
  
    <div class="form-group row">
        <div class="col-sm-2"> Picture </div>
        <div class="col-sm-10">
        <div class ="row">
        <div class="col-sm-3">
        <a href="<?= base_url ('assets/img/profile/') .$dd_user['foto']; ?>" data-lightbox="<?= $dd_user['username']; ?>" data-title="<?= $dd_user['foto']; ?>"> 
        <img src="<?= base_url ('assets/img/profile/') . $dd_user['foto']; ?>" class="img-thumbnail" width='400' height='300'> </a>
        </div>
        </div>
        
  </div>
  </div>
  <div class="form-group row justify-content-end">
  <div class="col-sm-10">
    <button type="submit" class="btn btn-success" href="<?= base_url(); ?>admin/user" > Edit </button>

</div>
</div>
</form>
    </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->