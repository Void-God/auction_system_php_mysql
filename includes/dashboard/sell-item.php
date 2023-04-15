<?php
	session_start();
	if(isset($_SESSION['privlg']) && $_SESSION['privlg'] == 'seller'){
		require "../dbConnection.php";
		$item = mysqli_real_escape_string($con,$_POST['item']);
		$query = "SELECT * FROM auction_item WHERE itemID = '$item' AND sellerID = '".$_SESSION['tokenID']."'";
		$query_run = mysqli_query($con, $query);
		if(mysqli_num_rows($query_run) == 1){
			$query = "SELECT buyerID FROM auction_history WHERE itemID = '$item' ORDER BY historyID DESC LIMIT 1";
            $query_run = mysqli_query($con,$query);
            $amount = mysqli_fetch_assoc($query_run);
			$query = "UPDATE auction_item SET status = 'completed',winningID ='".$amount['buyerID']."' WHERE itemID = '$item'";
			if(mysqli_query($con,$query)){
				$_SESSION['response'] =  "Item Sold Please Check History For information";
				echo "<script>window.location = 'dashboard'</script>";
			}
			else {
				echo  "Problem Occured! Please Try Again.";

			}
		}
		else {
			echo  "Problem Occured! Please Try Again.";
		}
	}

?>