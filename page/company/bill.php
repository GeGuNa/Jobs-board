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
		<h2 style="font-size: 30px;"> Balance </h2>
</div>

</div>	
	


<div class="container">

		<div class="dashboard">

			<div class="w25">
				
				
				<?php include("left.php");?>	
				
						
					
			</div>
			
			
			
			<div class="w75">
				
			
				
				
								
			<div class="card rounded-3 mb-4 mm_top251">
				
					<div class="card-header">
						<h4>Filling the balance</h4>
					</div>
					
					
					<div class="card-body">
						<div class="card-body">
							
							<div class="eportledd mb-4">
								<div class="form-check ps-0">
									<p>Your balance <b>00.00 GEL</b></p>
								</div>
								
							</div>
							
							
							<form class="mb-3">
								<h6>Please enter how much do you want to take here?</h6>
								<input type="text" class="form-control mb-2" placeholder="How much">
								<button class="default-btn">Next step</button>
							</form>
							
							
							<div class="">
								
							<div>Please before filling the balance read the rules !!!</div>
							<div> 
								<a href="#" class="rules_1">Our Rules</a></div>
							
								
								
								
							</div>

						</div>
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
