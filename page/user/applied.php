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
	
   
   
 
	if (isset($_GET['r_req'])) {
		
		if (!if_integer($_GET['r_req'])) {
			redirection("?");
		}


		if (!is_numeric($_GET['r_req'])) {
			redirection("?");
		}
		
		
		$us_id = (int)$_GET['r_req'];

		$pdo->query("delete from cv_requests where user_id = ? and id = ? and res_type = ?",[$user['uid'], $us_id,'request']);

	
	redirection("?");
	
	
	
		
	}  
   
   
   
   
   
?>




<?php  include("../../inc/header.php"); ?>







<div class="pheadr1">
	
	<div class="llkqk_22">
			<h2> Applied </h2>
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
							<h3>Applied for jobs</h3>
						</div>
						
						
		<?php 
		
		
			
$Q_Page = new Pagination();

$kq_c1 = $pdo->query("select * from cv_requests where  user_id = ? and res_type = ?",
	[$user['uid'],'request']
)->rowCount();

$ttlq = $Q_Page->calculation($kq_c1, $params['page']);

		
		
		
		
		
		$qweqwe = $pdo->query("select * from cv_requests where  user_id = ? and res_type = ? order by id DESC LIMIT ? OFFSET ? ", [$user['uid'],'request', $params['page'], $ttlq]);
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
		
			
			
				

							
<div class="applied_appicants_mq1">
									
					<div class="qszappicantsqs">
							
								<div>
								
								
								<div class="qszappiczqantsqs21">
										<div>
											
										
		
										
										
										
										</div>
								
										<div>
											
												<div>
													
                                       
<h6>	
      <a href="/employers/details.php?id=<?php echo ($cpmn_id['uid']);?>">		      
          <?php echo safechar($cpmn_id['compname']);?>					
		</a>
</h6>		
                           <div>
                              <b>Resume:</b> 
                              <a href="/cvs/<?php echo ($u_res_1['resume']);?>.pdf">  
                                    <?php echo safechar($u_res_1['resume']);?>
                              </a>
                              
                           </div>	
                           
                           
                         			 <div>
                              <b>When:</b> 
                             
                                    <?php echo date("d M Y", $dCandidates2['when_send']);?>
                             
                              
                           </div>	  
                           
                           
                           <div>
                              <b>Vacancy:</b>

                          
                              <a href="/jobs/details.php?id=<?php echo ($job_data3['jid']);?>">  
                                    <?php echo safechar($job_data3['title']);?>
                              </a>
                              
                           </div>		
										
                              
                     <div>
                              <b>Full name:</b> 
                           
                                    <?php echo safechar($dCandidates2['f_name']);?>
                                    <?php echo safechar($dCandidates2['s_name']);?>
                              
                           </div>	            
                              
             
             
                        <div>
                              <b>Phone:</b> 
                           
                                       <?php echo safechar($dCandidates2['u_phone']);?>
                           </div>	            
                    
                
                        <div>
                              <b>Email:</b> 
                           
                                       <?php echo safechar($dCandidates2['u_email']);?>
                           </div>	    
               
                        <div>
                              <b>Address:</b> 
                           
                                       <?php echo safechar($dCandidates2['u_addr']);?>
                           </div>	    
                            
                    
                        <div>
                              <b>Country:</b> 
                           
                                       <?php echo safechar($dCandidates2['u_country']);?>
                           </div>	 
                           
                           
                        <div class="brk_wrod1">
                              <b>Cover letter:</b> 
                           
                                       <?php echo safechar($dCandidates2['u_cover']);?>
                           </div>	 
                                               
                              
                      
                      
                              
                              				
												</div>
												
												<div style="margin-top:15px;">
												
                                    <a href="?r_req=<?php echo ($dCandidates2['id']);?>"  class="btn_sf13z">X</a>
                                    
                                    
												
												</div>
											
											
										</div>		
								
								
								</div>
											
											
											
											
											
											
									</div>	
															
									
									
								
										
									
						</div>
						
						
					
						
								</div>	
						
			<?php endwhile; ?>
			
		
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


		</div>

	
	
	
		</div>
	
	
	
	
	
	
	


<?php  include("../../inc/footer.php"); ?>
