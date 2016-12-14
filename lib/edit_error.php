<?php
session_start();
include ('../db.php');

if(!isset($_SESSION['STAFF'])){
  session_destroy();
  header('location: ../index.html'); 
}
 
?>

<?php
if(!isset($_GET['edit'])){ 
  header("location: viewdetails.php");
}else{
   $edit= $_GET['edit'];  
     

if (isset($_POST['save'])){
      //$mysqli = new mysqli;
      $solution = mysqli_real_escape_string($conn, $_POST['solution']);
       
      $dateposted = date('Y-m-d');
      $status = $_POST['status'];
  
$sql="UPDATE `report` SET `status`='$status', `solution`='$solution',`date_resolved`=NOW() WHERE id='$edit'";
$query= mysqli_query($conn,$sql);
if($query){
         header("location: viewdetails.php");
       }else{

        die("Error description: " . mysqli_error($conn));
    } 
  }
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REPORT SHEET</title>

<link rel="stylesheet" href="../css/stetis.css"/>
<link rel="stylesheet" href="../fonts/font-awesome-4.6.3/css/font-awesome.min.css" />
<link href="https://fonts.googleapis.com/css?family=Muli|Source+Sans+Pro" rel="stylesheet">

<style type="text/css">
a:link    {color:#fff; background-color:transparent; text-decoration:none}
a:visited {color:#fff; background-color:transparent; text-decoration:none}
a:hover   {color:#fff; background-color:transparent; text-decoration:none}
a:active  {color:yellow; background-color:transparent; text-decoration:none}

</style>


<script src="../js/jquery-1.12.1.min.js"></script>
<script src="../js/app.js"></script>

</head>
<body>
<div class="section1">
  
   <span ><img style="margin-top:15px; border-radius:5px;" src="../image/STETiS_Logo_and_Name.JPG" width="205" height="50" /></span>         
          

    <div class="barc">
    <li class="bar"> <i class="fa fa-file-text-o fa-lg" aria-hidden="true"> &nbsp; </i><a  href="logerror.php">  New Error Report</a></li>
    <li class="bar"> <i class="fa fa-file-text-o fa-lg" aria-hidden="true"> &nbsp; </i><a  href="error_list.php">  View Errors </a></li>
    <li class="bar"> <i class="fa fa-folder-open fa-lg"> </i>&nbsp;<a  href="monthview.php"> View by month</a></li>
    <li class="bar"> <i class="fa fa-calendar fa-lg"> </i>&nbsp;<a href="weekview.php"> View by Week</a></li>
    <li class="bar"> <i class="fa fa-pencil-square-o fa-lg"> </i>&nbsp; <a href="personal-evaluation.php">Personal Evaluation</a></li>
    <li class="bar"> <i class="fa fa-briefcase fa-lg" aria-hidden="true"></i>&nbsp; <a href="projects.php"> Projects</a></li>
    
            
  </div>       
          
</div>

    <div class="section2">
        
<br/>     <div class="header" > 
           <span style="font-family: inherit;font-size: 12px;font-weight:100;color:darkcyan;margin-left:715px;"> 
             <i style="color:#066;" class="fa fa-user fa-lg"></i> &nbsp;<?php echo $_SESSION['FIRSTNAME'] ." " . $_SESSION['LASTNAME']?>
             <span class="dropdown">
               <span  class="dropdown-frame" > <i style="color:#066" class="fa fa-chevron-down "></i></span>
               <div style="right:-80px;background-color: #3f8e3d; min-width: 145px; margin-top:11px; padding:0px" class="dropdown-content">
               <a href="logout.php">&nbsp; Log out </a>
               </div>
            </span>
          </span>
          </div>
 <?php
$error="select * from report where id= \"$edit\" ";
$query2= mysqli_query($conn,$error);
$row= mysqli_fetch_array($query2);

 ?>     
  <div style="background-color:#fff">  <span style="margin-left:30px; color:#a93333"><i class="fa fa-info-circle fa-2x"></i></span>
<span  style="color:#3498db; margin-left:3%; font-size:18px; "><?php echo strtoupper($row['error'])?></span></div>
<br />
<br />
       <div style="font-size: 14px; width: 244px; height: 23px; margin-left:222px"><i class="fa fa-pencil-square-o fa-lg"> </i>Edit Error Report...</div>
<br />



<form action="" method="post">

 <textarea id="solution"  required name="solution" style="padding-left:10px;padding-top:10px;outline:none;font-size: 14px;  width:45%;  border: 1px solid #ccc; font-family: Tahoma, Geneva, sans-serif; margin-left:35px"    cols="45" rows="14" placeholder=" Final Solution..." title="State the  Final Solution" ></textarea>
  <br />
  <br />     

<select name="status" id="status" style="font-size: 14px; background-color:rgba(17, 186, 120, 0.18); border:none;margin-bottom:30px;margin-left: 10%;width: 30%; height:40px;padding-left:10px;" title="Was it resolved?" cols="40" rows="2" placeholder=" Error...">
  <option value="2">Resolved</option>
  <option value="1">Unresolved</option>
   </select>
        <br />
<br />

  <button style="width:140px; height:35px; margin-left:20%; border:none;" class="btn"  name="save" type="submit" >Save </button>    

  <br/></br>
 
        </form>
      </div>        </div>
    </div>
            
  
</div>




</body>
</html>