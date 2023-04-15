<?php 
	$d = $_POST['item'];
	require "../dbConnection.php";
    $query = "SELECT * FROM users WHERE userID = '$d'";
    $query_run = mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($query_run)
?>
	<img src="images/<?php echo $row['img']?>" style="height:100px;width:100px;border-radius:50%;margin:0 auto;display:block">
	<span style="text-align:center;display:block">Name : <?php echo $row['userName']?></span>
	<span style="text-align:center;display:block">Contect Number : <?php echo $row['mobile']  ?></span>
<?php
?>