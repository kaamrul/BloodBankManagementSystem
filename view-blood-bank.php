<!-------- View blood bank details with blood group & amount -------->
<?php
	$id = $_GET['id'];
	$sql = $conn->prepare("SELECT tbl_blood_bank_info.bank_id,tbl_blood_bank_info.bank_name,tbl_blood_bank_info.address,tbl_blood_bank_info.address,tbl_blood_bank_info.bank_email,tbl_blood_bank_info.phone_no,blood_details.a_pos,blood_details.a_neg,blood_details.b_pos,blood_details.b_neg,blood_details.ab_pos,blood_details.ab_neg,blood_details.o_pos,blood_details.o_neg  FROM tbl_blood_bank_info INNER JOIN blood_details ON tbl_blood_bank_info.bank_id=blood_details.bank_id WHERE tbl_blood_bank_info.bank_id='$id' && blood_details.bank_id='$id'");
	$sql->execute();
	$data = $sql->fetch(PDO::FETCH_ASSOC);
	 //echo "<pre>";print_r($data);exit;
?>	
<div class="container"> 
  <div class="row"  style="margin-bottom:10px;">
    <div class="col-md-12" style="padding-right:0px !important;padding-left:0px!important;">
	<div class="panel panel-default">	
		<div class="panel-heading bg-info"><p style="font-size:20px;color:green;">Bank Details With Blood Group & Blood Amount</p></div>
		<div class="panel-body">		
			<div class="table-responsive">
			
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <tr>
                            <th>Bank name</th>
                            <td><?php echo  $data['bank_name']; ?></td>                                          
                        </tr>
						
                        <tr>
                            <th>Address</th>
                            <td><?php echo  $data['address']; ?></td>                                          
                        </tr>
						
                        <tr>
                            <th>Email</th>
                            <td><?php echo  $data['bank_email']; ?></td>                                          
                        </tr>
						
                        <tr>
                            <th>Contact numbber</th>
                            <td><?php echo  $data['phone_no']; ?></td>                                          
                        </tr>
						
                    </table>
					
	     	<div class="panel-heading bg-info"><p style="font-size:20px;color:green;">Blood Amount (Number of Bags)</p></div>			
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>A +</th>
                            <th>A -</th>                                          
                            <th>B +</th>                                          
                            <th>B -</th>
                            <th>AB +</th>
                            <th>AB -</th>
                            <th>O +</th>
                            <th>O -</th>
                        </tr>
                    </thead>
                    <tbody>
		
							<tr class="odd gradeX">
								<td><?php echo  $data['a_pos']; ?> </td>
								<td><?php echo  $data['a_neg']; ?> </td>
								<td><?php echo  $data['b_pos']; ?> </td>
								<td><?php echo  $data['b_neg']; ?> </td>
								<td><?php echo  $data['ab_pos']; ?> </td>
								<td><?php echo  $data['ab_neg']; ?> </td>
								<td><?php echo  $data['o_pos']; ?> </td>
								<td><?php echo  $data['o_neg']; ?> </td>
                           </tr>
                    </tbody>
					
                </table>
				<a href="index.php?page=blood-request-to-blood-bank&id=<?php echo $data['bank_id']; ?>" class="btn btn-success">Send Request</a>
            </div>
        </div>
	</div>
</div>
</div>
</div>
