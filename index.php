<!DOCTYPE html>
<?php
	session_start();
	include("admin/includes/db.php");
	include("functions/functions.php");
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RAM-Serve</title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap and Font Awesome css -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Css animations  -->
    <link href="css/animate.css" rel="stylesheet">

    <!-- Theme stylesheet -->
    <link href="css/styles.css" rel="stylesheet" id="theme-stylesheet">



    <!-- owl carousel css -->

    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
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
                                <li><a href="#why_RAM-Serve">Why use RAM-Serve</a>
                                <li><a href="#what_drives_our_team">What drives our team</a>
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

        <section>
            <!-- *** HOMEPAGE CAROUSEL ***
 _________________________________________________________ -->

            <div class="home-carousel">

                <div class="dark-mask"></div>

                <div class="container">
                    <div class="homepage owl-carousel">
                        <div class="item">
                            <div class="row">
                                <div class="col-md-8 ">
                                    <p>
                                      RAM is absolutely the most economical way to increase speed and performance on any platform.
                                      With the proliferation of data centers all over the world, virtualization and analytics needs,
                                      trust RAM-Serve for all your mission critical enterprise memory needs.
                                      We have every possible option you require for all your servers/workstations.
                                      We carry all DDR3/DDR4 densities ranging from 4GB up to 64GB and very soon single 128GB Modules.
                                      Also, 95% of all orders ship same day!
                                    </p>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.project owl-slider -->
                </div>
            </div>

            <!-- *** HOMEPAGE CAROUSEL END *** -->
        </section>

				<section class="bar background-white">
            <div class="container">
                <div class="col-md-12">


                    <div class="row">
                        <div class="col-md-6"  >
                            <div class="box-simple">
															<a href="shop.php?cat=3">
															<div class="icon">
																	<i class="fa fa-cog"></i>
															</div>
                                <h3>Shop DDR3</h3>
                                <p>DDR3 draw 20% less power than its predecessor DDR2 technology and ranges in speeds from
																	DDR3-6400/800 up to DDR4-14900/1866. DDR3 also allows for quadruple the previously available
																	densities. Up until recently, DDR3 was the latest technology available that was introduced
																	in 2007 and is currently the most used in any system before 2015.</p>
																	</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box-simple">
															<a href="shop.php?cat=4">
                                <div class="icon">
                                    <i class="fa fa-cogs"></i>
                                </div>
                                <h3>Shop DDR4</h3>
                                <p>DDR4 draws 10% less power and is the most current technology available with speeds ranging
																	from PC4-17000/2133 up to PC4-19200/2400 with upcoming future speeds and bandwidth going up
																	as high as 3200 in the near future, which is double the speed of DDR3. Densities range from
																	4GB up to 128GB which is slated for Q4 of 2016.</p>
																	</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bar background-white no-mb">

          <div class="container">
            <div class="col-md-12">
              <a id="why_RAM-Serve">
              </a>
              <h2>
                <span style="color: #015675;"><strong>Why use</strong></span> RAM-Serve?
              </h2>

                <blockquote>

                    <p style="line-height: 200%; font-size: 20px;">We exclusively sell exactly what HP/Dell/IBM/Cisco do, only tier 1 originals
                      that have been tested and approved in those applications. The same stuff they
                      (HP/DELL,IBM/CISCO) buy, we buy and sell to you at a fraction of the cost.
                      The big server manufacturers do all the compatibility testing anywhere from 6
                      to 12 months. Once qualified, we list it, document it and sell it to you. We
                      collect that data and offer you the same product at a fraction of what
                      they charge.
                    </p>

                </blockquote>

            </div>
          </div>
        </section>
        <section class="bar background-white no-mb">
          <div class="container">
            <div class="col-md-12">

              <div class="col-md-8">
                    <p style="line-height: 200%; font-size: 20px;">
                      RAM is manufactured by only 3 major manufacturers today: Samsung, Hynix or Micron.
                      &nbsp;HP/Dell/IBM/Cisco buy direct from them and then label those parts as their own.
                      They charge you double and triple even quadruple what they pay for the parts just
                      for adding their sticker and calling it their brand. While they do test the parts
                      beyond any capability of anyone on the market, why pay triple when we can offer
                      you exactly the same product they tested for a 3<sup>rd</sup> of the cost they
                      charge. They charge you for extended warranty, we offer you a lifetime warranty
                      from the start. That means you are getting exactly the same product they are buying
                      for a fraction of the cost.
                     </p>
              </div>

               <div class=" col-md-4">
                 <img class="img-responsive" src="img/ramserve-image-1-2.jpg"/>
                </div>
              </div>
            </div>
          </section>
					<section class="bar background-white no-mb">
            <div class="container">
              <div class="col-md-12">
						<img class="img-responsive" src="img/flowchart.jpg"/>
					 </div>
				 </div>
			 </section>

          <section class="bar background-white no-mb">
            <div class="container">
              <div class="col-md-12">



                      <p style="line-height: 200%; font-size: 20px;">
                        Our extensive knowledge is unparalleled when it comes to server configurations.
                        We know exactly what to use down to the IC and PCB revision used for every upgrade.
                        No data point is overlooked and nobody can be trusted more than us for all your
                        server memory needs. No more error messages when installing the other guys’ 3
                        <sup>rd</sup> party options. We provide you smart options from the start!
                      </p>


                      <p style="line-height: 200%; font-size: 20px;">When you choose to work with our team, rest assured every request is handled
                        by one of our server upgrade specialists who is dedicated to helping you and
                        being your point of contact from start to finish. We are relentless and driven
                        by perfection and only want to provide all of our customers with the biggest
                        dollar savings achievable while never impeding quality. Loyalty and customer
                        care is our top priority at all times along with timely shipping and unparalleled
                        service. We are here to save you tens of thousands if not millions of dollars
                        in savings over the term of our relationship.
                      </p>


              </div>
            </div>
          </section>

        <!-- /.bar -->

        <section class="bar background-image-fixed-2 no-mb color-white text-center">
          <div class="dark-mask"></div>
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="icon icon-lg"><i class="fa fa-file-code-o"></i>
                </div>
                  <h3 class="text-uppercase">Do you want to learn more?</h3>
                  <p class="lead">Contact us today!</p>
                  <p><a href="contact.php" class="btn btn-small btn-template-transparent-primary">
                    Go to contact page</a>
                  </p>
                </div>

            </div>
          </div>
        </section>

        <section class="bar background-white no-mb">
            <div class="container">

              <div class="col-md-12">
                <a id="what_drives_our_team"></a>
                <p></p>
                <h2><span style="color: #015675;"><strong>What drives</strong></span> our team?</h2>

                  <ul style="line-height: 200%; font-size: 20px;">
                    <li>Educating our clients on how the memory upgrade business works so we may better gain their trust and confidence for the long term life cycle of the enterprise machines they house.</li>
                    <li>Save our clients as much money as possible while never compromising quality.</li>
                    <li>Fast and timely shipping on all orders, with 95% of all orders shipping same day.</li>
                    <li>Lifelong relationships with our clients based off of trust and integrity.</li>
                  </ul>

              </div>

            </div>
            <!-- /.container -->
        </section>
        <!-- /.bar -->
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
                    <h3>What are you waiting for go to our store now?</h3>
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



    <!-- owl carousel -->
    <script src="js/owl.carousel.min.js"></script>



</body>

</html>
