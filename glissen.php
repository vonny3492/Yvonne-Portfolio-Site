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
						<h1> Glissen </h1>
						<h3> Audience and Name </h3>
						<p> To create the identity of my sparkling cider, I delved into who I wanted it to serve and the emotions I wanted to capture. I wanted it to mean something to people, to tap into their happiest feelings put them in the mood to celebrate. Using a combination of word association and flowcharting to begin the process and the generating a mood board to finalize my ideas, I discovered a brand identity that was fun and footloose. I named the product Glissen. </p>
						<img src="images/brand.png" width=100%/>
					</div>
				</div>
			
				<div class="col span_1_of_2">
					<div class="pic">
						<img src="images/flowchart.png" width=100%/>
					</div>
				</div>
				
			</div>	
			
			
			<div class="group">
				
				<div class="col span_1_of_2">
					<div class="pic">
						<img src="images/wordmark_ideation.png" width=100%/>
					</div>
				</div>

				<div class="col span_1_of_2">
					<div class="writ">
						<h3> Ideation </h3>
						<p> Using the brand identity I created I iterated on wordmark ideas, and delved into the typography of that word mark. I wanted to pick a font that toed the line between elegant and playful.</p>
						<p>I landed on Parisish, a font that was refined with strong straight lines but had some soft curves. I wanted to use the double-story lowercase g instead of the single that came with Parisish so I used the foundations of the font to create a new g, one that fit the brand. </p>
						
						<img src="images/parisish.png" width="100%"/>
						
					</div>	
				</div>

			</div>
			
			<div class="group">
				
				<div class="col span_1_of_2">
					<div class="writ">
						<h3> Packaging Ideation and iteration </h3>
						<p> Using fireworks, wind, and plant seeds as inspiration I created a logo that fit into the brand identity of Glissen. Fireworks a physical representation of celebration. Wind is a whimsical thing, and plant seeds enjoy the ride, just like people enjoy a celebration, are buoyed by it. I originally used a color palette of fire but as I delved deeper I realized I wanted colors that matched the flavors. I ended up using a red based palette for the apple flavor and a teal based palette for the pear flavor. </p>
						
						<img src="images/packaging_ideation.png" width=100%/>
						
					</div>
				</div>
			
				<div class="col span_1_of_2">
					<div class="pic">
						<img src="images/packaging_iteration.svg" width=100%/>
					</div>
				</div>
				
			</div>	
			
			<div class="group">
				
				<div class="col span_1_of_3">
					<div class="pic">
					<img src="images/glissen2.jpg" width=100%/>
					<img src="images/glissen1.jpg" width=100%/>
				</div>
				</div>
			
				<div class="col span_1_of_3">
					<div class="writ">
					<h3> a non-alcoholic beverage for everyday celebrations </h3>
					<p> I wanted to design a beverage that captured the joyfulness of celebrating. No matter if the celebration is big, like a graduation, or a little smaller, like when you finally finished coding a website.</p>
					<p> Glissen is marketed towards the uninterested in alcohol (be they young or be they old) so the packaging had to be both fun and sophisticated, in order to appeal to the wide age range. </p>
					<p> Glissen comes in two delectable flavors: "Sparkling Apple Soiréee" and "Sparkling Pear Partaaay."</p>
				</div>
				</div>
			
				<div class="col span_1_of_3">
					<div class="pic">
					<img src="images/glissen3.jpg" width=100%/>
					<img src="images/glissen4.jpg" width=100%/>
				</div>
				</div>
				
			</div>	
			
		</div>	
		
		
	<?php include 'footer.php';?>
	
	</body>
	
</html>
