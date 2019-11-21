<?php
if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $district = $_POST['district'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
	$image_url='There is no image';
    $available_unit = $_POST['available_unit'];
	
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
            $errors[] = "extension not allowed, please choose a JPEG, JPG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            $loacation = 'assets/blood_bank_img/';
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

    if (!empty($name) && !empty($category) && !empty($district) && !empty($address) && !empty($phone) && !empty($email)) {
				$data = array($name,$category, $district, $address, $phone, $email, $password, $image_url, $available_unit);
				$sql = "insert into tbl_blood_bank_info(name,category,district,address,phone_no,email,password,img_url,available_unit)values(?,?,?,?,?,?,?,?,?)";
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
	
	<!--------------------- Start User Registration form ------------------->		
        <div class="container"> 
            <div class="row"  style="padding:0px 90px 20px 90px;background:#f4f4f4;">
				<div class="col-sm-12" align="center"style="color:#2328E1;padding-top:0px!important; padding-bottom:20px!important;"><h2>Blood Bank Registration form</h2></div>
					<?php if(isset($sms)){echo $sms;} ?>
					<form method="post" action="#" enctype="multipart/form-data">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="name">Name:</label>
								<div>
									<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name...">
								</div>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="category">Category:</label>
								<div>
									<input type="text" class="form-control" name="category" id="category" placeholder="Enter category...">
								</div>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="district">District:</label>
									<div>
										<input type="text" name="district" class="form-control" id="district" placeholder="Enter district...">
									</div>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="address">Address:</label>
								<textarea class="form-control" name="address" rows="1" placeholder="Enter Address..."></textarea>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="age">Phone No:</label> 
								<div> 
									<input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter phone number...">
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="email">Email:</label> 
								<div> 
									<input type="email" class="form-control" id="email" name="email" placeholder="Enter email...">
								</div>
							</div>
						</div>
					  
					    <div class="col-sm-6">
							<div class="form-group">
								<label for="pwd">Password:</label>
								<input type="password" class="form-control" name="password" id="pwd " placeholder="Enter Password">
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
								<label for="unit">Available unit:</label>
								<input type="number" class="form-control" name="available_unit" placeholder="Enter available unit...">
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
		<!------------------------ End Doner Registration form ------------------>