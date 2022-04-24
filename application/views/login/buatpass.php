
<!DOCTYPE html>
<html>
    <head>
    <title>Login</title>

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
                        <form class="login-form" action="<?= base_url('login/validasi_pass') ?>" method="post">
                            <div class="container">
                                <center>
                                    <div class="logo">
                                        <div class="seskoal"></div>
                                    </div>
                                </center>
                            </div>
                            <div class="form-header">
                                <h2 style="text-align: center;">Buat Password<br />
                            </h2>
                        </div>
                        <div class="form-group">
                            <?php echo $this->session->flashdata('message') ?>
                            <div class="input-icon">

                                <i class="fa fa-user"></i>
                                <input type="text" class="form-control placeholder-no-fix" autocomplete="off" placeholder="Masukan Nomer Induk" name="username" value="<?= set_value('username');?>" />
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>');?>
                            </div>
                            <div class="input-icon">
                                <i class="fas fa-lock"></i>
                                <input type="date" name="tgl_lhr" class="form-control placeholder-no-fix" placeholder="Masukan Tanggal Lahir " autocomplete="off"/>
                                <?= form_error('tgl_lhr', '<small class="text-danger pl-3">', '</small>');?>
                            </div>
                        </div>

                        <input type="hidden" id="token" name="token">
                            <button type="submit" class="btn green" <?= base_url('login/validasi_pass/');?>>
                                Lanjut <i class="m-icon-swapright m-icon-white"></i>
                            </button>
					
                    </form>
                    <!-- END LOGIN FORM -->
                </div>
            </div>
        </div>
    </body>
</html>