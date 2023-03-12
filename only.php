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
						<h1> [Throbbing] Members Only </h1>
						<h3> Research </h3>
						<p> There are millions of podcasts out there in the universe these days and they handle broad ranges of topics. A local podcast group asked me to create a brand identity that would stand out from other podcasts, which required researching podcast cover standards as well as those specific to sex podcasts. </p>
						
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
						
						<p> I wanted to create a logo that played into expectations but also was different enough to stand out. I was also tasked with creating additional assets for various social media sites and starting up a website using wordpress.</p> 						
						
					</div>
				</div>
			
				<div class="col span_1_of_2">
					<div class="pic">
						<img src="images/research.png" width=100%/>
					</div>
				</div>
				
			</div>	
			
			
			<div class="group">
				
				<div class="col span_1_of_2">
					<div class="pic">
						<img src="images/avatars.png" width=100%/>
					</div>
				</div>

				<div class="col span_1_of_2">
					<div class="writ">
						<h3> Avatars </h3>
						<p> Part of the assets for the podcast were a set of avatars. This was to allow the Throbbers to keep private identities while still allowing listeners to associate a "face" with a name and voice. They were made in a simple graphical style but still capture the personalities of the members. Using color, clothing choice, and facial expression, I was able to create avatars that represent the real thing. Using Adobe Sketch I was able to capture fine facial details and accurate hair texture. </p>
					</div>	
				</div>

			</div>
			
			<div class="group">
				
				<div class="col span_1_of_2">
					<div class="writ">
						<h3> Logo Ideation </h3>
						<p> After brainstorming with the group and discussing the various ways sex can be represented subtly, I proposed using fruit as a focus point. </p>
						
						<img src="images/fruit.png" width=100%/>
						
						<p> Using illustrator I created a series of fruit vector images to use as the basis for logo iteration. They started a jumping off point that was followed by a typographic exploration, color variation, and different orientations. Working with my clients we were able come decide the strawberry was the best fruit to represent the female focus of the podcast. </p> 
						
						<p> Iterating on the strawberry shape to create something that would stand out on a screen filled with podcasts, required moving away from the standard square. I moved towards a higher contrast variation so as to take advantage of the gestalt principle of closure, which allowed for a compelling non-square shape that fits into a square. Moving into the higher contrast space meant fitting the typography into the shapes so that it would keep legibility. </p> 						
						
						<p> The resulting image used a darker red shade to keep in mind the standards of the podcast subject, but also is consistent with expectations of strawberries. Using this dark red combined with the dynamic figure ground and casual typeface created a logo that captured the goals and personality of [Throbbing] Members Only.</p> 
					</div>
				</div>
			
				<div class="col span_1_of_2">
					<div class="pic">
						<img src="images/logos.png" width=100%/>
					</div>
				</div>
				
			</div>	
			
			<div>
				
			<div class="writ">	
				<img src="images/podcast.png" width="100%"/>
				<p class="link">Click below for a listen</p>
				
							<a class="button" style="margin: auto; margin-bottom: 30px;" href="http://throbbingmembersonly.com">Podcast</a>
			</div>
			
			</div>
		</div>	
		
		
	<?php include 'footer.php';?>
	
	</body>
	
</html>
