<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>SBID - Bid And Auction </title>

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
        include "header.php";
        include "cart.php";
    ?>


    <!--============= Hero Section Starts Here =============-->
    <div class="hero-section style-2">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="#0">My Account</a>
                </li>
                <li>
                    <span>My Bids</span>
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
                
                <div class="col-lg-8" style="background-color: white;border-radius:20px">
                    <div class="dash-bid-item dashboard-widget mb-40-60" style="margin:10px;padding-bottom: 10px">
                        <div class="header">
                            <h4 class="title" style="margin: 0 auto;">Item Detail</h4>
                        </div>
                        
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="upcoming">
                            <div class="row mb-30-none justify-content-center">
                                <div class="col-sm-10 col-md-6">
                                    <form id="addItem" class="login-form" method="post" enctype="multipart/form-data">
                                        <div class="form-group mb-30">
                                            <label for="login-email"><i class="fas fa-sitemap"></i></label>
                                            <input id="signup-mail" type="text" name="itemName" placeholder="Item Name" required>
                                        </div>

                                        <div class="form-group mb-30 ">
                                            <label for="login-pass"><i class="fas fa-users"></i></label>
                                            <select name="itemType" id="signup-type" class="pad-75" required>
                                                <option value="">Item Type</option>
                                                <option value="watch">Watch</option>
                                                <option value="electronic">Electronic</option>
                                                <option value="sport">Sport</option>
                                                <option value="vehicle">Vehicle</option>
                                                <option value="jewellery">Jewellery</option>
                                                <option value="coin">coin</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-30 item-2" >
                                            <label for="login-pass"><i class="fas fa-address-book"></i></label>
                                            <textarea name="itemDescription" id="signup-address" class="pad-10-75" rows="2" placeholder="Description" style="height:auto;" required></textarea>
                                        </div>

                                        <div class="form-group mb-30 item-3" >
                                            <label for="login-pass"><i class="fas fa-mountain"></i></label>
                                            <input  name="itemAmount" id="signup-phone" type="text" pattern="[0-9]+"  placeholder="Start Bidding Amount" required>
                                        </div>

                                        <div class="form-group mb-30 item-3" >
                                            <label for="login-pass"><i class="fas fa-sort-amount-up-alt"></i></label>
                                            <input  name="itemIncrement" id="signup-phone" type="text" pattern="[0-9]+"  placeholder="Increment per bid" required>
                                        </div>

                                        <div class="form-group mb-30 item-3" >
                                            <label for="login-pass"><i class="fas fa-clock"></i></label>
                                            <input  name="itemTime" id="signup-phone" type="text" pattern="[0-9]+"  placeholder="Bidding Ends(in days)" required>
                                        </div>
                                        <div class="item-3" ><p>Upload Item Image</p></div><br/>
                                        <div class="form-group mb-30 item-3" >
                                            <label for="login-pass"><i class="fas fa-user"></i></label>
                                            <input  id="signup-image" class="pad-10-75" name="file" type="file"  placeholder="adhar number" required>
                                        </div>


                                        <div class="form-group checkgroup mb-30 item-3">
                                            <input id="signup-confirm"  type="checkbox" name="terms" id="check" required><label for="check" >The SBID Terms of Use apply</label>
                                        </div>
                                        

                                        <div class="form-group mb-0">
                                            <button type="submit" name="submit" value="submit" class="custom-button">UPLOAD</button>
                                        </div>
                                    </form>





                                </div>                               
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Dashboard Section Ends Here =============-->


    <?php include "footer.php"; ?>

    <!-- The Modal -->
    <div class="modal" id="myError">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
              
          </div>

          <!-- Modal footer -->
          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div> -->

        </div>
      </div>
    </div>

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
    <script type="text/javascript">
        $("#addItem").on('submit',function () {
            $("#addItem").attr("action","includes/bidItem/addItem.php");
        })
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