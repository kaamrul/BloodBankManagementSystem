<!--------------------- Start Create Admin form ------------------->	
<?php

if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
	$image_url='There is no image';
    $password = $_POST['password'];
    $status = 1;
    
	
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
            $loacation = '../assets/admin_img/';
            $img_name = rand();
            $image_url = $loacation.$img_name.'.'.$file_ext;

            move_uploaded_file($file_tmp, $image_url);
           // echo "Success";
			//exit;
        } else {
            print_r($errors);
        }
    }

    // Image Upload end .......................
	

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($password)) 
	{
		$data = array($name,$email,$phone,$password,$image_url,$status);
		$sql = "insert into tbl_admin_info(name,email,phone_number,password,img_url,activation_status)values(?,?,?,?,?,?)";
		$stmt = $conn->prepare($sql);
		$end = $stmt->execute($data);
		if ($end) 
		{
		   $sms = '<div class="alert alert-success alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Indicates a successful or positive action.</div>';
		   //header('location:index.php');
		    
		} 
		else 
		{
			$sms = '<div class="alert alert-danger alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Indicates a unsuccessful or negative action.</div>';
		}
    } 
	else 
	{
		$sms = '<div class="alert alert-warning alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Sorry you must fillup all the field .....</div>';
    }
}
?>	


<!--------------------- Start Create Admin form ------------------->	
	<div class="panel panel-default">	
		<div class="panel-heading bg-info"><p style="font-size:20px;color:green;">Create admin form</p></div>
		<div class="panel-body">
			<?php if(isset($sms)){echo $sms;} ?>
			<form method="post" action="#" enctype="multipart/form-data">
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label" for="name">Name:</label>
						<div>
							<input type="text" class="form-control" name="name" id="email" placeholder="Enter name">
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
						<label class="control-label" for="phone">Phone number:</label>
						<div>
							<input type="text" class="form-control" name="phone" id="email" placeholder="Enter phone number">
						</div>
					</div>
				</div>
			
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label" for="img">Image:</label>
						<div> 
							<input type="file" class="form-control" name="image" id="img" class="img">
						</div>
					</div>
				</div>
			 
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label" for="pwd">Password:</label>
						<div> 
							<input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
						</div>
					</div>
				</div>
			  
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label" for="pwd">Re-type Password:</label>
						<div> 
							<input type="password" class="form-control" name="repassword" id="pwd" placeholder="Enter re-type password">
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
					
