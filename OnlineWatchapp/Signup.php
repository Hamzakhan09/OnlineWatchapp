<?php
      include 'config.php';

  /////////insertionn start here/////////////    
  if(isset($_POST['btn-signup'])){
    $Username = $_POST['username'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $Password = $_POST['password'];

     $query = "INSERT INTO `user_reg`(`u_Username`, `u_Email`, `u_Phone`, `u_Pass`)
      VALUES ('$Username','$Email','$Phone', MD5('".$password."'))";
     $result = mysqli_query($conn,$query);
     if ($result) {
       header('Location:Login.php');
      } else {
        echo "<script>alert('OOPs Items Added Failed...!');</script>";
      }
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
         include 'Partial/file.php';
    ?>
</head>
<body>
    <?php
        include 'Partial/__nav.php';
    ?>
    
    <main>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>SIGN UP</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->

        <section class="login_part section_padding ">
            <div class="container">
                <div class="row align-items-center">
                <div class="col-lg-12 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>Welcome Back ! <br>
                                    Please Sign up now</h3>
                                <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="name" name="username" value=""
                                            placeholder="Enter Username">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="email" class="form-control" id="name" name="email" value=""
                                            placeholder="Enter Email">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="name" name="phone" value=""
                                            placeholder="Enter Phone no">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="password" name="password" value=""
                                            placeholder="Enter Password">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <div class="creat_account d-flex align-items-center">
                                            <input type="checkbox" id="f-option" name="selector">
                                            <label for="f-option">Remember me</label>
                                        </div>
                                        <button type="submit" value="submit" class="btn_3" name="btn-signup">
                                           Sign up
                                        </button>
                                        <a class="lost_pass" href="#">forget password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php
              include 'Partial/__footer.php';
        ?>
</body>
</html>