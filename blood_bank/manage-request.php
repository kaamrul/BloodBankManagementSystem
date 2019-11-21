<!-------- Start Manage Admin Pannel -------->
<?php
	$bank_id = $_SESSION['bank_id'];
	$sql = $conn->prepare("SELECT tbl_request_to_bank.*,tbl_user_info.user_name,tbl_user_info.*,tbl_blood_bank_info.bank_name FROM tbl_request_to_bank,tbl_blood_bank_info,tbl_user_info WHERE tbl_blood_bank_info.bank_id=tbl_request_to_bank.bank_id AND tbl_user_info.user_id=tbl_request_to_bank.user_id AND tbl_request_to_bank.bank_id='$bank_id' AND tbl_request_to_bank.bb_status='pending' ORDER BY tbl_request_to_bank.request_id_bank DESC");
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
				$request_id_bank = $_POST['request_id_bank'];
				$amount = $_POST['amount'];
				$blood_group = $_POST['blood_group'];
				$user_email = $_POST['user_email'];
				$user_name = $_POST['user_name'];
				$bank_name = $_POST['bank_name'];
				$request_id_bank = $_POST['request_id_bank'];
				
					$query = "UPDATE `tbl_request_to_bank` SET `bb_status`='accepted' where request_id_bank='$request_id_bank'";
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
								$mail->Body    = 'Hello! '.$user_name.', '.$bank_name.'has accepted your blood request. You are highly recommanded to print your document with the request number. <br> Your request no: '.$request_id_bank;
								$mail->AltBody = 'blood_request';

								$mail->send();
								//echo 'Message has been sent';
								} catch (Exception $e) {
									echo 'Message could not be sent.';
									echo 'Mailer Error: ' . $mail->ErrorInfo;
								} 
						
						
						$bank_id = $_SESSION['bank_id'];
						$sqll = $conn->prepare("SELECT * FROM blood_details WHERE bank_id='$bank_id'");
						$sqll->execute();
						$dataa = $sqll->fetch(PDO::FETCH_ASSOC);
						//echo "<pre>";print_r($dataa);
						
						if($blood_group=='A+')
						{
							$upamount = $dataa['a_pos']-$amount;
							$query = "UPDATE `blood_details` SET `a_pos`='$upamount' where bank_id='$bank_id'";
							$stmt = $conn->prepare($query);
							$end = $stmt->execute();
						}
						elseif($blood_group=='A-'){
							$upamount = $dataa['a_neg']-$amount;
							$query = "UPDATE `blood_details` SET `a_neg`='$upamount' where bank_id='$bank_id'";
							$stmt = $conn->prepare($query);
							$end = $stmt->execute();
						}
						elseif($blood_group=='B+'){
							$upamount = $dataa['b_pos']-$amount;
							$query = "UPDATE `blood_details` SET `b_pos`='$upamount' where bank_id='$bank_id'";
							$stmt = $conn->prepare($query);
							$end = $stmt->execute();
						}
						elseif($blood_group=='B-'){
							$upamount = $dataa['b_neg']-$amount;
							$query = "UPDATE `blood_details` SET `b_neg`='$upamount' where bank_id='$bank_id'";
							$stmt = $conn->prepare($query);
							$end = $stmt->execute();
						}
						elseif($blood_group=='AB+'){
							$upamount = $dataa['ab_pos']-$amount;
							$query = "UPDATE `blood_details` SET `ab_pos`='$upamount' where bank_id='$bank_id'";
							$stmt = $conn->prepare($query);
							$end = $stmt->execute();
						}elseif($blood_group=='AB-'){
							$upamount = $dataa['ab_neg']-$amount;
							$query = "UPDATE `blood_details` SET `ab_neg`='$upamount' where bank_id='$bank_id'";
							$stmt = $conn->prepare($query);
							$end = $stmt->execute();
						}
						elseif($blood_group=='O+'){
							$upamount = $dataa['o_pos']-$amount;
							$query = "UPDATE `blood_details` SET `o_pos`='$upamount' where bank_id='$bank_id'";
							$stmt = $conn->prepare($query);
							$end = $stmt->execute();
						}
						elseif($blood_group=='O-'){
							$upamount = $dataa['o_neg']-$amount;
							$query = "UPDATE `blood_details` SET `o_neg`='$upamount' where bank_id='$bank_id'";
							$stmt = $conn->prepare($query);
							$end = $stmt->execute();
						}

						$sms = "<h4 style='color:green;'>Approve Successful .........</h4>";
						header("location:index.php?page=manage-request");
				    }
					else
					{
						$sms = "<h4 style='color:red;'>Approve Unsuccessful .........</h4>";
					}
				
			}
			
			
			if(isset($_POST['reject']))
			{
				$request_id_bank = $_POST['request_id_bank'];
				
				$query = "UPDATE `tbl_request_to_bank` SET `bb_status`='rejected' where request_id_bank='$request_id_bank'";
					$stmt = $conn->prepare($query);
					$end = $stmt->execute();
					if($end)
					{
						$sms = "<h4 style='color:green;'>Rejected Successful .........</h4>";
						header("location:index.php?page=manage-request");
				    }
					else
					{
						$sms = "<h4 style='color:red;'>Rejected Unsuccessful .........</h4>";
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
		<div class="panel-heading bg-info"><p style="font-size:20px;color:#000;">Manage Blood Request</p></div>
		<div class="panel-body">
			<div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>User Name</th>                                          
                            <th>Subject</th>                                          
                            <th>Blood Group</th>                                          
                            <th>Blood Amount</th>
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
                                    <td><?php echo  $value['blood_group']; ?></td>                                           
                                    <td><?php echo  $value['amount']; ?></td>                                           
                                    <td><?php echo  $value['require_date']; ?></td>                                           
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
										
										<input type="hidden" name="request_id_bank" value="<?php echo $value['request_id_bank']; ?>">
										<input type="hidden" name="amount" value="<?php echo $value['amount']; ?>">
										<input type="hidden" name="blood_group" value="<?php echo $value['blood_group']; ?>">
										<input type="hidden" name="user_email" value="<?php echo $value['user_email']; ?>">
										<input type="hidden" name="user_name" value="<?php echo $value['user_name']; ?>">
										<input type="hidden" name="user_name" value="<?php echo $value['user_name']; ?>">
										<input type="hidden" name="bank_name" value="<?php echo $value['bank_name']; ?>">
										<input type="hidden" name="request_id_bank" value="<?php echo $value['request_id_bank']; ?>">
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