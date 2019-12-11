<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    
   
            
    <div class="row">
    <div class="col-lg-8">
    <?= form_open_multipart('menu/edit_menu'); ?>


    <div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Submenu title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="title"name="title" 
      value="<?= $sm ['title']; ?>" readonly>
    </div>
  </div>
        <div class="form-group">
        <select name="menu_id" id="menu_id" class="form-control">
        <option value="">Select menu</option>
        <?php foreach($menu as $m) : ?>
        <option value="<?= $m['id']; ?>"><?=$m['menu']; ?></option>
        <?php endforeach; ?>
        </select>
        </div>
        <div class="form-group">
        <input type="text" class="form-control" id="url" 
        name="url" placeholder="Submenu url">
        </div>
        <div class="form-group">
        <input type="text" class="form-control" id="icon" 
        name="icon"placeholder="Submenu icon">
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
     

  <div class="form-group row justify-content-end">
  <div class="col-sm-10">
    <button type="submit" class="btn btn-success"> Update Submenu </button>
    </div>
      </form>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->