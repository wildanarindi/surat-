<!-- Begin Page Content -->

<div class="container-fluid">
<!-- <div class="row">
<div class="col-sm-12">
<div class="card">
  <div class="card-header" style="background-color: #050A27">
  <div class="form-row" >
    <div class="col-sm-1 mt-1">
    <img class="img-thumbnail" src="<?= base_url ('assets/img/profile/amik.png') ; ?>" >
    </div>
    <div class="col">
    <h2 class="m-0 font-weight-bold text-primary mt-3"><span>  AMIK TARUNA PROBOLINGGO</span></h2>
    <h4 class="m-0 font-weight-bold text-primary"><span>  Sistem Pemantauan Tugas Akhir</span></h4>
    </div>
    <div class="col mt-3" align="right">
    
  </div>
  </div>
  </div> -->
<div class="card shadow mb-4 mt-2">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash60'); ?>"></div>
                <?php if ($this->session->flashdata('flash60')) : ?>
                <?php endif; ?>
                <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary"><?= $title; ?></h4>
                </div>
                <div class="col mt-3">
                <!-- <a href="<?= base_url(); ?>data/tambah" class="btn btn-primary mb-3" ><i class="fa fa-plus"></i> New Mahasiswa </a>
                <a href="<?= base_url ('data/cetakLaporan'); ?>" target="_blank" class="btn btn-primary mb-3" ><i class="fa fa-print"></i> Cetak</a> -->
                <div class="col mt-1">
                <!-- <a href="<?= base_url(); ?>master/database" class="btn btn-primary mb-3 sweet" ><i class="fa fa-plus"></i> New Database </a> -->


    <div class="table-responsive">
    <table class="table table-bordered table-striped" id="example1">
<thead>


<tr>
<th scope="col">No</th>
<th scope="col">Name</th>
<th scope="col">Username</th>
<th scope="col">Password</th>
<th scope="col">Role</th>
<th scope="col">Active</th>
<th scope="col">Action</th>


</tr>
</thead>
<tbody>
<?php $i = 1; 
foreach ($dd_user as $user1) : ?>

<tr>
<th><?=$i++; ?></th>
<td><?= $user1['name']; ?></td>
<td><?= $user1['username']; ?></td>
<td><?= $user1['password']; ?></td>
<td><?= $user1['role_id']; ?></td>
<td><?= $user1['id_active']; ?></td>
<td>
<a href="<?= base_url(); ?>admin/detail/<?= $user1['id_dd_user'];?>" class="badge badge-warning">Detail</a>
<a href="<?= base_url(); ?>admin/edit_user/<?= $user1['id_dd_user'];?>" class="badge badge-success" >Edit</a>


<a href="<?= base_url(); ?>admin/hapususer/<?= $user1['id_dd_user'];?>" class="badge badge-danger tombol-hapus">Delete</a>
</td>

</tr>
<?php endforeach; ?>
</tbody>
</table>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Update Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url ('user'); ?>"method="post">
      <div class="modal-body">
      <div class="form-group">
    
    <input type="text" class="form-control" id="nim" name="nim"placeholder="Menu name"> </div>
    <div class="form-group">
    <input type="text" class="form-control" id="nama" name="nama"placeholder="Menu name"></div>
    <div class="form-group">
    <input type="text" class="form-control" id="email" name="email"placeholder="Menu name"></div>
    <div class="form-group">
    <input type="text" class="form-control" id="judul" name="judul"placeholder="Menu name"></div>
    <div class="form-group">
    <input type="text" class="form-control" id="role_id" name="role_id"placeholder="Menu name"></div>
    <div class="form-group">
    <input type="text" class="form-control" id="gambar" name="gambar"placeholder="Menu name">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Data</button>
      </div>
      </form>
    </div>
  </div>
</div>