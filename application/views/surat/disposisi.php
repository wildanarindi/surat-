<div class="container-fluid">

<div class="row">
<div class="col-lg-6">
<div class="card shadow mb-4 mt-1">

                <div class ="card">
                <div class ="card-header" align="center">
                <h4 class="m-0 font-weight-bold text-primary"><?= $title; ?></h4>
                </div>
                <div class="card-body">
                <form enctype="multipart/form-data" action="" method="post" >
<!-- <?php echo form_open('latihan/insert') ?>
		<input type="checkbox" name="check_list[]" alt="Checkbox" value="merah"> merah
		<input type="checkbox" name="check_list[]" alt="Checkbox" value="kuning"> kuning
		<input type="checkbox" name="check_list[]" alt="Checkbox" value="hijau"> hijau
		<input type="checkbox" name="check_list[]" alt="Checkbox" value="biru"> biru
		<input type="submit"   name="tampil" value="Simpan">
<?php echo form_close()?> -->


<form>
<?php echo form_open('surat/insert') ?>
<!-- <form action="surat/disposisi" method="post" > -->
<input type="hidden" name="id_tc_surat_masuk" value="<?= $surat['id_tc_surat_masuk']; ?>">
  <div class="form-row">
  <div class="col">
    <div class="custom-control custom-checkbox">
      <!-- <input type="checkbox" class="custom-control-input" id="perhatian" name="perhatian" value="perhatian"> -->
      <input type="checkbox" class="custom-control-input" id="perhatian" name="check_list[]" alt="Checkbox" value="perhatian">
      <label class="custom-control-label" for="perhatian">U / Mendapatkan Perhatian</label>
    </div>
    </div>
    <div class="col">
    <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="dipergunakan" name="check_list[]" alt="Checkbox" value="dipergunakan">
      <label class="custom-control-label" for="dipergunakan">U / Dipergunakan seperlunya</label>
    </div>
    </div>
  </div>

  <div class="form-row">
  <div class="col mt-3">
    <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="dimaklumi" name="check_list[]" alt="Checkbox" value="dimaklumi">
      <label class="custom-control-label" for="dimaklumi">U / Dimaklumi</label>
    </div>
    </div>
    <div class="col mt-3">
    <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="diteliti"  name="check_list[]" alt="Checkbox" value="diteliti">
      <label class="custom-control-label" for="diteliti">U / Diteliti Lebih Lanjut</label>
    </div>
    </div>
  </div>

  <div class="form-row">
  <div class="col mt-3">
    <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="diedarkan" name="check_list[]" alt="Checkbox" value="diedarkan">
      <label class="custom-control-label" for="diedarkan">U / Diedarkan</label>
    </div>
    </div>
    <div class="col mt-3">
    <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="bds" name="check_list[]" alt="Checkbox" value="bds">
      <label class="custom-control-label" for="bds">U / Bds</label>
    </div>
    </div>
  </div>

  <div class="form-row">
  <div class="col mt-3">
    <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="diselesaikan" name="check_list[]" alt="Checkbox" value="diselesaikan">
      <label class="custom-control-label" for="diselesaikan">U / Diselesaikan lebih lanjut</label>
    </div>
    </div>
    <div class="col mt-3">
    <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="copy" name="check_list[]" alt="Checkbox" value="copy">
      <label class="custom-control-label" for="copy">U / Copy u/ybs</label>
    </div>
    </div>
  </div>

  <div class="form-row">
  <div class="col mt-3">
    <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="dilaksanakan" name="check_list[]" alt="Checkbox" value="dilaksanakan">
      <label class="custom-control-label" for="dilaksanakan">U / Dilaksanakan</label>
    </div>
    </div>
    </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary" name="tampil" value="Simpan">Save changes</button>
    </div>
  <?php echo form_close()?>
</form>

</div> 
</div>
</div>
</div>
</div>
</div>
</div>