<?php
if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $blood_group = $_POST['blood_group'];
	$image_url='There is no image';
    $location = $_POST['location'];
	
	// Image Upload Start...........................
    if (isset($_FILES['image'])) {
        //echo "<pre>";
        //print_r($_FILES); exit;
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp =  $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
		$file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
		
		//$img = explode('.',$file_name);
		//echo "<pre>";
        //print_r($img); 
		//exit;
        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            $loacation = 'assets/doner_img/';
            $img_name = rand();
            $image_url = $loacation.$img_name.'.'.$file_ext;

            move_uploaded_file($file_tmp, $image_url);
            //echo "Success";
			//exit;
        } else {
            print_r($errors);
        }
    }

    // Image Upload end .......................

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($password) && !empty($age)  && !empty($sex) && !empty($blood_group) && !empty($location)) {
				$data = array($name,$email, $phone, $password, $age, $sex, $blood_group, $image_url, $location,'1');
				$sql = "insert into tbl_doner_info(doner_name,doner_email,doner_phone,password,age,gender,blood_group,img_url,location,activation_status)values(?,?,?,?,?,?,?,?,?,?)";
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
?>	
	
	<!--------------------- Start Doner Registration form -------------------->		

        <div class="container"> 
            <div class="row"  style="padding:0px 30px 0px 30px;background:#faf4f6;">
				<div class="col-sm-12" align="left"style="color:#57649b; padding-top:10px!important; padding-left:0px!important; padding-bottom:10px!important;">
					<h2>Doner Registration form</h2>
				</div>
				<div class="col-sm-12" style="border:1.5px #e0d0d7 solid; border-radius:4px; padding-bottom:15px; padding-top:15px; margin:0px;box-shadow:-2px 10px 20px -8px #661637 ;">

					<?php if(isset($sms)){echo $sms;} ?>
					<form method="post" action="#" enctype="multipart/form-data">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="name">Name:</label>
								<div>
									<input type="name" class="form-control" name="name" id="name" placeholder="Enter Name" />
								</div>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="email">Email:</label>
								<div>
									<input type="email" class="form-control" name="email" id="email" placeholder="Enter email" />
								</div>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="phone">Phone number:</label>
									<div>
										<input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone No" />
									</div>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label for="pwd">Password:</label>
								<input type="password" class="form-control" name="password" id="pwd " placeholder="Enter Password" />
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="age">Age:</label> 
								<div> 
									<input type="number" class="form-control" id="age" name="age" placeholder="Enter your age" />
								</div>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="pwd">Sex:</label>								
									<select class="form-control" name="sex" id="sel1">
										<option>MALE</option>
										<option>FEMALE</option>										
									</select>								
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="bgroup" placeholder="Enter Your Blood Group">Blood group:</label>								
										<select class="form-control" name="blood_group" id="blood_group">
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
								<div> 
									<input type="file" class="form-control" name="image" id="image" class="img">
								</div>
							</div>
						</div>
					   
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="location">Location:</label>
								<div> 
									<input type="text" class="form-control" name="location" id="location" class="location" placeholder="Enter Your Location">
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="form-group"> 
								<div>
									<label class="control-label" for="pwd">Plz Submit Your Informaion</label>
									<button type="submit" name="btn" class="btn btn-success btn-block">Registration</button>
								</div>
							</div>
						</div>
					</form>
				</div>
            </div>
        </div>
		<!------------------------ End Doner Registration form ------------------>