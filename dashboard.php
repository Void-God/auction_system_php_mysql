<?php  
    session_start(); 

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
    <div class="hero-section style-2 pb-lg-400">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="#0">My Account</a>
                </li>
                <li>
                    <span>Dashboard</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="assets/images/banner/hero-bg.png"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->


    <!--============= Dashboard Section Starts Here =============-->
    <section class="dashboard-section padding-bottom mt--240 mt-lg--325 pos-rel">
        <div class="container">
            <div class="row justify-content-center">
                

                <?php include "detail.php"; ?>
<?php 
    if(isset($_SESSION['privlg'])){
        require "includes/dbConnection.php";
        date_default_timezone_set("Asia/Calcutta");
        $time = date('Y-m-d H:i:s');
        
        if($_SESSION['privlg'] == 'seller'){
            
            // $query = "SELECT users.userName,users.img,auction_history.bidAmount,auction_history.bidTime FROM users INNER JOIN auction_history ON users.userID = auction_history.buyerID where auction_history.itemID = $item ORDER BY auction_history.historyID DESC ;";
            
            
            $query = "SELECT count(*) as count FROM auction_item WHERE endTime > '$time' AND sellerID = '".$_SESSION['tokenID']."'";
            $query_run = mysqli_query($con,$query);
            $detail = mysqli_fetch_assoc($query_run);
            $query = "SELECT count(*) as count FROM auction_item WHERE endTime < '$time' AND status = 'completed' AND sellerID = '".$_SESSION['tokenID']."'";
            $query_run = mysqli_query($con,$query);
            $detail1 = mysqli_fetch_assoc($query_run);
            $comment1 = "Item Sold";
        }
        else if ($_SESSION['privlg'] == 'buyer') {

            $comment1 = "Items";
            $query = "SELECT count(*) as count FROM auction_item WHERE endTime < '$time' AND status = 'completed' AND winningID = '".$_SESSION['tokenID']."'";
            $query_run = mysqli_query($con,$query);
            $detail1 = mysqli_fetch_assoc($query_run);
            
        }
        else if($_SESSION['privlg'] == 'admin'){
            $comment1 = "Items";
            $query = "SELECT count(*) as count FROM auction_item WHERE endTime < '$time' AND status = 'completed' ";
            $query_run = mysqli_query($con,$query);
            $detail1 = mysqli_fetch_assoc($query_run);
        }
        
    }
    else {
        
        header("Location:includes/../");
    }
