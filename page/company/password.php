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



<?php



if (isset($_POST['change']))
{


$oldpass = my_esc($_POST['old_pass']); // old
$newpass = my_esc($_POST['new_pass']); //new 
$repass = my_esc($_POST['re_pass']); //repeating



if ($user['password'] != $oldpass)Error('Old password is incorrect');
if ($newpass != $repass)Error('New and Old password aren\'t the same');



if (strlen2($oldpass)<3 && strlen2($oldpass)>100)Error('Old password must be 3 symbols at least and should\'t exceed 100 symbols');
if (strlen2($newpass)<3 && strlen2($newpass)>100)Error('New password must be 3 symbols at least and should\'t exceed 100 symbols');
if (strlen2($repass)<3 && strlen2($repass)>100)Error('Repeat password must be 3 symbols at least and should\'t exceed 100 symbols');





$pdo->query("UPDATE hr_user SET password = ? WHERE uid = ?", [$newpass, $user['uid']]);


$_SESSION['message'] = 'Your password has been changed';

header("Location: ?");
exit;	


}


?>


<?php  include("../../inc/header.php"); ?>



<div class="pheadr1">
	
<div class="llkqk_22">
		<h2 style="font-size: 30px;"> User Dashboard </h2>
</div>

</div>	
	


<div class="container">

		<div class="dashboard">

			<div class="w25">
				
					
					<?php include("left.php");?>
					
					
					
			</div>
			
			
			
			<div class="w75">
				
				
	<form action="?" method="post" style="padding:0;">		
					<div class="ddwidget">
						
						<div class="descq1">
							<h3>Change password</h3>
						</div>
						
						
				
					<div class="forms">
						
					
					<!-- -->	
						<div class="div_50 mrbottom20">
							
			
							<label>Old Password</label>                        
							<input type="text" name="old_pass" value="" minlength="3" maxlength="100" required="">
				  
							
						</div>
						
		
						<div class="div_50 mrbottom20">
							

							<label>New Password</label>                        
							<input type="text" name="new_pass" value="" minlength="3" maxlength="100" required="">

							
						</div>		
						
						
						<div class="div_100 mrbottom20">
							
			
							<label>Repeat New Password</label>                        
							<input type="text" name="re_pass" value="" minlength="3" maxlength="100" required="">
				  
							
						</div>
						
		
						
						
						
						
						
						
		
				
				
				
				<!-- -->
				
				
				
				
				
				
					
					</div>
	
	
		
						
					</div>
					
					
						
				
	
		
		
		
	<div style="margin-bottom:15px;">
		<input type="submit" class="jobsearch-employer-profile-submit" value="Save" name="change">
	</div>	
		
		
		</form>			
			
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


