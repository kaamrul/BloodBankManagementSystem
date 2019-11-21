<?php
require("../db_connect/connection.php");
session_start();
if($_SESSION['email']!=null)
{
?>

<?php
  $sql = $conn->prepare("SELECT COUNT(doner_id) FROM `tbl_doner_info`");
  $sql->execute();
  $data = $sql->fetch(PDO::FETCH_ASSOC);
  
  $sqluser = $conn->prepare("SELECT COUNT(user_id) FROM `tbl_user_info`");
  $sqluser->execute();
  $datauser = $sqluser->fetch(PDO::FETCH_ASSOC);
  
  $sqlblood = $conn->prepare("SELECT COUNT(bank_id) FROM `tbl_blood_bank_info`");
  $sqlblood->execute();
  $datablood = $sqlblood->fetch(PDO::FETCH_ASSOC);
  
  //echo "<pre>";print_r($datauser);exit;
?>

<?php
    include("sidebar.php");
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
    <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Welcome <?php echo $_SESSION['name'];?> , Love to see you back. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box ">
                    <img src="../assets/images/donor.jpg" style="height:100px;width:100px;border-radius:50%;margin-top:0px; float: left;" height="50" width="50">
                </span>
                <div class="text-box" style="padding-left: 140px;">
                    <p class="main-text" style="font-size:28px;color:#FF5733;">Total : <?php echo $data['COUNT(doner_id)']; ?></p>
                    <p class="text-muted" style="font-size:24px;">Donors</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box ">
                    <img src="../assets/images/user.png" style="height:100px;width:100px;border-radius:50%;margin-top:0px; float: left;" height="50" width="50">
                </span>
                <div class="text-box" style="padding-left: 140px;">
                    <p class="main-text" style="font-size:28px;color:#FF5733;">Total : <?php echo $datauser['COUNT(user_id)']; ?></p>
                    <p class="text-muted" style="font-size:24px;">Users</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box ">
                    <img src="../assets/images/user.png" style="height:100px;width:100px;border-radius:50%;margin-top:0px; float: left;" height="50" width="50">
                </span>
                <div class="text-box" style="padding-left: 140px;">
                    <p class="main-text" style="font-size:28px;color:#FF5733;">Total : <?php echo $datablood['COUNT(bank_id)']; ?></p>
                    <p class="text-muted" style="font-size:24px;">Blood Bank</p>
                </div>
             </div>
		     </div>
                    
			</div>
                        
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
       
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
<?php
  }
?>