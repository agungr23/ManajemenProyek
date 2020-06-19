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
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/clients/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/client/add') ?>" method="post" enctype="multipart/form-data" >							
							<div class="form-group">
								<label for="name">Photo</label>
								<input class="form-control-file <?php echo form_error() ? 'is-invalid':'' ?>"
								 type="file" name="image" />
								<input type="hidden" name="old_image" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="name">Name*</label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="name" placeholder="Client name" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Address*</label>
								<input class="form-control <?php echo form_error('address') ? 'is-invalid':'' ?>"
								 type="text" name="address" placeholder="Address" />
								<div class="invalid-feedback">
									<?php echo form_error('address') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Industry*</label>
								<input class="form-control <?php echo form_error('industry') ? 'is-invalid':'' ?>"
								 type="text" name="industry" placeholder="Industry" />
								<div class="invalid-feedback">
									<?php echo form_error('industry') ?>
								</div>
							</div>

							<div class="form-group">
  								<label for="name">Email*</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" 
								type="text" name="email" placeholder="Email" >
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>

							<div class="form-group">
  								<label for="name">Status*</label>
								  <select name="status" class="form-control">
									<option value="Stuck">Stuck</option>
									<option value="In Progress">In Progress</option>
									<option value="Done">done</option>
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
