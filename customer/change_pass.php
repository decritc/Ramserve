
<form method="post" action="" style="margin: 10px;">
  <div class ="form-group">
    <h3 style="text-align:center;">Change Your Password</h3>
    <br>
    <label>Current Password:</label>
    <input type="password" class="form-control" name="current_pass" required>
    <br>
    <label>New Password: </label>
    <input type="password" class="form-control" name="new_pass" required>
    <br>
    <label>Confirm New Password: </label>
    <input type="password" class="form-control" name="confirm_pass" required>
    <br>
    <input type="submit" class="btn btn-primary" name="change_pass" value="Change Password"/>
  </div>
</form>
<?php
  include("../includes/db.php");

  if(isset($_POST['change_pass'])){
    $user = $_SESSION['customer_email'];
    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];

    $sel_pass = "select * from customers where customer_pass='$current_pass' AND customer_email='$user'";
    $run_pass = mysqli_query($con, $sel_pass);
    $check_pass = mysqli_num_rows($run_pass);

    if($check_pass==0){
      echo "<script>alert('Your Current Password is incorrect!')</script>";
      exit();
    }elseif($new_pass!=$confirm_pass){
      echo "<script>alert('Passwords do not match!')</script>";
      exit();
    }else{
      $update_pass = "update customers set customer_pass='$new_pass' where customer_email='$user'";
      $run_update = mysqli_query($con, $update_pass);

      echo "<script>alert('Your password was updated successfully!')</script>";
      echo "<script>window.open('customer_account.php','_self')</script>";
    }
  }
 ?>
