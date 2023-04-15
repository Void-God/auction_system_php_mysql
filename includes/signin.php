<?php 
	if(isset($_POST['submit'])){  //login button is clicked
		session_start();
		require "dbConnection.php";

		$user = mysqli_real_escape_string($con,$_POST['user']);
		$password = md5($_POST['password']);

		$query = "SELECT priv,userID FROM users WHERE mailID = '$user' AND password = '$password'";
		$query_run = mysqli_query($con,$query);
		if(mysqli_num_rows($query_run) == 1){
			$detail = mysqli_fetch_assoc($query_run);
			$e = "SELECT * FROM block WHERE reportedID = '".$detail['userID']."' and reportstatus = 1";
			$er = mysqli_query($con,$e);
			if(mysqli_num_rows($er) > 0 ){
				$_SESSION['response'] = "user bocked!";
				header("Location:../sign-in");

			}
			else {
				
				$_SESSION['userID'] = $user;
				$_SESSION['tokenID'] = $detail['userID'];
				$_SESSION['privlg'] = $detail['priv'];
				header("Location:../dashboard");
			}

			
		}
		else {   //user do not exist
			$_SESSION['response'] = "Wrong Input!";
			header("Location:../sign-in");
		}

	}
	else {
		$_SESSION['response'] = "Problem Occured!";
		header("Location:../sign-in");
	}


?>