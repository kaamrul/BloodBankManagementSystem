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
					<div class="col-md-12 col-sm-12 small-footer"><p>&copy Copy Right by - <a href="">N.I.Biz Soft.</a></p></div>
				</div>

				<!-------- Small Footer End ---------->

			</div>
				
				
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- js-->
	    <script src="assets/js/jquery-2.2.3.min.js"></script>
    <!-- js-->

    <!-- stats -->
	    <script src="assets/js/jquery.waypoints.min.js"></script>
	    <script src="assets/js/jquery.countup.js"></script>
		<script>
			$('.counter').countUp();
		</script>
    <!-- //stats -->
		
    </body>
</html>