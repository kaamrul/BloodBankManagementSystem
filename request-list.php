<?php	
	$doner = $conn->prepare( "SELECT blood_request.*, tbl_user_info.user_name
		FROM blood_request
		INNER JOIN tbl_user_info
		ON blood_request.user_id = tbl_user_info.user_id
		ORDER BY request_id DESC");
	$doner->execute();
	$request_value = $doner->fetchAll();
?>


<div class="container"> 
   <div class="row" style="padding:0px 30px 0px 30px;background:#faf4f6;">
	<div class="col-sm-12 col-md-12" align="left" style="color:#57649b; padding-left:0px!important; padding-top:10px!important; padding-bottom:10px!important;"><h3>All Request List</h3></div>
		<div class="col-sm-12" style="border:1.5px #e0d0d7 solid; border-radius:4px; padding-bottom:15px; padding-top:15px; margin:0px;box-shadow:-2px 10px 20px -8px #661637 ;">
			<div class="table-responsive">
				<table class="table table-bordered" style=" margin:0px; padding:0px;">
				  <thead>
					<tr>
						<th scope="col">SL</th>
						<th scope="col">Name</th>					 
						<th scope="col">Blood Group</th>
						<th scope="col">Amount</th>					 
						<th scope="col">Phone</th>					 
						<th scope="col">Location</th>					  
						<th scope="col">Required Date</th>					 
						<th scope="col">Message</th>
						<th scope="col">Status</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php 
				  $i=1;
					foreach($request_value as $value)
					{
				  ?>
					<tr>
						<th scope="row"><?php echo $i; ?></th>
						<td><?php echo $value['user_name']; ?></td>
						<td><?php echo $value['blood_group']; ?></td>
						<td><?php echo $value['amount']; ?></td>
						<td><?php echo $value['phone']; ?></td>
						<td><?php echo $value['location']; ?></td>
						<td><?php echo $value['req_date']; ?></td>
						<td><?php echo $value['message']; ?></td>					  
					 	<td><?php echo $value['status']; ?></td>			  
					  
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