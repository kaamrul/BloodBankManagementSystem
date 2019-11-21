<!-------- View donor -------->
<?php
	
	$id = $_GET['id'];
	$sql = $conn->prepare("SELECT * FROM tbl_doner_info WHERE doner_id='$id'");
	$sql->execute();
	$data = $sql->fetch(PDO::FETCH_ASSOC);
	// echo "<pre>";print_r($data);exit;
?>	
	<div class="container" style="padding-right:0px !important;padding-left:0px!important;">
			<section class="business-feat">           
                           
                <div class="row"> 
					<div class="col-md-4 col-sm-6">                       
						<div class="feat-item">
							<div class="feat-item-cont">
									<img src="<?php echo $data['img_url']; ?>">
								<h4 class="text-bold"><a href=""><?php echo $data['doner_name']; ?></a></h4>
								<p><i class="fa fa-arrow-circle-right color-main"></i><strong> Blood Group:</strong> <?php echo $data['blood_group']; ?></p>
								<p><i class="fa fa-arrow-circle-right color-main"></i><strong> Age:</strong> <?php echo $data['age']; ?></p>
								<p><i class="fa fa-arrow-circle-right color-main"></i><strong> Sex:</strong> <?php echo $data['gender']; ?></p>
								<p><i class="fa fa-arrow-circle-right color-main"></i><strong> Location:</strong> <?php echo $data['location']; ?></p>
								<a href="index.php?page=blood-request&id=<?php echo $data['doner_id']; ?>" class="btn btn-success">Send Request </a>
							</div>
						</div>                       
					</div>                       
				</div> 
			</section>
    </div> 