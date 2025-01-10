<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    if (isset($_GET['offline_payment_approve'])) {
        $approve_id = $_GET['offline_payment_approve'];

        $update_status = "UPDATE offline_payment SET status = 1 WHERE id = $approve_id";
        $run_update = mysqli_query($con, $update_status);
        if ($run_update) {
            echo "<script>alert('Payment Approved Successfully');</script>";
            echo "<script>window.open('index.php?offline_payment_approve','_self');</script>";
        }
    }
?>
<div class="row"><!--breadcrump start-->
    <div class="col-lg-12">
        <div class="breadcrump">
            <li class="active">
                <i class="fa fa-bar-chart"></i>
                Dashboard / Offline Payment Approve
            </li>
        </div>
    </div>
</div><!--breadcrump End-->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"> View Offline Payments </i>
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Payment ID</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Customer Phone</th>
                                <th>Payment Method</th>
                                <th>Transaction ID</th>
                                <th>Payment Date</th>
                                <th>Status</th>
                                <th>Approve</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                            $i = 0;
                            $get_payments = "SELECT * FROM offline_payment";
                            $run_payments = mysqli_query($con, $get_payments);
                            while ($row = mysqli_fetch_array($run_payments)) {
                                $payment_id = $row['id'];
                                $cus_name = $row['cus_name'];
                                $cus_email = $row['cus_email'];
                                $cus_phone = $row['cus_phone'];
                                $payment_method = $row['payment_method'];
                                $transaction_id = $row['transaction_id'];
                                $created_at = $row['created_at'];
                                $status = $row['status'];
                                $i++;
                            ?>

                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $cus_name; ?></td>
                                <td><?php echo $cus_email; ?></td>
                                <td><?php echo $cus_phone; ?></td>
                                <td><?php echo $payment_method; ?></td>
                                <td><?php echo $transaction_id; ?></td>
                                <td><?php echo $created_at; ?></td>
                                <td><?php echo $status ? 'Approved' : 'Disapproved'; ?></td>
                                <td>
                                    <?php if (!$status) { ?>
                                        <a href="index.php?offline_payment_approve=<?php echo $payment_id; ?>" class="btn btn-success">Approve</a>
                                    <?php } ?>
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
