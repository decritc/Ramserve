<?php
  session_start();


  if(!isset($_SESSION['user_email'])){
    echo "<script>window.open('login.php','_self')</script>";
  }else{
 ?>

  <!DOCTYPE>

  <?php
    include("includes/db.php");
   ?>

  <html>
      <head>
        <title>Product Insertion Tool</title>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

        <script>tinymce.init({ selector:'textarea' });</script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>
        $(document).ready(function() {

          $("#product_dense").prop('disabled', 'disabled');

          $("#product_cat").change(function() {
            if ($(this).data('options') == undefined) {
              /*Taking an array of all options-2 and kind of embedding it on the select1*/
              $(this).data('options', $('#product_dense option').clone());
            }
            var id = $(this).val();
            $("#product_dense").prop('disabled', false);
            var options = $(this).data('options').filter('[id ='+id+']');
            $('#product_dense').html(options);
          });
        });
      </script>
      </head>

      <body>

        <form action = "insert_product.php" method="post" enctype="multipart/form-data">
          <table align = "center" width = "1000" height ="600" border = "2" bgcolor = "#365b98" style="color: Burlywood ;">

            <tr align = "center">
              <td colspan="7"><h2>Product Insertion Tool</h2></td>
            </tr>

            <tr>
              <td align = "right"><b>Product Title:</b></td>
              <td><input type = "text" name="product_title" size="50" required/></td>

            </tr>
            <tr>
              <td align = "right"><b>Product SKU:</b></td>
              <td><input type = "text" name="product_sku" size="50" required/></td>

            </tr>

            <tr>
              <td align = "right"><b>Product Type:</b></td>
              <td>

              <select name = "product_cat" id = "product_cat" required>
                  <option>Select a Type</option>
                  <?php
                    $get_cats = "select * from categories";
                    $run_cats = mysqli_query($con, $get_cats);
                    while ($row_cats = mysqli_fetch_array($run_cats)){
                      $cat_id = $row_cats['cat_id'];
                      $cat_title = $row_cats['cat_title'];

                      echo "<option value = \"$cat_id\">$cat_title</option>";
                  }
                   ?>
                </select>
              </td>
            </tr>
            <tr>
              <td  id = "product_dense_title" align = "right"><b>Product Density:</b></td>
              <td>

                <select name = "product_dense" id = "product_dense" required>
                  <option>Select a Density</option>
                  <?php
                    $get_dense = "select * from density";
                    $run_dense = mysqli_query($con, $get_dense);
                    while ($row_dense = mysqli_fetch_array($run_dense)){
                      $dense_id = $row_dense['dense_id'];
                      $dense_cat = $row_dense['dense_cat'];
                      $dense_title = $row_dense['dense_title'];

                      echo "<option id= '$dense_cat' value = \"$dense_id\">$dense_title</option>";
                  }
                   ?>
                </select>
              </td>
            </tr>
            <tr>
              <td align = "right"><b>Product Manufacturer:</b></td>
              <td>
                <select name = "product_brand" required>
                  <option>Select a Manufacturer</option>
                  <?php
                  $get_brands = "select * from brands";
                  $run_brands = mysqli_query($con, $get_brands);
                  while ($row_brands = mysqli_fetch_array($run_brands)){
                    $brand_id = $row_brands['brand_id'];
                    $brand_title = $row_brands['brand_title'];

                    echo "<option value = \"$brand_id\">$brand_title</option>";
                  }
                   ?>
                </select>
              </td>
            </tr>
            <tr>
              <td align = "right"><b>Product Image:</b></td>
              <td><input type = "file" name="product_image" required /></td>
            </tr>
            <tr>
              <td align = "right"><b>Product Price:</b></td>
              <td><input type = "text" name="product_price" required/></td>
            </tr>
            <tr>
              <td align = "right"><b>Product Brief Description:</b></td>
              <td><input type = "text" name="product_brief_desc" size="48" required/></td>
            </tr>
            <tr>
              <td align = "right"><b>Product Description:</b></td>
              <td><textarea name ="product_desc" rows="0"></textarea></td>
            </tr>
            <tr>
              <td align = "right"><b>Product Keywords:</b></td>
              <td><input type = "text" name="product_keywords" size="100" required/></td>
            </tr>
            <tr align = "center">
              <td colspan="7"><input type = "submit" name="insert_post" value = "Add Item"/></td>
            </tr>
        </form>
      </body>
  </html>
  <?php
    if(isset($_POST['insert_post'])){

      //get text data from fields
      $product_title = $_POST['product_title'];
      $product_sku = $_POST['product_sku'];
      $product_cat = $_POST['product_cat'];
      $product_dense = $_POST['product_dense'];
      $product_brand = $_POST['product_brand'];
      $product_price = $_POST['product_price'];
      $product_brief_desc = $_POST['product_brief_desc'];
      $product_desc = $_POST['product_desc'];
      $product_keywords = $_POST['product_keywords'];

      //get image from the fields
      $product_image = $_FILES['product_image']['name'];
      $product_image_tmp = $_FILES['product_image']['tmp_name'];

      move_uploaded_file($product_image_tmp,"product_images/$product_image");

      $insert_product = "insert into products (product_sku,product_cat,product_dense,product_brand,product_title,product_price,product_brief_desc,product_desc,product_image,product_keywords)
      values ('$product_sku','$product_cat','$product_dense','$product_brand','$product_title','$product_price','$product_brief_desc','$product_desc','$product_image','$product_keywords')";

      $insert_pro = mysqli_query($con, $insert_product);

      if($insert_pro){
        echo "<script>alert('Product has been inserted!')</script>";
        echo "<script>window.open('index.php?insert_product','_self')</script>";
      }
    }
  }
 ?>
