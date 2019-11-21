<?php

if (isset($_POST['btn'])) {
    $area = $_POST['area'];
    $venue = $_POST['venue'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $unit = $_POST['unit'];
    $phone = $_POST['phone'];
    $bank_id = $_SESSION['bank_id'];
    $image_url='There is no image';

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
	
    if (!empty($bank_id) && !empty($area) && !empty($venue) && !empty($time) && !empty($date) && !empty($unit) && !empty($phone)) {
			try{	
				$data = array($bank_id,$area,$venue,$time,$date,$unit,$phone,$image_url);
				$sql = "INSERT INTO tbl_camp_info(bank_id,camp_area,venue,time,date,unit,contact_no,img_url)VALUES(?,?,?,?,?,?,?,?)";
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


<!--------------------- Start add new camp form -------------------->	

	<div class="panel panel-default">	
		<div class="panel-heading bg-info"><p style="font-size:20px;color:green;">Create Camp Form</p></div>
		<div class="panel-body">
		
			<?php if(isset($sms)){echo $sms;} ?>
			
				<form method="post" action="#">
				
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label" for="area">Camp Area:</label>
							<div>
								<input type="text" class="form-control" placeholder="Enter Camp Area" name="area" id="area">
							</div>
						</div>
					</div>
					  
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label" for="venue">Venue:</label>
							<div>
							<input type="text" class="form-control" name="venue" id="venue" placeholder="Enter Venue">
							</div>
						</div>
					</div>
					  
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label" for="time">Time:</label>
							<div>
								<input type="time" class="form-control" name="time" id="time" placeholder="Enter Time">
							</div>
						</div>
					</div>
					 
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label" for="date">Date:</label>
							<div> 
								<input type="date" class="form-control" name="date" id="date" placeholder="Enter Date:">
							</div>
						</div>
					</div>
					  
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label" for="count">Unit:</label>
							<div> 
								<input type="count" class="form-control" name="unit" id="unit" placeholder="Enter Unit">
							</div>
						</div>
					</div>
					   
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label" for="phone">Contact No:</label>
							<div> 
								<input type="phone" class="form-control" name="phone" id="phone" placeholder="Enter Contact No..">
							</div>
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
							<div>
								<label class="control-label" for="pwd">Plz Submit all Informaion</label>
								<button type="submit" name="btn" class="btn btn-success btn-block">Submit</button>
							</div>
						</div>
					</div>							  					  
				</form>
		</div>
	</div>
