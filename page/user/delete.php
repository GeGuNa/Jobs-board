<?php
	include("../../inc/inc.php");
	include("../../inc/db.php");
?>


<?php 


	if (!isset($user)) {
		redirection("/");
	}
	
	if ($user['user_type'] != "candidate") {
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

				<?php  include("left.php"); ?>
	
</div>	
	
			
			
			<div class="w75">
				
			
				
				
								
			<div class="card rounded-3 mb-4 mm_top251">
				
					<div class="card-header">
						<h4>ანგარიშის წაშლა</h4>
					</div>
					
					
					<div class="card-body">
						<div class="card-body">
							
							<div class="eportledd mb-4">
								<div class="form-check ps-0">
									<p>ანგარიშის წაშლის შემდეგ თქვენს მიერ განთავსებული ყველა ვაკანსია წაიშლება ასე რომ ფრთხილად იყავით სანამ წაშლას გადაწყვეტთ !</p>
								</div>
								
							</div>
							
							
							<form class="mb-3">
								<h6>მიუთითეთ პაროლი</h6>
								<input type="password" class="form-control mb-2" placeholder="*********">
								<button class="default-btn">წაშლა</button>
							</form>
							
							
							<div class="d-flex align-items-start justify-content-start flex-wrap gap-2">
								
							
								<br/>
								<a href="./" class="btn btn-md btn-light-primary fw-medium mb-0">უკან</a>
								
								
							</div>

						</div>
					</div>
				</div>			
				
					
	
					
					
					
					
					
			
			</div>






		</div>

</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
 	<script>
		function relq(loc) {
				console.log(`yeah`)
				window.location = loc;
		}
		
		$(function(){
			  $('select').niceSelect();	
		});
		
	</script>
		

	
	<style>
	
	.user-area h3 {
	font-size:20px !important;
	    padding: 16px 30px !important;
	}
	</style>
	
</body>
</html>
