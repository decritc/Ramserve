<!DOCTYPE html>
<?php
	include ("admin/includes/db.php");
	include("functions/functions.php");
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RAM-Serve Contact Us</title>

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
                    <div class="col-md-7">
                        <h1>Contact Us</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="index.php">Home</a>
                            </li>
                            <li>Contact Us</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container" id="contact">

                <section>

                    <div class="row">
                        <div class="col-md-12">
                            <section>
                                <div class="heading">
                                    <h2>We are here to help you</h2>
                                </div>

                                <p class="lead">Are you curious about something? Do you have some kind of problem with our products? As am hastily invited settled at limited civilly fortune me. Really spring in extent an by.  Of so am
                                    he remember although required. Bachelor unpacked be advanced at. Confined in declared marianne is vicinity.</p>
                                </section>
                        </div>
                    </div>

                </section>



                <section>

                    <div class="row text-center">

                        <div class="col-md-12">
                            <div class="heading">
                                <h2>Contact form</h2>
                            </div>
                        </div>

                        <div class="col-md-8 col-md-offset-2">
                          <?php
                          // define variables and set to empty values
                          $nameErr = $emailErr = $commentErr = "";
                          $name = $email = $businessName = $comment = $phone = "";

                          $email_to = "decritc@gmail.com";

                          $email_subject = "RAM-Serve Contact Us";

                          if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (empty($_POST["businessName"])) {
                              $businessName = "";
                            } else {
                              $businessName = test_input($_POST["businessName"]);
                            }

                            if (empty($_POST["name"])) {
                              $nameErr = "Name is required";
                            } else {
                              $name = test_input($_POST["name"]);
                              // check if name only contains letters and whitespace
                              if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                                $nameErr = "Only letters and white space allowed";
                              }
                            }

                            if (empty($_POST["email"])) {
                              $emailErr = "Email is required";
                            } else {
                              $email = test_input($_POST["email"]);
                              // check if e-mail address is well-formed
                              if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                $emailErr = "Invalid email format";
                              }
                            }

                            if (empty($_POST["comment"])) {
                              $commentErr = "Comment is required";
                            } else {
                              $comment = test_input($_POST["comment"]);
                            }

                            if (empty($_POST["phone"])) {
                              $phone = "";
                            } else {
                              $phone = test_input($_POST["phone"]);
                            }
                            $email_message = "Form details below.\n\n";
                            $email_message .= "Business Name: ".clean_string($businessName)."\n";
                            $email_message .= "Name: ".clean_string($name)."\n";
                            $email_message .= "Email: ".clean_string($email)."\n";
                            $email_message .= "Telephone: ".clean_string($phone)."\n";
                            $email_message .= "Comments: ".clean_string($comment)."\n";

                            // create email headers
                            $headers = 'From: '.$email."\r\n".
                            'Reply-To: '.$email."\r\n" .

                            'X-Mailer: PHP/' . phpversion();

                            $sent = mail($email_to, $email_subject, $email_message, $headers);
                            if($sent){
                              echo "<script>alert('Your message has sent successfully!')</script>";
                              echo "<script>window.open('Contact.php', '_self')</script>";
                            }else{
                              echo "<script>alert('Your message is unable to send at this time!')</script>";
                            }
                          }
                          function test_input($data) {
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                          }

                          function clean_string($string) {
                            $bad = array("content-type","bcc:","to:","cc:","href");
                            return str_replace($bad,"",$string);
                          }

                          ?>


                          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="form-group col-sm-6">
                              <label>Business Name:</label>
                              <input type="text" class="form-control" name="businessName" value="<?php echo $businessName;?>">
                            </div>
                            <div class="form-group col-sm-6">
                              <label>Name:</label>
                              <span class="error">* <?php echo $nameErr;?></span>
                              <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                            </div>
                            <div class="form-group col-sm-6">
                              <label>E-mail:</label>
                              <span class="error">* <?php echo $emailErr;?></span>
                              <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
                            </div>
                            <div class="form-group col-sm-6">
                              <label>Phone:</label> <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
                            </div>
                            <div class="form-group col-sm-12">
                              <label for="comment">Comment:</label>
                              <span class="error">* <?php echo $commentErr;?></span>
                              <textarea class="form-control" name="comment" rows="5"><?php echo $comment;?></textarea>
                            </div>
                            <p><span class="error">* required field.</span></p>
                            <br><br>
                            <div class="col-sm-12 text-center">
                              <button class="btn btn-template-main" role="button" type="submit" name="submit"><i class="fa fa-envelope-o"></i> Send message</button>
                            </div>
                          </form>



                        </div>
                    </div>
                    <!-- /.row -->

                </section>


            </div>
            <!-- /#contact.container -->
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
                    <h3>Do you want to return to our homepage?</h3>
                </div>
                <div class="col-md-4 col-sm-12">
                    <a href="index.php" class="btn btn-template-transparent-primary">Home</a>
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



    <!-- gmaps -->

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>

    <script src="js/gmaps.js"></script>
    <script src="js/gmaps.init.js"></script>

    <!-- gmaps end -->





</body>

</html>
