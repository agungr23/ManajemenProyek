<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body id="page-top">

<div id="wrapper">


	<div id="content-wrapper">
    <div class="container-fluid p-5">
      <div><h2>Data Project </h2></div>
        <div class="row" id="printableArea">
        <table class="table table-sm">
        <thead>
									<tr>
                    <th>No</th>
										<th>Name</th>
										<th>Price</th>
										<th>Description</th>
										<th>Started</th>
										<th>Ended</th>
										<th>Status</th>
										<th>Client</th>
									</tr>
								</thead>
								<tbody>
                <?php $i = 1 ?>
									<?php foreach ($projects as $project): ?>
									<tr>
                    <td>
											<?php echo $i++ ?>
										</td>
										<td width="100">
											<?php echo $project->name ?>
										</td>
										<td>
											<?php $hia = $project->price ?>
											<?php 
											echo indo_currency($hia);
											?>
										</td>
										<td class="small">
											<?php echo $project->description ?></td>
										<td>
											<?php echo $project->project_started ?>
										</td>
										<td>
											<?php echo $project->project_ended ?>
										</td>
										<td>
                      <?php echo $project->status ?>
										</td>
										<td>
											<?php echo $project->cn ?>
										</td>
									</tr>
									<?php endforeach; ?>

                  </tbody>
                </table>
      </div><!-- /.container-fluid -->


	</div>
	<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>

<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
    
</body>
</html>
