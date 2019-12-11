
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
            <h3 class="m-3 font-weight-bold text-primary md-2">Login</h3>
            </div>
            <?php    // Cek apakah terdapat session nama message    
                 if($this->session->flashdata('message')){ // Jika ada      
                 echo $this->session->flashdata('message'); // Tampilkan pesannya    
                 }   
                  ?>  
                    <form method="post" action="<?= base_url('auth'); ?>">   
                    <div class="loginpage">
                    <input class="form-control placeholder-fix" type="text" placeholder="Username"id="username" name="username" required="">
                    <input class="form-control placeholder-fix" type="password" placeholder="Password"  id="password" name='password' required="">
                    </div>
                    <div class="action-button">
                    <!-- <button type="button" id="btnLogin" onclick="login()" class="btn-block"><i class="ace-icon fa fa-key"></i><span class="bigger-110">Sign In</span></button> -->
                    <button class="btn-block" type="submit">Login</button> 
                    </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <ul class="page-links">
                    <li><a href="#">Forgot Password?</a></li>
                    <li><a href="<?= base_url('auth/registration'); ?>">Daftar !</a></li>
                </ul>
                </div>
                </div>

