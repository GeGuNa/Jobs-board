<?php
	include("../inc/inc.php");
	include("../inc/db.php");
?>



<?php  include("../inc/header.php"); ?>



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


$Data = $pdo->query("select * from hr_job where jid = ?",[$uid])->fetch();

if (empty($Data) || !isset($Data)) {
	redirection("/");
}


$DataCompany = $pdo->query("select * from hr_user where uid = ?",[$Data['company_id']])->fetch();

$DataCompany2 = $pdo->query("select * from hr_job_cats where cid = ?",[$Data['category_id']])->fetch();








if (isset($user) && $user['user_type']=='candidate') { 
	
	if (isset($_GET['save_job'])) {
		
		if (!if_integer($_GET['save_job'])) {
			redirection("/");
		}


		if (!is_numeric($_GET['save_job'])) {
			redirection("/");
		}
		
		
		$job = (int)$_GET['save_job'];
		
		
		$DataQq = $pdo->query("select * from hr_saved_jobs where job_id = ? and user_id = ?",[$job, $user['uid']])->rowCount();

		if ($DataQq == 0) {
			$pdo->query("insert into hr_saved_jobs (job_id,user_id,when_saved) values(?,?,?)",[$job, $user['uid'],$time]);
		} else {
			$pdo->query("delete from hr_saved_jobs where job_id = ? and user_id = ?",[$job, $user['uid']]);
		} 
	
	redirection("?id=$Data[jid]");
	
	
	//	
		
	}
	
	
	
}


?>

	



<style>

.main_di1 {
    display: flex;
    justify-content: space-between;
    width: 100%;
    background: #f2f2f2 !important;
    border: 1px solid #eaeaea;
    border-radius: 10px;
    margin-bottom: 20px !important;
}
</style>


	
	

<div class="pheadr1">
	
<div class="llkqk_22">
		<h2> Job Details </h2> </h2>
</div>

</div>	
		
	
	
	
	
	


<div class="bw100">






<div class="container">
	
<div class="row justify-content-center mrh4eqz_31z">
	
	
	
	<div class="col-lg-8">

<div class="col-12">
	
				<div class="job_1">
					<div class="row align-items-center">
					
					
					
		<div class="col-lg-12">

		<div class="sidebarw" style="margin-top:0;margin-bottom:20px;">
			<div class="flexing">
				
				<div>
					<?php if (text_size($DataCompany['photo_addr'])>5): ?>
						 <img class="pimg" src="/employers/images/<?=$DataCompany['photo_addr'];?>" alt="" >
						 <?php else: ?>
							<img class="pimg" src="/images/38e5d4bedd70b4111cef3927e32d8866.jpg" alt="">
					<?php endif;?>
				</div>
				
				<div>
					<div class="s1">
						<h6><?=safechar($DataCompany['compname']); ?></h6>
						<a href="/employers/details.php?id=<?=$DataCompany['uid']; ?>">Company page</a>
					</div>
				</div>
				
				
			</div>
			
			
			
			
		</div>





</div>
					
					
					
					
						
			
											
											
						<div class="col-lg-12">
												<div class="hot-jobs-content">
													
													<h4 style="padding-bottom: 5px;"> <?=safechar($Data['title']);?> </h4>
										
													
													<p class="P_flex_1zrr2">
													
											<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M128,66a38,38,0,1,0,38,38A38,38,0,0,0,128,66Zm0,64a26,26,0,1,1,26-26A26,26,0,0,1,128,130Zm0-112a86.1,86.1,0,0,0-86,86c0,30.91,14.34,63.74,41.47,94.94a252.32,252.32,0,0,0,41.09,38,6,6,0,0,0,6.88,0,252.32,252.32,0,0,0,41.09-38c27.13-31.2,41.47-64,41.47-94.94A86.1,86.1,0,0,0,128,18Zm0,206.51C113,212.93,54,163.62,54,104a74,74,0,0,1,148,0C202,163.62,143,212.93,128,224.51Z"></path></svg>	<?=safechar($Data['jcountry']); ?> 
                                       
                                          <span><?=safechar($Data['jcity']); ?></span>
													</p>
													
													<p class="P_flex_1zrr2">
                                          
														<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M5 2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2h3.5A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5H14a.5.5 0 0 1-1 0H3a.5.5 0 0 1-1 0h-.5A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2zm1 0h4a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1M1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5H3V3zM15 12.5v-9a.5.5 0 0 0-.5-.5H13v10h1.5a.5.5 0 0 0 .5-.5m-3 .5V3H4v10z"></path></svg>	
                                          
                                            <span><?=$jjj_type[safechar($Data['job_type'])]; ?>   </span>
													
													</p>
													
													
												<p class="P_flex_1zrr2">
                                             
                                          <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0z"></path><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"></path><path d="M12.5 7H11v6l5.25 3.15.75-1.23-4.5-2.67z"></path></svg>   
                                          
                                          <span><?=whenTm($Data['unixtime']);?></span>
                                             
                                          
                                      </p>
													
												</div>
						</div>
						
			
			
			
			
