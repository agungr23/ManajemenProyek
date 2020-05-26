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
						<a href="<?php echo site_url('admin/tasks/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/task/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="name">Name*</label>
								<input class="form-control <?php echo form_error('task_name') ? 'is-invalid':'' ?>"
								 type="text" name="task_name" placeholder="Task name" />
								<div class="invalid-feedback">
									<?php echo form_error('task_name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Instruction*</label>
								<input class="form-control <?php echo form_error('instruction') ? 'is-invalid':'' ?>"
								 type="text" name="instruction" placeholder="Instruction" />
								<div class="invalid-feedback">
									<?php echo form_error('instruction') ?>
								</div>
							</div>

							<div class="form-group">
								<label>Status</label>
								<select name="task_status_id" class="form-control">
									<option value="">- pilih -</option>
									<?php foreach ($tasks_status as $task_status) {
										echo '<option value="'.$task_status->task_status_id.'">'.$task_status->status.'</option>';
									}?>
								</select>
							</div>

							<div>
								<label for="name">Pilih Project*</label>
							</div>
							<div class="form-group input-group">
								<input type="hidden" name="project_id" id="project_id">
								<input type="text" name="project_name" id="project_name" class="form-control <?php echo form_error('project_id') ? 'is-invalid':'' ?>">
								<span class="input-group-btn">
									<button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-project">
										<i class="fa fa-search"></i>
									</button>
								</span>
								<div class="invalid-feedback">
									<?php echo form_error('project_id') ?>
								</div>
							</div>

							<div>
								<label for="name">Pilih Person*</label>
							</div>
							<div class="form-group input-group">
								<input type="hidden" name="user_id" id="user_id">
								<input type="text" name="user_name" id="user_name" class="form-control <?php echo form_error('user_id') ? 'is-invalid':'' ?>">
								<span class="input-group-btn">
									<button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-user">
										<i class="fa fa-search"></i>
									</button>
								</span>
								<div class="invalid-feedback">
									<?php echo form_error('user_id') ?>
								</div>
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

<!-- Select Project-->
<div class="modal fade bd-example-modal-lg" id="modal-project">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
	  	<h4 class="modal-title">Select Project</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>Name</th>
					<th>Price</th>
					<th>Description</th>
					<th>Started</th>
					<th>Ended</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($projects as $project): ?>
				<tr>
					<td><?php echo $project->name ?></td>
					<td><?php echo $project->price ?></td>
					<td><?php echo $project->description ?></td>
					<td><?php echo $project->project_started ?></td>
					<td><?php echo $project->project_ended ?></td>
					<td>
						<button class="btn btn-xs btn-info" id="select" data-id="<?php echo $project->project_id ?>"
						data-name="<?php echo $project->name ?>">
							<i class="fa fa-check"></i> Select
						</button>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
	$(document).on('click','#select', function() {
		var project_id = $(this).data('id');
		var project_name = $(this).data('name');
		$('#project_id').val(project_id);
		$('#project_name').val(project_name);
		$('#modal-project').modal('hide');
	})
})
</script>

<!-- Select User-->
<div class="modal fade bd-example-modal-lg" id="modal-user">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
	  	<h4 class="modal-title">Select User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>Name</th>
					<th>Role</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user): ?>
				<tr>
					<td><?php echo $user->full_name ?></td>
					<td><?php echo $user->role ?></td>
					<td>
						<button class="btn btn-xs btn-info" id="select1" data-id="<?php echo $user->user_id ?>"
						data-name="<?php echo $user->full_name ?>">
							<i class="fa fa-check"></i> Select
						</button>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
	$(document).on('click','#select1', function() {
		var user_id = $(this).data('id');
		var user_name = $(this).data('name');
		$('#user_id').val(user_id);
		$('#user_name').val(user_name);
		$('#modal-user').modal('hide');
		
	})
})
</script>