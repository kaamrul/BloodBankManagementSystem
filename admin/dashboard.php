<?php
	$sql = $conn->prepare("SELECT COUNT(doner_id) FROM `tbl_doner_info`");
	$sql->execute();
	$data = $sql->fetch(PDO::FETCH_ASSOC);
	
	$sqluser = $conn->prepare("SELECT COUNT(user_id) FROM `tbl_user_info`");
	$sqluser->execute();
	$datauser = $sqluser->fetch(PDO::FETCH_ASSOC);
	
	$sqlblood = $conn->prepare("SELECT COUNT(bank_id) FROM `tbl_blood_bank_info`");
	$sqlblood->execute();
	$datablood = $sqlblood->fetch(PDO::FETCH_ASSOC);
	
	//echo "<pre>";print_r($datauser);exit;
?>
<div class="panel panel-default">
	<div class="panel-heading bg-info"><p style="font-size:20px;color:green;">Dashboard</p></div>
	
	<div class="panel-body">
		<div class="col-md-4 box" style="height:300px;padding:10px;">
			<div style="background:#D7BDE2;height:280px;" align="center">
				<img src="../assets/images/donor.jpg" style="height:100px;width:100px;border-radius:50%;margin-top:5px;" height="60" width="60">
				<h1>Donors</h1>
				<p style="font-size:28px;color:#FF5733;">Total : <?php echo $data['COUNT(doner_id)']; ?></p>
			</div>
		</div>
		
		<div class="col-md-4 box" style="height:300px;;padding:10px;">
			<div style="background:#A9CCE3;height:280px;" align="center">
				<img src="../assets/images/user.png" style="height:100px;width:100px; border-radius:50%;margin-top:5px;" height="60" width="60"">
				<h1>Users</h1>
				<p style="font-size:28px;color:#FF5733;">Total : <?php echo $datauser['COUNT(user_id)']; ?></p>
			</div>
		</div>
		
		<div class="col-md-4 box" style="height:300px;;padding:10px;">
			<div style="background:#ABEBC6;height:280px;" align="center">
			<img src="../assets/images/bank.png" style="height:100px;width:100px; border-radius:50%;margin-top:5px;" height="60" width="60"">
				<h1>Blood Bank</h1>
				<p style="font-size:28px;color:#FF5733;">Total : <?php echo $datablood['COUNT(bank_id)']; ?></p>
			</div>
		</div>
	</div>
</div>