<!--------------------- Update Blood Bank form ------------------->	
<?php
if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $district = $_POST['district'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];	
    $password = $_POST['password'];
	
	 if (!empty($name) && !empty($category) &&!empty($district) &&!empty($address) && !empty($phone) && !empty($email) && !empty($password))
	{
				$data = array($name,$category, $district, $address, $phone, $email, $password);
				$sql = "UPDATE tbl_blood_bank_info SET bank_name='$name', category='$category', district='$district', address='$address', phone_no='$phone',bank_email='$email',password='$password' WHERE bank_id='$bankid'";
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


	<div class="panel panel-default">	
		<div class="panel-heading bg-info"><p style="font-size:20px;color:green;">Update Profile Form</p></div>
		<div class="panel-body">
			<?php if(isset($sms)){echo $sms;} ?>
				<form method="post" action="#" enctype="multipart/form-data">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="name">Name:</label>
								<div>
									<input type="text" class="form-control" name="name" id="name" value="<?php echo $value['bank_name']; ?>"/>
								</div>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="category">Category:</label>
								<div>
									<input type="text" class="form-control" name="category" id="category" value="<?php echo $value['category']; ?>"/>
								</div>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="district">District:</label>
									<div>
										<input type="text" name="district" class="form-control" id="district" value="<?php echo $value['district']; ?>"/>
									</div>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="address">Address:</label>
								<input type="text" class="form-control" name="address" value="<?php echo $value['address']; ?>"/>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="age">Phone No:</label> 
								<div> 
									<input type="phone" class="form-control" id="phone" name="phone" value="<?php echo $value['phone_no']; ?>"/>
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="email">Email:</label> 
								<div> 
									<input type="email" class="form-control" id="email" name="email" value="<?php echo $value['bank_email']; ?>"/>
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="form-group">
								<label for="pwd">Password:</label>
								<input type="password" class="form-control" name="password" id="pwd " value="<?php echo $value['password']; ?>"/>
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
					
