<?php session_start(); ?>

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
    <link rel="stylesheet" href="assets/css/css.css">

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
                    <span>Sign Up</span>
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
                        <h2 class="title">SIGN UP</h2>
                        <p>We're happy you're here!</p>
                    </div>
                    <!-- <ul class="login-with">
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
                    <form id="signUp" class="login-form" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-30 item-1">
                            <label for="login-email"><i class="far fa-envelope"></i></label>
                            <input id="signup-mail" type="email" name="mail" placeholder="Email Address" required>
                        </div>
                        
                        <div class="form-group mb-30 item-1">
                            <label for="login-pass"><i class="fas fa-lock"></i></label>
                            <input id="signup-p" type="password" name="password"  placeholder="Password" required>
                            <!-- <span class="pass-type"><i class="fas fa-eye"></i></span> -->
                        </div>

                        <div class="form-group mb-30 item-1">
                            <label for="login-pass"><i class="fas fa-lock"></i></label>
                            <input id="login-pass" type="password" name="conpass" placeholder="Confirm-Password" required>
                            <span class="pass-type"><i class="fas fa-eye"></i></span>
                        </div>

                        <div class="form-group mb-30 item-2" style="display:none">
                            <label for="login-pass"><i class="fa fa-podcast"></i></label>
                            <input  name="Name" id="signup-name" type="text" pattern="[A-Za-z ]+"  placeholder="User Name">
                        </div>


                        <div class="form-group mb-30 item-2" style="display:none">
                            <label for="login-pass"><i class="fas fa-users"></i></label>
                            <select name="type" id="signup-type" class="pad-75">
                                <option value="">Account Type</option>
                                <option value="buyer">Buyer</option>
                                <option value="seller">Seller</option>
                            </select>
                        </div>

                        <div class="form-group mb-30 item-2" style="display:none">
                            <label for="login-pass"><i class="fas fa-address-book"></i></label>
                            <textarea name="address" id="signup-address" class="pad-10-75" rows="5" placeholder="Address" style="height:auto;"></textarea>
                        </div>
                        <div class="form-group mb-30 item-3" style="display:none">
                            <label for="login-pass"><i class="fa fa-id-card"></i></label>
                            <input  name="adhar" id="signup-adhar" type="text" pattern="[0-9]+"  placeholder="adhar number">
                        </div>

                        <div class="form-group mb-30 item-3" style="display:none">
                            <label for="login-pass"><i class="fas fa-phone-alt"></i></label>
                            <input  name="mobile" id="signup-phone" type="text" pattern="[0-9]+"  placeholder="Mobile Number">
                        </div>

                        <div class="item-3" style="display: none"><p>Upload Your Image</p></div><br/>
                        <div class="form-group mb-30 item-3" style="display:none">
                            <label for="login-pass"><i class="fas fa-user"></i></label>
                            <input  id="signup-image" class="pad-10-75" name="file" type="file"  placeholder="adhar number">
                        </div>


                        <div class="form-group checkgroup mb-30 item-3" style="display:none">
                            <input id="signup-confirm"  type="checkbox" name="terms" id="check"><label for="check">The SBID Terms of Use apply</label>
                        </div>
                        <div id="signup-error" class="form-group checkgroup mb-30 item-3">
                            <?php 
                                if(isset($_SESSION['response'])){
                                    echo "<span style='color:red;'>".$_SESSION['response']."</span>";
                                    unset($_SESSION['response']);
                                }
                            ?>
                            
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" name="submit" value="submit" class="custom-button">NEXT</button>
                        </div>
                    </form>
                </div>
                <div class="right-side cl-white">
                    <div class="section-header mb-0">
                        <h3 class="title mt-0">ALREADY HAVE AN ACCOUNT?</h3>
                        <p>Log in and go to your Dashboard.</p>
                        <a href="sign-in" class="custom-button transparent">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Account Section Ends Here =============-->


    <?php require "footer.php"; ?>


    </script><script src="assets/js/jquery-3.3.1.min.js"></script>
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
    <script src="assets/js/set/signup.js"></script>
    
    
</body>

</html>