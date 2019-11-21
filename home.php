<?php

	$location = $conn->prepare("SELECT DISTINCT location FROM tbl_doner_info");
	$location->execute();
	$location_value = $location->fetchAll();
		 //echo "<pre>";print_r($value);exit;
?>			
				
<!---- Start Slide ---->

<div class="container"> 
    <div class="row"  style="margin-bottom:0px;">
        <div class="col-md-12" style="padding-right:0px !important;padding-left:0px!important;">
            <div class="carousel slide" data-ride="carousel" data-interval="3000" id="myslide">
                <ol class="carousel-indicators">
                    <li data-target="#myslide" data-slide-to="0"></li>
                    <li data-target="#myslide" data-slide-to="1"></li>
                    <li data-target="#myslide" data-slide-to="2"></li>
                    <li data-target="#myslide" data-slide-to="3"></li>
                    <li data-target="#myslide" data-slide-to="4"></li>
                    <li data-target="#myslide" data-slide-to="5"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="assets/slider_img/banner1.jpg" class="slide-img" style="height: 535px;width: 100%;">                               
                    </div>

                    <div class="item">
                        <img src="assets/slider_img/banner2.jpg" class="slide-img" style="height: 535px;width: 100%;">                                
                    </div>

                    <div class="item">
                        <img src="assets/slider_img/banner3.jpg" class="slide-img" style="height: 535px;width: 100%;">                               
                    </div>

                    <div class="item">
                        <img src="assets/slider_img/banner4.jpg" class="slide-img" style="height: 535px;width: 100%;">                               
                    </div>
                    <div class="item">
                        <img src="assets/slider_img/banner5.jpg" class="slide-img" style="height: 535px;width: 100%;">                               
                    </div>
                    <div class="item">
                        <img src="assets/slider_img/banner6.jpg" class="slide-img" style="height: 535px;width: 100%;">                               
                    </div>
                </div>
                <a href="#myslide" class="carousel-control left" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a href="#myslide" class="carousel-control right" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
    </div>
</div>
	
<!--- End Slide --->


<!--Start Search Filter-->

<div class="container" style="padding-right:0px !important;padding-left:0px!important;">
    <div class="row">
        <form action="search.php" method="POST">
            <div class="col-md-12">
                <div class="search-filter" style="padding-left: 65px;">
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
            </div>
        </form>
		
	</div>
</div>
		
<!------------------End Search Filter------------------->
				
				
<!---------------------- Doners list Start ---------------------->

<!-- New Donor List -->



<section class="details-books py-5" style="margin-left: 50px; margin-right: 50px;">
    <div class="container py-md-4 mt-md-3">
        <h2 class="heading-agileinfo">New Donor List<span>Send Request to the Donor</span></h2>
            <span class="w3-line black"></span>
        <div class="row mt-md-5 pt-4">

            <!-- Team -->

            <div class="team">
                <div class="team_background parallax-window" data-parallax="scroll" data-image-src="assets/images/images.jpg" data-speed="0.8"></div>
                
                <div class="container">
                    <div class="row team_row">
                
                        <?php
                            foreach($value_doner as $v)
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

                                    <div class="team_subtitle">Status: <?php echo $v['activation_status']; ?> </div>

                                    <!-- <div class="team_subtitle">Status: <?php echo ($v['activation_status']==1) ?"Available": "Not Availble" ?></div> -->

                                    <div class="team_subtitle">
                                        <a href="index.php?page=blood-request&id=<?php echo $v['doner_id']; ?>" class="btn btn-success">Send Request </a>
                                    </div>
                            
                                </div>
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

<!---------------------- Request list Start ---------------------->

