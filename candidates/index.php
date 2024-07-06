
<?php
	include("../inc/inc.php");
	include("../inc/db.php");
?>	
	
	

<?php  include("../inc/header.php"); ?>

	

<?php


$kq_c1 = $pdo->query("select * from hr_user  where user_type = ? ", ['candidate'])->rowCount();



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
	
	redirection("?");
	
	
	//	
		
	}
	
	
	
}

?>	
	

<div class="pheadr1">
	
	<div class="llkqk_22">
			<h2 style="font-size: 30px;"> Candidates Listing </h2>
	</div>

</div>	
	


<div class="ppt100">






<div class="container">
	
<div class="row justify-content-center">
	
	
	
	<div class="col-lg-8">

	

	
	
	
	
	
<!-- -->	
<div class="job_List">

<div class="row">
	
	
	
		<?php 
		
		
		
$Q_Page = new Pagination();

$kq_c1 = $pdo->query("select * from hr_user where  user_type = 'candidate'")->rowCount();

$ttlq = $Q_Page->calculation($kq_c1, $params['page']);

$qweqwe = $pdo->query("select * from hr_user where  user_type = 'candidate' ORDER BY uid DESC LIMIT ? OFFSET ?", 
	[$params['page'], $ttlq]
);
		
	
		

		while ($dCandidates = $qweqwe->fetch()): 
		
		?>
									
									
									
			<div class="col-12">
				<div class="job_1">
					<div class="row align-items-center">
						
						<div class="col-lg-2">
												<a href="employers-details.html" class="hot-jobs-img">
												
												
							<?php if (text_size($dCandidates['photo_addr'])>5): ?>
							<img class="pimg" src="/candidates/images/<?=$dCandidates['photo_addr'];?>" alt="" >
						 <?php else: ?>
							<img class="pimg" src="/images/38e5d4bedd70b4111cef3927e32d8866.jpg" alt="" style="max-width: 132px;">
						<?php endif;?>						
												
												
												
												</a>
												
												
											</div>
											
											
						<div class="col-lg-6">
												<div class="hot-jobs-content">
													
													<h3><a href="details.php?id=<?php echo ($dCandidates['uid']);?>"><?php echo safechar($dCandidates['name']);?> <?php echo safechar($dCandidates['surn']);?></a></h3>
													
												<p class="featuresjoba"><?php echo safechar($dCandidates['capability']);?></p>
												
												
										
												
												
												
												<?php if (text_size($dCandidates['city'])>0): ?>
													<ul>
														
											
														
											<?php if (text_size($dCandidates['qualification'])>0): ?>
												
												<li>
													
													<span>განათლება:</span>
												
														<?php echo $jjj_qualification[abs((int)$dCandidates['qualification'])];?>
													
												</li>	
													
											<?php endif;?>	
													
													
														
														
														
														<li>
															
															<span>
															
															<span class="material-symbols-outlined">location_on</span>
															
															 </span><?php echo safechar($dCandidates['city']);?>
														</li>
													</ul>
												<?php endif; ?>
													
												</div>
											</div>
											
											
											<div class="col-lg-4">
												
													<?php if (isset($user) && $user['user_type']=='company') { 
			
			$ifalreadyS = $pdo->query("select * from hr_saved_candidates where company_id = ? and user_id = ?",[$user['uid'],$dCandidates['uid']])->rowCount();

			
			if ($ifalreadyS == 0) {
				$ifa_ll1 = '<i class="fa-solid fa-heart"></i>';
			} else {
				$ifa_ll1 = '<i class="fa-solid fa-heart-circle-minus"></i>';
			}
			
			
				?>
												
												
												<a href="?save_candidate=<?=$dCandidates['uid'];?>" class="default-btn mq_top15">
													<?=$ifa_ll1;?>
												</a>
			<?php } ?>			
												
												
												
												
												<a href="details.php?id=<?php echo ($dCandidates['uid']);?>" class="default-btn">View profile</a>
												
												
												
					
							
												
											</div>										
						
						
						
						
						
						
					</div>

					
					
					
					
					
					
					
				</div>
				
				
				
				
				
			</div>
	
		
			
			
								
								
								
								
		<? endwhile; ?>	
	
	
	
	
	

		
	
	
	
	
	
	

<div class="col-12">
<div class="pagination-area">

		<?
		$Q_Page->setPage("","");
		$Q_Page->setTotal($kq_c1);
		$Q_Page->setPerPage($params['page']);
		
		$Q_Page->rendering();	
		
		
		?>						


</div>
</div>	
	
	
	
	
	
	
	
</div>

