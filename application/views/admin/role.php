<!-- Begin Page Content -->
<div class="container-fluid">                  

    <div class="card mt-3">
  <h4 class="card-header m-0 font-weight-bold text-primary"><?= $title; ?></h4>
  <div class="card-body">

                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash21'); ?>"></div>
                <?php if ($this->session->flashdata('flash21')) : ?>
                <?php endif; ?>
               

<!-- <?= form_error ('menu', '<div class="alert alert-danger" role="alert">','</div>');?>
<?= $this->session->flashdata ('message'); ?> -->

<a href="" class="btn btn-primary mb-3" data-toggle="modal" 
data-target="#newRoleModal"> Insert Role Baru </a>

<div class="table-responsive">
    <table class="table table-hover" id="dataTables-example">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>  
    </tr>
  </thead>
  <tbody>
   <?php $i = 1; ?>
   <?php foreach($role as $r):?>
    <tr>
      <th scope="row"><?= $i; ?></th>
      <td><?= $r['role']; ?></td>
      <td>
            <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-warning">access</a>
            <!-- <a href="" class="badge badge-danger">delete</a> -->
            <a href="<?= base_url(); ?>admin/hapusrole/<?= $r['id'];?>" class="badge badge-danger tombol-hapus" >delete</a>
      </td> 
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
  </tbody>
</table>
</div>

</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRoleModalLabel">Insert New Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url ('admin/role'); ?>"method="post">
      <div class="modal-body">
      <div class="form-group">
    
    <input type="text" class="form-control" id="role" name="role"placeholder="Role name">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Insert</button>
      </div>
      </form>
    </div>
  </div>
</div>