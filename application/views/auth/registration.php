  
    <body class="content">
        <header>
            <div class="logo text-center">
            <img src="<?= base_url ('assets/dist/img/rs2.png');?>" width="250" height="150"><br>
            </div>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-3 col-xs-6 width-100">
          <div class="logo text-center">
            <h3 class="m-3 font-weight-bold text-primary md-2"><?= $title; ?></h3>
            </div>
        <?= $this->session->flashdata('message'); ?>
        <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
            <!--  <form action="../../index3.html" method="post"> -->
                    <!-- <form action="#" method="post"> -->
                        <div class="loginpage">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        <input class="form-control placeholder-fix" type="text" placeholder="Fullname" id="name" name="name"  value="<?= set_value('name'); ?>">
                        <div class="loginpage">
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        <input class="form-control placeholder-fix" type="text" placeholder="Username Address" id="username" name="username" value="<?= set_value('username'); ?>"> 
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        <input class="form-control placeholder-fix" type="password" placeholder="Password" id="password1" name="password1" >
                        </div>
                        <input class="form-control placeholder-fix" type="password" placeholder="Retype password" id="password2" name="password2">
                          </div>
                        <div class="action-button">
                            <button class="btn-block" type="submit">Register</button> 
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <ul class="page-links">
                    <li><a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password ?</a></li>
                    <li> <a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login !</a></li>
                </ul>
                </div>
                </div>

