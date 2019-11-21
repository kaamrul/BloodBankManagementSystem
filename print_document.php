<?php
session_start();
require("db_connect/connection.php");	
require('fpdf/fpdf.php');

    $request_id_bank= $_POST['request_id_bank'];
    $user_id= $_SESSION['user_id'];
	
	$sql = $conn->prepare("SELECT * FROM tbl_user_info,tbl_request_to_bank,tbl_blood_bank_info WHERE tbl_request_to_bank.bank_id=tbl_blood_bank_info.bank_id AND tbl_user_info.user_id=tbl_request_to_bank.user_id AND tbl_request_to_bank.bb_status='accepted' AND tbl_request_to_bank.user_id='$user_id' AND tbl_request_to_bank.request_id_bank='$request_id_bank'");
	$sql->execute();		
	$data = $sql->fetch(PDO::FETCH_ASSOC);	
	
	//echo "<pre>";print_r($data); exit;
		
if ($data['bb_status'] == 'accepted')
 {
$pdf= new FPDF('P', 'mm', 'A4');

$pdf->AddPage();
//$this->Image('agent/agent_img/logo.jpg',10,6,30);
$pdf-> Cell(65);
$pdf->SetFont('Arial','B','20');
$pdf->Write(8,'Blood Bank System');
$pdf->Ln();
$pdf->Write(5, '_______________________________________________');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B','16');
$pdf->Cell(185,15,'Blood Request Details',1,1);
$pdf->SetFont('Arial','','12');
$pdf->Cell(65,10,'Request No:',1,0);
$pdf->SetFont('Arial','','12');
$pdf->Cell(120,10,$data['request_id_bank'],1,1);
$pdf->Cell(65,10,'Blood Bank Name:',1,0);
$pdf->Cell(120,10,$data['bank_name'],1,1);
$pdf->Cell(65,10,'Contact No:',1,0);
$pdf->Cell(120,10,$data['phone_no'],1,1);
$pdf->Cell(65,10,'Email:',1,0);
$pdf->Cell(120,10,$data['bank_email'],1,1);
$pdf->Cell(65,10,'Blood Group:',1,0);
$pdf->Cell(120,10,$data['blood_group'],1,1);
$pdf->Cell(65,10,'Blood Amount:',1,0);
$pdf->Cell(120,10,$data['amount'],1,1);
$pdf->Cell(65,10,'Require Date',1,0);
$pdf->Cell(120,10,$data['require_date'],1,1);

$pdf->Ln();
$pdf->SetFont('Arial','B','16');
$pdf->Cell(185,15,'Receiver Details',1,1);
$pdf->SetFont('Arial','','12');
$pdf->Cell(65,10,'Receiver Name:',1,0);
$pdf->Cell(120,10,$data['user_name'],1,1);
$pdf->Cell(65,10,'Contact No:',1,0);
$pdf->Cell(120,10,$data['phone_number'],1,1);
$pdf->Cell(65,10,'Email:',1,0);
$pdf->Cell(120,10,$data['user_email'],1,1);

$pdf-> Cell(0);
$pdf->SetFont('Arial','B','12');
$pdf->Write(8,'Notes:');
$pdf->SetFont('Times','',8,1);
$pdf->Write(5, '__________________________________________________________________________________________________________________________________');
$pdf->Ln();
$pdf->SetFont('Times','',11,1);
$pdf->Cell(65,5,'* This document is valid only for the request specified herein.',0,1);
$pdf->Cell(65,5,'* This document should be carried by the reciever whose name is mentioned above.',0,1);
$pdf->Cell(65,5,'* Please show the document to the blood bank.',0,1);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf-> Cell(50);
$pdf->SetFont('Arial','B','12');
$pdf->Write(8,'Thank you for choosing our service!');
	
$pdf->Output();

} 

elseif($data['bb_status'] == 'pending'){
	
	echo "Your request is still pendin. ";
	
?>
	<a href="index.php">Back to Home</a>
<?php
  }

elseif($data['booking_status'] == 'rejected'){
	
	echo "Your request was rejected. ";
?>
  <a href="index.php">Back to Home</a>
  
<?php

}


else {
	echo "Sorry! Document Not Found.";
	?>
	<a href="index.php">Back to Home</a>
	
<?php
}
?>