<!----PHP CODE------>
<?php

    session_start();


/////////Login Code ///////////////
if (isset($_POST['btn-login'])) {
    include 'config.php';

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $pass = $_POST['Password'];

    if (empty($email)) {
        header("Location:Login.php?error=Email is Required");
        exit();
    } elseif (empty($pass)) {
        header("Location:Login.php?error=Password is Required");
        exit();
    } else {
        $sql = "SELECT * FROM `user_reg` WHERE `u_Email`='$email' && `u_Pass`='$pass'";
        $result = mysqli_query($conn, $sql) or die("QUERY FAILED");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION["user_id"] = $row['user_Id'];
                $_SESSION["username"] = $row['u_Username'];
                header("Location:Index.php");
            }
        } else {
            header("Location:Login.php?error=Invalid Email Or Password");
        }
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
    <style>
        .error {
            background-color: #F2DEDE;
            color: #A94442;
            border-radius: 5px;
            padding: 10px;
            width: 95%;
        }
    </style>
</head>

<body>
    <?php
    include 'Partial/__nav.php';
    ?>

    <main>
        <!-- Hero Area Start-->
        <!-- <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Login</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Hero Area End -->
        <!--================login_part Area =================-->
        <section class="login_part section_padding ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_text text-center">
                            <div class="login_part_text_iner">
                                <h2>New to our Shop?</h2>
                                <p>There are advances being made in science and technology
                                    everyday, and a good example of this is the</p>
                                <a href="Signup.php" class="btn_3">Create an Account</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>Welcome Back ! <br>
                                    Please Login now</h3>
                                <?php if (isset($_GET['error'])) { ?>
                                    <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php
                                } ?>
                                <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="name" name="Email" value="" placeholder="Enter Email">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="password" name="Password" value="" placeholder="Enter Password">
                                    </div>
                                   

                                    <div class="col-md-12 form-group">
                                        <div class="creat_account d-flex align-items-center">
                                            <input type="checkbox" id="f-option" name="selector">
                                            <label for="f-option">Remember me</label>
                                        </div>
                                        <button type="submit" value="submit" class="btn_3" name="btn-login">
                                            log in
                                        </button>
                                        <a class="lost_pass" href="#">forget password?</a>
                                        <div class="message"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================login_part end =================-->
    </main>

    <?php
    include 'TimeZone/Partial/__footer.php';
    ?>


    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
</body>

</html>