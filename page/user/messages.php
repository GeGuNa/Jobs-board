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
		<h2 style="font-size: 30px;"> შეტყობინებები </h2>
</div>

</div>	
	


<div class="container">

		<div class="dashboard">

			<div class="w25">

				<?php  include("left.php"); ?>
	
</div>	
	
			
			
			
			<div class="w75">
				
			
					
				
	<div class="ddwidget ddwmtop">
						
						<div class="descq1">
							<h3>Inbox</h3>
						</div>
						
						
			
					
					<script>
				
						
						for(var i=0; i<10; i++){
							document.write(`
							
<div class="applied_appicants_mq1 brd_ddlq_21">
									
					<div class="qszappicantsqs">
							
								<div>
								
								

								<div class="qszappiczqantsqs21">
										<div><img class="bzqb_rq3qq1_qo1p_qp" src="/employers/images/com-3.png"/></div>
								
										<div>
											
												<div>
													<h6>მარიამ კობერიძე</h6>
												</div>
												
												<div>
												
												<span>
													<i class="fa-solid fa-reply me-2"></i> Hi, როგორ ხარ? ....
												</span>
												
												</div>
											
											
										</div>		
								
								
								</div>
											
											
											
											
											
											
									</div>	
															
									
									
										<div class="flend21">
											<a href=""  class="btn3_sf133z">
													
													<span class="material-symbols-outlined">delete</span>
											
											</a>
										</div>
									
										
									
						</div>
						
						
					
					
						
								</div>	
						
						`)
							
						}
						
					
					
					</script>
							
	
						
						
							
	
						
						
							
	
						
						
							
	
						
						
							
	
						
						
							
	
						
			
							
	
						
						
					
			
						
					
					</div>
								
						
				
					
						
	<div class="col-12">
									<div class="pagination-area">
										<span class="page-numbers current" aria-current="page">1</span>
										<a href="#" class="page-numbers">2</a>
										<a href="#" class="page-numbers">3</a>
										
										<a href="#" class="next page-numbers">
											&gt;
										</a>
									</div>
								</div>
								
		
		<div style="margin-bottom:30px;"></div>			
					
					
					
			
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