<div class="row R_gap">


<? if (isset($user) && $user['user_type']=="candidate"):?>
<div class="col-lg-6 col-md-6 col-sm-12">

	
					<div class="">
						<a href="apply.php?job_id=<?=$Data['jid'];?>&company_id=<?=$DataCompany['uid'];?>" style="width:100%;display:block;" class="default-btn">Send resume</a>
					</div>	


</div>

<?php endif; ?>

				
			<?php if (isset($user) && $user['user_type']=='candidate') { 
			
			$ifalreadyS = $pdo->query("select * from hr_saved_jobs where user_id = ? and job_id = ?",[$user['uid'],$Data['jid']])->rowCount();
			
									
									if ($ifalreadyS == 0) {
										$ifa_ll1 = '<i class="fa-solid fa-heart"></i> Favourite';
									} else {
										$ifa_ll1 = '<i class="fa-solid fa-heart-circle-minus"></i> Remove';
									}
									
			
				?>
												<div class="col-lg-6 col-md-6 col-sm-12">


											<div class="col-lg-12">
												
												<a  style="width:100%;" href="?id=<?=$Data['jid'];?>&save_job=<?=$Data['jid'];?>" class="default-btn">
													<?=$ifa_ll1;?>
												</a>
												
											</div>	
                        </div>
               <?php } ?>	



		
						





</div>			
			
					
				
					
					
						
				
				
                  
                  
                  
                  
                  
                  
                  
					</div>
					

					
					
					
					
					
					
					
					
				</div>
				
				
				
				
				
			</div>			
			
			
			
	

	
	
	
	
			
			
			
<div class="sidebarwJbs1">

	<div class="row">
		

		<div class="col-lg-12 HTitles">
         <h5 class="m-0">Job Details</h5>
      </div>
		

	
										<div class="col-lg-6">
										<b>Where</b>
										<span>: <?=safechar($Data['jcity']); ?></span>
									
							</div>
									
										<div class="col-lg-6">
										<b>Job type</b>
										<span>: <?=$jjj_type[safechar($Data['job_type'])]; ?> </span>
									
		</div>
																		
										<div class="col-lg-6">
										<b>Experience</b>
										<span>: <?=$jjj_experience[safechar($Data['experience'])]; ?></span>
									
		</div>
									
									<div class="col-lg-6">
										<b>Category</b>
										<span>: 	<?=safechar($DataCompany2['name']);?></span>
									
		</div>
																			
										<div class="col-lg-6">
										<b>Gender</b>
										<span>: <?=$jjj_gender[safechar($Data['gendert'])]; ?></span>
							
							
							
									
		</div>
									
									<div class="col-lg-6">
										<b>Languages</b>
										<span>: <?=safechar($Data['languages']); ?></span>
									
		</div>
																		
									
									
									<div class="col-lg-6">
										<b>Wage</b>
										<span>: <?=safechar($Data['min_price']);?> - <?=safechar($Data['max_price']);?></span>
									
		</div>
									
										<div class="col-lg-6">
										<b>Driver license</b>
										<span>: არა</span>
										
		</div>

									
									<div class="col-lg-6">
									<b>	Email</b>
										<span>: <a href="mailto:<?=safechar($Data['email']);?>"><?=safechar($Data['email']);?></a></span>
									
		</div>
									
										<div class="col-lg-6">
										<b>Phone</b>
										<span>: <a href="tel:<?=safechar($Data['phnnumber']); ?>"><?=safechar($Data['phnnumber']); ?></a></span>
										
										</div>
								
	
										<div class="col-lg-6">
										<b>Posted</b>
													<span>: <?=whenTm($Data['unixtime']);?></span>
									
										</div>	
	
									
									<div class="col-lg-6">
										<b>Active</b>
													<span>: <?=date(" d M Y", $Data['unixtime']+3600*24*30);?></span>
									
										</div>										
									
									
				
		
		
	
		
		
		

		
	</div>

