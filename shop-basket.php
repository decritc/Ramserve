<!DOCTYPE html>
<?php
  session_start();
  include ("admin/includes/db.php");
	include("functions/functions.php");
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RAM-Serve Store</title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap and Font Awesome css -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Css animations  -->
    <link href="css/animate.css" rel="stylesheet">

    <!-- Theme stylesheet -->
    <link href="css/styles.css" rel="stylesheet" id="theme-stylesheet">

</head>

<body>


    <div id="all">
        <header>

          <!-- *** TOP ***
_________________________________________________________ -->
          <div id="top">
              <div class="container">
                  <div class="row">
                      <div class="col-xs-7" style="float: right;">
                          <div class="social">
                              <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                              <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                              <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                              <a href="contact.php" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                          </div>

                          <div class="login">
                            <?php
                            if(!isset($_SESSION['customer_email'])){
                              echo '<a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Sign in</span></a>';
                              echo '<a href="customer-register.php"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">Sign up</span></a>';
                            }else{
                              echo '<a href="customer/logout.php"><i class="fa fa-sign-out"></i><span class="hidden-xs text-uppercase">Logout</span></a>';
                              echo '<a href="customer/customer_account.php"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">My Account</span></a>';
                            }
                            ?>
                            <a href="shop-basket.php"><span class="fa fa-shopping-cart" aria-hidden="true"></span><span class="hidden-xs text-uppercase"> Items </span><span class="badge"><?php total_items(); ?></span></a>
                          </div>

                      </div>
                  </div>
              </div>
          </div>

          <!-- *** TOP END *** -->

          <!-- *** NAVBAR ***
  _________________________________________________________ -->

          <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

              <div class="navbar navbar-default yamm" role="navigation" id="navbar">

                  <div class="container" >
                      <div class="navbar-header">

                          <a class="navbar-brand home" href="index.php">
                              <img src="img/RAMServe-1.png" alt="RAM-Serve logo" class="hidden-xs hidden-sm" width="360" height="90">
                              <img src="img/RAMServe-1.png" alt="RAM-Serve logo" class="visible-xs visible-sm" width="240" height="60"><span class="sr-only">Universal - go to homepage</span>
                          </a>
                          <div class="navbar-buttons">
                              <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                                  <span class="sr-only">Toggle navigation</span>
                                  <i class="fa fa-align-justify"></i>
                              </button>
                          </div>
                      </div>
                      <!--/.navbar-header -->

                      <div class="navbar-collapse collapse" id="navigation">

                          <ul class="nav navbar-nav navbar-right">

                              <li><a href="index.php">Home</a>
                              <li><a href="index.php#why_RAM-Serve">Why use RAM-Serve</a>
                              <li><a href="index.php#what_drives_our_team">What drives our team</a>
                              <li><a href="shop.php">Store</a>
                              <li><a href="contact.php">Contact</a>
                                <li class="dropdown use-yamm">
                                  <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-search"></i><b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <div class="yamm-content">
                                        <form class="navbar-form navbar-right">
                                          <form class="navbar-form navbar-right">
                                            <div class="form-group">
                                              <input type="text" name="user_query" class="form-control" placeholder="Search">
                                            </div>
                                            <button type="submit" name="search" value="search" class="btn btn-default">Submit</button>
                                          </form>
                                        </div>
                                    </ul>
                                </li>
                          </ul>

                      </div>
                      <!--/.nav-collapse -->



                      <div class="collapse clearfix" id="search">

                          <form class="navbar-form" role="search">
                              <div class="input-group">
                                  <input type="text" class="form-control" placeholder="Search">
                                  <span class="input-group-btn">

                  <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>

              </span>
                              </div>
                          </form>

                      </div>
                      <!--/.nav-collapse -->

                  </div>


              </div>
              <!-- /#navbar -->

          </div>

          <!-- *** NAVBAR END *** -->

      </header>

      <!-- *** LOGIN MODAL ***
