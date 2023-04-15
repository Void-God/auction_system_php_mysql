let forgotpassword = 0;
$("#login-form").on('submit', function () {
	let user = $("#login-email").val();
	if(forgotpassword == 0){
		let password = $("#login-pass").val();
		if(user == '' || password == ''){
			$("#login-email").attr("required","true");
			$("#login-pass").attr("required","true");
			return false;
			
		}
		else {
			$("#login-form").attr("action","includes/signin.php");
		}
	}
	else if(forgotpassword == 1){
		if(user == ''){
			$("#login-email").attr("required","true");
		} 
		else {
			$("#loadimage img").show();
			$("#loginbutton").attr("disabled","true");
			$.post("includes/sendOTP.php",{user:user},
          		function(data) {            	
            	$('#loadimage span').html(data); 
            	$("#loadimage img").hide();  
          		$("#loginbutton").removeAttr("disabled");           	   
          	});
		}	
		return false;
	}
	else if(forgotpassword == 2){
			let otp = $("#login-pass").val();
			$('#loadimage span').empty();
			$("#loadimage img").show();
			$("#loginbutton").attr("disabled","true");
			$.post("includes/confirmOTP.php",{otp:otp},
          		function(data) {            	
            	$('#loadimage span').html(data); 
            	$("#loadimage img").hide();  
          		$("#loginbutton").removeAttr("disabled");           	   
          	});
		return false;
	}
	else if(forgotpassword == 3){
		let pass = $("#forgotconfirm input").val();
		let cpass = $("#login-pass").val();
		$("#loginbutton").attr("disabled","true"); 
		if(pass == cpass){
			$.post("includes/changePassword.php",{pass:pass},
          		function(data) {            	
            	$('#loadimage span').html(data); 
            	$("#loadimage img").hide();            	   
          	});
		}
		else {
			$('#loadimage span').html("<p style='color:red'>Password and Confirm Password did not matched!</p>");
		}
		$("#loginbutton").removeAttr("disabled"); 
		return false;

	}	
})
$("#forgotpassword").on('click', function () {
		if(forgotpassword > 0){
			window.location = "sign-in";
		}
		$("#login-pass").val('');	
		$("#login-pass").parent().hide();
		$("#forgotpassword").empty().append("Sign In");
		$("#loginbutton").empty().append("Send OTP");
		forgotpassword = 1;
		return false;

})


$("#checkbtn").on('click', function () {
		alert(forgotpassword);
		return false;
})