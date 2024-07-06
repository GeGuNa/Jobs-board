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






<?php 


if (isset($_POST['changing'])) {
	
$mail = my_esc($_POST['mail']);
$name = my_esc($_POST['u_firstname']);
$surn = my_esc($_POST['u_lastname']);

$tel_num = my_esc($_POST['tel_num']);



$www = my_esc($_POST['www']);
$about = my_esc($_POST['about']);



$country = my_esc($_POST['country']);
$state = my_esc($_POST['state']);
$city = my_esc($_POST['city']);
$postal_code = my_esc($_POST['postal_code']);
$capability = my_esc($_POST['capability']);

$f_addr = my_esc($_POST['f_addr']); //full address


$facebook = my_esc($_POST['f_id']); //
$twitter = my_esc($_POST['t_id']); //
$linkedin = my_esc($_POST['l_id']); //
$dribble = my_esc($_POST['d_id']); //


if (!preg_match('/^[0-9]+$/', $tel_num))Error('ნომერი უნდა შედგებოდეს მხოლოდ ციფრებისგან');

if (!if_email($mail))Error('ელ ფოსტა არასწორად იქნა მითითებული');

	
if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM hr_user WHERE pemail = ?", [$mail]) > 0 && $user['pemail'] != $mail) {
	
	Error('ასეთი ელ ფოსტა უკვე არსებობს ჩვენს ბაზაში');
	
}	




$experience = my_esc($_POST['experience']);
$qualification_1 = my_esc($_POST['qualification']);
$languages = my_esc($_POST['klanguages']);



if (!in_array($experience, ['1','2','3','4','5']))Error('უუპს');
if (!in_array($qualification_1, ['1','2','3','4','5','6']))Error('უუპს');









