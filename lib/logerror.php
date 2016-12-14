<?php
session_start();
include ('../db.php');

if(!isset($_SESSION['STAFF'])){
  session_destroy();
  header('location: ../index.html'); 
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REPORT SHEET</title>

<link rel="stylesheet" href="../css/grid.css"/>
<link rel="stylesheet" href="../css/stetis.css"/>
<link rel="stylesheet" href="../fonts/font-awesome-4.6.3/css/font-awesome.min.css" />
<link href="https://fonts.googleapis.com/css?family=Muli|Source+Sans+Pro" rel="stylesheet">
<link rel="stylesheet" href="../css/responsiveness.css"/>

<style type="text/css">
a:link    {color:#fff; background-color:transparent; text-decoration:none}
a:visited {color:#fff; background-color:transparent; text-decoration:none}
a:hover   {color:#fff; background-color:transparent; text-decoration:none}
a:active  {color:yellow; background-color:transparent; text-decoration:none}


</style>


<script src="../js/jquery-1.12.1.min.js"></script>
<script src="../js/app.js"></script>
<script src="../js/carousels.js"></script>
<style>
.error {
    
    font-size: 12px;
    color:red;
    margin-bottom: 10px;
    margin-left: 20px;
    font-family: 'Muli', sans-serif;
}

 .error2 {
   
      font-size: 12px;
    color:red;
    margin-bottom: 10px;
    margin-left: 20px;
    font-family: 'Muli', sans-serif;
   
}
</style>
</head>
<body>

<div class="section1">
  
   <span ><img style="margin-top:15px; border-radius:5px; opacity:0.8" src="../image/STETiS_Logo_and_Name.JPG" width="205" height="50" /></span>         
          

    <div class="barc">
       <li class="bar"> <i class="fa fa-file-text-o fa-lg" aria-hidden="true"> &nbsp; </i><a style="color:yellow" href="logerror.php">  New Error Report</a></li>
    <li class="bar"> <i class="fa fa-file-text-o fa-lg" aria-hidden="true"> &nbsp; </i><a  href="error_list.php">  View Errors </a></li>
    <li class="bar"> <i class="fa fa-folder-open fa-lg"> </i>&nbsp;<a href="monthview.php"> View by month</a></li>
    <li class="bar"> <i class="fa fa-calendar fa-lg"> </i>&nbsp;<a href="weekview.php"> View by Week</a></li>
    <li class="bar"> <i class="fa fa-pencil-square-o fa-lg"> </i>&nbsp; <a href="personal-evaluation.php">Personal Evaluation</a></li>
    <li class="bar"> <i class="fa fa-briefcase fa-lg" aria-hidden="true"></i>&nbsp; <a href="projects.php"> Projects</a></li>
  </div>       
          
</div>

    
    <div style="margin-left:26%; width:71%"  class="section2">
        

          
         <div class="header" > 
          <div style="font-family: inherit;font-size: 12px;font-weight:100;color:darkcyan;margin-left:339px;"> 
             <i style="color:#066;" class="fa fa-user fa-lg"></i> &nbsp;<?php echo $_SESSION['FIRSTNAME'] ." " . $_SESSION['LASTNAME']?>
             <span class="dropdown">
               <span  class="dropdown-frame" > <i style="color:#066" class="fa fa-chevron-down "></i></span>
               <div style="right:-80px;background-color: #3f8e3d; min-width: 145px; margin-top:11px; padding:0px" class="dropdown-content">
               <a href="logout.php">&nbsp; Log out </a>
           </div>
         </div>
            <input class="searchbar" type="text" placeholder="   Search" name="search"  id="searchit"  >
            <i style="position:absolute;left: 758px;top: 38px;color: green;" class="fa fa-search"></i>
            <span class="result" id="output"></span>
          </span>
          </span>
    </div>

      <br><br/>
       <br><br/>
       <br><br/>
     <div style=" font-size: 14px;margin-left:34px; color: #3d2044;"><i class="fa fa-pencil-square-o fa-lg"> </i> Write a New Error Report...</div>
<br />


<form style="width:70%"  action="" method="post">
<textarea name="error"  id="error" required  style="font-size: 14px; border: 1px solid #ccc; padding-left:10px;padding-top:10px; font-family: Tahoma, Geneva, sans-serif;margin-bottom: 10px;margin-left: 35px;width: 90%;"  placeholder=" Error..." title="What bug did you discover?"></textarea><br />
<div id="error_err" class="error"> </div>




<textarea name="details" id="details" required style=" border: 1px solid #ccc; font-size: 14px;font-family: Tahoma, Geneva, sans-serif; margin-bottom: 10px; padding-left:10px;padding-top:10px; margin-left: 35px;width: 90%;" cols="40" rows="2" placeholder=" Error Details..." title="Detailed explanation of the bug you discovered"></textarea>
<div id="details_err" class="error2"> </div>


<select name="status" id="status" style="  border: 1px solid #ccc;font-size: 14px;font-family: Tahoma, Geneva, sans-serif;margin-bottom:30px;margin-left: 35px;width: 90%; height:40px;padding-left:10px;" title="Was it resolved?" cols="40" rows="2" placeholder=" Error...">
  <option value="1">Unresolved</option>
 </select>


 <textarea id="solution" style=" border: 1px solid #ccc;padding-left:10px;padding-top:10px; font-size: 14px;  width: 90%; font-family: Tahoma, Geneva, sans-serif; margin-left:35px"    cols="50" rows="8" placeholder=" Assumed Solution, observation, comment or complain..." title="State the Solution, Observation,comments and complains" name="solution"></textarea>
        <br /><br />
<br />

  <button style="width:160px; height:40px; margin-left:40%; border:none;" class="btn" id="save" type="button" >Save </button>      
        </form>
      </div>        </div>
    </div>
            
  
</div>





</body>
</html>