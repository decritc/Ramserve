<?php
  session_start();

  if(!isset($_SESSION['user_email'])){
    echo "<script>window.open('login.php','_self')</script>";
  }else{
 ?>
  <form action="" method="post" style="padding: 80px;">

    <b>Insert New Type:</b>
    <input type="text" name="new_cat" required/>
    <br><br>
    <ul style = 'list-style:none'><b>Available Densities(check all that apply):</b>
      <li><input type="checkbox" name="4gb"/>4gb</li>
      <li><input type="checkbox" name="8gb"/>8gb</li>
      <li><input type="checkbox" name="16gb"/>16gb</li>
      <li><input type="checkbox" name="32gb"/>32gb</li>
      <li><input type="checkbox" name="64gb"/>64gb</li>
      <li><input type="checkbox" name="128gb"/>128gb</li>
    </li>
    <br><br>
    <input type="submit" name="add_cat" value="Add Type"/>
  </form>

  <?php
    include("includes/db.php");
    if(isset($_POST['add_cat'])){
      $new_cat = $_POST['new_cat'];
      $insert_cat = "insert into categories (cat_title) values ('$new_cat')";
      $run_cat = mysqli_query($con, $insert_cat);

      $get_cat = "select * from categories where cat_title='$new_cat'";
      $run_cat = mysqli_query($con, $get_cat);
      $row_cat = mysqli_fetch_array($run_cat);
      $insert_cat_id = $row_cat['cat_id'];

      if(isset($_POST['4gb'])){
        if(!in_array('4gb',$dense_stack)){
          $insert_dense = "insert into density (dense_cat,dense_title) values ('$insert_cat_id','4gb')";
          mysqli_query($con, $insert_dense);
        }
      }

      if(isset($_POST['8gb'])){
        if(!in_array('8gb',$dense_stack)){
          $insert_dense = "insert into density (dense_cat,dense_title) values ('$insert_cat_id','8gb')";
          mysqli_query($con, $insert_dense);
        }
      }

      if(isset($_POST['16gb'])){
        if(!in_array('16gb',$dense_stack)){
          $insert_dense = "insert into density (dense_cat,dense_title) values ('$insert_cat_id','16gb')";
          mysqli_query($con, $insert_dense);
        }
      }

      if(isset($_POST['32gb'])){
        if(!in_array('32gb',$dense_stack)){
          $insert_dense = "insert into density (dense_cat,dense_title) values ('$insert_cat_id','32gb')";
          mysqli_query($con, $insert_dense);
        }
      }

      if(isset($_POST['64gb'])){
        if(!in_array('64gb',$dense_stack)){
          $insert_dense = "insert into density (dense_cat,dense_title) values ('$insert_cat_id','64gb')";
          mysqli_query($con, $insert_dense);
        }
      }

      if(isset($_POST['128gb'])){
        if(!in_array('128gb',$dense_stack)){
          $insert_dense = "insert into density (dense_cat,dense_title) values ('$insert_cat_id','128gb')";
          mysqli_query($con, $insert_dense);
        }
      }

      if($run_cat){
        echo "<script>alert('New Type has been added!')</script>";
        echo "<script>window.open('index.php?view_types','_self')</script>";
      }
    }
  }
 ?>
