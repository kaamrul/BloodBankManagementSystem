<!-------- Start Manage Admin Pannel -------->
<?php
	$doner_id = $_SESSION['doner_id'];
	$sql = $conn->prepare("SELECT * FROM tbl_user_info,tbl_doner_info,blood_request WHERE tbl_user_info.user_id=blood_request.user_id AND tbl_doner_info.doner_id=blood_request.doner_id AND tbl_doner_info.doner_id='$doner_id' AND blood_request.status='pending' ORDER BY blood_request.request_id DESC");
	$sql->execute();
	$data = $sql->fetchAll();
	//echo "<pre>";print_r($data);exit;
		 
		if(isset($_POST['delete']))
		{
			$id = $_POST['request_id_bank'];
			//echo $_POST['img_url']; exit;
			$sql = $conn->prepare("delete from tbl_request_to_bank where request_id_bank='$request_id_bank'");
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
		 
			
			if(isset($_POST['accept']))
			{
				
				$request_id = $_POST['request_id'];
				$user_email = $_POST['user_email'];
				$user_name = $_POST['user_name'];
				$doner_phone = $_POST['doner_phone'];
				$doner_name = $_POST['doner_name'];
				
					$query = "UPDATE `blood_request` SET `status`='accepted' where request_id='$request_id'";
					$stmt = $conn->prepare($query);
					$end = $stmt->execute();
					if($end)
					{
						
						$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
							try {
								//Server settings
								//$mail->SMTPDebug = 2;                                 // Enable verbose debug output
								$mail->isSMTP();                                      // Set mailer to use SMTP
								$mail->Host = 'ssl://smtp.gmail.com';                       // Specify main and backup SMTP servers
								$mail->SMTPAuth = true;                               // Enable SMTP authentication
								$mail->Username = 'bloodbankbd3126@gmail.com';                 // SMTP username
								$mail->Password = 'm14103126';                           // SMTP password
								$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
								$mail->Port = 465;                                    // TCP port to connect to
								$mail->SMTPOptions = array(
									'ssl' => array(
										'verify_peer' => false,
										'verify_peer_name' => false,
										'allow_self_signed' => true
									)
								);

								//Recipients
								$mail->setFrom('bloodbankbd3126@gmail.com', 'bloodbankbd');
								$mail->addAddress($user_email, $user_name);     // Add a recipient					
								$mail->addReplyTo('info@example.com', 'Information');
								$mail->addCC('cc@example.com');
								$mail->addBCC('bcc@example.com');

								//Attachments
								//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
								//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

								//Content
								$mail->isHTML(true);                                  // Set email format to HTML
								$mail->Subject = 'Blood Request Acceptance';
								$mail->Body    = 'Hello! '.$user_name.', '.$doner_name.' has accepted your blood request. <br> Contact with him through this number: '.$doner_phone;
								$mail->AltBody = 'blood_request';

								$mail->send();
								//echo 'Message has been sent';
								} catch (Exception $e) {
									echo 'Message could not be sent.';
									echo 'Mailer Error: ' . $mail->ErrorInfo;
								} 
						
						

						$sms = "<h4 style='color:green;'>Approve Successful .........</h4>";
						 
				    }
					else
					{
						$sms = "<h4 style='color:red;'>Approve Unsuccessful .........</h4>";
					}
				
			}
			
			
			if(isset($_POST['reject']))
			{
				$request_id = $_POST['request_id'];
				
				$query = "UPDATE `blood_request` SET `status`='rejected' where request_id='$request_id'";
					$stmt = $conn->prepare($query);
					$end = $stmt->execute();
					if($end)
					{
						$sms = "<h4 style='color:green;'>Rejected Successfully .........</h4>";
						header("location:index.php?page=manage-request");
				    }
					else
					{
						$sms = "<h4 style='color:red;'>Rejected Unsuccessfully.........</h4>";
					}
				
			}
			
	$sql = $conn->prepare("SELECT * FROM tbl_user_info,tbl_doner_info,blood_request WHERE tbl_user_info.user_id=blood_request.user_id AND tbl_doner_info.doner_id=blood_request.doner_id AND tbl_doner_info.doner_id='$doner_id' AND blood_request.status='pending' ORDER BY blood_request.request_id DESC");
	$sql->execute();
	$data = $sql->fetchAll();
			
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
		<div class="panel-heading bg-info"><p style="font-size:20px;color:#000;">Manage Blood Request</p></div>
		<div class="panel-body">
			<div class="table-responsive">
			<?php
					if($sql->rowCount()>0)
						{
					?>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>User Name</th>                                          
                            <th>Subject</th>                                                                                  
							<th>Required Date</th>                                                
                            <th>Phone Number</th>
                            <th>Message</th>
                            <th>Date</th>
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
                                    <td> <?php echo  $value['user_name']; ?></td>
                                    <td><?php echo  $value['subject']; ?></td>                                           
                                    <td><?php echo  $value['req_date']; ?></td>                                           
                                    <td><?php echo  $value['phone_number']; ?></td>                                           
                                    <td><?php echo  $value['message']; ?></td>
                                    <td><?php echo  $value['date']; ?></td>
									<td class="center">
									
										<button class="btn btn-xs btn-success" name="accept">
											<span class="glyphicon glyphicon-ok"></span>
										</button>
										<button class="btn btn-xs btn-danger" name="reject">
											<span class="glyphicon glyphicon-remove"></span>
										</button>
										<input type="hidden" name="request_id" value="<?php echo $value['request_id']; ?>">
										<input type="hidden" name="user_email" value="<?php echo $value['user_email']; ?>">
										<input type="hidden" name="user_name" value="<?php echo $value['user_name']; ?>">
										<input type="hidden" name="doner_phone" value="<?php echo $value['doner_phone']; ?>">
										<input type="hidden" name="doner_name" value="<?php echo $value['doner_name']; ?>">
										
									</td>							
                                </tr>
							</form>
						<?php
						}
						?>
						
                    </tbody>
					<?php
						} else {
							?>
							<div class="col-md-8 col-lg-10 col-lg-offset-1">
								<div class="alert alert-danger alert-dismissable">
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							 <div style="text-align:center; font-size:50px;">No Request now! </div>

				          </div>
			            </div>
						<?php
						 	}
						?>	

                </table>
            </div>
		</div>
	</div>
		<!-------- End Design of Manage Admin Pannel -------->