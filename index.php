<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>SBID - Bid And Auction HTML Template</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/owl.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
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



    <!--============= Banner Section Starts Here =============-->
    <section class="banner-section bg_img" data-background="assets/images/banner/banner-bg-1.png">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner-content cl-white">
                        <h5 class="cate">Next Generation Auction</h5>
                        <h1 class="title"><span class="d-xl-block">Find Your</span> Next Deal!</h1>
                        <p>
                            Online Auction is where everyone goes to shop, sell,and give, while discovering variety and affordability.
                        </p>
                        <a href="Sign-in" class="custom-button yellow btn-large">Get Started</a>
                    </div>
                </div>
                <div class="d-none d-lg-block col-lg-6">
                    <div class="banner-thumb-2">
                        <img src="assets/images/banner/banner-1.png" alt="banner">
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-shape d-none d-lg-block">
            <img src="assets/css/img/banner-shape.png" alt="css">
        </div>
    </section>
    <!--============= Banner Section Ends Here =============-->


    <div class="browse-section ash-bg">
        <!--============= Hightlight Slider Section Starts Here =============-->
        <div class="browse-slider-section mt--140">
            <div class="container">
                <div class="section-header-2 cl-white mb-4">
                    <div class="left">
                        <h6 class="title pl-0 w-100">Browse the highlights</h6>
                    </div>
                    <div class="slider-nav">
                        <a href="#0" class="bro-prev"><i class="flaticon-left-arrow"></i></a>
                        <a href="#0" class="bro-next active"><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
                <div class="m--15">
                    <div class="browse-slider owl-theme owl-carousel">
                        <a href="product?itemtype=vehicle" class="browse-item">
                            <img src="assets/images/auction/01.png" alt="auction">
                            <span class="info">Vehicles</span>
                        </a>
                        <a href="product?itemtype=jewellery" class="browse-item">
                            <img src="assets/images/auction/02.png" alt="auction">
                            <span class="info">Jewelry</span>
                        </a>
                        <a href="product?itemtype=watch" class="browse-item">
                            <img src="assets/images/auction/03.png" alt="auction">
                            <span class="info">Watches</span>
                        </a>
                        <a href="product?itemtype=electronic" class="browse-item">
                            <img src="assets/images/auction/04.png" alt="auction">
                            <span class="info">Electronics</span>
                        </a>
                        <a href="product?itemtype=sport" class="browse-item">
                            <img src="assets/images/auction/05.png" alt="auction">
                            <span class="info">Sports</span>
                        </a>
                        <a href="product?itemtype=coin" class="browse-item">
                            <img src="assets/images/auction/coin.png" alt="auction">
                            <span class="info">Coins</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--============= Hightlight Slider Section Ends Here =============-->
        
        <!--============= Car Auction Section Starts Here =============-->
        <section class="car-auction-section padding-bottom padding-top pos-rel oh">
            <div class="car-bg"><img src="assets/images/auction/car/car-bg.png" alt="car"></div>
            <div class="container">
                <div class="section-header-3">
                    <div class="left">
                        <div class="thumb">
                            <img src="assets/images/header-icons/car-1.png" alt="header-icons">
                        </div>
                        <div class="title-area">
                            <h2 class="title">Vehicles</h2>
                            <p>We offer affordable Vehicles</p>
                        </div>
                    </div>
                    <a href="#0" class="normal-button">View All</a>
                </div>
                <div class="row justify-content-center mb-30-none">



                    <?php 
                        require "includes/dbConnection.php";
                        date_default_timezone_set("Asia/Calcutta");
                        $time = date('Y-m-d H:i:s');
                        
                        $query = "SELECT * FROM auction_item WHERE itemType='vehicle' AND endTime > '$time' LIMIT 3;";
                        $query_run = mysqli_query($con, $query);
                        
                        
                    ?>


                <?php 
                    while($rows = mysqli_fetch_assoc($query_run)){
                ?>

                    <div class="col-sm-10 col-md-6 col-lg-4">
                        <div class="auction-item-2">
                            <div class="auction-thumb">
                                <a href="product-details.html"><img style="height:247px;width:330px;" src="assets/images/auction/<?php echo $rows['itemType']."/".$rows['img']; ?>" alt="product"></a>
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
                                           

                                            <div class="current">Current Bid</div>
                                            <div class="amount">
                                                <?php 
                                                    $q = "SELECT * FROM auction_history WHERE itemID = '".$rows['itemID']."' ORDER BY historyID DESC LIMIT 1;";
                                                    $qr = mysqli_query($con,$q);
                                                    if(mysqli_num_rows($qr)){
                                                        
                                                        $d = mysqli_fetch_assoc($qr);
                                                        echo "₹".$d['bidAmount'];
                                                    }
                                                    else {
                                                        echo "NO BID YET";
                                                    } 
                                                ?>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-money"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Buy Now</div>
                                            <div class="amount">N/A</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="countdown-area">
                                    <div class="countdown">
                                        <div id="itm<?php echo  $rows['itemID'] ?>"></div>
                                    </div>
                                    <script type="text/javascript">
                                        if ($("#itm<?php echo  $rows['itemID'] ?>").length) {
                                            let endDate = "<?php echo $rows['endTime']; ?>"; //This is 2
                                            let counterElement = document.querySelector("#itm<?php echo  $rows['itemID'] ?>");
                                            let myCountDown = new ysCountDown(endDate, function (remaining, finished) {
                                                let message = "";
                                                if (finished) {
                                                    message = "Expired";
                                                } else {
                                                    var re_days = remaining.totalDays;
                                                    var re_hours = remaining.hours;
                                                    message += re_days +"d  : ";
                                                    message += re_hours +"h  : ";
                                                    message += remaining.minutes +"m  : ";
                                                    message += remaining.seconds + "s";
                                                }
                                                counterElement.textContent = message;
                                            });
                                        }
                                    </script>
                                    <span class="total-bids">
                                        <?php 
                                            $q = "SELECT count(*) as count FROM auction_history WHERE itemID = '".$rows['itemID']."'; ";
                                            $qr = mysqli_fetch_assoc(mysqli_query($con,$q));
                                            echo $qr['count'];
                                        ?>
                                    Bids</span>
                                </div>
                                <div class="text-center">
                                    <a href="product-details?item=<?php echo $rows['itemID'] ?>" class="custom-button">Submit a bid</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>




                    <?php
                        }
                    ?>




                    
                    
                </div>
            </div>
        </section>
        <!--============= Car Auction Section Ends Here =============-->
    </div>


    <!--============= Jewelry Auction Section Starts Here =============-->
    <section class="jewelry-auction-section padding-bottom padding-top pos-rel">
        <div class="jewelry-bg d-none d-xl-block"><img src="assets/images/auction/jewellery/jwelry-bg.png" alt="jewelry"></div>
        <div class="container">
            <div class="section-header-3">
                <div class="left">
                    <div class="thumb">
                        <img src="assets/images/header-icons/coin-1.png" alt="header-icons">
                    </div>
                    <div class="title-area">
                        <h2 class="title">Jewelry</h2>
                        <p>Online jewelry auctions where you can bid now and save money</p>
                    </div>
                </div>
                <a href="#0" class="normal-button">View All</a>
            </div>
            <div class="row justify-content-center mb-30-none">
                

                    <?php 
                        $query = "SELECT * FROM auction_item WHERE itemType='jewellery' AND endTime > '$time' LIMIT 3;";
                        $query_run = mysqli_query($con, $query);
                        
                        
                    ?>


                <?php 
                    while($rows = mysqli_fetch_assoc($query_run)){
                ?>

                    <div class="col-sm-10 col-md-6 col-lg-4">
                        <div class="auction-item-2">
                            <div class="auction-thumb">
                                <a href="product-details.html"><img style="height:247px;width:330px;" src="assets/images/auction/<?php echo $rows['itemType']."/".$rows['img']; ?>" alt="product"></a>
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
                                           

                                            <div class="current">Current Bid</div>
                                            <div class="amount">
                                                <?php 
                                                    $q = "SELECT * FROM auction_history WHERE itemID = '".$rows['itemID']."' ORDER BY historyID DESC LIMIT 1;";
                                                    $qr = mysqli_query($con,$q);
                                                    if(mysqli_num_rows($qr)){
                                                        
                                                        $d = mysqli_fetch_assoc($qr);
                                                        echo "₹".$d['bidAmount'];
                                                    }
                                                    else {
                                                        echo "NO BID YET";
                                                    } 
                                                ?>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-money"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Buy Now</div>
                                            <div class="amount">N/A</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="countdown-area">
                                    <div class="countdown">
                                        <div id="itm<?php echo  $rows['itemID'] ?>"></div>
                                    </div>
                                    <script type="text/javascript">
                                        if ($("#itm<?php echo  $rows['itemID'] ?>").length) {
                                            let endDate = "<?php echo $rows['endTime']; ?>"; //This is 2
                                            let counterElement = document.querySelector("#itm<?php echo  $rows['itemID'] ?>");
                                            let myCountDown = new ysCountDown(endDate, function (remaining, finished) {
                                                let message = "";
                                                if (finished) {
                                                    message = "Expired";
                                                } else {
                                                    var re_days = remaining.totalDays;
                                                    var re_hours = remaining.hours;
                                                    message += re_days +"d  : ";
                                                    message += re_hours +"h  : ";
                                                    message += remaining.minutes +"m  : ";
                                                    message += remaining.seconds + "s";
                                                }
                                                counterElement.textContent = message;
                                            });
                                        }
                                    </script>
                                    <span class="total-bids">
                                        <?php 
                                            $q = "SELECT count(*) as count FROM auction_history WHERE itemID = '".$rows['itemID']."'; ";
                                            $qr = mysqli_fetch_assoc(mysqli_query($con,$q));
                                            echo $qr['count'];
                                        ?>
                                    Bids</span>
                                </div>
                                <div class="text-center">
                                    <a href="product-details?item=<?php echo $rows['itemID'] ?>" class="custom-button">Submit a bid</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>




                    <?php
                        }
                    ?>



            </div>
        </div>
    </section>
    <!--============= Jewelry Auction Section Ends Here =============-->


    <!--============= Call In Section Starts Here =============-->
    <section class="call-in-section padding-top pt-max-xl-0">
        <div class="container">
            <div class="call-wrapper cl-white bg_img" data-background="assets/images/call-in/call-bg.png">
                <div class="section-header">
                    <h3 class="title">Register for Free & Start Bidding Now!</h3>
                    <p>From cars to diamonds to iPhones, we have it all.</p>
                </div>
                <a href="sign-up.html" class="custom-button white">Register</a>
            </div>
        </div>
    </section>
    <!--============= Call In Section Ends Here =============-->


    <!--============= Watches Auction Section Starts Here =============-->
    <section class="watches-auction-section padding-bottom padding-top">
        <div class="container">
            <div class="section-header-3">
                <div class="left">
                    <div class="thumb">
                        <img src="assets/images/header-icons/coin-1.png" alt="header-icons">
                    </div>
                    <div class="title-area">
                        <h2 class="title">Watches</h2>
                        <p>Shop for men & women designer brand watches</p>
                    </div>
                </div>
                <a href="#0" class="normal-button">View All</a>
            </div>
            <div class="row justify-content-center mb-30-none">
            

                    <?php 
                        require "includes/dbConnection.php";
                        date_default_timezone_set("Asia/Calcutta");
                        $time = date('Y-m-d H:i:s');
                        $query = "SELECT * FROM auction_item WHERE itemType='watch' AND endTime > '$time' LIMIT 3;";
                        $query_run = mysqli_query($con, $query);
                        
                        
                    ?>


                <?php 
                    while($rows = mysqli_fetch_assoc($query_run)){
                ?>

                    <div class="col-sm-10 col-md-6 col-lg-4">
                        <div class="auction-item-2">
                            <div class="auction-thumb">
                                <a href="product-details?item=<?php echo $rows['itemID'] ?>"><img style="height:247px;width:330px;" src="assets/images/auction/<?php echo $rows['itemType']."/".$rows['img']; ?>" alt="product"></a>
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
                                           

                                            <div class="current">Current Bid</div>
                                            <div class="amount">
                                                <?php 
                                                    $q = "SELECT * FROM auction_history WHERE itemID = '".$rows['itemID']."' ORDER BY historyID DESC LIMIT 1;";
                                                    $qr = mysqli_query($con,$q);
                                                    if(mysqli_num_rows($qr)){
                                                        
                                                        $d = mysqli_fetch_assoc($qr);
                                                        echo "₹".$d['bidAmount'];
                                                    }
                                                    else {
                                                        echo "NO BID YET";
                                                    } 
                                                ?>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-money"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Buy Now</div>
                                            <div class="amount">N/A</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="countdown-area">
                                    <div class="countdown">
                                        <div id="itm<?php echo  $rows['itemID'] ?>"></div>
                                    </div>
                                    <script type="text/javascript">
                                        if ($("#itm<?php echo  $rows['itemID'] ?>").length) {
                                            let endDate = "<?php echo $rows['endTime']; ?>"; //This is 2
                                            let counterElement = document.querySelector("#itm<?php echo  $rows['itemID'] ?>");
                                            let myCountDown = new ysCountDown(endDate, function (remaining, finished) {
                                                let message = "";
                                                if (finished) {
                                                    message = "Expired";
                                                } else {
                                                    var re_days = remaining.totalDays;
                                                    var re_hours = remaining.hours;
                                                    message += re_days +"d  : ";
                                                    message += re_hours +"h  : ";
                                                    message += remaining.minutes +"m  : ";
                                                    message += remaining.seconds + "s";
                                                }
                                                counterElement.textContent = message;
                                            });
                                        }
                                    </script>
                                    <span class="total-bids">
                                        <?php 
                                            $q = "SELECT count(*) as count FROM auction_history WHERE itemID = '".$rows['itemID']."'; ";
                                            $qr = mysqli_fetch_assoc(mysqli_query($con,$q));
                                            echo $qr['count'];
                                        ?>
                                    Bids</span>
                                </div>
                                <div class="text-center">
                                    <a href="product-details?item=<?php echo $rows['itemID'] ?>" class="custom-button">Submit a bid</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>




                    <?php
                        }
                    ?>







            </div>
        </div>
    </section>
    <!--============= Watches Auction Section Ends Here =============-->


    <!--============= Popular Auction Section Starts Here =============-->
    <section class="popular-auction padding-top pos-rel">
        <div class="popular-bg bg_img" data-background="assets/images/auction/popular/popular-bg.png"></div>
        <div class="container">
            <div class="section-header cl-white">
                <span class="cate">Closing Within 24 Hours</span>
                <h2 class="title">Popular Auctions</h2>
                <p>Bid and win great deals,Our auction process is simple, efficient, and transparent.</p>
            </div>
            <div class="popular-auction-wrapper">
                <div class="row justify-content-center mb-30-none">
                    <?php 
                        
                        $checkTime = date("Y-m-d H:i:s", strtotime("+1 day", strtotime($time)));

                        $query = "SELECT * FROM auction_item WHERE endTime > '$time' AND endTime < '$checkTime' LIMIT 6;";
                        $query_run = mysqli_query($con, $query);
                        
                        while($rows = mysqli_fetch_assoc($query_run)){


                    ?>

                        <div class="col-lg-6">
                            <div class="auction-item-3">
                                <div class="auction-thumb">
                                    <a href="product-details?item=<?php echo $rows['itemID'] ?>"><img style="height:228px;width:184px;" src="assets/images/auction/<?php echo $rows['itemType']."/".$rows['img']; ?>" alt="popular"></a>
                                    <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a href="product-details.html"><?php echo $rows['itemName'] ?></a>
                                    </h6>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">
                                                <?php 
                                                    $q = "SELECT * FROM auction_history WHERE itemID = '".$rows['itemID']."' ORDER BY historyID DESC LIMIT 1;";
                                                    $qr = mysqli_query($con,$q);
                                                    if(mysqli_num_rows($qr)){
                                                        
                                                        $d = mysqli_fetch_assoc($qr);
                                                        echo "₹".$d['bidAmount'];
                                                    }
                                                    else {
                                                        echo "NO BID YET";
                                                    } 
                                                ?> 

                                            </div>
                                        </div>
                                    </div>
                                    <div class="bids-area">
                                        Total Bids : <span class="total-bids"><?php 
                                            $q = "SELECT count(*) as count FROM auction_history WHERE itemID = '".$rows['itemID']."'; ";
                                            $qr = mysqli_fetch_assoc(mysqli_query($con,$q));
                                            echo $qr['count'];
                                        ?> Bids</span>
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
    </section>
    <!--============= Popular Auction Section Ends Here =============-->


    <!--============= Coins and Bullion Auction Section Starts Here =============-->
    <section class="coins-and-bullion-auction-section padding-bottom padding-top pos-rel pb-max-xl-0">
        <div class="jewelry-bg d-none d-xl-block"><img src="assets/images/auction/coins/coin-bg.png" alt="coin"></div>
        <div class="container">
            <div class="section-header-3">
                <div class="left">
                    <div class="thumb">
                        <img src="assets/images/header-icons/coin-1.png" alt="header-icons">
                    </div>
                    <div class="title-area">
                        <h2 class="title">Coins & Bullion</h2>
                        <p>Discover rare, foreign, & ancient coins that are worth collecting</p>
                    </div>
                </div>
                <a href="#0" class="normal-button">View All</a>
            </div>
            <div class="row justify-content-center mb-30-none">
                    



                    <?php 
                        $query = "SELECT * FROM auction_item WHERE itemType='coin' AND endTime > '$time' LIMIT 3;";
                        $query_run = mysqli_query($con, $query);
                        
                        
                    ?>


                <?php 
                    while($rows = mysqli_fetch_assoc($query_run)){
                ?>

                    <div class="col-sm-10 col-md-6 col-lg-4">
                        <div class="auction-item-2">
                            <div class="auction-thumb">
                                <a href="product-details.html"><img style="height:247px;width:330px;" src="assets/images/auction/<?php echo $rows['itemType']."/".$rows['img']; ?>" alt="product"></a>
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
                                           

                                            <div class="current">Current Bid</div>
                                            <div class="amount">
                                                <?php 
                                                    $q = "SELECT * FROM auction_history WHERE itemID = '".$rows['itemID']."' ORDER BY historyID DESC LIMIT 1;";
                                                    $qr = mysqli_query($con,$q);
                                                    if(mysqli_num_rows($qr)){
                                                        
                                                        $d = mysqli_fetch_assoc($qr);
                                                        echo "₹".$d['bidAmount'];
                                                    }
                                                    else {
                                                        echo "NO BID YET";
                                                    } 
                                                ?>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-money"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Buy Now</div>
                                            <div class="amount">N/A</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="countdown-area">
                                    <div class="countdown">
                                        <div id="itm<?php echo  $rows['itemID'] ?>"></div>
                                    </div>
                                    <script type="text/javascript">
                                        if ($("#itm<?php echo  $rows['itemID'] ?>").length) {
                                            let endDate = "<?php echo $rows['endTime']; ?>"; //This is 2
                                            let counterElement = document.querySelector("#itm<?php echo  $rows['itemID'] ?>");
                                            let myCountDown = new ysCountDown(endDate, function (remaining, finished) {
                                                let message = "";
                                                if (finished) {
                                                    message = "Expired";
                                                } else {
                                                    var re_days = remaining.totalDays;
                                                    var re_hours = remaining.hours;
                                                    message += re_days +"d  : ";
                                                    message += re_hours +"h  : ";
                                                    message += remaining.minutes +"m  : ";
                                                    message += remaining.seconds + "s";
                                                }
                                                counterElement.textContent = message;
                                            });
                                        }
                                    </script>
                                    <span class="total-bids">
                                        <?php 
                                            $q = "SELECT count(*) as count FROM auction_history WHERE itemID = '".$rows['itemID']."'; ";
                                            $qr = mysqli_fetch_assoc(mysqli_query($con,$q));
                                            echo $qr['count'];
                                        ?>
                                    Bids</span>
                                </div>
                                <div class="text-center">
                                    <a href="product-details?item=<?php echo $rows['itemID'] ?>" class="custom-button">Submit a bid</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>




                    <?php
                        }
                    ?>




                
            </div>
        </div>
    </section>
    <!--============= Coins and Bullion Auction Section Ends Here =============-->

    <!--============= Electronics Auction Section Starts Here =============-->
    <section class="coins-and-bullion-auction-section padding-bottom padding-top pos-rel pb-max-xl-0">
        <div class="jewelry-bg d-none d-xl-block"><img src="assets/images/auction/coins/coin-bg.png" alt="coin"></div>
        <div class="container">
            <div class="section-header-3">
                <div class="left">
                    <div class="thumb">
                        <img src="assets/images/header-icons/coin-1.png" alt="header-icons">
                    </div>
                    <div class="title-area">
                        <h2 class="title">Electronics</h2>
                        <p>Find Electronic Devices of your liking</p>
                    </div>
                </div>
                <a href="#0" class="normal-button">View All</a>
            </div>
            <div class="row justify-content-center mb-30-none">
                    



                    <?php 
                        $query = "SELECT * FROM auction_item WHERE itemType='electronic' AND endTime > '$time' LIMIT 3;";
                        $query_run = mysqli_query($con, $query);
                        
                        
                    ?>


                <?php 
                    while($rows = mysqli_fetch_assoc($query_run)){
                ?>

                    <div class="col-sm-10 col-md-6 col-lg-4">
                        <div class="auction-item-2">
                            <div class="auction-thumb">
                                <a href="product-details.html"><img style="height:247px;width:330px;" src="assets/images/auction/<?php echo $rows['itemType']."/".$rows['img']; ?>" alt="product"></a>
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
                                           

                                            <div class="current">Current Bid</div>
                                            <div class="amount">
                                                <?php 
                                                    $q = "SELECT * FROM auction_history WHERE itemID = '".$rows['itemID']."' ORDER BY historyID DESC LIMIT 1;";
                                                    $qr = mysqli_query($con,$q);
                                                    if(mysqli_num_rows($qr)){
                                                        
                                                        $d = mysqli_fetch_assoc($qr);
                                                        echo "₹".$d['bidAmount'];
                                                    }
                                                    else {
                                                        echo "NO BID YET";
                                                    } 
                                                ?>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-money"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Buy Now</div>
                                            <div class="amount">N/A</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="countdown-area">
                                    <div class="countdown">
                                        <div id="itm<?php echo  $rows['itemID'] ?>"></div>
                                    </div>
                                    <script type="text/javascript">
                                        if ($("#itm<?php echo  $rows['itemID'] ?>").length) {
                                            let endDate = "<?php echo $rows['endTime']; ?>"; //This is 2
                                            let counterElement = document.querySelector("#itm<?php echo  $rows['itemID'] ?>");
                                            let myCountDown = new ysCountDown(endDate, function (remaining, finished) {
                                                let message = "";
                                                if (finished) {
                                                    message = "Expired";
                                                } else {
                                                    var re_days = remaining.totalDays;
                                                    var re_hours = remaining.hours;
                                                    message += re_days +"d  : ";
                                                    message += re_hours +"h  : ";
                                                    message += remaining.minutes +"m  : ";
                                                    message += remaining.seconds + "s";
                                                }
                                                counterElement.textContent = message;
                                            });
                                        }
                                    </script>
                                    <span class="total-bids">
                                        <?php 
                                            $q = "SELECT count(*) as count FROM auction_history WHERE itemID = '".$rows['itemID']."'; ";
                                            $qr = mysqli_fetch_assoc(mysqli_query($con,$q));
                                            echo $qr['count'];
                                        ?>
                                    Bids</span>
                                </div>
                                <div class="text-center">
                                    <a href="product-details?item=<?php echo $rows['itemID'] ?>" class="custom-button">Submit a bid</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>




                    <?php
                        }
                    ?>




                
            </div>
        </div>
    </section>
    <!--============= Electronics Auction Section Ends Here =============-->
 


    <!--============= How Section Starts Here =============-->
    <section class="how-section padding-top">
        <div class="container">
            <div class="how-wrapper section-bg">
                <div class="section-header text-lg-left">
                    <h2 class="title">How it works</h2>
                    <p>Easy 3 steps to win</p>
                </div>
                <div class="row justify-content-center mb--40">
                    <div class="col-md-6 col-lg-4">
                        <div class="how-item">
                            <div class="how-thumb">
                                <img src="assets/images/how/how1.png" alt="how">
                            </div>
                            <div class="how-content">
                                <h4 class="title">Sign Up</h4>
                                <p>No Credit Card Required</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="how-item">
                            <div class="how-thumb">
                                <img src="assets/images/how/how2.png" alt="how">
                            </div>
                            <div class="how-content">
                                <h4 class="title">Bid</h4>
                                <p>Bidding is free Only pay if you win</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="how-item">
                            <div class="how-thumb">
                                <img src="assets/images/how/how3.png" alt="how">
                            </div>
                            <div class="how-content">
                                <h4 class="title">Win</h4>
                                <p>Fun - Excitement - Great deals</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= How Section Ends Here =============-->


    <!--============= Client Section Starts Here =============-->
    <section class="client-section padding-top padding-bottom">
        <div class="container">
            <div class="section-header">
                <h2 class="title">Don’t just take our word for it!</h2>
                <p>Our hard work is paying off. Great reviews from amazing customers.</p>
            </div>
            <div class="m--15">
                <div class="client-slider owl-theme owl-carousel">
                    <div class="client-item">
                        <div class="client-content">
                            <p>I can't stop bidding! It's a great way to spend some time and I want everything on SBID.</p>
                        </div>
                        <div class="client-author">
                            <div class="thumb">
                                <a href="#0">
                                    <img src="assets/images/client/client01.png" alt="client">
                                </a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="#0">Alexis Moore</a></h6>
                                <div class="ratings">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="client-item">
                        <div class="client-content">
                            <p>I came I saw I won. Love what I have won, and will try to win something else.</p>
                        </div>
                        <div class="client-author">
                            <div class="thumb">
                                <a href="#0">
                                    <img src="assets/images/client/client02.png" alt="client">
                                </a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="#0">Darin Griffin</a></h6>
                                <div class="ratings">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="client-item">
                        <div class="client-content">
                            <p>This was my first time, but it was exciting. I will try it again. Thank you so much.</p>
                        </div>
                        <div class="client-author">
                            <div class="thumb">
                                <a href="#0">
                                    <img src="assets/images/client/client03.png" alt="client">
                                </a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="#0">Tom Powell</a></h6>
                                <div class="ratings">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Client Section Ends Here =============-->


    <?php require "footer.php" ?>




</body>

</html>