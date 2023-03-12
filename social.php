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
						<h1> Client Plan </h1>
						<h3> Presentation Preparation </h3>
						<p> Epic Systems has a large scale conference for customers and clients. There's one primary presentation for 12,000 guests, but also each application has smaller presentations to get into the finer details of their path forward. I helped contribute to the main presentation as well as three applications' more detailed presentations. One of these presentations included several projects that I had been the exclusive user experience designer for and as the presentation preparation continued I wanted to try a different mockup technique. For my final project of the conference I made a prototype of a client plan using HTML and CSS instead of Illustrator. </p>	
						
						<p>Working with a certified Social Worker and the developer Product Lead, we hammered out the details of what we wanted to show our customers. The future of health care in the United States is moving towards a more inclusive and holistic approach; Social Care is the beginning of that. Paying attention to life events, family, friends and how they impact overall health and wellbeing, Social Care creates a series of goals and tasks that help the patient.</p>				
					
					</div>
				</div>
			
				<div class="col span_1_of_2">
					<div class="pic">
						<img src="images/clientplan_sketch.jpg" width="100%"/>
					</div>
				</div>
				
			</div>	
			
			<div class="group">
				
				<div class="col span_1_of_2">
					<div class="pic">
						<img src="images/clientplan_1.png" width="100%"/>
					</div>
				</div>
			
				<div class="col span_1_of_2">
					<div class="writ">
						<h3> HTML mockup </h3>
						<p> As a group we researched possible scenarios that would present all the facets of our vision for Social Care, and came up with detailed life events, social network, care team, and goals. Then the rest fell on me to bring to life for the presentation to customers. </p>
						
						<p> Working in HTML and CSS I created a series of cards that included our strategized presentation aspects. I used the style guide the 15 person User Experience team at Epic had been strategizing for the last two years as a starting point. <p>	
						<p> The Social Network and Care team were designed to be visually appealing but also easy to read quickly to find pertinent information. Using portraits added quite a bit of visual interest. Using the brightly colored dots to added visual interest as well as distinction between the social distance of the network members. The names and information were grouped in easily to parse chunks to help with understanding, using the pictures to help this grouping.</p>		
							
				</div>
				
			</div>	
			
			
		</div>	
		
			<div class="group">
				
				<div class="col span_1_of_3">
					<div class="pic">
						<p> Setting goals for patients in a social care health track requires patient involvement more than typical western medicine. As it involves their everyday life and habits, its good to have patients plan their own goals to be incorporated into the client plan.</p>
						<p> As part of this project we wanted to really call attention to this aspect of patient care, using a larger font size and color. It was important for the presentation to call attention but also because it's helpful for the health worker to be able to differentiate the patient's personal goals from the directive goals of the plan.</p>
						<img src="images/clientplan_2.png" width="100%"/>
					</div>	
				</div>
			
				<div class="col span_1_of_3">
					<div class="pic">
						<p> In order to meet the goals set in the client plan a care provider and patient set achievable specific tasks, frequently with set due dates. We wanted these to be easy to parse for completion as well as filterable. This makes it easy for a social worker to keep track of the tasks and their progress. </p>
						<p> As part of the presentation story we showcased tasks that had both specific and non-specific due dates. We didn't showcase anything that was close to due or overdue in an effort to keep the tone of the presentation as light as possible. When dealing with social work its common to have very serious, and frequently depressing patient stories. The tone of the event is uplifting and hopeful, how software can pave a new and improved way forward, so we tried to curate stories that can fit this theme while still being authentic. </p> 
						<img src="images/clientplan_3.png" width="100%"/>
					</div>
				</div>
				
				<div class="col span_1_of_3">
					<div class="pic">
						<p> One of the most important aspects of client care are the major events in the patients life. In standard medical treatment, those have been the medical events such as medications, office visits, relevant medical treatments. However, social care is fully encompassing. It acknowledge that non medical events have impact on our health. Everything from losing your keys to the death of a family member should be acknowledged in the treatment of patients on a social care track.</p>
						<p> The timeline standards I'd been cultivating and developing for the last several months I incorporated into this timeline widget that we used in this social care presentation but also in several other presentations. Patient timeline's are a burgeoning movement to display patient information in the industry. They help to give context. We used bright colors and visual hierarchy to prioritize different events. Larger icons, and more color drew the eye to important events like rehab. Desaturation and less visual weight gives less importance to losing keys than the death of the patient's wife.</p>
						<img src="images/clientplan_4.png" width="100%"/>
					</div>
				</div>
				
			</div>
			
			<div class="group">
				<img src="images/clientplan.png" width="100%"/>
			</div>
			
	<?php include 'footer.php';?>
	
	</body>
	
</html>
