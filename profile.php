<?php 
    session_start();
    if(!isset($_SESSION['privlg'])){
        header("Location:index");
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
    <link rel="stylesheet" type="text/css" href="assets/css/css.css">
    <style type="text/css">
        .modal-header button {
            width:auto;
        }
        .btn-trns,button:focus {
            border-color: transparent;
        }
        input,textarea {
            margin-bottom:35px;
        }
    </style>

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
        include "header.php";
        include "cart.php";

    ?>


    <!--============= Hero Section Starts Here =============-->
    <div class="hero-section style-2">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="index">Home</a>
                </li>
                <li>
                    <a href="#0">My Account</a>
                </li>
                <li>
                    <span>Personal profile</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="assets/images/banner/hero-bg.png"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->


    <!--============= Dashboard Section Starts Here =============-->
    <section class="dashboard-section padding-bottom mt--240 mt-lg--440 pos-rel">
        <div class="container">
            <div class="row justify-content-center">
                <?php include "detail.php"; ?>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Personal Details</h4>
                                    <span class="edit"><button class="edit-button btn-trns" data-toggle="modal" data-target="#myModal"><i class="flaticon-edit"></i>&nbsp;Edit</button> </span>
                                </div>
                                <ul class="dash-pro-body">
                                    <li>
                                        <div class="info-name">Name</div>
                                        <div class="info-value"><?php echo $detail['userName'] ?></div>
                                    </li>
                                    <!-- <li>
                                        <div class="info-name">Date of Birth</div>
                                        <div class="info-value">15-03-1974</div>
                                    </li> -->
                                    <li>
                                        <div class="info-name">Address</div>
                                        <div class="info-value"><?php echo $detail['address'];  ?></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Account Settings</h4>
                                    <span class="edit"><i class="flaticon-edit"></i> Edit</span>
                                </div>
                                <ul class="dash-pro-body">
                                    <!-- <li>
                                        <div class="info-name">Language</div>
                                        <div class="info-value">English (United States)</div>
                                    </li>
                                    <li>
                                        <div class="info-name">Time Zone</div>
                                        <div class="info-value">(GMT-06:00) Central America</div>
                                    </li> -->
                                    <li>
                                        <div class="info-name">Status</div>
                                        <div class="info-value"><i class="flaticon-check text-success"></i> Active</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Email Address</h4>
                                    <span class="edit"><i class="flaticon-edit"></i> Edit</span>
                                </div>
                                <ul class="dash-pro-body">
                                    <li>
                                        <div class="info-name">Email</div>
                                        <div class="info-value">Hidden</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Phone</h4>
                                    <span class="edit"><button class="edit-button btn-trns" data-toggle="modal" data-target="#myModalPhone"><i class="flaticon-edit"></i>&nbsp;Edit</button></span>
                                </div>
                                <ul class="dash-pro-body">
                                    <li>
                                        <div class="info-name">Mobile</div>
                                        <div class="info-value"><?php echo "+91 ".$detail['mobile'];?></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="dash-pro-item dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Security</h4>
                                    <span class="edit"><button class="edit-button btn-trns" data-toggle="modal" data-target="#myModalPswd"><i class="flaticon-edit"></i>&nbsp;Edit</button></span>
                                </div>
                                <ul class="dash-pro-body">
                                    <li>
                                        <div class="info-name">Password</div>
                                        <div class="info-value">xxxxxxxxxxxxxxxx</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Dashboard Section Ends Here =============-->


    <?php include "footer.php"; 
        include "includes/profile/popup.php";
    ?>



    <script src="assets/js/jquery-3.3.1.min.js"></script>
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
    <script src="assets/js/set/profile.js"></script>
    <script type="text/javascript">
        $("#personalForm").on('submit', function () {
            $("#personalForm").attr("action","includes/profile/changeDetail.php");
        })
        $("#changePswd").on('submit', function () {
            let pwd = $("#Pswd4").val();
            let pwd2 = $("#Pswd5").val();
            if(pwd == pwd2){
                $("#changePswd").attr("action","includes/profile/changePassword.php");
            }
            else {
                alert("New password and confirm password are not same!");
                return false;
            }
        })
        $("#changePhone").on('submit', function () {
            $("#changePhone").attr("action","includes/profile/changeContact.php");
        })

        document.getElementById("profile-pic").onchange = function() {
            $("#changedImage").attr("action","includes/profile/changeImage.php.php");
        };

        // $("#").on('change', function () {
        //     
        // })



        let txt = '<?php echo str_replace("\r\n", " ", $detail["address"]); ?>';
        $("textarea").val(txt);
        <?php 
            if(isset($_SESSION['response'])){
        ?>
            $('#myError .modal-body').empty().append("<?php echo $_SESSION['response']; ?>");  
            $('#myError').modal('show');
        <?php
                unset($_SESSION['response']);
            }
        ?>
    </script>
</body>

</html>