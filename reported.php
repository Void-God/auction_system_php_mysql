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
                            <h5 class="title">Reported</h5>
                        </div>
                        <div class="row justify-content-center mb-30-none">
                            
                            <table class="purchasing-table">
                                        <thead>
                                            <th>R. ID</th>
                                            <th>Red. ID</th>
                                            <th>reson</th>
                                            <th>bock</th>
                                            <th>reject</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                include "includes/dbConnection.php";
                                                $query = "SELECT * FROM block where adminstatus = 0 LIMIT 10;";
                                                $query_run = mysqli_query($con,$query);
                                                while($rows = mysqli_fetch_assoc($query_run)){
                                            ?><tr>
                                                <td class="sml" data-purchase="item"><?php echo $rows['senderID']; ?></td>
                                                <td data-purchase="bid price"><?php echo $rows['reportedID']; ?></td>
                                                <td data-purchase="lowest bid"><?php echo $rows['reportReason']; ?></td>
                                                <td style="margin-left:5px" data-purchase="highest bid"><button class="yetblock" value="<?php echo $rows['blockID']; ?>" >block</button></td>
                                                <td data-purchase="highest bid"><button class="yetreject" value="<?php echo $rows['blockID']; ?>" >reject</button></td>
                                                <tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                            </table>
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

        $(".yetblock").on('click', function () {
            let item = $(this).val();
            $('#myError .modal-body p').empty();
            $(".modal-header").hide();
                $(".modal-body img").show();
                $(".modal-body span").show();
                $(".modal-body p").empty(); 
                    
                $('#myError').modal({backdrop: 'static',keyboard: true,show: true});
                $.post("includes/block.php",{item:item},
                function(data) {
                    $(".modal-body img").hide();
                    $(".modal-body span").hide();
                    $(".modal-body p").html(data);
                    $(".modal-header").show();
                });   
        });
        $(".yetreject").on('click', function () {
            let item = $(this).val();
            $('#myError .modal-body p').empty();
            $(".modal-header").hide();
                $(".modal-body img").show();
                $(".modal-body span").show();
                $(".modal-body p").empty(); 
                    
                $('#myError').modal({backdrop: 'static',keyboard: true,show: true});
                $.post("includes/reject.php",{item:item},
                function(data) {
                    $(".modal-body img").hide();
                    $(".modal-body span").hide();
                    $(".modal-body p").html(data);
                    $(".modal-header").show();
                });   
        });
            



    </script>
    <script type="assets/js/set/dashboard.js"></script>
</body>

</html>