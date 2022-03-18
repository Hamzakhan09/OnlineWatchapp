<?php
      include '../config.php';
      $order_query = "SELECT * FROM `orders`";
      $result_query = mysqli_query($conn,$order_query);
?>




<?php
include ('includes/header.php');
?>

<div class="container">
<h2>All Orders</h2>
 <table class="table table-striped table-hover table-bordered">
  <thead class="thead-red">
    <tr>
      <th>Order Id</th>
      <th>Order Date</th>
      <th>Order Total</th>
      <th>Username</th>
      <th width="100px">Actions</th>
    </tr>
  </thead>
   <tbody>
   <?php
     while($row=mysqli_fetch_assoc($result_query)){
  ?>
      <tr>
       <td><?php echo $row['order_id'] ?></td>
       <td><?php echo $row['order_date'] ?></td>
       <td><?php echo $row['Order_total'] ?></td>
       <td><?php echo $row['uer_id'] ?></td>
       <td>
       <a class="btn btn-xs btn-primary user-view" href="?show_id=<?php echo $row['order_id'];?>"><i class="fa fa-eye"></i></a>
      <a  href="?del_id=<?php echo $row['order_id'];?>"><i class="fa fa-trash" style="color: red;"></i></a>
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