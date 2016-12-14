<?php
session_start();
require_once("../db.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	
			$username= mysqli_real_escape_string ($conn,$_POST['username']);
			$password=md5(mysqli_real_escape_string ($conn,$_POST['password']));


			$sql = "select * from staff where staff_id=\"$username\" and password=\"$password\"";
			$query= mysqli_query($conn, $sql);
			if (!$query){
			die ("connection failed: ");
			}
			$num= mysqli_num_rows($query);
			$row= mysqli_fetch_array( $query);



			if($num != 1){
				echo 100;				
			   }
		    else if ($row['staff_id'] = $username and $row['password'] = $password and $row['status'] == 1 ){
					
				$_SESSION['ADMINID']=$row['staff_id'];
				$_SESSION['FIRSTNAME']=$row['firstname'];
				$_SESSION['LASTNAME']=$row['lastname'];
				$_SESSION['SEX']=$row['sex'];

				
				echo 200;
				}
			elseif ($row['username'] = $username and $row['password'] = $password and $row['status'] == 2 ){
			    
				
			    $_SESSION['STAFF']=$row['id'];
				$_SESSION['FIRSTNAME']=$row['firstname'];
				$_SESSION['LASTNAME']=$row['lastname'];
				$_SESSION['SEX']=$row['sex'];
				
				echo 300;
				
			}
			}
			

?>