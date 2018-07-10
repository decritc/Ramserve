<?php
  session_start();
?>
<html>
  <head>
    <title>Payment Cancel!</title>
  </head>
  <body>
    <h2>Welcome <?php echo $_SESSION['customer_email']; ?></h2>
    <h3>Your Payment was canceled, please try again</h3>
    <h3><a href="http://ramserve.hopto.org/">Go back to shop</h3>
  </body>
</html>
