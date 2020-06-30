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
      <div><h2>Data Task </h2></div>
        <div class="row" id="printableArea">
        <table class="table table-sm">
        <thead>
                    <tr>
                        <th>No</th>
                        <th>Task</th>
                        <th>Instruction</th>
                        <th>Status</th>
                        <th>Project Name</th>
                        <th>Person</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach ($tasks as $task): ?>
                    <tr>
                        <td>
                            <?php echo $i++ ?>
                        </td>
                        <td>
                            <?php echo $task->task_name ?>
                        </td>
                        <td class="small" width="250">
                            <?php echo $task->instruction ?>
                        </td>
                        <td>
                            <?php echo $task->status ?>
                        <td>
                            <?php echo $task->proj_name ?>
                        </td>
                        <td>
                            <?php echo $task->person ?>
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
