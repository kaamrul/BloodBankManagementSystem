<?php	
	$bank = $conn->prepare("SELECT * FROM tbl_blood_bank_info ORDER BY 	bank_id ASC");
	$bank->execute();
	$bank_value = $bank->fetchAll();
?>
<div class="container"> 
   <div class="row" style="padding:0px 30px 0px 30px;background:#faf4f6;">
	<div class="col-sm-12 col-md-12" align="left"style="color:#57649b; padding-top:10px!important; padding-left:0px!important; padding-bottom:10px!important;"><h3>Blood Bank List</h3></div>
		<div class="col-sm-12" style="border:1.5px #e0d0d7 solid; border-radius:4px; padding-bottom:15px; padding-top:15px; margin:0px;box-shadow:-2px 10px 20px -8px #661637 ;">
			<div class="table-responsive">
				<table class="table table-bordered" style=" margin:0px; padding:0px;">
				  <thead>
					<tr>
					  <th scope="col">SL</th>
					  <th scope="col">Name</th>
					  <th scope="col">Category</th>
					  <th scope="col">District</th>
					  <th scope="col">Address</th>					  
					  <th scope="col">Contact No</th>
					  <th scope="col">Email</th>
					  <th scope="col">Details</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php 
				  $i=1;
					foreach($bank_value as $value)
					{
				  ?>
					<tr>
					  <th scope="row"><?php echo $i; ?></th>
					  <td><?php echo $value['bank_name']; ?></td>
					  <td><?php echo $value['category']; ?></td>
					  <td><?php echo $value['district']; ?></td>
					  <td><?php echo $value['address']; ?></td>
					  <td><?php echo $value['phone_no']; ?></td>
					  <td><?php echo $value['bank_email']; ?></td>
					  <td><a href="index.php?page=view-blood-bank&id=<?php echo $value['bank_id']; ?>" class="btn btn-info">View</a></td>	
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