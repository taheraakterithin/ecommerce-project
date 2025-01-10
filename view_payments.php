<?php  
if (!isset($_SESSION['admin_email'])){

  echo "<script>window.open('login.php','_self')</script>";
  }else{

?>

<div class="row"><!--breadcrump start-->
	<div class="col-lg-12">
		<div class="breadcrump">
			<li class="active">
				<i class="fa fa-bar-chart"></i>
				Dashboard / View Payments
			</li>
		</div>
	</div>
</div><!--breadcrump End-->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i>
					View Payments
				</h3>
			</div>
			<div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>sl</th>
                                <th>Payment No: </th>
                                <th>Customer name </th>
                                <th>Customer email </th>
                                <th>Amount</th>
                                <th>Payment Date: </th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        $get_payments = "SELECT * FROM paymentgateway";
                        $run_payments = mysqli_query($con, $get_payments);
                            while ($row_payments = mysqli_fetch_array($run_payments)) {

                                $customer_name = $row_payments['customer_name'];
                                $customer_email = $row_payments['customer_email'];
                                $amount = $row_payments['amount'];
                                $created_at = $row_payments['created_at'];
                                $status = $row_payments['status'];
                                $payment_date = $row_payments['created_at'];
                                $payment_id = $row_payments['order_id']; // Assuming you have this ID in your database

                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $payment_id; ?></td>
                                    <td><?php echo $customer_name; ?></td>
                                    <td><?php echo $customer_email; ?></td>
                                    <td>BDT <?php echo $amount; ?></td>
                                    <td><?php echo $payment_date; ?></td>
                                    <td>
                                        <?php echo ($status == 1) ? "Successful" : "Pending"; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php } ?>