?>


                <div class="col-lg-8">
                    <div class="dashboard-widget mb-40">
                        <div class="dashboard-title mb-30">
                            <h5 class="title">My Activity</h5>
                        </div>
                        <div class="row justify-content-center mb-30-none">
                            <div class="col-md-4 col-sm-6">
                                <div class="dashboard-item">
                                    <div class="thumb">
                                        <img src="assets/images/dashboard/01.png" alt="dashboard">
                                    </div>
                                    <div class="content">
                                        <h2 class="title"><span class="counter"><?php echo $detail1['count']; ?></span></h2>
                                        <h6 class="info">Active Bids</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="dashboard-item">
                                    <div class="thumb">
                                        <img src="assets/images/dashboard/02.png" alt="dashboard">
                                    </div>
                                    <div class="content">
                                        <h2 class="title"><span class="counter"><?php echo $detail1['count']; ?></span></h2>
                                        <h6 class="info"><?php echo $comment1; ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="dashboard-item">
                                    <div class="thumb">
                                        <img src="assets/images/dashboard/03.png" alt="dashboard">
                                    </div>
                                    <div class="content">
                                        <h2 class="title"><span class="counter">0</span></h2>
                                        <h6 class="info">Favorites</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-widget">
                        <h5 class="title mb-10">Purchasing</h5>
                        <div class="dashboard-purchasing-tabs">
                            <ul class="nav-tabs nav">
                                <li>
                                    <a href="#current" class="active" data-toggle="tab">Current</a>
                                </li>
                                <li>
                                    <a href="#pending" data-toggle="tab">Pending</a>
                                </li>
                                <li>
                                    <a href="#history" data-toggle="tab">History</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active fade" id="current">
                                    <table class="purchasing-table">
                                        <thead>
                                            <th>Item</th>
                                            <th>Type</th>
                                            <th>Current Bid</th>
                                            <th>starting Bid</th>
                                            <th>Expires</th>
                                            <th>view</th>
                                        </thead>
                                        <tbody>


                                            <?php 
                                               if($_SESSION['privlg'] == 'seller'){
                                                    $query = "SELECT * FROM auction_item WHERE endTime > '$time' AND sellerID = '".$_SESSION['tokenID']."' LIMIT 30;";
                                                    $query_run = mysqli_query($con,$query);
                                                    while($rows = mysqli_fetch_assoc($query_run)){
                                                        $query = "SELECT buyerID,bidAmount FROM auction_history WHERE itemID = '".$rows['itemID']."' ORDER BY bidAmount DESC LIMIT 1;";
                                                        $qr =mysqli_query($con,$query);
                                                        if(mysqli_num_rows($qr) == 1){
                                                            $x = mysqli_fetch_assoc($qr);
                                                            $check = $x['bidAmount'];
                                                        }
                                                        else {
                                                            $check = "N/A";
                                                        }
                                                        $date = explode(" ", $rows['endTime']);
                                                ?>
                                                    <tr>
                                                        
                                                        <td class="sml" data-purchase="item"><?php echo $rows['itemName']; ?></td>
                                                        <td data-purchase="bid price"><?php echo $rows['itemType']; ?></td>
                                                        <td data-purchase="highest bid"><?php echo $check; ?></td>
                                                        <td data-purchase="lowest bid"><?php echo $rows['startingBid']; ?></td>
                                                        <td data-purchase="expires"><?php echo $date[0] ?></td>
                                                        <td><a href="product-details?item=<?php echo $rows['itemID'] ;  ?>"><button>view</button></a></td>
                                                    </tr>
                                                <?php
                                                    }
                                                }
                                                else if($_SESSION['privlg'] == 'buyer'){
                                                   $query = "SELECT X.itemID,X.itemName,X.itemType,Y.bidAmount,X.startingBid,X.endTime FROM auction_item AS X INNER JOIN auction_history as Y ON X.itemID = Y.itemID WHERE Y.buyerID = '".$_SESSION['tokenID']."' and X.winningID = 0 LIMIT 30;";
                                                    $query_run = mysqli_query($con,$query);
                                                    while($rows = mysqli_fetch_assoc($query_run)){
                                                        $query = "SELECT buyerID,bidAmount FROM auction_history WHERE itemID = '".$rows['itemID']."' ORDER BY bidAmount DESC LIMIT 1;";
                                                        $qr =mysqli_query($con,$query);
                                                        if(mysqli_num_rows($qr) == 1){
                                                            $x = mysqli_fetch_assoc($qr);
                                                            $check = $x['bidAmount'];
                                                        }
                                                        else {
                                                            $check = "N/A";
                                                        }
                                                        $date = explode(" ", $rows['endTime']);
                                                ?>
                                                    <tr>
                                                        
                                                        <td class="sml" data-purchase="item"><?php echo $rows['itemName']; ?></td>
                                                        <td data-purchase="bid price"><?php echo $rows['itemType']; ?></td>
                                                        <td data-purchase="highest bid"><?php echo $check; ?></td>
                                                        <td data-purchase="lowest bid"><?php echo $rows['startingBid']; ?></td>
                                                        <td data-purchase="expires"><?php echo $date[0] ?></td>
                                                        <td><a href="product-details?item=<?php echo $rows['itemID'] ;  ?>"><button>view</button></a></td>
                                                    </tr>
                                                <?php
                                                    } 
                                                }
                                            ?>




                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane show fade" id="pending">
                                    <table class="purchasing-table">
                                        <thead>
                                            <th>Item</th>
                                            <th>Type</th>
                                            <th>Current Bid</th>
                                            <th>starting Bid</th>
                                            <th>Expires</th>
                                            <th>report</th>

                                        </thead>
                                        <tbody>
                                            <?php
                                            if($_SESSION['privlg'] == 'seller') { 
                                                    $query = "SELECT * FROM auction_item WHERE endTime < '$time' AND status = '' AND sellerID = '".$_SESSION['tokenID']."' LIMIT 30;";
                                                    $query_run = mysqli_query($con,$query);
                                                    while($rows = mysqli_fetch_assoc($query_run)){
                                                        $query = "SELECT buyerID,bidAmount FROM auction_history WHERE itemID = '".$rows['itemID']."' ORDER BY bidAmount DESC LIMIT 1;";
                                                        $qr =mysqli_query($con,$query);
                                                        if(mysqli_num_rows($qr) == 1){
                                                            $x = mysqli_fetch_assoc($qr);
                                                            $check = $x['bidAmount'];
                                                            $msg = "SOLD";
                                                            $class = "sell-item";
                                                        }
                                                        else {
                                                            $check = "N/A";
                                                            $msg = "Extend";
                                                            $class="extend-time";
                                                        }
                                                        $date = explode(" ", $rows['endTime']);
                                                ?>
                                                    <tr>
                                                        
                                                        <td class="sml" data-purchase="item"><?php echo $rows['itemName']; ?></td>
                                                        <td data-purchase="bid price"><?php echo $rows['itemType']; ?></td>
                                                        <td data-purchase="highest bid"><?php echo $check; ?></td>
                                                        <td data-purchase="lowest bid"><?php echo $rows['startingBid']; ?></td>
                                                        <td data-purchase="expires"><button type="button"  value="<?php echo $rows["itemID"]; ?>" class="<?php echo $class ?> btn-danger"><?php echo $msg; ?></button></td>

                                                    </tr>
                                                <?php
                                                    }
                                                }
                                            else if($_SESSION['privlg'] == 'buyer') {
                                                $query = "SELECT * FROM auction_item WHERE endTime < '$time' AND status = '' AND sellerID = '".$_SESSION['tokenID']."' LIMIT 30;";
                                                    $query_run = mysqli_query($con,$query);
                                                    while($rows = mysqli_fetch_assoc($query_run)){
                                                        $query = "SELECT buyerID,bidAmount FROM auction_history WHERE itemID = '".$rows['itemID']."' ORDER BY bidAmount DESC LIMIT 1;";
                                                        $qr =mysqli_query($con,$query);
                                                        if(mysqli_num_rows($qr) == 1){
                                                            $x = mysqli_fetch_assoc($qr);
                                                            $check = $x['bidAmount'];
                                                            $msg = "SOLD";
                                                            $class = "sell-item";
                                                        }
                                                        else {
                                                            $check = "N/A";
                                                            $msg = "Extend";
                                                            $class="extend-time";
                                                        }
                                                        $date = explode(" ", $rows['endTime']);
                                                ?>
                                                    <tr>
                                                        
                                                        <td class="sml" data-purchase="item"><?php echo $rows['itemName']; ?></td>
                                                        <td data-purchase="bid price"><?php echo $rows['itemType']; ?></td>
                                                        <td data-purchase="highest bid"><?php echo $check; ?></td>
                                                        <td data-purchase="lowest bid"><?php echo $rows['startingBid']; ?></td>
                                                        <td data-purchase="expires">pending</td>
                                                        <td data-purchase="expires"><button type="button"  value="<?php echo $rows["sellerID"]; ?>" class="btn btn-danger report">Report</button></td>
                                                    </tr>
                                                <?php
                                                    }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane show fade" id="history">
                                    <table class="purchasing-table">
                                        <thead>
                                            <th>Item</th>
                                            <th>Bid Price</th>
                                            <th>Highest Bid</th>
                                            <th>Last Date</th>
                                            <th>Detail</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if($_SESSION['privlg'] == 'seller') {


                                                    $query = "SELECT * FROM auction_item WHERE status='completed' AND sellerID = '".$_SESSION['tokenID']."' LIMIT 30;";
                                                    $query_run = mysqli_query($con,$query);
                                                    while($rows = mysqli_fetch_assoc($query_run)){
                                                        $query = "SELECT buyerID,bidAmount FROM auction_history WHERE itemID = '".$rows['itemID']."' ORDER BY bidAmount DESC LIMIT 1;";
                                                        $qr =mysqli_query($con,$query);
                                                        if(mysqli_num_rows($qr) == 1){
                                                            $x = mysqli_fetch_assoc($qr);
                                                            $check = $x['bidAmount'];
                                                        }
                                                        else {
                                                            $check = "N/A";
                                                        }
                                                        $date = explode(" ", $rows['endTime']);
                                                ?>
                                                    <tr>
                                                        
                                                        <td class="sml" data-purchase="item"><?php echo $rows['itemName']; ?></td>
                                                        <td data-purchase="bid price"><?php echo $rows['itemType']; ?></td>
                                                        <td data-purchase="highest bid"><?php echo $check; ?></td>
                                                        
                                                        <td data-purchase="expires"><?php echo $date[0] ?></td>
                                                        <td data-purchase="lowest bid"><button style="margin-bottom:3px" type="button"  value="<?php echo $rows["winningID"]; ?>" class="btn btn-danger detail">detail</button><button type="button"  value="<?php echo $rows["winningID"]; ?>" class="btn btn-danger report">Report</button></td>
                                                    </tr>
                                                <?php
                                                    }
                                                }
                                                else if($_SESSION['privlg'] == 'buyer') {
                                                    $query = "SELECT * FROM auction_item WHERE status='completed' AND winningID = '".$_SESSION['tokenID']."' LIMIT 30;";
                                                    $query_run = mysqli_query($con,$query);
                                                    while($rows = mysqli_fetch_assoc($query_run)){
                                                        $query = "SELECT buyerID,bidAmount FROM auction_history WHERE itemID = '".$rows['itemID']."' ORDER BY bidAmount DESC LIMIT 1;";
                                                        $qr =mysqli_query($con,$query);
                                                        if(mysqli_num_rows($qr) == 1){
                                                            $x = mysqli_fetch_assoc($qr);
                                                            $check = $x['bidAmount'];
                                                        }
                                                        else {
                                                            $check = "N/A";
                                                        }
                                                        $date = explode(" ", $rows['endTime']);
                                                ?>
                                                    <tr>
                                                        
                                                        <td class="sml" data-purchase="item"><?php echo $rows['itemName']; ?></td>
                                                        <td data-purchase="bid price"><?php echo $rows['itemType']; ?></td>
                                                        <td data-purchase="highest bid"><?php echo $check; ?></td>
                                                        
                                                        <td data-purchase="expires"><?php echo $date[0] ?></td>
                                                        <td data-purchase="lowest bid"><button type="button"  value="<?php echo $rows["sellerID"]; ?>" class="btn btn-danger detail">detail</button></td>
                                                    </tr>
                                                <?php
                                                    }

                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Dashboard Section Ends Here =============-->


    <?php include "footer.php"; ?>


    <div class="modal" id="myReport">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal" style="width:auto;">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
              <form id="" method="post" action="includes/report.php">
                <div class="form-group mb-30">
                    <label for="login-email" style="color:black;">Reson to report</label>
                    <input id="reportPet" type="hidden" name="item" required>
                    <textarea  type="text" name="reason" placeholder="Reason" pattern="[0-9]+" style="margin-bottom:20px" required></textarea><br/>
                    <button type="submit" class="btn btn-success">Report</button>
                </div>
                  
              </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" style="width:150px;height:45px" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myExtend">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal" style="width:auto;">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
              <form id="extendFrom" method="post" >
                <div class="form-group mb-30">
                    <label for="login-email" style="color:black;">Number of Days To Extend</label>
                    <input id="productID" type="hidden" name="item" required>
                    <input  type="text" name="days" placeholder="(Days)" pattern="[0-9]+" style="margin-bottom:20px" required><br/>
                    <button type="submit" class="btn btn-success">Extend</button>
                </div>
                  
              </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" style="width:150px;height:45px" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

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

        let itemID;
        $("#extendFrom").on('submit', function () {
            $("#productID").val(itemID);
           $("#extendFrom").attr("action","includes/dashboard/extend-time.php");
        });
        $(".extend-time").on('click', function () {
            itemID = $(this).val();
            $('#myExtend').modal('show');  
        });



        $(".sell-item").on('click', function () {
            itemID = $(this).val();
            $(".modal-header").hide();
                $(".modal-body img").show();
                $(".modal-body span").show();
                $(".modal-body p").empty(); 
                    
                $('#myError').modal({backdrop: 'static',keyboard: true,show: true});
                $.post("includes/dashboard/sell-item.php",{item:itemID},
                function(data) {
                    $(".modal-body img").hide();
                    $(".modal-body span").hide();
                    $(".modal-body p").html(data);
                    $(".modal-header").show();
                });   
        });

        $(".detail").on('click', function () {
            let item = $(this).val();
            $('#myError .modal-body p').empty();
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


        $(".report").on('click', function () {
            let item = $(this).val();
            $("#reportPet").attr("value",item)
            $('#myError .modal-body p').empty();
            $('#myReport').modal('show');  
        });

        $( document ).ready(function() {
            <?php 
                if(isset($_SESSION['response'])){
            ?>
                    $('#myError .modal-body').empty().append("<?php echo $_SESSION['response']; ?>");  
                    $('#myError').modal('show');
            <?php
                    unset($_SESSION['response']);
                }
            ?>
        });
        
            



    </script>
    <script type="assets/js/set/dashboard.js"></script>
</body>

</html>