</div>			
			
			
			
			
			
		
<div class="wdg1z">
	

	<p class="breaking"><?=safechar($Data['description']); ?></p>
	
	<br/>
	
	
					<?php if (text_size($Data['responsibilities'])>2): ?>
					
					
					
					
						<h3>Main responsibilities</h3>


				<?php
				
						$resp_1 = explode(",", $Data['responsibilities']);

				?>

							<ul class="responsibilities">
								
								<?php foreach($resp_1 as $val): ?>	
										<li> <?=safechar($val);?> </li>
								<?php endforeach; ?>
								
							</ul>
					
					<?php endif;?>	



							
			

					<?php if (text_size($Data['detailed_qualifications'])>2): ?>			
						<h5>Qualifications</h5>

					
					
						<?php $resp_13 = explode(",", $Data['detailed_qualifications']);?>

							<ul class="responsibilities">
								
							<?php foreach($resp_13 as $val): ?>	
									<li> <?=safechar($val);?> </li>
							<?php endforeach; ?>	
							
							</ul>
					
					<?php endif; ?>		
					
					
	



				<?php if (text_size($Data['we_offer'])>2): ?>	
							
					<h5>We offer</h5>


						
						<?php $resp_134 = explode(",", $Data['we_offer']);?>

							<ul class="responsibilities">
								
							<?php foreach($resp_134 as $val): ?>	
									<li> <?=safechar($val);?> </li>
							<?php endforeach; ?>	
							
							</ul>
					
					<?php endif; ?>		
						


			<?php if (text_size($Data['benefits'])>2): ?>	
	
						<h5>Benefits</h5>	

						
						<?php $resp_134 = explode(",", $Data['benefits']);?>

							<ul class="responsibilities">
								
							<?php foreach($resp_134 as $val): ?>	
								<li> <?=safechar($val);?> </li>
							<?php endforeach; ?>	
							
							</ul>
					
					<?php endif; ?>			
	
	
							
	
	
<?php if (text_size($Data['video_url'])>2): ?>		
								
	<div id="job-job-video">
    	<h5 class="title">Video</h5>
    	<div class="content-bottom embed-responsive embed-responsive-16by9">
	    	
	    	<p>
				<iframe width="1280" height="720" src="<?=safechar($Data['video_url']); ?>" frameborder="0" allowfullscreen=""></iframe>
	    	</p>
	    	
        </div>
    </div>						
							
<?php endif; ?>							
							
							
					
							
							
							
							


</div>		
		
		
		
		
		
		
		
		
		
		
		
		
			
			
								
	</div>	

<div class="col-lg-4">
	
	
	
		<div class="col-lg-12">
	
	
			<div class="kk_br_wh1">
						
				<a href="#">
					<button><span class="material-symbols-outlined">approval_delegation</span> Apply via official website</button>
				</a>
			
			</div>
			
	
		</div>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="col-lg-12">
	
	
	<div class="widg_1">
		
		<div class="N_widget">Share</div>
	
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
	
	

	


	
	
	


