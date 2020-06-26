<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<style>
		.isDisabled {
			color: currentColor;
			cursor: not-allowed;
			opacity: 0.5;
			text-decoration: none;
		}	
	</style>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		

			<div class="container-fluid">

				<?php //$this->load->view("admin/_partials/breadcrumb.php") ?>
                <div id="content-wrapper">
				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<?php if($this->fungsi->user_login()->role == "admin") { ?>
						<a href="<?php echo site_url('admin/tasks/add') ?>"><i class="fas fa-plus"></i> Add New</a>
						<?php } ?>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>File</th>
                                        <th>Task</th>
                                        <th>Project</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($tasks as $task): ?>
									<tr>
										<td>
											<?php echo $task->file ?>
										</td>
                                        <td>
											<?php echo $task->task_name ?>
										</td>
                                        <td>
											<?php echo $task->proj_name ?>
										</td>
										<td width="230">

                                             <a href="<?php //echo site_url('admin/tasksfu/'.$task->task_id) ?>"
											 class="btn btn-small btn-info" ><i class="fas fa-upload"></i> Upload File</a>
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

