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



<?php



if (isset($_POST['Posting'])) {

$packge_type = 0;
$stanadr_time = $time + (60*24*31);


if ($user['package_type']=='starter') {
   $package_time_vip = 0;
   $packge_type = 1;
}

if ($user['package_type']=='premium') {
  $package_time_vip = $time + (60*24*21);
  $packge_type = 1; 
}



if ($user['package_type']=='premium_plus'){ 
   $package_time_vip = $time + (60*24*31);
   $packge_type = 1;
}

$title = my_esc($_POST['title']);
$desc = my_esc($_POST['desc']);

//$required1 = my_esc($_POST['required']); //required skills

$sector = my_esc($_POST['sector']); // job category
$jobtype1 = my_esc($_POST['job_Typq1']); //job type =  freelance/remote etc


$salary_type = my_esc($_POST['salary_type']);  //salary type   monthly /daily etc etc
$min_price = my_esc($_POST['min_price']);
$max_price = my_esc($_POST['max_price']);


$country = my_esc($_POST['country']);
$state = my_esc($_POST['state']);
$city = my_esc($_POST['city']);

///////////
$E_Mail2 = my_esc($_POST['e_mail2']);
$E_phone_nu = my_esc($_POST['E_phone2']);
///////////////


$experience = my_esc($_POST['experience']);
$genderofjob = my_esc($_POST['gender']);



$qualification_1 = my_esc($_POST['qualification']);

$responsibilities = my_esc($_POST['responsibilities']);

$benefits = my_esc($_POST['benefits']);





if (!in_array($experience, ['1','2','3','4','5']))Error('უუპს');
if (!in_array($genderofjob, ['1','2','3']))Error('უუპს');
if (!in_array($qualification_1, ['1','2','3','4','5','6']))Error('უუპს');

if ($packge_type == 0)Error('You cannot post a post cause you never bought a package');



if (!in_array($salary_type, ['1','2','3','4']))Error('უუპს');
if (!in_array($jobtype1, ['1','2','3','4','5']))Error('უუპს');

	

if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM hr_job_cats WHERE cid = ?", [$sector]) == 0) {
	Error('ხულიგნობას აქვს ადგილი !!!');
}	



$E_Mail2 = my_esc($_POST['e_mail2']);
$E_phone_nu = my_esc($_POST['E_phone2']);
$E_languages = my_esc($_POST['E_languages']);
$e_directurl = my_esc($_POST['vacancy_direct_url']);

$we_offer = my_esc($_POST['we_offer']);

$detailed_qualifications = my_esc($_POST['detailed_qualifications']);


$video_url = my_esc($_POST['video_url']);

$jtype = "ordinary";



if (!in_array($jtype, ['ordinary','vip'])) {
	Error('ხულიგნობას აქვს ადგილი !!!');
}




/*
hr=# alter table hr_job add column  email text default '';
hr=# alter table hr_job add column  languages  text default '';
hr=# alter table hr_job add column  phnnumber  text default '';
* hr=# alter table hr_job add column  vacancy_direct_url  text default '';
hr=# select uid,pemail,password,user_type,sector from hr_user;
*/



$pdo->query("insert into hr_job (video_url,benefits, detailed_qualifications, we_offer, responsibilities, vacancy_direct_url,email, languages, phnnumber, title, description, category_id, job_type, salary_type, min_price, max_price, jcity, jcountry, jstate, experience, gendert, qualifications, company_id, unixtime, jtype, vip_time, ordinary_time) 
values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) 
",
[$video_url, $benefits, $detailed_qualifications, $we_offer, $responsibilities, $e_directurl, $E_Mail2, $E_languages, $E_phone_nu, $title, $desc, $sector, $jobtype1, $salary_type, $min_price, $max_price, $city, $country, $state, $experience, $genderofjob, $qualification_1, $user['uid'], $time, $jtype,
$package_time_vip, $stanadr_time

]);


header("Location: ?");
exit; 


	
	
}


?>




<?php  include("../../inc/header.php"); ?>




<style>
.forms input, select, textarea {
    width: 100% !important;
    max-width: 100% !important;
}
</style>
	

<div class="pheadr1">
	
<div class="llkqk_22">
		<h2 style="font-size: 30px;"> Post New Job </h2>
</div>

</div>	
	


