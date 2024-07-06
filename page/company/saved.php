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
	
	
	
	

	if (isset($_GET['remove_candidate'])) {
		
		if (!if_integer($_GET['remove_candidate'])) {
			redirection("/");
		}


		if (!is_numeric($_GET['remove_candidate'])) {
			redirection("/");
		}
		
		
		$us_id = (int)$_GET['remove_candidate'];

		$pdo->query("delete from hr_saved_candidates where company_id = ? and user_id = ?",[$user['uid'], $us_id]);

	
	redirection("?");
	
	
	
		
	}
	
	
	

	
	
	
	
	
	
	
	
	
	
	
?>




<?php  include("../../inc/header.php"); ?>


	
	

<div class="pheadr1">
	
	<div class="llkqk_22">
			<h2> Favourites </h2>
	</div>

</div>	
	


<div class="container">

		<div class="dashboard">

							<div class="w25">
								
								
								
				<?php include("left.php");?>
								
								
										
									
							</div>
			
			
			
			<div class="w75">
				
			
					
					
				
					<div class="ddwidget ddwmtop">
						
						<div class="descq1">
							<h3>User lists</h3>
						</div>
						
						
		<?php 

		
			
$Q_Page = new Pagination();

$d_count = $pdo->query("select * from hr_saved_candidates where  company_id = ?",[$user['uid']])->rowCount();

$hmany = $Q_Page->calculation($d_count, $params['page']);

$d_fetching = $pdo->query("select * from hr_saved_candidates where  company_id = ? ORDER BY sid DESC LIMIT ? OFFSET ?", 
	[$user['uid'], $params['page'], $hmany]
);
			
		
		
		
		
		
		
		
		
		while ($dCandidates2 = $d_fetching->fetch()): 
		
		
			$user_ID = $pdo->query("select * from hr_user where  uid = ?", [$dCandidates2['user_id']])->fetch();
		?>	
		
			
			
				

							
<div class="applied_appicants_mq1">
									
					<div class="qszappicantsqs">
							
								<div>
								
								
								<div class="qszappiczqantsqs21">
										<div>
											
										
										
						<?php if (text_size($user_ID['photo_addr'])>5): ?>
							<img src="/candidates/images/<?=$user_ID['photo_addr'];?>" alt="" >
						 <?php else: ?>
							<img src="/images/38e5d4bedd70b4111cef3927e32d8866.jpg" alt="">
						<?php endif;?>
										
										
										
										</div>
								
										<div>
											
												<div>
													<h6>
														
														
												<a href="/candidates/details.php?id=<?php echo ($user_ID['uid']);?>">		<?php echo safechar($user_ID['name']);?> <?php echo safechar($user_ID['surn']);?>
														
														</h6>
														
												</a>
												
														
												</div>
												
												<div>
												
												<figcaption class="cq4wvqwezrg"><?=safechar($user_ID['capability']);?> </figcaption>
												
												</div>
											
											
										</div>		
								
								
								</div>
											
											
											
											
											
											
									</div>	
															
									
									
										<div class="flend21">
											<a href="?remove_candidate=<?php echo ($user_ID['uid']);?>"  class="btn_sf13z">X</a>
										</div>
									
										
									
						</div>
						
						
					
						
								</div>	
						
			<?php endwhile; ?>
			
	
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

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


<?php  include("../../inc/footer.php"); ?>


