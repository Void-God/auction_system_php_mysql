<?php 
    if(!isset($_SESSION['privlg'])){
        header("Location:error.html");
    }
    else {
        require "includes/dbConnection.php";
       $query = "SELECT * FROM users WHERE mailID = '".$_SESSION['userID']."';";
        $query_run = mysqli_query($con,$query);
        $detail = mysqli_fetch_assoc($query_run); 
    }
    
?>




                <div class="col-sm-10 col-md-7 col-lg-4">
                    <div class="dashboard-widget mb-30 mb-lg-0 sticky-menu">
                        <div class="user">
                            <div class="thumb-area">
                                <div class="thumb">
                                    <img src="<?php echo "images/".$detail['img']; ?>" alt="user">
                                </div>
                                <label for="profile-pic" class="profile-pic-edit"><i class="flaticon-pencil"></i></label>
                                <form id="changeImage" method="post">
                                    <input type="file" id="profile-pic" class="d-none">                                   
                                </form>

                            </div>
                            <div class="content">
                                <h5 class="title"><a href="#0"><?php echo $detail['userName'] ?></a></h5>
                                <!-- <span class="username"><a href="http://pixner.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="771d181f1937101a161e1b5914181a">[email&#160;protected]</a></span> -->
                            </div>
                        </div>
                        <ul class="dashboard-menu">
                            <li>
                                <a href="dashboard" class="active"><i class="flaticon-dashboard"></i>Dashboard</a>
                            </li>
                            <li>
                                <a href="profile"><i class="flaticon-settings"></i>Personal Profile </a>
                            </li>
                            <!-- <li>
                                <a href="winning-bids"><i class="flaticon-best-seller"></i>Winning Bids</a>
                            </li> -->
                            <?php 
                                if(isset($_SESSION['privlg']) && $_SESSION['privlg'] == 'seller'){
                            ?>
                                <li>
                                    <a href="bid-item"><i class="flaticon-auction"></i>Bid Item</a>
                                </li>
                                
                                <!-- <li>
                                    <a href="notifications"><i class="flaticon-alarm"></i>My Alerts</a>
                                </li>
                                <li>
                                    <a href="my-favorites"><i class="flaticon-star"></i>My Favorites</a>
                                </li>
                                <li>
                                    <a href="referral"><i class="flaticon-shake-hand"></i>Referrals</a>
                                </li> -->
                            <?php
                                }
                                if(isset($_SESSION['privlg']) && $_SESSION['privlg'] == 'admin'){
                            ?>
                                <li>
                                    <a href="reported"><i class="fa fa-flag" aria-hidden="true"></i>Check Reported</a>
                                </li>
                                <li>
                                    <!-- <a href="blocked"><i class="fa fa-th" aria-hidden="true"></i>Blocked</a> -->
                                </li>
                            <?php
                                }
                            ?>
                                
                        </ul>
                    </div>
                </div>