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
				
				<div class="col span_1_of_3">
					<div class="writ">
						<h1> Alice Through the Looking Glass </h1>
						<h3> Process </h3>
						<p> I already had an idea of what I thought Alice's story was and how it was meant to be perceived having read it a handful of times and been exposed to, for years, by popular culture. However, through an illustrated analysis followed by deconstruction of the illustrations juxtaposed with moving excerpts of the text, I discovered a new way of seeing the book and how it could be styled.</p>
						
						<p>Using my favorite passage from the novel, I crafted a series of videos capturing the eccentricity of the passage. I wanted to bring visually to the viewer a sense of absurdity that is so carefully crafted by Lewis Carrol. 
						
					</div>
				</div>
			
				<div class="col span_1_of_3">
					<div class="pic">
						<img src="images/walrus.png" width=100%/>
					</div>
				</div>
				
				<div class="col span_1_of_3">
					<div class="pic">
						<img src="images/alice.png" width=100%/>
					</div>
				</div>
			
			</div>	
			
			
			<div class="group" style="padding: 2%">
				
					<video width="100%" controls>
						<source src="video/walrus.mp4" type="video/mp4"/>
					</video>
			
			</div>
			
			<div class="group">
				
				<div class="col span_1_of_2"> 
					<div class="pic">
						<img src="images/alice_sketches.png" width="100%"/>
					</div>
				</div>
				
				<div class="col span_1_of_2">
					<div class="writ">
						<h3> Sketching it out </h3>
						<p> While I knew the mood and feeling I wanted to have, and even some of the elements, I still needed to hash out the specific layout and placement of those elements.</p> 
					</div>
					
				</div>
				
			</div>
			
			<div class="group">
				
				<div class="col span_1_of_2">
					<div class="writ">
						<h3> Book Design </h3>
						<p> Using InDesign to create a grid and a typographic hierarchy, I was able to bring to life my analysis through illustration and movement. I wanted to create something that was elegant and readable but also fun and whimsical. Using an analogous color palette for my accents but black text for my body, allowed for a compelling but very legible read. I decided to use the simple san-serif, Glode, to give a more modern feel to the body font of this classic story. Using Homestead and Eterea for the title fonts gave visual weight to the chapter headers, and their juxtaposition on the cover creates a sense of eccentricity.</p>
						
						<p> Along with the typographic and color choices, I used animation to create the whimsical feel I wanted to achieve. A slight fluttering of wings or leaves or moustaches (a viewer interpretation decides their form) on every chapter opener, allows for a fun visual but doesn't over power to distract from reading the story. The caterpillar inching up the margins reveals the title of the book on every spread, as a reference to the first book where Alice encounters a philosophical insect. The complex animations on the opening pages, engages readers on pages they tend to over look such, as the publishing information.</p>
						
						<p>Using this myriad of design techniques I tried to capture the essence of the Carroll story and create something that allows adults to relive the joy of a childhood book in a style that grew up with them.</p> 
						
						<p class="link">Click below for the interactive book</p>
				
							<a class="button" style="margin: auto; margin-bottom: 30px;" href="video/alice.html">Ebook</a>
					
					</div>
				</div>

				<div class="col span_1_of_2">
					<div class="pic">
						<img src="images/alice_ipad.png" width=100%/>
					</div>
				</div>
				
				
			
			</div>	
			
		</div>	
		
		
	<?php include 'footer.php';?>
	
	</body>
	
</html>
