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

<!DOCTYPE html>

<html>
	<?php include 'head.php';?>
	
	<body>

		<?php include 'header.php';?>
		
		<main>
		<h1 style="position: absolute; left: -20000px;">Portfolio</h1>
			<!--Donate-->
			<section id="donate">
				
					<div class="chunk card">
						<div>
							<div>
								<h2> Donate </h2>
								<h3>Upgrading the giving experience</h3>
								<p>One of the most crucial areas to the ongoing success & day to day operations are public donations. It had been neglected at the Wisconsin Historical Foundation.</p>
							</div>
							<a class="button" href="donate.php">More Info</a>

						</div>
					
						<figure>
							<img src="images/donate-new-final.png" width=100%/>
						</div>
					</div>
			</section>
			
			<!--Historic Nav-->
			<section id="historic-nav">
				
					<div class="chunk card">
						<div>
							<div>
								<h2>Easy to Navigate</h2>
								<h3>Historic Attraction Website Navigation</h3>
								<p>As part of a simple web upgrade to 11 WordPress sites we also decided to improve the navigation system.</p>
							</div>
							<a class="button" href="historic-nav.php">More Info</a>

						</div>
					
						<figure>
							<img src="images/Historic-Nav-After-Final.png" width=100%/>
						</div>
					</div>
			</section>

			<!--Store-->
			<section id="store">
				
					<div class="chunk card">
						<div>
							<div>
								<h2>Online Store Upgrade</h2>
								<h3>Historic Attraction Website Navigation</h3>
								<p>A security breach gave us the opportunity (and necessity) to launch a new online store within a couple of weeks.</p>
							</div>
							<a class="button" href="store.php">More Info</a>

						</div>
					
						<figure>
							<img src="images/store-After-final.png" width=100%/>
						</div>
					</div>
			</section>


			<!--Timeline-->	
				<?php
				if($fullAccessEnabled) { ?>
		
				<section id="timeline">
				
					<div class="chunk card">
						<div class="protect">
							<div>
								<h2> Timeline </h2>
								<h3> A lifetime view</h3>
								<p>  The patient's medical history displayed in a comprehensive, chronological, and interactive web software program. A long term group project, establishing innovative ways to make medical decisions.</p>
							</div>
							<a class="button" href="timeline.php">More Info</a>

						</div>
					
						<figure class="protect">
							<img src="images/timeline_context.png" width=100%/>
						</figure>
					</div>

				</section>
			
				<?php } else { ?>
					
						<!-- put dummy card content here for secrets -->
						<section class="protected">
					
							<div class="chunk card">
								<div class="protect">
									<h2> Timeline </h2>
									<h3> ᛋᚻᚼ ᛄᛛᛟ ᛅᛔᛦᛯᛃᛂᚻᛛᛕ</h3>
									<p> ᚯᚵᚾᛆᚿ ᚫᚥᛑᛝ ᛨᛩᛩᛛᛊᛃ ᚻᚼ ᚵᚶᚾᛋᛊᚺᛝᛏᛐ ᛅᛔᛦᛯ ᛥᛯᛌᛏᛐ ᚿᚸᚱ ᚱᚮᚯᚣ ᚣ ᚪᚫᛎ ᛈᚷ ᚪᚸᛔᛜᛒ ᛓᚠᚡ ᚿᛇᚾ ᚰᛛᛜᛞ ᛜᛛᛜ ᛄ ᚶᚱᛇ ᚤᚫᚸᛇᛖᛗᛯᛮᛮᛥ. </p>
									<p class="smallcaption"> This project is under a confidentiality agreement, email me for a passcode </p>
								</div>
							
							
								<div class="pic protect">
									<img src="images/locked.png" title="This project is protected under a confidentiality agreement, email me for a passcode" width="100%"/>
								</div>

							</div>	
						</section>
						
				<?php } ?>
			
			<!--Social Care's Client Plan-->	
				<?php
				if($fullAccessEnabled) { ?>
				<section id="social">
				
					<div class="chunk card">
						<div class="protect">
							<div>
								<h2> Client Plan</h2>
								<h3> Social Care for the future</h3>
								<p> Designed for the future of the US medical industry, when social environments are regarded as a an important determinant of a patient's health. Incorporating aspects of international social care.</p>
							</div>	
							<a class="button" href="social.php">More Info</a>	
						</div>

						<figure class="protect">
							<img src="images/clientplan_context.png" width=100%/>
						</figure>
					</div>
			
				</section>
			
				<?php } else { ?>
				
					<!-- put dummy card content here for secrets -->
					<section class="protected">
					
						<div class="chunk card">
							<div class="protect">
							<h2> Social Care Client Plan </h2>
							<h3> ᛋᛄᛛᛟᛃᛂᚻ ᚵᚶᚾᛋ ᛊᚺᛝᛏᛐᛛᛕ</h3>
							<p> ᚵᚶᚾᛋᛊᚺᛝᛏᛐ ᚯᚵᚾᛆᚿ ᚫᚥᛑᛝ ᛨᛩᛩᛛᛊᛃ ᚻᚼᛅᛔᛦᛯ ᛜᛛᛜ ᛄ ᚿᚸᚱ ᚱᚮᚯᚣ ᚣ ᚪᚫᛎ ᛈᚷ ᚪᚸᛔᛜᛒ ᛓᚠᚡ ᚿᛇᚾ ᚰᛛᛜᛞ ᚶᚱᛇ ᚤᚫᚸᛇᛖ ᛥᛯᛌᛏᛐᛗᛯᛮᛮᛥ. </p>
							<p class="smallcaption"> This project is under a confidentiality agreement, email me for a passcode </p>
						</div>
						
						<div class="pic protect">
							<img src="images/locked.png" title="This project is protected under a confidentiality agreement, email me for a passcode" width="100%"/>
						</div>
					
					</section>


				<?php } ?>

			<!--Express Dispo-->	
				<?php
				if($fullAccessEnabled) { ?>
				<section id="express">
				
					<div class="chunk card">
						<div class="protect">
							<div>
								<h2>Express Dispo </h2>
								<h3>Speeding up the emergency department</h3>
								<p>A software redesign to benefit physician efficiency. Condensing a complicated process to its essentials and removing distractions to keep patient's safety a priority.</p>
							</div>	
							<a class="button" href="express.php">More Info</a>
						</div>
					
						<figure class="protect">
								<img src="images/express_context.png" class="border" width=100%/>
						</figure>
					</div>
				
				</section>

				<?php } else { ?>
				
					<!-- put dummy card content here for secrets -->
					<section class="protected">
					
						<div class="chunk card">
							<div class="protect">
							<h2> Express Dispo </h2>
							<h3> ᛋᛄᛛᛟᛃᛂᚻ ᚵᚶᚾᛋ ᛊᚺᛝᛏᛐᛛᛕ</h3>
							<p> ᚵᚶᚾᛋᛊ ᚣᚪᚫᛎᚺᛝᛏᛐ ᚯᚵ ᚫᚥᛑᛝ  ᚿᛇᚾ ᚰᛛᛜᛞ ᛨᛩᛩᛛᚾᛆᚿᛊᛃ ᚻᚼᛅᛔᛦᛯ ᛄ ᚿᚸᚱ ᚱᚮᚯᚣ ᚣᚪᚫᛎ ᛈᚷ ᚪᚸᛔᛜᛒ ᛓᚠᚡ ᚶᚱᛇ ᚤᚫᚸᛇᛖ ᛜᛛᛜ ᛥᛯᛌᛏᛐᛗᛯᛮᛮᛥ. </p>
							<p class="smallcaption"> This project is under a confidentiality agreement, email me for a passcode </p>
						</div>
						
						<div class="pic protect">
								<img src="images/locked.png" title="This project is protected under a confidentiality agreement, email me for a passcode" width="100%"/>
						</div>
					</section>				

				<?php } ?>
			
			
			<!--Crowned-->	
			<section id="crowned">
				
				<div class="chunk card">
					<div>
						<div>
							<h2>Crowned</h2>
							<h3>The Succesion of the British Monarchy</h3>
							<p>Unraveling the complexity of a topic close to my nerdy heart, the relationships between monarchs in the UK. A website showcasing a timeline and a family tree. </p>
						</div>
						<a class="button" href="crowned.php">More Info</a>
					</div>
				
					<div class="pic">
						<img src="images/crowned_context.png" width=100%/>
					</div>
			</section>

			<!--Podcast-->	
			<section id="podcast">
				
				<div class="chunk card">
					<div>
						<div>
							<h2> [Throbbing] Members Only</h2>
							<h3> A podcast by non-experts for non-experts</h3>
							<p> An all inclusive branding project incorporating a logo, website, and various related assets. Embracing innuendo to create an identity uniquely appropriate for the intimate topics discussed.</p>
						</div>
						<a class="button" href="only.php">More Info</a>
					</div>
				
					<div class="pic">
							<img src="images/only_context.png" width=100%/>
					</div>
				</div>
				
			</section>
			
			
			
				
		</main>
			
		<?php include 'footer.php';?>
		
	</body>
</html>