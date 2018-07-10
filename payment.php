<div style="margin:10px;">
  <form align="center" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="upload" value="1">
    <input type="hidden" name="business" value="businesstest@ramserve.com">

  <?php
  include("admin/includes/db.php");
  global $con;
  $total = 0;
  $i = 1;
  $ip = getIp();
  $sel_checkout = "select * from cart where ip_add='$ip'";
  $run_checkout = mysqli_query($con,$sel_checkout);

  while($p_checkout=mysqli_fetch_array($run_checkout)){
      $pro_id = $p_checkout['p_id'];
      $pro_qty = $p_checkout['qty'];
      $pro_checkout = "select * from products where product_id='$pro_id'";
      $run_pro_checkout = mysqli_query($con,$pro_checkout);

      while ($pp_checkout = mysqli_fetch_array($run_pro_checkout)){
        $product_price = array($pp_checkout['product_price']);
        $product_name = $pp_checkout['product_title'];

        echo "<input type='hidden' name='item_name_$i' value='$product_name'>";
        echo "<input type='hidden' name='amount_$i' value='$product_price[0]'>";
        echo "<input type='hidden' name='quantity_$i' value='$pro_qty'>";
        $i++;
      }
  }
   ?>

    <input type="hidden" name="lc" value="US">
    <input type="hidden" name="button_subtype" value="services">
    <input type="hidden" name="no_note" value="0">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="return" value="http://ramserve.hopto.org/paypal_success.php"/>
    <input type="hidden" name="cancel_return" value="http://ramserve.hopto.org/paypal_cancel.php"/>
    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_SM.gif:NonHostedGuest">
    <input type="image" src="img/buy-now-button.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
  </form>

</div>
