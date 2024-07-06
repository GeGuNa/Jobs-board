<?php
	include("./inc/inc.php");
	include("./inc/db.php");
?>


<?php 
if (isset($user)) {
	redirection("/");
}
?>


	
<?php 
	
if (isset($_POST['sign_up'])) {
	

if (isset($_POST['mail']) && isset($_POST['pass']) && isset($_POST['name']) && isset($_POST['surn']) && isset($_POST['mobile'])) {
	
$mail = my_esc($_POST['mail']);
$pass = my_esc($_POST['pass']);
$name = my_esc($_POST['name']);
$surn = my_esc($_POST['surn']);
$mobile = my_esc($_POST['mobile']);



if (!preg_match('/^[0-9]+$/', $mobile))Error('ნომერი უნდა შედგებოდეს მხოლოდ ციფრებისგან');
if (!if_email($_POST['mail']))Error('ელ ფოსტა არასწორად იქნა მითითებული');

	
if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM hr_user WHERE pemail = ?", [$mail]) > 0) {
	
	Error('ელ ფოსტა უკვე არსებობს ჩვენს ბაზაში');

}



/*



$user_t2zq = $pdo->fetchOne("SELECT `id` FROM `user` WHERE `nick` = ? AND `pass` = ?", [$p2n1, $p2n2]);


$pdo->exec("UPDATE `user` SET `date_last` = '".$time."' WHERE `id` = '".$user['id']."'");
 
 
$pdo->query("UPDATE `user` SET `deciphered` = ? WHERE `id` = ?", [$p2n23, $user['id']]); 
 
 
$pdo->query("INSERT INTO `user_log` (`user`, `time`, `us_agent`, `us_ip`) values(?,?,?,?)", [$user_t2zq['id'], $time, $agnt, $iplong]);
    
    
  


$dat_zq_a_1 = "hello".time();
$qz1_22 = str_shuffle("0123456789");
$qz2_23 = str_shuffle('1234567890qwertyuiop[];lkjhgfdsazxcvbnm-_|!@#$%^&*()');

$qz123z_zz = str_shuffle($dat_zq_a_1).str_shuffle($qz1_22).str_shuffle($qz2_23).time().time()-1252;
$cr12z_ = str_shuffle($qz123z_zz);
$qwez_g123_23 = hash('sha256', $cr12z_);



//time
$qwe_zzw_tm1 = time();
$qwe_zzw_tm2 = hash('sha256', $qwe_zzw_tm1);


$pdo->query("INSERT INTO `user_sessions` (`user_id`, `when`, `hash`, `time_limit`,`date_auth`) values(?,?,?,?,?)",[$user_t2zq['id'], $qwe_zzw_tm2, $qwez_g123_23, '1', $qwe_zzw_tm1]);



	
	
*/

	
//$user_t2zq = $pdo->fetchOne("SELECT uid FROM hr_user WHERE pemail = ? AND password = ?", [$mail, $pass]);


//$pdo->exec("UPDATE `user` SET `date_last` = '".$time."' WHERE `id` = '".$user['id']."'");
 
 

//setcookie('sess_id', $pass, $time+86400*365, '/');
//setcookie('when', $mail, $time+86400*365, '/');


//$_SESSION['sess_id'] = $pass;
//$_SESSION['when'] = $mail;



/*


 name       | character varying(1024) |           |          | ''::character varying
 surn       | character varying(1024) |           |          | ''::character varying
 password   | character varying(1024) |           |          | ''::character varying
 mobnumber  | character varying(1024) |           |          | ''::character varying
 pemail     | character varying(1024) |           |          | ''::character varying
 reg_time   | date                    |           |          | CURRENT_DATE
 company_id | bigint                  |           |          | '0'::bigint
 unixtime   | bigint                  |           |          | '0'::bigint
 birth_yy   | bigint                  |           |          | '0'::bigint
 birth_mm   | bigint                  |           |          | '0'::bigint
 birth_dd   | bigint                  |           |          | '0'::bigint


*/


$pdo->query("INSERT INTO hr_user (name,surn,pemail,password,mobnumber,unixtime,user_type) values(?,?,?,?,?,?,?)",
[
$name, $surn, $mail, $pass, $mobile, $time,'candidate'
]);
		


header('Location: ?');
exit;





}




} 	
	
	
	
	

?>
	




<?php  include("./inc/header.php"); ?>

	


<div class="pheadr1">
	
<div class="llkqk_22">
		<h2> For candidates </h2>
</div>

</div>	
	


<div class="container">
	
<div class="row justify-content-center mm_ll_lll_clwo1">
	
	<div class="col-lg-6">


<!-- -->


<div class="user-area">
							<h3>Sign up</h3>

							<form class="user-form" method="post" action="?">
								<div class="row">
									
									<div class="col-12">
										<div class="form-group">
											<label>Name</label>
											<input class="form-control" required minlength="1" maxlength="100"  type="text" name="name">
										</div>
									</div>
									
									<div class="col-12">
										<div class="form-group">
											<label>Surname</label>
											<input class="form-control" required minlength="1" maxlength="100" type="text" name="surn">
										</div>
									</div>			
									
									
									

									<div class="col-12">
										<div class="form-group">
											<label>Email</label>
											<input class="form-control" type="email" required name="mail">
										</div>
									</div>
									
									
									<div class="col-12">
										<div class="form-group">
											<label>Phone</label>
											<input class="form-control" type="text" name="mobile">
										</div>
									</div>

									<div class="col-12">
										<div class="form-group">
											<label>Password</label>
											<input class="form-control" type="password" name="pass" required>
										</div>
									</div>
		
					
		
									<div class="col-12">
										<button class="default-btn register" name="sign_up" value="1" type="submit">
											Sign up
										</button>
									</div>

									<div class="col-12">
										<p class="create">Already have an account? <a href="/login.php">Login</a></p>
									</div>
								</div>
							</form>
						</div>


<!-- -->





		
		

	</div>		
	
	
	
</div>	

</div>	
	
	


		
	
	<?php  include("./inc/footer.php"); ?>

