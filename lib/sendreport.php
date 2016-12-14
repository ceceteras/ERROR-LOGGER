<?php
session_start();
include ('../db.php');

if(!isset($_SESSION['STAFF'])){
	session_destroy();
	header('location: index.html');	
}else{
sleep(3);


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$error = $_POST['error'];	
	$details = $_POST['details'];
	$sol =$_POST['solution'];
    $id = $_SESSION['STAFF'];
	$dateposted = date('Y-m-d');
	$status = $_POST['status'];

	if (empty($solution)){

		$solution = "NONE";
	}
	
	$sql="INSERT INTO `report` (`id`,`staff_id`, `error`, `details`, `status`, `solution` ,`date_posted`  ,`date_resolved`) VALUES ('', '$id',  '$error', '$details', '$status', '$solution' ,'$dateposted','')";
						
		$query= mysqli_query($conn,$sql);	
			if(!$query){
				echo 100;
			}else{
				echo 200;
		} 
	


  }

}

?>


