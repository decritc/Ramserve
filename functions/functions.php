<?php
$con = mysqli_connect("localhost","root","root","ecommerce");

if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// get users ip
function getIp(){
  $ip = $_SERVER['REMOTE_ADDR'];

  if (!empty($_SERVER['HTTP_CLIENT_IP'])){
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }

  return $ip;
}

// creating shopping cart
function cart(){

  if (isset($_GET['add_cart'])){
    global $con;
    $ip = getIp();
    $pro_id = $_GET['add_cart'];
    $check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";

    $run_check = mysqli_query($con, $check_pro);

    if(mysqli_num_rows($run_check)>0){
      echo "";
    }else{
        $insert_pro = "insert into cart (p_id,ip_add) values ('$pro_id','$ip')";

        $run_pro = mysqli_query($con, $insert_pro);

        echo "<script>window.open('shop.php','_self')</script>";
    }
  }
}

function basketCart(){

  if (isset($_GET['add_cart'])){
    global $con;
    $ip = getIp();
    $pro_id = $_GET['add_cart'];
    $check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";

    $run_check = mysqli_query($con, $check_pro);

    if(mysqli_num_rows($run_check)>0){
      echo "";
    }else{
        $insert_pro = "insert into cart (p_id,ip_add) values ('$pro_id','$ip')";

        $run_pro = mysqli_query($con, $insert_pro);

        echo "<script>window.open('shop-basket.php','_self')</script>";
    }
  }
}

//get total items added
function total_items(){
  global $con;
  if(isset($_GET['add_cart'])){

    $ip = getIp();
    $get_items = "select * from cart where ip_add='$ip'";
    $run_items = mysqli_query($con, $get_items);
    $count_items = mysqli_num_rows($run_items);

  }else{
    $ip = getIp();
    $get_items = "select * from cart where ip_add='$ip'";
    $run_items = mysqli_query($con, $get_items);
    $count_items = mysqli_num_rows($run_items);

  }
  echo $count_items;
}

//get total price of items in cart
function total_price(){
  global $con;
  $total = 0;
  $ip = getIp();
  $sel_price = "select * from cart where ip_add='$ip'";
  $run_price = mysqli_query($con,$sel_price);

  while($p_price=mysqli_fetch_array($run_price)){
      $pro_id = $p_price['p_id'];
      $pro_price = "select * from products where product_id='$pro_id'";
      $run_pro_price = mysqli_query($con,$pro_price);

      while ($pp_price = mysqli_fetch_array($run_pro_price)){
        $product_price = array($pp_price['product_price']);
        $values = array_sum($product_price);
        $total += $values;
      }
  }
  echo $total;
}

//get categories
function getCats(){
  global $con;
  $get_cats = "select * from categories ORDER BY cat_title ASC";
  $run_cats = mysqli_query($con, $get_cats);
  while ($row_cats = mysqli_fetch_array($run_cats)){
    $cat_id = $row_cats['cat_id'];
    $cat_title = $row_cats['cat_title'];
    echo "<li class='list-group-item borderless'><a href='shop.php?cat=$cat_id'>$cat_title</a><ul></li>";
    $get_dense = "select * from density where dense_cat='$cat_id' ORDER BY dense_title ASC";
    $run_dense = mysqli_query($con, $get_dense);
    while ($row_dense = mysqli_fetch_array($run_dense)){
      $dense_id = $row_dense['dense_id'];
      $dense_title = $row_dense['dense_title'];
      echo "<li class='list-group-item borderless'>-<a style='color:black;' href='shop.php?dense=$dense_id&cat=$cat_id'>$dense_title</a></li>";
    }
    echo "</ul>";
  }
}

//get brands
function getBrands(){
  global $con;
  $get_brands = "select * from brands ORDER BY brand_title ASC";
  $run_brands = mysqli_query($con, $get_brands);
  while ($row_brands = mysqli_fetch_array($run_brands)){
    $brand_id = $row_brands['brand_id'];
    $brand_title = $row_brands['brand_title'];

    echo "<li class=\"list-group-item borderless\"><a href='shop.php?brand=$brand_id'>$brand_title</a></li>";
  }
}

