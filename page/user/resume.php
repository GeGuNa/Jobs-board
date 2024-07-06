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
   
   
 if (isset($_POST['new_resume']) && isset($_FILES['Resume'])) {
    
   $fl1z = $_FILES['Resume']['tmp_name']; 
   
   if (!isPdf($fl1z)) {
         Error('File must be a pdf');
   }
      
      
      
      $q_2fl1 = str_replace(".","",$_FILES['Resume']['name']);
      
      $q_2fl2 = random_string2(20);
     // $qweq_mer = array_merge($q_2fl1,$q_2fl2);
     $qweq_mer = ($q_2fl1.$q_2fl2);
     
     
     copy($fl1z, $_SERVER['DOCUMENT_ROOT']."/cvs/$qweq_mer.pdf");
    
 
    

$pdo->query("insert into user_cvs (user_id,resume) values(?,?) ",[$user['uid'],$qweq_mer]);

    
   	redirection("?"); 
    
 }  
   
	
   
   
   

if (isset($_GET['rm_cvs'])) {
	
	
	
if (!if_integer($_GET['rm_cvs'])) {
	redirection("/");
}


if (!is_numeric($_GET['rm_cvs'])) {
	redirection("/");
}


$uidPq1 = (int)$_GET['rm_cvs'];

	
	
	$pdo->query("delete from user_cvs where user_id = ? and id = ?", [$user['uid'], $uidPq1]);
	
	redirection("?");
	
}   
   
   
   
   
   
?>

<?php


if (isset($_GET['rem_ed'])) {
	
	
	
if (!if_integer($_GET['rem_ed'])) {
	redirection("/");
}


if (!is_numeric($_GET['rem_ed'])) {
	redirection("/");
}


$uidPq1 = (int)$_GET['rem_ed'];

	
	
	$pdo->query("delete from hr_education where user_id = ? and id = ?", [$user['uid'],$uidPq1]);
	
	redirection("?");
	
}





if (isset($_GET['rem_wkst'])) {
	
	
	
if (!if_integer($_GET['rem_wkst'])) {
	redirection("/");
}


if (!is_numeric($_GET['rem_wkst'])) {
	redirection("/");
}


$uidPq1 = (int)$_GET['rem_wkst'];

	
	
	$pdo->query("delete from hr_userworkstory where user_id = ? and id = ?", [$user['uid'],$uidPq1]);
	
	redirection("?");
	
}


if (isset($_GET['rem_skls1'])) {
	
	
	
if (!if_integer($_GET['rem_skls1'])) {
	redirection("/");
}


if (!is_numeric($_GET['rem_skls1'])) {
	redirection("/");
}


$uidPq1 = (int)$_GET['rem_skls1'];

	
	
	$pdo->query("delete from hr_user_skills where user_id = ? and id = ?", [$user['uid'], $uidPq1]);
	
	redirection("?");
	
}








if (isset($_GET['act']) && $_GET['act'] == "education") {

	if (isset($_POST['Add_education'])) {
		
$Nameofuniver = my_esc($_POST['Name']);
$faculty = my_esc($_POST['faculty']);
$Description = my_esc($_POST['Description']);
$from_to = my_esc($_POST['from_to']);
$to_from = my_esc($_POST['to_from']);
	

/*


 id              | bigint |           | not null | nextval('hr_education_id_seq'::regclass)
 e_name          | text   |           |          | ''::text
 e_academy       | text   |           |          | ''::text
 e_title         | text   |           |          | ''::text
 e_desc          | text   |           |          | ''::text
 e_attended_from | text   |           |          | ''::text
 e_attended_to   | text   |           |          | ''::text
 user_id         | bigint |           | not null | 
 when_saved      | bigint |           | not null | 

		
*/		
	$pdo->query("insert into hr_education (e_academy,e_title,e_desc,e_attended_from,e_attended_to,user_id,when_saved) values(?,?,?,?,?,?,?)",[
		$Nameofuniver,$faculty, $Description,$from_to,$to_from,$user['uid'],$time
	]);	
		
		redirection("?");
	}

}







