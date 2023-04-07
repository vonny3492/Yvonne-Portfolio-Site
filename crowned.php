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
					<h1>Crowned</h1>
					<h2>The Succession of the British Monarchy</h2>
					<p>This is my college thesis project. I minored in history, and studied abroad in Scotland, where I studied Scottish and Celtic history. When I was there, I wanted to know how the monarchs I learned about were related to each other. But I found it difficult to find all the information I needed. I wanted to create a website that would allow people with similar interests as me learn more about these monarchs.</p>
				</div>		
					
				<figure>
					<img src="images/crowned_1.svg" width="100%"/>
				</figure>
			</section>	

			<svg class="curve" preserveAspectRatio="none" viewBox="0 0 1440 96" fill="#fff" xmlns="http://www.w3.org/2000/svg">
				<path d="m0 96 80-5.3C160 85 320 75 480 64s320-21 480-21.3c160 .3 320 10.3 400 16l80 5.3V0H0v96Z"></path>
			</svg>
			<section id="design" class="red chunk half">
				<div>
					<h3>Research</h3>
					<p>Reading lots of books</p>
					<p>Post-it note hierarchy outline</p>
					<p>Timeline/Family tree competitor analysis</p>
				</div>

				<div>
					<h3>Key Features</h3>
					<p>cohesive overall design style</p>
					<p>color to unify countries, dynasties, and family succession</p>
					<p>arrows to identify succesion path</p>
					<p>legend to explain design decisions</p>
				</div>
			</section>
			<svg class="curve" preserveAspectRatio="none" viewBox="0 0 1440 96" fill="var(--red)" xmlns="http://www.w3.org/2000/svg">
				<path d="m0 96 80-5.3C160 85 320 75 480 64s320-21 480-21.3c160 .3 320 10.3 400 16l80 5.3V0H0v96Z"></path>
			</svg>
			
			<section style="text-align:center">
				<p>I created a site that allows you to trace lineages across dynasties, to understand the relationships that allowed for succession, and gives concise information about each monarch.</p>
				<p><strong>This long term project may be a work in progress but something I'm incredibly proud of. Thank you for taking a look.</strong></p>


				<figure>
					<img src="images/crowned_2.svg" width="100%"/>
				</figure>

				<p class="link">Click below for a look at the complete site, or see a copy of the thesis book.</p>
					<a class="button" style="margin: auto; margin-bottom: 30px;" href="crowned/index.html">the Site</a>
					<a class="button" style="margin: auto; margin-bottom: 30px;" href="images/uncrowned.pdf">the Book</a>		
				
			</section>	
			
			
		</main>	
		
		
	<?php include 'footer.php';?>
	
	</body>
	
</html>
