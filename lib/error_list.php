<?php
session_start();
include ('../db.php');


if(!isset($_SESSION['STAFF'])){
	session_destroy();
	header('location: ../index.html');	
}else{
$id=$_SESSION['STAFF'];

$sql="select * from report where staff_id= \"$id\" and deleted ='0' ";
$query= mysqli_query($conn,$sql);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REPORT SHEET</title>

<link rel="stylesheet" href="../css/stetis.css"/>
<link rel="stylesheet" href="../css/grid.css"/>
<link rel="stylesheet" href="../fonts/font-awesome-4.6.3/css/font-awesome.min.css" />
<link href="https://fonts.googleapis.com/css?family=Muli|Source+Sans+Pro" rel="stylesheet">
<style type="text/css">
a:link    {color:#fff; background-color:transparent; text-decoration:none}
a:visited {color:#fff; background-color:transparent; text-decoration:none}
a:hover   {color:#fff; background-color:transparent; text-decoration:none}
a:active  {color:yellow; background-color:transparent; text-decoration:none}

</style>
</head>
<body>


<div class="section1">
  
   <span ><img style="margin-top:15px; OPACITY:0.8" src="../image/STETiS_Logo_and_Name.JPG" width="205" height="50" /></span>         
          

    <div class="barc">
    <li class="bar"> <i class="fa fa-file-text-o fa-lg" aria-hidden="true"> &nbsp; </i><a  href="logerror.php">  New Error Report</a></li>
    <li class="bar"> <i class="fa fa-file-text-o fa-lg" aria-hidden="true"> &nbsp; </i><a style="color:yellow" href="error_list.php">  View Errors </a></li>
    <li class="bar"> <i class="fa fa-folder-open fa-lg"> </i>&nbsp;<a  href="monthview.php"> View by month</a></li>
    <li class="bar"> <i class="fa fa-calendar fa-lg"> </i>&nbsp;<a href="weekview.php"> View by Week</a></li>
    <li class="bar"> <i class="fa fa-pencil-square-o fa-lg"> </i>&nbsp; <a href="personal-evaluation.php">Personal Evaluation</a></li>
    <li class="bar"> <i class="fa fa-briefcase fa-lg" aria-hidden="true"></i>&nbsp; <a href="projects.php"> Projects</a></li>
  </div>       
          
</div>

    
    <div style="margin-left:20%; width:71%" class="section2">
        

          
         <div class="header" > 
            <input class="searchbar" type="text" placeholder="   Search" name="search"  id="searchit"  >
            <i style="position:absolute;left: 680px;top: 38px;color: green;" class="fa fa-search"></i>

             
              <span style="font-family: inherit;font-size: 12px;font-weight:100;color:darkcyan;margin-left:430px;"> 
             <i style="color:#066;" class="fa fa-user fa-lg"></i> &nbsp;<?php echo $_SESSION['FIRSTNAME'] ." " . $_SESSION['LASTNAME']?>
             <span class="dropdown">
               <span  class="dropdown-frame" > <i style="color:#066" class="fa fa-chevron-down "></i></span>
               <div style="right:-80px;background-color: #3f8e3d; min-width: 145px; margin-top:11px; padding:0px" class="dropdown-content">
               <a href="logout.php">&nbsp; Log out </a>
               </div>
            </span>
          </span>

          
          </div><br><br/>
          <br><br/>
       <div style="width: 1004px; font-weight:100; font-size:small;">
           <table style="margin-left:30px; border: 1px solid #ddd; width:90%; max-width: 100%; margin-bottom: 20px; border-spacing: 0; display: table; border-collapse: collapse; background-color:#fff; overflow:scroll" border="1">
         <tr style="height:40px; background-color:#32a781; color:#fff; "  >
           <th width="5%" style="width=10px" scope="col">S/N</th>
           <th width="29%"  scope="col">Error Report</th>
           <th width="10%"  scope="col">Status</th>
           <th width="18%"  scope="col">Date posted </th>
           <th width="18%"  scope="col">Date Resolved</th>
           <th width="12%"  scope="col">View Details </th>
         </tr>
          <?php
		  $i=0;
while ($row= mysqli_fetch_array($query)){
	$i= $i + 1;
  $dateResolved = $row['date_resolved'] == '0000-00-00 00:00:00' ? '-' : date('d-M-Y h:i A', strtotime($row['date_resolved'])); 
	?>
          <tr  style="height:40px">
           <th  scope="col"><?php echo $i ?></th>
           <th   scope="col"><?php echo $row['error']?></th>
           <th   scope="col"><?php if($row['status'] == 1){
			    echo "Unresolved"; } else{echo "Resolved";} ?></th>
           <th   scope="col"><?php echo date('d-M-Y h:i A', strtotime($row['date_posted'])) ?></th>
            <th   scope="col"><?php echo $dateResolved; ?></th>
           <th   scope="col" ><a style="color:#03F; font-weight:400" href="viewdetails.php?view=<?php echo $row['id'] ?>">View</a> 
            <a href="delete.php?delete=<?php echo $row['id'] ?>"><i  style="color:#d2424c; margin-left:30px" class="fa fa-trash fa-lg"></i></a></th>
         </tr>
                 
      <?php
}
}
	  ?>  
       </table>
           

      </div>        </div>
    </div>
            
  
</div>





</body>
</html>