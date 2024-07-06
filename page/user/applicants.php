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



	
<div style="margin-top:40px;">Applicants</div>	
	
	
	
	
			<div class="mnfr1">
				
				
				
						<div class="container">
							
									<div class="cnqtq1">
										<h2>Applicants</h2>
									</div>	
							
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
											<h3>Recent Applicants</h3>
										</div>
										
										
										
								
					<script>
				
						
						for(var i=0; i<10; i++){
							document.write(`
							
									<div class="applied_appicants_mq1">
											<div class="applied_appicants">
							
										<div>
											<img src="/candidates/images/testimonial-01.jpg"/>
										</div>	
															
										<div>
											
												<div><h4>Ben malik</h4></div>
												
												<div>
												
											<figcaption class="cq4wvqwezrg">Content Writer	</figcaption>
												
												</div>
											
											
										</div>	
										
									
						</div>
						
						
						<div class="flgp_2ss1z">
							<a href=""  class="btn_sf13z">წაშლა</a>  <a href=""  class="btn_sf13z">მიღება</a>
						</div>
						
								</div>	
						
						`)}
						
					
		</script>				
										
										
										
										
										
										

									
				</div>











	

			</div>









</div>

	

</div>





		
		
		


1




	

 	<script>
		function relq(loc) {
				console.log(`yeah`)
				window.location = loc;
		}
	</script>
		
		
			<script>
		function relq(loc) {
				console.log(`yeah`)
				window.location = loc;
		}
		
		$(function(){
			  $('select').niceSelect();	
		});
		
	</script>
	
	
	
</body>
</html>
