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
      <div><h2>Data Client </h2></div>
        <div class="row" id="printableArea">
        <table class="table table-sm">
        <thead>
                    <tr>
                        <th>No</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Industry</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach ($clients as $client): ?>
                    <tr>
                        <td>
                            <?php echo $i++ ?>
                        </td>
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
                            <?php echo $client->status ?>
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
