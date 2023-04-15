<?php 
	session_start();
	if(isset($_SESSION['userID'])){ //check if user is login
		if(isset($_POST['amount']) && ctype_digit($_POST['amount'])){
			require "../dbConnection.php";
			$amount = (int) $_POST['amount'];
			$product = mysqli_real_escape_string($con,$_POST['product']);
			date_default_timezone_set("Asia/Calcutta");
			$time = date('Y-m-d H:i:s');

			$query = "SELECT startingBid,incrementAmount,sellerID FROM auction_item WHERE itemID = '$product' AND endTime > '$time';";
			$query_run = mysqli_query($con,$query);
			if(mysqli_num_rows($query_run) == 1){
				$item = mysqli_fetch_assoc($query_run);

				if($item['sellerID'] != $_SESSION['tokenID']){

					$query = "SELECT bidAmount as max FROM auction_history WHERE itemID = '$product' ORDER BY historyID DESC LIMIT 1;";
					$query_run = mysqli_query($con,$query);
					if(mysqli_num_rows($query_run) == 1){

						$d = mysqli_fetch_assoc($query_run);
						$maxAmount = $d['max'] + $item['incrementAmount'];
					}
					else {
						
						$maxAmount = $item['startingBid'] + $item['incrementAmount'];
					}
					if($amount >= $maxAmount){
						$query = "INSERT INTO auction_history(itemID,bidAmount,bidTime,buyerID) VALUES('$product','$amount','$time','".$_SESSION['tokenID']."')";
						if(mysqli_query($con,$query)){
							echo "Bid Submitted";
							echo "<script>$('#bidPart').html('$amount')</script>";
						}
						else {
							echo "Problem Occured!";
						}
					}
					else {
						echo "Amount is not sufficient!";
					}


				}
				else {
					echo "Not permitted to bid on you own item...";
				}

				
			}
			else {
				echo "Bidding Time Is Over!";
			}

		}
		else { //didn't find amount or wrong input
			echo "Please Fill Amount Correctly ";
		}
	}
	else { //not login
		echo "Please Sign In For Bidding...";
	}
	//ctype_digit
?>