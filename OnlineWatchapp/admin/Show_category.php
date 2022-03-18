<?php
     include '../config.php';
     $sql = "SELECT * FROM catagory";
    $result=mysqli_query($conn,$sql);

?>


<?php
include ('includes/header.php');

?>

<div class="container">
<h2>All Categories</h2>
<a href="Category.php" class="btn1">Add New</a>
 <table class="table table-striped table-hover table-bordered">
  <thead class="thead-red">
    <tr>
      <th>Category Id</th>
      <th>Category Name</th>
      <th width="100px">Actions</th>
    </tr>
  </thead>
   <tbody>
   <?php
     while($row=mysqli_fetch_assoc($result)){
  ?>
      <tr>
       <td><?php echo $row['C_id'] ?></td>
       <td><?php echo $row['C_Name'] ?></td>
       <td>
       <a class="btn btn-xs btn-primary user-view" href="?edit_id=<?php echo $row['C_id'];?>"><i class="fa fa-eye"></i></a>
      <a  href="?del_id=<?php echo $row['C_id'];?>"><i class="fa fa-trash" style="color: red;"></i></a>
        </td>
      </tr>
  <?php } ?>
   </tbody>
 </table>    
</div>   


<?php
include ('includes/Footer.php');
include ('includes/Scripts.php');

?>