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
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/yew.css" />
		<link rel="stylesheet" href="css/grid.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="images/favicon.png" href="favicon.ico" />
		<script type="text/javascript" src="js/jquery.min.js"> </script>
		<script type="text/javascript" src="js/script.js"> </script>
		<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:600,700, 600italic' rel='stylesheet' type='text/css'>
		
		<title>Yew: Yvonne R Muller</title>
	</head>
	
	<body>
	
	
	
	<?php include 'header.php';?>
		
	<?php
	if($fullAccessEnabled) { echo ""; }
	else { echo ""; }
	?>
		
		<div id="container">
			
			
			<div class="group">
				
				<div class="col span_1_of_2">
					<div class="writ">
						<h1> Express Dispo </h1>
						<h3> Speeding up a speedy process </h3>
						<p> Emergency care needs to be quick. Whether the patient is in dire and pressing need for care, or if they have a smaller issue, the faster a patient can be taken care of and out of the Emergency Department the better for everyone. Decreasing the time it takes for patients to be processed and moved on, either out of the hospital or to another department, makes for better outcomes for them.</p>
						<p> At Epic the disposition and discharge process has already been condensed and centralized to a single page, but there were ways to speed that up, and improve patient outcomes. I wanted to take what was a simple chunking of information, and turn it into a smart chunking of information. I pulled relevant pieces together and reorganized the layout to put prominent pieces on the top, and gave a typographic hierarchy to the cards. The result was a new way to view a patient's final care assessment that didn't change what physicians were comfortable with.</p>		
					
					</div>
				</div>
			
				<div class="col span_1_of_2">
					<div class="pic">
						<img src="images/dispo_notes.png" width="100%"/>
					</div>
				</div>
				
			</div>	
			
			
			<div class="group">
				
				<div class="col span_1_of_2">
					<div class="pic, writ">
						<img src="images/dispo_wireframes.png" width="100%"/>
						<p> We ended up with two paths forward. One was more inline with the past versions of the disposition activity. We planned to streamline the content in all the cards and incorporate some valuable typographic hierarchy. The other was a larger alteration, moving some content out the cards and into top and bottom sections that are visible at all times in the activity. These spaces would have content that aided in finishing a patient's care and tracking the user's progress through patient documentation.</p>
						<p>After meeting with our physician and product lead we decided to try both and usability test them at our big user exhibition.</p>
					</div>
					
				</div>
			
				<div class="col span_1_of_2">
					<div class="writ">
						<h3> Wire-framing </h3>
						<p> After several meetings discussing the goals of the project it was time to start ideating, and then wire-framing, to show to our physicians and product lead the direction we were hoping to take the project. </p>	
						
						<img src="images/dispo_wireframe1.svg" width="100%"/>
						<img src="images/dispo_wireframe2.svg" width="100%"/>
					</div>
				</div>
				
			</div>	
			
			<div class ="group, pic, writ">
			
			<h3> Key changes for Express Dispo</h3>
				<img src="images/Ready_to_go.png" width="100%" style="padding-bottom: 1%; padding-top: 1%; box-shadow: 1px 1px 10px rgba(0, 0, 0, .25);"/>
				<p> For the major alteration version of Dispo, the bottom bar of the screen allows for physicians to quickly share their documentation, as well as mark the patient as ready to leave the hospital. These steps set in motion the steps to help the patient get out of the hospital as quickly as possible. </p>
				
				<img src="images/ChartStatus.svg" width="100%" style="padding-bottom: 1%; padding-top: 1%;"/>
				<p style="padding-bottom: 5%;"> We also altered Chart Status. Chart Status allows for physicians to see quickly what's left to accomplish to help get the patient quickly through the process. In the original version it was chunked in a card and forced to fit in a way that didn't best suit the information. When given the entire width of the screen, chart status is easy to parse, and visual weight is given to the items that need addressing. Hover bubbles (visible below) allow users to act on unfinished items. </p> 
			</div>
			
			<div class="group">
			
				<div class="col span_1_of_3">
					<div class="pic">
						<img src="images/SmartSets.svg" width="100%"/>
						<p> As part of the accelerated process of discharging a patient, we provided system generated auto fills as well as the structure to have organizations create their own "Smart Sets" to auto fill documentation. The software automatically presents the most likely Smart Sets based on the already filled out patient documentation.</p>
						<p> Smart Sets pull in standard discrete documentation but also can pull in prose like notation. If the doctor has a certain style of documentation Epic can pull that into the dispo as well. I tried to create styles that will work well on the digital screen but also translate well to black and white printers.</p>
						
						<p> Lastly the hover bubbles that allow users to quickly gather what information they are missing and what needs to be reviewed. We wanted this to be a usable hover bubble, not just informational. The button in the hover allows users to quickly review pertinent information and mark it as reviewed to meet important patient safety regulations.</p> 
					</div>	
				</div>
			
				<div class="col span_1_of_3">
					<div class="pic">
						<img src="images/Note.svg" width="100%"/>
					</div>
				</div>
				
				<div class="col span_1_of_3">
					<div class="pic">
						<img src="images/Workup_hover.svg" width="100%"/>
						<img src="images/Triage_hover.svg" width="100%"/>
					</div>
				</div>
				
			</div>
		
			<div class="group, pic">
				<h3> Usability Testing </h3>
				<p> For usability testing we compared what was currently being used in Epic's software to the mockup I created below. We did task based testing where hundreds of users were able to "dispo" a patient from the emergency room, each user having the same tasks but were randomly given a different Dispo activity, the current Epic version and the idealized mockup. </p>
				<img src="images/Dispo_final.png" width="100%"/>
			</div>
			
		</div>	
		
		
	<?php include 'footer.php';?>
	
	</body>
	
</html>
