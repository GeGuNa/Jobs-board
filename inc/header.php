<?php

?>


<!DOCTYPE html>
<html>
<head>
	

<meta charset="utf-8">
<meta name="author" content="Phantom">

<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="keywords" content="Templates">
<meta name="description" content="Templates">
<title>Design</title>

<link rel="icon" href="/assets/img/favicon.ico">
<link rel="shortcut icon" href="/assets/img/favicon.ico">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.css">

<link href="/assets/css/bootstrap.css" rel="stylesheet">
<link href="/assets/css/main.css" rel="stylesheet">
<link href="/assets/css/line-awesome.css" rel="stylesheet">




<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/jquery.nice-select.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>


</head>

<body>



	<div class="headfr1">
	
	<div><p>Hot Line <a class="pindigo" href="tel:+1-(514)-312-5678">+1 (514) 312-5678</a></p></div>
	
	
	<div class="divz">
		<a href=""><i class="fa-brands fa-facebook"></i></a>
		<a href=""><i class="fa-brands fa-instagram"></i></a>
		<a href=""><i class="fa-brands fa-twitter"></i></a>
		<a href=""><i class="fa-solid fa-envelope"></i></a>
	</div>
	
	
</div>	
	
	
	
	
<div class="header">
		
		
		<div class="first">
			<a href="/"><h1>Logo</h1></a>
			
			<button href="" class="hid_mp" onclick="display_menu();">
				<i class="fa-solid fa-bars"></i>
			</button>
		
		</div>
		
		
			<div class="second" id="dis_cont1">
				
						
							<div><a href="/">Home</a></div>	
							<div><a href="/#">Favourites</a></div>		
							<div><a href="/about.php">About us</a></div>			
								<div><a href="/page/contact">Contact us</a></div>	
							
						<?php if (!isset($user)): ?>	
							<div class="hdq_flcnc1">
										<button onclick="relq('/login.php');">Candidate</button>
										<button onclick="relq('/page/auth/');">Company</button>
							</div>
						<?php else: ?>	
							
								<?php 
								if ($user['user_type']=="candidate") $ustype1lnk = "/page/user/";
								else $ustype1lnk = "/page/company/";
								
								?>
							
							<div>	
								<div class="hdl_flgap12" onclick="relq('<?=$ustype1lnk;?>');">
								
									<div>	<img src="/assets/activate/small.png"/></div>
									<div> <span class="a"> Profile </span> </div>
								
								</div>
								
							</div>
							
							<div>
								
							</div>
							
							
							
						<?php endif; ?>	
			</div>
			
			
	</div>	

	
<?php if (isset($_SESSION['message'])) { ?>
  <div id="success_sts" class="uusr_qlppScss11">
     <?php echo $_SESSION['message'];?>
  </div>

<?php
$_SESSION['message'] = NULL;
} if (isset($_SESSION['err'])) {
?>
  <div id="mistake_sts" class="uusr_qlppScss11">
	<?php echo $_SESSION['err'];?>
  </div>

<?php 
$_SESSION['err'] = NULL;
}

?>
