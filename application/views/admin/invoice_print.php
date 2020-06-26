<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body id="page-top">

<div id="wrapper">


	<div id="content-wrapper">
    <div class="container-fluid">
        <div class="row" id="printableArea">
          <div class="col-12">


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <img src="<?php echo base_url('assets/img/kodegiri_hitam.png')?>" width="70" height="45" > PT. Kode Evolusi Bangsa
                    <small class="float-right">Date: <?php echo date('d/m/Y') ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong><?php echo $this->fungsi->user_login()->full_name ?></strong><br>
                    Phone: <?php echo $this->fungsi->user_login()->phone ?><br>
                    Email: <?php echo $this->fungsi->user_login()->email ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <?php foreach ($invos as $invo): ?>
                    <strong><?php echo $invo->namauser ?></strong><br>
                    Phone: <?php echo $invo->nohp ?><br>
                    Email: <?php echo $invo->email ?>
                    <?php endforeach; ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #<?= substr(md5(time()), 0, 9) ?>-<?php echo $invo->userid ?></b><br>
                  <br>
                  <!-- <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567 -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Project</th>
                      <th>Task</th>
                      <th>Description</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <?php foreach ($invs as $inv): ?>
                    <tbody>
                    <tr>
                      <td><?php echo $inv->np ?></td>
                      <td><?php echo $inv->namatask ?></td>
                      <td><?php echo $inv->namainstruksi ?></td>
                      <td><?php echo $inv->namastatus ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                  

                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Jobs Complete:</p>
                  <!-- <img src="../../dist/img/credit/visa.png" alt="Visa">
                  <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../../dist/img/credit/american-express.png" alt="American Express">
                  <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                  thank you for all the hard work you have done.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <!-- <p class="lead">Amount Due 2/22/2014</p> -->

                  <!-- <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$250.30</td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$265.24</td>
                      </tr>
                    </table> -->
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row no-print">
                <div class="col-12">
                  <!-- <a class="btn btn-default"><i class="fas fa-print" ></i> Print</a> -->
                  <button type="button" class="btn btn-success float-right" onclick="printDiv('printableArea')"><i class="far fa-credit-card"></i>
                    Print
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;" > 
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
      </div><!-- /.container-fluid -->


	</div>
	<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<script src="<?php echo base_url('css/printThis.js') ?>"></script>
<script>
$('#bisayuk').click(function(){
    $('#keren').printThis();
});
</script>

<script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>

<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
    
</body>
</html>
