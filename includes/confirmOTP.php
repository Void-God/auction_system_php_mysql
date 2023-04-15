<?php 
	sleep(3);
	session_start();
	if(isset($_POST['otp']) && isset($_SESSION['forgotOTP'])){
		if($_POST['otp'] == $_SESSION['forgotOTP']){
?>
			<script type="text/javascript">
				$("#forgotconfirm").show();
				$("#forgotconfirm input").attr("placeholder","New Password");
				$("#login-pass").attr("placeholder","Confirm Password");
				$("#login-pass").val('');
				$("#loginbutton").empty().append("Confirm");
				forgotpassword = 3; 


			</script>
<?php
		}
		else {
			echo "<p style='color:red;'>Wrong OTP!</p>";
		}
	}
	else {
		echo "<p style='color:red;'>Problem Occured! Please Try Again...</p>";
	}
?>