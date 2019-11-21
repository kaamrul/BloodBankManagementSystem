<?php
require("../db_connect/connection.php");
session_start();
if($_SESSION['email']!=null)
{
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Admin Pannel</title>
		<link href="../assets/css/admin.css" rel="stylesheet" type="text/css" />
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="../assets/css/font-awesome.min.css" rel="stylesheet">
		<link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon.ico">
	</head>

	<body>
		<div class="container">
			<div class="row header" style="color:#000;background:#04564b;">
				<div class="col-md-3 logo">
					<?php// echo $_SESSION['name']; ?>
					<img class="" alt="User Picture" src="<?php echo $_SESSION['img_url'];?> " class="img-responsive" style="height:70px;width:70px;border-radius:50%;margin-top:5px;" height="60" width="60"/></br>
					<span style="color:#FFFFFF"><?php echo $_SESSION['name'];?> </span> <br>
					 <a href="#" style="color:#1EC219"><i class="fa fa-circle text-success" style="color:#13F80C"></i> Online</a>
				</div>	
				<div class="col-md-6 banner">
					<h3 style="color:#FFFFFF">Blood Bank Manaement System</h3>
				</div>
		
				<div class="col-md-3 quick-links">
					<ul>
						<li><a href="index.php" style="color:#FFFFFF">Home</a></li>
						<li><a href="" style="color:#FFFFFF">Feedback</a></li>
						<li><a href="../logout.php?type=admin" style="color:#FFFFFF"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
						<li><a href=""></a></li>
					</ul>
				</div>
			</div>
	
			<div class="row content" >
				<div class="col-md-3 sidebar" >
					<h3>Admin Controls</h3><hr style="height:2px;background:#000;">
						<ul>
							<li><a href="index.php?page=dashboard">Dashbaord</a></li>
							<li><a href="index.php?page=create-admin">Create Admin</a></li>
							<li><a href="index.php?page=manage-admin">Manage Admin</a></li>
							<li><a href="index.php?page=manage-doners">Manage Doners</a></li>
							<li><a href="index.php?page=add-camp">Add Camp</a></li>
							<li><a href="index.php?page=manage-camp">Manage Camp</a></li>
							<li><a href="index.php?page=add-blood-bank">Add Blood Bank</a></li>
							<li><a href="index.php?page=manage-blood-bank">Manage Blood Bank</a></li>
							<li><a href="" class="dropdown dropdown-toggle" data-toggle="dropdown">Reports<span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right my-dropdown">
                                    <li><a href="index.php?page=request-report">Blood Request Reports</a></li>
                                    <li><a href="index.php?page=request-accept-report">Blood Request Accepted Reports</a></li>
                                    <li><a href="index.php?page=request-reject-report">Blood Request Rejected Reports</a></li>                                 																		                                   
                                </ul>  
                            </li>           
							<li><a href=""></a></li>
						</ul>
				</div>
				<div class="col-md-9 content-right" >
					<?php 
					//echo $_GET['page'];
					switch(@$_GET['page']) 
					{
						case "dashboard": {
								include("dashboard.php");
							}
							break;
						
						
						case "create-admin": {
								include("create-admin.php");
								}
								break;
	
								
						case "manage-admin": {
								include("manage-admin.php");
							}
							break;
						
						
						case "update-admin": {
								include("update-admin.php");
							}
							break;
	
			
			
							
						case "manage-doners": {
								include("manage-doner.php");
							}
							break;                    
						
						
						case "update-doner": {
								include("update-doner.php");
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
							
						
						case "add-blood-bank": {
								include("add-blood-bank.php");
							}
							break;
							
							
						case "manage-blood-bank": {
							include("manage-blood-bank.php");
						}
						break;
						
						
						case "update-blood-bank": {
							include("update-blood-bank.php");
						}
						break;
							
							
						case "request-report": {
							include("request-report.php");
						}
						break;						
						
						
						case "request-accept-report": {
							include("request-accept-report.php");
						}
						break;						
						
						
						case "request-reject-report": {
							include("request-reject-report.php");
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
			<div class="row footer"  style="color:#000;background:#04564b; position: absolute;bottom: 0;width: 100%; height: 35px; width:78%;">
				<div class="col-md-12"><p style="color: white;">&copy; J!N 2017, All Rights Reserved.</p></div>
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