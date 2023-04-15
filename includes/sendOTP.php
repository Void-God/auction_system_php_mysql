<?php 
	session_start();
	if(isset($_POST['user'])){
		require "dbConnection.php";

		$user = mysqli_real_escape_string($con,$_POST['user']);
		$query = "SELECT * FROM users WHERE mailID = '$user'";
		$query_run = mysqli_query($con,$query);
		if(mysqli_num_rows($query_run) == 1){
			$_SESSION['forgotMail'] = $user;
			$_SESSION['forgotOTP'] = rand(1000,9999);
			echo "OTP SENT! ".$_SESSION['forgotOTP'];

?>
			<script type="text/javascript">
				$("#login-pass").attr("required","true");
          		$("#login-pass").attr("placeholder","OTP");
          		$(".fa-lock").attr("class","fa fa-key");
          		$("#loginbutton").empty().append("Next");         		
          		$("#login-pass").parent().show();
          		$("#login-email").attr("disabled","true");
          		forgotpassword = 2; 
			</script>
<?php
		}
		else {
			echo "<p style='color:red;'>User Does Not Exist!</p>";	

		}
		
	}
	else {
		echo "<p style='color:red;'>Error!</p>";
	}


?>