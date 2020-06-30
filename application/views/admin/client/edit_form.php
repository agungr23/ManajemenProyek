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

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/clients/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/client/add') ?>" method="post" enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $client->client_id ?>" />

							<div class="form-group">
								<label for="name">Photo</label></br>
								<img src="<?php echo base_url('upload/client/'.$client->image) ?>" width="100">
								<input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"
								 type="file" name="image" />
								<input type="hidden" name="old_image" value="<?php echo $client->image ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="name">Name*</label>
										<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
										type="text" name="name" placeholder="Client name" value="<?php echo $client->name ?>"/>
										<div class="invalid-feedback">
											<?php echo form_error('name') ?>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="name">Email*</label>
										<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" 
										type="text" name="email" placeholder="Email" value="<?php echo $client->email ?>">
										<div class="invalid-feedback">
											<?php echo form_error('email') ?>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="name">Industry*</label>
										<input class="form-control <?php echo form_error('industry') ? 'is-invalid':'' ?>"
										type="text" name="industry" placeholder="Industry" value="<?php echo $client->industry ?>"/>
										<div class="invalid-feedback">
											<?php echo form_error('industry') ?>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="name">Status*</label>
										<select name="status" class="form-control">
											<option value="<?php echo $client->status ?>"><?php echo $client->status ?></option>
											<?php if($client->status == "Stuck"): ?>
												<option value="In Progress">In Progress</option>
												<option value="Done">Done</option>
											<?php elseif($client->status == "In Progress"): ?>
												<option value="Stuck">Stuck</option>
												<option value="Done">Done</option>
											<?php else: ?>
												<option value="In Progress">In Progress</option>
												<option value="Stuck">Stuck</option>
											<?php endif; ?>
										</select>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Address*</label>
								<textarea class="form-control <?php echo form_error('address') ? 'is-invalid':'' ?>"
								 name="address" placeholder="Address" value="<?php echo $client->address ?>"><?php echo $client->address ?></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('address') ?>
								</div>
							</div>

							<center><input class="btn btn-success" type="submit" name="btn" value="Save" /></center>
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