<?php   
    $request = $conn->prepare( "SELECT blood_request.*, tbl_user_info.user_name
        FROM blood_request
        INNER JOIN tbl_user_info
        ON blood_request.user_id = tbl_user_info.user_id
        ORDER BY request_id DESC LIMIT 6");
    $request->execute();
    $request_value = $request->fetchAll();
?>


<section class="details-books py-5" style="margin-left: 50px; margin-right: 50px;">
    <div class="container py-md-4 mt-md-3">
        <h2 class="heading-agileinfo">New Request List<span>Please Response Request & Donate Blood</span></h2>
            <span class="w3-line black"></span>
        <div class="row mt-md-5 pt-4">

            <!-- Team -->

            <div class="team">
                <div class="team_background parallax-window" data-parallax="scroll" data-image-src="assets/images/images.jpg" data-speed="0.8"></div>
                
                <div class="container">
                    <div class="row team_row">
                
                        <?php  
                            foreach($request_value as $value)
                        {
                        ?>

                        <!-- Team Item -->
                        <div class="col-lg-4 col-md-4 team_col">
                            <div class="team_item">
                                <div class="team_body" style="padding-top: 20px; padding-left: 25px; padding-right: 15px; text-align: left;">
                                    <div class="team_title" style="padding-bottom: 5px; text-align: center;"><a href="#"><?php echo $value['user_name']; ?></a></div>
                                    <div class="team_subtitle"><strong>Blood Group:</strong> <?php echo $value['blood_group']; ?></div>
                                    <div class="team_subtitle"><strong>Amount:</strong> <?php echo $value['amount']; ?></div>
                                    <div class="team_subtitle"><strong>Donation Date:</strong> <?php echo $value['req_date']; ?></div>
                                    <div class="team_subtitle"><strong>Patient's Location:</strong> <?php echo $value['location']; ?></div>
                                    <div class="team_subtitle"><strong>Contact Number:</strong> <?php echo $value['phone']; ?></div>
                                    <div class="team_subtitle"><strong>More Message:</strong> <?php echo $value['message']; ?></div>
                                    <div class="team_subtitle"><strong>Status:</strong> <?php echo $value['status']; ?></div>
                                </div>
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

<!----------- Request list End ------------->


<!-- clients -->
    <section class="features py-md-5" style="background-color: #e5e5e5; padding-left: 33px; padding-right: 33px;">
        <div class="container py-md-4 mt-md-3">
            <h3 class="heading-agileinfo text-white">Our Awesome Testimonials <span class="text-white">Speed Up the BBMS Process</span></h3>
            <span class="w3-line black"></span>
            <div class="container py-md-4 mt-md-3">
                <div class="row inner_w3l_agile_grids-1">

            <!------------  ------------>
                    <div class="col-lg-2 col-sm-6 w3layouts_stats_left w3_counter_grid">
                        <p class="counter">2018</p>
                        <h3>Year of Foundation</h3>
                    </div>

            <!------------  ------------>
                    <?php
                        $sql = $conn->prepare("SELECT COUNT(doner_id) FROM `tbl_doner_info`");
                        $sql->execute();
                        $data = $sql->fetch(PDO::FETCH_ASSOC);
                    ?>

                    <div class="col-lg-2 col-sm-6 w3layouts_stats_left w3_counter_grid1">
                        <p class="counter"><?php echo $data['COUNT(doner_id)']; ?></p>
                        <h3>Total Donors</h3>
                    </div>

            <!------------  ------------>
                    <?php
                        $sql = $conn->prepare("SELECT COUNT(request_id) FROM `blood_request`");
                        $sql->execute();
                        $data = $sql->fetch(PDO::FETCH_ASSOC);
                    ?>
                    
                    <div class="col-lg-2 col-sm-6 w3layouts_stats_left w3_counter_grid2">
                        <p class="counter"><?php echo $data['COUNT(request_id)']; ?></p>
                        <h3>Total Request</h3>
                    </div>

            <!------------  ------------>

            <?php
                $month_begin = date('Y-m-01 00:00:00',strtotime('this month'));
                $month_end = date('Y-m-30 11:59:59',strtotime('this month'));
                $report_query = "SELECT blood_request.doner_id, blood_request.user_id, blood_request.date, blood_request.status, tbl_doner_info.doner_id, tbl_doner_info.location, tbl_doner_info.doner_name, tbl_doner_info.blood_group,  tbl_user_info.user_id, tbl_user_info.user_name FROM blood_request, tbl_user_info, tbl_doner_info WHERE blood_request.date BETWEEN '".$month_begin."' AND '".$month_end."' AND blood_request.user_id=tbl_user_info.user_id AND blood_request.doner_id=tbl_doner_info.doner_id AND blood_request.status='accepted'";
                $doner = $conn->prepare($report_query);
                $doner->execute();
                $doner_value = $doner->fetchAll();
            ?>
                    <div class="col-lg-2 col-sm-6 w3layouts_stats_left w3_counter_grid2">
                        <p class="counter"><?php echo count($doner_value); ?></p>
                        <h3>Total Accept</h3>
                    </div>

            <!------------  ------------>

            
                    <div class="col-lg-2 col-sm-6 w3layouts_stats_left w3_counter_grid2">
                        <p class="counter">130</p>
                        <h3>Most Requested <br>Blood</h3>
                    </div>

            <!------------  ------------>
                    <div class="col-lg-2 col-sm-6 w3layouts_stats_left w3_counter_grid2">
                        <p class="counter">165</p>
                        <h3>Less Requested <br>Blood</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- clients -->


<!-- Cmapaigns -->

<?php   
    $camp = $conn->prepare("SELECT tbl_camp_info.*,tbl_blood_bank_info.bank_name FROM tbl_camp_info,tbl_blood_bank_info where tbl_camp_info.bank_id=tbl_blood_bank_info.bank_id ORDER BY camp_id DESC LIMIT 3");
    $camp->execute();
    $camp_value = $camp->fetchAll();
?>

    <section class="wthree-row w3-about py-5" style="margin-left: 47px; margin-right: 47px;">
        <div class="container py-md-4 mt-md-3">
            <h3 class="heading-agileinfo">Latest Campaigns from Blood Bank<span>Speed Up the Blood Bank Process</span></h3>
            <span class="w3-line black"></span>
            <div class="card-deck mt-md-5 pt-5">

                <?php 
                  $i=1;
                    foreach($camp_value as $value)
                    {
                  ?>

                <div class="card">
                    <img src="<?php echo $value['img_url']; ?>" class="img-fluid" alt="Card image cap" style="height: 200px;">
                    <div class="card-body w3ls-card">
                        <h5 class="card-title"><?php echo $value['bank_name'];?></h5>
                        <p class="card-text mb-3 ">Venue: <?php echo $value['venue'];?><br>Area: <?php echo $value['camp_area']; ?></p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">Date: <?php echo $value['date']; ?></small>
                      <small class="text-muted" style="float: right;">Date: <?php echo $value['time']; ?></small>
                    </div>
                </div>

                <?php
                    $i++;
                    }
                ?>                
                
                </div>
            </div>
        </section>
<!-- //campaigns -->