</div>	
<!-- -->
	
	
	
	
		

	</div>		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="col-lg-4">
		
		
			<div class="col-lg-12">
					<div class="user-area">
						<h3>Search</h3>
					</div>
					
					
									<form class="search-form">
											<div class="form-group">
												<div class="search-box">
													<input class="form-control" name="search" placeholder="Search..." type="text">
												</div>
											</div>

											<button class="default-btn">
												Search
											</button>
										</form>
				
	</div>
		
		
		
			
			<div class="col-lg-12">
					<div class="user-area">
						<h3>Job Type</h3>
					</div>
					
					
									<form class="search-form">
										
											<div class="row srch1" id="">

												<div class="ilqz">
													<input type="radio" checked="checked" name="radio-1"> 
													<span>All</span>	
													<strong>(9415)</strong>												
												</div>
												
												
											<div class="ilqz">
													<input type="radio" name="radio-1"> 
													<span>Full-time</span>	
													<strong>(1412)</strong>												
												</div>
												
													<div class="ilqz">
													<input type="radio" name="radio-1"> 
													<span>Part-time</span>	
													<strong>(4415)</strong>												
												</div>
												
												
													<div class="ilqz">
													<input type="radio"  name="radio-1"> 
													<span>Temporarily</span>	
													<strong>(9415)</strong>												
												</div>
												
													<div class="ilqz">
													<input type="radio"  name="radio-1"> 
													<span>Contract</span>	
													<strong>(9415)</strong>												
												</div>
												
													<div class="ilqz">
													<input type="radio"  name="radio-1"> 
													<span>Internship</span>	
													<strong>(9415)</strong>												
												</div>
												
												
												
												
											
										
												

											</div>
										
									
									
										</form>
				
	</div>
		
		

<div class="col-lg-12">
					<div class="user-area">
						<h3>Salary</h3>
					</div>
					
					
									<form class="search-form">
										
											<div class="row srch1" id="">

												<div class="ilqz">
													<input type="radio" checked="checked" name="radio-1"> 
													<span>All</span>											
												</div>
												
												
											<div class="ilqz">
													<input type="radio" name="radio-1"> 
													<span>Montly</span>												
												</div>
												
													<div class="ilqz">
													<input type="radio" name="radio-1"> 
													<span>Weekly</span>												
												</div>
												
												
													<div class="ilqz">
													<input type="radio" name="radio-1"> 
													<span>Daily</span>											
												</div>
												
													<div class="ilqz">
													<input type="radio" name="radio-1"> 
													<span>Hourly</span>											
												</div>
												
													<div class="ilqz">
													<input type="radio" name="radio-1"> 
													<span>Yearly</span>												
												</div>
												
												
												
												
											
										
												

											</div>
										
									
									
										</form>
				
	</div>







<div class="col-lg-12">
					<div class="user-area">
						<h3>Posted when</h3>
					</div>
					
					
									<form class="search-form">
										
											<div class="row srch1" id="">

												<div class="ilqz">
													<input type="radio" checked="checked" name="radio-1"> 
													<span>All</span>											
												</div>
												
												
											<div class="ilqz">
													<input type="radio" name="radio-1"> 
													<span>Last Hour</span>												
												</div>
												
													<div class="ilqz">
													<input type="radio" name="radio-1"> 
													<span>Last 24 hours</span>												
												</div>
												
												
													<div class="ilqz">
													<input type="radio" name="radio-1"> 
													<span>Last 7 days</span>											
												</div>
												
													<div class="ilqz">
													<input type="radio" name="radio-1"> 
													<span>Last 14 days</span>											
												</div>
												
													<div class="ilqz">
													<input type="radio" name="radio-1"> 
													<span>Last 30 days</span>												
												</div>
												
												
												
												
											
										
												

											</div>
										
									
									
										</form>
				
	</div>








<div class="col-lg-12">
					<div class="user-area">
						<h3>Qualifications</h3>
					</div>
					
					
									<form class="search-form">
										
											<div class="row srch1" id="">

												<div class="ilqz">
													<input type="radio" checked="checked" name="radio-1"> 
													<span>Certificate</span>											
												</div>
												
												
											<div class="ilqz">
													<input type="radio" name="radio-1"> 
													<span>Diploma</span>												
												</div>
												
													<div class="ilqz">
													<input type="radio" name="radio-1"> 
													<span>Bachelor degree</span>												
												</div>
												
												
													<div class="ilqz">
													<input type="radio" name="radio-1"> 
													<span>Master's degree</span>											
												</div>
												
												<div class="ilqz">
													<input type="radio" name="radio-1"> 
													<span>Associate</span>											
												</div>
												
											
												
												
												
											
										
												

											</div>
										
									
									
										</form>
				
	</div>








<div class="col-lg-12">
					<div class="user-area">
						<h3>Experience</h3>
					</div>
					
					
									<form class="search-form">
										
											<div class="row srch1" id="">

												<div class="ilqz">
													<input type="radio" checked="checked" name="radio-1"> 
													<span>Fresh</span>											
												</div>
												
												
											<div class="ilqz">
													<input type="radio" name="radio-1"> 
													<span>1 Year</span>												
												</div>
												
													<div class="ilqz">
													<input type="radio" name="radio-1"> 
													<span>2 Year</span>												
												</div>
												
												
													<div class="ilqz">
													<input type="radio" name="radio-1"> 
													<span>3 Year</span>											
												</div>
												
												<div class="ilqz">
													<input type="radio" name="radio-1"> 
													<span>4 Year</span>											
												</div>
												
											
												
												
												
											
										
												

											</div>
										
									
									
										</form>
				
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
	

<?php  include("../inc/footer.php"); ?>
