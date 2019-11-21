<!-------- Start Manage camp -------->
<?php
		if(isset($_POST['delete']))
		{
			$id = $_POST['camp_id'];
			$sql = $conn->prepare("delete from tbl_camp_info where camp_id='$id'");
			$execute = $sql->execute();
			if($execute)
			{
				$sms = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  Delete successfull ! </div>';
			}  
			else 
			{
				$sms = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Delete unsuccessfull ! </div>';
			}
		}
		
	$camp = $conn->prepare("SELECT * FROM tbl_camp_info ORDER BY camp_id DESC");
	$camp->execute();
	$camp_value = $camp->fetchAll();
	
	$camp = $conn->prepare("SELECT tbl_camp_info.*,tbl_blood_bank_info.bank_name FROM tbl_camp_info,tbl_blood_bank_info where tbl_camp_info.bank_id=tbl_blood_bank_info.bank_id ORDER BY camp_id DESC");
	$camp->execute();
	$camp_value = $camp->fetchAll();
		
?>	

	<script type="text/javascript">
		function confirmation() 
		{
			return confirm('Are you sure you want to do this?');
		}
	</script>
		
		
	<?php if(isset($sms)){echo $sms;} ?>
		
		<!-------- Start Design of Manage Camp -------->
		
	<div class="panel panel-default">
		<div class="panel-heading bg-info"><p style="font-size:20px;color:green;">Manage Blood Request</p></div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered">
				  <thead>
					<tr>
					  <th scope="col">SL</th>
					  <th scope="col">Organization Name</th>
					  <th scope="col">Camp Area</th>
					  <th scope="col">Blood Units</th>
					  <th scope="col">Camp Venue</th>
					  <th scope="col">Date</th>
					  <th scope="col">Action</th>
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
					  <td><?php echo $value['unit']; ?></td>
					  <td><?php echo $value['venue']; ?></td>
					  <td><?php echo $value['date']; ?></td>
					  <td>
					  <form method="post">
								<button class="btn btn-xs btn-danger" type="submit" name="delete">
											<span class="glyphicon glyphicon-trash"></span>
										</button>
										<input type="hidden" name="camp_id" value="<?php echo $value['camp_id']; ?>">										
										<a class="btn btn-xs btn-info" href="index.php?page=update-camp&camp_id=<?php echo $value[0]; ?>">
											<span class="glyphicon glyphicon-pencil"></span>
                                        </a>
										</form>
					  </td>
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
		<!-------- End Design of Manage Camp -------->