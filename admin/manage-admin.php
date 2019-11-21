<!-------- Start Manage Admin Pannel -------->
<?php
	$sql = $conn->prepare("SELECT * FROM tbl_admin_info");
	$sql->execute();
	$data = $sql->fetchAll();
		// echo "<pre>";print_r($data);exit;
		 
		if(isset($_POST['delete']))
		{
			$id = $_POST['admin_id'];
			//echo $_POST['img_url']; exit;
			$sql = $conn->prepare("DELETE FROM tbl_admin_info WHERE admin_id='$id'");
			$execute = $sql->execute();
			if($execute)
			{
				unlink($_POST['img_url']);
				$sms = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Blog delete successfull ! </div>';
			}  
			else 
			{
				$sms = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Blog delete unsuccessfull ! </div>';
			}
		}
		 
		 
		echo @$admin_id = $_GET['id'];
		echo @$status = $_GET['status']; //exit;

			if($admin_id != null && $status !=null)
			{
				 
				if($status == 1)
				{
					$query = "UPDATE `tbl_admin_info` SET `activation_status`='0' WHERE admin_id='$admin_id'";
					$stmt = $conn->prepare($query);
					$end = $stmt->execute();
					if($end)
					{
						$sms = "<h4 style='color:green;'>Status Update Successful .........</h4>";
				    }
					else
					{
						$sms = "<h4 style='color:red;'>Status Update Unsuccessful .........</h4>";
					}
				}
				else if($status == 0)
				{
					$query = "UPDATE `tbl_admin_info` SET `activation_status`='1' WHERE admin_id='$admin_id'";
					$stmt = $conn->prepare($query);
					$end = $stmt->execute();
					if($end)
					{
						$sms = "<h4 style='color:green;'>Status Update Successful .........</h4>";
					}
					else
					{
						$sms = "<h4 style='color:red;'>Status Update Unsuccessful .........</h4>";
					}
				}
						
			}
?>	

	<script type="text/javascript">
		function confirmation() 
		{
			return confirm('Are you sure you want to do this?');
		}
	</script>
		
		
	<?php if(isset($sms)){echo $sms;} ?>
		
		<!-------- Start Design of Manage Admin Pannel -------->
		
	<div class="panel panel-default">
		<div class="panel-heading bg-info"><p style="font-size:20px;color:#000;">Manage admin form</p></div>
		<div class="panel-body">
			<div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Admin ID</th>
                            <th>Admin Name</th>                                          
                            <th>Activation status</th>
                            <th>Change Activation Status</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
					
                    <tbody>					
						<?php
						foreach($data as $value)
						{
						?>
							<form method="post">
                                <tr class="odd gradeX">
                                    <td> <h4> <?php echo  $value['admin_id']; ?> </h4></td>
                                    <td><h4><?php echo  $value['name']; ?></h4></td>                                           
                                    <td><span><?php if($value['activation_status'] == 1){ ?><a href="#">Active</a><?php }else{?><a href="#">Deactive</a><?php } ?></span></td>
                                    <td><span><?php if($value['activation_status'] == 1){ ?><a href="index.php?page=manage-admin&id=<?php echo $value['admin_id']; ?>&status=<?php echo $value['activation_status']; ?>" class="btn btn-danger">Deactive</a><?php }else{?><a href="index.php?page=manage-admin&id=<?php echo $value['admin_id']; ?>&status=<?php echo $value['activation_status']; ?>" class="btn btn-primary">Active</a><?php } ?></span></td>
                                    <td class="center"><img src="<?php echo  $value['img_url']; ?>" height="80" width="80"></td>
									<td class="center">
										<button class="btn btn-xs btn-danger" type="submit" name="delete" onclick="return confirmation()">
											<span class="glyphicon glyphicon-trash"></span>
										</button>
										<input type="hidden" name="admin_id" value="<?php echo $value['admin_id']; ?>">
										<input type="hidden" name="img_url" value="<?php echo  $value['img_url']; ?>">
									
										<a class="btn btn-xs btn-info" href="index.php?page=update-admin&id=<?php echo $value[0]; ?>">
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
		<!-------- End Design of Manage Admin Pannel -------->