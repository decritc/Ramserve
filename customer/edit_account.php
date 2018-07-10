<?php
  $user = $_SESSION['customer_email'];
  $get_cust ="select * from customers where customer_email='$user'";
  $run_cust = mysqli_query($con, $get_cust);
  $row_cust = mysqli_fetch_array($run_cust);

  $c_id = $row_cust['customer_id'];
  $c_name = $row_cust['customer_name'];
  $c_email = $row_cust['customer_email'];
  $c_pass = $row_cust['customer_pass'];
  $c_address = $row_cust['customer_address'];
  $c_country = $row_cust['customer_country'];
  $c_city = $row_cust['customer_city'];
  $c_zip = $row_cust['customer_zip'];
  $c_phone = $row_cust['customer_contact'];

?>
<form action="" method="post" enctype="multipart/form-data" style="margin: 10px;">
  <h3>Update Your Account</h3>
  <br>
  <div class="form-group">
    <label>Name:</label>
    <input type="text" class="form-control" name="c_name" value="<?php echo $c_name; ?>" required/>
    <br>
    <label>Email:</label>
    <input type="text" class="form-control" name="c_email" value="<?php echo $c_email; ?>" required/>
    <br>
    <label>Password:</label>
    <input type="password" class="form-control" name="c_pass" value="<?php echo $c_pass; ?>" disabled/>
    <br>
    <label>Address:</label>
    <input type="text" class="form-control" name="c_address" value="<?php echo $c_address; ?>" required/>
    <br>
    <label>Country:</label>
    <select name="c_country" class="form-control" disabled>
      <option><?php echo $c_country; ?></option>
    </select>
    <br>
    <label>City:</label>
    <input type="text" class="form-control" name="c_city" value="<?php echo $c_city; ?>" required/>
    <br>
    <label>Zip Code:</label>
    <input type="text" class="form-control" name="c_zip" value="<?php echo $c_zip; ?>" required/>
    <br>
    <label>Phone:</label>
    <input type="text" class="form-control" name="c_phone" value="<?php echo $c_phone; ?>" required/>
  </div>
  <br>
  <input type="submit" class="btn btn-primary" name="update" value="Update Account"/>
</form>

<?php
	if(isset($_POST['update'])){

		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_address = $_POST['c_address'];
		$c_city = $_POST['c_city'];
		$c_zip = $_POST['c_zip'];
		$c_phone = $_POST['c_phone'];

		$update_c = "update customers set customer_name='$c_name', customer_email='$c_email',
                customer_pass='$c_pass', customer_address='$c_address', customer_country='$c_country',
                customer_city='$c_city', customer_zip='$c_zip', customer_contact='$c_phone' where
                customer_id='$c_id'";


		$run_update = mysqli_query($con, $update_c);

		if($run_update){
		    echo "<script>alert('Your account has successfully updated')</script>";
        echo "<script>window.open('customer_account.php','_self')</script>";
		}
	}
?>
