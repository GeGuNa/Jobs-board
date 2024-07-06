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
		<h2 style="font-size: 30px;"> Post New Job </h2>
</div>

</div>	
	


<div class="container">

		<div class="dashboard">

		<div class="w25">

				<?php  include("left.php"); ?>
	
</div>	
	
			
			
			
			<div class="w75">
				
				
				
					<div class="ddwidget">
						
						<div class="descq1">
							<h3>Post a New Job</h3>
						</div>
						
						
				
					<div class="forms">
						
					
					<!-- -->	
						<div class="div_50 mrbottom20">
							
			
							<label>Job Title </label>                        
							<input type="text" name="u_firstname" value="Zeeva Hiring" required="">
				  
							
						</div>
						
		
						<div class="div_100 mrbottom20">
							

							<label>Job description</label>                        
							<textarea id="txttinycme"></textarea>

							
						</div>		
						
						
						<div class="div_100 mrbottom20">
							
			
							<label>Required Skills</label>                        
							<input type="text" name="u_firstname" value="" required="">
				  
							
						</div>
						
				<div class="div_100 mrbottom20">
					<div class="row">
						
						<div class="col-lg-4">
							<label>Deadline </label>
							<input type="text" name="u_firstname" value="" required="">
						</div>
				
						<div class="col-lg-4">
							<label>Job Category  </label>
							<select>
								<option value="1">IT & Software</option>
								<option value="1">Accounting</option>
								<option value="1">Developer</option>
								<option value="1">Enginer</option>
								<option value="1">Education</option>
							</select>
						</div>
						
						
						<div class="col-lg-4">
							<label>Job Type </label>
							<select>
								<option value="1">Freelance</option>
								<option value="1">Full time</option>
								<option value="1">Part time</option>
								<option value="1">Remote</option>
							</select>
						</div>				
				
						
					</div>
				</div>	
				
				
						<div class="div_100 mrbottom20">
							
							<div class="row">
								<div class="col-lg-6">
										<label>Salary</label>                        
										<select>
											<option value="1">Weekly</option>
											<option value="1">Monthly</option>
											<option value="1">Hourly</option>
											<option value="1">Negotiable</option>
										</select>
								</div>
					
					
								<div class="col-lg-3">
										<label>Min</label>                        
										<input type="text" placeholder="Min" name="u_firstname" value="" required="">
								</div>					
					
					
							<div class="col-lg-3">
										<label>Max</label>                        
										<input type="text" placeholder="Max" name="u_firstname" value="" required="">
								</div>
							
							</div>
							
						</div>
				
				
				<!-- -->
				
				
				
				
				
				
					
					</div>
	
	
		
						
					</div>
					
					
	
	
	
	
	<div class="ddwidget">
					<div class="descq1">
							<h3>Address / Location</h3>
					</div>
	
	
	
			<div class="forms">
									
				
				<div class="ffll_xnew clm-gp4">
					
					
					<div class="dividing48">
						<label>Country </label>
										<select>
											<option value="1">Georgia</option>
											<option value="1">USA</option>
											<option value="1">Eu</option>
											<option value="1">Other</option>
										</select>
					</div>
				
				
				
					<div class="dividing48">
						<label>State </label>
										<select>
											<option value="1"></option>
											<option value="1">Adjara</option>
											<option value="1">Guria</option>
										</select>
					</div>	
				
			
			
					
				<div class="dividing48">
						<label>  City  </label>
										<select>
											<option value="1">Tbilisi</option>
											<option value="1">Batumi</option>
											<option value="1">Qobuleti</option>
										</select>
					</div>	
				
				
							
				<div class="dividing48">
									<label>Postal Code </label>
										<input id="" type="text" class="" name="" value="">
					</div>	
					
				
						
					<div class="dividing100">
									<label>Full Address </label>
									<input id="" type="text" class="" name="" value="">
					</div>	
							
				
				
				
				
				
				</div>
				
				
			</div>
	
