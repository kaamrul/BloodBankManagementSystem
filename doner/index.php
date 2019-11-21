<?php
require("../db_connect/connection.php");
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "../phpmailer/PHPMailerAutoload.php";

if($_SESSION['doner_id']!=null)
{
		$donerid = $_SESSION['doner_id'];
		$sql = $conn->prepare("select * from tbl_doner_info where doner_id='$donerid'");
		$sql->execute();
		$value = $sql->fetch(PDO::FETCH_ASSOC);
		$image_url=$value['img_url'];
		 //echo "<pre>";print_r($value);exit;
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Donor Pannel</title>
	<link href="../assets/css/admin.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/font-awesome.min.css" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon.ico">
</head>

<body>
<div class="container">
  <div class="row header" style="color:#000;background:#04564b;">
    <div class="col-md-2 logo">
	    <?php //echo $_SESSION['doner_name']; ?>
		  <img src="../<?php echo $value['img_url']; ?>" alt="" class="img-responsive" style="height:70px;width:70px;border-radius:50%;margin-top:5px;" height="60" width="60">
      <span style="color:#FFFFFF"><?php echo $_SESSION['doner_name']; ?> </span> <br>
           <a href="#" style="color:#1EC219"><i class="fa fa-circle text-success" style="color:#13F80C"></i> Online</a>
	</div>
	
    <div class="col-md-6 banner">
		<h3 style="color:#FFFFFF">Blood Bank Manaement System</h3>
	</div>
	
    <div class="col-md-4 quick-links">
		<ul>
			<li><a href="index.php" style="color:#FFFFFF">Home</a></li>
			<li><a href="" style="color:#FFFFFF">Feedback</a></li>
			<li><a href="../logout.php?type=doner" style="color:#FFFFFF"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
			<li><a href=""></a></li>
		</ul>
	</div>
  </div>
  
  <div class="row content">
    <div class="col-md-3 sidebar">
	<h3 style="text-align:center;">Donor Panel</h3><hr style="height:2px;background:#000;">
  	<ul>
        <li><a href="index.php?page=dashboard">Dashbaord</a></li>
        <li><a href="index.php?page=manage-profile">Manage Profile</a></li>
        <li><a href="index.php?page=manage-request">Manage Request</a></li>
        <li><a href="index.php?page=manage-profile"></a></li>
    </ul>
  </div>
  <div class="col-md-9">
			<?php 
			//echo $_GET['page'];
				  switch(@$_GET['page']) {
            case "manage-profile": {
                    include("manage-own-info.php");
                }
                break;

            case "manage-request": {
                    include("manage-request.php");
                }
                break;

            case "dashboard": {
                    include("dashboard.php");
                }
                break;


            default: {
                    include("dashboard.php");
                }
        }
				?>	
				</div>
  
</div>
</div>
  
  <div class="container"> 
	<div class="row footer" style="background:#04564b; position: absolute;bottom: 0;width: 100%; height: 35px; width:78%;">
		<div class="col-md-12"><p style="color:#FFFFFF;">&copy; J!N 2017, All Rights Reserved.</p></div>
	</div>
  </div>
		
        <script src="../assets/js/jquery-3.2.1.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
<?php  
}
else
{
	 header('location:../error.php');
}
?>