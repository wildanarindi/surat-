<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rsu Wonolangan|Dashboard</title>
        <!-- Bootstrap core CSS -->
        <link href="<?= base_url(); ?>vendor/login/font.css" rel="stylesheet">  
        <!-- <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">   -->
        <!-- Custom styles for this template -->
        <link rel="icon" href="/vendor/login/images/favicon.png"/>
        <link rel="icon" href="<?= base_url(); ?>vendor/login/images/favicon.png"/>
        <link href="<?= base_url(); ?>vendor/login/css/style.css" rel="stylesheet">
        <link href="<?= base_url(); ?>vendor/login/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <!-- <?php echo $main_view;?>    -->
    <?php $this->load->view($main_view); ?>
    
<div class="copyright-box">
                    <div class="copyright">
                        <!--Do not remove Backlink from footer of the template. To remove it you can purchase the Backlink !-->
                        &copy; Rumah Sakit Umum Wonolangan
                    </div>
                </div>
            </div>
        </div>
<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- <script type="text/javascript">
function login()
{
    $('#btnLogin').text('loging in...'); //change button text
    $('#btnLogin').attr('disabled',true); //set button disable 
    var url;
        // Get form
        var form = $('#form_login')[0];
        var data = new FormData(form);
        url = "<?php echo site_url('auth/ajax_login')?>";
    $.ajax({
        url : url,
        type: "POST",
        enctype: 'multipart/form-data',
	data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
        dataType: "JSON",
        success: function(data)
        {
 	if (data.status===false) {
		swal({
		  title: "Error!",
		  text: (data.kliru),//"Error GTK!",
		  icon: "warning",
		});
	}else{
		window.location=data.url;
		swal({
			title: "Good job!",
			text: (data.kliru),//"Error GTK!",
			icon: "success",
			timer: 3000,
			showConfirmButton: true
		});
            }
            $('#btnLogin').text('Sign In'); //change button text
            $('#btnLogin').attr('disabled',false); //set button enable 
        }
    });
}
</script> -->

    </body>

</html>