_________________________________________________________ -->

      <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
          <div class="modal-dialog modal-sm">

              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="Login">Customer login</h4>
                  </div>
                  <div class="modal-body">
                      <form action="" method="post">
                          <div class="form-group">
                              <input type="text" class="form-control" id="email_modal" name="email" placeholder="email">
                          </div>
                          <div class="form-group">
                              <input type="password" class="form-control" id="password_modal" name="pass" placeholder="password">
                          </div>

                          <p class="text-center">
                              <button class="btn btn-template-main" name="login"><i class="fa fa-sign-in"></i> Log in</button>
                          </p>

                      </form>

                      <p class="text-center text-muted">Not registered yet?</p>
                      <p class="text-center text-muted"><a href="customer-register.php"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                  </div>
              </div>
          </div>
      </div>
      <?php
      if(isset($_POST['login'])){
        global $con;
        $c_email = $_POST['email'];
        $c_pass = $_POST['pass'];

        $sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
        $run_c = mysqli_query($con, $sel_c);

        $check_customer = mysqli_num_rows($run_c);

        if($check_customer==0){
          echo "<script>alert('Password or email is incorrect, Please try again!')</script>";

        }else{
          while ($current_c = mysqli_fetch_array($run_c)){
            $c_name = $current_c['customer_name'];
          }
          $ip = getIp();
          $sel_cart = "select * from cart where ip_add='$ip'";
          $run_cart = mysqli_query($con, $sel_cart);
          $check_cart = mysqli_num_rows($run_cart);

          if ($check_customer>0 AND $check_cart == 0){
            $_SESSION['customer_name'] = $c_name;
            $_SESSION['customer_email'] = $c_email;
            echo "<script>window.open('customer/customer_account.php', '_self')</script>";
          }else{
            $_SESSION['customer_name'] = $c_name;
            $_SESSION['customer_email'] = $c_email;
              echo "<script>window.open('checkout.php', '_self')</script>";

          }
        }
      }
      ?>

      <!-- *** LOGIN MODAL END *** -->

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Shopping cart</h1>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb">
                            <li><a href="index.php">Home</a>
                            </li>
                            <li>Shopping cart</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <?php basketCart(); ?>
        <div id="content">
            <div class="container">

                <div class="row">
                  <div class="col-md-9 clearfix" id="basket">

                        <div class="box">

                            <form method="post" action="" enctype="multipart/form-data">

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Product</th>
                                                <th>Quantity</th>
                                                <th>Unit price</th>
                                                <th></th>
                                                <th colspan="2">Total</th>
                                            </tr>
                                        </thead>
                                        <?php
                                          global $con;
                                          $total = 0;
                                          $index = 0;
                                          $ip = getIp();
                                          $sel_price = "select * from cart where ip_add='$ip'";
                                          $run_price = mysqli_query($con,$sel_price);

                                          while($p_price=mysqli_fetch_array($run_price)){
                                            $pro_id = $p_price['p_id'];

                                            $pro_price = "select * from products where product_id='$pro_id'";
                                            $run_pro_price = mysqli_query($con,$pro_price);


                                            while ($pp_price = mysqli_fetch_array($run_pro_price)){
                                              $product_price = array($pp_price['product_price']);
                                              $product_title = $pp_price['product_title'];
                                              $product_image = $pp_price['product_image'];
                                              $single_price = $pp_price['product_price'];
                                              $values = array_sum($product_price);
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="admin/product_images/<?php echo $product_image; ?>" width="60" height="60"/>
                                                    </a>
                                                </td>
                                                <td><a href="details.php?pro_id=<?php echo $pro_id?>"><?php echo $product_title?></a>
                                                </td>
                                                <?php

                                                    $qty = $_POST['qty'.$index];
                                                    if($qty == 0){ $qty = $p_price['qty'];}
                                                    $update_qty = "update cart set qty='$qty' where p_id='$pro_id'";
                                                    $run_qty = mysqli_query($con,$update_qty);

                                                    $total += $single_price * $qty;
                                                    $_SESSION['cart_total'] = $total;

                                                ?>
                                                <td><input type="number" min="1" name="qty<?php echo $index;?>" value="<?php echo $qty;?>"/></td>

                                                <td><?php echo "$" . $single_price;?></td>
                                                <td></td>
                                                <td><?php echo "$" . $single_price * $qty;?></td>
                                                <td>
                                                  <?php
                                                  echo '<a href="/functions/remove.php?remove='.$pro_id.'"><i class="fa fa-trash-o"></i></a>';
                                                  ?>
                                                  </td>
                                                </tr>
                                                <?php $index++;}}?>





                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5">Total</th>
                                                <th colspan="2"><?php echo "$" . $total; ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                                <!-- /.table-responsive -->

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <button type="submit" name="continue" class="btn btn-default" name="continue"><i class="fa fa-chevron-left"></i> Continue shopping</a></button>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-default" name="update_cart"><i class="fa fa-refresh"></i> Update cart</button>
                                        <button type="submit" class="btn btn-template-main" name="checkout">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>

                            </form>
                            <?php
                              $ip = getIp();

                              if(isset($_POST['update_cart'])){

                                    echo "<script>window.open('shop-basket.php','_self')</script>";

                                }

                                if(isset($_POST['checkout'])){

                                      echo "<script>window.open('checkout.php','_self')</script>";

                                  }

                              if(isset($_POST['continue'])){
                                echo "<script>window.open('shop.php','_self')</script>";
                              }
                            ?>
                        </div>
                        <!-- /.box -->

                        <div class="row">
                            <div class="col-md-3">
                                <div class="box text-uppercase">
                                    <h3>You may also like these products</h3>
                                </div>
                            </div>

                                <?php getRandPro(); ?>

                        </div>

                    </div>
                    <!-- /.col-md-9 -->

                    <div class="col-md-3">
                        <div class="box" id="order-summary">
                            <div class="box-header">
                                <h3>Order summary</h3>
                            </div>
                            <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Order subtotal</td>
                                            <th><?php echo "$" . $total; ?></th>
                                        </tr>
                                        <tr>
                                            <td>Shipping and handling</td>
                                            <th>$0.00</th>
                                        </tr>
                                        <tr>
                                            <td>Tax</td>
                                            <th>$0.00</th>
                                        </tr>
                                        <tr class="total">
                                            <td>Total</td>
                                            <th><?php echo "$" . $total; ?></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                      </div>
                    <!-- /.col-md-3 -->

                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
        <?php
				if(isset ($_GET['search'])){
					$search_query = $_GET['user_query'];
					echo "<script>window.open('shop.php?user_query=".$search_query."&search=search','_self')</script>";
				}
				 ?>

        <!-- *** GET IT ***
_________________________________________________________ -->

        <div id="get-it">
            <div class="container">
                <div class="col-md-8 col-sm-12">
                    <h3>Not finished shopping, go back to our store and continue looking?</h3>
                </div>
                <div class="col-md-4 col-sm-12">
                    <a href="shop.php" class="btn btn-template-transparent-primary">Store</a>
                </div>
            </div>
        </div>


        <!-- *** GET IT END *** -->


        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

        <div id="copyright">
            <div class="container">
                <div class="col-md-12">
                    <p class="pull-left">&copy; 2016. RAM-Serve</p>
                    <p class="pull-right">Template by <a href="http://bootstrapious.com/free-templates">Bootstrapious</a>
                      <!-- Not removing these links is part of the licence conditions of the template. Thanks for understanding :) -->
                    </p>
                </div>
            </div>
        </div>
        <!-- /#copyright -->

        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->

    <!-- #### JAVASCRIPT FILES ### -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
    </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/front.js"></script>





</body>

</html>
