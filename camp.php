<?php	
	$camp = $conn->prepare("SELECT tbl_camp_info.*,tbl_blood_bank_info.bank_name FROM tbl_camp_info,tbl_blood_bank_info where tbl_camp_info.bank_id=tbl_blood_bank_info.bank_id ORDER BY camp_id DESC");
	$camp->execute();
	$camp_value = $camp->fetchAll();
?>
<div class="container"> 
   <div class="row" style="padding:0px 30px 0px 30px;background:#faf4f6;">
	<div class="col-sm-12 col-md-12" align="left"style="color:#57649b; padding-top:10px!important; padding-left:0px!important; padding-bottom:10px!important;"><h3>Blood Donation Campaigns</h3></div>
		<div class="col-sm-12" style="border:1.5px #e0d0d7 solid; border-radius:4px; padding-bottom:15px; padding-top:15px; margin:0px;box-shadow:-2px 10px 20px -8px #661637 ;">
			<div class="table-responsive">
				<table class="table table-bordered" style=" margin:0px; padding:0px;">
				  <thead>
					<tr>
					  <th scope="col">SL</th>
					  <th scope="col">Organization Name</th>
					  <th scope="col">Camp Area</th>
					  <th scope="col">Camp Venue</th>
					  <th scope="col">Time</th>
					  <th scope="col">Date</th>
					  <th scope="col">Unit</th>
					  <th scope="col">Contact No</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php 
				  $i=1;
					foreach($camp_value as $value)
					{
				  ?>
					<tr>
					  <th scope="row"><?php echo $i; ?></th>
					  <td><?php echo $value['bank_name'];?></td>
					  <td><?php echo $value['camp_area']; ?></td>
					  <td><?php echo $value['venue']; ?></td>
					  <td><?php echo $value['time']; ?></td>
					  <td><?php echo $value['date']; ?></td>
					  <td><?php echo $value['unit']; ?></td>
					  <td><?php echo $value['contact_no']; ?></td>
					</tr>
					<?php
					$i++;
					}
					?>
					
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>