<div class="col-lg-12">

		<div class="sidebarw">
			<div class="flexing">
				
				<div>
					<?php if (text_size($DataCompany['photo_addr'])>5): ?>
						 <img class="pimg" src="/employers/images/<?=$DataCompany['photo_addr'];?>" alt="" >
						 <?php else: ?>
							<img class="pimg" src="/images/38e5d4bedd70b4111cef3927e32d8866.jpg" alt="">
					<?php endif;?>	
				</div>
				
				<div>
					<div class="s1">
						<h6><?=safechar($DataCompany['compname']); ?></h6>
						<a href="/employers/details.php?id=<?=$DataCompany['uid']; ?>">View page</a>
					</div>
				</div>
				
				
			</div>
			
			
			
			
		</div>

				
				<div class="divi_3z1">
					<a href="/employers/details.php?id=<?=$DataCompany['uid']; ?>">View posts</a>
				</div>



</div>	

	
	
	
	
</div>	
	
	</div>
	</div>	
	
	
	

<div class="container">

<div class="row mm_topbt1">



<div class="col-lg-12">
	
	<div>
		
		<div class="ttlq100_text">
			<h4>Random jobs</h4>	
		</div>
		
		
	<div class="mm_tt_zz1">
		
		
		
				
					
	
<?php


$KdataoFVips = $pdo->query("select * from hr_job  where ordinary_time > ?  order by random() desc limit 3", [$Time]);

while($fetch_Vips = $KdataoFVips->fetch()):


$CompID = $pdo->query("select * from hr_user where uid = ?", [$fetch_Vips['company_id']])->fetch();


?>		
	
		<div class="flj_ob__2z flxmrbo1 mdp2 roundedq1zflj bz2ordezr borderqzu712bnq">
		
	
			<div class="jj_bjo1">
			
				
					<div> 
					
								<div class="jj_bjo1z2gaping">
										<div>
										
										
					    <?php if (text_size($CompID['photo_addr'])>5): ?>
							<img class="pimg" src="/employers/images/<?=$CompID['photo_addr'];?>" alt="" >
						 <?php else: ?>
							<img class="pimg" src="/images/38e5d4bedd70b4111cef3927e32d8866.jpg" alt="">
						<?php endif;?>
										
										
										
										
										</div>
										<div style="cursor:pointer;" onclick="window.location='/jobs/details.php?id=<?=$fetch_Vips['jid'];?>'">
											<h2 ><?=safechar($fetch_Vips['title']);?></h2>
											<p><?=safechar($fetch_Vips['jcity']);?></p>
										</div>
								</div>
					
					</div>
				
				
				<div class="mb_hiding"> 
						<div class="t1end1"><h2 class="ph2"><?=safechar($fetch_Vips['min_price']);?> - <?=safechar($fetch_Vips['max_price']);?> Gel</h2></div>
						<div><p class="pjtext"><?=whenTm($fetch_Vips['unixtime']);?></p></div>
				</div>
				
				
				
				
				
			</div>
									
							
			<div>
				
			</div>					
						
			
		<!-- -->
			
			<div class="jj_b_apply">
			
				<div>
					<div class="kk_gapingfordesc1">
										<div class="TpqQrrQ13zy1"><?=$jjj_type[safechar($fetch_Vips['job_type'])]; ?> </div>
					</div>
				</div>
				
				<div class="for_mp_pho1s">
						<div><h2 style="text-align:center;" class="ph2"><?=safechar($fetch_Vips['min_price']);?> - <?=safechar($fetch_Vips['max_price']);?> Gel</h2></div>
						<div><p class="pjtext"><?=whenTm($fetch_Vips['unixtime']);?></p></div>
				</div>
				
				<div>	
					
					
                  <a href="details.php?id=<?=($fetch_Vips['jid']);?>" class="default-btn">View</a>
             
					
				</div>
				
			</div>
		
		
		<!-- -->	
						
						
						
						
		</div>
					
				
					
					
	<?php endwhile;?>
				
				
						
						
						
				
		
			
	</div>	
		
	
	</div>
	
	
</div>












</div>	
	



</div>







	
	

	
	

<?php  include("../inc/footer.php"); ?>

	
