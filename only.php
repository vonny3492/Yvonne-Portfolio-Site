<?php
	$baseURL = "http://" . $_SERVER['SERVER_NAME'];
	$baseURL .= "/" . explode("/", $_SERVER['REQUEST_URI'])[1] . "/";

	include($pathMod."passcodes.php");

	if (isset($_GET["passcode"])) {
	    $passcode = htmlspecialchars($_GET["passcode"]);
	    logAccess($passcode, true);
	} else {
	    if (isset($_COOKIE["passcode"])) {
	        $passcode = $_COOKIE["passcode"];
	        logAccess($passcode, false);
	    } else {
	        $passcode = "";
	    }
	}
	setcookie("passcode", $passcode);

	$fullAccessEnabled = false;
	if ($passcodes[$passcode]["canAccess"]) {
		$fullAccessEnabled = true;
	}

	function logAccess($passcode, $isInitial) {
		global $passcodes;
		if ($passcodes[$passcode]["assignedTo"] == "Cathy") return false;
		if ($passcodes[$passcode]["canAccess"]) {
			$entity = $passcodes[$passcode]["assignedTo"];
			if ($isInitial) {
				$message = "Portfolio link followed by $entity for the first time!";
			} else {
				$message = "Subsequent page load by $entity.";
			}
			mail ( "yvonne.r.m3492@gmail.com" , "Portfolio accessed by $entity" , $message );
		}
		
	}
?>


<html>
	<?php include 'head.php';?>
	
	<body>
	
	<?php
	if($fullAccessEnabled) { echo ""; }
	else { echo ""; }
	?>
	
	<?php include 'header.php';?>
		
		<main>	
			
			<section class="chunk half">

				<div>
					<h1>[Throbbing]<br>Members Only</h1>
					<h2>A podcast by non-experts for non-experts</h2>
					<p>An all inclusive branding project incorporating a logo, website, and various related assets. Embracing innuendo to create an identity uniquely appropriate for the intimate topics discussed.</p>
				</div>

				<figure>
					<img src="images/podcast.png" width="100%"/>
				</figure>

			</section>

			<svg class="curve" preserveAspectRatio="none" viewBox="0 0 1440 96" fill="#fff" xmlns="http://www.w3.org/2000/svg">
				<path d="m0 96 80-5.3C160 85 320 75 480 64s320-21 480-21.3c160 .3 320 10.3 400 16l80 5.3V0H0v96Z"></path>
			</svg>
			<section id="design" class="red chunk half">
				<div>
					<h2>Research</h2>
					<h3>Competitor Analysis</h3>
					<p>There are millions of podcasts out there in the universe these days and they handle broad ranges of topics. A local podcast group asked me to create a brand identity that would stand out from other podcasts.</p>
					<p>I wanted to create a logo that played into expectations but also was different enough to stand out.</p> 						
				</div>	
				
				<figure>
					<img src="images/research.png" width=100%/>
				</figure>
				
				<div>
					<p style="font-style: italic"> Common themes of popular podcast logos: </p>
						<dl>
							<dt>black</dt>
								<dd> Many of the popular podcasts use black heavily</dd>
							<dt>strong typography</dt>
								<dd> Most popular podcast use distinct logotype, using interesting placement, or creative typefaces.</dd>
							<dt> pink, purple, and sometimes red </dt>
								<dd> Sex podcasts use pink and purple primarily in their designs, and occasionally red. </dd>
							<dt> squares </dt>
								<dd> Most podcasts take up the entire space within the cover image square, most podcasts don't take advantage of the human eye's strong shape discerning abilities.
						</dl>
						
				</div>
				
			</section>	
			<svg class="curve" preserveAspectRatio="none" viewBox="0 0 1440 96" fill="var(--red)" xmlns="http://www.w3.org/2000/svg">
				<path d="m0 96 80-5.3C160 85 320 75 480 64s320-21 480-21.3c160 .3 320 10.3 400 16l80 5.3V0H0v96Z"></path>
			</svg>
			
			
			<section class="chunk">
				
				<figure>
					<img src="images/avatars.png" width=100%/>
				</figure>

				<div>
					<h2>Avatars </h2>
					<p> Part of the assets for the podcast were a set of avatars. This was to allow the Throbbers to keep private identities while still allowing listeners to associate a "face" with a name and voice. They were made in a simple graphical style but still capture the personalities of the members. Using color, clothing choice, and facial expression, I was able to create avatars that represent the real thing. Using Adobe Sketch I was able to capture fine facial details and accurate hair texture. </p>
				</div>

			</section>
			
			<section>
				
				
			<div class="chunk">
				<div>
					<h2>Logo Ideation </h2>
					<p>After brainstorming with the group and discussing the various ways sex can be represented subtly, I proposed using fruit as a focus point.</p>
					<p>I created a series of fruit vector images to use as the basis for logo iteration. They started a jumping off point that was followed by a typographic exploration, color variation, and different orientations.</p>
					<p>Working with my clients we were able come decide the strawberry was the best fruit to represent the female focus of the podcast.</p>
				</div>	
					
				<figure style="align-items: center;display: flex;">
					<img src="images/fruit.png" width=100%/>
				</figure>
			</div>					
			
			<h3 style="margin-top:3rem;">Strawberry Inuendo</h3>	
			<div class="chunk half">
				<div>
					<p> Iterating on the strawberry shape to create something that would stand out on a screen filled with podcasts, required moving away from the standard square.</p>
					<dl>
						<dt>High Conrast</dt>
						<dd></dd>
						<dt>Using Gestalt's Closure to leverage the square space uniquely</dt>
						<dd></dd>
						<dt>Integrating typography</dt>	
						<dd></dd>
					</dl>					
					
					<figure class="shadow">
						<img src="images/TMO-Logo.jpeg"/>
					</figure>

					<p> The resulting image used a darker red shade to keep in mind the standards of the podcast subject, but also is consistent with expectations of strawberries. Using this dark red combined with the dynamic figure ground and casual typeface created a logo that captured the goals and personality of [Throbbing] Members Only.</p>
					
				</div>
				
				<figure style="align-items: baseline;display: flex;">
						<img src="images/logos.png" width=100%/>
				</figure>
			</div>
				
			</section>	
			
			<section style="margin-top:0;">
			
					<img src="images/podcast.png" width="100%"/>
					<p class="link">Click below for a listen</p>
					
								<a class="button" style="margin: auto; margin-bottom: 30px;" target="_blank" href="http://throbbingmembersonly.com">Podcast</a>
			
			</section>
		</main>	
		
		
	<?php include 'footer.php';?>
	
	</body>
	
</html>
