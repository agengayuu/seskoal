
<!DOCTYPE html>
<html>
    <head>
    <title>Lupa Password</title>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8">
            <meta content="" name="description"/>
            <meta content="" name="author"/>
            <link rel="shortcut icon" href="<?php echo base_url() ?>assets/assets/images/seskoal.png" type="image/x-icon"/>
            
            <!-- BEGIN GLOBAL MANDATORY STYLES -->
            <link href="<?php echo base_url() ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
            <!-- END GLOBAL MANDATORY STYLES -->
            
            <!-- Custom fonts for this template-->
            <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
            <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
            
            <!-- CSS -->
            <link href="<?php echo base_url() ?>assets/css/login.css" rel="stylesheet" type="text/css"/>
        </head>
        
        <body>
            <!-- BEGIN LOGIN -->
            <div class="login-page">
                <div class="container">
                    <!-- BEGIN LOGIN FORM -->
                    <div class="form">
                        <form class="login-form" action="<?= base_url('login/gantipass') ?>" method="post">
                            <div class="container">
                                <center>
                                    <div class="logo">
                                        <div class="seskoal"></div>
                                    </div>
                                </center>
                            </div>
                            <div class="form-header">
                                <h2 style="text-align: center;">Ganti password anda<br /></h2>
                                <h5><?= $this->session->userdata('reset_email');?></h5>
                            </div>
                            <?php echo $this->session->flashdata('pesan') ?>    
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="fa fa-user"></i>
                                <input type="password" class="form-control placeholder-no-fix" autocomplete="off" placeholder="Masukan password" name="password" value="" />
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>');?>
                            </div>
                            <div class="input-icon">
                                <i class="fa fa-user"></i>
                                <input type="password" class="form-control placeholder-no-fix" autocomplete="off" placeholder="Masukan konfirmasi password" name="password2" value="" />
                                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>');?>
                            </div>
                        </div>

                        <input type="hidden" id="token" name="token">
                            <button type="submit" class="btn green">
                                Ganti Password <i class="m-icon-swapright m-icon-white"></i>
                            </button>
					
                    </form>
                    <!-- END LOGIN FORM -->
                </div>
            </div>
        </div>
    </body>
</html>