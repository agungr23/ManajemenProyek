<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>
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
                <p class="lead mt-1">Register a new membership</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-5 mx-auto clkt">
                <form action="<?= site_url('admin/register') ?>" method="POST">
                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control" name="full_name" placeholder="Full Name" required />
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="username" required />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email" required />
                    </div>
                    <div class="form-group">
  						<label for="name">Role</label>
						<select name="role" class="form-control">
							<option value="employee">employee</option>
							<option value="freelance">freelance</option>
						</select>
					</div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success w-100" name="register" value="Register"/>
                    </div>
                    <div class="form-group">
                        <a href="<?= site_url('admin/login') ?>" class="mb-4">I already have a membership</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>