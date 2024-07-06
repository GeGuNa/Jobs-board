
<?php
	include("../inc/inc.php");
	include("../inc/db.php");
?>	
	
	
<?php  include("../inc/header.php"); ?>

	
	

<div class="pheadr1">
	
<div class="llkqk_22">
		<h2> Employer list</h2>
</div>

</div>	
	


<div class="ppt100">






<div class="container">
	
<div class="row justify-content-center">
	
	
	
	<div class="col-lg-8">

	

	
<?php

$Q_Page = new Pagination();

$kq_c1 = $pdo->query("select * from hr_user where user_type = ? ", ['company'])->rowCount();

$ttlq = $Q_Page->calculation($kq_c1, $params['page']);





?>	
	
	
	
<!-- -->	
<div class="job_List">

<div class="row">

	

		<?php 
		
		$qweqwe = $pdo->query("SELECT * FROM hr_user WHERE user_type = ? ORDER BY uid DESC LIMIT ? OFFSET ?", 
			['company', $params['page'], $ttlq]
		);
		
		while ($dEmployers = $qweqwe->fetch()): 
		
		?>	
	
	
	


	
		<div class="col-12">
				<div class="job_1">
					<div class="row align-items-center">
						
						<div class="col-lg-2">
							
							<a href="details.php?id=<?php echo ($dEmployers['uid']);?>" class="hot-jobs-img">
							
								<?php if (text_size($dEmployers['photo_addr'])>5): ?>
									<img class="pimg" src="/employers/images/<?=$dEmployers['photo_addr'];?>" alt="" >
								 <?php else: ?>
									<img class="pimg" src="/images/38e5d4bedd70b4111cef3927e32d8866.jpg" alt="" style="max-width: 132px;">
								<?php endif;?>	
							
							</a>
							
						</div>
											
											
						<div class="col-lg-5">
												<div class="hot-jobs-content">
													
													<h3>
														<a href="details.php?id=<?php echo ($dEmployers['uid']);?>">		<?php echo safechar($dEmployers['compname']);?>
														</a>
													</h3>
												
													<ul>
														<li><span>ადგილი: </span>
														<?php echo safechar($dEmployers['country']);?> 
														<?php echo safechar($dEmployers['city']);?> 
														
														</li>
													</ul>
												</div>
											</div>
											
											
						<div class="col-lg-5">
												<span class="open-job">Jobs  Open: 0</span>
											</div>										
						
						
						
						
						
						
					</div>
				
				<!--	
						<span class="featured">Featured</span>	
					-->
					
					
					
					
					
					
					
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
<!-- -->
	
	
	
	
		

	</div>		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="col-lg-4">
		
		<div class="user-area">
			<h3>Search Company</h3>
		</div>
		
		
		<form class="search-form">
								<div class="form-group">
									<div class="search-box">
										<input class="form-control" name="search" placeholder="Search..." type="text">
									</div>
								</div>

								<div class="form-group">
									<label>Category</label>
									<select>
										<option value="1">UX/UI Designer</option>
										<option value="2">Web Developer</option>
										<option value="3">Web Designer</option>
										<option value="4">Software Developer</option>
										<option value="5">SEO</option>
									</select>
								</div>

								<div class="form-group">
									<label>Location</label>
									<select>
										<option value="1">United Kingdom</option>
										<option value="2">Austria</option>
										<option value="3">Bahrain</option>
										<option value="4">Canada</option>
										<option value="5">Denmark</option>
										<option value="6">Germany</option>
									</select>
								
								</div>

								<button class="default-btn">
									Search
								</button>
							</form>
		
		
	</div>
	
</div>	

</div>	
	

</div>	
	
	

<?php  include("../inc/footer.php"); ?>

	
