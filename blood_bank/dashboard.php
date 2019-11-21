<?php
		
	$to_reqCount = $conn->prepare("SELECT count(request_id_bank) from tbl_request_to_bank where bank_id='$bankid'");
	$to_reqCount->execute();
	$datato_reqCount = $to_reqCount->fetch(PDO::FETCH_ASSOC);	
	
	$ac_reqCount = $conn->prepare("SELECT count(request_id_bank) from tbl_request_to_bank where bank_id='$bankid' AND  bb_status='accepted'");
	$ac_reqCount->execute();
	$dataac_reqCount = $ac_reqCount->fetch(PDO::FETCH_ASSOC);	
	
	$re_reqCount = $conn->prepare("SELECT count(request_id_bank) from tbl_request_to_bank where bank_id='$bankid' AND  bb_status='rejected'");
	$re_reqCount->execute();
	$datare_reqCount = $re_reqCount->fetch(PDO::FETCH_ASSOC);	
	
	$pe_reqCount = $conn->prepare("SELECT count(request_id_bank) from tbl_request_to_bank where bank_id='$bankid' AND  bb_status='pending'");
	$pe_reqCount->execute();
	$datape_reqCount = $pe_reqCount->fetch(PDO::FETCH_ASSOC);
	
	//echo "<pre>";print_r($datauser);exit;
?>
<div class="panel panel-default">
	<div class="panel-heading bg-info"><p style="font-size:20px;color:green;">Dashboard</p></div>
	
	<div class="panel-body">
		<div class="col-md-3 box" style="height:300px;padding:10px;">
			<div style="background:#F5B7B1;height:280px;" align="center">
				<img src="../assets/images/t.png" style="height:100px;width:100px;border-radius:50%;margin-top:5px;" height="60" width="60"">
				<h1>Request</h1>
				<p style="font-size:28px;color:#000;"><?php echo $datato_reqCount['count(request_id_bank)']; ?></p>
			</div>
		</div>
		
		<div class="col-md-3 box" style="height:300px;;padding:10px;">
			<div style="background:#D2B4DE;height:280px;" align="center">
				<img src="../assets/images/ac.png" style="height:100px;width:100px; border-radius:50%;margin-top:5px;" height="60" width="60"">
				<h1 style="color:#1EC219">Request</h1>
				<p style="font-size:28px;color:#1EC219;"><?php echo $dataac_reqCount['count(request_id_bank)']; ?></p>
			</div>
		</div>
		
		<div class="col-md-3 box" style="height:300px;;padding:10px;">
			<div style="background:#AED6F1;height:280px;" align="center">
			<img src="../assets/images/r.png" style="height:100px;width:100px; border-radius:50%;margin-top:5px;" height="60" width="60"">
				<h1 style="color:Red">Request</h1>
				<p style="font-size:28px;color:#FF5733;"><?php echo $datare_reqCount['count(request_id_bank)']; ?></p>
			</div>
		</div>
		
		<div class="col-md-3 box" style="height:300px;;padding:10px;">
			<div style="background:#ABEBC6;height:280px;" align="center">
			<img src="../assets/images/p.jpg" style="height:100px;width:100px; border-radius:50%;margin-top:5px;" height="60" width="60"">
				<h1 style="color:gray">Request</h1>
				<p style="font-size:28px;color:gray;"><?php echo $datape_reqCount['count(request_id_bank)']; ?></p>
			</div>
		</div>
	</div>
</div>