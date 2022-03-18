<?php
    include '../config.php';
    
    if(isset($_POST['btn-add'])){
          $pro_name = $_POST['p_name'];
          $pro_price = $_POST['p_price'];
          $pro_quantity = $_POST['p_quantity'];
          $pro_cat = $_POST['product'];
          $pro_discr = $_POST['p_disc'];
         $pro_image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

         $query = "INSERT INTO `product`(`P_Name`, `P_Cat`, `P_Price`, `P_Image`, `P_Discription`, `P_Quantity`) 
         VALUES ('$pro_name','$pro_cat','$pro_price','$pro_image','$pro_discr','$pro_quantity')";

        $result = mysqli_query($conn,$query);
if ($result) {
  header("Location:show_product.php");
 } else {
   echo "<script>alert('OOPs Items Added Failed...!');</script>";
 }

    }


   $cat_query="SELECT * FROM catagory";
   $cat_result = mysqli_query($conn,$cat_query);

?>


<?php
include ('includes/header.php');

?>


<div class="container px-4">
 <h1 class="mt-4">Add Products</h1>
 <form method="post" enctype="multipart/form-data"  class="row">
 <div class="col-md-9">
 <div class="form-group">
    <label>Product Name</label>
    <input type="text" class="form-control"  placeholder="Enter Product Name" name="p_name">
  </div>

  <div class="form-group">
    <label class="p-2">Product Catagory</label>
    <select name="product">  
           <?php
               while($row = mysqli_fetch_assoc($cat_result)){
                echo '<option class="form-control" value="'.$row['C_id'].'">'.$row['C_Name'].'</option>';
               }
           ?>
    </select>
  </div>

  <div class="form-group">
    <label>Product discription</label>
    <textarea class="form-control" name="p_disc" rows="8" cols="80" requried></textarea>
  </div>

 </div>

 <div class="col-md-3">
  
 <div class="form-group">
    <label>Product Image</label>
    <input type="file" name="image">
  </div>

  <div class="form-group">
    <label>Product Price</label>
    <input type="number" class="form-control"  placeholder="Enter Product Price" name="p_price">
  </div>


  <div class="form-group">
    <label>Product Quantity</label>
    <input type="number" class="form-control"  placeholder="Enter Product Quantity" name="p_quantity">
  </div>

  <button type="submit" class="btn btn-success" name="btn-add">Submit</button>

 </div>

 </form>
</div>



  


<?php
include ('includes/Footer.php');
include ('includes/Scripts.php');
?>
