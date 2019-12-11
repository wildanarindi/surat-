     <!-- Main content -->
    <section class="content">                

    <div class="card ">
  <h4 class="card-header m-0 font-weight-bold text-primary"><?= $title; ?></h4>
  <div class="card-body">

<div class="row">
<div class="col-lg">


<?= $this->session->flashdata ('message'); ?>

<h5> Role : <?= $role['role'];?> </h5>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Menu</th>
      <th scope="col">Access</th>
      
    </tr>
  </thead>
  <tbody>
   <?php $i = 1; ?>
   <?php foreach($menu as $m):?>
    <tr>
      <th scope="row"><?= $i; ?></th>
      <td><?= $m['menu']; ?></td>
      <td>

  <div class="form-check">
  <input class="form-check-input" type="checkbox" 
  <?= check_access($role['id'], $m['id']); ?> 
   data-role="<?= $role['id'];?>" 
   data-menu="<?= $m['id'];?>">
    
    </div>  
    </td> 
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
  </tbody>
</table>

</div>
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

