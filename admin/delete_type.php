<?php
  session_start();

  if(!isset($_SESSION['user_email'])){
    echo "<script>window.open('login.php','_self')</script>";
  }else{

    include("includes/db.php");
    if(isset($_GET['delete_type'])){
      $delete_id = $_GET['delete_type'];
      $delete_cat = "delete from categories where cat_id='$delete_id'";
      $run_delete = mysqli_query($con, $delete_cat);
      $delete_dense = "delete from density where dense_cat='$delete_id'";
      $run_dense_delete = mysqli_query($con, $delete_dense);

      if($run_delete && $run_dense_delete){
        echo "<script>alert('Type has been deleted!')</script>";
        echo "<script>window.open('index.php?view_types','_self')</script>";
      }
    }
  }
 ?>