function getPro(){

  if(!isset($_GET['cat'])){
    if(!isset($_GET['brand'])){
      global $con;
      $get_pro = "select * from products";
      $run_pro = mysqli_query($con, $get_pro);
      $count = mysqli_num_rows($run_pro);
      echo "<b style='float:left; width:100%; margin:10px;'>showing items 1 - $count</b>";
      while ($row_pro=mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_brand = $row_pro['product_brand'];
        $pro_title = $row_pro['product_title'];
        $pro_price= $row_pro['product_price'];
        $pro_image = $row_pro['product_image'];
        $pro_desc = $row_pro['product_desc'];
        $pro_brief_desc = $row_pro['product_brief_desc'];
        $pro_keywords = $row_pro['product_keywords'];

        echo "
          <div class = 'col-xs-12 col-md-4 col-lg-3 col-xl-2'>
            <div class = 'thumbnail'>
              <a href='details.php?pro_id=$pro_id'><img src = 'admin/product_images/$pro_image' alt='$pro_keywords'/></a>
              <div class='caption'>
                <h4><a class='pro_title' href='details.php?pro_id=$pro_id'>$pro_title</a></h4>
                <br>
                <p> $pro_brief_desc </p>
                <br>
                <p style='text-align:right;'>RAM-Serve Price: <b> $ $pro_price </b></p>
                <br>
                <p>
                  <a style='float:right;' href='shop.php?add_cart=$pro_id' class = 'btn btn-template-primary' role= 'button'>Add to Cart</a>
                </p>
              </div>
            </div>
          </div>
        ";
      }
    }
  }
}

function getRandPro(){

  if(!isset($_GET['cat'])){
    if(!isset($_GET['brand'])){
      global $con;
      $get_pro = "select * from products ORDER BY RAND() LIMIT 0,3";
      $run_pro = mysqli_query($con, $get_pro);
      $count = mysqli_num_rows($run_pro);
      while ($row_pro=mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_brand = $row_pro['product_brand'];
        $pro_title = $row_pro['product_title'];
        $pro_price= $row_pro['product_price'];
        $pro_image = $row_pro['product_image'];
        $pro_desc = $row_pro['product_desc'];
        $pro_brief_desc = $row_pro['product_brief_desc'];
        $pro_keywords = $row_pro['product_keywords'];

        echo "
          <div class = 'col-xs-12 col-md-4 col-lg-3 col-xl-2'>
            <div class = 'thumbnail'>
              <a href='details.php?pro_id=$pro_id'><img src = 'admin/product_images/$pro_image' alt='$pro_keywords'/></a>
              <div class='caption'>
                <h4><a class='pro_title' href='details.php?pro_id=$pro_id'>$pro_title</a></h4>
                <br>
                <p> $pro_brief_desc </p>
                <br>
                <p style='text-align:right;'>RAM-Serve Price: <b> $ $pro_price </b></p>
                <br>
                <p>
                  <a style='float:right;' href='shop-basket.php?add_cart=$pro_id' class = 'btn btn-template-primary' role= 'button'>Add to Cart</a>
                </p>
              </div>
            </div>
          </div>
        ";
      }
    }
  }
}

function getCatPro(){

  if(isset($_GET['cat']) && !isset($_GET['dense'])){

      $cat_id = $_GET['cat'];

      global $con;
      $get_cat_pro = "select * from products where product_cat='$cat_id'";
      $run_cat_pro = mysqli_query($con, $get_cat_pro);
      $count_cats = mysqli_num_rows($run_cat_pro);

      if($count_cats==0){

        echo "<h3 style='margin:10px;'>There are no products of this type!</h3>";
      }else{
          echo "<b style='float:left; width:100%; margin:10px;'>showing items 1 - $count_cats </b>";
      }

      while ($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
        $pro_id = $row_cat_pro['product_id'];
        $pro_cat = $row_cat_pro['product_cat'];
        $pro_brand = $row_cat_pro['product_brand'];
        $pro_title = $row_cat_pro['product_title'];
        $pro_price= $row_cat_pro['product_price'];
        $pro_image = $row_cat_pro['product_image'];
        $pro_desc = $row_cat_pro['product_desc'];
        $pro_brief_desc = $row_cat_pro['product_brief_desc'];
        $pro_keywords = $row_cat_pro['product_keywords'];

        echo "
          <div class = 'col-xs-12 col-md-4 col-lg-3 col-xl-2'>
            <div class = 'thumbnail'>
              <a href='details.php?pro_id=$pro_id'><img src = 'admin/product_images/$pro_image' alt='$pro_keywords'/></a>
              <div class='caption'>
                <h4><a class='pro_title' href='details.php?pro_id=$pro_id'>$pro_title</a></h4>
                <br>
                <p> $pro_brief_desc </p>
                <br>
                <p style='text-align:right;'>RAM-Serve Price: <b> $ $pro_price </b></p>
                <br>
                <p>
                  <a style='float:right;' href='shop.php?add_cart=$pro_id' class = 'btn btn-template-primary' role= 'button'>Add to Cart</a>
                </p>
              </div>
            </div>
          </div>
        ";
    }
  }
}

