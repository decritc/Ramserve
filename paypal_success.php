<?php
  session_start();
?>

<html>
  <head>
    <title>Payment Successful!</title>
  </head>
  <body>
    <?php
      include ("includes/db.php");
      include ("functions/functions.php");
      global $con;
      $ip = getIp();
      $sel_price = "select * from cart where ip_add='$ip'";
      $run_price = mysqli_query($con,$sel_price);

      while($p_price=mysqli_fetch_array($run_price)){
        $pro_id = $p_price['p_id'];
        $pro_price = "select * from products where product_id='$pro_id'";
        $run_pro_price = mysqli_query($con,$pro_price);

        while ($pp_price = mysqli_fetch_array($run_pro_price)){
          $product_price = array($pp_price['product_price']);
          $product_id = $pp_price['product_id'];
        }
      }
      // get qty of product
      $get_qty = "select * from cart where p_id='$pro_id'";
      $run_qty = mysqli_query($con, $get_qty);
      $row_qty= mysqli_fetch_array($run_qty);
      $qty = $row_qty['qty'];

      // customer details
      $user = $_SESSION['customer_email'];
      $get_cust ="select * from customers where customer_email='$user'";
      $run_cust = mysqli_query($con, $get_cust);
      $row_cust = mysqli_fetch_array($run_cust);
      $c_name = $row_cust['customer_name'];
      $c_id = $row_cust['customer_id'];

      // payment details from paypal
      $amount = $_GET['amt'];
      $currency = $_GET['cc'];
      $trx_id = $_GET['tx'];

      $invoice = mt_rand();

      $insert_payment = "insert into payments (amount, customer_id, product_id,trx_id,currency, payment_date) values
      ('$amount','$c_id','$pro_id','$trx_id','$currency',NOW())";
      $run_payments = mysqli_query($con, $insert_payment);

      $insert_orders = "insert into orders (p_id, c_id, qty, invoice_number_ order_date, status) values ('$pro_id','$c_id','$qty','$invoice', NOW(), 'in Progress')";
      $run_order = mysqli_query($con, $insert_order);

      $empty_cart = "delete from cart where ip_add='$ip'";
      $run_cart = mysqli_query($con, $empty_cart);

      $cart_total = $_SESSION['cart_total'];

      if ($amount == $cart_total){
        echo "<h2>Welcome: ". $_SESSION['customer_email']. "<br>" ."Your Payment was succesful!</h2>";
        echo "<a href ='http://ramserve.hopto.org/customer/customer_account.php'>Go to your Account</a>";
      }else{
        echo "<h2>Welcome Guest, Your payment failed!</h2><br>";
        echo "<a href ='http://ramserve.hopto.org/store.php'>Go to Store</a>";
      }

      ?>
  </body>
</html>
