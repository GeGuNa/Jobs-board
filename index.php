<?php
	include("./inc/inc.php");
	include("./inc/db.php");
?>



<?php  include("./inc/header.php"); ?>

	
	
	
<div class="mnfr1">
	
	
	
<div class="container" id="mn_srch_bar">
	
<div class="cnqtq1">
	<h2>Hire people for your business</h2>
	<div>Discover your next career move, freelance gig, or internship</div>	
</div>	
	
	<div class="row" style="row-gap:15px;">
		
            <div class="col-lg-6">

                     <input type="text" class="form-control" placeholder="Candidate title, keywords"/>
               
               </div>
               
               
            <div class="col-lg-6">
               

                  <input type="text" class="form-control" placeholder="City or postcode"/>
               
               
               </div>
			
			
			
		<div class="col-lg-6">
	
			
         
         
     
                  <select  tabindex="-1" style="max-width: 100% !important;">
                             <option value="">All Categories</option>
                           <option class="level-0" value="54">Advertising</option>
                        <option class="level-0" value="55">Application</option>
                        <option class="level-0" value="56">Customer</option>
                        <option class="level-0" value="58">Design</option>
                        <option class="level-0" value="57">Developer</option>
                     </select>
          
            
           
           
           
           		
			
		
                  
                  
			</div>
			
      	<div class="col-lg-6">
					<button class="bt_viol btmnindx1">Search</button>
			</div>
                 
         
         
	
	</div>
	
	

	
	
<div class="col-lg-12" style="margin-top:20px;">

		<div class="p_flex_box">

					<a href="#">
						<div>IT Enginer</div>
						<div><i class="fa-solid fa-laptop"></i></div>
					</a>  
					
					<a href="#">
						<div>Marketing</div>
						<div><i class="fa-solid fa-magnifying-glass-dollar"></i></div>
					</a>  
					
					<a href="#">
						<div>Banking</div>
						<div><i class="fa-solid fa-money-bill-transfer"></i></div>
					</a>  
					
					
					<a href="#">
						<div>Healthcare</div>
						<div><i class="fa-solid fa-kit-medical"></i></div>
					</a>  
					
					
					<a href="#">
						<div>Design & art</div>
						<div><i class="fa-solid fa-palette"></i></div>
					</a>  
					
					<a href="#">
						<div>School</div>
						<div><i class="fa-solid fa-school"></i></div>
					</a>  
					
			
		</div>
		
		
		
</div>	
	
	
	
	
	
	
	
	
	
	
	
	
</div>	


</div>	


<div class="container">


<div class="row mm_topbt1">
	
	
	
<!-- popular jobs -->


<div class="col-lg-12">
	
	<div>
		
		<div class="ttlq100_text">
			<span>Active jobs</span>
			<h4>Vip posts</h4>	
		</div>
		
		
	<div class="mm_tt_zz1">
		
		
<?php


$KdataoFVips = $pdo->query("select * from hr_job where jtype = ?",['vip']);
while($fetch_Vips = $KdataoFVips->fetch()):


$CompID = $pdo->query("select * from hr_user where uid = ?", [$fetch_Vips['company_id']])->fetch();

