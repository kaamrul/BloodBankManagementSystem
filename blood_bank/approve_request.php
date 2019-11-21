<?php
$id = $_GET['id'];

				$query = "UPDATE `tbl_request_to_bank` SET `bb_status`='accepted' where bank_id='$id'";
					$stmt = $conn->prepare($query);
					$end = $stmt->execute();
		if($end)
			
		{
		 
			$sms = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Blog delete successfull ! </div>';
			header("location:index.php");
		}  
		else 
		{
			$sms = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Blog delete unsuccessfull ! </div>';
		}
		
?>