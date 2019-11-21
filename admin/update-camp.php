<?php
    $camp_id = $_GET['camp_id'];
    $sql = $conn->prepare("SELECT * FROM tbl_camp_info,tbl_blood_bank_info where tbl_camp_info.bank_id=tbl_blood_bank_info.bank_id and tbl_camp_info.camp_id='$camp_id'");
	$sql->execute();
	$data = $sql->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['btn'])) {
    $bank_id = $_POST['bank_id'];  
    $area = $_POST['area'];
    $venue = $_POST['venue'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $unit = $_POST['unit'];
    $phone = $_POST['phone'];  
	
	
	if (!empty($bank_id) &&!empty($area) && !empty($venue) && !empty($time) && !empty($date) && !empty($unit) && !empty($phone)) {
			try{	
				$sql = "update tbl_camp_info set bank_id='$bank_id',camp_area='$area',venue='$venue',time='$time',date='$date',unit='$unit',contact_no='$phone' where camp_id='$camp_id'";
				$stmt = $conn->prepare($sql);
				$end = $stmt->execute();
				if ($end) {
				   $sms = '<div class="alert alert-success alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Data has been successfully update!</strong> </div>';
				   //header('location:index.php');
				} else {
					$sms = '<div class="alert alert-danger alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Data submission unsuccessful</strong> Indicates a unsuccessful or negative action.</div>';
				}
			}catch(PDOException $e){
				 echo "Your operation is failed: " . $e->getMessage();
			}
				
    } else {
		$sms = '<div class="alert alert-warning alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Sorry you must fillup all the field .....</div>';
    }
   
}

	
	
	$bank_name = $conn->prepare("SELECT * from tbl_blood_bank_info ");
	$bank_name->execute();
	$v_bank_name = $bank_name->fetchAll();
	
	$sql = $conn->prepare("SELECT * FROM tbl_camp_info,tbl_blood_bank_info where tbl_camp_info.bank_id=tbl_blood_bank_info.bank_id and tbl_camp_info.camp_id='$camp_id'");
	$sql->execute();
	$data = $sql->fetch(PDO::FETCH_ASSOC);
?>	


<!--------------------- Start add new camp form ------------------->	

	<div class="panel panel-default">	
		<div class="panel-heading bg-info"><p style="font-size:20px;color:green;">Upadate Camp Form</p></div>
		<div class="panel-body">
		
			<?php if(isset($sms)){echo $sms;} ?>
			
				<form method="post" action="#">
				
					<div class="col-sm-6">
					 <div class="form-group ">
                      <label><?php echo $data['bank_name']; ?></label>
                       <select class="form-control" name="bank_id">
					     <?php 
					    foreach($v_bank_name as $d_bank_name)
						 {
					     ?>
                          <option value="<?php echo $d_bank_name['bank_id']; ?>"><?php echo $d_bank_name['bank_name']; ?></option>                           
					   <?php
						}
					   ?>
                          
                       </select>
                    </div>
			    </div>
				
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label" for="area">Camp Area:</label>
							<div>
								<input type="text" class="form-control" placeholder="Enter Camp Area" name="area" id="area" value="<?php echo $data['camp_area']; ?>">
							</div>
						</div>
					</div>
					  
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label" for="venue">Venue:</label>
							<div>
							<input type="text" class="form-control" name="venue" id="venue" placeholder="Enter Venue" value="<?php echo $data['venue']; ?>">
							</div>
						</div>
					</div>
					  
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label" for="time">Time:</label>
							<div>
								<input type="time" class="form-control" name="time" id="time" placeholder="Enter Time" value="<?php echo $data['time']; ?>">
							</div>
						</div>
					</div>
					 
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label" for="date">Date:</label>
							<div> 
								<input type="date" class="form-control" name="date" id="date" placeholder="Enter Date:" value="<?php echo $data['date']; ?>">
							</div>
						</div>
					</div>
					  
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label" for="count">Unit:</label>
							<div> 
								<input type="count" class="form-control" name="unit" id="unit" placeholder="Enter Unit" value="<?php echo $data['unit']; ?>">
							</div>
						</div>
					</div>
					   
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label" for="phone">Contact No:</label>
							<div> 
								<input type="phone" class="form-control" name="phone" id="phone" placeholder="Enter Contact No.." value="<?php echo $data['contact_no']; ?>">
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
