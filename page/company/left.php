<?php

?>
				
			<div class="widget">
					
					
						<?php if (text_size($user['photo_addr'])>5): ?>
							<img class="pimg" src="/employers/images/<?=$user['photo_addr'];?>" alt="" >
						 <?php else: ?>
							<img class="pimg" src="/images/38e5d4bedd70b4111cef3927e32d8866.jpg" alt="">
						<?php endif;?>
					
                        
                                
              
                                
                                
                              <div>
								  <h2 class="pp_ll_21z"><?php echo safechar($user['name']);?> <?php echo safechar($user['surn']);?></h2>
                                  <p class="textmuted2"> <?php echo safechar($user['compname']);?> <?php echo safechar($user['company_id']);?> </p>
                                  <p style="text-align:center;"> ID: <?php echo safechar($user['uid']); ?></p>
                              </div>  
                            
                <div class="dmenuflexing">
							 
							 
							 
						
						<div class="">	  <!-- active -->
								<div class="dmenuflexing_row ">
								
									<span class="material-symbols-outlined">home</span>
											
									<a href="./">Home</a>
								
								</div> 
					 </div> 	
							 
								<div>
									<div class="dmenuflexing_row ">
										<span class="material-symbols-outlined">person_edit</span>   
										<a href="edit.php">Profile</a>
									</div>
								</div>	
			
			
                        <div>
									<div class="dmenuflexing_row ">
										<span class="material-symbols-outlined">bookmarks</span>   
										<a href="saved.php">Saved candidates</a>
									</div>
								</div>				
		
      
   			
                        <div>
									<div class="dmenuflexing_row ">
										<span class="material-symbols-outlined">Work</span>   
										<a href="resumes.php">Users resumes</a>
									</div>
								</div>		   
      							
		
		
							<div>
									<div class="dmenuflexing_row ">
										<span class="material-symbols-outlined">post_add</span>   
										<a href="post.php">New job</a>
									</div>
								</div>	
		
		
		
							<div>
									<div class="dmenuflexing_row ">
										<span class="material-symbols-outlined">manage_search</span>   
										<a href="jobs.php">Managing the jobs</a>
									</div>
								</div>	
								
								<div>
									<div class="dmenuflexing_row ">
										<span class="material-symbols-outlined">approval</span>   
										<a href="applicants.php">Candidates</a>
									</div>
								</div>	
							
								<div>
									<div class="dmenuflexing_row ">
										<span class="material-symbols-outlined">monetization_on</span>   
										<a href="bill.php">Billing</a>
									</div>
								</div>	
						
						
							<div>
									<div class="dmenuflexing_row ">
										<span class="material-symbols-outlined">credit_card</span>   
										<a href="transactions.php">Transactions</a>
									</div>
								</div>							
						
						
								
											
								<div>
									<div class="dmenuflexing_row ">
										<span class="material-symbols-outlined">security</span>   
										<a href="password.php">Change password</a>
									</div>
								</div>	
	
	
								<div>
									<div class="dmenuflexing_row ">
										<span class="material-symbols-outlined">delete</span>   
										<a href="delete.php">Delete account</a>
									</div>
								</div>		
								
								
								<div>
									<div class="dmenuflexing_row ">
										<span class="material-symbols-outlined">logout</span>   
										<a href="logout.php">Logout</a>
									</div>
								</div>					
								
								
		<!-- -->
							
								
		
		
	 
                            
                            
                                
					</div>




</div>	
	
				
				
			<?php	 ?>
