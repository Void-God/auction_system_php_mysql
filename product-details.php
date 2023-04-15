<?php 
    session_start();
    if(isset($_GET['item'])){
        require "includes/dbConnection.php";
        $item = mysqli_real_escape_string($con,$_GET['item']);
        $query = "SELECT * FROM auction_item WHERE itemID = '$item'";
        $query_run = mysqli_query($con,$query);
        if (mysqli_num_rows($query_run) != 1) {
           header("Location:includes/../"); 
        }
        else {
            $detail = mysqli_fetch_assoc($query_run);
        }
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


    <!--============= Product Details Section Starts Here =============-->
    <section class="product-details padding-bottom mt--240 mt-lg--440">
        <div class="container">
            <div class="product-details-slider-top-wrapper">
                <div class="product-details-slider owl-theme owl-carousel" id="sync1">
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img style="max-height:700px"  src="assets/images/auction/<?php echo $detail['itemType']."/".$detail['img']; ?>" alt="product"> 
                            
                        </div>
                    </div>
                    <!-- <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="assets/images/product/product2.png" alt="product">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="assets/images/product/product3.png" alt="product">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="assets/images/product/product4.png" alt="product">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="assets/images/product/product5.png" alt="product">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="assets/images/product/product6.png" alt="product">
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- <div class="product-details-slider-wrapper">
                <div class="product-bottom-slider owl-theme owl-carousel" id="sync2">
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="assets/images/product/01.png" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="assets/images/product/02.png" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="assets/images/product/03.png" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="assets/images/product/04.png" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="assets/images/product/05.png" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="assets/images/product/06.png" alt="product">
                        </div>
                    </div>
                </div>
                <span class="det-prev det-nav">
                    <i class="fas fa-angle-left"></i>
                </span>
                <span class="det-next det-nav active">
                    <i class="fas fa-angle-right"></i>
                </span>
            </div> -->
            <div class="row mt-40-60-80">
                <div class="col-lg-8">
                    <div class="product-details-content">
                        <div class="product-details-header">
                            <h2 class="title"><?php echo $detail['itemName']; ?></h2>
                            <ul>
                                <li>Listing ID: <?php echo $_GET['item']; ?></li>
                                <li>Item #: <?php echo rand(100000,99999);?></li>
                            </ul>
                        </div>
                        <ul class="price-table mb-30">
                            <li class="header">
                                <h5 class="current">Current Price</h5>
                                <h3 id="bidPart" class="price"> 
                                    <?php 
                                        $query = "select * from auction_history where itemID = '$item' ORDER by historyID DESC limit 1;";
                                        $query_run = mysqli_query($con,$query);
                                        if(mysqli_num_rows($query_run) == 0){
                                            echo  "NO BIDDING YET!";
                                        }
                                        else {
                                            $itemprice = mysqli_fetch_assoc($query_run);
                                            echo "₹ ".$itemprice['bidAmount'];
                                        }
                                    ?>
                                </h3>
                            </li>
                            <li>
                                <span class="details">Starting Bid</span>
                                <h5 class="info">₹ <?php echo  $detail['startingBid'] ?></h5>
                            </li>
                            <li>
                                <span class="details">Bid Increment </span>
                                <h5 class="info">₹ <?php echo  $detail['incrementAmount'] ?></h5>
                            </li>
                        </ul>
                        <div class="product-bid-area">
                            <form class="product-bid-form">
                                <div class="search-icon">
                                    <img src="assets/images/product/search-icon.png" alt="product">
                                </div>
                                <input id="bidAmount" type="text" pattern="[0-9]+" placeholder="Enter you bid amount">
                                <button id="submitBid" type="button" class="custom-button">Submit a bid</button>
                            </form>
                        </div>
                        <div class="buy-now-area">
                            <a href="#0" class="custom-button">Buy Now: N/A</a>
                            <a href="#0" class="rating custom-button active border"><i class="fas fa-star"></i> Add to Wishlist</a>
                            <div class="share-area">
                                <span>Share to:</span>
                                <ul>
                                    <li>
                                        <a href="#0"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#0"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#0"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="#0"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="product-sidebar-area">
                        <div class="product-single-sidebar mb-3">
                            <h6 class="title">This Auction Ends in:</h6>
                            <div class="countdown">
                                <div id="itemCount"></div>
                            </div>
                            <div class="side-counter-area">
                                <div class="side-counter-item">
                                    <div class="thumb">
                                        <img src="assets/images/product/icon1.png" alt="product">
                                    </div>
                                    <div class="content">
                                        <?php 
                                            $q = "SELECT DISTINCT buyerID FROM auction_history WHERE itemID = '$item';";
                                            $qr = mysqli_query($con,$query);
                                        ?>
                                        <h3 class="count-title"><span class="counter"><?php echo mysqli_num_rows($qr) ?></span></h3>
                                        <p>Active Bidders</p>
                                    </div>
                                </div>
                                <div class="side-counter-item">
                                    <div class="thumb">
                                        <img src="assets/images/product/icon2.png" alt="product">
                                    </div>
                                    <div class="content">
                                        <h3 class="count-title"><span class="counter">1</span></h3>
                                        <p>Watching</p>
                                    </div>
                                </div>
                                <div class="side-counter-item">
                                    <?php 
                                        $query = "SELECT users.userName,users.img,auction_history.bidAmount,auction_history.bidTime FROM users INNER JOIN auction_history ON users.userID = auction_history.buyerID where auction_history.itemID = $item ORDER BY auction_history.historyID DESC ;";
                                        $query_run = mysqli_query($con,$query);
                                    ?>
                                    <div class="thumb">
                                        <img src="assets/images/product/icon3.png" alt="product">
                                    </div>
                                    <div class="content">
                                        <h3 class="count-title"><span class="counter"><?php echo mysqli_num_rows($query_run); ?></span></h3>
                                        <p>Total Bids</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#0" class="cart-link">View Shipping, Payment & Auction Policies</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-tab-menu-area mb-40-60 mt-70-100">
            <div class="container">
                <ul class="product-tab-menu nav nav-tabs">
                    <li>
                        <a href="#details" class="active" data-toggle="tab">
                            <div class="thumb">
                                <img src="assets/images/product/tab1.png" alt="product">
                            </div>
                            <div class="content">Description</div>
                        </a>
                    </li>
                    <li>
                        <a href="#delevery" data-toggle="tab">
                            <div class="thumb">
                                <img src="assets/images/product/tab2.png" alt="product">
                            </div>
                            <div class="content">Delivery Options</div>
                        </a>
                    </li>
                    <li>
                        <a href="#history" data-toggle="tab">
                            <div class="thumb">
                                <img src="assets/images/product/tab3.png" alt="product">
                            </div>
                            <div class="content">Bid History</div>
                        </a>
                    </li>
                    <li>
                        <a href="#questions" data-toggle="tab">
                            <div class="thumb">
                                <img src="assets/images/product/tab4.png" alt="product">
                            </div>
                            <div class="content">Questions </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="details">
                    <div class="tab-details-content">
                        <div class="header-area">
                            <h3 class="title"><?php echo $detail['itemName']; ?></h3>
                            <div class="item">
                                <pre><?php echo $detail['description']; ?></pre>
                                <!-- <table class="product-info-table">
                                    <tbody>
                                        <tr>
                                            <th>Condition</th>
                                            <td>New</td>
                                        </tr>
                                        <tr>
                                            <th>Mileage</th>
                                            <td>15,000 miles</td>
                                        </tr>
                                        <tr>
                                            <th>Year</th>
                                            <td>09-2017</td>
                                        </tr>
                                        <tr>
                                            <th>Engine</th>
                                            <td>I-4 1,5 l</td>
                                        </tr>
                                        <tr>
                                            <th>Fuel</th>
                                            <td>Regular</td>
                                        </tr>
                                        <tr>
                                            <th>Transmission</th>
                                            <td>Automatic</td>
                                        </tr>
                                        <tr>
                                            <th>Color</th>
                                            <td>Blue</td>
                                        </tr>
                                        <tr>
                                            <th>Doors</th>
                                            <td>5</td>
                                        </tr>
                                    </tbody>
                                </table> -->
                            </div>
                            <div class="item">
                                <h5 class="subtitle">NYC Fleet / DCAS units may be located at either of two locations:</h5>
                                <ul>
                                    <li>Brooklyn, NY (1908 Shore Parkway)</li>
                                    <li>Medford, NY (66 Peconic Ave)</li>
                                </ul>
                            </div>
                            <div class="item">
                                <h5 class="subtitle">This unit is located at:</h5>
                                <ul>
                                    <li>Kenben Industries Ltd.</li>
                                    <li>1908 Shore Parkway</li>
                                    <li>Brooklyn, NY 11214</li>
                                </ul>
                            </div>
                            <div class="item">
                                <h5 class="subtitle">Acceptance of condition - buyer inspection/preview</h5>
                                <p>Vehicles and equipment often display significant wear and tear. Assets are sold AS IS with no warranty, express or implied, and we highly recommend previewing them before bidding. The preview period is the only opportunity to inspect an asset to verify condition and suitability. No refunds, adjustments or returns will be entertained. </p>
                                <!-- <p>Vehicle preview inspections of the vehicle can be done at the below location on Monday and Tuesday from 10am - 2pm. See Preview Rules Here.</p>                                
                                <ul>
                                    <li>Kenben Industries Ltd.</li>
                                    <li>1908 Shore Parkway</li>
                                    <li>Brooklyn, NY 11214</li>
                                </ul> -->
                                <p>BUYER is responsible for all storage fees at time of pick-up. See above under IMPORTANT PICK-UP TIMES for specific requirements for this asset, but generally assets must be picked up within 2 business days of payment otherwise additional storage fees will be applied.</p>
                            </div>
                            <div class="item">
                                <h5 class="subtitle">Legal Notice</h5>
                                <p>Vehicles may not be driven off the lot except with a dealer plate affixed. By law, vehicles are not permitted to be parked on or to drive on the streets of New York without registration and plates registered to the vehicle. If the buyer cannot obtain the required registration and plates prior to pick up, they should have the vehicle towed at their own expense. The buyer should have the vehicle towed at their own expense.</p>
                                <p>Condition: Untested - Sold As-Is</p>
                                <p>Employees of SBID, its subcontractors and affiliated companies, employees of the NYC Government and those bidding on behalf of PropertyRoom.com, its subcontractors and affiliated companies and employees of the NYC Government are not permitted to bid on or purchase NYC Fleet/DCAS assets. </p>
                            </div>
                            <div class="item">
                                <h5 class="subtitle">Condition</h5>
                                <p>This ASSET is being listed on behalf of a law enforcement agency or other partner ("SELLER") by PropertyRoom.com on a Sold AS IS, WHERE IS, WITH ALL FAULTS basis, with no representation or warranty from PropertyRoom.com or SELLER. In many cases, the car, boat, truck, motorcycle, aircraft, mowers/tractors, etc. ("ASSET") sold on PropertyRoom.com comes from seizure or forfeiture, and the SELLER typically does not possess use-based knowledge of the ASSET. Further, PropertyRoom.com does not physically inspect the ASSET and cannot attest to actual working conditions. PropertyRoom.com and SELLER gather information about the ASSET from authoritative sources; still, errors may appear from time to time in the listing. PropertyRoom.com cautions any website user, shopper, bidder, etc. ("BUYER") to attempt to confirm, with us, information material to a bidding/purchasing decision.</p>
                            </div>
                            <div class="item">
                                <h5 class="subtitle">Bidding</h5>
                                <p>At this time SBID only accepts bidders from the United States, Canada and Mexico on Vehicles and Heavy Industrial Equipment. The Bid Now button will appear on auctions where you are qualified to place a bid.</p>
                            </div>
                            <div class="item">
                                <h5 class="subtitle">Buyer Responsibility</h5>
                                <p>The BUYER will receive an email notification from PropertyRoom.com following the close of an auction. After fraud verification and payment settlement, we will email the BUYER instructions for retrieving the ASSET from the Will-Call Location listed above.</p>
                                <p>All applicable shipping, logistics, transportation, customs, fees, taxes, export/import activities and all associated costs are the sole responsibility of the BUYER. No shipping, customs, export or import assistance is available from SBID.</p>
                                <p>When applicable for a given ASSET, BUYER bears responsibility for determining motor vehicle registration requirements in the applicable jurisdiction as well as costs, including any fees, registration fees, taxes, etc., owed as a result of BUYER registering an ASSET; for example, BUYER bears sole responsibility for all title/registration/smog and other such fees.</p>
                                <p>BUYER is responsible for all storage fees at time of pick-up. See above under IMPORTANT PICK-UP TIMES for specific requirements for this asset, but generally assets must be picked up within 2 business days of payment otherwise additional storage fees will be applied.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="delevery">
                    <div class="shipping-wrapper">
                        <div class="item">
                            <h5 class="title">shipping</h5>
                            <div class="table-wrapper">
                                <table class="shipping-table">
                                    <thead>
                                        <tr>
                                            <th>Available delivery methods </th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Customer Pick-up (within 10 days)</td>
                                            <td>$0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Standard Shipping (5-7 business days)</td>
                                            <td>Not Applicable</td>
                                        </tr>
                                        <tr>
                                            <td>Expedited Shipping (2-4 business days)</td>
                                            <td>Not Applicable</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="item">
                            <h5 class="title">Notes</h5>
                            <p>Please carefully review our shipping and returns policy before committing to a bid.
                            From time to time, and at its sole discretion, SBID may change the prevailing fee structure for shipping and handling.</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="history">
                    <div class="history-wrapper">
                        <div class="item">
                            <h5 class="title">Bid History</h5>
                            <div class="history-table-area">
                                <table class="history-table">
                                    <thead>
                                        <tr>
                                            <th>Bidder</th>
                                            <th>date</th>
                                            <th>time</th>
                                            <th>unit price</th>
                                        </tr>
                                    </thead>
                                    <?php                                         
                                        while($rows = mysqli_fetch_assoc($query_run)){
                                            $time = explode(" ", $rows['bidTime']);
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td data-history="bidder">
                                                    <div class="user-info">
                                                        <div class="thumb">
                                                            <img src="images/<?php echo $rows['img']; ?>" alt="history">
                                                        </div>
                                                        <div class="content">
                                                            <?php echo $rows['userName']; ?>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td data-history="date"><?php echo date("d-m-Y", strtotime($time[0]));  ?></td>
                                                <td data-history="time"><?php echo date("g:i a", strtotime($time[1])) ?></td>
                                                <td data-history="unit price">₹<?php echo $rows['bidAmount']; ?></td>
                                            </tr>                                        
                                        </tbody>

                                    <?php
                                        }
                                    ?>
                                    
                                </table>
                                <!-- <div class="text-center mb-3 mt-4">
                                    <a href="#0" class="button-3">Load More</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="questions">
                        <h5 class="faq-head-title">Frequently Asked Questions</h5>
                        <div class="faq-wrapper">
                            <div class="faq-item">
                                <div class="faq-title">
                                    <img src="assets/css/img/faq.png" alt="css"><span class="title">How to start bidding?</span><span class="right-icon"></span>
                                </div>
                                <div class="faq-content">
                                    <p>All successful bidders can confirm their winning bid by checking the “SBID”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <div class="faq-title">
                                    <img src="assets/css/img/faq.png" alt="css"><span class="title">Security Deposit / Bidding Power </span><span class="right-icon"></span>
                                </div>
                                <div class="faq-content">
                                    <p>All successful bidders can confirm their winning bid by checking the “SBID”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <div class="faq-title">
                                    <img src="assets/css/img/faq.png" alt="css"><span class="title">Delivery time to the destination port </span><span class="right-icon"></span>
                                </div>
                                <div class="faq-content">
                                    <p>All successful bidders can confirm their winning bid by checking the “SBID”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <div class="faq-title">
                                    <img src="assets/css/img/faq.png" alt="css"><span class="title">How to register to bid in an auction?</span><span class="right-icon"></span>
                                </div>
                                <div class="faq-content">
                                    <p>All successful bidders can confirm their winning bid by checking the “SBID”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                                </div>
                            </div>
                            <div class="faq-item open active">
                                <div class="faq-title">
                                    <img src="assets/css/img/faq.png" alt="css"><span class="title">How will I know if my bid was successful?</span><span class="right-icon"></span>
                                </div>
                                <div class="faq-content">
                                    <p>All successful bidders can confirm their winning bid by checking the “SBID”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <div class="faq-title">
                                    <img src="assets/css/img/faq.png" alt="css"><span class="title">What happens if I bid on the wrong lot?</span><span class="right-icon"></span>
                                </div>
                                <div class="faq-content">
                                    <p>All successful bidders can confirm their winning bid by checking the “SBID”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Product Details Section Ends Here =============-->


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
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>





    <?php include "footer.php"; ?>



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
        if ($("#itemCount").length) {
            let endDate = "<?php echo $detail['endTime']; ?>"; //This is 2
            let counterElement = document.querySelector("#itemCount");
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
        $("#submitBid").on('click',function(){
            $(".modal-header").hide();
            $(".modal-body img").show();
            $(".modal-body span").show();
            $(".modal-body p").empty(); 
            let amount = $('#bidAmount').val();
            let product = "<?php echo $item; ?>";
            if(!(amount == '')){
                $('#myError').modal({backdrop: 'static',keyboard: true,show: true});
                $.post("includes/detail/bid.php",{amount:amount,product:product},
                 function(data) {
                    $(".modal-body img").hide();
                    $(".modal-body span").hide();
                    $(".modal-body p").html(data);
                    $(".modal-header").show();
                });
            }

        })
        
        
    
    </script>
    
</body>

</html>