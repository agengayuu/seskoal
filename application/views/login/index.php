
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
            <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

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
                    <form class="login-form" action="<?= base_url('login/cek_login') ?>" method="post">
                        <div class="container">
                            <center>
                                <div class="logo">
                                    <div class="seskoal"></div>
                                </div>
                            </center>
                        </div>
                        <div class="form-header">
                            <h2>Selamat Datang<br />
                            Academic Information System</h2>
                        </div>
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="fa fa-user"></i>
                                <input type="text" class="form-control placeholder-no-fix" autocomplete="off" placeholder="Username" name="username" value="<?= set_value('username');?>" />
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>');?>
                            </div>
                            <div class="input-icon">
                                <i class="fa fa-lock"></i>
                                <input type="password" name="password" class="form-control placeholder-no-fix" placeholder="Password " autocomplete="off" onkeypress="capLock(event)"/>
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>');?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="rmb">
                                <input type="checkbox" value="remember" name="remember">
                                <span>remember me</span>   
                            </label>
                            <div class="float-right">
                                <a href="/users/password/new">Forgot password?</a>
                            </div>
                        </div>

                        <input type="hidden" id="token" name="token">
                            <!--
                            <a href="<?php echo base_url('ceklogin/cas') ?>" class="btn blue">&nbsp;&nbsp;&nbsp;CAS <i class="m-icon-swapright m-icon-white"></i></a>
                            -->
                            <button type="submit" class="btn green">
                                Login <i class="m-icon-swapright m-icon-white"></i>
                            </button>
					
                    </form>
                    <!-- END LOGIN FORM -->
                </div>
            </div>
        </div>
    </body>
</html>