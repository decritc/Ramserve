<?php
  session_start();

  if(!isset($_SESSION['user_email'])){
    echo "<script>window.open('login.php','_self')</script>";
  }else{

    include("includes/db.php");
    if(isset($_GET['edit_type'])){
      $cat_id = $_GET['edit_type'];
      $get_cat = "select * from categories where cat_id='$cat_id'";
      $get_dense = "select * from density where dense_cat='$cat_id'";
      $run_cat = mysqli_query($con, $get_cat);
      $run_dense = mysqli_query($con, $get_dense);
      $row_cat = mysqli_fetch_array($run_cat);
      $dense_stack = array();
      while ($row_dense = mysqli_fetch_array($run_dense)){
        array_push($dense_stack, $row_dense['dense_title']);
      }
      $cat_id = $row_cat['cat_id'];
      $cat_title= $row_cat['cat_title'];
    }
   ?>
  <form action="" method="post" style="padding: 80px;">

    <b>Update Type:</b>
    <input type="text" name="new_cat" value="<?php echo $cat_title;?>"/>
    <br><br>
    <ul style = 'list-style:none'><b>Available Densities(check all that apply):</b>
      <li><input type="checkbox" name="4gb" <?php echo (in_array('4gb',$dense_stack) ? 'checked': '');?>/>4gb</li>
      <li><input type="checkbox" name="8gb" <?php echo (in_array('8gb',$dense_stack) ? 'checked': '');?>/>8gb</li>
      <li><input type="checkbox" name="16gb" <?php echo (in_array('16gb',$dense_stack) ? 'checked': '');?>/>16gb</li>
      <li><input type="checkbox" name="32gb" <?php echo (in_array('32gb',$dense_stack) ? 'checked': '');?>/>32gb</li>
      <li><input type="checkbox" name="64gb" <?php echo (in_array('64gb',$dense_stack) ? 'checked': '');?>/>64gb</li>
      <li><input type="checkbox" name="128gb" <?php echo (in_array('128gb',$dense_stack) ? 'checked': '');?>/>128gb</li>
    </li>
    <br><br>
    <input type="submit" name="update_cat" value="Update Type"/>
  </form>

  <?php
    if(isset($_POST['update_cat'])){
      $update_id = $cat_id;
      $new_cat = $_POST['new_cat'];
      $update_cat = "update categories set cat_title='$new_cat' where cat_id='$update_id'";
      $run_cat = mysqli_query($con, $update_cat);

      if(isset($_POST['4gb'])){
        if(!in_array('4gb',$dense_stack)){
          $insert_dense = "insert into density (dense_cat,dense_title) values ('$update_id','4gb')";
          mysqli_query($con, $insert_dense);
        }
      }else{
        $remove_dense = "delete from density where dense_cat='$update_id' AND dense_title = '4gb'";
        mysqli_query($con, $remove_dense);
      }

      if(isset($_POST['8gb'])){
        if(!in_array('8gb',$dense_stack)){
          $insert_dense = "insert into density (dense_cat,dense_title) values ('$update_id','8gb')";
          mysqli_query($con, $insert_dense);
        }
      }else{
        $remove_dense = "delete from density where dense_cat='$update_id' AND dense_title = '8gb'";
        mysqli_query($con, $remove_dense);
      }

      if(isset($_POST['16gb'])){
        if(!in_array('16gb',$dense_stack)){
          $insert_dense = "insert into density (dense_cat,dense_title) values ('$update_id','16gb')";
          mysqli_query($con, $insert_dense);
        }
      }else{
        $remove_dense = "delete from density where dense_cat='$update_id' AND dense_title = '16gb'";
        mysqli_query($con, $remove_dense);
      }

      if(isset($_POST['32gb'])){
        if(!in_array('32gb',$dense_stack)){
          $insert_dense = "insert into density (dense_cat,dense_title) values ('$update_id','32gb')";
          mysqli_query($con, $insert_dense);
        }
      }else{
        $remove_dense = "delete from density where dense_cat='$update_id' AND dense_title = '32gb'";
        mysqli_query($con, $remove_dense);
      }

      if(isset($_POST['64gb'])){
        if(!in_array('64gb',$dense_stack)){
          $insert_dense = "insert into density (dense_cat,dense_title) values ('$update_id','64gb')";
          mysqli_query($con, $insert_dense);
        }
      }else{
        $remove_dense = "delete from density where dense_cat='$update_id' AND dense_title = '64gb'";
        mysqli_query($con, $remove_dense);
      }

      if(isset($_POST['128gb'])){
        if(!in_array('128gb',$dense_stack)){
          $insert_dense = "insert into density (dense_cat,dense_title) values ('$update_id','128gb')";
          mysqli_query($con, $insert_dense);
        }
      }else{
        $remove_dense = "delete from density where dense_cat='$update_id' AND dense_title = '128gb'";
        mysqli_query($con, $remove_dense);
      }

      if($run_cat){
        echo "<script>alert('Type has been updated!')</script>";
        echo "<script>window.open('index.php?view_types','_self')</script>";
      }
    }
  }
?>
