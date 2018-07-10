
<br><br>
<h3 style="text-align:center;">Do you really want to DELETE your account?</h3>
<form action= "" method="post" >
  <br><br>
    <div class="text-center" style="margin:20px;">
      <input class="btn btn-danger" type="submit" name="yes" value="Delete Account"/>
      <input class="btn btn-success" type="submit" name="no" value="Do not Delete"/>
    </div>
</form>

<?php
include("../includes/db.php");
  $user = $_SESSION['customer_email'];

  if(isset($_POST['yes'])){
    $delete_customer = "delete from customers where customer_email='$user'";
    $run_customer = mysqli_query($con,$delete_customer);
    session_destroy();
    echo "<script>alert('Your account has been deleted!')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
  }
  if(isset($_POST['no'])){
    echo "<script>alert('Thank you for your continued support!')</script>";
    echo "<script>window.open('customer_account.php','_self')</script>";

  }
 ?>
