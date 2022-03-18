<?php
session_start();
include 'config.php';

///////Order  ///////
if(isset($_POST['confirm'])){
$date = date('Y-m-d');
$total = $_POST['total'];
$user = $_SESSION['user_id'];
$query = "INSERT INTO `orders`(`order_date`, `Order_total`, `uer_id`) VALUES (Now(),'$total',$user)";
$order_result  = mysqli_query($conn,$query);
$order_id = mysqli_insert_id($conn);


if($order_result){
    $qty=array_column($_SESSION['shopping_cart'], 'quantity');
    $pro_query = "SELECT * FROM `product` WHERE P_id IN (".implode(',',(array_column($_SESSION['shopping_cart'], 'item_id'))).")";
    $pro_result = mysqli_query($conn,$pro_query);
    $index=0;

     while($pro_row=mysqli_fetch_assoc($pro_result)){
         $id = $pro_row['P_id'];
         $name = $pro_row['P_Name'];
         $price = $pro_row['P_Price'];
         $qty=$qty[$index];

         $in_query = "INSERT INTO `invoice`(`O_id`, `p_id`, `in_pro_Quantity`, `in_pro_Price`, `in_pro_Name`) VALUES('$order_id','$id','$qty','$price','$name')"; 
         $in_result = mysqli_query($conn,$in_query);
         
         if(!$in_result){
             echo "ERROR :".mysqli_error($conn);
             $index++;
         }else {
            header("Location:addtocart.php");
        }
        $_SESSION['shopping_cart'] = [];
     }
     
}
}else{
    echo "ERROR :".mysqli_error($conn);
}
?>