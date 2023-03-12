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
						<h1> Crowned </h1>
						<h3> The Succession of the British Monarchy </h3>
						<p> My final task at the University of Minnesota was to complete a thesis project on a subject of my choice. I choose to try and explain the succession patterns of the British Monarchy. I minored in history, and studied abroad in Scotland, where I studied Scottish and Celtic history. While I was there I tried to understand how the monarchs I was learning about in class were related to each other, and discovered it was a challenge to find comprehensive information. I wanted create a website that would allow people with similar interests as me learn more about these monarchs.</p>

						<p>The thesis program is divided into two parts: writing and exhibition. During the first semester, I spent time reading books and using online family trees to understand how the succession worked. I also endeavored to learn more about the women that are forgotten in the passing of time. Women who had an important impact on the path of the monarchy. The culmination of this research was a paper, or more accurately two papers, that I transformed into a book. This transformation allowed for me to begin thinking about my design decisions that would eventually be applied to my final project.</p>

						<p>The second semester was spent creating a thesis project which used this research as a base. While my project veered away from a strictly female filter, the information learned during the writing semester did not go to waste. A combination of image creation and html/css/jquery coding created this site. Using the design skills that I'd spent the previous four years learning, I attempted to create a site which organizes these historical figures into an easily understandable website. I used color to unify countries, dynasties, and family succession. I also made sure to include information about my design decisions, and my learning process on the help page of the website. I recommend going there to learn more. I created a site that allows you to trace lineages across dynasties, to understand the relationships that allowed for succession, and gives concise information about each monarch.</p>

						<p>This long term project may be a work in progress but something I'm incredibly proud of. Thank you for taking a look.
</p>


						<p class="link">Click below for a look at the complete site, or see a copy of the thesis book.</p>
							<a class="button" style="margin: auto; margin-bottom: 30px;" href="http://yvonnermuller.com/crowned/index.html">the Site</a>
							<a class="button" style="margin: auto; margin-bottom: 30px;" href="http://yvonnermuller.com/images/uncrowned.pdf">the Book</a>					
					
					</div>
				</div>
			
				<div class="col span_1_of_2">
					<div class="pic">
						<img src="images/crowned_1.svg" width="100%"/>
						<img src="images/crowned_2.svg" width="100%"/>
					</div>
				</div>
				
			</div>	
			
			
		</div>	
		
		
	<?php include 'footer.php';?>
	
	</body>
	
</html>
