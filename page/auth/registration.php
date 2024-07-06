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
	
if (isset($_POST['sign_up'])) {
	

if (isset($_POST['mail']) && isset($_POST['pass']) && isset($_POST['name']) && isset($_POST['surn']) && isset($_POST['mobile'])) {
	
$mail = my_esc($_POST['mail']); //
$pass = my_esc($_POST['pass']); //
$name = my_esc($_POST['name']); //
$surn = my_esc($_POST['surn']); //
$mobile = my_esc($_POST['mobile']); //
$cname = my_esc($_POST['cname']); //company name


//if (text_size($pass)<3 && text_size($pass)>100) { Error('პაროლი არ უნდა იყოს 3 სიმბოლოზე ნაკლები და 100 სიმბოლოზე მეტი'); }
if (text_size($name)<1 && text_size($name)>100) { Error('სახელი არ უნდა იყოს ცარიელი და არ უნდა აღემატებოდეს 100 სიმბოლოს'); }
if (text_size($surn)<1 && text_size($surn)>100) { Error('გვარი არ უნდა იყოს ცარიელი და არ უნდა აღემატებოდეს 100 სიმბოლოს'); }
if (text_size($pass)<3 && text_size($pass)>100) { Error('პაროლი უნდა ვარირებდეს 3 დან 100 სიმბოლომდე'); }



$cid1 = text_size($_POST['cid1']) >0 ? my_esc($_POST['cid1']) : "0"; // company identificator


if (!preg_match('/^[0-9]+$/', $mobile))Error('ნომერი უნდა შედგებოდეს მხოლოდ ციფრებისგან');
if (!if_email($_POST['mail']))Error('ელ ფოსტა არასწორად იქნა მითითებული');

if (text_size($cid1)>1 && !is_numeric($cid1))Error('კომპანიის იდენტიფიკატორი არასწორად იქნა მითითებული');
if (text_size($cid1)>100 && !is_numeric($cid1))Error('კომპანიის იდენტიფიკატორი არასწორად იქნა მითითებული');


	
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
 reg_time   | text                    |           |          | now()
 company_id | bigint                  |           |          | '0'::bigint
 unixtime   | bigint                  |           |          | '0'::bigint
 birth_yy   | bigint                  |           |          | '0'::bigint
 birth_mm   | bigint                  |           |          | '0'::bigint
 birth_dd   | bigint                  |           |          | '0'::bigint
 gender     | character varying(100)  |           |          | 'none'::character varying
 user_type  | character varying(100)  |           |          | 'candidate'::character varying
 compname   | character varying(1024) |           |          | ''::character varying



*/





$pdo->query("INSERT INTO hr_user (name,surn,pemail,password,mobnumber,unixtime,user_type,company_id,compname) values(?,?,?,?,?,?,?,?,?)",
[
$name, $surn, $mail, $pass, $mobile, $time,'company', $cid1, $cname
]);
		


header('Location: ?q');
exit;





}




} 	
	
	
	
	

?>
	



<?php  include("../../inc/header.php"); ?>

	
	
	


<div class="pheadr1">
	
<div class="llkqk_22">
		<h2> For companies </h2>
</div>

</div>	
	


<div class="container">
	
<div class="row justify-content-center mm_ll_lll_clwo1">
	
	<div class="col-lg-6">


<!-- -->


<div class="user-area">
							<h3>Create an account</h3>

							<form class="user-form" method="post" action="?">
								<div class="row">
									
									<div class="col-12">
										<div class="form-group">
											<label>Saxeli</label>
											<input class="form-control" type="text" required minlength="1" maxlength="100" name="name">
										</div>
									</div>

									<div class="col-12">
										<div class="form-group">
											<label>Surname</label>
											<input class="form-control" type="text" required minlength="1" maxlength="100" name="surn">
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
											<label>Company name</label>
											<input class="form-control" type="text" name="cname">
										</div>
									</div>


									<div class="col-12">
										<div class="form-group">
											<label>Id number of company</label>
											<input class="form-control" placeholder="კომპანიის საიდენტიფიკაციო კოდი" type="number" name="cid1">
										</div>
									</div>
	
									<div class="col-12">
										<div class="form-group">
											<label>Phone</label>
											<input class="form-control" type="number" required name="mobile">
										</div>
									</div>	
	
	
		
		
									<div class="col-12">
										<div class="form-group">
											<label>Password</label>
											<input class="form-control" type="password" required minlength="3" maxlength="100" name="pass">
										</div>
									</div>
		
									<div class="col-12">
										<button class="default-btn register" name="sign_up" value="1" type="submit">
											Sign up
										</button>
									</div>

									<div class="col-12">
										<p class="create">Have an account? <a href="./">Login</a></p>
									</div>
								</div>
							</form>
						</div>


<!-- -->





		
		

	</div>		
	
	
	
</div>	

</div>	
	
	


		
	
	<?php  include("../../inc/footer.php"); ?>

