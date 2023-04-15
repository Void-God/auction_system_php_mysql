<?php 
	error_reporting(0);
	session_start();
	include "../dbConnection.php";
	$pwd = md5($_POST['password']);
    $npwd = $_POST['newpassword'];
    $cpwd = $_POST['cfmpassword'];
    if(empty($pwd) || empty($npwd)){
    	header("Location:../../");
    	exit();
    }
    else {
    	if($npwd == $cpwd){
			$query = "SELECT priv FROM users WHERE mailID = '".$_SESSION['userID']."' and password = '".$pwd."' ;";
	    	$query_run = mysqli_query($con,$query);
	    	if(mysqli_num_rows($query_run) == 1){
	    		$npwd = md5($npwd);
	    		$query = "UPDATE users SET password = '$npwd' WHERE mailID = '".$_SESSION['userID']."'";
	    		if(mysqli_query($con,$query)){
	    			$_SESSION['response'] = "UPDATED YOUR PASSWORD!";
	    		}
	    		else {
	    			$_SESSION['response'] = "PROBLEM OCCURED!";
	    		}
	    	}
	    	else {
	    		$_SESSION["response"] = "WRONG PASSWORD";
	    	}
    	}
    	else {
    		$_SESSION['response'] = "New Password and Confirm Password Do not match";

    	}
    	header("Location:../../profile");

    }

?>