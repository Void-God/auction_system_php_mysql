<?php 
    session_start();
    if(isset($_GET['itemtype'])){
        $type = $_GET['itemtype'];
        date_default_timezone_set("Asia/Calcutta");
        $time = date('Y-m-d H:i:s');
        require "includes/dbConnection.php";
        $query = "SELECT * FROM auction_item WHERE itemType='$type' AND endTime > '$time'";
        $query_run = mysqli_query($con, $query);
        
    }
    else {
        header("Location:includes/../");
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
                    <a href="#0">Pages</a>
                </li>
                <li>
                    <span>Vehicles</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="assets/images/banner/hero-bg.png"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->


    <!--============= Featured Auction Section Starts Here =============-->
    <section class="featured-auction-section padding-bottom mt--240 mt-lg--440 pos-rel">
        <div class="container">
            <div class="section-header cl-white mw-100 left-style">
                <h3 class="title">Bid on These Featured Auctions!</h3>
            </div>
            <div class="row justify-content-center mb-30-none">

                <!-- <div class="col-sm-10 col-md-6 col-lg-4">
                    <div class="auction-item-2">
                        <div class="auction-thumb">
                            <a href="product-details.html"><img src="assets/images/auction/car/auction-1.jpg" alt="car"></a>
                            <a href="#0" class="rating"><i class="far fa-star"></i></a>
                            <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                        </div>
                        <div class="auction-content">
                            <h6 class="title">
                                <a href="#0">2018 Hyundai Sonata</a>
                            </h6>
                            <div class="bid-area">
                                <div class="bid-amount">
                                    <div class="icon">
                                        <i class="flaticon-auction"></i>
                                    </div>
                                    <div class="amount-content">
                                        <div class="current">Current Bid</div>
                                        <div class="amount">$876.00</div>
                                    </div>
                                </div>
                                <div class="bid-amount">
                                    <div class="icon">
                                        <i class="flaticon-money"></i>
                                    </div>
                                    <div class="amount-content">
                                        <div class="current">Buy Now</div>
                                        <div class="amount">$5,00.00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="countdown-area">
                                <div class="countdown">
                                    <div id="bid_counter26"></div>
                                </div>
                                <span class="total-bids">30 Bids</span>
                            </div>
                            <div class="text-center">
                                <a href="#0" class="custom-button">Submit a bid</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-md-6 col-lg-4">
                    <div class="auction-item-2">
                        <div class="auction-thumb">
                            <a href="product-details.html"><img src="assets/images/auction/car/auction-2.jpg" alt="car"></a>
                            <a href="#0" class="rating"><i class="far fa-star"></i></a>
                            <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                        </div>
                        <div class="auction-content">
                            <h6 class="title">
                                <a href="#0">2018 Nissan Versa, S</a>
                            </h6>
                            <div class="bid-area">
                                <div class="bid-amount">
                                    <div class="icon">
                                        <i class="flaticon-auction"></i>
                                    </div>
                                    <div class="amount-content">
                                        <div class="current">Current Bid</div>
                                        <div class="amount">$876.00</div>
                                    </div>
                                </div>
                                <div class="bid-amount">
                                    <div class="icon">
                                        <i class="flaticon-money"></i>
                                    </div>
                                    <div class="amount-content">
                                        <div class="current">Buy Now</div>
                                        <div class="amount">$5,00.00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="countdown-area">
                                <div class="countdown">
                                    <div id="bid_counter27"></div>
                                </div>
                                <span class="total-bids">30 Bids</span>
                            </div>
                            <div class="text-center">
                                <a href="#0" class="custom-button">Submit a bid</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-md-6 col-lg-4">
                    <div class="auction-item-2">
                        <div class="auction-thumb">
                            <a href="product-details.html"><img src="assets/images/auction/car/auction-3.jpg" alt="car"></a>
                            <a href="#0" class="rating"><i class="far fa-star"></i></a>
                            <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                        </div>
                        <div class="auction-content">
                            <h6 class="title">
                                <a href="#0">2018 Honda Accord, Sport</a>
                            </h6>
                            <div class="bid-area">
                                <div class="bid-amount">
                                    <div class="icon">
                                        <i class="flaticon-auction"></i>
                                    </div>
                                    <div class="amount-content">
                                        <div class="current">Current Bid</div>
                                        <div class="amount">$876.00</div>
                                    </div>
                                </div>
                                <div class="bid-amount">
                                    <div class="icon">
                                        <i class="flaticon-money"></i>
                                    </div>
                                    <div class="amount-content">
                                        <div class="current">Buy Now</div>
                                        <div class="amount">$5,00.00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="countdown-area">
                                <div class="countdown">
                                    <div id="bid_counter28"></div>
                                </div>
                                <span class="total-bids">30 Bids</span>
                            </div>
                            <div class="text-center">
                                <a href="#0" class="custom-button">Submit a bid</a>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div> 
        </div>
    </section>
    <!--============= Featured Auction Section Ends Here =============-->


    <!--============= Product Auction Section Starts Here =============-->
    <div class="product-auction padding-bottom">
        <div class="container">
            <!-- <div class="product-header mb-40">
                <div class="product-header-item">
                    <div class="item">Sort By : </div>
                    <select name="sort-by" class="select-bar">
                        <option value="all">All</option>
                        <option value="name">Name</option>
                        <option value="date">Date</option>
                        <option value="type">Type</option>
                        <option value="car">Car</option>
                    </select>
                </div>
                <div class="product-header-item">
                    <div class="item">Show : </div>
                    <select name="sort-by" class="select-bar">
                        <option value="09">09</option>
                        <option value="21">21</option>
                        <option value="30">30</option>
                        <option value="39">39</option>
                        <option value="60">60</option>
                    </select>
                </div>
                <form class="product-search ml-auto">
                    <input type="text" placeholder="Item Name">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div> -->
            <div class="row mb-30-none justify-content-center">
                <?php 
                    while($rows = mysqli_fetch_assoc($query_run)){
                ?>

                <div class="col-sm-10 col-md-6 col-lg-4">
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



                            <!-- <ul class="pagination">
                <li>
                    <a href="#0"><i class="flaticon-left-arrow"></i></a>
                </li>
                <li>
                    <a href="#0">1</a>
                </li>
                <li>
                    <a href="#0" class="active">2</a>
                </li>
                <li>
                    <a href="#0">3</a>
                </li>
                <li>
                    <a href="#0"><i class="flaticon-right-arrow"></i></a>
                </li>
            </ul> -->
            </div>
        </div>
    </div>
    <!--============= Product Auction Section Ends Here =============-->


    <?php include "footer.php"; ?>



    
</body>

</html>