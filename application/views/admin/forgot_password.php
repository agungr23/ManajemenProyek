<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
    <style type="text/css">
        .colorbd{background-color:#424242;}
        .clkt{background-color:#616161;}
    </style>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>

<body class="colorbd text-light">

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5 text-center mt-5 mx-auto p-4 clkt">
                <img src="<?php echo base_url('assets/img/kodegiri_putih.png') ?>" widht=120 height=70>
                <!-- <h1 class="h2">Login Admin</h1> -->
                <p class="lead mt-1">Forgot Your Password ?</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-5 mx-auto clkt">
            <?php echo $this->session->flashdata('ihi'); ?>
                <form action="<?php echo base_url(); ?>index.php/admin/forgot_password/forgotpassword" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="forgot_email" id="forgot_email" placeholder="Enter Your E-mail Address" />
                        <?= form_error('forgot_email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-success w-100" name="login" value="Reset Password"/>
                    </div>
                    <div class="form-group">
                        <a href="<?= site_url('admin/login') ?>" class="mb-4">Back to Login</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>