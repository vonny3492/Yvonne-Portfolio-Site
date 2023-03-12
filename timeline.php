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
	
	<?php
	if($fullAccessEnabled) { echo ""; }
	else { echo ""; }
	?>
	
	<?php include 'header.php';?>
		
		<div id="container">
			
			
			<div class="group">
				
				<div class="col span_1_of_2">
					<div class="writ">
						<h1> Lifetime </h1>
						
							<p> Understanding who your patient is and what they've gone through is a hugely important aspect of diagnosis and care. Especially in Ambulatory or Primary care medicine, knowing your patient's medical history can help you to better treat them, and better understand how different medications will affect them. As a team we wanted to create software that allowed Primary Care Providers to quickly visualize what their patients might need in the course of treatment. </p>
							
							<br />
							
						<h3> Ideation </h3>
						<p> I began sketching and ideating on this project as an intern at Epic. I then began the process anew as a full time employee. Both instances of ideation were predated by user interviews conducted by me and my teammates. We interviewed primarily Family Physicians familiar with Epic software, and used the internship prototype as a jumping off point on the new branch of the project: Lifetime.
</p>
						<p>Lifetime was created to fill a need amongst physicians but also to work in harmony with the hundreds of pieces of Epic's Enterprise software. To give physicians a high level understanding of their patient, Lifetime needed to be a visual representation of a patient's medical history, properly encompassing all relevant medical events as well as problems and medications they'd have over the course of their life. It needed to do this, but also couldn’t conflict with the standards in other Epic software, as well as be able to integrate with the original branch, Timeline, which housed the more minute data in a patient's history.</p>
						
						<p>During the ideation phase we wrestled with the complex issues coming into play. I had figure out how to show multiple different encounter types on a timeline that was discernible in large time ranges; how to display medications and their groupings in a way that was clear and concise to the user but didn't lead to any patient safety issues; how to display the beginning and end of problems knowing they aren't the most well documented in the busy field of general practice medicine. Countless issues were brought into play, and usability testing was necessary to properly vet our solutions.</p>
					</div>
				</div>
			
				<div class="col span_1_of_2">
					<div class="pic">
						<img src="images/timeline_sketches.png" width=100%/>
					</div>
				</div>
			
			</div>	
			
			
			<div class="group">
				
				<div class="col span_1_of_2">
					<div class="pic">
						<img src="images/timeline_prototype.png" width=100%/>
					</div>
				</div>
			
				<div class="col span_1_of_2">
					<div class="writ">
						<h3> Usability Testing </h3>
						<p>As a team we designed and facilitated a multifaceted usability testing strategy. As design lead on the project I was given the task of approving all suggested usability tests and recommending additional studies based on solutions that needed further analysis. We used a combination of user interviews, task based testing, preference testing, time and efficiency task testing, and eye tracking studies.</p>
						<p>The repeat of user interviews really helped to flesh out ideas that we had been tossing around by gaining a real end user perspective. All other studies helped us decide which direction to take the project in. We need to know what styles and patterns we were using were helpful and which ones lead to confusion. Considering the dire consequences of a physician misunderstanding the components of Timeline, we put quite a bit of emphasis on safety.</p>
					</div>
				</div>
			
			</div>
			
			
			<div class="group">
				
				<div class="col span_1_of_2" >
					<div class="writ">
						<h3> Iteration </h3>
						<p> As design lead my primary directive was to create mockups and update those mockups. As we iterated on the design, the iterations were shared with our development team to create prototypes and the eventual final software for release. We iterated on a weekly, and some times daily basis, trying out new patterns and solutions. As we were nearing the end of the initial release cycle most of our iteration was done in the prototype, working directly with our exceptional team of developers.</p>
						<img src="images/timeline_iterations3.png" style="width:100%"/>
						<img src="images/timeline_iterations4.png" style="width:100%"/>
						<p></p>
					</div>
				</div>
			
				<div class="col span_1_of_2" >
					<div class="pic writ">
						<img src="images/timeline_iterations1.png" style="width:100%"/>
						<img src="images/timeline_iterations2.png" style="width:100%;"/>
						<p>We also had many instances where we needed to present our progress to various groups. The state and progress of the project had to be shown to the development and project leads, as well as Epic’s Development Council, a group of lead developers from across all areas of Epic’s software who vet newer and more experimental projects. We also had several conference calls with interested parties at various hospitals across the country, giving them an opportunity to get excited about the project. During these meetings and interactions we used a combination of static mockups created by me and functional prototyping worked on by the team.</p>
						
					</div>
				</div>
			
			</div>
			
			
			<div class="group">
				
				<div class="col span_1_of_2" >
					<div class="pic">
						<img src="images/timeline_hoversketches.png" width="100%"/>
						<p></p>
					</div>
				</div>
			
				<div class="col span_1_of_2" >
					<div class="pic writ">
						<h3> Progressive Disclosure </h3>
						<p>One of the most important aspects of this project was allowing our users to delve deeply into the patient's details. We wanted to take advantage of progressive disclosure, showing the patient's information at a high level, being able to see how large picture items interacted with each other. But also allowing them to see the details of those high level items; what specifically was the patient visiting the specialist to see? What was the dosage of their pain medication? How long were they being treated for cancer prior to remission?</p>
						<p>We had a some great focus group meetings with several different specialities of physician to establish what was the most important aspect of a visit. We made the functional prototype and confirmed those assumptions with usability testing.</p>
						<img src="images/timeline_events.svg"/>
					</div>
				</div>
			
			</div>
			
		<div class="group">
				
				<div class="col span_1_of_2" style="width:30%">
					<div class="writ">
						
						<p>Medications, problems, patient history, and all other items on the timeline have the ability to “Hover and Discover”. We wanted these hovers to be useful but not over informational. This gives medical professionals a hint of the patient story to help them decide if they need to learn more, to delve deeper.</p>
						<p>I created a consistent typographic hierarchy for all the different hovers. We also had to make sure that the styles we chose would work for different character lengths and the layouts were compatible across different specialties. Would a physician working in a hospital be able to parse the layout of the medicines in a family practice setting?</p>
						<p>The progressive disclosure also meant that we created a way users could delve even deeper into the patient's details. In all the hovers are links to the more detailed reports and notes that doctors, nurses, and other medical staff have made on behalf of the patient. We designed this to open in a report or send the user to the activity where this information was documented.</p>				
					</div>
				</div>
			
				<div class="col span_1_of_2" style="width:65%">
					<div class="pic writ">
						<img src="images/timeline_hovers.svg" style="width:100%"/>
					</div>
				</div>
			
			</div>
			
			<div class="group">
				<div class="pic writ">
					<h3>Released Version</h3>
					<p>While the inherent nature of Enterprise software, and medical software, is that it's constantly being updated and improved to keep up with the fast progress rate of the industry, we still had a release schedule to keep to. Below is the finished product for that release, the culmination of hundred of hours worked by myself, and a team of talented developers, quality assurance folks, and expert physicians.</p>
					<img src="images/timeline_final.svg" style="width:100%"/>
				</div>
			</div>
			
		</div>	
		
		
	<?php include 'footer.php';?>
	
	</body>
	
</html>
