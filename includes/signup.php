<?php
	if(isset($_POST['submit'])){  //check if submit button is clicked or not
		//variables in use
		session_start();
		require "dbConnection.php";
		$mail =  mysqli_real_escape_string($con,$_POST['mail']);

            $check_query = "SELECT * FROM users WHERE mailID = '$mail';";
            $check_query_run = mysqli_query($con,$check_query);

            if(mysqli_num_rows($check_query_run) == 0 ){

      		$password = md5((mysqli_real_escape_string($con,$_POST['password'])));
      		$adhar = mysqli_real_escape_string($con,$_POST['adhar']);
      		$type = mysqli_real_escape_string($con,$_POST['type']);
      		$address = mysqli_real_escape_string($con,$_POST['address']);
      		$name = mysqli_real_escape_string($con,$_POST['Name']);
                  $mobile  = mysqli_real_escape_string($con,$_POST['mobile']);
      		

      		$fileName = $_FILES['file']['name'];
            	$fileSize = $_FILES['file']['size'];
            	$fileExplode = explode('.', $fileName);
            	$fileExt = strtolower(end($fileExplode));

                  $fileloc = uniqid('',true).".".$fileExt;
            	$filedes = "../images/".$fileloc;
            	$allowed = array('jpg','jpeg','png'); //allowed extensions
            	if(in_array($fileExt, $allowed)) {  //if extension is allowed
            		if($fileSize < 1048576){       // image max size is 1mb{
            			if($_FILES['file']['error'] === 0){    //check if file have any error
            				if(move_uploaded_file($_FILES['file']['tmp_name'] , $filedes)) {       //upload the photo
            					$query = "INSERT INTO users(mailID,userName,password,priv,img,mobile,adhar_number,address) VALUES('$mail','$name','$password','$type','$fileloc','$mobile','$adhar','$address');";
            					if(mysqli_query($con,$query)){  //insert value in database
            						$_SESSION['response'] = "Sign Up Successful!";
            					}
            					else { // remove uploaded file
            						$_SESSION['response'] = "Problem Occured! Please Try Again.";
            					} 
            				}
            				else {  //file not uploaded
            					$_SESSION['response'] = "Problem Occured! Please Try Again.";

            				}
            			
            			}
            			else {   //if file have errors
            				$_SESSION['response'] = "Problem Occured! Please Try Again.";
            			}

            		}
            		else {   //if images size is greater than 1Mb
            			$_SESSION['response'] = "Image Size Exceed 1Mb limit";
            		}
            	}
            	else{  //if extension is not allowed 
            		$_SESSION['response'] = "Only jpg,jpef and png files are allowed";
            	} 
            }
            else {
                  $_SESSION['response'] = "User already exist";
            }



	}
	else {       //submit button is not clicked
		$_SESSION['response'] = "problem";	
	}
	header("Location:../sign-up");
		
?>