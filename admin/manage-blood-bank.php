<!-------- Start Manage Blood Bank -------->
<?php
	$sql = $conn->prepare("select * from tbl_blood_bank_info");
	$sql->execute();
	$data = $sql->fetchAll();
	// echo "<pre>";print_r($data);exit;
		 
	if(isset($_POST['delete']))
	{
		$id = $_POST['bank_id'];
		//echo $_POST['img_url']; exit;
		$sql = $conn->prepare("DELETE FROM tbl_blood_bank_info WHERE bank_id='$id'");
		$execute = $sql->execute();
		if($execute)
		    {
			
				$sms = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Blog delete successfull ! </div>';
		    }  
			else 
			{
				 $sms = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Blog delete unsuccessfull ! </div>';
		    }
	}
?>	

	<script type="text/javascript">
		function confirmation() 
		{
			return confirm('Are you sure you want to do this?');
		}
	</script>
		
		<!-------- Start Design of Manage Admin Pannel -------->
		
	<div class="panel panel-default">
		<div class="panel-heading bg-info"><p style="font-size:20px;color:green;">Manage Blood Bank</p></div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th scope="col">SL</th>
							<th scope="col">Blood Bank Name</th>
							<th scope="col">Category</th>
							<th scope="col">Address</th>
							<th scope="col">Contact No</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
				  
				    <tbody>				   
				   		<?php
				   		foreach($data as $value)
				   		{
				   		?>
				   			<form method="post">
                                  <tr class="odd gradeX">
                                      <td> <h4> <?php echo  $value['bank_id']; ?> </h4></td>
                                      <td><h4> <?php echo  $value['bank_name']; ?></h4></td>                                           
                                      <td><h4> <?php echo  $value['category']; ?> </h4></td>                                    
                                      <td><h4> <?php echo  $value['address']; ?> </h4></td>                                    
                                      <td><h4> <?php echo  $value['phone_no']; ?> </h4></td>                                    
				   					<td class="center">					
				   						<button class="btn btn-xs btn-danger" type="submit" name="delete">
				   							<span class="glyphicon glyphicon-trash"></span>
				   						</button>
				   						<input type="hidden" name="bank_id" value="<?php echo $value['bank_id']; ?>">				   																
				   						<a class="btn btn-xs btn-info" href="index.php?page=update-blood-bank&id=<?php echo $value[0]; ?>">
				   							<span class="glyphicon glyphicon-pencil"></span>
                                          </a>
				   					</td>
				   	
                                  </tr>
				   			</form>
				   	    <?php
				   	    }
				   	    ?>
				    </tbody>
				</table>
			</div>
		</div>
	</div>
		<!-------- End Design of Manage Blood Bank -------->