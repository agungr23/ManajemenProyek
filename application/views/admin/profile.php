<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<div id="wrapper">

	<?php $this->load->view("admin/_partials/sidebar.php") ?>

	<div id="content-wrapper">

		<div class="container-fluid">

        <div class="box box-primary">
            <div class="box-body box-profile">

			  <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Profile</h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Info</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Edit Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Change Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
				  	<center>
              			<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('upload/user/'.$this->fungsi->user_login()->photo) ?>" width="200px">
			  		</center>
              		<h3 class="profile-username text-center"><?php echo $this->fungsi->user_login()->full_name ?></h3>

             		<p class="text-muted text-center"><?php echo $this->fungsi->user_login()->role ?></p>
				
					<div class="row ml-5 mr-5 m-4" >
						<div class="col-sm-5 text-right">
							<label>Username : </label>
						</div>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="username" value="<?php echo $this->fungsi->user_login()->username ?>" disabled/>
						</div>
						<div class="col-sm-5 text-right">
							<label>Email : </label>
						</div>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="username" value="<?php echo $this->fungsi->user_login()->email ?>" disabled/>
						</div>
						<div class="col-sm-5 text-right">
							<label>Phone : </label>
						</div>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="username" value="<?php echo $this->fungsi->user_login()->phone ?>" disabled/>
						</div>
					</div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
				  	<form action="<?php base_url('admin/user/add') ?>" method="post" enctype="multipart/form-data" >
				  	<div class="row ml-5 mr-5 m-4" >
						<div class="col-sm-5 text-right">
							<label>Username : </label>
						</div>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="username" value="<?php echo $this->fungsi->user_login()->username ?>" disabled/>
						</div>
						<div class="col-sm-5 text-right">
							<label>Full Name : </label>
						</div>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="username" value="<?php echo $this->fungsi->user_login()->full_name ?>" disabled/>
						</div>
						<div class="col-sm-5 text-right">
							<label>Email : </label>
						</div>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="username" value="<?php echo $this->fungsi->user_login()->email ?>" disabled/>
						</div>
						<div class="col-sm-5 text-right">
							<label>Phone : </label>
						</div>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="username" value="<?php echo $this->fungsi->user_login()->phone ?>" disabled/>
						</div>
						<div class="col-sm-5 text-right">
							<label>Role : </label>
						</div>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="username" value="<?php echo $this->fungsi->user_login()->role ?>" disabled/>
						</div>
						<div class="col-sm-5 text-right">
							<label>Photo : </label>
						</div>
						<div class="col-sm-5">
							<input class="form-control-file <?php echo form_error() ? 'is-invalid':'' ?>"
								 type="file" name="image" />
							<input type="hidden" name="old_image" value="<?php echo $user->photo ?>"/>
							<div class="invalid-feedback">
								<?php echo form_error('image') ?>
							</div>
						</div>
					</div>
					</form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    Iki isine ganti password
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>

              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>

		</div>
		<!-- /.container-fluid -->

		<!-- Sticky Footer -->
		<?php $this->load->view("admin/_partials/footer.php") ?>

	</div>
	<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
    
</body>
</html>
