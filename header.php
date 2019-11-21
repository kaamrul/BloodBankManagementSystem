<!-- Donor Hide by accepted request -->
<!-- Extra Checking for Donor. -->
<?php
    // Date Format YYYY-MM-DD
    $today = date('Y-m-d');

    $all_pending_request_queryset = "SELECT * FROM `blood_request` WHERE status='accepted'";
    $conn = mysqli_connect("localhost","root","","blood_bank");
    $all_pending_request=mysqli_query($conn, $all_pending_request_queryset);
    foreach ($all_pending_request as $req_obj) {
        # code...
        $later_120_days = date_create($req_obj['req_date'])->modify("+120 day")->format("Y-m-d");
        if($req_obj['req_date'] == $today) {
            // Now update activation status of donor
            $update_query = "UPDATE `tbl_doner_info` SET `activation_status`=0 WHERE doner_id='".$req_obj['doner_id']."'";
            mysqli_query($conn, $update_query);
        }

        if((strtotime($today) * 1000) > (strtotime($later_120_days) * 1000)) {
            // Now update activation status of donor
            $update_query = "UPDATE `tbl_doner_info` SET `activation_status`=1 WHERE doner_id='".$req_obj['doner_id']."'";
            mysqli_query($conn, $update_query);
        }
    }
    // // Close the connection
    mysqli_close($conn);

?>

<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("db_connect/connection.php");
require_once "phpmailer/PHPMailerAutoload.php";

    $sql = $conn->prepare("SELECT * FROM tbl_doner_info WHERE activation_status=1 ORDER BY doner_id DESC LIMIT 8");
    $sql->execute();
    $value_doner = $sql->fetchAll();
    //echo "<pre>";print_r($value);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blood Banak</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
    </head>
    <body>
	
			<!---- Start Header ---->

        <div class="container"> 
            <div class="row header-top">
                <div class="col-md-4">
                    <div class="header-logo">
                        <ul>
                            <li><img src="assets/images/logo.png" style="height:60px; width:70px;"></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="topbar-contact-info">
                        <ul>
                            <li>
                                <i class="fa fa-phone"></i> +8801940548194
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i> admin@bloodbankbd.net
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="col-md-4">
					<?php 
						if(isset($_SESSION['user_id']))
						{
						?>
						<ul class="nav navbar-nav navbar-right">
							<li ><a href="" style="color: #FFFFFF;"><?php echo $_SESSION['user_name']; ?></a></li>
							                                                     
							<li><a href="logout.php?type=user" style="color: #FFFFFF;"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>                                                      
                        </ul>
						<?php 
						}
						else
						{
							?>
							<div class="header-social-icon">
                        <ul>
                            <li><a href="http://www.facebook.com/thesoftking"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="http://www.twitter/thesoftking"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="http://linkdin.com/thesoftking"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="http://google.com/"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
							<?php
						}
						?>
						
                </div>
            </div>
        </div>
		
				<!--- End Header --->
				
				
				<!---- Start Menu bar ---->
                
				
        <div class="container" style="padding-right:0px !important; padding-left:0px!important;">
            <nav class="navbar navbar-default my-nav" id="mynav" style="margin-bottom:0px;">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target="#mymenu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="container">
                    <div class="collapse navbar-collapse" id="mymenu">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.php?page=home"><span class="glyphicon glyphicon-home" style="color: #fff;"></span></a></li>
                            <li><a href="" class="dropdown dropdown-toggle" data-toggle="dropdown">About Blood<span class="caret"></span></a>
                                <ul class="dropdown-menu my-dropdown">
                                    <li><a href="index.php?page=why-donate-blood">Why Donate Blood?</a></li>
                                    <li><a href="index.php?page=eligibility-to-donate-blood">Eligibility to Donate Blood</a></li>
                                    <li><a href="index.php?page=tips-for-a-successful-donation">Tips for a Successful Donation</a></li>
                                    <li><a href="index.php?page=what-happens-to-donated-blood">What Happens to Donated Blood?</a></li>
                                    								                                   
                                </ul>  
                            <li><a href="index.php?page=doner-list">All Doner List</a></li>

                            <li><a href="index.php?page=request-list">All Requset List</a></li>

                            <li><a href="index.php?page=blood-bank">Blood Banks</a></li>                        
							<li><a href="index.php?page=camp">Blood campaigns</a></li>
                                             
						<?php 
						if(isset($_SESSION['user_id']))
						{
						?>
							 <li><a href="" class="dropdown dropdown-toggle" data-toggle="dropdown">Request Status<span class="caret"></span></a> 
                                <ul class="dropdown-menu my-dropdown">
                                    <li><a href="index.php?page=status-from-doner">Doner Response status</a></li>
                                    <li><a href="index.php?page=status-from-blood-bank">Blood Bank Response status</a></li>                                  																                                   
                                </ul>  
                            </li> 
                        <?php
						}
						?>							
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
						
						<?php 
						if(!isset($_SESSION['user_id']))
						{
						?>
							<li><a href="login/index.php"><span class="glyphicon glyphicon-lock "></span>  Login</a></li>
							<li><a hhref="" class="dropdown dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Sign up<span class="caret"></span></a>
								<ul class="dropdown-menu my-dropdown">
									<li><a href="index.php?page=doner-sign-up"><span class="glyphicon glyphicon-user"></span> Doners Sign up</a></li>
									<li><a href="index.php?page=user-sign-up"><span class="glyphicon glyphicon-user"></span> Users Sign up</a></li>						
									<li><a href="index.php?page=blood-bank-sign-up"><span class="glyphicon glyphicon-user"></span> Bank Sign up</a></li>						
															
								 </ul>
							</li> 

                        <?php
						}
						?>							
                        </ul>
						
						<ul class="nav navbar-nav navbar-right">
						
						<?php 
						if(isset($_SESSION['user_id']))
						{
						?>
							<li><a href="#myModal" data-toggle="modal"><i class="fa fa-print" aria-hidden="true"></i> Print</a></li>							

                        <?php
						}
						?>							
                        </ul>
                    </div>
                </div>

            </nav>
        </div>
		
				<!--- End Menu bar --->