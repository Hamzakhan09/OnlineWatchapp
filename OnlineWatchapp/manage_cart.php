<?php
  session_start();
  /////Login Check//////
   if(isset($_SESSION['user_id'])){
   
      ///////then add to cart////////
      if(isset($_POST['add_to_cart'])){
        //////Session of cart//////
        if(isset($_SESSION['shopping_cart'])){

          $cartitems=array_column($_SESSION['shopping_cart'],'item_id');
           ////////items already exits////////
          if(in_array($_POST['product_id'],$cartitems)){
                echo "<script>
                alert('Item Already Exits...!');
                window.location.href=('Shop.php');
              </script>";
           }
               else{
                $count = count($_SESSION['shopping_cart']);
                $_SESSION['shopping_cart'][$count]=array('item_id'=>$_POST['product_id'],
                                                          'item_name'=>$_POST['product_name'],
                                                         'item_price'=>$_POST['product_price'],
                                                         'item_mage'=>$_POST['product_image'],
                                                         'quantity'=> 1 );
 
                echo "<script>
                  alert('Item Added...!');
                  window.location.href=('Shop.php');
                </script>"; 
               }
               ///////////Item addeddd///////////////
        }else{
          $_SESSION['shopping_cart'][0]=array('item_id'=>$_POST['product_id'],
                                               'item_name'=>$_POST['product_name'],
                                              'item_price'=>$_POST['product_price'],
                                              'item_mage'=>$_POST['product_image'],
                                              'quantity'=> 1);
                echo "<script>
                alert('Item Added...!');
                window.location.href=('Shop.php');
                </script>";
        }
        
        
    }
    ////////////add to cart end here//////////////////


        
  //////////////item-removed///////////////////
  if(isset($_POST['btn-remove'])){
    foreach($_SESSION['shopping_cart'] as $key => $value){
        if($value['item_name']==$_POST['Item_name']){
          
          unset($_SESSION['shopping_cart'][$key]);
          $_SESSION['shopping_cart']=array_values($_SESSION['shopping_cart']);
          echo "<script>
                alert('Item Removed...!');
                window.location.href=('addtocart.php');
              </script>";
             
        }
         
    }
}   
    ///////////Hold quantity with session/////////// 
if(isset($_POST['Mod_quantity'])){
  foreach($_SESSION['shopping_cart'] as $key => $value){
    if($value['item_name']==$_POST['Item_name']){
      $_SESSION["shopping_cart"][$key]["quantity"] = $_POST["Mod_quantity"];
       header("Location:addtocart.php");
    }
  }
}


} 
else{
      header("Location:Login.php");
    }
   /////////////////Check Login end Here////////////////////////// 
