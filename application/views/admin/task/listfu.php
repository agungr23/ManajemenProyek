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
										<td width="230">
											<!-- <a href="<?php //echo site_url('admin/tasksfu/'.$task->task_id) ?>"
											 class="btn btn-small btn-info" data-toggle="modal" data-target="#modal-ut" id="select" 
                                             data-id="<?php echo $task->task_id; ?>"
                                             data-name="<?php echo $task->task_name; ?>"
                                             data-instruction="<?php echo $task->instruction; ?>"
                                             data-file="<?php echo $task->file; ?>"
                                             data-projectid="<?php echo $task->project_id; ?>"
                                             data-taskstatusid="<?php echo $task->task_status_id; ?>"
                                             data-userid="<?php echo $task->user_id; ?>">
                                             <i class="fas fa-upload"></i> Upload File</a> -->

                                             <a href="<?php //echo site_url('admin/tasksfu/'.$task->task_id) ?>"
											 class="btn btn-small btn-info" data-toggle="modal" data-target="#modal-ut<?php echo $task->task_id; ?>">
                                             <i class="fas fa-upload"></i> Upload File</a>
											 <?php if($task->status == "Done"): ?>
												<a href="<?php echo base_url().'admin/invoice?id='.$task->task_id ?>" 
												class="btn btn-small btn-success"><i class="fas fa-file-invoice-dollar"></i> Invoice</a>
											 <?php else: ?>
                                                <button href="<?php echo base_url().'admin/invoice?id='.$task->task_id ?>" 
												class="btn btn-small btn-success isDisabled"><i class="fas fa-file-invoice-dollar isDisabled"></i> Invoice</button>
                                            <?php endif; ?>
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

<?php foreach ($tasks as $task1): ?>
<div class="modal fade" id="modal-ut<?php echo $task1->task_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-item">Upload Your File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url(); ?>index.php/admin/tasksfu/editt" method="post" enctype="multipart/form-data">
      <!-- <form action="<?php echo site_url('admin/Tasksfu/edit/'.$task1->task_id) ?>" method="post" > -->
      <div class="modal-body">
        
        <!-- <input type="text" name="id" value="<?php //echo $task->task_id ?>" /> -->
        <input type="hidden" name="id" value="<?php echo $task1->task_id; ?>" class="form-control" />
        <input type="hidden" name="task_name" value="<?php echo $task1->task_name; ?>" class="form-control" />
        <input type="hidden" name="instruction" value="<?php echo $task1->instruction; ?>" class="form-control" />

        <!-- <input class="form-control-file" type="file" name="image" class="form-control"/>
		<input type="text" name="old_image" value="<?php echo $task1->file; ?>" class="form-control" /> -->

        <div class="form-group">
							<!-- <label for="name">File</label></br> -->
							<input class="form-control-file" type="file" name="image" action="<?php echo site_url('admin/tasksfu/uploadFile');?>"/>
							<input type="hidden" name="old_image" value="<?php echo $task1->file ?>" />
		</div>

        <input type="hidden" name="project_id" value="<?php echo $task1->project_id; ?>" class="form-control" />
        <input type="hidden" name="task_status_id" value="<?php echo $task1->task_status_id; ?>" class="form-control" />
        <input type="hidden" name="user_id" value="<?php echo $task1->user_id; ?>" class="form-control" />

        <!-- <input class="btn btn-success" type="submit" name="btn" value="Save" /> -->
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        <button type="submit" class="btn btn-primary" name="btn" value="Save">Save changes</button>
        <!-- <input class="btn btn-success" type="submit" name="btn" value="Save" /> -->
      </div>
      
    </div>
  </div>
</div>
</form>
<?php endforeach; ?>

