<?php
include '../config.php';

////////////
if(isset($_POST['btn-sub'])){
    $catname = $_POST['cat'];

    $query = "INSERT INTO `catagory`(`C_Name`) VALUES ('$catname')";
    $result = mysqli_query($conn,$query);
    if ($result) {
        echo "<script>alert('Items Added...!');
              window.location.href=('Show_category.php');
        </script>";
       } else {
         echo "<script>alert('OOPs Items Added Failed...!');</script>";
       }
}

?>


<?php
include ('includes/header.php');
?>


<main>
<div class="container p-5">
<form method="post" enctype="multipart/form-data">
  <h2>ADD NEW CATEGORY</h2>
  <div class="form-group">
    <label>Categories</label>
    <input type="text" class="form-control w-50"  placeholder="Enter Category Name" name="cat">
  </div>

  <button type="submit" class="btn btn-success" name="btn-sub">Submit</button>
</main>

<?php
include ('includes/Footer.php');
include ('includes/Scripts.php');
?>
