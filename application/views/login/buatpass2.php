
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

            <!-- BEGIN GLOBAL MANDATORY STYLES -->
            <link href="<?php echo base_url() ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
            <!-- END GLOBAL MANDATORY STYLES -->

            <!-- CSS -->
            <link href="<?php echo base_url() ?>assets/css/login.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <!-- BEGIN LOGIN -->
        <div class="login-page">
            <div class="container">
                <!-- BEGIN LOGIN FORM -->
                <div class="form">
                    <form class="login-form" action="<?= base_url('login/simpanpass') ?>" method="post">
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
                            <div class="input-icon">
                                <i class="fa fa-lock"></i>
                                <input type="text" name="id" value="<?php echo $user->id ?>">
                                <input type="password" name="password" class="form-control placeholder-no-fix" placeholder="Password Baru " autocomplete="off" onkeypress="capLock(event)"/>
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>');?>
                            </div>
                           <div class="input-icon">
                                <i class="fa fa-lock"></i>
                                <input type="password" name="password2" class="form-control placeholder-no-fix" placeholder="Konfirmasi Password " autocomplete="off" onkeypress="capLock(event)"/>
                                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>');?>
                            </div>
                        </div>

                        <input type="hidden" id="token" name="token">
                            <button type="submit" class="btn green">
                                Simpan <i class="m-icon-swapright m-icon-white"></i>
                            </button>
					
                    </form>
                    <!-- END LOGIN FORM -->
                </div>
            </div>
        </div>
    </body>
</html>