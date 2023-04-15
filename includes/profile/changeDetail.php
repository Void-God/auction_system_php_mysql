<?php 
	error_reporting(0);
	session_start();
	include "../dbConnection.php";
	$address = mysqli_real_escape_string($con,$_POST['address']);
    $name = mysqli_real_escape_string($con,$_POST['Name']);
    $pass = md5($_POST['password']);
    if(empty($address) || empty($name)){
    	header("Location:../../");
    	exit();
    }
    else {
    	$query = "SELECT priv FROM users WHERE mailID = '".$_SESSION['userID']."' and password = '".$pass."' ;";
    	$query_run = mysqli_query($con,$query);
    	if(mysqli_num_rows($query_run) == 1){
    		$query = "UPDATE users SET address = '$address', userName = '$name' WHERE mailID = '".$_SESSION['userID']."'";
    		if(mysqli_query($con,$query)){
    			$_SESSION['response'] = "UPDATED YOUR PERSONAL DETAIL!";
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