<?php
	$bank_id = $_SESSION['bank_id'];
	$sqll = $conn->prepare("SELECT * FROM blood_details WHERE bank_id='$bank_id'");
	$sqll->execute();
	$v = $sqll->fetch(PDO::FETCH_ASSOC);
	
	//echo "<pre>";print_r($v);exit;
if (isset($_POST['btn'])) {
    $a_pos = $_POST['a_pos'];
    $a_neg = $_POST['a_neg'];
    $b_pos = $_POST['b_pos'];
    $b_neg = $_POST['b_neg'];
    $ab_pos = $_POST['ab_pos'];
    $ab_neg = $_POST['ab_neg'];
    $o_pos = $_POST['o_pos'];  
    $o_neg = $_POST['o_neg'];  
    $bank_id= $_SESSION['bank_id'];
	
    if (!empty($a_pos) &&!empty($a_neg) && !empty($b_pos) && !empty($b_neg) && !empty($ab_pos) && !empty($ab_neg) && !empty($o_pos) && !empty($o_neg)){
			try{	
				$sql = "update blood_details set a_pos='$a_pos',a_neg='$a_neg',b_pos='$b_pos',b_neg='$b_neg',ab_pos='$ab_pos',ab_neg='$ab_neg',o_pos='$o_pos',o_neg='$o_neg' where bank_id='$bank_id'";
				$stmt = $conn->prepare($sql);
				$end = $stmt->execute();
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

    $sqll = $conn->prepare("SELECT * FROM blood_details WHERE bank_id='$bank_id'");
	$sqll->execute();
	$v = $sqll->fetch(PDO::FETCH_ASSOC);
?>	


<!--------------------- Start add new camp form ------------------->	

	<div class="panel panel-default">	
		<div class="panel-heading bg-info"><p style="font-size:20px;color:green;">Blood Amount Details Form</p></div>
		<div class="panel-body">
		
			<?php if(isset($sms)){echo $sms;} ?>
			
				<form method="post" action="#">
				
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label" for="organization">A(+):</label>
							<div>
								<input type="number" class="form-control" value="<?php echo $v['a_pos']; ?>" placeholder=" " name="a_pos">
							</div>
						</div>
					</div>
				
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label" for="organization">A(-):</label>
							<div>
								<input type="number" class="form-control" placeholder=" " value="<?php echo $v['a_neg']; ?>" name="a_neg"> 
							</div>
						</div>
					</div>
					
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label" for="organization">B(+):</label>
							<div>
								<input type="number" class="form-control" placeholder=" " value="<?php echo $v['b_pos']; ?>" name="b_pos">
							</div>
						</div>
					</div>
					
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label" for="organization">B(-):</label>
							<div>
								<input type="number" class="form-control" placeholder=" " value="<?php echo $v['b_neg']; ?>" name="b_neg">
							</div>
						</div>
					</div>
					
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label" for="organization">AB(+):</label>
							<div>
								<input type="number" class="form-control" placeholder=" " value="<?php echo $v['ab_pos']; ?>" name="ab_pos">
							</div>
						</div>
					</div>
					
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label" for="organization">AB(-):</label>
							<div>
								<input type="number" class="form-control" placeholder=" " value="<?php echo $v['ab_neg']; ?>" name="ab_neg">
							</div>
						</div>
					</div>
					
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label" for="organization">O(+):</label>
							<div>
								<input type="number" class="form-control" placeholder=" " value="<?php echo $v['o_pos']; ?>" name="o_pos">
							</div>
						</div>
					</div>
					
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label" for="organization">O(-):</label>
							<div>
								<input type="number" class="form-control" placeholder=" " value="<?php echo $v['o_neg']; ?>" name="o_neg">
							</div>
						</div>
					</div>
					
					  
					<div class="col-sm-6">
						<div class="form-group"> 
							<div>
								<label class="control-label" for="pwd">Plz Submit all Informaion</label>
								<button type="submit" name="btn" class="btn btn-success btn-block">Update Blood</button>
							</div>
						</div>
					</div>							  					  
				</form>
		</div>
	</div>
