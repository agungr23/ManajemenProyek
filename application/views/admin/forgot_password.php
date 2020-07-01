<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?php echo base_url('assets/img/kodegiri_putih.png')?>" rel="shortcut icon">
    <title>Forgot Password</title>
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
        .clkt{background-color:rgba(255,255,255,0.3); }
    </style>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>

<body class="colorbd text-light">

    <div class="container" style="margin-bottom: 270px;">
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
                    <?php foreach ($email as $email): ?>    
                        <input type="hidden" name="protocol" id="protocol" value="<?php echo $email->protocol ?>">
                        <input type="hidden" name="smtp_host" id="smtp_host" value="<?php echo $email->smtp_host ?>">
                        <input type="hidden" name="smtp_user" id="smtp_user" value="<?php echo $email->smtp_user ?>">
                        <input type="hidden" name="smtp_pass" id="smtp_pass" value="<?php echo $email->smtp_pass ?>">
                        <input type="hidden" name="smtp_port" id="smtp_port" value="<?php echo $email->smtp_port ?>">
                        <input type="hidden" name="mailtype" id="mailtype" value="<?php echo $email->mailtype ?>">
                        <input type="hidden" name="charset" id="charset" value="<?php echo $email->charset ?>">
                        <input type="hidden" name="name" id="name" value="<?php echo $email->name ?>">
                    <?php endforeach; ?>

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