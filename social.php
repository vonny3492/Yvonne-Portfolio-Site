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
					<h1>Client Plan</h1>
					<h3>Holistic Healing with Epic systems</h3>
					<p>The future of health care in the United States is moving towards a more inclusive and holistic approach. Social Care is incorporating life events, family, friends into a patient's health plan. Social Care creates a series of goals and tasks that help the patient outside of traditional Western medicine.</p>
					<p class="list-header">Goals</p>	
					<ul>
						<li>showcase patient's support network</li>
						<li>actionable task list</li>
						<li>understanding major patient life events</li>
					</ul>
				</div>
			
				<aside>
					<figure class="feature" >
					<img src="images/clientplan_1.png" width="100%" style="object-position: top;"/>
					</figure>
				</aside>
				
			</section>

			<svg class="curve" preserveAspectRatio="none" viewBox="0 0 1440 96" fill="#fff" xmlns="http://www.w3.org/2000/svg">
				<path d="m0 96 80-5.3C160 85 320 75 480 64s320-21 480-21.3c160 .3 320 10.3 400 16l80 5.3V0H0v96Z"></path>
			</svg>
			<section id="design" class="red">
				
				<div class="chunk">
					<div>
						<h2>Design Process</h2>
						<p>Stakeholder Interviews</p>
						<p>Creating Functional HTML Prototype</p>
						<p>Focus Group Review</p>
					</div>

					<figure>
						<img src="images/clientplan_sketch.jpg" width="100%" style="border-radius:100%; filter: brightness(1.5) hue-rotate(-160deg);"/>
					</figure>
				</div>
			</section>
			<svg class="curve" preserveAspectRatio="none" viewBox="0 0 1440 96" fill="var(--red)" xmlns="http://www.w3.org/2000/svg">
				<path d="m0 96 80-5.3C160 85 320 75 480 64s320-21 480-21.3c160 .3 320 10.3 400 16l80 5.3V0H0v96Z"></path>
			</svg>

			<section id="results">
				<h2>Results</h2>
				<h3>Key Features</h3>
				<div class="chunk">
					
					<div class="pic">
						<h4>Trackable Flexible Goals</h4>
						<p>Visually differentiate personal from directed care plan goals</p>
						<p>Easy to parse</p>
						<p>Task assigner obvious</p> 
						<img src="images/clientplan_2.png" width="100%"/>
					</div>

					<div class="pic">
						<h4>Small Steps to Big Goals</h4>
						<p>Ability to set flexible tasks to achieve larger goals</p>
						<p>Clear ownership and due dates</p>
						<p>Filtering for easy organizing</p>	
						<img src="images/clientplan_3.png" width="100%"/>
					</div>
					
					<div class="pic">
						<h4>Timeline of Events</h4>	
						<p>Visual hierarchy to establish importance</p>
						<p>Distinction between medical and other event types</p>
						<p>Color and shape create visual groupings</p>
						<img src="images/clientplan_4.png" width="100%"/>
					</div>

				</div>

				<figure>
					<img src="images/clientplan.png" width="100%"/>
				</figure>
			</section>

			
	<?php include 'footer.php';?>
	
	</body>
	
</html>
