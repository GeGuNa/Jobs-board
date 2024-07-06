<?php
	include("../../inc/inc.php");
	include("../../inc/db.php");
?>



<?php 
if (isset($user)) {
	redirection("/");
}
?>

<?php 
	
if (isset($_POST['enter'])) {
	

if (isset($_POST['mail']) && isset($_POST['pass'])) {
	
$mail = my_esc($_POST['mail']);
$pass = my_esc($_POST['pass']);


if (!if_email($_POST['mail']))Error('ელ ფოსტა არასწორად იქნა მითითებული');

	
if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM hr_user WHERE pemail = ? AND password = ? and user_type = ?",
 [$mail, $pass, 'company']
 ) == 1) {
	
$user_t2zq = $pdo->fetchOne("SELECT uid FROM hr_user WHERE pemail = ? AND password = ? and user_type = ?", 
[$mail, $pass, 'company']
);


//$pdo->exec("UPDATE `user` SET `date_last` = '".$time."' WHERE `id` = '".$user['id']."'");
 
 


$dat_zq_a_1 = "hello".$time;
$qz1_22 = str_shuffle("0123456789");
$qz2_23 = str_shuffle('1234567890qwertyuiop[];lkjhgfdsazxcvbnm-_|!@#$%^&*()');


$qz123z_zz = str_shuffle($dat_zq_a_1).str_shuffle($qz1_22).str_shuffle($qz2_23).time().time()-1252;
$cr12z_ = str_shuffle($qz123z_zz);
$qwez_g123_23 = hash('sha256', $cr12z_);


//time
$qwe_zzw_tm1 = time();
$qwe_zzw_tm2 = hash('sha256', $qwe_zzw_tm1);


$pdo->query("INSERT INTO hr_user_sessions (user_id, whenLogged, hash, time_limit, date_auth) values(?,?,?,?,?)",
[
	$user_t2zq['uid'], $qwe_zzw_tm2, $qwez_g123_23, '1', $qwe_zzw_tm1
]);


	setcookie('sess_id', $qwez_g123_23, $time+86400*365, '/');
	setcookie('when', $qwe_zzw_tm2, $time+86400*365, '/');


	$_SESSION['sess_id'] = $qwez_g123_23;
	$_SESSION['when'] = $qwe_zzw_tm2;


	Error('მომხმარებელი ნაპოვნია');



} else  {

	Error('ასეთი მომხმარებელი არ მოიძებნა');




}




} 	
	
	
	
	
}

?>




<?php  include("../../inc/header.php"); ?>

	


<div class="pheadr1">
	
<div class="llkqk_22">
		<h2> კომპანიებისათვის </h2>
</div>

</div>	
	


<div class="container">
	
<div class="row justify-content-center mm_ll_lll_clwo1">
	
	<div class="col-lg-6">

		<div class="user-area">
			<h3>Login</h3>
		</div>
		
		
<form class="user-form" action="?" method="post">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label>Email</label>
											<input class="form-control" type="text" name="mail">
										</div>
									</div>
		
									<div class="col-12">
										<div class="form-group">
											<label>Password</label>
											<input class="form-control" type="password" name="pass">
										</div>
									</div>
		
									<div class="col-12">
										<div class="login-action">
											<span class="log-rem">
												<input id="remember-2" type="checkbox">
												<label>Remember me</label>
											</span>
											
											<span class="forgot-login">
												<a href="reset_password.php">Forgot password?</a>
											</span>
										</div>
									</div>
		
									<div class="col-12">
										<button class="default-btn" name="enter" value="1" type="submit">
											შესვლა
										</button>
									</div>

									<div class="col-12">
										<span class="or">Or</span>
									</div>

									<div class="col-12">
										<a href="#" class="or-login">
											<i class="bx bxl-facebook"></i>
											Login with Facebook
										</a>
									</div>

									<div class="col-12">
										<a href="#" class="or-login google">
											<i class="bx bxl-google"></i>
											Login with Google
										</a>
									</div>

									<div class="col-12">
										<p class="create">Don't have an account? <a href="registration.php">Sign up</a></p>
									</div>
								</div>
							</form>		
		
		
		
		

	</div>		
	
	
	
</div>	

</div>	
	
	
	
	


	
	<?php  include("../../inc/footer.php"); ?>

