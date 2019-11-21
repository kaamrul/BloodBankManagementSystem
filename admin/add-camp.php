<?php
    $bank_name = $conn->prepare("SELECT * from tbl_blood_bank_info ORDER BY bank_id DESC");
	$bank_name->execute();
	$v_bank_name = $bank_name->fetchAll();
	
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
				$data = array($bank_id,$area,$venue,$time,$date,$unit,$phone);
				$sql = "INSERT INTO tbl_camp_info(bank_id,camp_area,venue,time,date,unit,contact_no)VALUES(?,?,?,?,?,?,?)";
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
					 <div class="form-group ">
                      <label>Select Organization:</label>
                       <select class="form-control" name="bank_id">
                          <option>Select a blood bank...</option>
					     <?php 
					    foreach($v_bank_name as $d_bank_name)
						 {
					     ?>
                          <option value="<?php echo $d_bank_name['bank_id']; ?>"><?php echo $d_bank_name['bank_name']; ?>
                          </option>                           
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
							<div>
								<label class="control-label" for="pwd">Plz Submit all Informaion</label>
								<button type="submit" name="btn" class="btn btn-success btn-block">Submit</button>
							</div>
						</div>
					</div>							  					  
				</form>
		</div>
	</div>