//alter table hr_job add vip_time bigint default '0';
//alter table hr_job add ordinary_time bigint default '0';
?>		
		
		
		

		
				
				<div class="main_di1">
				
				
					<div>
					
							
							<div class="dlfpback1">
				
				<div>
						<?php if (text_size($CompID['photo_addr'])>5): ?>
							<img class="pimg" src="/employers/images/<?=$CompID['photo_addr'];?>" alt="" >
						 <?php else: ?>
							<img class="pimg" src="/images/38e5d4bedd70b4111cef3927e32d8866.jpg" alt="">
						<?php endif;?>
				</div>
				
				<div>
					
					
			
						
						<div class="z1_s5">
							
							<div>
								<div class="s3z" style="cursor:pointer;" onclick="window.location='/jobs/details.php?id=<?=$fetch_Vips['jid'];?>'"> 
									<?=safechar($fetch_Vips['title']);?>
									</div>
							</div>
							
							<div>
								
								<div class="dlfpba_z1z_s53">
									<div><i class="fa-solid fa-location-dot me-1"></i> <?=safechar($fetch_Vips['jcity']);?> </div> 
									
									<div>
									<i class="fa-solid fa-sack-dollar me-1"></i>  
									<?=safechar($fetch_Vips['min_price']);?> - <?=safechar($fetch_Vips['max_price']);?>
									
									</div>  
									
									
									<div><i class="fa-solid fa-briefcase me-1"></i> <?=$jjj_experience[safechar($fetch_Vips['experience'])]; ?> </div>
								</div>	
										
							</div>
							
						</div>
					
						
				
					
					
				</div>
			</div>
				
					
					
					
					
					
					 </div>
					 
					 
					
					<div class="jalcent1"> 
						
						<div class="jfql123zqflgp1">
							
							<div>	
									<button>Apply now</button>
							 </div>
							
								<div class="text-truncate talend1">
									<i class="far fa-calendar-alt text-primary me-2"></i> 
									 <?=whenTm($fetch_Vips['unixtime']);?>
								</div>
							
						</div>
					
					</div>
					
					
				
				</div>
				
				
				
				
						
						
		<?php endwhile;?>
		
			
	</div>	
		
	
	</div>
	
	
</div>


<!-- end of pupular jobs--> 
	
	

	
	

<!-- companies -->

<div class="col-lg-12 mm_bb_tt_1">


<div class="cate_main">


	<div class="ttlq100">
		<span>Send cv</span>
		<h4>Employers</h4>	
	</div>


			<div class="row1 flw_2z_ppqd2z row_sp_btw">
	
			
			
<?php

$kq_c1 = $pdo->query("select * from hr_user  where user_type = ? ", ['company'])->rowCount();


?>			
			
			

<?php 
		$qweqwe = $pdo->query("select * from hr_user where  user_type = 'company' order by random()");
		while ($dEmployers = $qweqwe->fetch()): 
		
    //  var_dump($dEmployers);
?>	
	
					<div class="d0010">
							<div class="fl_mn_zz_1">
								<div>
									
								
								<?php if (text_size($dEmployers['photo_addr'])>5): ?>
									<img class="pimg" src="/employers/images/<?=$dEmployers['photo_addr'];?>" alt="">
								 <?php else: ?>
									<img class="pimg" src="/images/38e5d4bedd70b4111cef3927e32d8866.jpg" alt="">
								<?php endif;?>	
							
								
								
								
								</div>
								
								
								<div>
										<h6>
											<a href="/employers/details.php?id=<?php echo ($dEmployers['uid']);?>">		
												<?php echo safechar($dEmployers['compname']);?>
											</a>
										</h6>
									
								</div>
                        
                     <? if (isset($user) && $user['user_type']=="candidate"): ?>   
								
								<div class="qq_ll_zkqf12">
									<a href="/employers/cv.php?id=<?=$dEmployers['uid'];?>">Cv გაგზავნა</a>
								</div>
                      <? endif; ?>  
                      
							</div>
					</div>
			
<?php endwhile; ?>
				
			
			
			<!-- -->
			
			
			
				</div>










	</div>


</div>	
	


<!-- end of companies -->

	
	
	
	
	
	
	
	

<div class="col-lg-12 mm_bb_tt_2">





<div class="ttlq100_text">
			<span>Active jobs</span>
			<h4>Standard jobs</h4>	
		</div>











	
<!-- -->	
<div class="job_List jjbs1z">

<div class="row">
	
	
	
<?php


$KdataoFVips = $pdo->query("select * from hr_job where jtype = ? order by jid desc",['ordinary']);
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
		
	
	
	
	
	
	
	
<div class="col-12">
									<div class="pagination-area">
										<span class="page-numbers current" aria-current="page">1</span>
										<a href="#" class="page-numbers">2</a>
										<a href="#" class="page-numbers">3</a>
										
										<a href="#" class="next page-numbers">
											>
										</a>
									</div>
								</div>	
	
	
	
	
	
	
	
</div>

</div>	
<!-- -->
	
	




</div>





</div>

	

</div>




<!-- star the category -->






<!-- end of categories -->





	
	
	
	<?php  include("./inc/footer.php"); ?>
