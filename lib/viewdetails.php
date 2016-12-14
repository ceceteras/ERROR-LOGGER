<?php
session_start();
include ('../db.php');


if(!isset($_SESSION['STAFF'])){
  session_destroy();
  header('location: ../index.html'); 
}else{

  
if(!isset($_GET['view'])){
  header("location: error_list.php");
    }else{
$view= $_GET['view'];  
}
$sql="select * from report where id= \"$view\" ";
$query= mysqli_query($conn,$sql);

  }





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
  
   <span ><img style="margin-top:15px; border-radius: 5px" src="../image/STETiS_Logo_and_Name.JPG" width="205" height="50" /></span>         
          

    <div class="barc">
          <li class="bar"> <i class="fa fa-file-text-o fa-lg" aria-hidden="true"> &nbsp; </i><a href="logerror.php">  New Error Report</a></li>
    <li class="bar"> <i class="fa fa-file-text-o fa-lg" aria-hidden="true"> &nbsp; </i><a  href="error_list.php">  View Errors </a></li>
    <li class="bar"> <i class="fa fa-folder-open fa-lg"> </i>&nbsp;<a href="monthview.php"> View by month</a></li>
    <li class="bar"> <i class="fa fa-calendar fa-lg"> </i>&nbsp;<a href="weekview.php"> View by Week</a></li>
    <li class="bar"> <i class="fa fa-pencil-square-o fa-lg"> </i>&nbsp; <a href="personal-evaluation.php">Personal Evaluation</a></li>
    <li class="bar"> <i class="fa fa-briefcase fa-lg" aria-hidden="true"></i>&nbsp; <a href="projects.php"> Projects<a/></li>
            
  </div>       
          
</div>

    
    <div style="margin-left:22%; width:71%" class="section2">
        

          
         <div class="header" > 
            <input class="searchbar" type="text" placeholder="   Search" name="search"  id="searchit"  >
            <i style="position:absolute;left: 700px;top: 38px;color: green;" class="fa fa-search"></i>

             

              <span style="font-family: inherit;font-size: 12px;font-weight:100;color:darkcyan;margin-left:400px;"> 
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

    <?php
$row = mysqli_fetch_array($query)
    ?>   

<div  style="background-color: #fff;height:auto;font-family: 'Muli', sans-serif; " class="report" >

      <span style=""><img src="../image/images.jpg" width="77" height="75" /></span>
<span  style="color:#50c344; margin-left:18%; font-size:18px; font-weight:500 "><?php echo strtoupper($row['error'])?></span>
          <span style="color:red; float:right; font-weight:lighter; font-size:14px"> <!-- #BeginDate format:Am1 -->August 13, 2016<!-- #EndDate --></span>
      <br/>
    <br/>
    <br/>
    <span style="color:#3498db; font-size:20px"> Error Details:</span>
        <span style="color: #066;text-align: justify;font-size:12px;margin-left: 30px;">
             <?php echo $row['details']?>
      </span>
      <br/><br/>
      <br style="clear:both"></br>
     <span  style="color:#3498db;font-size:20px;margin-left:54px;width:50%"> Status:</span>
        <span style=" color:#066;text-align: justify; font-size:12px; margin-left:18px"> &nbsp; &nbsp; 
             <?php if($row['status'] == 1){
			    echo "Unresolved";}else{echo "Resolved";} ?></span>
     
      <br/><br/>
    <br style="clear:both"></br>
     <div  style="color:#3498db;font-size:20px;margin-left:0px;width:100%">
     <div style="width: 20%; margin-left:37px"> Solution:</div>
        <div style=" color:#066;text-align: justify;font-size:12px;width:70%;margin-left: 19%;margin-top: -17px;">   <?php echo nl2br($row['solution']) ?></div>
      </div>

    <br/><br/><br/>
     <span><a  style="margin-left:90%;background-color: #fff;color: #db3434;" href="edit_error.php?edit= <?php echo $view ?>"> <i class="fa fa-edit"></i>EDIT</a></span><br />
     
        </div>
 
      </div>        
    </div>
            
  
</div>

</div>

</body>
</html>