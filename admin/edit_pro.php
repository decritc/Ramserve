<?php
  session_start();

  if(!isset($_SESSION['user_email'])){
    echo "<script>window.open('login.php','_self')</script>";
  }else{
    ?>
    <!DOCTYPE>

    <?php
      include("includes/db.php");

      if (isset($_GET['edit_pro'])){
        $get_id = $_GET['edit_pro'];
        $get_pro = "select * from products where product_id='$get_id'";
        $run_pro = mysqli_query($con, $get_pro);

        $row_pro=mysqli_fetch_array($run_pro);

        $pro_id = $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_sku = $row_pro['product_sku'];
        $pro_image = $row_pro['product_image'];
        $pro_price= $row_pro['product_price'];
        $pro_brief_desc= $row_pro['product_brief_desc'];
        $pro_desc= $row_pro['product_desc'];
        $pro_keywords= $row_pro['product_keywords'];
        $pro_cat = $row_pro['product_cat'];
        $pro_dense = $row_pro['product_dense'];
        $pro_brand= $row_pro['product_brand'];

        $get_cat = "select * from categories where cat_id='$pro_cat'";
        $run_cat = mysqli_query($con, $get_cat);
        $row_cat = mysqli_fetch_array($run_cat);
        $category_title = $row_cat['cat_title'];

        $get_dense = "select * from density where dense_id='$pro_dense'";
        $run_dense = mysqli_query($con, $get_dense);
        $row_dense = mysqli_fetch_array($run_dense);
        $density_title = $row_dense['dense_title'];

        $get_brand = "select * from brands where brand_id='$pro_brand'";
        $run_brand = mysqli_query($con, $get_brand);
        $row_brand = mysqli_fetch_array($run_brand);
        $brand_title = $row_brand['brand_title'];
      }
     ?>

    <html>
        <head>
          <title>Update Product</title>
          <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
          <script>tinymce.init({ selector:'textarea' });</script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
          <script>
          $(document).ready(function() {
            $("#product_dense").prop('disabled', 'disabled');
            $("#product_cat").change(function() {
              $("#product_dense").prop('disabled', false);
              if ($(this).data('options') == undefined) {
                /*Taking an array of all options-2 and kind of embedding it on the select1*/
                $(this).data('options', $('#product_dense option').clone());
              }
              var id = $(this).val();
              var options = $(this).data('options').filter('[id='+id+']');
              $('#product_dense').html(options);
            });
          });
        </script>
        </head>

        <body>

          <form action = "" method="post" enctype="multipart/form-data">
            <table align = "center" width = "1000" height = "600" border = "2" bgcolor = "#187eae">

              <tr align = "center">
                <td colspan="7"><h2>Edit/Update Product</h2></td>
              </tr>

              <tr>
                <td align = "right"><b>Product Title:</b></td>
                <td><input type = "text" name="product_title" size="50" value="<?php echo $pro_title;?>"/></td>

              </tr>
              <tr>
                <td align = "right"><b>Product SKU:</b></td>
                <td><input type = "text" name="product_sku" size="50" value="<?php echo $pro_sku;?>"/></td>

              </tr>
              <tr>
                <td align = "right"><b>Product Type:</b></td>
                <td>
                  <select name = "product_cat" id = "product_cat" required>
                    <option selected="selected" value="<?php echo $pro_cat;?>"><?php echo $category_title;?></option>
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

                  <select name = "product_dense" id = "product_dense">
                    <option id= '$dense_cat' selected="selected" value="<?php echo $pro_dense;?>"><?php echo $density_title;?></option>
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
                    <option selected="selected" value="<?php echo $pro_brand;?>"><?php echo $brand_title;?></option>
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
                <td><input type = "file" name="product_image"/><img src= "product_images/<?php echo $pro_image;?>" width="90" height= "60"/></td>
              </tr>
              <tr>
                <td align = "right"><b>Product Price:</b></td>
                <td><input type = "text" name="product_price" value="<?php echo $pro_price;?>"required/></td>
              </tr>
              <tr>
                <td align = "right"><b>Product Brief Description:</b></td>
                <td><input type = "text" name="product_brief_desc" size="48" value="<?php echo $pro_brief_desc;?>" required/></td>
              </tr>
              <tr>
                <td align = "right"><b>Product Description:</b></td>
                <td><textarea name ="product_desc" rows="0"><?php echo $pro_desc;?></textarea></td>
              </tr>
              <tr>
                <td align = "right"><b>Product Keywords:</b></td>
                <td><input type = "text" name="product_keywords" size="100" value="<?php echo $pro_keywords;?>"required/></td>
              </tr>
              <tr align = "center">
                <td colspan="7"><input type = "submit" name="update_product" value = "Update Product"/></td>
              </tr>
          </form>
        </body>
    </html>
    <?php
      if(isset($_POST['update_product'])){

        $update_id = $pro_id;
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
        if(!empty($_FILES['product_image']['name'])) {
          $product_image = $_FILES['product_image']['name'];
          $product_image_tmp = $_FILES['product_image']['tmp_name'];

          move_uploaded_file($product_image_tmp,"product_images/$product_image");

          $update_product = "update products set product_sku='$product_sku', product_cat='$product_cat',product_dense='$product_dense',product_brand='$product_brand',product_title='$product_title',
          product_price='$product_price',product_brief_desc='$product_brief_desc',product_desc='$product_desc',product_image='$product_image', product_keywords='$product_keywords'
          where product_id='$update_id'";
        }else{
          $update_product = "update products set product_sku='$product_sku', product_cat='$product_cat',product_dense='$product_dense',product_brand='$product_brand',product_title='$product_title',
          product_price='$product_price',product_brief_desc='$product_brief_desc',product_desc='$product_desc', product_keywords='$product_keywords'
          where product_id='$update_id'";
        }
        $run_product = mysqli_query($con, $update_product);

        if($run_product){
          echo "<script>alert('Product has been updated!')</script>";
          echo "<script>window.open('index.php?view_products','_self')</script>";
        }
      }

     ?>
<?php
 }
 ?>
