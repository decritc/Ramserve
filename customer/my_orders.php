<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Order</th>
        <th>Date</th>
        <th>Total</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
  <?php
    include("../includes/db.php");

    $user = $_SESSION['customer_email'];
    $get_cust ="select * from customers where customer_email='$user'";
    $run_cust = mysqli_query($con, $get_cust);
    $row_cust = mysqli_fetch_array($run_cust);

    $c_id = $row_cust['customer_id'];

    $get_order = "select * from orders where c_id='$c_id'";
    $run_order = mysqli_query($con, $get_order);
    $i = 0;
    while($row_order=mysqli_fetch_array($run_order)){

      $order_id = $row_order['order_id'];
      $qty = $row_order['qty'];
      $pro_id = $row_order['p_id'];
      $invoice_number = $row_order['invoice_number'];
      $order_date= $row_order['order_date'];
      $status= $row_order['status'];
      $order_total_price = $row_order['order_total_price'];
      $i++;

      $get_pro = "select * from products where product_id=$pro_id";
      $run_pro = mysqli_query($con, $get_pro);

      $row_pro = mysqli_fetch_array($run_pro);
      $pro_image = $row_pro['product_image'];
      $pro_title = $row_pro['product_title'];

   ?>
  <tr>
    <td><?php echo '# '.$invoice_number;?></td>
    <td><?php echo $order_date;?></td>
    <td><?php echo '$'.$order_total_price;?></td>
    <td><?php echo'<span class="label label-info">'. $status . '</span></td>';?>
    <td><a href="customer-order.html" class="btn btn-template-main btn-sm">View</a>
  </tr>
  <?php } ?>

</table>
</div>
