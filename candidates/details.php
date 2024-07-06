<?php
	include("../inc/inc.php");
	include("../inc/db.php");
?>	

<?php


if (!isset($_GET['id'])){
	redirection("/");
}


if (!if_integer($_GET['id'])) {
	redirection("/");
}


if (!is_numeric($_GET['id'])) {
	redirection("/");
}


$uid = (int)$_GET['id'];


$Data = $pdo->query("select * from hr_user where uid = ? and user_type = ?",[$uid,'candidate'])->fetch();

if (empty($Data) || !isset($Data)) {
	redirection("/");
}


?>



<?php




if (isset($user) && $user['user_type']=='company') { 
	
	if (isset($_GET['save_candidate'])) {
		
		if (!if_integer($_GET['save_candidate'])) {
			redirection("/");
		}


		if (!is_numeric($_GET['save_candidate'])) {
			redirection("/");
		}
		
		
		$us_id = (int)$_GET['save_candidate'];
		
		
		$DataQq = $pdo->query("select * from hr_saved_candidates where company_id = ? and user_id = ?",[$user['uid'],$us_id])->rowCount();

	if ($DataQq == 0) {
		$pdo->query("insert into hr_saved_candidates (company_id,user_id,when_saved) values(?,?,?)",[$user['uid'], $us_id, $time]);
	} else {
		$pdo->query("delete from hr_saved_candidates where company_id = ? and user_id = ?",[$user['uid'], $us_id]);
	} 
	
	redirection("?id=$Data[uid]");
	
	
	//	
		
	}
	
	
	
}

?>	










<?php  include("../inc/header.php"); ?>

	







	
	

<div class="pheadr1">
	
<div class="llkqk_22">
		<h2 style="font-size: 30px;"> Candidates Details </h2>
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
												<a href="#" class="hot-jobs-img">
														
						<?php if (text_size($Data['photo_addr'])>5): ?>
							<img class="pimg" src="/candidates/images/<?=$Data['photo_addr'];?>" alt="" >
						 <?php else: ?>
								<img class="pimg" src="/images/38e5d4bedd70b4111cef3927e32d8866.jpg" alt="">
						<?php endif;?>
													
													
													
													
												</a>
											</div>
											
												
											<div class="col-lg-5">
												
												<div class="hot-jobs-content">
													<h3><?=safechar($Data['name']);?> <?=safechar($Data['surn']);?> </h3>
													<span class="sub-title"><?=safechar($Data['capability']);?> </span>
													<ul>
														<li><span>Location:</span> <?=safechar($Data['city']);?> </li>
													</ul>
												</div>
												
				
												
												
												
												
												
												
											</div>
											
								
						
																
											<?php if (isset($user) && $user['user_type']=='company') { 
			
			$ifalreadyS = $pdo->query("select * from hr_saved_candidates where company_id = ? and user_id = ?",[$user['uid'],$Data['uid']])->rowCount();

			
			if ($ifalreadyS == 0) {
				$ifa_ll1 = '<i class="fa-solid fa-heart"></i> შენახვა';
			} else {
				$ifa_ll1 = '<i class="fa-solid fa-heart-circle-minus"></i> წაშლა';
			}
			
			
				?>
												
												
												<a style="    margin-top: 15px;" href="?save_candidate=<?=$Data['uid'];?>&id=<?=$Data['uid'];?>" class="default-btn mq_top15">
													<?=$ifa_ll1;?> 
												</a>
			<?php } ?>	
						
						
						
						
					</div>
					

					
					
					
					
					
					
					
					
				</div>
				
				
				
				
				
			</div>			
			
			
			
		
<div class="wdg1z">
	
	
<?php if (text_size($Data['aboutcompany'])>0):?> 	
	<h3>ჩემს შესახებ</h3>

	<p class="overflowing">
		<?=safechar($Data['aboutcompany']);?> 
	</p>
	
<?php endif ;?>	
	
	
<?php

$qp_ede1z_f1q = $pdo->query("select * from hr_education where user_id = ?",[$Data['uid']])->rowCount();

?>	
	
	<?php if ($qp_ede1z_f1q>0):?> 	
	
<h3>განათლება</h3>
<!--
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
							
	-->						
							<?php
							$qp_ed = $pdo->query("select * from hr_education where user_id = ?",[$Data['uid']]);
							
							while ($qp_ed1 = $qp_ed->fetch()):
							?>
							
								<ul class="li1">
									<li class="arts"><?=safechar($qp_ed1['e_academy']);?></li>
									<li class="university"><?=safechar($qp_ed1['e_title']);?> (<?=safechar($qp_ed1['e_attended_from']);?>-<?=safechar($qp_ed1['e_attended_to']);?>)</li>
									<li class="summary"><?=safechar($qp_ed1['e_desc']);?></li>
								</ul>
							
							<?php endwhile; ?>
							
						<?php endif ;?>								
							
							
							
	<?php

