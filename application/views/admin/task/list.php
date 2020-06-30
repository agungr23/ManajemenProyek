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
						<a href="<?php echo site_url('admin/tasks/add') ?>"><i class="fas fa-plus"></i> Add New</a>
						<?php if($this->fungsi->user_login()->role == "admin") { ?>
						<a href="<?php echo site_url('admin/forprint/task') ?>" class="float-right"><i class="fas fa-print"></i> Print</a>
						<?php } ?>
					</div>
					<div class="card-body">
					
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Task</th>
										<th>Instruction</th>
										<th>Status</th>
										<th>Project Name</th>
										<th>Person</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($tasks as $task): ?>
									<tr>
										<td>
											<?php echo $task->task_name ?>
										</td>
										<td class="small" width="250">
											<?php echo $task->instruction ?>
										</td>
										<td>
											<?php if($task->status == "In Progress"): ?>
                                                <span class="badge badge-primary"><?php echo $task->status ?></span>
                                            <?php elseif($task->status == "Stuck"): ?>
                                                <span class="badge badge-danger"><?php echo $task->status ?></span>
                                            <?php else: ?>
                                                <span class="badge badge-success"><?php echo $task->status ?></span>
                                            <?php endif; ?>
										<td>
											<?php echo $task->proj_name ?>
										</td>
										<td>
											<?php echo $task->person ?>
										</td>
										<td width="170">
											<a href="<?php echo site_url('admin/tasks/edit/'.$task->task_id) ?>"
											 class="btn btn-small btn-info"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/tasks/delete/'.$task->task_id) ?>')"
											 href="#!" class="btn btn-small btn-danger"><i class="fas fa-trash"></i> Hapus</a>
											 <!-- <a href="<?php echo base_url().'admin/invoice?id='.$task->user_id ?>" 
											 class="btn btn-small btn-success"><i class="fas fa-file-invoice-dollar"></i> Invoice</a> -->
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
