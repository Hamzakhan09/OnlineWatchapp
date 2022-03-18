<?php
include '../config.php';

$sql = "SELECT * FROM product JOIN catagory on product.P_Cat=catagory.C_id";
$result=mysqli_query($conn,$sql);

?>

<?php
include ('includes/header.php');
?>


<div class="container">
<h2>All Products</h2>
<a href="Product.php" class="btn1">Add New</a>
 <table class="table table-striped table-hover table-bordered">
  <thead class="thead-red">
    <tr>
      <th>Product Id</th>
      <th>Product Name</th>
      <th>Product Price</th>
      <th>Product Category</th>
      <th>Product Image</th>
      <th>Product Quantity</th>
      <th width="100px">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
     while($row=mysqli_fetch_assoc($result)){
  ?>
   <tr>
       <td><?php echo $row['P_id'] ?></td>
       <td><?php echo $row['P_Name'] ?></td>
       <td><?php echo $row['P_Price'] ?></td>
       <td><?php echo $row['C_Name'] ?></td>
       <td><img src="data:image/jpg;base64,<?php echo base64_encode($row['P_Image']) ?>" width="100px" height="100px"></td>
       <td><?php echo $row['P_Quantity'] ?></td>
       <td>
       <a href="edit_product.php?id=<?php echo $row['P_id'];?>"><i class="fa fa-edit" style="color: green;"></i></a>
      <a  href="./actionFiles/product_action.php?id=<?php echo $row['P_id'];?>"><i class="fa fa-trash" style="color: red;"></i></a>
        </td>
   </tr>
<?php
     }
?>
  </tbody>
 </table>
</div>



  
<?php
include ('includes/Footer.php');
include ('includes/Scripts.php');
?>

