<?php
	include("../../inc/inc.php");
	include("../../inc/db.php");
?>


<?php 


	if (!isset($user)) {
		redirection("/");
	}
	
	if ($user['user_type'] != "candidate") {
		redirection("/");
	}
	
?>




<?php  include("../../inc/header.php"); ?>




<?php

$applied = $pdo->query("select * from cv_requests where  user_id = ? and res_type = ?",
	[$user['uid'],'request']
)->rowCount();

$saved = $pdo->query("select * from hr_saved_jobs where  user_id = ?",[$user['uid']])->rowCount();

$resume = $pdo->query("select * from user_cvs where user_id = ?",[
   $user['uid']
])->rowCount();



$messages = 0 ;

?>


	

<div class="pheadr1">
	
<div class="llkqk_22">
		<h2 style="font-size: 30px;"> User Dashboard </h2>
</div>

</div>	
	



<div class="container" style="margin-top:30px;">


   <div class="row" id="statistics_1" style="row-gap:10px;">

<div class="col-lg-3 col-md-6 col-12" style="">
   <div class="rg_cl1">
      <span>Applied for</span>
      <p><?=$applied;?> jobs</p>
   </div>
</div>

<div class="col-lg-3 col-md-6 col-12" style="">
   <div class="rg_cl1">
      <span>Saved jobs</span>
      <p><?=$saved;?> jobs</p>
   </div>
</div>


<div class="col-lg-3 col-md-6 col-12" style="">
   <div class="rg_cl1">
      <span>Resumes</span>
      <p> <?=$resume;?></p>
   </div>
</div>


<div class="col-lg-3 col-md-6 col-12" style="">
   <div class="rg_cl1">
      <span>Messages</span>
      <p><?=$messages;?></p>
   </div>
</div>

</div>				
				
	


</div>


<div class="container">

		<div class="dashboard" style="margin-top:0;">

			<div class="w25">
				
				
						<?php  include("left.php"); ?>
						
					
			</div>
			
			
			
			<div class="w75">
				
				
			
				
				
				
				
				
				
				
				
				
					<div class="">
						
			
								

					
			
			
			
			
			
			<!-- -->
		
		
		<div class="row1 flwrap gapin00 listmrtop30">
		
		
					
				<div class="d100">
	
	
	
	
	
	
	
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
			
				
		
				
				
				
				
				
				
				
				
				
	<div class="ddwidget" style="margin-top:0;">
						
						<div class="descq1">
							<h3>Applied Recently</h3>
						</div>
	
   
   <?
   
   
   	$qweqwe = $pdo->query("select * from cv_requests where  user_id = ? and res_type = ? order by id DESC LIMIT 5 ", [$user['uid'],'request']);
		while ($dCandidates2 = $qweqwe->fetch()): 
   
   
  		
			$user_ID = $pdo->query("select * from hr_user where  uid = ?", [$dCandidates2['user_id']])->fetch();
         
         
      	$cpmn_id = $pdo->query("select * from hr_user where  uid = ?", [$dCandidates2['company_id']])->fetch();
            
         
         
         $u_res_1 = $pdo->query("select * from user_cvs where  id = ?", [$dCandidates2['u_resume']])->fetch();
         
         
         
        $job_data3 = $pdo->query("select jid,title from hr_job where jid = ?",
         [  
            $dCandidates2['job_id']
         ]
        )
         ->fetch(); 
   
   
   
   ?>					
						
			
					
	
							
<div class="applied_appicants_mq1 applied_apzpicantzs_mq1">
									
					<div class="qszappicantsqs">
							
								<div>
								
								

								<div class="qszappiczqantsqs21">
									
								
										<div>
											
												<div>
													<h6>
                                       
     <a href="/employers/details.php?id=<?php echo ($cpmn_id['uid']);?>">		      
          <?php echo safechar($cpmn_id['compname']);?>					
		</a> 
                                       
                                       </h6>
												</div>
												
												<div>
												
												<figcaption class="cq4wvqwezrg">
                                    
                                       
                         			 <div>
                            
                             
                                    <?php echo date("d M Y", $dCandidates2['when_send']);?>
                             
                              
                           </div>	  
                           
                                    
                                    
                                    
                                    </figcaption>
												
												</div>
											
											
										</div>		
								
								
								</div>
											
											
											
											
											
											
									</div>	
															
									
						
										<div class="flend21">
											<a href="/jobs/details.php?id=<?php echo ($dCandidates2['job_id']);?>"  class="btn3_sf133z">View</a>
										</div>
									
										
									
						</div>
						
						
					
					
						
								</div>	
						
<?php endwhile; ?>
							
	
						
						
							
	
						
						
							
	
						
						
							
	
						
						
							
	
						
						
							
	
						
						
							
	
						
						
							
	
				
						<div class="applied_appicants_mq1 applied_apzpicantzs_mq1">
							<a href="/page/user/applied.php" class="ql_blli1">View all</a>
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
	




<?php  include("../../inc/footer.php"); ?>

