<?php
	include("./inc/inc.php");
	include("./inc/db.php");
?>



<?php 
if (isset($user)) {
	redirection("/");
}
?>



<?php  include("./inc/header.php"); ?>

	
	
	
	<div class="pheadr1">
		
	<div class="llkqk_22">
			<h2 style="font-size: 30px;"> For candidates </h2>
	</div>

	</div>	
	


<div class="container">
	
<div class="row justify-content-center" style="margin-top:30px;">
	
	<div class="col-lg-6">

		<div class="user-area">
			<h3>Forgot password?</h3>
		</div>
		
		
<form class="user-form">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label>Email</label>
											<input class="form-control" type="text" name="name">
										</div>
									</div>
		

		
									<div class="col-12">
										<button class="default-btn" type="submit">
											Next step
										</button>
									</div>

									<div class="col-12">
										<span class="or">Or</span>
									</div>

					

									<div class="col-12">
										<p class="create"> <a href="/login.php">Back</a></p>
									</div>
									
									
								</div>
							</form>		
		
		
		
		

	</div>		
	
	
	
</div>	

</div>	
	
	
	
	
	<?php  include("./inc/footer.php"); ?>

	
