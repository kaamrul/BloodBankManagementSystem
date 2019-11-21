<?php
    $month_begin = date('Y-m-01 00:00:00',strtotime('this month'));
    $month_end = date('Y-m-30 11:59:59',strtotime('this month'));
    $report_query = "SELECT blood_request.doner_id, blood_request.user_id, blood_request.date, blood_request.status, tbl_doner_info.doner_id, tbl_doner_info.location, tbl_doner_info.doner_name, tbl_doner_info.blood_group,  tbl_user_info.user_id, tbl_user_info.user_name FROM blood_request, tbl_user_info, tbl_doner_info WHERE blood_request.date BETWEEN '".$month_begin."' AND '".$month_end."' AND blood_request.user_id=tbl_user_info.user_id AND blood_request.doner_id=tbl_doner_info.doner_id";
    $doner = $conn->prepare($report_query);
    $doner->execute();
    $doner_value = $doner->fetchAll();
?>


<?php
    include("sidebar.php");
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Blood Request Report</h2>   
                        <h5>Welcome Jhon Deo , Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Print
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th scope="col">SL</th>
                                            <th scope="col">User Name</th>                   
                                            <th scope="col">Donor Name</th> 
                                            <th scope="col">Blood Group</th>    
                                            <th scope="col">Date</th>                     
                                            <th scope="col">Location</th>
                                            <th scope="col">Status</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php 
                                          $i=1;
                                            foreach($doner_value as $value)
                                            {
                                          ?>
                                            <tr>
                                                <th scope="row"><?php echo $i; ?></th>
                                                <td><?php echo $value['user_name']; ?></td>
                                                <td><?php echo $value['doner_name']; ?></td>
                                                <td><?php echo $value['blood_group']; ?></td>
                                                <td><?php echo $value['date']; ?></td>
                                                <td><?php echo $value['location']; ?></td>                                        
                                                <td><?php echo $value['status']; ?></td>                                          
                                            </tr>
                                            <?php
                                            $i++;
                                            }
                                            ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
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
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
