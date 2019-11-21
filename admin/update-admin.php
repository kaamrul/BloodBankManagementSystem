<!-------- Update Admin  -------->
<?php
	$id = $_GET['id'];
	$sql = $conn->prepare("SELECT * FROM tbl_admin_info WHERE admin_id='$id'");
	$sql->execute();
	$data = $sql->fetch(PDO::FETCH_ASSOC);
	//echo "<pre>";print_r($data);exit;
	$image_url=$data['img_url'];
		 
if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];	
    $password = $_POST['password'];
	
	// Image Upload Start...........................
	if(!empty($_FILES))
	{
		if (isset($_FILES['image'])) 
		{
			$errors = array();
			//unlink($data['img_url']);
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_tmp =  $_FILES['image']['tmp_name'];
			$file_type = $_FILES['image']['type'];
			$file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));		
			$extensions = array("jpeg", "jpg", "png");
			
			if (in_array($file_ext, $extensions) === false) {
				$errors[] = "extension not allowed, please choose a JPEG, JPG or PNG file.";
			}

			if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
			}

			if (empty($errors) == true) {
            $loacation = '../assets/images/admin_img/';
            $img_name = rand();
            $image_url = $loacation.$img_name.'.'.$file_ext;
            move_uploaded_file($file_tmp, $image_url);
			} 
			
			else {
            print_r($errors);
			}
		}
	}
    // Image Upload end .......................
    

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($password)) 
    {
				$sql = "update tbl_admin_info set name='$name',email='$email',phone_number='$phone',password='$password',img_url='$image_url' where admin_id='$id'";
				$stmt = $conn->prepare($sql);
				$end = $stmt->execute();
				if ($end) {
				   $sms = '<div class="alert alert-success alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Data has been successfully update!</strong> </div>';
				   //header('location:index.php');
				} else {
					$sms = '<div class="alert alert-danger alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Data submission unsuccessful</strong> Indicates a unsuccessful or negative action.</div>';
				}
    } else {
		$sms = '<div class="alert alert-warning alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Sorry you must fillup all the field .....</div>';
    }
}
?>	


            							
<?php if(isset($sms)){echo $sms;} ?>
	<div class="panel panel-default">
		<div class="panel-heading bg-info"><p style="font-size:20px;color:#000;">Update admin form</p></div>
		<div class="panel-body">
			<form method="post" enctype="multipart/form-data">			 
				<div class="col-sm-6">
			        <div class="form-group">
			        <label class="control-label" for="name">Name:</label>
			        <div>
			          <input type="text" class="form-control" name="name" id="name" value="<?php echo $data['name']; ?>" placeholder="Enter name"/>
			        </div>
			        </div>
			    </div>
			        
			    <div class="col-sm-6">
					<div class="form-group">
						<label class="control-label" for="email">Email:</label>
						<div>
							<input type="email" class="form-control" name="email" value="<?php echo $data['email']; ?>" id="email" placeholder="Enter email">
						</div>
			        </div>
			    </div>
			  
			  	<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label" for="phone">Phone number:</label>
						<div>
							<input type="text" class="form-control" name="phone" value="<?php echo $data['phone_number']; ?>" id="email" placeholder="Enter phone number">
						</div>
					</div>
				</div>
			  
			  	<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label" for="password">Password:</label>
						<div> 
							<input type="text" class="form-control" name="password" value="<?php echo $data['password']; ?>"  id="pwd" placeholder="Enter password">
						</div>
					</div>
				</div>
			  
			    <div class="col-sm-6">
					<div class="form-group">
						<label class="control-label" for="img">Image:</label>
						<img src="<?php echo $image_url; ?>" height="40" width="40">
						<div> 
							<input type="file" class="form-control" name="image" id="image" class="img">
						</div>
					</div>
				</div>				  			
			   
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label" for="password">Re-type Password:</label>
						<div> 
							<input type="password" class="form-control" name="repassword" id="pwd" placeholder="Enter re-type password">
						</div>
					</div>
				</div>  
			  
				<div class="col-sm-6">
					<div class="form-group"> 
						<div>
							<label class="control-label" for="">Please Submit Your Informaion</label>
							<button type="submit" name="btn" class="btn btn-success btn-block">Update</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

