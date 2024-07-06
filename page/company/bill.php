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
		<h2 style="font-size: 30px;"> თანხა ბალანსზე </h2>
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
						<h4>თანხის შემოტანა</h4>
					</div>
					
					
					<div class="card-body">
						<div class="card-body">
							
							<div class="eportledd mb-4">
								<div class="form-check ps-0">
									<p>თქვენი ბალანსი <b>15.05 ლარი</b></p>
								</div>
								
							</div>
							
							
							<form class="mb-3">
								<h6>მიუთითეთ სასურველი თანხა</h6>
								<input type="text" class="form-control mb-2" placeholder="*********">
								<button class="default-btn">შემდეგი</button>
							</form>
							
							
							<div class="">
								
							<div>ბალანსის შევსებამდე გთხოვთ წაიკითხეთ აუცილებლად !!!</div>
							<div> 
								<a href="./" class="rules_1">წესები</a></div>
							
								
								
								
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
