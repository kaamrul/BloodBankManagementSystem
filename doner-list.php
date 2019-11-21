<?php	
	$doner = $conn->prepare( "SELECT * FROM tbl_doner_info WHERE activation_status=1 ORDER BY doner_id DESC");
	$doner->execute();
	$doner_value = $doner->fetchAll();
?> 


<div class="container"> 
   <div class="row" style="padding:0px 30px 0px 30px;background:#faf4f6;">
	<div class="col-sm-12 col-md-12" align="left" style="color:#57649b; padding-left:0px!important; padding-top:10px!important; padding-bottom:10px!important;"><h3>All Donor List</h3></div>
		<div class="col-sm-12" style="border:1.5px #e0d0d7 solid; border-radius:4px; padding-bottom:15px; padding-top:15px; margin:0px;box-shadow:-2px 10px 20px -8px #661637 ;">
			<div class="table-responsive">
				<table class="table table-bordered" style=" margin:0px; padding:0px;">
				  <thead>
					<tr>
						<th scope="col">SL</th>
						<th scope="col">Name</th>
						<th scope="col">Blood Group</th>					 
						<th scope="col">Age</th>	
						<th scope="col">Location</th>					  
						<th scope="col">Email</th>
						<th scope="col">Phone</th>
						<th scope="col">Details</th>
						
						
					</tr>
				  </thead>
				  <tbody>
				  

				  <?php 
				  $i=1;
					foreach($doner_value as $value)
					{
				  ?>
					<tr>
						<th scope="row"><?php echo $i; ?></th>
						<td><?php echo $value['doner_name']; ?></td>
						<td><?php echo $value['blood_group']; ?></td>
						<td><?php echo $value['age']; ?></td>
						<td><?php echo $value['location']; ?></td>
						<td><?php echo $value['doner_email']; ?></td>
						<td><?php echo $value['doner_phone']; ?></td>					  
					 	<td><a href="index.php?page=view-doner-list&id=<?php echo $value['doner_id']; ?>" class="btn btn-info">View</a></td>			  
					  
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