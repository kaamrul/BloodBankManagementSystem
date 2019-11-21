<?php
if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $blood_group = $_POST['blood_group'];
	$image_url=$value['img_url'];
    $location = $_POST['location'];
	
	// Image Upload Start...........................
    if (isset($_FILES['image'])) {

        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp =  $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
		$file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            //$errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            $image = '../'.$image_url;
            move_uploaded_file($file_tmp, $image);
            //echo "Success";
			//exit;
        } else {
            print_r($errors);
        }
    }

    // Image Upload end .......................

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($password) && !empty($age)  && !empty($sex) && !empty($blood_group) && !empty($location)) {
				$data = array($name,$email, $phone, $password, $age, $sex, $blood_group, $image_url, $location);
				$sql = "UPDATE tbl_doner_info SET doner_name='$name',doner_email='$email',doner_phone='$phone',password='$password',age='$age',gender='$sex',blood_group='$blood_group',img_url='$image_url',location='$location' WHERE doner_id='$donerid'";
				$stmt = $conn->prepare($sql);
				$end = $stmt->execute($data);
				if ($end) {
				   $sms = '<div class="alert alert-success alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Indicates a successful or positive action.</div>';
				} else {
					$sms = '<div class="alert alert-danger alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Indicates a unsuccessful or negative action.</div>';
				}
    } else {
		$sms = '<div class="alert alert-warning alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Sorry you must fillup all the field .....</div>';
    }
}

if (isset($_POST['btn'])) {
	$sql = $conn->prepare("select * from tbl_doner_info where doner_id='$donerid'");
		$sql->execute();
		$value = $sql->fetch(PDO::FETCH_ASSOC);
	//echo "<pre>";print_r($data);exit;
	$image_url=$value['img_url'];
}
?>	


		<div class="panel panel-default">
			<div class="panel-heading bg-info"><p style="font-size:20px;color:green;">Update profile form</p></div>	
			<div class="panel-body">
				<?php if(isset($sms)){echo $sms;} ?>
					<form method="post" action="#" enctype="multipart/form-data">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="name">Name:</label>
								<div>
									<input type="name" class="form-control" name="name" id="name" value="<?php echo $value['doner_name']; ?>"/>
								</div>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="email">Email:</label>
								<div>
									<input type="email" class="form-control" name="email" id="email" value="<?php echo $value['doner_email']; ?>"/>
								</div>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="phone">Phone number:</label>
									<div>
										<input type="phone" name="phone" class="form-control" id="phone" value="<?php echo $value['doner_phone']; ?>"/>
									</div>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label for="pwd">Password:</label>
								<input type="password" class="form-control" name="password" id="pwd" value="<?php echo $value['password']; ?>"/>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="age">Age:</label> 
								<div> 
									<input type="number" class="form-control" id="age" name="age" value="<?php echo $value['age']; ?>"/>
								</div>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="pwd">Sex:</label>								
									<select class="form-control" name="sex" id="sel1">
										<option><?php echo $value['gender']; ?></option>
										<option>MALE</option>
										<option>FEMALE</option>										
									</select>								
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="bgroup">Blood group:</label>								
										<select class="form-control" name="blood_group" id="blood_group">
										<option><?php echo $value['blood_group']; ?></option>
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
								<img src="../<?php echo $image_url; ?>" height="50" width="50">
								<div> 
									<input type="file" class="form-control" name="image" id="image" class="img">
								</div>
							</div>
						</div>
					   
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="location">Location:</label>
								<div> 
									<input type="text" class="form-control" name="location" value="<?php echo $value['location']; ?>" id="location" class="location"/>
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="form-group"> 
								<div>
									<label class="control-label" for="pwd">Plz Submit Your Informaion</label>
									<button type="submit" name="btn" class="btn btn-success btn-block">Update Profile</button>
								</div>
							</div>
						</div>
					</form>
						</div>
</div>
