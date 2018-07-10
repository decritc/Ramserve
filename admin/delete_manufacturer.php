<?php
  session_start();

  if(!isset($_SESSION['user_email'])){
    echo "<script>window.open('login.php','_self')</script>";
  }else{
    include("includes/db.php");
    if(isset($_GET['delete_manufacturer'])){
      $delete_id = $_GET['delete_manufacturer'];
      $delete_brand = "delete from brands where brand_id='$delete_id'";
      $run_delete = mysqli_query($con, $delete_brand);

      if($run_delete){
        echo "<script>alert('Manufacturer has been deleted!')</script>";
        echo "<script>window.open('index.php?view_manufacturers','_self')</script>";
      }
    }
  }
 ?>
