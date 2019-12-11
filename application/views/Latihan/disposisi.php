<!-- Begin Page Content -->
<div class="container-fluid">

<div class="row">
<div class="col-lg">
<div class="card shadow mb-4 mt-2">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash19'); ?>"></div>
                <?php if ($this->session->flashdata('flash19')) : ?>
                <?php endif; ?>
                <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary"><?= $title; ?></h4>
                </div>
                <div class="col mt-3">
                <!-- <a href="<?= base_url(); ?>data/tambah" class="btn btn-primary mb-3" ><i class="fa fa-plus"></i> New Mahasiswa </a>
                <a href="<?= base_url ('data/cetakLaporan'); ?>" target="_blank" class="btn btn-primary mb-3" ><i class="fa fa-print"></i> Cetak</a> -->
                <div class="col mt-1">
                <!-- <a href="<?= base_url(); ?>master/database" class="btn btn-primary mb-3 sweet" ><i class="fa fa-plus"></i> New Database </a> -->

<?= form_error ('menu', '<div class="alert alert-danger" role="alert">','</div>');?>
<?= $this->session->flashdata ('message'); ?>

<a href="<?php echo base_url().'latihan/disposisi'; ?>" class="btn btn-primary btn-xs mb-3"><i class="fa fa-plus"></i> Tambah Disposisi </a>

<div class="table-responsive mt-2">
    <table class="table table-hover" id="dataTables-example">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Tgl input</th>
      <th scope="col">Perhatian</th>
      <th scope="col">Dimaklumi</th>
      <th scope="col">Diedarkan</th>
      <th scope="col">Diselesikan</th>
      <th scope="col">Dilaksanakan</th>
      <th scope="col">Diteliti</th>
      <th scope="col">Bds</th>
      <th scope="col">Copy</th>
      <th scope="col">Catatan</th>
      <th scope="col">Catatan 2</th>
      
    </tr>
  </thead>
  <tbody>
   <?php $i = 1; ?>
   <?php foreach($disposisi as $m):?>
    <tr>
      <th scope="row"><?= $i; ?></th>
      <td><?= $m['tgl_input']; ?></td>
      <td><?= $m['perhatian']; ?></td>
      <td><?= $m['dimaklumi']; ?></td>
      <td><?= $m['diedarkan']; ?></td>
      <td><?= $m['diselesaikan']; ?></td>
      <td><?= $m['dilaksanakan']; ?></td>
      <td><?= $m['dipergunakan']; ?></td>
      <td><?= $m['diteliti']; ?></td>
      <td><?= $m['copy']; ?></td>
      <td><?= $m['cat']; ?></td>
      <td><?= $m['cat2']; ?></td>
      <td>
      <div class="btn-group">
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Action
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item badge-success" href="<?= base_url(); ?>surat/edit_masuk/<?= $m['id_disposisi'];?>">Edit</a>
        <a class="dropdown-item badge-warning" href="<?= base_url(); ?>surat/detailsurmasuk/<?= $m['id_disposisi'];?>">Detail</a>
        <a class="dropdown-item badge-danger tombol-hapus" href="<?= base_url(); ?>surat/hapus_surmasuk/<?= $m['id_disposisi'];?>">Delete</a>
      </div>
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
</div>
</div>
</div>
</div>