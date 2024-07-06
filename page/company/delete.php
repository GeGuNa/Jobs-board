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
		<h2 style="font-size: 30px;"> Delete Your Account </h2>
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
						<h4>Deleting your account</h4>
					</div>
					
					
					<div class="card-body">
						<div class="card-body">
							
							<div class="eportledd mb-4">
								<div class="form-check ps-0">
									<p>If you do this act please remember that  every job and post will be removed with you!</p>
								</div>
								
							</div>
							
							
							<form class="mb-3">
								<h6>Enter your current password</h6>
								<input type="password" class="form-control mb-2" placeholder="*********">
								<button class="default-btn">Delete</button>
							</form>
							
							
							<div class="d-flex align-items-start justify-content-start flex-wrap gap-2">
								
							
								<br/>
								<a href="./" class="btn btn-md btn-light-primary fw-medium mb-0">Back</a>
								
								
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
