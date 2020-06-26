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

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div id="notifikasi" class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/users/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/user/edit') ?>" method="post" enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $user->user_id ?>" />
							<input type="hidden" name="password" value="<?php echo $user->password ?>" />

							<div class="form-group">
								<label for="name">Photo</label></br>
								<img src="<?php echo base_url('upload/user/'.$user->photo) ?>" width="100">
								<input class="form-control-file <?php echo form_error() ? 'is-invalid':'' ?>"
								 type="file" name="image" />
								<input type="hidden" name="old_image" value="<?php echo $user->photo ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="name">Username*</label>
								<input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>"
								 type="text" name="username" value="<?php echo $user->username ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('username') ?>
								</div>
							</div>

							<!-- <div class="form-group">
								<label for="name">Password*</label>
								<input class="form-control <?php //echo form_error('password') ? 'is-invalid':'' ?>"
								 type="password" name="password"  />
								<div class="invalid-feedback">
									<?php //echo form_error('password') ?>
								</div>
							</div> -->

							<div class="form-group">
								<label for="name">Email*</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
								 type="text" name="email" value="<?php echo $user->email ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>

							<div class="form-group">
  								<label for="name">Full Name*</label>
								<input class="form-control <?php echo form_error('full_name') ? 'is-invalid':'' ?>" 
								type="text" name="full_name" value="<?php echo $user->full_name ?>" >
								<div class="invalid-feedback">
									<?php echo form_error('full_name') ?>
								</div>
							</div>

							<div class="form-group">
  								<label for="name">Phone*</label>
								<input class="form-control <?php echo form_error('phone') ? 'is-invalid':'' ?>" 
								type="text" name="phone" value="<?php echo $user->phone ?>" >
								<div class="invalid-feedback">
									<?php echo form_error('phone') ?>
								</div>
							</div>

							<div class="form-group">
  								<label for="name">Role*</label>
								  <select name="role" class="form-control">
								  	<option value="<?php echo $user->role ?>"><?php echo $user->role ?></option>
									<?php if($user->role == "admin"): ?>
										<option value="employee">employee</option>
										<option value="freelance">freelance</option>
                                    <?php elseif($user->role == "freelance"): ?>
                                        <option value="admin">admin</option>
										<option value="employee">employee</option>
                                    <?php else: ?>
                                        <option value="admin">admin</option>
										<option value="freelance">freelance</option>
                                    <?php endif; ?>
								</select>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
