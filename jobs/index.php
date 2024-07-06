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
			<h2> Job Listing </h2>
	</div>

</div>	
	


<div class="ppt100">






<div class="container">
	
<div class="row">
	
	
	
	<div class="col-lg-12">


 
				<form class="srjob mm_j_bt120 cz2">
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

$kq_c1 = $pdo->query("select * from hr_job")->rowCount();

$ttlq = $Q_Page->calculation($kq_c1, $params['page']);

$qweqwe = $pdo->query("SELECT * FROM hr_job ORDER BY jid DESC LIMIT ? OFFSET ?", 
	[$params['page'], $ttlq]
);
		


while($fetch = $qweqwe->fetch()):


$CompID = $pdo->query("select * from hr_user where uid = ?", [$fetch['company_id']])->fetch();


?>	
	


	

	
		<div class="col-12">
				<div class="job_1">
					<div class="row align-items-center">
						
						<div class="col-lg-2">
					
					<a href="/employers/details.php?id=<?=$CompID['uid'];?>" class="hot-jobs-img">
					
					
					<?php if (text_size($CompID['photo_addr'])>5): ?>
						 <img class="pimg" src="/employers/images/<?=$CompID['photo_addr'];?>" alt="" >
						 <?php else: ?>
							<img class="pimg" src="/images/38e5d4bedd70b4111cef3927e32d8866.jpg" alt="" style="max-width: 132px;">
					<?php endif;?>
                        
					</a>
					
					
						</div>
											
											
						<div class="col-lg-7">
												<div class="hot-jobs-content">
													<h3><a href="details.php?id=<?=($fetch['jid']);?>"><?=safechar($fetch['title']);?></a></h3>
												

										<ul>
											<li><?=safechar($fetch['jcountry']);?> <?=safechar($fetch['jcity']);?> </li>
										
											<li> <?=$jjj_type[safechar($fetch['job_type'])]; ?>  </li>
										
											
											
										</ul>



												</div>
											</div>
											
											
											<div class="col-lg-3">
											
											
		<?php 

			
				?>
												

					
											
											
											
												<a href="details.php?id=<?=($fetch['jid']);?>" class="default-btn">ნახვა</a>
											</div>										
						
						
						
						
						
						
					</div>

					
					
					
					
					
					
					
				</div>
				
				
				
				
				
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

	


