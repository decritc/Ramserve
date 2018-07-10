<?php
  session_start();

  if(!isset($_SESSION['user_email'])){
    echo "<script>window.open('login.php','_self')</script>";
  }else{
 ?>
<!DOCTYPE>
<html>
  <head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles/styles.css" media="all"/>
  </head>
  <body>
    <div class="main_wrapper">
      <div id="header"></div>
        <div id="right">
          <h2 style="text-align:center; ">Manage Content</h2>
          <a href="index.php?insert_product">Insert New Product</a>
          <a href="index.php?view_products">View All Products</a>
          <a href="index.php?insert_type">Insert New Type</a>
          <a href="index.php?view_types">View All Types</a>
          <a href="index.php?insert_manufacturer">Insert New Manufacturer</a>
          <a href="index.php?view_manufacturers">View All Manufacturers</a>
          <a href="index.php?view_customers">View Customers</a>
          <a href="index.php?view_orders">View Orders</a>
          <a href="index.php?view_payments">View Payments</a>
          <a href="logout.php">Admin Logout</a>
        </div>

      <div id="left">
        <h2 style="color:darkred; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>
        <?php
          if(isset($_GET['insert_product'])){
            include("insert_product.php");
          }
          if(isset($_GET['view_products'])){
            include("view_products.php");
          }
          if(isset($_GET['edit_pro'])){
            include("edit_pro.php");
          }
          if(isset($_GET['insert_type'])){
            include("insert_type.php");
          }
          if(isset($_GET['view_types'])){
            include("view_types.php");
          }
          if(isset($_GET['edit_type'])){
            include("edit_type.php");
          }
          if(isset($_GET['insert_manufacturer'])){
            include("insert_manufacturer.php");
          }
          if(isset($_GET['view_manufacturers'])){
            include("view_manufacturers.php");
          }
          if(isset($_GET['edit_manufacturer'])){
            include("edit_manufacturer.php");
          }
          if(isset($_GET['view_customers'])){
            include("view_customers.php");
          }
        ?>
      </div>

    </div>
  </body>
</html>
<?php } ?>
