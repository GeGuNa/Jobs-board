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


$Data = $pdo->query("select * from hr_user where uid = ? and user_type = ?",[$uid,'company'])->fetch();

if (empty($Data) || !isset($Data)) {
	redirection("/");
}



$hmanyjobs = $pdo->query("select * from hr_job where company_id = ?",[(int)$Data['uid']])->rowcount();




													

											
											
if (text_size($Data['sector'])>0) {

	$HrJqcatq = $pdo->query("select * from hr_job_cats where cid = ?",[(int)$Data['sector']])->fetch();

	$ifsector = 1;
	$nameof_s = $HrJqcatq['name'];
	
} else {
	
		$ifsector = 0;
		$nameof_s = '';
}

		
	





?>


<?php  include("../inc/header.php"); ?>

	




	
	
<div class="pheadr1">
	
	<div class="llkqk_22">
			<h2> Employers profile </h2>
	</div>

</div>	
	
	
	
	
	


<div class="bw100" style="    padding-top: 20px;">






<div class="container">
	
	

	
<div class="row justify-content-center">
	
	
	
	<div class="col-lg-8">
		
	
	
<?php if (text_size($Data['cover_pic'])>2): ?>		
	<div style="    margin-bottom: 10px;">
		<img class="img_1" src="/employers/covers/<?=$Data['cover_pic'];?>.jpg"/>	
	</div>	
<?php endif; ?>	
	

<div class="col-12">
	
				<div class="job_1">
					<div class="row align-items-center">
						
						<div class="col-lg-2">
												<a href="#" class="hot-jobs-img">
																			<?php if (text_size($Data['photo_addr'])>5): ?>
							<img class="pimg" src="/employers/images/<?=$Data['photo_addr'];?>" alt="" >
						 <?php else: ?>
								<img class="pimg" src="/images/38e5d4bedd70b4111cef3927e32d8866.jpg" alt="" style="max-width: 132px;">
						<?php endif;?>
												</a>
											</div>
											
											
						<div class="col-lg-5">
												<div class="hot-jobs-content">
													<h3><?=safechar($Data['compname']);?> </h3>
													
														
	<?php if ($ifsector == 1) { ?>

		<span class="sub-title sectCatName"> <span class="brdqo1" style="    background: #fff;"></span>  <?=$HrJqcatq['name'];?>  </span>

	<?php } ?>		
													
													
												
													
													
													<ul>
														<li><span>Company id:</span> <?=safechar($Data['uid']);?></li>
													</ul>
												</div>
											</div>
											
								
						
						
						
						
						
						
					</div>
					

					
			
<div class="frmWdiqdispl1">
						
		<p class="overflowing">
			<?=safechar($Data['aboutcompany']);?> 
		</p>	
		
</div>							
					
					
	
   
                      <? if (isset($user) && $user['user_type']=="candidate"): ?>   
								<div class="Submit">
									<a href="/employers/cv.php?id=<?=$Data['uid'];?>">Send resume</a>
								</div>
                      <? endif; ?>    
   
   				
				</div>
				
				
		
		
		
				
				
			</div>			
			
			
	
	
	<div class="sidebarwJbs1">

	<div class="row">
		

<div class="col-lg-12">
   <h5>Details</h5>
</div>
		
		   <div class="col-lg-6">
								<span class="brdqo1"></span>		Founded
										<span>: <?=safechar($Data['founded']);?> -წელს</span>
									
							</div>

	
						    <div class="col-lg-6">
								<span class="brdqo1"></span>			Located in
										<span>: <?=safechar($Data['city']);?></span>
									
							</div>
									
					<?php if ($ifsector == 1) { ?>
							<div class="col-lg-6">
								<span class="brdqo1"></span>		Business
										<span>: <?=$HrJqcatq['name'];?></span>
									
							</div>				
					
					<?php } ?>												
										<div class="col-lg-6">
								<span class="brdqo1"></span>				Vacancies
										<span>: <?=$hmanyjobs;?></span>
									
		</div>
									
									<div class="col-lg-6">
								<span class="brdqo1"></span>			Viewd
										<span>: <?=safechar($Data['viewed']);?> -times</span>
									
		</div>
																			

									
														
							
			

									
		
									
									
								
	
									
									<div class="col-lg-6">
									<span class="brdqo1"></span>		Registered
													<span>: <?=date("M d, Y", $Data['unixtime']);?></span>
									
										</div>										
									
									
				<div class="col-lg-6">
				<span class="brdqo1"></span>		Website:	<span> <a href="<?=safechar($Data['website']);?>"> <?=safechar($Data['website']);?></a> </span>
				</div>
		
			<div class="col-lg-6">
				<span class="brdqo1"></span>		Phone:	<span> <a href=""> <?=safechar($Data['mobnumber']);?></a> </span>
				</div>
	
		
		
		

		
	</div>






