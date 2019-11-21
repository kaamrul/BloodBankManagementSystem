<!-------- Update Doner  -------->
<?php
	$id = $_GET['id'];
	$sql = $conn->prepare("SELECT * FROM tbl_doner_info WHERE doner_id='$id'");
	$sql->execute();
	$data = $sql->fetch(PDO::FETCH_ASSOC);
	//echo "<pre>";print_r($data);exit;
	$image_url=$data['img_url'];
		 
if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];	
    $password = $_POST['password'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['blood_group'];
    $location = $_POST['location'];
	
    if (!empty($name) && !empty($email) && !empty($phone) && !empty($password) && !empty($age) && !empty($gender) && !empty($blood_group) && !empty($location)) 
	{
		$sql = "UPDATE tbl_doner_info SET doner_name='$name',doner_email='$email',doner_phone='$phone',password='$password', age='$age',gender='$gender',blood_group='$blood_group', img_url='$image_url' , location='$location' WHERE doner_id='$id'";
		$stmt = $conn->prepare($sql);
		$end = $stmt->execute();
		if ($end) 
		{
		   $sms = '<div class="alert alert-success alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Data has been successfully update!</strong> </div>';
		   //header('location:index.php');
		} else {
			$sms = '<div class="alert alert-danger alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Data submission unsuccessful</strong> Indicates a unsuccessful or negative action.</div>';
		}
    } else {
		$sms = '<div class="alert alert-warning alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Sorry you must fillup all the field .....</div>';
    }
}

@$doner_id= $id;
if (isset($_POST['btn'])) {
	$sql = $conn->prepare("SELECT * FROM tbl_doner_info WHERE doner_id='$doner_id'");
	$sql->execute();
	$data = $sql->fetch(PDO::FETCH_ASSOC);
	//echo "<pre>";print_r($data);exit;
	$image_url=$data['img_url'];
}
?>	

<!-------- Update Doner design  -------->
            							
<?php if(isset($sms)){echo $sms;} ?>
<div class="panel panel-default">
	<div class="panel-heading bg-info"><p style="font-size:20px;color:green;">Update Doner Info</p></div>
	<div class="panel-body">
		<form method="post" action="#" enctype="multipart/form-data">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="name">Name:</label>
								<div>
									<input type="text" class="form-control" name="name" id="name" value="<?php echo $data['doner_name']; ?>" placeholder="Enter name"/>
								</div>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="email">Email:</label>
								<div>
									<input type="text" class="form-control" name="email" id="email" value="<?php echo $data['doner_email']; ?>" placeholder="Enter email">
								</div>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="phone">Phone number:</label>
									<div>
										<input type="text" name="phone" class="form-control" id="phone" value="<?php echo $data['doner_phone']; ?>" placeholder="Enter Phone No">
									</div>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label for="pwd">Password:</label>
								<input type="password" class="form-control" name="password" id="pwd " value="<?php echo $data['password']; ?>" placeholder="Enter Password">
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="age">Age:</label> 
								<div> 
									<input type="text" class="form-control" id="age" name="age" value="<?php echo $data['age']; ?>" placeholder="Enter your age">
								</div>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="pwd">Sex:</label>								
									<select class="form-control" name="gender" id="sel1">
										<option><?php echo $data['gender']; ?></option>
										<option>MALE</option>
										<option>FEMALE</option>										
									</select>								
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="bgroup" placeholder="Enter Your Blood Group">Blood group:</label>								
										<select class="form-control" name="blood_group" id="blood_group">
										<option><?php echo $data['blood_group']; ?></option>
										<option>A+</option>
										<option>A-</option>										
										<option>B+</option>										
										<option>B-</option>										
										<option>O+</option>										
										<option>O-</option>										
										<option>AB+</option>										
										<option>AB-</option>										
									</select>									
							</div>
						</div>
					   
					   
						 <div class="col-sm-6">
					<div class="form-group">
						<label class="control-label" for="img">Image:</label>
						<img src="../<?php echo $image_url; ?>" height="50px" width="50px">
						<div> 
							<input type="file" class="form-control" name="image" id="image" class="img">
						</div>
					</div>
				</div>	
					   
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="location">Location:</label>
								<div> 
									<input type="text" class="form-control" name="location" id="location" value="<?php echo $data['location']; ?>" class="location" placeholder="Enter Your Location">
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="form-group"> 
								<div>
									<label class="control-label" for="pwd">Plz Submit Your Informaion</label>
									<button type="submit" name="btn" class="btn btn-success btn-block">Update</button>
								</div>
							</div>
						</div>
					</form>
	</div>
						
</div>

