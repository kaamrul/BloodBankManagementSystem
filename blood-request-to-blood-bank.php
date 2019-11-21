 <?php
$bank_id = $_GET['id'];

$sql = $conn->prepare("SELECT * FROM tbl_blood_bank_info WHERE bank_id ='$bank_id'");
	$sql->execute();
	$data = $sql->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['btn'])) {
    $subject = $_POST['subject'];
	$req_date = $_POST['req_date'];
	$blood_group = $_POST['blood_group'];
	$amount = $_POST['amount'];
    $message = $_POST['message'];
    $bank_name= $data['bank_name'];
    $bank_email= $data['bank_email'];
    $bank_id = $_GET['id'];

	//$user_id = $_SESSION['user_id'];
	if(isset($_SESSION['user_id']))
	{
		if (!empty($subject) && !empty($message) && !empty($amount)) {
					$data = array($bank_id,$_SESSION['user_id'], $subject,$req_date,$blood_group,$amount,$message);
					$sql = "insert into tbl_request_to_bank(bank_id,user_id,subject,require_date,blood_group,amount,message)values(?,?,?,?,?,?,?)";
					$stmt = $conn->prepare($sql);
					$end = $stmt->execute($data);
					if ($end) {
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
								$mail->addAddress($bank_email, $bank_name);     // Add a recipient					
								$mail->addReplyTo('info@example.com', 'Information');
								$mail->addCC('cc@example.com');
								$mail->addBCC('bcc@example.com');

								//Attachments
								//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
								//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

								//Content
								$mail->isHTML(true);                                  // Set email format to HTML
								$mail->Subject = $subject;
								$mail->Body    = 'Hello! '.$bank_name.', '.$message.'Require date: '.$req_date;
								$mail->AltBody = 'blood_request';

								$mail->send();
								//echo 'Message has been sent';
								} catch (Exception $e) {
									echo 'Message could not be sent.';
									echo 'Mailer Error: ' . $mail->ErrorInfo;
								} 
		   
					           $sms = '<div class="alert alert-success alert-dismissable" style="text-align:center; font-size:25px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong> Blood Request submitted!</strong> </div>';
										} else {
						$sms = '<div class="alert alert-danger alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Indicates a unsuccessful or negative action.</div>';
					}
		} else {
			$sms = '<div class="alert alert-warning alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Sorry you must fillup all the field .....</div>';
		}
	}else{
		$sms = '<div class="alert alert-warning alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Sorry you must have sign in ......</div>';
	}
}
?>	
	
	<!---------------------- Start User Registration form -------------------->		

        <div class="container"> 
            <div class="row"  style="padding:0px 90px 20px 90px;background:#f4f4f4;">
			<?php if(isset($sms)){echo $sms;} ?>
				<div class="col-sm-12" align="center"style="color:#2328E1;padding-top:0px!important; padding-bottom:20px!important;"><h2>Send Your Request & Email</h2></div>
					
					<form method="post" action="" enctype="multipart/form-data">
						<div class="row">
							<div class="form-group">
								<label class="control-label col-sm-2 col-sm-offset-1" for="name">Subject</label>
								<label class="control-label col-sm-1" for="name">:</label>
								<div class="col-sm-6 col-sm-offset-1">
									<input type="input" class="form-control" name="subject" id="subject" placeholder="Enter Subject">
								</div>
							</div>
						</div>
						<br>
						
						<div class="row">
							<div class="form-group">
								<label class="control-label col-sm-2 col-sm-offset-1" for="name">Required Date</label>
								<label class="control-label col-sm-1" for="name">:</label>
								<div class="col-sm-6 col-sm-offset-1">
									<input type="date" class="form-control" name="req_date" id="req_date" placeholder="Enter Date:">
								</div>
							</div>
						</div>
						<br>
						
						<div class="row">
							<div class="form-group">
								<label class="control-label col-sm-2 col-sm-offset-1" for="blood_group">Blood Group</label>
								<label class="control-label col-sm-1" for="blood_group">:</label>
								<div class="col-sm-6 col-sm-offset-1">
									<select class="form-control" name="blood_group" id="blood_group">
										<option>Select Blood Group</option>
										<option>A+</option>
										<option>A-</option>										
										<option>B+</option>										
										<option>B-</option>										
										<option>O+</option>										
										<option>O-</option>										
										<option>AB+</option>										
										<option>AB-</option>										
									</select>	
								</div>
							</div>
						</div>
						<br>
						
						<div class="row">
							<div class="form-group">
								<label class="control-label col-sm-2 col-sm-offset-1" for="amount">Amount Blood</label>
								<label class="control-label col-sm-1" for="amount">:</label>
								<div class="col-sm-6 col-sm-offset-1">
									<input type="number" class="form-control" name="amount" id="amount" placeholder="Enter Amount:">
								</div>
							</div>
						</div>
						<br>
						
						<div class="row">
							<div class="form-group">
								<label class="control-label col-sm-2 col-sm-offset-1" for="message">Message</label>
								<label class="control-label col-sm-1" for="message">:</label>
								<div class="col-sm-6 col-sm-offset-1">
									<textarea class="form-control" name="message" rows="5" id="message" placeholder="Enter Message"></textarea>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="form-group">
								<label class="control-label col-sm-4" for="message"></label>
								<div class="col-sm-6 col-sm-offset-1">
									<button class="btn btn-primary" type="submit" name="btn">Send Request</button>
								</div>
							</div>
						</div>
						
					</form>
            </div>
        </div>
		<!------------------------ End Doner Registration form ------------------>