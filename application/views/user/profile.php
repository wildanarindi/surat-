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
      <div class="card" style="background-color: #050A27">
        <div class="card-body pl-5 pb-5">
      
          <nav class="nav mt-3">
          <div class="col-sm-1 mt-2">
        <img class="img-thumbnail" src="<?= base_url ('assets/dist/img/rs2.png') ; ?>" ></div>
            <!-- <h5 class="mr-4">AMIK<br>Taruna <br> Probolinggo</h5> -->
            <a class="nav-link active" href="<?= base_url('user/index'); ?>">Home</a>
            <a class="nav-link" href="*">Tugas Akhir</a>
            <a class="nav-link" href="*">Contact</a>
          </nav>

          <div class="row main mt-3">
            <div class="col-md-6">
              <h2 class="display-5"><span>Welcome</span> <?= $user['nama']; ?> </h2>
              <h4><?= $user['email']; ?></h4>
              <!-- <button class="btn btn-succes" href="<?= base_url('user/edit'); ?>">Edit</button> -->
              <a href="<?= base_url('user/edit'); ?>" class="btn btn-info mb-3 mt-3" ><i class="fa fa-plus"></i> Edit Profile </a>
            </div>
          </div>
          <div class="bg-img" >
          <div class="col-sm-5 ">
          <img src="<?= base_url ('assets/img/profile/') . $user ['gambar']; ?>" class="img-thumbnail" >
        </div>
        </div>
      </div>
    </div>

   
  </body>
</html>