<?php
	include("../../inc/inc.php");
	include("../../inc/db.php");
?>


<?php



		session_destroy();
	
	
		$_SESSION['sess_id'] = null;
		$_SESSION['when'] = null;
	
	
		setcookie('sess_id', '', -1, "/");
		setcookie('when', '', -1, "/");

	    header('Location: /index.php');
	    exit;
	
?>
