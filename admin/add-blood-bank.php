<!--------------------- Start Add Blood bank form ------------------->	
<?php

if (isset($_POST['btn'])) {
    $name = $_POST['name'];
	$category = $_POST['category'];
	$district = $_POST['district'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
    $email = $_POST['email'];	
    	

    if (!empty($name) && !empty($category) && !empty($district) && !empty($address) && !empty($phone) && !empty($email)) 
	{	
		try{	
				$data = array($name,$category,$district,$address,$phone,$email);
				$sql = "insert into tbl_blood_bank_info(bank_name,category,district,address,phone_no,email)values(?,?,?,?,?,?)";
				$stmt = $conn->prepare($sql);
				$end = $stmt->execute($data);
				if ($end) {
				   $sms = '<div class="alert alert-success alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Indicates a successful or positive action.</div>';
				} else {
					$sms = '<div class="alert alert-danger alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Indicates a unsuccessful or negative action.</div>';
				}
			}catch(PDOException $e){
				 echo "Your operation is failed: " . $e->getMessage();
			}
				
    } else {
		$sms = '<div class="alert alert-warning alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Sorry you must fillup all the field .....</div>';
    }
}
?>	


<!--------------------- Start Add Blood Bank form ------------------->	
	<div class="panel panel-default">	
		<div class="panel-heading bg-info"><p style="font-size:20px;color:green;">Create Blood Bank Form</p></div>
		<div class="panel-body">
		
			<?php if(isset($sms)){echo $sms;} ?>
			
			<form method="post" action="#" enctype="multipart/form-data">
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label" for="name">Name:</label>
						<div>
							<input type="text" class="form-control" name="name" id="name" placeholder="Enter name...">
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
							<input type="text" class="form-control" name="district" id="district" placeholder="Enter district...">
						</div>
					</div>
				</div>
				
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label" for="address">Address:</label>
						<div>
							<input type="text" class="form-control" name="address" id="address" placeholder="Enter Address...">
						</div>
					</div>
				</div>
				
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label" for="phone">Phone number:</label>
						<div>
							<input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone number...">
						</div>
					</div>
				</div>
				
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label" for="email">Email:</label>
						<div>
							<input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
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