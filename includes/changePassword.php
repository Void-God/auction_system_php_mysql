<?php
	if(isset($_POST['pass'])){
		session_start();
		require "dbConnection.php";
		$query = "UPDATE users SET password = '".md5($_POST['pass'])."' WHERE mailID = '".$_SESSION['forgotMail']."'";
		if(mysqli_query($con,$query)){
			$_SESSION['response'] = "Password Changed";
			echo "<script>window.location = 'sign-in';</script>";

		}		else {
			echo "<span style='color:red;'>Error!</span>";
		}
	}
	else {
		echo "<span style='color:red;'>Error!</span>";
	}

?>