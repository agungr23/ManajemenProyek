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

        <!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
		<?php //$this->load->view("admin/_partials/breadcrumb.php") ?>

		<!-- Icon Cards-->
		<div class="row">
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-user-tie"></i>
				</div>
				<div class="mr-5"><?php echo $this->fungsi->dashboardclient();  ?> Clients</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/clients') ?>">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-warning o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-list"></i>
				</div>
				<div class="mr-5"><?php echo $this->fungsi->dashboardtask();  ?> Tasks</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/tasks') ?>">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-success o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-boxes"></i>
				</div>
				<div class="mr-5"><?php echo $this->fungsi->dashboardproject();  ?> Projects</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/projects') ?>">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-danger o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-users"></i>
				</div>
				<div class="mr-5"><?php echo $this->fungsi->dashboarduser();  ?> Users</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/users') ?>">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
		</div>

		<!-- Area Chart Example-->
		<div class="card mb-3">
			<div class="card-header">
			<i class="fas fa-chart-area"></i>
			<?php foreach ($thnow as $th): ?>
				Project Stats <?php echo $th->tahun ?>
			<?php endforeach; ?>
			</div>
			<div class="card-body">
			<canvas id="joss" width="100%" height="30"></canvas>
			</div>
			<!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
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
    
</body>
</html>

<script>
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

var ctx = document.getElementById("joss");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
    datasets: [{
      label: "Total Project",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [
		<?php foreach ($januari as $jan): ?>
		  '<?php echo $jan->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($februari as $feb): ?>
		  '<?php echo $feb->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($maret as $mar): ?>
		  '<?php echo $mar->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($april as $ap): ?>
		  '<?php echo $ap->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($mei as $mei): ?>
		  '<?php echo $mei->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($juni as $jun): ?>
		  '<?php echo $jun->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($juli as $jul): ?>
		  '<?php echo $jul->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($agustus as $ag): ?>
		  '<?php echo $ag->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($september as $sep): ?>
		  '<?php echo $sep->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($oktober as $ok): ?>
		  '<?php echo $ok->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($november as $nov): ?>
		  '<?php echo $nov->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($desember as $des): ?>
		  '<?php echo $des->jum ?>'
		<?php endforeach; ?>],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
		  min: 0,
		 	<?php if($jan->jum > 0): ?>
				<?php $jum = $jan->jum ?>
			<?php endif; ?>
			<?php if($feb->jum > $jan->jum): ?>
				<?php $jum = $feb->jum ?>
			<?php endif; ?>
			<?php if($mar->jum > $feb->jum): ?>
				<?php $jum = $mar->jum ?>
			<?php endif; ?>
			<?php if($ap->jum > $mar->jum): ?>
				<?php $jum = $ap->jum ?>
			<?php endif; ?>
			<?php if($mei->jum > $ap->jum): ?>
				<?php $jum = $mei->jum ?>
			<?php endif; ?>
			<?php if($jun->jum > $mei->jum): ?>
				<?php $jum = $jun->jum ?>
			<?php endif; ?>
			<?php if($jul->jum > $jun->jum): ?>
				<?php $jum = $jul->jum ?>
			<?php endif; ?>
			<?php if($ag->jum > $jul->jum): ?>
				<?php $jum = $ag->jum ?>
			<?php endif; ?>
			<?php if($sep->jum > $ag->jum): ?>
				<?php $jum = $sep->jum ?>
			<?php endif; ?>
			<?php if($ok->jum > $sep->jum): ?>
				<?php $jum = $ok->jum ?>
			<?php endif; ?>
			<?php if($nov->jum > $ok->jum): ?>
				<?php $jum = $nov->jum ?>
			<?php endif; ?>
			<?php if($des->jum > $nov->jum): ?>
				<?php $jum = $des->jum ?>
			<?php endif; ?>
		  max: <?php echo $jum ?>,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

</script>