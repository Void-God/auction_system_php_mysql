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
    <div class="hero-section style-2">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="#0">Pages</a>
                </li>
                <li>
                    <span>winning Bids</span>
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
                    <div class="row mb-30-none justify-content-center">
                        




                        <div class="col-sm-10 col-md-6">

                        <?php
                            if($_SESSION['privlg'] == 'seller'){
                                $query = "SELECT * FROM auction_item WHERE status = 'completed' AND sellerID = '".$_SESSION['tokenID']."'";
                                $class = "buyer-detail";
                                $cmt = "winningID";
                            }
                            else if($_SESSION['privlg'] == 'buyer'){
                                $query = "SELECT * FROM auction_item WHERE status = 'completed' AND winningID = '".$_SESSION['tokenID']."'";
                                $cmt = "sellerID";
                            }
                                $query_run = mysqli_query($con,$query);
                                while($rows = mysqli_fetch_assoc($query_run )) {
                        ?>
                            <div class="auction-item-2">
                                    <div class="auction-thumb">
                                        <a href="#0"><img style="height:247px;width:330px;" src="assets/images/auction/<?php echo $rows['itemType']."/".$rows['img']; ?>" alt="product"></a>
                                        <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                        <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                    </div>
                                    <div class="auction-content">
                                        <h6 class="title">
                                            <a href="#0"><?php echo $rows['itemName']; ?></a>
                                        </h6>
                                        <div class="bid-area">
                                            <div class="bid-amount">
                                                <div class="icon">
                                                    <i class="flaticon-auction"></i>
                                                </div>
                                                <div class="amount-content">
                                                    <div class="current">Highst Bid</div>
                                                    <div class="amount">
                                                        <?php 
                                                            $q = "SELECT * FROM auction_history WHERE itemID = '".$rows['itemID']."' ORDER BY historyID DESC LIMIT 1;";
                                                            $qr = mysqli_query($con,$q);   
                                                            $d = mysqli_fetch_assoc($qr);
                                                            echo "₹".$d['bidAmount'];
                                                            
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bid-amount">
                                                <div class="icon">
                                                    <i class="flaticon-money"></i>
                                                </div>
                                                <div class="amount-content">
                                                    <div class="current"></div>
                                                    <div class="amount"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="countdown-area">
                                            <div class="countdown">
                                                <div id="">Bidding End</div>
                                                
                                            </div>
                                            <span class="total-bids"><?php 
                                                $q = "SELECT count(*) as count FROM auction_history WHERE itemID = '".$rows['itemID']."'; ";
                                                $qr = mysqli_fetch_assoc(mysqli_query($con,$q));
                                                echo $qr['count'];
                                            ?>
                                            Bids</span>
                                        </div>
                                        <div class="text-center">
                                            <button href="#0" value="<?php echo $rows[$cmt] ?>"  class="custom-button detail">Detail</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php

                                }
                            
                           
                            
                            
                        ?>



                                





                        
                        
                    
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Dashboard Section Ends Here =============-->

    <!-- The Modal -->
    <div class="modal" id="myError">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal" style="width:auto;">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
              <img src="assets/images/loading.gif" style="width:60px;height:60px;">
              <span>Please Wait...</span>
              <p></p>
          </div>

          <!-- Modal footer -->
          

        </div>
      </div>
    </div>
    



    <?php require "footer.php"; ?>


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
    <script type="text/javascript">
        $(".detail").on('click', function () {
            let item = $(this).val();
            $(".modal-header").hide();
                $(".modal-body img").show();
                $(".modal-body span").show();
                $(".modal-body p").empty(); 
                    
                $('#myError').modal({backdrop: 'static',keyboard: true,show: true});
                $.post("includes/winning/detail.php",{item:item},
                function(data) {
                    $(".modal-body img").hide();
                    $(".modal-body span").hide();
                    $(".modal-body p").html(data);
                    $(".modal-header").show();
                });   
        });
    </script>
</body>

</html>