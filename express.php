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
	
		<?php include 'header.php';?>
			
		<?php
		if($fullAccessEnabled) { echo ""; }
		else { echo ""; }
		?>
		
		<main>
				
			<section class="chunk half">
				
				<div>
					<h1>Express Dispo</h1>
					<h3>Speeding up a speedy Epic systems process</h3>
					<p>Emergency care needs to be quick. Decreasing the time it takes for patients to be processed and moved on, either out of the hospital or to another department, makes for better outcomes for them. The goal of this project was to take an already consolidated process and incorporate hierarchy and smart groupings to improve effeciency, clinician workflow, and quality of patient care.</p>
					<p class="list-header">Issues</p>	
					<ul>
						<li>patient issues take the same amount of time regardless of simplicity of treatment or severity</li>
						<li>limited information hierarchy</li>
						<li>progress is unclear</li>
					</ul>
				</div>
			
				<aside>
					<figure class="feature">
						<img src="images/dispo_wireframe2.svg" width="100%"/>
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
					</div>

					<div id="usability">
						<h3>Usability Testing</h3>
						<p>Task based usability testing</p>
						<p>Compare current to proposed mockup prototypes</p>
						<p>Hundreds of real user participants</p>
					</div>

					<figure class="column-span">
						<img src="images/dispo_notes.png" style="border-radius:100%;" width="100%"/>
					</figure>
				</div>
				
				<div id="wireframing" class="chunk">
					<div >
						<h3>Wireframing</h3>
						<p>Slight variation in current process</p>
						<p>Large variation in current process</p>
						<figure>
							<img src="images/dispo_wireframes.png" width="100%"/>
							<figcaption>Initial sketches</figcaption>
						</figure>
					</div>
					
					<div>
						<figure>
							<img src="images/dispo_wireframe1.svg" width="100%"/>
							<figcaption>High fidelity mockup of simple variation for testing</figcaption>
						</figure>

						<figure>
							<img src="images/dispo_wireframe2.svg" width="100%"/>
							<figcaption>High fidelity mockup of major variation for testing</figcaption>
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
				<div>
					<img class="shadow" src="images/ChartStatus.svg" width="100%"/>
					<p>Chart Status allows for clinicians to see progress of their patient's process. When given the entire width of the screen, chart status is easy to parse, and visual weight is given to the items that need addressing.</p> 
				</div>

				<div class="chunk">
					<div class="column-span" style="margin-top:0;">
						<img src="images/SmartSets.svg" width="100%"/>
						<p>"Smart Sets" allow organizations to pre-create the proper documenation and orders for patients based on symptoms</p>
						<p>Integrating "Smart Sets" via an "Express Lane" feature allows for more efficient patient processing through the Emergency department by suggesting relevant "Smart Sets" to the clinician</p>
						<p>Hover bubbles allow secondary information to be reviewed quickly and marked as such to reach patient safety regulations</p> 
						
						<figure class="chunk">
							<img src="images/Workup_hover.svg" width="100%"/>
							<img src="images/Triage_hover.svg" width="100%"/>
						</figure>
					</div>
				
					<figure>
						<img class="shadow" src="images/Note.svg" width="100%"/>
					</figure>

				</div>				
				
				<div>
					<img class="shadow" src="images/Ready_to_go.png" width="100%"/>
					<p>The bottom bar of the screen allows for clinicians to quickly share their documentation and mark the patient as ready to leave the hospital.</p>
				</div>

			</section>

			<img src="images/Dispo_final.png" width="100%"/>

		</main>

	<?php include 'footer.php';?>
	
	</body>
	
</html>
