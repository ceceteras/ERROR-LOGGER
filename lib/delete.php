<?php
session_start();
include ('../db.php');

if(!isset($_SESSION['STAFF'])){
  session_destroy();
  header('location: ../index.html'); 
}

if(!isset($_GET['delete'])){ 
  header("location: error_list.php");
    }else{
      $delete= $_GET['delete'];  
        
$sql="UPDATE `report` SET `deleted`='1' WHERE id='$delete'";
$query= mysqli_query($conn,$sql);
if(!$query){
        echo "error";
      }else{
         header("location: error_list.php");
    } 
  }
 
?>
