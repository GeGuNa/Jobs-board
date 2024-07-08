<?php


	if (isset($_COOKIE['sess_id']) && isset($_COOKIE['when'])) { 

		$mynckathr = my_esc($_COOKIE['sess_id']);
		$mynckathp = my_esc($_COOKIE['when']);


	} else if(isset($_SESSION['sess_id']) && isset($_SESSION['when'])) { 

		$mynckathr = my_esc($_SESSION['sess_id']);
		$mynckathp = my_esc($_SESSION['when']);


	} else {

		$mynckathr = '';
		$mynckathp = '';

	}


if (!empty($mynckathr) && !empty($mynckathp))
{ 

$usrsess = $pdo->fetchOne("SELECT * FROM hr_user_sessions WHERE hash = ? and whenlogged = ?", [$mynckathr, $mynckathp]);


if (!$usrsess) {
	
	session_destroy();
	setcookie('sess_id', '');
	setcookie('when', '');

	header('Location: /index.php');
	exit;

} else {


$user = $pdo->fetchOne("SELECT * FROM hr_user WHERE uid = ?",[$usrsess['user_id']]);


if (!$user) {

	session_destroy();
	setcookie('sess_id', '');
	setcookie('when', '');

	header('Location: /index.php');
	exit;
	
} /*else {
   echo $user['package_type']."<br/>";
   echo date('d M Y',1723124941);
   }*/

$usojbid = new user($user['uid']);


//var_dump($user['uid']);

$ips1 = my_esc($_SERVER['REMOTE_ADDR']);
$uas1 = my_esc($_SERVER['HTTP_USER_AGENT']);
$urls = my_esc($_SERVER['SCRIPT_NAME']);



///if activated



//$pdo->query("UPDATE `user` SET `browser` = ?,`date_last` = ?,`time` = ?,`url` = ?,`ip` = ?,`ua` = ? WHERE `id` = ?",[$browser,$time,$dros,$urls,$ips1,$uas1,$user['id']]);


/////////////////////

}


}

