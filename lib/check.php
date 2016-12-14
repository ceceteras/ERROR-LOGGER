<?php
require_once('../db.php');

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$page = $_POST['page'];
		
		switch($page):
			
			case 'email':
				$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);/*  FILTERS THE EMAIL AND PREVENTS WRONG CODES FORM ENTERING THE DATABASE*/
				$sql = "select * from users where email = '$email'";
				$query = mysql_query($sql) or die("Failed to perform query: " . mysql_error());
				if(mysql_num_rows($query) > 0){
					echo 100;
				} else{
					echo 200;
				}
			break;
			
			case 'username':
				$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);/*  FILTERS THE EMAIL AND PREVENTS WRONG CODES FORM ENTERING THE DATABASE*/
				$sql = "select * from users where username = '$username'";
				$query = mysql_query($sql) or die("Failed to perform query: " . mysql_error());
				if(mysql_num_rows($query) > 0){
					echo 100;
				} else{
					echo 200;
				}
			break;
			
		endswitch;
	}
?>