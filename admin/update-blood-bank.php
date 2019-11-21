<!-------- Update Blood Bank  -------->
<?php
	$id = $_GET['id'];
	$sql = $conn->prepare("SELECT * FROM tbl_blood_bank_info WHERE bank_id='$id'");
	$sql->execute();
	$data = $sql->fetch(PDO::FETCH_ASSOC);
	//echo "<pre>";print_r($data);exit;

		 
if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $district = $_POST['district'];	
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

	
    if (!empty($name) && !empty($category) && !empty($district) && !empty($address) && !empty($phone) && !empty($email)) 
	{
		$sql = "UPDATE tbl_blood_bank_info SET bank_name='$name',category='$category',district='$district',address='$address', phone_no='$phone',bank_email='$email'";
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

@$bank_id= $id;
if (isset($_POST['btn'])) {
	$sql = $conn->prepare("SELECT * FROM tbl_blood_bank_info WHERE bank_id='$bank_id'");
	$sql->execute();
	$data = $sql->fetch(PDO::FETCH_ASSOC);
	//echo "<pre>";print_r($data);exit;

}
?>	

<!-------- Update Blood Bank design  -------->
            							
<?php if(isset($sms)){echo $sms;} ?>
<div class="panel panel-default">
	<div class="panel-heading bg-info"><p style="font-size:20px;color:green;">Update Blood Bank Info</p></div>
	<div class="panel-body">
		<form method="post" action="#" enctype="multipart/form-data">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="name">Name:</label>
								<div>
									<input type="text" class="form-control" name="name" id="name" value="<?php echo $data['bank_name']; ?>" placeholder="Enter Name...">
								</div>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="category">Category:</label>
								<div>
									<input type="text" class="form-control" name="category" id="category"  value="<?php echo $data['category']; ?>"  placeholder="Enter category...">
								</div>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="district">District:</label>
									<div>
										<input type="text" name="district" class="form-control" id="district" value="<?php echo $data['district']; ?>" placeholder="Enter district...">
									</div>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="address">Address:</label>
								<input type="text" class="form-control" name="address" value="<?php echo $data['address']; ?>" placeholder="Enter Address..."></textarea>
							</div>
						</div>
					  
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="age">Phone No:</label> 
								<div> 
									<input type="phone" class="form-control" id="phone" name="phone" value="<?php echo $data['phone_no']; ?>" placeholder="Enter phone number...">
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="email">Email:</label> 
								<div> 
									<input type="email" class="form-control" id="email" name="email" value="<?php echo $data['bank_email']; ?>" placeholder="Enter email...">
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

