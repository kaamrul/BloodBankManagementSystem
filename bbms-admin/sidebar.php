<?php
require("../db_connect/connection.php");
session_start();
if($_SESSION['email']!=null)
{
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
    <title>Online Blood Bank Admin Panel</title>
	
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
	
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
	
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">BBMS admin</a> 
            </div>
			<div style="color: white;
			padding: 15px 50px 5px 50px;
			float: right;
			font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="../logout.php?type=admin" class="btn btn-danger square-btn-adjust">Logout</a> 
			</div>
        </nav>   
	    <!-- /. NAV TOP  -->
		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">
					<li class="text-center">
						<?php// echo $_SESSION['name']; ?>
						<img src="<?php echo $_SESSION['img_url'];?>" class="user-image img-responsive"/>
					</li>
					<li>
						<a class="active-menu"  href="index.php"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a>
					</li>
					 <li>
						<a  href="#"><i class="fa fa-user fa-2x"></i> Create Admin</a>
					</li>
					<li>
						<a  href="#"><i class="fa fa-cogs fa-2x"></i> Manage Admin</a>
					</li>
						   
					<li>
						<a  href="#"><i class="fa fa-cogs fa-2x"></i> Manage Donors</a>
					</li>
					<li>
						<a  href="#"><i class="fa fa-newspaper-o fa-2x"></i> Add Campaign</a>
					</li>
					<li>
						<a  href="#"><i class="fa fa-cogs fa-2x"></i> Manage Campaign</a>
					</li>
					<li>
						<a  href="#"><i class="fa fa-bank fa-2x"></i> Add Blood Bank</a>
					</li>
					<li>
						<a  href="table.php"><i class="fa fa-cogs fa-2x"></i> Manage Blood Bank</a>
					</li>				
									   
					<li>
						<a href="#"><i class="fa fa-sitemap fa-3x"></i> Reports<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li>
								<a href="index.php?page=table">Blood Request Report</a>
							</li>
							<li>
								<a href="#">Blood Request Accept Report</a>
							</li>
							<li>
								<a href="#">Blood Request Reject Report</a>
							</li>
							
						</ul>
					</li> 	
				</ul>
			   
			</div>
		
		</nav>
	</div>

<?php
  }
?>