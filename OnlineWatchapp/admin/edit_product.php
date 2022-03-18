<?php
  include '../config.php';
    
  if(isset($_POST['btn-edit'])){
      $up_id = $_POST['H-id'];
        $pro_name = $_POST['p_name'];
        $pro_price = $_POST['p_price'];
        $pro_quantity = $_POST['p_quantity'];
        $pro_cat = $_POST['product'];
        $pro_discr = $_POST['p_disc'];
       $pro_image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

       $query = "UPDATE `product` SET `P_Name`='$pro_name',`P_Cat`='$pro_cat',`P_Price`='$pro_price',`P_Image`='$pro_image',`P_Discription`='$pro_discr',`P_Quantity`='$pro_quantity' WHERE `P_id`='$up_id' ";
      $result = mysqli_query($conn,$query);
if ($result) {
header("Location:show_product.php");
} else {
 echo "<script>alert('OOPs Items Added Failed...!');</script>";
}

  }
  if(isset($_GET['id'])){
    $id = $_GET['id'];

    $findQuery = "SELECT * FROM `product`WHERE `P_id`='$id' ";
      $result = mysqli_query($conn, $findQuery);
     $row=mysqli_fetch_row($result);
} 


 $cat_query="SELECT * FROM catagory";
 $cat_result = mysqli_query($conn,$cat_query);


?>

<?php
include ('includes/header.php');

?>

<div class="container px-4">
 <h1 class="mt-4">Edit Products</h1>
 <form method="post" enctype="multipart/form-data"  class="row">
   <input type="hidden" name="H-id" value="<?php echo $row[0];?>">
 <div class="col-md-9">
 <div class="form-group">
    <label>Product Name</label>
    <input type="text" class="form-control"  name="p_name" value="<?php echo $row[1];?>">
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
    <textarea class="form-control" name="p_disc" rows="8" cols="80" requried value="<?php echo $row[5];?>"></textarea>
  </div>

 </div>

 <div class="col-md-3">
  
 <div class="form-group">
    <label>Product Image</label>
    <input type="file" name="image">
  </div>

  <div class="form-group">
    <label>Product Price</label>
    <input type="number" class="form-control"  name="p_price" value="<?php echo $row[3];?>">
  </div>


  <div class="form-group">
    <label>Product Quantity</label>
    <input type="number" class="form-control"  name="p_quantity" value="<?php echo $row[6];?>">
  </div>

  <button type="submit" class="btn btn-success" name="btn-edit">Update</button>

 </div>

 </form>
</div>


<?php
include ('includes/Footer.php');
include ('includes/Scripts.php');
?>