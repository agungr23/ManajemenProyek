<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>
    <style type="text/css">
        .colorbd{
            background: linear-gradient(40deg,#45cafc,#303f9f) !important;
            background-image: linear-gradient(40deg, rgb(69, 202, 252), rgb(48, 63, 159)) !important;
            background-position-x: initial !important;
            background-position-y: initial !important;
            background-size: initial !important;
            background-repeat-x: initial !important;
            background-repeat-y: initial !important;
            background-attachment: initial !important;
            background-origin: initial !important;
            background-clip: initial !important;
            background-color: initial !important;
        }
        .clkt{background-color:rgba(255,255,255,0.5); }
    </style>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>

<body class="colorbd text-light">

    <div class="container rounded-pill" style="margin-bottom: 110px; border-radius: 10px;">
        <div class="row">
            <div class="col-12 col-md-5 text-center mt-5 mx-auto p-4 clkt">
                <img src="<?php echo base_url('assets/img/kodegiri_putih.png') ?>" widht=120 height=70>
                <!-- <h1 class="h2">Login Admin</h1> -->
                <p class="lead mt-1">Log In to Your Account </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-5 mx-auto clkt">
            <?php echo $this->session->flashdata('ihi'); ?>
                <form action="<?= site_url('admin/login') ?>" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username.." required />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password.." required />
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="rememberme" id="rememberme" />
                                <label class="custom-control-label" for="rememberme"> Remember me</label>
                            </div>
                            <a href="<?= site_url('admin/forgot_password') ?>">I forgot my password</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success w-100" name="login" value="Login"/>
                    </div>
                    <div class="form-group">
                        <a href="<?= site_url('admin/register') ?>" class="mb-4">Register a new membership</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>