</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
						
	
	<div class="ddwidget">
					<div class="descq1">
							<h3>Other Information</h3>
					</div>
	
	
	
			<div class="forms">
									
				
				<div class="ffll_xnew clm-gp4">
					
					
					<div class="dividing48">
						<label>Career Level </label>
										<select>
											<option value="1">Manager</option>
											<option value="1">Officer</option>
											<option value="1">Student</option>
											<option value="1">Executive</option>
											<option value="1">Other</option>
										</select>
					</div>
				
				
				
					<div class="dividing48">
						<label>Experience </label>
										<select>
											<option value="1">Fresh</option>
											<option value="1">Less than 1 year</option>
											<option value="1">2 year</option>
											<option value="1">3 year</option>
											<option value="1">Other</option>
										</select>
					</div>	
				
			
			
					
				<div class="dividing48">
						<label>Gender  </label>
										<select>
											<option value="1">Male</option>
											<option value="1">Female</option>
											<option value="1">Doesn't matter</option>
										</select>
					</div>	
				
				
							
				<div class="dividing48">
									<label>Industry </label>
										<select>
											<option value="1">Development</option>
											<option value="1">Finance</option>
											<option value="1">Seo</option>
											<option value="1">Banking</option>
											<option value="1">Programming</option>
										</select>
					</div>	
					
				
						
					<div class="dividing100">
									<label>Qualifications </label>
										<select style="width:100%;">
											<option value="1">Certificate</option>
											<option value="1">Diploma</option>
											<option value="1">Associate</option>
											<option value="1">Bachelors degree</option>
											<option value="1">Masters degree</option>
										</select>
					</div>	
							
				
				
				
				
				
				</div>
				
				
			</div>
	
</div>	
	
	

	
				
	
		
		
		
	<div style="margin-bottom:15px;">
		<input type="submit" class="jobsearch-employer-profile-submit" value="Update password">
	</div>	
		
		
					
			
			</div>





		</div>

</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
<div class="footer">

	<div class="ftrVisualisation">
		<div class="row">
			
			
			
		<div class="col-lg-3">
				<h2 class="title"><img src="/assets/images/partner-5.png"/></h2>
				
				<div class="pp_dd1a"><p class="eehzq">Call us</p></div>
				<div><span class="eehzq2">123 456 7890</span></div>
				
					<div class="mmrqqsd_14">
									<p>328 Queensberry Street, North caroline VIC</p>
									<p>3051, Georgia.</p>
									<p>support@admin.com</p>
					</div>
				

		</div>	
			
	<div class="col-lg-1"></div>
	
			<div class="col-lg-2">
				<h2 class="title">For Candidates</h2>
				<ul>
					<li><a href="">Browse Jobs</a></li>					
					<li><a href="">Browse Candidates</a></li>
					<li><a href="">Candidate Dashboard</a></li>
					<li><a href="">Job Alerts</a></li>
					<li><a href="">My Bookmarks</a></li>
				</ul>
			</div>
			

			
			
			<div class="col-lg-2">
				<h2 class="title">For Employers</h2>
				
				<ul>
					<li><a href="">All Employers</a></li>
					<li><a href="">Employer Dashboard</a></li>
					<li><a href="">Submit Job</a></li>
					<li><a href="">Job Packages</a></li>
					<li><a href="">Post New Job</a></li>
				</ul>
				
			</div>
			


			<div class="col-lg-2">
				<h2 class="title">About Us</h2>
				<ul>
					<li><a href="">Contact Us</a></li>
					<li><a href="">About Us</a></li>
					<li><a href="">Terms</a></li>
					<li><a href="">Packages</a></li>
					<li><a href="">FAQ</a></li>
				</ul>
			</div>
			
			
	
			
			
			<div class="col-lg-2">
				<h2 class="title">Helpful Resources</h2>
				<ul>
					<li><a href="">Site Map</a></li>
					<li><a href="">Terms of Use</a></li>
					<li><a href="">Privacy Center</a></li>
					<li><a href="">Security Center</a></li>
					<li><a href="">Accessibility Center	</a></li>
				</ul>
			</div>
				

	
			
			
		</div>
	</div>


</div>	
	
	
	
	
	
	
	
	
	
 	<script>
		function relq(loc) {
				console.log(`yeah`)
				window.location = loc;
		}
		

		
	</script>
		

	
	<style>
	
	.user-area h3 {
		font-size:20px !important;
	    padding: 16px 30px !important;
	}
	
	.forms select {
		    width: 90%;
			height: 50px;
			border: 1px solid #eceeef;
			border-radius: 2px;
			background-color: #ffffff;
			padding: 6px 13px;
			margin: 0px;
			font-size: 16px;
			color: #777777;
	}
	
	</style>
	
	
	
	

	
	
	
	
</body>
</html>
