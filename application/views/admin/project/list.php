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
						<a href="<?php echo site_url('admin/projects/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Name</th>
										<th>Price</th>
										<!-- <th>Photo</th> -->
										<th>Description</th>
										<th>Started</th>
										<th>Ended</th>
										<th>Status</th>
										<th>Client</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($projects as $project): ?>
									<tr>
										<td width="100">
											<?php echo $project->name ?>
										</td>
										<td>
											<?php echo $project->price ?>
										</td>
										<!-- <td>
											<img src="<?php echo base_url('upload/project/'.$project->image) ?>" width="64" />
										</td> -->
										<td class="small">
											<?php echo substr($project->description, 0, 120) ?>...</td>
										<td>
											<?php echo $project->project_started ?>
										</td>
										<td>
											<?php echo $project->project_ended ?>
										</td>
										<td>
											<span class="badge badge-success"><?php echo $project->status ?></span>
										</td>
										<td>
											<?php echo $project->cn ?>
										</td>
										<td width="260">

												<!-- <a href="<?php echo site_url('admin/project/task/'.$project->proj_name) ?>"
												 class="btn btn-small btn-primary"><i class="fas fa-tasks"></i> Task</a> -->

											<a href="<?php echo site_url('admin/projects/edit/'.$project->project_id) ?>"
											 class="btn btn-small btn-info"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/projects/delete/'.$project->project_id) ?>')"
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
