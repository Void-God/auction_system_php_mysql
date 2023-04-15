<?php 
	error_reporting(0);
	session_start();
	include "../dbConnection.php";
	$pwd = md5($_POST['password']);
    $mobile = $_POST['mobile'];

    if(empty($pwd) || empty($mobile)){
    	header("Location:../../");
    	exit();
    }
    else {

			$query = "SELECT priv FROM users WHERE mailID = '".$_SESSION['userID']."' and password = '".$pwd."' ;";
	    	$query_run = mysqli_query($con,$query);
	    	if(mysqli_num_rows($query_run) == 1){
	    		$npwd = md5($npwd);
	    		$query = "UPDATE users SET mobile = '$mobile' WHERE mailID = '".$_SESSION['userID']."'";
	    		if(mysqli_query($con,$query)){
	    			$_SESSION['response'] = "UPDATED YOUR CONTACT INFORMATION!";
	    		}
	    		else {
	    			$_SESSION['response'] = "PROBLEM OCCURED!";
	    		}
	    	}
	    	else {
	    		$_SESSION["response"] = "WRONG PASSWORD";
	    	}
    	header("Location:../../profile");

    }

?>