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

				<?php //$this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div id="notifikasi" class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">
                        <b>Email Company</b>
					</div>
					<div class="card-body">
                    <?php foreach ($email as $email): ?>
						<form action="<?php echo base_url(); ?>index.php/admin/email/edit" method="post" enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $email->email_id ?>" />
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
									<label for="name">Protocol</label>
									<input class="form-control"
									type="text" name="protocol" value="<?php echo $email->protocol ?>" />
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="name">Host</label>
										<input class="form-control"
										type="text" name="smtp_host" value="<?php echo $email->smtp_host ?>" />
									</div>
								</div>
							</div>
							
                            <div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="name">Name</label>
										<input class="form-control"
										type="text" name="name" value="<?php echo $email->name ?>" />
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="name">Port</label>
										<input class="form-control"
										type="text" name="smtp_port" value="<?php echo $email->smtp_port ?>" />
									</div>
								</div>
							</div>
                            
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="name">Email</label>
										<input class="form-control <?php echo form_error('smtp_user') ? 'is-invalid':'' ?>"
										type="text" name="smtp_user" value="<?php echo $email->smtp_user ?>" />
										<div class="invalid-feedback">
											<?php echo form_error('smtp_user') ?>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="name">Password</label>
										<input class="form-control <?php echo form_error('smtp_pass') ? 'is-invalid':'' ?>"
										type="password" name="smtp_pass"  value="<?php echo $email->smtp_pass ?>"/>
										<div class="invalid-feedback">
											<?php echo form_error('Smtp_pass') ?>
										</div>
									</div>
								</div>
							</div>
                            
                            <div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="name">Mailtype</label>
										<input class="form-control"
										type="text" name="mailtype" value="<?php echo $email->mailtype ?>" />
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="name">Charset</label>
										<input class="form-control"
										type="text" name="charset" value="<?php echo $email->charset ?>" />
									</div>
								</div>
							</div>

							<center><input class="btn btn-success" type="submit" name="btn" value="Save" /></center>
						</form>
                        <?php endforeach; ?>
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