</div>
	
	
	
	<div class="col-lg-12">
	
	
	
				<div class="FormS">
				
				<div class="FormS_breakingBottom">
					<h4>Share</h4>
				</div>
				
					<div class="rest">
				
						<div class="nav"><a class="btn btn-primary-soft icon-sm p-0 me-2" href="#"><i class="fab fa-facebook-f"></i></a> <a class="btn btn-primary-soft icon-sm p-0 me-2" href="#"><i class="fab fa-twitter"></i></a> <a class="btn btn-primary-soft icon-sm p-0 me-2" href="#"><i class="fab fa-linkedin-in"></i></a> <a class="btn btn-primary-soft icon-sm p-0 me-2" href="#"><i class="fab fa-instagram"></i></a></div>		
				
				</div>
			
			</div>
			
	
	
	
	
	
	
	
	
	
	</div>
	
	
	
	
	
		
<!--

		
		
<div class="wdg1z">
	



	
	
	<h3>Office Photos</h3>

<div class="row">
								<div class="col-lg-4 col-md-6">
									<div class="/office-photo">
										<img src="/images/employers-details/office-1.jpg" alt="Image">
									</div>
								</div>

								<div class="col-lg-4 col-md-6">
									<div class="office-photo">
										<img src="/images/employers-details/office-2.jpg" alt="Image">
									</div>
								</div>

								<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
									<div class="office-photo">
										<img src="/images/employers-details/office-3.jpg" alt="Image">
									</div>
								</div>
							</div>




</div>		
		
		
-->	
	
	
		
		
		
		
		
		
			
			
								
	</div>	

<div class="col-lg-4">
	


	
	
	<div class="col-lg-12">
	
	

				<div class="FormS">
				
				<div class="FormS_breakingBottom">
					<h4>About company</h4>
				</div>
				
	
		<div class="frm_flex1_z">
         
         
            <? if (strlen($Data['founded'])>0) { ?>
               <div>
                  <div class="f_l_img1flexingWithgrayBorder"> 
                     <i class="fa-regular fa-calendar"></i>
                  </div> 
                  Founded in 
                  <?=safechar($Data['founded']);?>  
               </div>
            <? } ?>
         
         
	
            
            
				<div> <div class="f_l_img1flexingWithgrayBorder"> <i class="fa-solid fa-briefcase"></i></div> <a href=""><?=$hmanyjobs;?> Posts</a> </div>
            
            
               <? if (strlen($Data['city'])>0) { ?>
				<div> <div class="f_l_img1flexingWithgrayBorder"><i class="fa-solid fa-city"></i></div> <?=safechar($Data['city']);?> </div>
               <? } ?> 
      
      
      <!--
      			<div> <div class="f_l_img1flexingWithgrayBorder"><i class="fa-solid fa-calendar-days"></i></div>  <?=date("M d, Y", $Data['unixtime']);?> </div>     
          -->  

            
         </div>
	
	</div>
	
	</div>
	
	
	
	
	
	
<!--starting point -->


	
	<div class="col-lg-12 mrtt_25">
	
	

				<div class="FormS">
				
				<div class="FormS_breakingBottom">
					<h4>Contact us</h4>
				</div>
				
	
		<div class="frm_flex1_z">
			
				<div> 
					
					<div class="f_l_img1flexingWithgrayBorder">
						<i class="fa-solid fa-phone"></i>
					</div>  
					
				<?=safechar($Data['mobnumber']);?>
					
				</div>
		
		
		
			<div> 
					
					<div class="f_l_img1flexingWithgrayBorder">
						<i class="fa-solid fa-envelope"></i>
					</div>  
					
				<?=safechar($Data['mobnumber']);?>
					
				</div>		
		
		
			
			<div> 
					
					<div class="f_l_img1flexingWithgrayBorder">
						<i class="fa-solid fa-globe"></i>
					</div>  
					
					<?=safechar($Data['website']);?>
					
				</div>	
		
		
		
		
		
		
		
		
		
					
					
			
				
				
		</div>
	
	</div>
	
	</div>
	


<!-- end of contact -->	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</div>	
	
	
	
	
	<div class="col-lg-12 mm_topbt1">
	
		
	<div class="ttlq100_text">
			<h4>Active jobs</h4>	
		</div>
		
		<div class="mm_tt_zz1">
				
				
				
		
	
	
<?php


$KdataoFVips = $pdo->query("select * from hr_job where company_id = ? order by jid desc",[
	$Data['uid']
]);

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
					
					<button class="default-btn btnq1_zzjoply1">Send</button>
					
				</div>
				
			</div>
		
		
		<!-- -->	
						
						
						
						
		</div>
					
				
					
					
	<?php endwhile;?>
				
				
				
				
				
				
				
				
				
		</div>	
		
		
		
		
	</div>
	
		
	
	
	
	
	
	
	
	</div>
	

	
	
	
	
	
	</div>	
	
	
	
	
	
	
<?php  include("../inc/footer.php"); ?>

