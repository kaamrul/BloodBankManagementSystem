<!-------- View blood bank details with blood group & amount -------->
<?php
	$sql = $conn->prepare("SELECT tbl_blood_bank_info.bank_name,tbl_blood_bank_info.phone_no,tbl_request_to_bank.require_date,tbl_request_to_bank.bb_status,tbl_request_to_bank.blood_group,tbl_request_to_bank.amount FROM tbl_blood_bank_info INNER JOIN tbl_request_to_bank ON tbl_blood_bank_info.bank_id=tbl_request_to_bank.bank_id WHERE tbl_request_to_bank.user_id='".$_SESSION['user_id']."' ORDER BY `request_id_bank` DESC");
	$sql->execute();
	$data = $sql->fetchAll();
	 //echo "<pre>";print_r($data);exit;
?>	
<div class="container"> 
  <div class="row"  style="margin-bottom:10px;">
    <div class="col-md-12" style="padding-right:0px !important;padding-left:0px!important;">
	<div class="panel panel-default">	
		<div class="panel-heading bg-info"><p style="font-size:20px;color:green;">Blood Bank Accepted or Rejected Request</p></div>
		<div class="panel-body">		
			<div class="table-responsive">

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Bank Name</th>
                            <th>Bank phone</th>                                          
                            <th>Blood Group</th>                                          
                            <th>Blood Amount</th>                                          
                            <th>Require date</th>                                          
                            <th>Status</th>                                          
                        </tr>
                    </thead>
                    <tbody>
				<?php foreach($data as $v){ ?>
							<tr class="odd gradeX">
								<td><?php echo  $v['bank_name']; ?> </td>
								<td><?php echo  $v['phone_no']; ?> </td>
								<td><?php echo  $v['blood_group']; ?> </td>
								<td><?php echo  $v['amount']; ?> </td>
								<td><?php echo  $v['require_date']; ?> </td>
								<td><?php echo  $v['bb_status']; ?> </td>
                           </tr>
						   <?php
				}
						   ?>
                    </tbody>
                </table>
            </div>
        </div>
	</div>
</div>
</div>
</div>