$qp_ede1z_f1q21 = $pdo->query("select * from hr_userworkstory where user_id = ?",[$Data['uid']])->rowCount();

?>	
	
	<?php if ($qp_ede1z_f1q21>0):?> 							
							
							
							
<h3>სამუშაო გამოცდილება</h3>


<!--
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
							
	-->						
							<?php
							$qp_ed = $pdo->query("select * from hr_userworkstory where user_id = ?",[$Data['uid']]);
							
							while ($qp_ed1 = $qp_ed->fetch()):
							?>
							
								<ul class="li1">
									<li class="arts"><?=safechar($qp_ed1['e_title']);?></li>
									<li class="university"><?=safechar($qp_ed1['e_companyname']);?> (<?=safechar($qp_ed1['e_timefrom']);?>-<?=safechar($qp_ed1['e_timeto']);?>)</li>
									<li class="summary"><?=safechar($qp_ed1['e_desc']);?></li>
								</ul>
							
							<?php endwhile; ?>
							
											
				<?php endif ;?>						
							
							
							
		
		
	<?php

$qp_ede1z_1f1q121 = $pdo->query("select * from hr_user_skills where user_id = ?",[$Data['uid']])->rowCount();

?>	
	
	<?php if ($qp_ede1z_1f1q121>0):?> 							
							
				
							
							
							
<h4 class="mrh4">პერსონალური სკილები</h4>

<div class="all-skill-bar">
	
	<!--
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
							-->
							
							
							
						<?php
							$qp_ed = $pdo->query("select * from hr_user_skills where user_id = ?",[$Data['uid']]);
							
							while ($qp_ed1 = $qp_ed->fetch()):
							
							$qp_ed1['e_percentage'] = abs((int)$qp_ed1['e_percentage']);
							
								if ($qp_ed1['e_percentage']>100)
									$qp_ed1['e_percentage'] = 100;
								
							?>
							
						
			<div class="skill-bar" data-percentage="100%">
									<h4 class="progress-title-holder">
										<span class="progress-title"><?=safechar($qp_ed1['e_skillname']);?></span>
										<span class="progress-number-wrapper">
											<span class="progress-number-mark" style="left: <?=safechar((int)$qp_ed1['e_percentage']);?>%;">
												<span class="percent"><?=safechar((int)$qp_ed1['e_percentage']);?>%</span>
												<span class="down-arrow"></span>
											</span>
										</span>
									</h4>
		
									<div class="progress-content-outter">
										<div class="progress-content" style="width: <?=safechar((int)$qp_ed1['e_percentage']);?>%;"></div>
									</div>
								</div>					
						
						
						
						
						
							
							<?php endwhile; ?>						






</div>																			
													
				<?php endif ;?>							




</div>		
		
		
		
		
		
		
		
		
		
		
		
		
			
			
								
	</div>	

<div class="col-lg-4">
	
	
	<div class="col-lg-12">
	
	
	<div class="widg_1">
		
	<div class="N_widget">Our pages</div>
	
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
		

	<div class="N_widget">Contact Information</div>
	<div class="rest2">
		
				<ul class="overview">
	
									<li>
										Location
										<span>: <?=safechar($Data['city']);?> </span>
									</li>
									<li>
										Email
										<a href="mailto:info@admin.com"><span>: <?=safechar($Data['pemail']);?> </span></a>
									</li>
									
									<!--
									<li>
										Phone
										<a href="tel:+1-(514)-7939-357"><span>: +995 757 939-357</span></a>
									</li>
									-->
									
								<?php if (text_size($Data['website'])>2){?>	
									<li>
										Website
										<a href="https://<?=safechar($Data['website']);?>"><span>: <?=safechar($Data['website']);?></span></a>
									</li>
								<?php } ?>	
									
								</ul>
		
	</div>
	
	</div>
	
	</div>	
	
	
	
	
<div class="col-lg-12 mrtt_25">
	
	
	<div class="widg_1">
		

		<div class="N_widget">Personal details</div>
	<div class="rest2">
		
				<ul class="overview">
	
					<li>Name <span>: <?=safechar($Data['name']);?></span></li>
									
					<li>Surname <span>: <?=safechar($Data['surn']);?></span></li>
						
				<!--					
					<li> Birth date <span>: 10/10/2001</span></li>
				-->	
					
					<li> Languages <span>: <?=safechar($Data['gender']);?></span></li>
					<li> Gender <span>: Male</span></li>
	
	

								</ul>
		
	</div>
	
	</div>
	
	</div>
	
	
	
	
	
	
	
</div>	
	
	</div>
	</div>	
	
	
	
	
	
	
	
	

<?php  include("../inc/footer.php"); ?>

	
