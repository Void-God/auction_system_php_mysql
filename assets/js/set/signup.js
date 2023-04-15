let signinvar = 1;
  

$("#signUp").on('submit', function () {
  if(signinvar == 1){
  	pass = $("#signup-p").val();
  	conpass = $("#login-pass").val();
  	if(pass == conpass){

  		$("#signup-error").empty();

  		$(".item-1").css("display","none");
      $("#signup-name").attr("required","true");
	  	$("#signup-type").attr("required","true");
	  	$("#signup-address").attr("required","true");
	  	$(".item-2").css("display","block"); 

  		signinvar = 2;		
  	}
  	else{
  		$("#signup-error").html("<span style='color:red;'>password and confirm password are not same</span>");
  	}
  	return false;
  }
  else if(signinvar == 2) {
  	$(".item-2").css("display","none");
    $("#signup-adhar").attr("required","true");    
  	$("#signup-image").attr("required","true");
  	$("#signup-confirm").attr("required","true");
    $("#signup-phone").attr("required","true");
  	$(".item-3").css("display","block");
  	signinvar = 3;
  	return false;
  }
  else if(signinvar == 3){
  	$('#signUp').attr("action", "includes/signup.php");
  }  
});