function getDensePro(){

  if(isset($_GET['cat']) && isset($_GET['dense'])){

      $cat_id = $_GET['cat'];
      $dense_id = $_GET['dense'];

      global $con;
      $get_dense_pro = "select * from products where product_cat='$cat_id' AND product_dense='$dense_id'";
      $run_dense_pro = mysqli_query($con, $get_dense_pro);
      $count_dense = mysqli_num_rows($run_dense_pro);

      if($count_dense==0){

        echo "<h3 style='margin:10px;'>There are no products of this type and density!</h3>";
      }else{
          echo "<b style='float:left; width:100%; margin:10px;'>showing items 1 - $count_dense</b>";
      }

      while ($row_dense_pro=mysqli_fetch_array($run_dense_pro)){
        $pro_id = $row_dense_pro['product_id'];
        $pro_cat = $row_dense_pro['product_cat'];
        $pro_brand = $row_dense_pro['product_brand'];
        $pro_title = $row_dense_pro['product_title'];
        $pro_price= $row_dense_pro['product_price'];
        $pro_image = $row_dense_pro['product_image'];
        $pro_desc = $row_dense_pro['product_desc'];
        $pro_brief_desc = $row_dense_pro['product_brief_desc'];
        $pro_keywords = $row_dense_pro['product_keywords'];

        echo "
          <div class = 'col-xs-12 col-md-4 col-lg-3 col-xl-2'>
            <div class = 'thumbnail'>
              <a href='details.php?pro_id=$pro_id'><img src = 'admin/product_images/$pro_image' alt='$pro_keywords'/></a>
              <div class='caption'>
                <h4><a class='pro_title' href='details.php?pro_id=$pro_id'>$pro_title</a></h4>
                <br>
                <p> $pro_brief_desc </p>
                <br>
                <p style='text-align:right;'>RAM-Serve Price: <b> $ $pro_price </b></p>
                <br>
                <p>
                  <a style='float:right;' href='shop.php?add_cart=$pro_id' class = 'btn btn-template-primary' role= 'button'>Add to Cart</a>
                </p>
              </div>
            </div>
          </div>
        ";
    }
  }
}

function getBrandPro(){

  if(isset($_GET['brand'])){

      $brand_id = $_GET['brand'];

      global $con;
      $get_brand_pro = "select * from products where product_brand='$brand_id'";
      $run_brand_pro = mysqli_query($con, $get_brand_pro);
      $count_brands = mysqli_num_rows($run_brand_pro);

      if($count_brands==0){

        echo "<h3 style='margin:10px;'>There are no products from this manufacturer!</h3>";
      }else{
          echo "<b style='float:left; width:100%; margin:10px;'>showing items 1 - $count_brands</b>";
      }
      while ($row_brand_pro=mysqli_fetch_array($run_brand_pro)){
        $pro_id = $row_brand_pro['product_id'];
        $pro_cat = $row_brand_pro['product_cat'];
        $pro_brand = $row_brand_pro['product_brand'];
        $pro_title = $row_brand_pro['product_title'];
        $pro_price= $row_brand_pro['product_price'];
        $pro_image = $row_brand_pro['product_image'];
        $pro_desc = $row_brand_pro['product_desc'];
        $pro_brief_desc = $row_brand_pro['product_brief_desc'];
        $pro_keywords = $row_brand_pro['product_keywords'];

        echo "
          <div class = 'col-xs-12 col-md-4 col-lg-3 col-xl-2'>
            <div class = 'thumbnail'>
              <a href='details.php?pro_id=$pro_id'><img src = 'admin/product_images/$pro_image' alt='$pro_keywords'/></a>
              <div class='caption'>
                <h4><a class='pro_title' href='details.php?pro_id=$pro_id'>$pro_title</a></h4>
                <br>
                <p> $pro_brief_desc </p>
                <br>
                <p style='text-align:right;'>RAM-Serve Price: <b> $ $pro_price </b></p>
                <br>
                <p>
                  <a style='float:right;' href='shop.php?add_cart=$pro_id' class = 'btn btn-template-primary' role= 'button'>Add to Cart</a>
                </p>
              </div>
            </div>
          </div>
        ";
    }
  }
}

 ?>