if (isset($_GET['act']) && $_GET['act'] == "workstory") {

	if (isset($_POST['Add_workstory'])) {
		
	$Name = my_esc($_POST['Name']);
	$Title = my_esc($_POST['title']);
	$Description = my_esc($_POST['Description']);
	$from_to = my_esc($_POST['from_to']);
	$to_from = my_esc($_POST['to_from']);
	

/*



CREATE TABLE hr_userworkstory (
  id bigserial PRIMARY KEY,
  e_companyname text default '',
  e_title text default '',
  e_desc text default '', 
  e_timefrom text default '', 
  e_timeto text default '', 
  user_id bigint NOT NULL,
  when_saved bigint NOT NULL
);


		
*/		
	$pdo->query("insert into hr_userworkstory (e_companyname,e_title,e_desc,e_timefrom,e_timeto,user_id,when_saved) values(?,?,?,?,?,?,?)",[
		$Name, $Title, $Description, $from_to, $to_from, $user['uid'], $time
	]);	
		
		redirection("?");
	}

}





















if (isset($_GET['act']) && $_GET['act'] == "skills") {

	if (isset($_POST['Add_skills'])) {
		
	$Name = my_esc($_POST['ability']);
	$Percentage = my_esc($_POST['percentage']);
	

/*



hr=# \d hr_user_skills;
                               Table "public.hr_user_skills"
    Column    |  Type  | Collation | Nullable |                  Default                   
--------------+--------+-----------+----------+--------------------------------------------
 id           | bigint |           | not null | nextval('hr_user_skills_id_seq'::regclass)
 e_skillname  | text   |           |          | ''::text
 e_percentage | text   |           |          | ''::text
 user_id      | bigint |           | not null | 
 when_saved   | bigint |           | not null | 
Indexes:
    "hr_user_skills_pkey" PRIMARY KEY, btree (id)



		
*/		
	$pdo->query("insert into hr_user_skills (e_skillname,e_percentage,user_id,when_saved) values(?,?,?,?)",[
		$Name, $Percentage, $user['uid'], $time
	]);	
		
		redirection("?");
	}

}


?>




<?php  include("../../inc/header.php"); ?>



	

<div class="pheadr1">
	
<div class="llkqk_22">
		<h2> ჩემი რეზიუმე </h2>
</div>

</div>	
	


<div class="container">

		<div class="dashboard">

			<div class="w25">

				<?php  include("left.php"); ?>
	
</div>	
	
			
			
			
			<div class="w75">
				
			
					
				
	<div class="ddwidget ddwmtop">
						
						<div class="descq1">
							<h3>My Resume</h3>
						</div>
		
      
      
      
      
      						
							
<div class="applied_appicants_mq1 applied_apzpicantzs_mq1">
			
         
         
         
  <?php


$KdataoFVips = $pdo->query("select * from user_cvs where user_id = ? order by id desc",[
   $user['uid']
]);


while($fetch_Vips = $KdataoFVips->fetch()):



?>		


      
         						
					<div class="forres">
							
	

   
   			
									
											
								<div>
										<a href="/cvs/<?=safechar($fetch_Vips['resume']);?>.pdf">
                                 <?=safechar($fetch_Vips['resume']);?>.pdf
                              </a>
                              <p style="padding:0;margin:0;">
                                        <?=safechar($fetch_Vips['uploaded']);?>
                                 </p>
								</div>
									
										<div class="flend21">
										
											<a href="?rm_cvs=<?=$fetch_Vips['id'];?>"  class="btn3_sf133z">	<span class="material-symbols-outlined">delete</span> </a>
										</div>
									
										
									
						</div>
						
						
					



