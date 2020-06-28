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

                <div id="content-wrapper">
                <?php echo $this->session->flashdata('filedel'); ?>

				<!-- DataTables -->
				<div class="card mb-3">
					
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>File</th>
                                        <th>Task</th>
                                        <th>Project</th>
                                        <th>Date Uploaded</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($files as $file): ?>
									<tr>
										<td>
											<?php echo $file->file ?>
										</td>
                                        <td>
											<?php echo $file->task_name ?>
										</td>
                                        <td>
											<?php echo $file->proj_name ?>
                                        </td>
                                        <td>
											<?php echo $file->dateuploaded ?>
										</td>
										<td width="210">

                                             <a href="<?php echo site_url('admin/file/download/'.$file->task_id) ?>"
                                             class="btn btn-small btn-success" ><i class="fa fa-download"></i> Download</a>
                                             <a onclick="deleteConfirm('<?php echo site_url('admin/file/delete/'.$file->task_id) ?>')" href="#!"
											 class="btn btn-small btn-danger" ><i class="fa fa-trash"></i> Delete</a>
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

