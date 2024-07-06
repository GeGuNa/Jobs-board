<?php
	include("../../inc/inc.php");
	include("../../inc/db.php");
?>


<?php 


	if (!isset($user)) {
		redirection("/");
	}
	
	if ($user['user_type'] != "company") {
		redirection("/");
	}
	
?>




<?php  include("../../inc/header.php"); ?>




<div class="pheadr1">
	
<div class="llkqk_22">
		<h2 style="font-size: 30px;"> Transacations </h2>
</div>

</div>	
	


<div class="container">

		<div class="dashboard">

			<div class="w25">
				
					<?php include("left.php");?>
			</div>
			
			
			
			<div class="w75">
				
				
				
				<div style="margin-top: 30px;"></div>

					
					
					
						
			<div class="table-responsive">
                                    <table class="table twm-table table-striped table-borderless">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Type</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Payment Method</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                    
                                        <tbody>
                                            <tr>
                                                <td class="order-id text-primary">#123</td>
                                                <td class="job-name"><a href="javascript:void(0);">Social Media Expert</a></td>
                                                <td class="amount text-primary">$99</td>
                                                <td class="date">18/08/2023</td>
                                                <td class="transfer">Paypal</td>
                                                <td class="expired">
                                                    <span class="text-clr-green2">Successful </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="order-id text-primary">#456</td>
                                                <td class="job-name"><a href="javascript:void(0);">Web Designer</a></td>
                                                <td class="amount text-primary">$199</td>
                                                <td class="date">12/07/2023</td>
                                                <td class="transfer">Bank Transfer</td>
                                                <td class="expired">
                                                    <span class="text-clr-yellow">Pending</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="order-id text-primary">#789</td>
                                                <td class="job-name"><a href="javascript:void(0);">Finance Accountant</a></td>
                                                <td class="amount text-primary">$299</td>
                                                <td class="date">10/07/2023</td>
                                                <td class="transfer">Paypal</td>
                                                <td class="expired">
                                                    <span class="text-clr-red">Rejects</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="order-id text-primary">#101</td>
                                                <td class="job-name"><a href="javascript:void(0);">Social Media Expert</a></td>
                                                <td class="amount text-primary">$399</td>
                                                <td class="date">28/06/2023</td>
                                                <td class="transfer">Bank Transfer</td>
                                                <td class="expired">
                                                    <span class="text-clr-green2">Successful </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="order-id text-primary">#112</td>
                                                <td class="job-name"><a href="javascript:void(0);">Web Designer</a></td>
                                                <td class="amount text-primary">$499</td>
                                                <td class="date">18/06/2023</td>
                                                <td class="transfer">Paypal</td>
                                                <td class="expired">
                                                    <span class="text-clr-yellow">Pending</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="order-id text-primary">#987</td>
                                                <td class="job-name"><a href="javascript:void(0);">Finance Accountant</a></td>
                                                <td class="amount text-primary">$599</td>
                                                <td class="date">12/06/2023</td>
                                                <td class="transfer">Bank Transfer</td>
                                                <td class="expired">
                                                    <span class="text-clr-green2">Successful </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="order-id text-primary">#654</td>
                                                <td class="job-name"><a href="javascript:void(0);">Social Media Expert</a></td>
                                                <td class="amount text-primary">$699</td>
                                                <td class="date">10/06/2023</td>
                                                <td class="transfer">Paypal</td>
                                                <td class="expired">
                                                    <span class="text-clr-green2">Successful </span>
                                                </td>
                                            </tr>
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>	
	
				
	

<div class="col-12">
<div class="pagination-area">




</div>
</div>

					
			
			</div>





		</div>

</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	<style>
	
	.user-area h3 {
	font-size:20px !important;
	    padding: 16px 30px !important;
	}
	</style>




<?php  include("../../inc/footer.php"); ?>
