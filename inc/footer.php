<?php


?>



<div class="footer">

	<div class="ftrVisualisation">
		<div class="row">
			
			
			
		<div class="col-lg-3">
				<h2 class="title">Our company</h2>

					<div class="mmrqqsd_14">
                     <p><span class="eehzq2">123 456 7890</span></p>
                     <p>Georgia, Batumi</p>
                     <p>6000  Tsereteli str07.</p>
                     <p>support@admin.com</p>
					</div>
				

		</div>	
			
	<div class="col-lg-1"></div>
	
			<div class="col-lg-2">
				<h2 class="title">For Candidates</h2>
				<ul>
					<li><a href="/jobs">Browse Jobs</a></li>					
					<li><a href="/employers">Browse employers</a></li>
					<li><a href="/login.php">Dashboard</a></li>
					<li><a href="/page/user/saved.php">My Bookmarks</a></li>
				</ul>
			</div>
			

			
			
			<div class="col-lg-2">
				<h2 class="title">For Employers</h2>
				
				<ul>
					<li><a href="/candidates">Candidates</a></li>
					<li><a href="/page/auth/">Authorization</a></li>
					<li><a href="/page/company">Dashboard</a></li>
					<li><a href="/page/company/post.php">New Job</a></li>
				</ul>
				
			</div>
			


			<div class="col-lg-2">
				<h2 class="title">About Us</h2>
				<ul>
					<li><a href="/page/contact/">Contact Us</a></li>
					<li><a href="/about.php">About Us</a></li>
					<li><a href="/terms.php">Terms</a></li>
					<li><a href="/page/packages/">Packages</a></li>
					<li><a href="">FAQ</a></li>
				</ul>
			</div>
			
			
	
			
			 
			<div class="col-lg-2">
				<h2 class="title">Helpful Resources</h2>
				<ul>
					<li><a href="">Site Map</a></li>
					<li><a href="">Terms of Use</a></li>
					<li><a href="">Privacy Center</a></li>
					<li><a href="">Security Center</a></li>
					<li><a href="">Accessibility Center	</a></li>
				</ul>
			</div>
				

	
			
			
		</div>
	</div>


</div>




 	<script>
		function relq(loc) {
				console.log(`yeah`)
				window.location = loc;
		}

		function relq(loc) {
				console.log(`yeah`)
				window.location = loc;
		}
		
		/*$(function(){
			  $('select').niceSelect();	
		});*/
		
		
		var if_menu_formob = false 
		
		
		function display_menu() {
			
			var qq_1 = document.querySelector("#dis_cont1")
			
			qq_1.classList.toggle("k2ekz_12")
			
			
			var ssq_1  = document.querySelectorAll(".hid_mp")[0]
			
			if (if_menu_formob == false) {
				ssq_1.innerHTML = '<i class="fa-solid fa-xmark"></i>'
				if_menu_formob = true
			} else {
				ssq_1.innerHTML = '<i class="fa-solid fa-bars"></i>'
				if_menu_formob = false
			}
			
				
				
				
				
			
			
			
			console.log(qq_1.outerHTML)
		}
		
		
		
		
					var ss1 = document.querySelector("#kk_ll1")
								
								var ss12 = document.querySelectorAll("input[name='MyPhoto1']")[0]
								var ss122_1 = document.querySelector("input[name='MyPhoto1']")
								
								
								ss1.onclick = function () {
									
									ss122_1.click()
									
								};
								
								
								
								
								var ss1_phrmvng = document.querySelector("#pho_rm")
								
						
								
								ss1_phrmvng.onclick = function () {
									
									window.location = "?act=removePhoto";
									
								};
								
								
		
		
		
		
		
	</script>


</body>
</html>
