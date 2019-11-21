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


<?php
require("db_connect/connection.php");
	
	if(isset($_POST['btn']))
	{
		$group = $_POST['group'];
		$dlocation = $_POST['dlocation'];
		$sql = $conn->prepare("SELECT * FROM `tbl_doner_info` WHERE activation_status = 1 AND `blood_group`='$group' AND `location`='$dlocation'");
		$sql->execute();
		$value = $sql->fetchAll();
		// echo "<pre>";print_r($value);exit;
	}
	
	$location = $conn->prepare("select DISTINCT location from tbl_doner_info");
	$location->execute();
	$location_value = $location->fetchAll();
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
                                <i class="fa fa-phone"></i> +8801636548228
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
                
                
        <div class="container"style="padding-right:0px !important;padding-left:0px!important;">
            <nav class="navbar navbar-default my-nav" id="mynav" style="margin-bottom:5px;">
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
                            <li class="active"><a href="index.php?page=home"><span class="glyphicon glyphicon-home" style="color: #F8C222;"></span></a></li>
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




		            <!--Start Search Filter-->

            <div class="container" style="padding-right:0px !important;padding-left:0px!important;">
                <div class="row">
                    <form action="search.php" method="POST">
                        <div class="col-md-12">
                            <div class="search-filter">
                                    <select name="group" class="form-control">
                                        <option>All Group</option>
                                         <option>A+</option>
                                         <option>A-</option>
                                         <option>B+</option>
                                         <option>B-</option>
                                         <option>O+</option>
                                         <option>O-</option>
                                         <option>AB+</option>
                                         <option>AB-</option>
									</select>
									
										<input list="browsers" name="dlocation" class="form-control datalist" placeholder="Plz Select/Type Your Location" style="width:35%;float:left;height:45px;margin-right:5px;">
										<datalist id="browsers">
											<?php
											
											foreach($location_value as $v_location_value)
											{
											?>
											<option value="<?php echo $v_location_value['location']; ?>">
										  <?php
											}
										  ?>
										</datalist>
									<div class="search-btn">
                                    <button type="submit" class="btn btn-lg" name="btn">SEARCH</button>
                            </div>
                        </div>
                    </form>
					
				</div>
			</div>
			</div>
					<!------------------End Search Filter------------------->
					
<!---------------------- Doners list Start ---------------------->

<!-- New Donor List -->

<section class="details-books py-5" style="margin-left: 50px; margin-right: 50px;">
    <div class="container py-md-4 mt-md-3">
        <h2 class="heading-agileinfo"><?php echo $group; ?><span>Donor</span></h2>
            <span class="w3-line black"></span>
        <div class="row mt-md-5 pt-4">

            <!-- Team -->

            <div class="team">
                <div class="team_background parallax-window" data-parallax="scroll" data-image-src="assets/images/images.jpg" data-speed="0.8"></div>
                
                <div class="container">
                    <div class="row team_row">
                
                        <?php
    if($sql->rowCount()>0)
    {
        foreach($value as $v)
        {
    ?>

                        <!-- Team Item -->
                        <div class="col-lg-3 col-md-3 team_col">
                            <div class="team_item">
                                <div class="team_image"><img src="<?php echo $v['img_url']; ?>" alt=""></div>
                                <div class="team_body">
                                    <div class="team_title"><a href="#"><?php echo $v['doner_name']; ?></a></div>
                                    <div class="team_subtitle">Blood Group: <?php echo $v['blood_group']; ?></div>
                                    <div class="team_subtitle">Age: <?php echo $v['age']; ?></div>
                                    <div class="team_subtitle">Sex: <?php echo $v['gender']; ?></div>
                                    <div class="team_subtitle">Location: <?php echo $v['location']; ?></div>

                                    <div class="team_subtitle">Status: <?php echo $v['activation_status']; ?></div>

                                    <div class="team_subtitle">
                                        <a href="index.php?page=blood-request&id=<?php echo $v['doner_id']; ?>" class="btn btn-success">Send Request </a>
                                    </div>
                            
                                </div>
                            </div>
                        </div>

                        <?php
           }
    }
    else{
        ?>  
            <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
                <div class="alert alert-danger alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Sorry!</strong>  Doner not found on this location ................
                </div>
            </div>
        <?php
    }
           ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  

<!----------- Doners list End ------------->

		
		
			
		
		
				<!------------ Footer Start -------------->
                
            <div class="container">
                <div class="row footer">
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 footer-left">
                    <div class="footer-categories">
                                <h5 class="text-left text-upper">Menus</h5>
                                <div class="border-line"></div>
                                <div class="footer-categories-links">
                                    <ul>
                                        <li><a href="index.php?page=index.php"><i class="fa fa-arrow-circle-right"></i> Home</a></li>                                      
                                        <li><a href="index.php?page=doner-list"><i class="fa fa-arrow-circle-right"></i> All Donor List</a></li>
                                        <li><a href="index.php?page=blood-bank"><i class="fa fa-arrow-circle-right"></i> Blood Banks</a></li>
                                        <li><a href="index.php?page=camp"><i class="fa fa-arrow-circle-right"></i> Camps</a></li>                                    
                                        <li><a href="index.php?page=doner-sign-up"><i class="fa fa-arrow-circle-right"></i> Become a Donor</a></li>                                    
                                        <li><a href="index.php?page=user-sign-up"><i class="fa fa-arrow-circle-right"></i> Become a User</a></li>                                    
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--End Col-->
                    
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 footer-mid">
                         <div class="footer-categories">
                                <h5 class="text-left text-upper">New Doners</h5>
                                <div class="border-line"></div>
                                <div class="footer-categories-links">
                                    <ul>
                                            <?php
                                                foreach($value_doner as $v)
                                                {
                                                ?>  
                                        <li><a href="index.php?page=blood-request&id=<?php echo $v['doner_id']; ?>"><i class="fa fa-user"> <?php echo $v['doner_name']; ?></i></a></li>
                                                <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--End Col-->
                    
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 footer-right">
                            <div class="footer-contact-form">
                                <h5 class="text-left text-upper">Feeadback</h5>
                                <div class="border-line"></div>
                                <form action="" method="POST" id="feed-form">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name" name="name">
                                        <input type="text" class="form-control" placeholder="Email" name="email">
                                        <input type="hidden" name="location" value="feedback-location">
                                        <textarea class="form-control" rows="2" placeholder="Message" name="btext"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary cont-frm-btn">Send Message</button>
                                </form>
                            </div>
                    </div>
                </div>
                
            <!-- Modal for print -->
            
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
 
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Print Your Blood Request Confirmation Document</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="print_document.php">

                      <div class="form-group">
                        <label for="apid">Request Number:</label>
                        <input type="text" class="form-control" id="apid" Placeholder="Enter your request no...." name="request_id_bank">
                      </div>
                      <div class="form-group">
                      <button type="submit" name="print" class="btn btn-success">Print Document</button>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>
            
            <!-- Modal end-->
                
                <!-------- Small Footer Start ---------->

                <div class="row">
                    <div class="col-md-12 col-sm-12 small-footer"><p>&copy copy right by - <a href="">N.I.Biz Soft.</a></p></div>
                </div>

                <!-------- Small Footer End ---------->

            </div>
                
                
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        
    </body>
</html>