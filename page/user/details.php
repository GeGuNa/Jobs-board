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
		
		<div class="hdng">
				<div class="container">
					<h2 style="font-size: 30px;"> Candidates Details </h2>
				</div>
		</div>

	</div>	
	


<div class="bw100">






<div class="container">
	
<div class="row justify-content-center">
	
	
	
	<div class="col-lg-8">

<div class="col-12">
	
				<div class="job_1">
					<div class="row align-items-center">
						
						<div class="col-lg-2">
												<a href="employers-details.html" class="hot-jobs-img">
													<img src="/candidants/images/candidates-listing-1.jpg" alt="Image">
												</a>
											</div>
											
											
						<div class="col-lg-5">
												<div class="hot-jobs-content">
													<h3>Randall Guerrero </h3>
													<span class="sub-title">UX/UI Designer</span>
													<ul>
														<li><span>Location:</span> New York</li>
													</ul>
												</div>
											</div>
											
								
						
						
						
						
						
						
					</div>
					

					
					
					
					
					
					
					
					
				</div>
				
				
				
				
				
			</div>			
			
			
			
		
<div class="wdg1z">
	
	<h3>About Me</h3>

	<p>
	Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur
	</p>
	
	
<h3>Education</h3>

<ul class="li1">
								<li class="arts">Masters in Fine Arts</li>
								<li class="university">Walters University (2015-2016)</li>
								<li class="summary">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</li>
							</ul>



<ul class="li1">
								<li class="arts">Bachlors in Fine Arts</li>
								<li class="university">University of California (2010-2014)</li>
								<li class="summary">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</li>
							</ul>
							
							
							
<ul class="li1">
								<li class="arts">Diploma in Fine Arts</li>
								<li class="university">Berkeley Institute of Art Direction (2006-2010)</li>
								<li class="summary">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</li>
							</ul>
							
							
<h3>Work Experience</h3>

<ul class="li1">
								<li class="arts">Sr. UX/UI Designer</li>
								<li class="university">Xpart Solutions (2018-2021)</li>
								<li class="summary">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</li>
							</ul>
							
							
<ul class="li1">
								<li class="arts">Product Designer</li>
								<li class="university">Design house (2016-2017)</li>
								<li class="summary">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</li>
							</ul>
							
							
<h4 class="mrh4">Personal Skills</h4>

<div class="all-skill-bar">
								<div class="skill-bar" data-percentage="100%">
									<h4 class="progress-title-holder">
										<span class="progress-title">Photoshop</span>
										<span class="progress-number-wrapper">
											<span class="progress-number-mark" style="left: 100%;">
												<span class="percent">100%</span>
												<span class="down-arrow"></span>
											</span>
										</span>
									</h4>
		
									<div class="progress-content-outter">
										<div class="progress-content" style="width: 100%;"></div>
									</div>
								</div>
		
								<div class="skill-bar" data-percentage="90%">
									<h4 class="progress-title-holder clearfix">
										<span class="progress-title">After Effects</span>
										<span class="progress-number-wrapper">
											<span class="progress-number-mark" style="left: 90%;">
												<span class="percent">90%</span>
												<span class="down-arrow"></span>
											</span>
										</span>
									</h4>
		
									<div class="progress-content-outter">
										<div class="progress-content" style="width: 90%;"></div>
									</div>
								</div>
		
								<div class="skill-bar" data-percentage="85%">
									<h4 class="progress-title-holder clearfix">
										<span class="progress-title">Indesign</span>
										<span class="progress-number-wrapper">
											<span class="progress-number-mark" style="left: 85%;">
												<span class="percent">85%</span>
												<span class="down-arrow"></span>
											</span>
										</span>
									</h4>
		
									<div class="progress-content-outter">
										<div class="progress-content" style="width: 85%;"></div>
									</div>
								</div> 
		
								<div class="skill-bar mb-0" data-percentage="60%">
									<h4 class="progress-title-holder clearfix">
										<span class="progress-title">HTML &amp; CSS</span>
										<span class="progress-number-wrapper">
											<span class="progress-number-mark" style="left: 60%;">
												<span class="percent">60%</span>
												<span class="down-arrow"></span>
											</span>
										</span>
									</h4>
		
									<div class="progress-content-outter">
										<div class="progress-content" style="width: 60%;"></div>
									</div>
								</div> 
							</div>																			
													
							




</div>		
		
		
		
		
		
		
		
		
		
		
		
		
			
			
								
	</div>	

<div class="col-lg-4">
	
	
	<div class="col-lg-12">
	
	
	<div class="widg_1">
		
		<h3>Social networks</h3>
	
	<div class="rest">
		
<div class="nav">
		<a class="btn btn-primary-soft icon-sm p-0 me-2" href="#"><i class="fab fa-facebook-f"></i></a> 
		<a class="btn btn-primary-soft icon-sm p-0 me-2" href="#"><i class="fab fa-twitter"></i></a> 
		<a class="btn btn-primary-soft icon-sm p-0 me-2" href="#"><i class="fab fa-linkedin-in"></i></a> 
		<a class="btn btn-primary-soft icon-sm p-0 me-2" href="#"><i class="fab fa-instagram"></i></a>
		<a class="btn btn-primary-soft icon-sm p-0 me-2" href="#"><i class="fab fa-tiktok"></i></a>
		<a class="btn btn-primary-soft icon-sm p-0 me-2" href="#"><i class="fab fa-youtube"></i></a>
	</div>		
		
	</div>
	
	</div>
	
	</div>	
	
	
		
	<div class="col-lg-12 mrtt_25">
	
	
	<div class="widg_1">
		
		<h3>Contact Information</h3>
	
	<div class="rest2">
		
				<ul class="overview">
	
									<li>
										Location
										<span>: Georgia, Batumi</span>
									</li>
									<li>
										Email
										<a href="mailto:info@admin.com"><span>: info@admin.com</span></a>
									</li>
									<li>
										Phone
										<a href="tel:+1-(514)-7939-357"><span>: +995 757 939-357</span></a>
									</li>
									<li>
										Website
										<a href="https://templates.envytheme.com/finix/default/index.html"><span>: www.admin.com</span></a>
									</li>
								</ul>
		
	</div>
	
	</div>
	
	</div>	
	
	
	
	
<div class="col-lg-12 mrtt_25">
	
	
	<div class="widg_1">
		
		<h3>Personal details</h3>
	
	<div class="rest2">
		
				<ul class="overview">
	
					<li>Name <span>: Whoknows</span></li>
									
					<li>Surname <span>: Beridze</span></li>
									
					<li> Birth date <span>: 10/10/2001</span></li>
					<li> Languages <span>: English, Georgian</span></li>
					<li> Gender <span>: Male</span></li>
	
	

								</ul>
		
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
		

	
	
</body>
</html>
