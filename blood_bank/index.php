<?php
require("../db_connect/connection.php");
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "../phpmailer/PHPMailerAutoload.php";

if($_SESSION['bank_id']!=null)
{
		$bankid = $_SESSION['bank_id'];
		$sql = $conn->prepare("SELECT * FROM tbl_blood_bank_info WHERE bank_id='$bankid'");
		$sql->execute();
		$value = $sql->fetch(PDO::FETCH_ASSOC);
		 //echo "<pre>";print_r($value);exit;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Blood Bank Pannel</title>
		<link href="../assets/css/admin.css" rel="stylesheet" type="text/css" />
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon.ico">
	</head>

	<body>
		<div class="container">
			<div class="row header" style="color:#000;background:#04564b;">
				<div class="col-md-2 logo" style="color:#FFFFFF">
					<?php echo $_SESSION['bank_name']; ?> 
					<br>
					 <a href="#" style="color:#1EC219"><i class="fa fa-circle text-success" style="color:#13F80C"></i> Online</a>
				</div>	
				<div class="col-md-6 banner">
					<h3 style="color:#FFFFFF">Blood Bank Manaement System</h3>
				</div>
		
				<div class="col-md-4 quick-links">
					<ul>
						<li><a href="index.php" style="color:#FFFFFF">Home</a></li>
						<li><a href="" style="color:#FFFFFF">Feedback</a></li>
						<li><a href="../logout.php?type=admin" style="color:#FFFFFF"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
						<li><a href=""></a></li>
					</ul>
				</div>
			</div>
	
			<div class="row content">
				<div class="col-md-3 sidebar">
					<h3>Control Blood Bank</h3><hr style="height:2px;background:#000;">
						<ul>
							<li><a href="index.php?page=dashboard">Dashbaord</a></li>
							<li><a href="index.php?page=update-profile">Update Profile</a></li>							
							<li><a href="index.php?page=blood-details">Blood Amount Details</a></li>							
							<li><a href="index.php?page=add-camp">Add Camp</a></li>							
							<li><a href="index.php?page=manage-camp">Manage Camp</a></li>							
							<li><a href="index.php?page=manage-request">Manage request</a></li>							
							<li><a href=""></a></li>
						</ul>
				</div>
				<div class="col-md-9 content-right">
					<?php 
					//echo $_GET['page'];
					switch(@$_GET['page']) 
					{
						case "dashboard": {
								include("dashboard.php");
							}
							break;
						

						case "update-profile": {
								include("update-profile.php");
							}
							break;
							
						case "blood-details": {
								include("blood-details.php");
							}
							break;	
						
						case "add-camp": {
							include("add-camp.php");
							}
							break;
							
						case "manage-camp": {
							include("manage-camp.php");
							}
							break;
								
						case "update-camp": {
							include("update-camp.php");
							}
							break;
							
						case "manage-request": {
							include("manage-request.php");
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
				<div class="col-md-12"><p style="color:white;">&copy; J!N 2017, All Rights Reserved.</p></div>
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