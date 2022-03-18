<?php
      include '../../config.php';
      if(isset($_GET['id'])){
          $id = $_GET['id'];

          $result = mysqli_query($conn,"DELETE FROM products WHERE P_id = '$id'");
          if($result){
              header("Location:../show_product.php");
          }else{
              echo "<script>alert('Not Delete Products.....!')
                    window.location.href=('../show_product.php');
              </script>";
             
          }
      }
?>