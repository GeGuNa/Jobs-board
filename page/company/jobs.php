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




<?php  include("../../inc/header.php"); ?>



	
<div style="margin-top:40px;">Jobs posted by me</div>	
	
	
	
	
	<div class="mnfr1">
		
		
		
		<div class="container">
			
			<div class="cnqtq1">
				<h2>Jobs posted by me</h2>
			</div>	
			
		</div>	


	</div>	


<div class="container">


<div class="dashboard">
	
	
	


<div class="w25">


<?php include("left.php");?>
	
	</div>	
	
	
	

<div class="w75">


	
<!-- -->	
<div class="job_List jjbs1z">

<div class="row">
	
	
	
<?php 
         
         
         
$Q_Page = new Pagination();

$d_count = $pdo->query("select * from hr_job where  company_id = ?",[$user['uid']])->rowCount();

$hmany = $Q_Page->calculation($d_count, $params['page']);

$d_fetching = $pdo->query("select * from hr_job where  company_id = ? ORDER BY jid DESC LIMIT ? OFFSET ?", 
	[$user['uid'], $params['page'], $hmany]
);
		     
         
         
         
         
         
         
         
				while ($JDat1 = $d_fetching->fetch()): 
            
         ?>
				
				
				
				
					<div class="flj_ob__2z flxmrbo1 mdp2 roundedq1zflj bz2ordezr borderqzu712bnq">
		
	
			<div class="jj_bjo1">
			
				
					<div> 
					
								<div class="jj_bjo1z2gaping">
										<div><img src="/employers/images/4.webp"/> </div>
										<div>
											<h2><?=safechar($JDat1['title']);?></h2>
											<p><?=safechar($JDat1['jcountry']);?> <?=safechar($JDat1['jcity']);?></p>
										</div>
								</div>
					
					</div>
				
				
				<div class="mb_hiding"> 
						<div><h2 class="ph2"><?=safechar($JDat1['min_price']);?> - <?=safechar($JDat1['max_price']);?></h2></div>
						<div><p class="pjtext"><?=date("D-M-Y", $JDat1['unixtime']);?></p></div>
				</div>
				
				
				
				
				
			</div>
									
							
			<div>
				
						<p class="pjtext2"><?=safechar($JDat1['description']);?></p>
			</div>					
						
			
		<!-- -->
			
			<div class="jj_b_apply">
			
			
	
			
			
				<div>
					<div class="kk_gapingfordesc1">
						<div class="TpqQrrQ13zy1"><?=safechar($jjj_experience[$JDat1['experience']]);?></div>		
					</div>
				</div>
				
				<div class="for_mp_pho1s">
						<div><h2 style="text-align:center;" class="ph2">$<?=safechar($JDat1['min_price']);?> - $<?=safechar($JDat1['max_price']);?></h2></div>
						<div><p class="pjtext"><?=date("D-M-Y", $JDat1['unixtime']);?></p></div>
				</div>
				
				<div>	
					
					<button class="default-btn btnq1_zzjoply1">X</button>
					
				</div>
				
			</div>
		
		
		<!-- -->	
						
						
						
						
		</div>
					
				
					
					
					
					
				
				
				
				
			
			
			
			<? endwhile; ?>
	
	

	
		
	
	
	
	
	
	
	
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
<!-- -->
	
	




</div>



</div>

	

</div>










	


	
	
	

<?php  include("../../inc/footer.php"); ?>