<?php endwhile;?>  
 
         
         
         
         
   
					
						
								</div>	
	
   
   					
						
	</div>
   
   <div class="ddwidget ddwmtop">					
	
 <div class="col-lg-12">
    
<div class="descq1">
	<h3>New Resume</h3>
</div>
                  
                  
<form action="?" method="post" enctype="multipart/form-data">
   <input type="file" name="Resume"/><br/><br/>
   
   <input type="submit" name="new_resume" value="Upload"/>
</form>						
			
	</div>  					
							
	
	
						
						
							
	
					
	
						
					
	
				
						
							
	
						
						
					
			
						
					
					</div>
								
						
				
					
						
	
								
							

<div class="mmnewback1">	
			
			
		
		<p class="p_31">განათლება</p>	

<form action="?act=education" method="post">



		<div class="flex_131 flmargin15">
			
					<div class="childofflex1">
							<label>სასწავლებლი</label>
							<input type="text" class="input" name="Name" placeholder="სად სწავლობდით" required minlength="1" maxlength="100" value=""/>
					</div>
					
		</div>
		
	
				
		
		<div class="flex_131 flmargin15">
					<div class="childofflex1">
						<label>ფაკულტეტი</label>
						<input type="text" class="input" name="faculty" placeholder="რას სწავლობდით"  required minlength="1" maxlength="100" value=""/>
					</div>	
		</div>		
			
							
		<div class="flex_131 flmargin15">
					<div class="childofflex1">
						<label>აღწერა</label>
						<textarea name="Description" class="textarea" placeholder="აღწერა" required minlength="1" maxlength="100"></textarea>
					</div>	
		</div>		
    
    
  							
		<div class="flex_131 flmargin15">
			
					<div class="childofflex1">
						<label>სასწავლო წლები</label>
						
						<div class="years_1"> 
							<input type="number" class="input input2" name="from_to"   required  placeholder="წლიდან" value=""/> 
							<input type="number" class="input input2" name="to_from" required placeholder="წლამდე" value=""/>
						</div>
						
					</div>	
					
		</div>		  
		
		
		<button name="Add_education" class="default-btn">დამატება</button>
    
    
    </form>
    
         
         
         
  					<?php
							$qp_ed = $pdo->query("select * from hr_education where user_id = ?",[$user['uid']]);
							
							while ($qp_ed1 = $qp_ed->fetch()):
							?>
							
								<ul class="li1">
									<li class="arts"><?=safechar($qp_ed1['e_academy']);?> [<a style="color:red !important;" href="?rem_ed=<?=$qp_ed1['id'];?>">X</a>] </li>
									<li class="university"><?=safechar($qp_ed1['e_title']);?> (<?=safechar($qp_ed1['e_attended_from']);?>-<?=safechar($qp_ed1['e_attended_to']);?>)</li>
									<li class="summary"><?=safechar($qp_ed1['e_desc']);?></li>
								</ul>
							
							<?php endwhile; ?>
							       
         
         
         
         
         
         
         
         
         
                					
	
		</div>				
						
			
					
					
		
		
		

<div style="/*border-bottom:1px solid #ddd;*/margin-bottom:20px;"></div>		
		
		
		
		
		
	
<div class="mmnewback1">	
			
			
		
		<p class="p_31">სამუშაო გამოცდილება</p>	

