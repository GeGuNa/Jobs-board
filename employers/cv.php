<?php
	include("../inc/inc.php");
	include("../inc/db.php");
?>



<?php  include("../inc/header.php"); ?>



<?php


if (!isset($_GET['id'])){
	redirection("/");
}


if (!if_integer($_GET['id'])) {
	redirection("/");
}


if (!is_numeric($_GET['id'])) {
	redirection("/");
}



if (!isset($user)) {
   redirection("/login.php");
}

if ($user['user_type']!="candidate") {
   redirection("/login.php");
}

$uid = (int)$_GET['id'];


$Data = $pdo->query("select * from hr_user where uid = ? and user_type = ?",[$uid,'company'])->fetch();

if (empty($Data) || !isset($Data)) {
	redirection("/");
}



$hmanyjobs = $pdo->query("select * from hr_job where company_id = ?",[(int)$Data['uid']])->rowcount();






if (isset($_POST['SEnd'])) {



$resume_zq2z = ($_POST['resume']);

if (!isset($resume_zq2z) || empty($resume_zq2z)) {
   Error('Please pick up cv', "?id=$Data[uid]");
}

$name = my_esc($_POST['first_name']);
$surname = my_esc($_POST['last_name']);
$email = my_esc($_POST['email']); 
$phone = my_esc($_POST['phone']); 
$address = my_esc($_POST['address']);
$country = my_esc($_POST['country']);
$cover = my_esc($_POST['cover']);
$resume = my_esc($_POST['resume']);




/*
   if (!in_array($experience, ['1','2','3','4','5']))Error('უუპს');
   if (!in_array($genderofjob, ['1','2','3']))Error('უუპს');
   if (!in_array($qualification_1, ['1','2','3','4','5','6']))Error('უუპს');
*/






$KdataoFVips = $pdo->query("select * from user_cvs where user_id = ? and id = ?",[$user['uid'], $resume]);

if ($KdataoFVips->rowCount() == 0) {
   Error('Please pick up cv', "?id=$Data[uid]");
}





   



$pdo->query("insert into cv_requests (f_name,s_name,u_phone,u_email,u_addr,u_country,u_cover,u_resume,user_id,company_id,start_at,end_at,when_send) values(?,?,?,?,?,?,?,?,?,?,?,?,?)",[$name,$surname,$phone,$email,$address,$country,$cover,$resume,$user['uid'],$Data['uid'],' 2024-07-01 01:09:15
',' 2024-07-01 01:09:15', $Time]);



 Success('Your resume has been submitted', "/employers/details.php?id=$Data[uid]");


	
	
}



/*
// Example usage
$file = $_SERVER['DOCUMENT_ROOT'].'/cvs/a.pdf';
if (isPdf($file)) {
    echo "The file is a PDF.";
} else {
    echo "The file is not a PDF.";
}
*/



?>

	



<style>

.main_di1 {
    display: flex;
    justify-content: space-between;
    width: 100%;
    background: #f2f2f2 !important;
    border: 1px solid #eaeaea;
    border-radius: 10px;
    margin-bottom: 20px !important;
}
</style>


	
	

<div class="pheadr1">
	
	<div class="llkqk_22">
		
			<h2> Send resume </h2>
			
		
	</div>

</div>	
		
	
	
	
	
	


<div class="bw100">



<div class="container">

<div class="containER">




<div class="FormS">
	
	

	
	
	<div class="title_1">Company:  "<?php echo safechar($Data['compname']);?>"  </div>



 <form action="?id=<?=$Data['uid'];?>"  method="post">
 
 
 
<div class="grid grid-cols-2 gap-6">
	
   

	
	<div>
		<label class="block">First Name</label>
		<input type="text" placeholder="First Name" required minlength="1" maxlength="32" autocomplete="false" class="input grq1_qw" name="first_name">
	</div>


<div>
	<label class="block">Last Name</label>
	<input type="text" placeholder="Last Name" required minlength="1" maxlength="32" autocomplete="false" class="input grq1_qw" name="last_name">
</div>


<div>
	<label for="email_address" class="block">Email Address</label>
	<input id="email_address" type="email" required placeholder="you@company.com" name="email" autocomplete="false" class="input grq1_qw">
</div>

<div>
	<label for="phone" class="block">Phone Number</label>
	<input id="phone" type="text" placeholder="Phone Number" required autocomplete="false" class="input grq1_qw" name="phone">
</div>


<div>
	<label for="address" class="block">Address</label>
	<input type="text" placeholder="Full Address"  required minlength="1" maxlength="1024" autocomplete="false" class="input grq1_qw" name="address">
</div>


<div>
	<label for="Country" class="block">Country</label>
	<input type="text" placeholder="Country"  required minlength="1" maxlength="1024" autocomplete="false" class="input grq1_qw" name="country" required>
</div>





</div>





	<div class="" style="margin-top: 15px;">
		<label for="email_address" class="block">Cover Letter</label>
		<textarea placeholder="Cover Letter"  required minlength="1" maxlength="1096"   class="textarea" name="cover"></textarea>
	</div>



<div class="" style="margin-top:15px;">
						

            
<div class="applied_appicants_mq1 applied_apzpicantzs_mq1">
				
            <!-- -->					
				
        
     <?php

$KdataoFVips = $pdo->query("select * from user_cvs where user_id = ? order by id desc",[
   $user['uid']
]);

if ($KdataoFVips->rowCount() == 0) {
   echo 'No cvs been found';
}


$KdataoFVips = $KdataoFVips;


while($fetch_Vips = $KdataoFVips->fetch()):

?>		     
            <div class="forres">	
								<div><?=safechar($fetch_Vips['resume']);?>.pdf</div>
									
								<div class="flend21">
									<input type="radio" value="<?=safechar($fetch_Vips['id']);?>" name="resume" href="" class="btn3_sf133z">	
								</div>	
						</div>
                  
<?php endwhile;?>					
               
      
          <!-- -->		          
                  </div>	
					</div>



	<div style="margin-top:15px;">
		<button name="SEnd" value="1">Send</button>
	</div>

 
 
 
 </form>
 
 



</div>














</div>

</div>


</div>







	
	

	
	

<?php  include("../inc/footer.php"); ?>

	
