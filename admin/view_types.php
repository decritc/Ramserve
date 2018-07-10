<?php
  session_start();

  if(!isset($_SESSION['user_email'])){
    echo "<script>window.open('login.php','_self')</script>";
  }else{
 ?>
  <table width="1000" align="center" bgcolor="pink">

    <tr align="center">
      <td colspan="6"><h2>View All Types</h2></td>
    </tr>

    <tr align="center" bgcolor="skyblue">
      <th>Type ID</th>
      <th>Type Title</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>

    <?php
      include("includes/db.php");

      $get_cat = "select * from categories ORDER BY cat_title ASC";
      $run_cat = mysqli_query($con, $get_cat);
      $i = 0;
      while($row_cat=mysqli_fetch_array($run_cat)){
        $cat_id = $row_cat['cat_id'];
        $cat_title = $row_cat['cat_title'];
        $i++;
     ?>
    <tr align="center">
      <td><?php echo $i;?></td>
      <td><?php echo $cat_title;?></td>
      <td><a href="index.php?edit_type=<?php echo $cat_id; ?>">Edit</a></td>
      <td><a href="delete_type.php?delete_type=<?php echo $cat_id; ?>">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
<?php } ?>
