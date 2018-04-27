<?php
/*
==============================================================
RESUBSCRIBE Confirmation page
This is the page the user is directed to after successfully
being re-subscribed to the email list(s).

URL Parameters
lang : [required] the language-country code for the region, e.g. en-US, en-GB, fr-FR
email: [required] the users email address to unsubscribe with

Makes call to Localytics API to perform re-subscribe operation.
This call required the API public key and private key for basic
authentication, the Localytics App IDs (for each app to re-subscribe
the user to), and the email address for the Localytics user. This email
address is used as their unique customer ID (from what I can tell)

============================================================== */

// set defaults for URL param
$lang = "en-US";
$email = "";
$error = "";

$linktext_home = "Home";
$linktext_privacy = "Privacy";
$linktext_terms = "Web Terms of Use";


// get URL param
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($url);

if( isset($parts['query'])){
	parse_str($parts['query'], $query);
	
	// set the locale
	if(isset($query['lang'])){
		$lang = $query['lang'];
	}

	// set email address to remove
	if(isset($query['email'])){
		$email = $query['email'];
	} else { 
		$error = "no email address present";
	}
} else {
	$error = "no url parameters present";
}

$error_redirect = "http://kodakmoments.com/unsubscribe/error.php?lang=" . $lang;


/// API endpoint DEV
//$endpoint = "https://kacrmassistantdev.azurewebsites.net/api/Unsubscribe/EmailResubscribe";

// API endpoint PROD 
$endpoint = "https://kacrmassistant.azurewebsites.net/api/Unsubscribe/EmailResubscribe";

$group_domain = "offers"; // the group the user is re-subscribing to

// API call authentication
$api_key_id = "KMUnsubscribeWebSite";
$api_key_secret = "DFC06BE1-A2EF-4A0D-B34B-B92F2F5768DD";

// debug
//var_dump($app_key_array);

//=================================================
// Process the unsubscribe call
//=================================================

if($error == ""){ // if no error, like missing email address

	// Setup cURL
	$data = array("Emails" => array($email), "Domain" => $group_domain);                                                                    
	$data_string = json_encode($data);  

	$ch = curl_init($endpoint);  
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json; charset=utf-8','Content-Length: ' . strlen($data_string)));
	curl_setopt($ch, CURLOPT_HEADER, 0); 
	curl_setopt($ch, CURLOPT_USERPWD, $api_key_id . ":" . $api_key_secret);   
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_POST, 1);                      
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	$result = curl_exec($ch);
	//var_dump($result);
	curl_close($ch);
	
} else {
	header("Location: " . $error_redirect);
	die();
}

?>

<html>
<head>
	<title>Kodak Alaris Re-Subscribe</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">

	<link href='https://fonts.googleapis.com/css?family=Khula:400,700,600' rel='stylesheet' type='text/css'>

	<!-- Compressed CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.3/foundation.min.css">

	<link rel="stylesheet" href="http://apps.kodakmoments.com/unsubscribe/app.css">

	<!-- Compressed JavaScript -->
	<script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/foundation/6.2.3/foundation.min.js"></script> 
	

