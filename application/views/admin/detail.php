<!-- Begin Page Content -->

<div class="container-fluid">
  <!-- Page Heading -->
<div class="row mt-3">
<div class="col-sm-12">

<div class="card">
  <div class="card-header" >

<div class="card-body">
<div class="bg-img" >
<img src="<?= base_url ('assets/img/profile/') . $dd_user ['foto']; ?>" class="img-thumbnail" align="right" >
</div>

<h2 class="display-5"><span><?= $title; ?></span> </h2>
<h2 class="display-5">------------------------------------ </h2>
                <!-- nim dan tgl lahir -->
                <div class="form-row">
                <div class="form-group col-md-5">
                <label for="name">Name</label>
                <input type="text" name="name" readonly class="form-control" id="name" value="<?= $dd_user['name']; ?>">
                </div>
                <div class="form-group col-md-5">
                <label for="username">Username</label>
                <input type="text" name="username" readonly class="form-control" id="username" value="<?= $dd_user['username']; ?>">
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                <label for="role_id">Role</label>
                <input type="text" name="role_id" readonly class="form-control" id="role_id" value="<?= $dd_user['role_id']; ?>">
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                <label for="id_active">Aktiv</label>
                <input type="text" name="id_active" readonly class="form-control" id="id_active" value="<?= $dd_user['id_active']; ?>">
                </div>
                </div>
                
</div>
</div>
</div>
</div>
</div>