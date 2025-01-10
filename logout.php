<?php
include("includes/db.php");
session_start();
session_destroy();

$update_status = "UPDATE admins SET is_logged_in=0 WHERE admin_id = (SELECT admin_id FROM admins LIMIT 1)";
mysqli_query($con, $update_status);

echo "<script>window.open('login.php','_self')</script>";

  ?>