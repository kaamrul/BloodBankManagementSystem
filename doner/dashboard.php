
<div class="panel panel-default">
	<div class="panel-heading bg-info"><p style="font-size:20px;color:green;">Dashboard</p></div>
	<div class="panel-body">
		<div class="col-md-12 box" style="height:370px;padding:5px;">
		<?php
			if( $value['activation_status']== '0') {
            // Now update activation status of donor
          ?>
			<div class="col-md-12 col-lg-11 col-lg-offset-1">
				<div class="alert alert-danger ">
				   
				 	 <div style="text-align:center; font-size:40px;">  you are not still fit for donation!! </div>

				</div>
			</div>
			
         <?php
            
        } else {
			
			?>
			<div class="col-md-12 col-lg-11 col-lg-offset-1">
				<div class="alert alert-success ">
				   
				 	 <div style="text-align:center; font-size:50px;">  you are now fit for donation!! </div>

				</div>
			</div>
		 <?php	
		}
		?>
		</div>
		
		
	</div>
	
</div>