<form action="?act=workstory" method="post">



		<div class="flex_131 flmargin15">
			
					<div class="childofflex1">
							<label>კომპანიის სახელი</label>
							<input type="text" class="input" name="Name" placeholder="სახელი" required minlength="1" maxlength="100" value=""/>
					</div>
					
		</div>
		
	
				
		
		<div class="flex_131 flmargin15">
					<div class="childofflex1">
						<label>სათაური</label>
						<input type="text" class="input" name="title" placeholder="საქმიანობა"  required minlength="1" maxlength="100" value=""/>
					</div>	
		</div>		
			
							
		<div class="flex_131 flmargin15">
					<div class="childofflex1">
						<label>აღწერა</label>
						<textarea name="Description" class="textarea" placeholder="აღწერა" required minlength="1" maxlength="100"></textarea>
					</div>	
		</div>		
    
    
  							
		<div class="flex_131 flmargin15">
			
					<div class="childofflex1">
						<label>წლები</label>
						
						<div class="years_1"> 
							<input type="number" class="input input2" name="from_to"   required  placeholder="წლიდან" value=""/> 
							<input type="number" class="input input2" name="to_from" required placeholder="წლამდე" value=""/>
						</div>
						
					</div>	
					
		</div>		  
		
		
		<button name="Add_workstory" class="default-btn">დამატება</button>
    
    
    </form>
    
     
     
     
     
     
 			<?php
							$qp_ed = $pdo->query("select * from hr_userworkstory where user_id = ?",[$user['uid']]);
							
							while ($qp_ed1 = $qp_ed->fetch()):
							?>
							
								<ul class="li1">
									<li class="arts"><?=safechar($qp_ed1['e_title']);?> [<a style="color:red !important;" href="?rem_wkst=<?=$qp_ed1['id'];?>">X</a>]</li>
									<li class="university"><?=safechar($qp_ed1['e_companyname']);?> (<?=safechar($qp_ed1['e_timefrom']);?>-<?=safechar($qp_ed1['e_timeto']);?>)</li>
									<li class="summary"><?=safechar($qp_ed1['e_desc']);?></li>
								</ul>
							
							<?php endwhile; ?>    
     
     
     
     
     
                					
	
		</div>				
						
		
	
	
	
	
	
	
	
	
	
	
	
		

<div style="/*border-bottom:1px solid #ddd;*/margin-bottom:20px;"></div>		
		
		
		
		
		
	
<div class="mmnewback1" style="margin-bottom:30px;">	
			
			
		
		<p class="p_31">შენი სკილები</p>	

<form action="?act=skills" method="post">


    
  							
		<div class="flex_131 flmargin15">
			
					<div class="childofflex1">
						<label>Skill</label>
						
						<div class="years_1"> 
							<input type="text" class="input input2" name="ability"   required  placeholder="შესაძლებლობა" value=""/> 
							<input type="number" class="input input2" name="percentage" minlength="1" maxlength="3" required placeholder="პროცენტი" value=""/>
						</div>
						
					</div>	
					
		</div>		  
		
		
		<button name="Add_skills" class="default-btn">დამატება</button>
    
    
    </form>
    
                					
	
<p></p>	
	
	
	
		<?php
							$qp_ed = $pdo->query("select * from hr_user_skills where user_id = ?",[$user['uid']]);
							
							while ($qp_ed1 = $qp_ed->fetch()):
							
							$qp_ed1['e_percentage'] = abs((int)$qp_ed1['e_percentage']);
							
								if ($qp_ed1['e_percentage']>100)
									$qp_ed1['e_percentage'] = 100;
								
							?>
							
						
			<div class="skill-bar" data-percentage="100%">
									<h4 class="progress-title-holder">
										<span class="progress-title">[<a style="color:red !important;" href="?rem_skls1=<?=$qp_ed1['id'];?>">X</a>] <?=safechar($qp_ed1['e_skillname']);?></span>
										<span class="progress-number-wrapper">
											<span class="progress-number-mark" style="left: <?=safechar((int)$qp_ed1['e_percentage']);?>%;">
												<span class="percent"><?=safechar((int)$qp_ed1['e_percentage']);?>%</span>
												<span class="down-arrow"></span>
											</span>
										</span>
									</h4>
		
									<div class="progress-content-outter">
										<div class="progress-content" style="width: <?=safechar((int)$qp_ed1['e_percentage']);?>%;"></div>
									</div>
								</div>					
						
						
						
						
						
							
							<?php endwhile; ?>		
	
	
			
					
	
	
	
	
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


