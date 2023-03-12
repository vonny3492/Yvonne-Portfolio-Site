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

<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/yew.css" />
		<link rel="stylesheet" href="css/grid.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="images/favicon.png" href="favicon.ico" />
		<script type="text/javascript" src="js/jquery.min.js"> </script>
		<script type="text/javascript" src="js/script.js"> </script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:600,700, 600italic' rel='stylesheet' type='text/css'>
		
		<title>Yew: Yvonne R Muller</title>
	</head>
	
	<body>

		<?php include 'header.php';?>
		
		<div id="container">
		
		<!-- <a class="button pass" style="width:200px; margin-bottom:1%;" onclick="launchAuth()">Enter Passcode</a> -->
	
		<!--Timeline-->	
		<?php
		if($fullAccessEnabled) { ?>
	
			<div id="timeline" class="section group">
			
	
			<div class="col span_1_of_2">
				<div class="writ protect">
					<h1> Timeline </h1>
					<h2> A lifetime view</h2>
					<p>  The patient's medical history displayed in a comprehensive, chronological, and interactive web software program. A long term group project, establishing innovative ways to make medical decisions.</p>

					<a class="button" href="timeline.php">More Info</a>

				</div>
			</div>
			
			<div class="col span_1_of_2">
				<div class="pic protect">
					<img src="images/timeline_context.png" width=100%/>
				</div>
			</div>
			</div>	
		
		<?php } else { ?>
	
		<!-- put dummy card content here for secrets -->
		<div class="section group protected">
	
			<div class="col span_1_of_2">
				<div class="writ protect">
					<h1> Timeline </h1>
					<h2> ᛋᚻᚼ ᛄᛛᛟ ᛅᛔᛦᛯᛃᛂᚻᛛᛕ</h2>
					<p> ᚯᚵᚾᛆᚿ ᚫᚥᛑᛝ ᛨᛩᛩᛛᛊᛃ ᚻᚼ ᚵᚶᚾᛋᛊᚺᛝᛏᛐ ᛅᛔᛦᛯ ᛥᛯᛌᛏᛐ ᚿᚸᚱ ᚱᚮᚯᚣ ᚣ ᚪᚫᛎ ᛈᚷ ᚪᚸᛔᛜᛒ ᛓᚠᚡ ᚿᛇᚾ ᚰᛛᛜᛞ ᛜᛛᛜ ᛄ ᚶᚱᛇ ᚤᚫᚸᛇᛖᛗᛯᛮᛮᛥ. </p>
					<p class="smallcaption"> This project is under a confidentiality agreement, email me for a passcode </p>
				</div>
			</div>
			
			<div class="col span_1_of_2">
				<div class="pic protect">
					<img src="images/locked.png" title="This project is protected under a confidentiality agreement, email me for a passcode" width="100%"/>
				</div>
			</div>
			</div>	
		
		<?php } ?>
		
		<!--Alice-->	
			<div id="alice" class="section group">
			
			<div class="col span_1_of_2">
				<div class="writ">
					<h1> Alice Through the Looking Glass </h1>
					<h2> An animated Ebook </h2>
					<p> Alice's adventures are whimsical and fantastical. This book design combines readability and whimsy to capture the themes of the subject matter. </p>

					<a class="button" href="alice.php">More Info</a>
					
				</div>
			</div>
			
			<div class="col span_1_of_2">
				<div class="pic">
					<img src="images/alice7.jpg" width=100%/>
				</div>
			</div>

		</div>
		
		
		<!--Podcast-->	
			<div id="only" class="section group">
			
			<div class="col span_1_of_2">
				<div class="writ">
					<h1> [Throbbing] Members Only</h1>
					<h2> A podcast by non-experts for non-experts</h2>
					<p> An all inclusive branding project incorporating a logo, website, and various related assets. Embracing innuendo to create an identity uniquely appropriate for the intimate topics discussed.</p>

					<a class="button" href="only.php">More Info</a>
					
				</div>
			</div>
			
			<div class="col span_1_of_2">
				<div class="pic">
					<img src="images/only_context.png" width=100%/>
				</div>
			</div>
			
		</div>
		
		
		<!--Glissen-->	
			<div id="glissen" class="section group">
			
			<div class="col span_1_of_2">
				<div class="writ">
					<h1> Glissen </h1>
					<h2> A non-alcoholic beverage</h2>
					<p> Designed to capture the joyfulness of celebrating. Appealing to a wide age range with both fun and sophistication. </p>
					
					<a class="button" href="glissen.php">More Info</a>
				
				</div>
			</div>
			
			<div class="col span_1_of_2">
				<div class="pic">
					<img src="images/glissen_context.png" width=100%/>
				</div>
			</div>

		</div>
		
		
		<!--Social Care's Client Plan-->	
		<?php
		if($fullAccessEnabled) { ?>
			<div id="social" class="section group">
			
			<div class="col span_1_of_2">
				<div class="writ protect">
					<h1> Client Plan</h1>
					<h2> Social Care for the future</h2>
					<p> Designed for the future of the US medical industry, when social environments are regarded as a an important determinant of a patient's health. Incorporating aspects of international social care.</p>
						
					<a class="button" href="social.php">More Info</a>
					
				</div>
			</div>

			<div class="col span_1_of_2">
				<div class="pic protect">
					<img src="images/clientplan_context.png" class="border" width=100%/>
				</div>
			</div>
		
			</div>
		<?php } else { ?>
		
		<!-- put dummy card content here for secrets -->
		<div class="section group protected">
			
	
			<div class="col span_1_of_2">
				<div class="writ protect">
					<h1> Social Care Client Plan </h1>
					<h2> ᛋᛄᛛᛟᛃᛂᚻ ᚵᚶᚾᛋ ᛊᚺᛝᛏᛐᛛᛕ</h2>
					<p> ᚵᚶᚾᛋᛊᚺᛝᛏᛐ ᚯᚵᚾᛆᚿ ᚫᚥᛑᛝ ᛨᛩᛩᛛᛊᛃ ᚻᚼᛅᛔᛦᛯ ᛜᛛᛜ ᛄ ᚿᚸᚱ ᚱᚮᚯᚣ ᚣ ᚪᚫᛎ ᛈᚷ ᚪᚸᛔᛜᛒ ᛓᚠᚡ ᚿᛇᚾ ᚰᛛᛜᛞ ᚶᚱᛇ ᚤᚫᚸᛇᛖ ᛥᛯᛌᛏᛐᛗᛯᛮᛮᛥ. </p>
					<p class="smallcaption"> This project is under a confidentiality agreement, email me for a passcode </p>
				</div>
			</div>
			
			<div class="col span_1_of_2">
				<div class="pic protect">
					<img src="images/locked.png" title="This project is protected under a confidentiality agreement, email me for a passcode" width="100%"/>
				</div>
			</div>
		</div>				

		<?php } ?>


		<!--Peacock School of Highland Dance-->	
			<div id="peacock" class="section group">
			
			<div class="col span_1_of_2">
				<div class="writ">
					<h1> The Peacock School of Highland Dance</h1>
					<h2> A non-profit dance school</h2>
					<p> Incorporating the founder's unique personality into the rich history of Scottish Highland dance to create a brand identity across multiple media types with functional assets.</p>
					
					<a class="button" href="peacock.php"><p>More Info</p></a>
					
				</div>			
			</div>
			
			<div class="col span_1_of_2">
				<div class="pic">
					<img src="images/peacock_context.png" class="border" width="100%"/>
				</div>
			</div>

		</div>

		
		<!--Crowned-->	
			<div id="crowned" class="section group">
			
			<div class="col span_1_of_2">
				<div class="writ">
					<h1> Crowned </h1>
					<h2> The Succesion of the British Monarchy</h2>
					<p> Unraveling the complexity of a topic close to my nerdy heart, the relationships between monarchs in the UK. A website showcasing a timeline and a family tree. </p>
					
					<a class="button" href="crowned.php">More Info</a>
					
				</div>
			</div>
			
			<div class="col span_1_of_2">
				<div class="pic">
					<img src="images/crowned_context.png" width=100%/>
				</div>
			</div>
		</div>
		
		
		<!--Express Dispo-->	
		<?php
		if($fullAccessEnabled) { ?>
			<div id="express" class="section group">
			
			<div class="col span_1_of_2">
				<div class="writ protect">
					<h1> Express Dispo </h1>
					<h2> Speeding up the emergency department</h2>
					<p> A software redesign to benefit physician efficiency. Condensing a complicated process to its essentials and removing distractions to keep patient's safety a priority.</p>
					
					<a class="button" href="express.php">More Info</a>
				</div>
			</div>
			
			<div class="col span_1_of_2">
				<div class="pic protect">
					<img src="images/express_context.png" class="border" width=100%/>
				</div>
			</div>
			
			</div>

		
		<?php } else { ?>
		
		<!-- put dummy card content here for secrets -->
		<div class="section group protected">
		
			<div class="col span_1_of_2">
				<div class="writ protect">
					<h1> Express Dispo </h1>
					<h2> ᛋᛄᛛᛟᛃᛂᚻ ᚵᚶᚾᛋ ᛊᚺᛝᛏᛐᛛᛕ</h2>
					<p> ᚵᚶᚾᛋᛊ ᚣᚪᚫᛎᚺᛝᛏᛐ ᚯᚵ ᚫᚥᛑᛝ  ᚿᛇᚾ ᚰᛛᛜᛞ ᛨᛩᛩᛛᚾᛆᚿᛊᛃ ᚻᚼᛅᛔᛦᛯ ᛄ ᚿᚸᚱ ᚱᚮᚯᚣ ᚣᚪᚫᛎ ᛈᚷ ᚪᚸᛔᛜᛒ ᛓᚠᚡ ᚶᚱᛇ ᚤᚫᚸᛇᛖ ᛜᛛᛜ ᛥᛯᛌᛏᛐᛗᛯᛮᛮᛥ. </p>
					<p class="smallcaption"> This project is under a confidentiality agreement, email me for a passcode </p>
				</div>
			</div>
			
			<div class="col span_1_of_2">
				<div class="pic protect">
					<img src="images/locked.png" title="This project is protected under a confidentiality agreement, email me for a passcode" width="100%"/>
				</div>
			</div>
		</div>				

		<?php } ?>
			
		</div>
			
		<?php include 'footer.php';?>
		
	</body>
</html>