<?php
	include("../../inc/inc.php");
	include("../../inc/db.php");
?>


<?php 


	if (!isset($user)) {
		redirection("/login.php");
	}
	
	if ($user['user_type'] != "candidate") {
		redirection("/");
	}
	
	
	
	
	
	

	if (isset($_GET['remove_job'])) {
		
		if (!if_integer($_GET['remove_job'])) {
			redirection("/");
		}


		if (!is_numeric($_GET['remove_job'])) {
			redirection("/");
		}
		
		
		$jid = (int)$_GET['remove_job'];

		$pdo->query("delete from hr_saved_jobs where job_id = ? and user_id = ?",[$jid, $user['uid']]);

	
	redirection("?");
	
	
	
		
	}	
	
	
	
	
	
	
	
	
	
?>




<?php  include("../../inc/header.php"); ?>



	

<div class="pheadr1">
	
<div class="llkqk_22">
		<h2 style="font-size: 30px;"> Bookmarked jobs </h2>
</div>

</div>	
	


<div class="container">

		<div class="dashboard">

		<div class="w25">

				<?php  include("left.php"); ?>
	
		</div>	
	
			
			
			<div class="w75 ddwmtop">
				
			
					
					
				
				
		
		
		
		<?php 
		
		
			
$Q_Page = new Pagination();

$d_count = $pdo->query("select * from hr_saved_jobs where  user_id = ?",[$user['uid']])->rowCount();

$hmany = $Q_Page->calculation($d_count, $params['page']);

$d_fetching = $pdo->query("select * from hr_saved_jobs where  user_id = ? ORDER BY jid DESC LIMIT ? OFFSET ?", 
	[$user['uid'], $params['page'], $hmany]
);
		
		
		while ($job1 = $d_fetching->fetch()): 
		
		
			$job_data = $pdo->query("select * from hr_job where  jid = ?", [$job1['job_id']])->fetch();
			
			$job_dataUs = $pdo->query("select * from hr_user where  uid = ?", [$job_data['company_id']])->fetch();
			
			
		?>	
			
		
						
			
		<div class="flj_ob__2z flxmrbo1 mdp2 roundedq1zflj bz2ordezr borderqzu712bnq">
		
	
			<div class="jj_bjo1">
			
				
					<div> 
					
								<div class="jj_bjo1z2gaping">
										<div>
											
											
					<?php if (text_size($job_dataUs['photo_addr'])>5): ?>
							<img class="pimg" src="/employers/images/<?=$job_dataUs['photo_addr'];?>" alt="" >
					<?php else: ?>
							<img class="pimg" src="/images/38e5d4bedd70b4111cef3927e32d8866.jpg" alt="">
					<?php endif;?>
										
										
										 </div>
										<div>
											<h2>
												
												<a href="/jobs/details.php?id=<?=$job1['job_id'];?>">
												<?=safechar($job_data['title']);?>
												</a>
											
											</h2>
											
											
											<p><?=safechar($job_data['jcountry']);?> <?=safechar($job_data['jcity']);?></p>
										</div>
								</div>
					
					</div>
				
				
				<div class="mb_hiding"> 
						<div><h2 class="ph2"><?=safechar($job_data['min_price']);?>-<?=safechar($job_data['max_price']);?> Gel </h2></div>
						<div><p class="pjtext"><?=date("d-M-Y",$job_data['unixtime']);?></p></div>
				</div>
				
				
				
				
				
			</div>
									
							
			<div>
				
						<p class="pjtext2"><?=safechar($job_data['description']);?></p>
			</div>					
						
			
		<!-- -->
			
			<div class="jj_b_apply">
		
				
				<div class="for_mp_pho1s">
						<div><h2 style="text-align:center;" class="ph2"><?=safechar($job_data['min_price']);?>-<?=safechar($job_data['max_price']);?> Gel</h2></div>
						<div><p class="pjtext"><?=date("d-M-Y",$job_data['unixtime']);?></p></div>
				</div>
				
				<div>	
					
					<a href="?remove_job=<?=$job1['job_id'];?>" class="default-btn btnq1_zzjoply1">წაშლა</a>
					
				</div>
				
			</div>
		
		
		<!-- -->	
						
						
						
						
		</div>	
			
			
			<?php endwhile;?>
			
						
					
<div class="col-12">
<div class="pagination-area">


<?
	$Q_Page->setPage("","");
	$Q_Page->setTotal($d_count);
	$Q_Page->setPerPage($params['page']);
	
	$Q_Page->rendering();	
?>						



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




<?php  include("../../inc/footer.php"); ?>

