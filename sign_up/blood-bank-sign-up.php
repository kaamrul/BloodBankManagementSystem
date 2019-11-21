<?php
if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $district = $_POST['district'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
	
	

    if (!empty($name) && !empty($category) && !empty($district) && !empty($address) && !empty($phone) && !empty($email) && !empty($password)) {
			try{
				$data = array($name,$category, $district, $address, $phone, $email,  $password);
				$sql = "INSERT INTO tbl_blood_bank_info(bank_name,category,district,address,phone_no,bank_email,password)values(?,?,?,?,?,?,?)";
				$stmt = $conn->prepare($sql);
				$end = $stmt->execute($data);
				if ($end) {
				   $sms = '<div class="alert alert-success alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Indicates a successful or positive action.</div>';
				} 
			}catch(PDOException $e){
				$sms = "Error ......".$e->getMessage();
			}
    } else {
		$sms = '<div class="alert alert-warning alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Sorry you must fillup all the field .....</div>';
    }
}
?>	
	
	<!--------------------- Start User Registration form -------------------->	

        <div class="container"> 
            <div class="row"  style="padding:0px 30px 0px 30px;background:#faf4f6;">
				<div class="col-sm-12" align="left"style="color:#57649b; padding-top:10px!important; padding-left:0px!important; padding-bottom:10px!important;">
					<h2>Blood Bank Registration form</h2>
				</div>
				<div class="col-sm-12" style="border:1.5px #e0d0d7 solid; border-radius:4px; padding-bottom:15px; padding-top:15px; margin:0px;box-shadow:-2px 10px 20px -8px #661637 ;">

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
								<input type="text" class="form-control" name="address" placeholder="Enter Address..."></textarea>
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
        </div>
		<!------------------------ End Doner Registration form ------------------>