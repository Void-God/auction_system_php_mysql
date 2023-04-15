<?php 
	session_start();
	include "dbConnection.php";
	$reason = mysqli_real_escape_string($con,$_POST['reason']);
	$id = $_POST['item'];


	$query = "INSERT INTO block(senderID,reportedID,reportReason,reportStatus) VALUES( ".$_SESSION['tokenID'].",$id,'$reason',0)";
		// echo $query;
	if(mysqli_query($con,$query)){
		$_SESSION['response'] =  "Reported";
		// echo "yes";
	}
	else {
		$_SESSION['response'] =  "Error!";
		// echo "No";
	}
	header("Location:../dashboard");
?>