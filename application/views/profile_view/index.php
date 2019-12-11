<link rel="stylesheet" href="<?= base_url (); ?>assets/style.css">
    <title>My Profile</title>
  </head>
  <body>
    
    <div class="container mt-3">
    <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash15'); ?>"></div>
            <?php if ($this->session->flashdata('flash15')) : ?>
            <?php endif; ?>
</div>
      <div class="card" style="background: linear-gradient(to bottom, #ffffff, #23d50c);">
        <div class="card-body pl-5 pb-5">
      
          <nav class="nav mt-3">
          <div class="col-sm-1 mt-2">
        <img class="img-profile" width="150" height="110" src="<?= base_url ('assets/dist/img/rs2.png') ; ?>" ></div>
            <!-- <h5 class="ml-5">RS<br>UMUM <br> WONOLANGAN</h5> -->
            <a class="nav-link active ml-5" href="<?= base_url('user/index'); ?>">Home</a>
            <a class="nav-link" href="*">Tugas Akhir</a>
            <a class="nav-link" href="*">Contact</a>
          </nav>

          <div class="row">
        <div class="col-sm-8">
          <div class="card">
            <div class="card-body" style="background: linear-gradient(to bottom, #ffffff, #23d50c);" >
              <h2 class="font-weight-bold text-primary">WELCOME</h2>
              <h4 class="font-weight-bold text-primary">NAME   : <?= $user['name']; ?></h4>
              <h4 class="font-weight-bold text-primary">STATUS : <?= $user['role_id']; ?></h4>
              <p class="card-text text-primary">@ RSU WONOLANGAN.</p>
              <a href="#" class="btn btn-primary">Edit Profile</a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card" >
            <div class="card-body" style="background: linear-gradient(to bottom, #ffffff, #23d50c);">
              <h5 class="card-title text-primary ">Foto Profile</h5>
              <img src="<?= base_url('assets/dist/img/profile/') . $user['foto']; ?>" class="img-thumbnail mt-2" align="center">
              <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
          </div>
        </div>
      </div>
      </div>
           
  </body>
</html>