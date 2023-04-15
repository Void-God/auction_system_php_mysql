<?php 
	session_start();
	if($_SESSION['privlg'] == 'admin'){
		include "dbConnection.php";
		$id = $_POST['item'];
		$query = "select * from block WHERE blockID = $id";
		$query_run = mysqli_query($con,$query);

		$row = mysqli_fetch_assoc($query_run);
		$query = "UPDATE block SET reportstatus = 1 , adminstatus= 1 WHERE blockID = $id or reportedID = ".$row['reportedID'];
		if(mysqli_query($con,$query)){
			echo "User Bocked";
		}
		else {
			echo "Error!";
		}

	}
	else {
		echo "Error!";
	}
	

?>