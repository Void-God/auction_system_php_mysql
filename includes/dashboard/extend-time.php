<?php 
	session_start();
	if(isset($_SESSION['privlg']) && $_SESSION['privlg'] == 'seller'){
		$days = $_POST['days'];
		$item = $_POST['item'];
		require "../dbConnection.php";
		if(ctype_digit($days) && ctype_digit($item)){
			$query = "SELECT * FROM auction_item WHERE itemID = '$item' AND sellerID = '".$_SESSION['tokenID']."'";
			$query_run = mysqli_query($con, $query);
			if(mysqli_num_rows($query_run) == 1){
				date_default_timezone_set("Asia/Calcutta");
                $startTime = date('Y-m-d H:i:s');
                $tempTime = strtotime($startTime);
                $endTime = date("Y-m-d H:i:s", strtotime("+$days day", $tempTime));
                $query = "UPDATE auction_item SET endTime = '$endTime' WHERE itemID = '$item'";
                if(mysqli_query($con,$query)){
                	$_SESSION['response'] =  "Date Extended Successfully!";
                }
                else {
                	$_SESSION['response'] =  "Problem Occured! Please Try Again.";
                }
			}
			else {
				$_SESSION['response'] =  "Problem Occured! Please Try Again.";
			}
		}
		else {    //not iteger
			$_SESSION['response'] =  "Problem Occured! Please Try Again.";
		}
	}
	header("Location:../../dashboard");
		
		


?>