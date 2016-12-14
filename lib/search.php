<?php
require_once('../db.php');

 if($_SERVER['REQUEST_METHOD'] == "POST"){

$search = $_POST['searchit'];
echo $search;

$selectdata = "select * from report where error like '%". $search . "%' ";

$query = mysqli_query($conn, $selectdata) or die("Failed to perform query: " . mysql_error());

$num = mysqli_num_rows($query);


if ($num = 0){
	echo "there are no records";
	}else{
while($row = mysqli_fetch_array($query))
{	
  $option = '<div class="searchbar">' .$row['error']. '</div>';
    echo $option;
	}
	}
}


?>