<div class="container">

		<div class="dashboard">

			<div class="w25">
				
				
				<?php include("left.php");?>
				
										
			</div>
			
			
			
			<div class="w75">
				
				
			<form action="?" method="post" style="padding:0;">
						
					<div class="ddwidget">
						
						<div class="descq1">
							<h3>Post a New Job</h3>
						</div>
						
			
				
					<div class="forms">
				
						
					
					<!-- -->	
						<div class="div_50 mrbottom20">
							
			
							<label>Title </label>                        
							<input type="text" name="title" value="" required="" minlength="2">
				  
							
						</div>
						
		
						<div class="div_100 mrbottom20">
							

							<label>Description</label>                        
							<textarea name="desc" id="txttinycme" required></textarea>

							
						</div>		
					
					
					
					<div class="div_100 mrbottom20">
							

							<label>Duties</label>     
							
							<span style="padding-bottom:5px;display: block;">(please (,) comma)</span>   
							                
							<textarea name="responsibilities" id="txttinycme"></textarea>

							
						</div>		
						
					
					
					
					<div class="div_100 mrbottom20">
							

							<label>We offer</label>     
							
							<span style="padding-bottom:5px;display: block;">(please (,) comma)</span>   
							                
							<textarea name="we_offer" id="txttinycme"></textarea>

							
						</div>		
											
			
			
						
					<div class="div_100 mrbottom20">
							

							<label>Detailed qualifications</label>     
							
							<span style="padding-bottom:5px;display: block;">(please (,) comma)</span>   
							                
							<textarea name="detailed_qualifications" id="txttinycme"></textarea>

							
						</div>		
						
			
					<div class="div_100 mrbottom20">
							

							<label>Benefits</label>     
							
							<span style="padding-bottom:5px;display: block;">((please (,) comma)</span>   
							                
							<input type="text" name="benefits" id="txttinycme"></textarea>

							
						</div>		
								
						
						
						
	<!-- -->
	
	
		<div class="row" style="width:100%;">
               <div class="col-lg-6 mrbottom20">
							
			
							<label>Email </label>                        
							<input type="email" name="e_mail2" value="" required="">
				  
							
						</div>
						
						
						
						<div class="col-lg-6 mrbottom20">
							
			
							<label>Phone number (not necessary) </label>                        
							<input type="number" name="E_phone2" value="">
				  
							
						</div>
	
	
				</div>
	
	<!-- -->					
						
						
						
						
						
						
						
						
						
						<div class="div_100 mrbottom20">
							
			
					
							<span>( Another url for this job (not necessary) )  </span>               
							<input type="text" name="vacancy_direct_url" value="">
				  
							
						</div>		
						
					
					
					
						<div class="div_100 mrbottom20">
							
			
							<label>Languages</label>                        
							<input type="text" name="E_languages" value="">
				  
							
						</div>		
						
						
						
						
						
				<div class="div_100 mrbottom20">
					<div class="row">
						

				
						<div class="col-lg-6">
							<label>Category  </label>
					
								  <select name="sector" required>
								  <option value="" disabled selected>Activity</option>
								<?php 
								$qweqwe = $pdo->query("select * from hr_job_cats");
									while ($qweqwe2 = $qweqwe->fetch()): ?>
										<option value="<?=$qweqwe2['cid'];?>"><?=$qweqwe2['name'];?></option>
								<? endwhile; ?>
							  </select>
					
					
					
					
					
						</div>
						
						
						<div class="col-lg-6">
							<label>Job type </label>
							<select name="job_Typq1" required>
								<option value="1">Full time</option>
								<option value="2">Part-time</option>
								<option value="3">Hybrid</option>
								<option value="4">Remote</option>
								<option value="5">Another</option>
							</select>
						</div>				
				
						
					</div>
				</div>	
				
				
			
						<div class="div_100 mrbottom20">
							
							<div class="row">
								<div class="col-lg-6">
										<label>Salary</label>                        
										<select name="salary_type" required>
											<option value="2" selected>Monthly</option>
											<option value="3">Hourly</option>
											<option value="1">Once in a week</option>
											<option value="4">Negotiable</option>
										</select>
								</div>
					
					
								<div class="col-lg-3">
										<label>Min </label>                        
										<input type="number" placeholder="Min" name="min_price" value="" required="">
								</div>					
					
					
							<div class="col-lg-3">
										<label>Max</label>                        
										<input type="number" placeholder="Max" name="max_price" value="" required="">
								</div>
							
							</div>
							
						</div>
				
				
				<!-- -->
				
				
				
				
				
				
					
					</div>
	
	
		
						
					</div>
					
					
	
	
	
	
	<div class="ddwidget">
					<div class="descq1">
							<h3>Location</h3>
					</div>
	
	
	
			<div class="forms">
									
				
				<div class="ffll_xnew clm-gp4">
					
					
					<div class="dividing48">
						<label>Country </label>
						<input type="text" name="country" required/>
					</div>
				
				
				
					<div class="dividing48">
						<label>State / Region </label>
						<input type="text" name="state" required/>
					</div>	
				
			
			
					
				<div class="dividing100">
						<label>  City  </label>
						<input type="text" name="city" required/>
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
					
			
         	<div class="row wno_wrap g-0">
               
               		
			<div class="col-lg-6">
         
         <label>Experience </label>
										<select name="experience" required>
											<option value="1">არ აქვს მნიშვნელობა</option>
											<option value="2">1 წელზე ნაკლები</option>
											<option value="3">2 წელი</option>
											<option value="4">3 წელი</option>
											<option value="5">სხვა</option>
										</select>
         
         
         </div>
				
			<div class="col-lg-6">
         
         	<label>Gender  </label>
										<select name="gender" required>
											<option value="1">კაცი</option>
											<option value="2">ქალი</option>
											<option value="3">არ აქვს მნიშვნელობა</option>
										</select>
         
         </div>	
   
   
   	    </div>			
				
			
			
				
				
						
					
				
						
					<div class="dividing100">
									<label>Qualification </label>
										<select name="qualification" required style="width:100%;">
											<option value="1">Certificate</option>
											<option value="2">Diploma</option>
											<option value="3">Associate</option>
											<option value="4">Bachelors degree</option>
											<option value="5">Masters degree</option>
											<option value="6">Other</option>
										</select>
					</div>	
							
				
								
					<div class="dividing100">
									<label>Video url (iframe link) </label>
										<input type="text" name="video_url" value=""/>
					</div>	
							
				
				
				
				
				
				
				
				
				</div>
				
				
			</div>
	
</div>	
	
	

	
				
	
		
		
		
	<div style="margin-bottom:15px;">
		<input type="submit" class="jobsearch-employer-profile-submit" name="Posting" value="Add">
	</div>	
		
	</form>	
					
			
			</div>





		</div>

</div>
	
	
	
	
	
	
	
	
	
	
	

	
	
	
	
	
	


	
	<style>
	
	.user-area h3 {
		font-size:20px !important;
	    padding: 16px 30px !important;
	}
	
	.forms select {
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
	
	
	
	

	
	
<?php  include("../../inc/footer.php"); ?>
