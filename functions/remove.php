<html>
<body>
<?php
session_start();
include("functions.php");

global $con;
$ip = getIp();
$remove_id = $_GET['remove'];

  $delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
  $run_delete = mysqli_query($con,$delete_product);
  if($run_delete){
    echo "<script>window.open('../shop-basket.php','_self')</script>";
  }

?>
</body>
</html>
