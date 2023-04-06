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
					<h1>Lifetime</h1>
					<h3>High Level History</h3>
					<p>In Ambulatory, or Primary care medicine, knowing your patient's medical history can help you to better treat them, and better understand how different medications will affect them. We wanted to create software that allowed Primary Care Providers to quickly visualize their patient's history and beter determine the course of treatment.</p>
					<p class="list-header">Goals</p>	
					<ul>
						<li>graphical high level understanding of patient history</li>
						<li>summarize complex medical information safely</li>
						<li>easy discoverability of more information</li>
					</ul>
				</div>
			
				<aside>
					<figure class="feature">
						<img src="images/timeline_iterations2.png" style="width:100%;">
					</figure>
				</aside>
				
			</section>
			
			<svg class="curve" preserveAspectRatio="none" viewBox="0 0 1440 96" fill="#fff" xmlns="http://www.w3.org/2000/svg">
				<path d="m0 96 80-5.3C160 85 320 75 480 64s320-21 480-21.3c160 .3 320 10.3 400 16l80 5.3V0H0v96Z"></path>
			</svg>
			<section id="design" class="red">
				<h2>Design Process</h2>
				
				<div class="chunk">
					
					<div id="research">
						<h3>Scope Research</h3>
						<p>Meeting with stakeholders</p>
						<p>Immersion with clincians</p>
						<p>User interviews</p>
					</div>

					<div id="usability">
						<h3>Usability Testing</h3>
						<p>Task based usability testing</p>
						<p>Eye tracking studies</p>
						<p>Time based efficiency testing</p>
						<p>Preference Testing</p>
					</div>

					<figure class="column-span">
						<img src="images/timeline_prototype.png" style="border-radius:100%;" width="100%/">
					</figure>

				</div>
				
				<div id="wireframing">
					<div >
						<h3>Prototype Iteration</h3>
						<p>Daily & Weekly Iterations for testing</p>
						<p>Presentation Specific Iterations</p>
					</div>
					
					<div class="chunk">
						<figure>
							<img src="images/timeline_sketches.png" width="100%/">
							<figcaption>Low fidelity wireframes</figcaption>
						</figure>

						<figure>
							<img src="images/timeline_iterations3.png" style="width:100%">
							<figcaption>High fidelity prototypes for testing</figcaption>
							
							<img src="images/timeline_iterations1.png" style="width:100%">
							<figcaption>High fidelity prototypes for presentation</figcaption>
						</figure>

					</div>
				</div>
			</section>
			<svg class="curve" preserveAspectRatio="none" viewBox="0 0 1440 96" fill="var(--red)" xmlns="http://www.w3.org/2000/svg">
				<path d="m0 96 80-5.3C160 85 320 75 480 64s320-21 480-21.3c160 .3 320 10.3 400 16l80 5.3V0H0v96Z"></path>
			</svg>

			<section id="results">
				<h2>Results</h2>
				<h3>Key Features</h3>
				<p>Navigation by time</p>
				<p>Color & Shape used to distinguish elements</p>
				<p>Bookmarking Important information</p>
				<p>Progressive Disclosure of pertinent information</p>
				<div class="chunk">
				
					<img src="images/timeline_events.svg">
					
					<img src="images/timeline_hovers.svg" style="width:100%">
				</div>
				<figure>
					<img src="images/timeline_final.svg" style="width:100%"/>
				</figure>
				<p style="text-align: center;max-width: 60rem;margin: auto;">Above is the finished product for the first enterprise release, the culmination of hundred of hours worked by myself, a team of talented developers, quality assurance folks, and expert physicians.</p>
			</section>
			
		<main>	
		
		
	<?php include 'footer.php';?>
	
	</body>
	
</html>
