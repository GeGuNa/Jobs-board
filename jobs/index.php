<?php
	include("../inc/inc.php");
	include("../inc/db.php");
?>


<?php




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
	
	redirection("?");
	
	
	//	
		
	}
	
	
	
}


?>




<?php  include("../inc/header.php"); ?>

	
	
	

<div class="pheadr1">
	
	<div class="llkqk_22">
			<h2> Jobs </h2>
	</div>

</div>	
	


<div class="">






<div class="container">
	
<div class="row">
	
	
   
 <div class="col-lg-12" style="margin-top: 30px;">
   <div class="ttlq100_text">
			<h4>Search by category</h4>	
		</div>
 </div>  
   
	
	<div class="col-lg-12">


 
				<form class="srjob mm_j_bt120 cz2" style="margin-bottom: 30px;">
							<div class="row for_mobflgap">
								
								<div class="col-lg-3">
									<div class="form-group">
										<input type="text" class="form-control" id="job-title" placeholder="Job title, skills, or company">
									</div>
								</div>

								<div class="col-lg-3">
									<div class="form-group">
										<input type="text" class="form-control" id="job-title-2" placeholder="City, State, or zip">
									</div>
								</div>
								
								
								<div class="col-lg-3">

								<select class="fm_2z">
											<option value="1" selected disabled>Category</option>
											<option value="2">Designer</option>
											<option value="3">Management &amp; Finance</option>
											<option value="3">Marketing</option>
											<option value="4">Quality Assurance</option>
											<option value="4">Software Development</option>
											<option value="4">Web Design/Development</option>
										</select>	
							
																	
							</div>			
								
								
						<div class="col-lg-3">
									<button type="submit" class="default-btn">
										<i class="bx bx-search"></i>
										Search
									</button>
								</div>
				
							
				
		
								
								
								
							</div>
							
							
			
								
										
							
							
							
							
						</form>








	
	
	
	
	
	
<!-- -->	
<div class="job_List">

<div class="row">
	
	
	
<?php
$i=0;

$Q_Page = new Pagination();

$kq_c1 = $pdo->query("select * from hr_job where ordinary_time > ?", [$Time])->rowCount();

$ttlq = $Q_Page->calculation($kq_c1, $params['page']);

$qweqwe = $pdo->query("SELECT * FROM hr_job where ordinary_time > ? ORDER BY jid DESC LIMIT ? OFFSET ?", 
	[$Time, $params['page'], $ttlq]
);
		


while($fetch_Vips = $qweqwe->fetch()):


$CompID = $pdo->query("select * from hr_user where uid = ?", [$fetch_Vips['company_id']])->fetch();



if ($fetch_Vips['vip_time']>$Time)$cs_1_style = '/*jvips1Z*/';
else $cs_1_style = '';
?>	
	


			<div
      
 
      
       class="<?=$cs_1_style;?> flj_ob__2z flxmrbo1 mdp2 roundedq1zflj bz2ordezr borderqzu712bnq">
		
	
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
						<div class="t1end1"><h2 style="color: #0f890f !important;" class="ph2"><?=safechar($fetch_Vips['min_price']);?> - <?=safechar($fetch_Vips['max_price']);?> Gel</h2></div>
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
						<div><h2 style="text-align:center;color: #0f890f !important;" class="ph2"><?=safechar($fetch_Vips['min_price']);?> - <?=safechar($fetch_Vips['max_price']);?> Gel</h2></div>
						<div><p class="pjtext"><?=whenTm($fetch_Vips['unixtime']);?></p></div>
				</div>
				
				<div>	
					
					<a href="/jobs/details.php?id=<?=($fetch_Vips['jid']);?>" class="default-btn">View</a>
					
				</div>
				
			</div>
		
		
		<!-- -->	
						
						
						
						
		</div>
					
				
	
	
	
<?php


$i++;

endwhile; 

?>	



	
	
		
	
	
	
	
	
	
	
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

	


