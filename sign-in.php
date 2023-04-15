<?php 
  session_start();
  if(isset($_SESSION['userID'])){
    header("Location:dashboard");
  } 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>SBID - Bid And Auction</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/owl.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
</head>

<body>
    <!--============= ScrollToTop Section Starts Here =============-->
    <div class="overlayer" id="overlayer">
        <div class="loader">
            <div class="loader-inner"></div>
        </div>
    </div>
    <a href="#0" class="scrollToTop"><i class="fas fa-angle-up"></i></a>
    <div class="overlay"></div>
    <!--============= ScrollToTop Section Ends Here =============-->

    <?php 
        require "header.php"; 
        require "cart.php";
    ?>


    <!--============= Hero Section Starts Here =============-->
    <div class="hero-section">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="#0">Pages</a>
                </li>
                <li>
                    <span>Sign In</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="assets/images/banner/hero-bg.png"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->


    <!--============= Account Section Starts Here =============-->
    <section class="account-section padding-bottom">
        <div class="container">
            <div class="account-wrapper mt--100 mt-lg--440">
                <div class="left-side">
                    <div class="section-header">
                        <h2 class="title">HI, THERE</h2>
                        <p>You can log in to your SBID account here.</p>
                    </div>
                   <!--  <ul class="login-with">
                        <li>
                            <a href="#0"><i class="fab fa-facebook"></i>Log in with Facebook</a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-google-plus"></i>Log in with Google</a>
                        </li>
                    </ul>
                    <div class="or">
                        <span>Or</span>
                    </div> -->
                    <form id="login-form" class="login-form" method="post">
                        <div  class="form-group">
                            <?php
                                if(isset($_SESSION['response'])){
                                    echo "<span style='color:red;'>".$_SESSION['response']."</span>";
                                    unset($_SESSION['response']);
                                }
                            ?>
                        </div>
                        <div class="form-group mb-30">
                            <label for="login-email"><i class="far fa-envelope"></i></label>
                            <input name="user" type="email" id="login-email" placeholder="Email Address">
                        </div>

                        <div id="forgotconfirm" class="form-group" style="display: none;">
                            <label for="login-pass"><i class="fas fa-lock"></i></label>
                            <input name="conpass" type="password" id="" placeholder="Password">
                        </div>



                        <div class="form-group">
                            <label for="login-pass"><i class="fas fa-lock"></i></label>
                            <input name="password" type="password" id="login-pass" placeholder="Password">
                            <span class="pass-type"><i class="fas fa-eye"></i></span>
                        </div>
                        <div class="form-group">
                            <a id="forgotpassword" href="#0">Forgot Password?</a>
                        </div>
                        <div id="loadimage" class="form-group" >
                            <span></span>
                            <img src="assets/images/loading.gif" style="width:60px;height:60px;display:none;">
                        </div>
                        <div class="form-group mb-0">
                            <!-- <button id="checkbtn" name="button" type="submit" value="submit" class="custom-button">check</button> -->
                            <button id="loginbutton" name="submit" type="submit" value="submit" class="custom-button">LOG IN</button>
                        </div>
                    </form>
                </div>
                <div class="right-side cl-white">
                    <div class="section-header mb-0">
                        <h3 class="title mt-0">NEW HERE?</h3>
                        <p>Sign up and create your Account</p>
                        <a href="sign-up" class="custom-button transparent">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Account Section Ends Here =============-->


    <?php require "footer.php"; ?>


    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/waypoints.js"></script>
    <script src="assets/js/nice-select.js"></script>
    <script src="assets/js/counterup.min.js"></script>
    <script src="assets/js/owl.min.js"></script>
    <script src="assets/js/magnific-popup.min.js"></script>
    <script src="assets/js/yscountdown.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/set/signin.js"></script>
</body>

</html>