if (isset($_FILES['MyPhoto1']['tmp_name']) && text_size($_FILES['MyPhoto1']['name'])>=2) {


$picture = $_FILES['MyPhoto1']['name'];


if (!is_image($picture)) { 
	error('დაშვებული ფორმატები gif, png, jpg, jpeg, webp');
}



$imgewweee = new Imagick($_FILES['MyPhoto1']['tmp_name']);






if ($_FILES['MyPhoto1']['size']  > 1048576*5) {
	error("ფაილის ზომა არ უნდა იყოს 5 მბ ზე მეტი");
}





$picture = $_FILES['MyPhoto1']['tmp_name'];




   $mqwe = ['pic','photo','nphoot','jphoto','_pic_','foto','picture'];
   $kq = rand(0, count($mqwe)-1);
   $plmblah = $mqwe[$kq];
   $ph31_p4 = random_string(20);

   $ph31_p1 = str_shuffle("1234567804512451_1231_4123_abvczxcqwqtytyiypu");
   $ph31_p2 = str_shuffle($time);
   $ph31_p3 = my_esc("".$ph31_p4."".$plmblah."_".$time."".rand(0,9999999)."_".rand(0,9999999)."_pic".$ph31_p1);


	
$picturePath = $_SERVER['DOCUMENT_ROOT'].'/candidates/images/'.$ph31_p3.'.jpg';
convertAndBlur($picture, $picturePath, $imgewweee->getImageWidth(), $imgewweee->getImageHeight(), 100);




	$pdo->query("UPDATE hr_user SET capability = ?, languages = ?, name = ?, surn = ?, mobnumber = ?, pemail = ?, experience = ?, qualification = ?, website = ?, sector = ?, aboutcompany = ?, country = ?, state = ?, city = ?, postalindex = ?,fulladdress = ?, photo_id = ?, photo_type = ?, facebook = ?, twitter = ?, linkedin = ?, dribble = ?, photo_addr = ?  WHERE uid = ?",[$capability,$languages, $name, $surn,$tel_num,$mail,$experience,
	$qualification_1,$www,$sector,$about,$country,$state,$city,$postal_code,$f_addr,1251234,'.jpg',$facebook,$twitter,$linkedin,$dribble, $ph31_p3.".jpg", $user['uid']]);




}  else {

	$pdo->query("UPDATE hr_user SET capability = ?, languages = ?, name = ?, surn = ?, mobnumber = ?, pemail = ?, experience = ?, qualification = ?, website = ?, sector = ?, aboutcompany = ?, country = ?, state = ?, city = ?, postalindex = ?,fulladdress = ?, photo_id = ?, photo_type = ?, facebook = ?, twitter = ?, linkedin = ?, dribble = ? WHERE uid = ?",[$capability,$languages, $name, $surn,$tel_num,$mail,$experience,
	$qualification_1,$www,$sector,$about,$country,$state,$city,$postal_code,$f_addr,1251234,'.jpg',$facebook,$twitter,$linkedin,$dribble, $user['uid']]);

}







 Success('Your profile has been edited', "?");





	
	
}
	
	
	
	
	if (isset($_GET['act']) && $_GET['act']=='removePhoto') {
		
		$pdo->query("UPDATE hr_user SET photo_addr = ? WHERE uid = ?",["", $user['uid']]);

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

				<?php  include("left.php"); ?>
	
</div>	
	
			
			
			<div class="w75">
				
				
			<form action="?" method="post" style="padding:0;" enctype="multipart/form-data">
		
					<div class="ddwidget">
						
						<div class="descq1">
							<h3>Details</h3>
						</div>
						
				
					<div class="forms">
						
						
					<div class="div_100 mrbottom20">
						
						<?php if (text_size($user['photo_addr'])>5): ?>
							<img class="pimg" src="/candidates/images/<?=$user['photo_addr'];?>" alt="" >
						 <?php else: ?>
							<img class="brd50" src="/images/38e5d4bedd70b4111cef3927e32d8866.jpg" alt="" style="max-width: 132px;">
						<?php endif;?>
                        
                        
                        
                       <div class="dash_board5">
						   
								<div>
										
									<div onlick="" id="kk_ll1" class="kk_ll_z123">Upload photo</div>
											
										
								</div>
								
								<?php if (text_size($user['photo_addr'])>5): ?>	
								<div>
								
									<div>
										<div onlick="" id="pho_rm" class="kk_ll_z123">X</div>
									</div>
									
							
									
									
                       </div> 
                       
                       
                      	<?php endif; ?>	
                     				
                       </div>    
                        
                        
                        <input style="display:none;" type="file" name="MyPhoto1" id="ImgUpld" accept=".jpg, .jpeg, .png">
                        
                        
					</div>	
						
						
					
					<!-- -->	
						<div class="div_50 mrbottom20">
							
			
							<label>Name</label>                        
							<input type="text" name="u_firstname" value="<?=safechar($user['name']);?>" minlength="1" maxlength="100" required="">
				  
							
						</div>
						
		
						<div class="div_50 mrbottom20">
							

							<label>Surname</label>                        
							<input type="text" name="u_lastname" value="<?=safechar($user['surn']);?>" minlength="1" maxlength="100" required="">

							
						</div>		
	
	
						<div class="div_50 mrbottom20">
							
			
							<label>Activity</label>                        
							<input type="text" name="capability" value="<?=safechar($user['capability']);?>"  maxlength="100">
				  
							
						</div>
							
	
	
						
						
						<div class="div_50 mrbottom20">
							
			
							<label>Language(s)</label>                        
							<input type="text" name="klanguages" value="<?=safechar($user['languages']);?>" minlength="1" maxlength="1000">
				  
							
						</div>
						
		
						<div class="div_50 mrbottom20">
							

							<label>Email</label>                        
							<input type="email" name="mail" value="<?=safechar($user['pemail']);?>" required="">

							
						</div>	
			
						
						
						
						
						
						
						
						
					<!-- -->
		
		
		<!-- -->
		
	
		
						<div class="div_50 mrbottom20">
							

							<label>Phone</label>                        
							<input type="text" name="tel_num" value="<?=safechar($user['mobnumber']);?>">

							
						</div>	
		
		
		
		<!-- -->
				
				
				
				
		
		
		<!-- -->
		
		
					
						<div class="div_50 mrbottom20">
							
			
							<label>Website</label>                        
							<input type="text" name="www" value="<?=safechar($user['website']);?>">
				  
							
						</div>
						
		
						<div class="div_50 mrbottom20">
							

							<label>Qualification</label>                      
							  <select name="qualification" required style="width:100%;">
											<option value="1" <?=($user['qualification'] == 1 ? "selected" : "");?>>Certificate</option>
											<option value="2" <?=($user['qualification'] == 2 ? "selected" : "");?>>Diploma</option>
											<option value="3" <?=($user['qualification'] == 3 ? "selected" : "");?>>Associate</option>
											<option value="4" <?=($user['qualification'] == 4 ? "selected" : "");?>>Bachelors degree</option>
											<option value="5" <?=($user['qualification'] == 5 ? "selected" : "");?>>Masters degree</option>
											<option value="6" <?=($user['qualification'] == 6 ? "selected" : "");?>>Other</option>
							  </select>

							
						</div>	
		
		
		
		<!-- -->			
				
				
		
		
		<!-- -->
		
		
					
				
		
		
		
		<!-- -->		
		
				
				
				
		
		<!-- -->
		
		
					
						<div class="div_50 mrbottom20">
							
			
							<label>Experience</label>   
							                     
							<select name="experience" required>
											<option value="1" <?=($user['experience'] == 1 ? "selected" : "");?>>Doesn't matter</option>
											<option value="2" <?=($user['experience'] == 2 ? "selected" : "");?>>1 Years</option>
											<option value="3" <?=($user['experience'] == 3 ? "selected" : "");?>>2 Years</option>
											<option value="4" <?=($user['experience'] == 4 ? "selected" : "");?>>3 Years</option>
											<option value="5" <?=($user['experience'] == 5 ? "selected" : "");?>>სხვა</option>
							</select>
				  
							
						</div>
						
		
			
		
		
		
		<!-- -->			
							
				
				
					<div class="div_100 mrbottom20">
						
						<label>About me</label>
						<textarea name="about"><?=safechar($user['aboutcompany']);?></textarea>
				
				
					</div>
				
				
				
				
				<!-- -->
				
				
				
				
				
				
					
					</div>
	
	
		
						
					</div>		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
						
				
			
			<!-- Address/Location -->	
			
					
					<div class="ddwidget">
			<div class="descq1">
							<h3>Living</h3>
						</div>
		
		
		<div class="forms">
			
						<div class="div_50 mrbottom20">
							
			
							<label>Country</label>                        
								<input type="text" value="<?=safechar($user['country']);?>" placeholder="" name="country"/>
				  
							
						</div>
					
					
						<div class="div_50 mrbottom20">
							

							<label>State</label>                        
							<input type="text" value="<?=safechar($user['state']);?>" placeholder="" name="state"/>
				  

							
						</div>
						
						
					
					<div class="div_50 mrbottom20">
								
						<label>City</label>                        
							<input type="text" value="<?=safechar($user['city']);?>" placeholder="" name="city"/>
				  
				  
							
						</div>
						
						<div class="div_50 mrbottom20">
							
			
							<label>Postal code</label>                        
							<input type="text" name="postal_code" value="<?=safechar($user['postalindex']);?>">
				  
							
						</div>
								
							
						<div class="div_100 mrbottom20">
							
			
							<label>Full address</label>                        
							<input type="text" name="f_addr" value="<?=safechar($user['fulladdress']);?>" >
				  
							
						</div>
										
						
						
						
				
	
			
	
					
			
			
			
			
			
			
			
			
			
		</div>
		
		
		
		
		</div>	
	
		
		
		
	
		<!-- social links -->
		<div class="ddwidget">
			
			<div class="descq1">
							<h3>Social networks</h3>
			</div>
		
		
		<div class="forms">
		<div class="div_50 mrbottom20">
							
			
							<label>Facebook</label>                        
							<input type="text" name="f_id" value="<?=safechar($user['facebook']);?>">
				  
							
						</div>
						<div class="div_50 mrbottom20">
							

							<label>Twitter</label>                        
							<input type="text" name="t_id" value="<?=safechar($user['twitter']);?>">

							
						</div>
						
						<div class="div_50 mrbottom20">
							
			
							<label>Linkedin</label>                        
							<input type="text" name="l_id" value="<?=safechar($user['linkedin']);?>">
				  
							
						</div>
						
						<div class="div_50 mrbottom20">
							
			
							<label>Dribbble</label>                        
							<input type="text" name="d_id" value="<?=safechar($user['dribble']);?>">
				  
							
						</div>
			
		</div>
		
		
		
		
		</div>			
					
		
		
	<div style="margin-bottom:15px;">
		<input type="submit" class="jobsearch-employer-profile-submit" name="changing" value="Save">
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
	
