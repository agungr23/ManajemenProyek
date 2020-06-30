<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password</title>
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
                <p class="lead mt-1">Change Your Password for</p>
                <h5><?= $this->session->userdata('reset_email'); ?></h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-5 mx-auto clkt">
            <?php echo $this->session->flashdata('ihi'); ?>
                <form action="<?php echo base_url(); ?>index.php/admin/forgot_password/changepass" method="POST">
                    <div class="form-group">
                        <input type="password" class="form-control" name="password1" id="password1" placeholder="Enter New Password ..." />
                        <?= form_error('password1', '<small class="text-default pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password2" id="password2" placeholder="Repeat Password ..." />
                        <?= form_error('password2', '<small class="text-default pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success w-100" name="login" value="Change Password"/>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>