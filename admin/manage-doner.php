<!-------- Start Manage Doner Pannel -------->
<?php
	$sql = $conn->prepare("select * from tbl_doner_info");
	$sql->execute();
	$data = $sql->fetchAll();
	// echo "<pre>";print_r($data);exit;
		 
	if(isset($_POST['delete']))
	{
		$id = $_POST['doner_id'];
		//echo $_POST['img_url']; exit;
		$sql = $conn->prepare("DELETE FROM tbl_doner_info WHERE doner_id='$id'");
		$execute = $sql->execute();
		if($execute)
		    {
				unlink('../'.$_POST['img_url']);
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
	
<!-------- Start Design of Manage Doner Pannel -------->
<?php if(isset($sms)){echo $sms;} ?>
	<div class="panel panel-default">	
		<div class="panel-heading bg-info"><p style="font-size:20px;color:green;">Manage Doner Form</p></div>
		<div class="panel-body">		
			<div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Doner ID</th>
                            <th>Doner Name</th>                                          
                            <th>Doner Numebr</th>                                          
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
                                    <td> <h4> <?php echo  $value['doner_id']; ?> </h4></td>
                                    <td><h4><?php echo  $value['doner_name']; ?></h4></td>                                           
                                    <td><h4> <?php echo  $value['doner_phone']; ?> </h4></td>
                                    <td class="center"><img src="../<?php echo  $value['img_url']; ?>" height="80" width="80"></td>
									<td class="center">					
										<button class="btn btn-xs btn-danger" type="submit" name="delete">
											<span class="glyphicon glyphicon-trash"></span>
										</button>
										<input type="hidden" name="doner_id" value="<?php echo $value['doner_id']; ?>">
										<input type="hidden" name="img_url" value="<?php echo  $value['img_url']; ?>">										
										<a class="btn btn-xs btn-info" href="index.php?page=update-doner&id=<?php echo $value[0]; ?>">
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
