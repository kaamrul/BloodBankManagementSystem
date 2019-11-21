<!-------- View blood bank details with blood group & amount -------->
<?php
	$sql = $conn->prepare("SELECT tbl_doner_info.doner_name,tbl_doner_info.doner_phone,blood_request.req_date,blood_request.status FROM tbl_doner_info INNER JOIN blood_request ON tbl_doner_info.doner_id=blood_request.doner_id WHERE blood_request.user_id='".$_SESSION['user_id']."' ORDER By blood_request.request_id DESC");
	$sql->execute();
	$data = $sql->fetchAll();
	 //echo "<pre>";print_r($data);exit;
?>	
<div class="container"> 
  <div class="row"  style="margin-bottom:10px;">
    <div class="col-md-12" style="padding-right:0px !important;padding-left:0px!important;">
	<div class="panel panel-default">	
		<div class="panel-heading bg-info"><p style="font-size:20px;color:green;">Doner Accepted or Rejected Request</p></div>
		<div class="panel-body">		
			<div class="table-responsive">

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Doner name</th>
                            <th>Doner phone</th>                                          
                            <th>Request date</th>                                          
                            <th>Status</th>                                          
                        </tr>
                    </thead>
                    <tbody>
				<?php foreach($data as $v){ ?>
							<tr class="odd gradeX">
								<td><?php echo  $v['doner_name']; ?> </td>
								<td><?php echo  $v['doner_phone']; ?> </td>
								<td><?php echo  $v['req_date']; ?> </td>
								<td><?php echo  $v['status']; ?> </td>
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
