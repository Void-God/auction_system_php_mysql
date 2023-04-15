    <!--============= Header Section Starts Here =============-->
    <header>
        <div class="header-top">
            <div class="container">
                <div class="header-top-wrapper">
                    <ul class="customer-support">

                        <li>
                            <a href="#0" class="mr-3"><i class="fas fa-phone-alt"></i><span class="ml-2 d-none d-sm-inline-block">Customer Support</span></a>
                        </li>

                    </ul>
                    <ul class="cart-button-area">
                        <li>
                            <a href="#0" class="cart-button"><i class="flaticon-shopping-basket"></i><span class="amount">08</span></a>
                        </li>                        
                        <li>
                            <?php 
                                if(isset($_SESSION['privlg'])){
                            ?>
                                <a href="log-out" class="user-button"><i class="fas fa-power-off"></i></a>
                            <?php
                                }
                                else {
                            ?>
                                <a href="sign-in" class="user-button"><i class="flaticon-user"></i></a>
                            <?php  
                                }
                            ?>
                            
                        </li>                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="index">
                            <img src="assets/images/logo/logo.png" style="height:100px;width:100px" alt="logo">
                        </a>
                    </div>
                    <ul class="menu ml-auto">
                        <li>
                            <a href="images/../">Home</a>
                        </li>
                        <li>
                            <a href="product.html">Auction</a>
                        </li>
                        <li>
                            <a href="contact">Contact</a>
                        </li>
                        <li>
                            <a href="#0">More</a>
                            <ul class="submenu">
                                <!-- <li>
                                    <a href="#0">Product</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="product.html">Product Page 1</a>
                                        </li>
                                        <li>
                                            <a href="product-2.html">Product Page 2</a>
                                        </li>
                                        <li>
                                            <a href="product-details.html">Product Details</a>
                                        </li>
                                    </ul>
                                </li> -->
                                <li>
                                    <a href="#0">Dashboard</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="dashboard">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="profile">Personal Profile</a>
                                        </li>
                                        <li>
                                            <a href="my-bid">My Bids</a>
                                        </li>
                                        <li>
                                            <a href="winning-bids">Winning Bids</a>
                                        </li>
                                        <li>
                                            <a href="notifications">My Alert</a>
                                        </li>
                                        <li>
                                            <a href="my-favorites">My Favorites</a>
                                        </li>
                                        <li>
                                            <a href="referral">Referrals</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="about.html">About Us</a>
                                </li>
                                <li>
                                    <a href="faqs.html">Faqs</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <form class="search-form">
                        <input type="text" placeholder="Search for brand, model....">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <div class="search-bar d-md-none">
                        <a href="#0"><i class="fas fa-search"></i></a>
                    </div>
                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--============= Header Section Ends Here =============-->