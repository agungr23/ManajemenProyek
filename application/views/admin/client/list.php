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

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<?php if($this->fungsi->user_login()->role == "admin") { ?>
						<a href="<?php echo site_url('admin/clients/add') ?>"><i class="fas fa-plus"></i> Add New</a>
						<?php } ?>
						<?php if($this->fungsi->user_login()->role == "admin") { ?>
						<a href="<?php echo site_url('admin/forprint/client') ?>" class="float-right"><i class="fas fa-print "></i> Print</a>
						<?php } ?>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Photo</th>
										<th>Name</th>
										<th>Address</th>
										<th>Industry</th>
										<th>Email</th>
										<th>Status</th>
										<?php if($this->fungsi->user_login()->role == "admin") { ?>
										<th>Action</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($clients as $client): ?>
									<tr>
										<td>
											<img src="<?php echo base_url('upload/client/'.$client->image) ?>" width="40" height="40"/>
										</td>
										<td width="150">
											<?php echo $client->name ?>
										</td>
										<td>
											<?php echo $client->address ?>
										</td>
										<td>
											<?php echo $client->industry ?>
										</td>
										<td>
											<?php echo $client->email ?>
										</td>
										<td>
											<?php if($client->status == "In Progress"): ?>
                                                <span class="badge badge-primary"><?php echo $client->status ?></span>
                                            <?php elseif($client->status == "Stuck"): ?>
                                                <span class="badge badge-danger"><?php echo $client->status ?></span>
                                            <?php else: ?>
                                                <span class="badge badge-success"><?php echo $client->status ?></span>
                                            <?php endif; ?>
										</td>
										<?php if($this->fungsi->user_login()->role == "admin") { ?>
										<td width="170">
											<!-- <a href="<?php echo site_url('admin/projects/edit/'.$project->project_id) ?>"
											 class="btn btn-small"><i class="fas fa-tasks"></i> Task</a> -->
											<a href="<?php echo site_url('admin/clients/edit/'.$client->client_id) ?>"
											 class="btn btn-small btn-info"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/clients/delete/'.$client->client_id) ?>')"
											 href="#!" class="btn btn-small btn-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
										<?php } ?>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
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

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>
