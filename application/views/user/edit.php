<!-- Begin Page Content -->

<div class="container mt-3">
      <div class="card" style="background-color: #050A27">
        <div class="card-body pl-5 pb-5">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" style="font-color: #FFFFFF"><?= $title; ?></h1>


    <div class="row">
    <div class="col-lg-8">

    <?= form_open_multipart('user/edit'); ?>
    <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email"name="email" value="<?= $user ['email']; ?>" readonly>
    </div>
  </div>
    <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">full name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama"name="nama" 
      value="<?= $user ['nama']; ?>">
      <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
  </div>
    <div class="form-group row">
        <div class="col-sm-2"> Picture </div>
        <div class="col-sm-10">
        <div class ="row">
        <div class="col-sm-3">
        <img src="<?= base_url ('assets/img/profile/') . $user ['gambar']; ?>" class="img-thumbnail">
        </div>
        <div class="col-sm-9">
        <div class="custom-file">
  <input type="file" class="custom-file-input" id="gambar" name="gambar">
  <label class="custom-file-label" for="gambar">Choose file</label>
</div>
        </div>
        </div>
  </div>
  </div>
  <div class="form-group row justify-content-end">
  <div class="col-sm-10">
    <button type="submit" class="btn btn-success"> Edit </button>
</div>
</div>
</form>
    </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->