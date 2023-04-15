<?php
      session_start();
      error_reporting(0);
	if(isset($_SESSION['privlg']) && $_POST['submit']){  //check if submit button is clicked or not
		//variables in use
		
		require "../dbConnection.php";      		
      		$itemName = mysqli_real_escape_string($con,$_POST['itemName']);
      		$itemType = mysqli_real_escape_string($con,$_POST['itemType']);
      		$itemDescription = mysqli_real_escape_string($con,$_POST['itemDescription']);
      		$itemAmount = mysqli_real_escape_string($con,$_POST['itemAmount']);
                  $itemIncrement  = mysqli_real_escape_string($con,$_POST['itemIncrement']);
      		$itemTime  = mysqli_real_escape_string($con,$_POST['itemTime']);

      		$fileName = $_FILES['file']['name'];
            	$fileSize = $_FILES['file']['size'];
            	$fileExplode = explode('.', $fileName);
            	$fileExt = strtolower(end($fileExplode));
                  if(ctype_digit($itemAmount) && ctype_digit($itemTime) && ctype_digit($itemIncrement)){
                        date_default_timezone_set("Asia/Calcutta");
                        $startTime = date('Y-m-d H:i:s');
                        $tempTime = strtotime($startTime);
                        $endTime = date("Y-m-d H:i:s", strtotime("+$itemTime day", $tempTime));
                  }
                  else {
                        header("Location:../../");
                        exit();
                  }
                  $fileloc = uniqid('',true).".".$fileExt;
            	$filedes = "../../assets/images/auction/".$itemType."/".$fileloc;
            	$allowed = array('jpg','jpeg','png'); //allowed extensions
            	if(in_array($fileExt, $allowed)) {  //if extension is allowed
            		if($fileSize < 1048576){       // image max size is 1mb{
            			if($_FILES['file']['error'] === 0){    //check if file have any error
            				if(move_uploaded_file($_FILES['file']['tmp_name'] , $filedes)) {       //upload the photo
            					$query = "INSERT INTO auction_item(itemName,itemType,startTime,endTime,img,startingBid,incrementAmount,description,sellerID) VALUES('$itemName','$itemType','$startTime','$endTime','$fileloc','$itemAmount','$itemIncrement','$itemDescription','".$_SESSION['tokenID']."')";
            					if(mysqli_query($con,$query)){  //insert value in database
            						$_SESSION['response'] = "Item Added Successfully!";
            					}
            					else { // remove uploaded file
                                                unlink($filedes);
            						$_SESSION['response'] =  "Problem Occured! Please Try Again.";
            					} 
            				}
            				else {  //file not uploaded
            					$_SESSION['response'] =  "Problem Occured! Please Try Again.";

            				}
            			
            			}
            			else {   //if file have errors
            				$_SESSION['response'] =  "Problem Occured! Please Try Again.";
            			}

            		}
            		else {   //if images size is greater than 1Mb
            			$_SESSION['response'] = "Image Size Exceed 1Mb limit";
            		}
            	}
            	else{  //if extension is not allowed 
            		$_SESSION['response'] =  "Only jpg,jpef and png files are allowed";
            	} 
            

	}
	else {       //submit button is not clicked
		$_SESSION['response'] =  "problem";	
	}
	header("Location:../../bid-item");
		
?>