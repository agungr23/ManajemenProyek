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
						<a href="<?php echo site_url('admin/users/add') ?>"><i class="fas fa-plus"></i> Add New</a>
						<?php if($this->fungsi->user_login()->role == "admin") { ?>
						<a href="<?php echo site_url('admin/forprint/user') ?>" class="float-right"><i class="fas fa-print"></i> Print</a>
						<?php } ?>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Photo</th>
										<th>Username</th>
										<!-- <th>Password</th> -->
										<th>Email</th>
										<th>Full Name</th>
										<th>Phone</th>
										<th>Role</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($users as $user): ?>
									<tr>
										<td>
											<img src="<?php echo base_url('upload/user/'.$user->photo) ?>" width="40" height="40"/>
										</td>
										<td>
											<?php echo $user->username ?>
										</td>
										<!-- <td>
											<?php echo $user->password ?>
										</td> -->
										<td width="250">
											<?php echo $user->email ?>
										</td>
										<td width="250">
											<?php echo $user->full_name ?>
										</td>
										<td>
											<?php echo $user->phone ?>
										</td>
										<td>
											<?php echo $user->role ?>
										</td>
										<td width="260">
											<!-- <a href="<?php echo site_url('admin/projects/edit/'.$project->project_id) ?>"
											 class="btn btn-small"><i class="fas fa-tasks"></i> Task</a> -->
											<a href="<?php echo site_url('admin/users/edit/'.$user->user_id) ?>"
											 class="btn btn-small btn-info"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/users/delete/'.$user->user_id) ?>')"
											 href="#!" class="btn btn-small btn-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
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