</head>
<body>
	<div class="body-container">
	<div class="row header">
		<div class="small-12 large-12 columns">
			<center><img src="http://apps.kodakmoments.com/wp-content/uploads/2015/06/KodakMoment_232x28.png" alt="Kodak Alaris Inc."></center>
		</div>
	</div>
	<br>
	<div class="row top-icon">
		<div class="small-12 large-12 columns">
			<center><img src="http://apps.kodakmoments.com/unsubscribe/checkmark-icon.png" width="80"></center>
		</div>
	</div>
	<br>
	
	<?php

	$about_link = "http://www.kodakalaris.com/about";
	$about_text = "About Us";

	$privacy_link = "http://kodakalaris.com/privacy-policy";
	$privacy_text = "Privacy Policy";

	$terms_link = "http://kodakalaris.com/legal/terms-of-use";
	$terms_text = "Site Terms";

	switch($lang) {

		// en-US 
		// ============================================
		case "en-US": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Welcome back.</h3>
					<p class="text-center">Your request to receive emails about consumer products, offers, and services has been reinstated.</p>
				</div>
				</div>
			</div>';

			$about_link = "http://www.kodakalaris.com/about";
			$about_text = "About Us";

			$privacy_link = "http://kodakalaris.com/privacy-policy";
			$privacy_text = "Privacy Policy";

			$terms_link = "http://kodakalaris.com/legal/terms-of-use";
			$terms_text = "Site Terms";

			break;

		// en-CA
		// ============================================
		case "en-CA": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Welcome back.</h3>
					<p class="text-center">Your request to receive emails about consumer products, offers, and services has been reinstated.</p>
				</div>
				</div>
			</div>';

			$about_link = "http://www.kodakalaris.ca/en-ca/about";
			$about_text = "About Us";

			$privacy_link = "http://kodakalaris.ca/en-ca/privacy-policy";
			$privacy_text = "Privacy Policy";

			$terms_link = "http://www.kodakalaris.ca/en-ca/legal/terms-of-use";
			$terms_text = "Site Terms";

			break;

		// en-GB
		// ============================================
		case "en-GB": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Welcome back.</h3>
					<p class="text-center">Your request to receive emails about consumer products, offers, and services has been reinstated.</p>
				</div>
				</div>
			</div>';

			$about_link = "http://www.kodakalaris.co.uk/en-gb/about";
			$about_text = "About Us";

			$privacy_link = "http://www.kodakalaris.co.uk/en-gb/privacy-policy";
			$privacy_text = "Privacy Policy";

			$terms_link = "http://www.kodakalaris.co.uk/en-gb/legal/terms-of-use";
			$terms_text = "Site Terms";

			break;

		// en-AU
		// ============================================
		case "en-GB": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Welcome back.</h3>
					<p class="text-center">Your request to receive emails about consumer products, offers, and services has been reinstated.</p>
				</div>
				</div>
			</div>';

			$about_link = "hhttp://www.kodakalaris.com.au/en-au/about";
			$about_text = "About Us";

			$privacy_link = "http://www.kodakalaris.com.au/en-au/privacy-policy";
			$privacy_text = "Privacy Policy";

			$terms_link = "http://www.kodakalaris.com.au/en-au/legal/terms-of-use";
			$terms_text = "Site Terms";

			break;

		// de-DE 
		// ============================================
		case "de-DE":
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Willkommen zurück.</h3>
					<p class="text-center">YDu erhältst nun wieder E-Mails über unsere Produkte, Angebote und Services.</p><br>
				</div>
				</div>
			</div>';

			$about_link = "http://www.kodakalaris.de/de-de/about";
			$about_text = "Über uns";

			$privacy_link = "http://www.kodakalaris.de/de-de/privacy-policy";
			$privacy_text = "Datenschutzrichtlinien";

			$terms_link = "http://www.kodakalaris.de/de-de/legal/terms-of-use";
			$terms_text = "Nutzungsbedingungen";
			break;


		// fr-FR 
		// ============================================
		case "fr-FR":
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Welcome back.</h3>
					<p class="text-center">Your request to receive emails about consumer products, offers, and services has been reinstated.</p><br>
				</div>
				</div>
			</div>';

			$about_link = "http://www.kodakalaris.com/about";
			$about_text = "About Us";

			$privacy_link = "http://kodakalaris.com/privacy-policy";
			$privacy_text = "Privacy Policy";

			$terms_link = "http://kodakalaris.com/legal/terms-of-use";
			$terms_text = "Site Terms";
			break;

		// nl-NL 
		// ============================================
		case "nl-NL":
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Welkom terug.</h3>
					<p class="text-center">Uw verzoek om e-mails over consumentenproducten, aanbiedingen te ontvangen en diensten is hersteld.</p><br>
				</div>
				</div>
			</div>';

			$about_link = "http://www.kodakalaris.com/en-us/about";
			$about_text = "Over ons";

			$privacy_link = "http://www.kodakalaris.com/en-us/privacy-policy";
			$privacy_text = "Privacy Policy";

			$terms_link = "http://www.kodakalaris.com/en-us/legal/terms-of-use";
			$terms_text = "Site Voorwaarden";

			break;
				
		// en-US 
		// ============================================
		default: 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Welcome back.</h3>
					<p class="text-center">Your request to receive emails about consumer products, offers, and services has been reinstated.</p>
				</div>
				</div>
			</div>';

			$about_link = "http://www.kodakalaris.com/about";
			$about_text = "About Us";

			$privacy_link = "http://kodakalaris.com/privacy-policy";
			$privacy_text = "Privacy Policy";

			$terms_link = "http://kodakalaris.com/legal/terms-of-use";
			$terms_text = "Site Terms";

			break;


	} 
	?>
	</div>
	<div class="row footer-container">
		<div class="small-12 large-12 columns footer-nav">
			<center>
			<ul class="menu">
			  <li><a href="<?php echo $about_link ?>"><?php echo $about_text ?></a></li>
			  <li><a href="<?php echo $privacy_link ?>"><?php echo $privacy_text ?></a></li>
			  <li><a href="<?php echo $terms_link ?>"><?php echo $terms_text ?></a></li>
			</ul>
			</center>
		</div> <!-- end footer-nav -->

		<div class="small-12 large-12 columns footer-social">
			<center>
			<ul class="menu">
			  <li><a href="https://www.facebook.com/KodakMomentsUS"><img src="http://apps.kodakmoments.com/unsubscribe/facebook.png" width="29" height="29"></a></li>
			  <li><a href="https://www.instagram.com/kodakmoments/"><img src="http://apps.kodakmoments.com/unsubscribe/instagram.png" width="29" height="29"></a></li>
			  <li><a href="https://plus.google.com/+Kodak"><img src="http://apps.kodakmoments.com/unsubscribe/google.png" width="29" height="29"></a></li>
			  <li><a href="https://twitter.com/KodakMomentsUS"><img src="http://apps.kodakmoments.com/unsubscribe/twitter.png" width="29" height="29"></a></li>
			  <li><a href="https://www.pinterest.com/kodakmomentpins/"><img src="http://apps.kodakmoments.com/unsubscribe/pinterest.png" width="29" height="29"></a></li>
			</ul>
			</center>
		</div> <!-- end footer-social -->

		<div class="small-12 large-12 columns footer-international">
			<center>
			<ul class="menu">
			  <li><a href="http://www.kodakmoments.com.au/">AU</a></li>
			  <li><a href="http://www.kodakmomentsapp.com/en/">UK</a></li>
			  <li><a href="http://www.kodakmomentsapp.com/fr/">FR</a></li>
			  <li><a href="http://www.kodakmomentsapp.com/es/">ES</a></li>
			  <li><a href="http://www.kodakmomentsapp.com/it/">IT</a></li>
			  <li><a href="http://www.kodakmoments.eu/de">DE</a></li>
			</ul>
			</center>
		</div> <!-- end footer international -->

		<div class="small-12 large-12 columns footer-legal"><center>&copy;2016 Kodak Alaris Inc. TM/MC/MR: Fun Saver<br>
		The Kodak, Kodak Moment, Gold, Ultra and Max trademarks and Kodak trade dress are used under license from Eastman Kodak Company.</center></div>
		
	</div> <!-- end  footer-container -->

</body>
</html>




