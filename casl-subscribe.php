<?php
/*
==============================================================
CASL Opt-in for Canada
This page performs the opt-in process for CASL compliance in 
Canada.

URL Parameters
lang : [required] the language-country code for the region, e.g. en-US, en-GB, fr-FR
email: [required] the users email address to unsubscribe with

Makes call to Localytics API to set the following ORG level profile
keys with a value:

* CASL_OPTIN [TRUE/FALSE]
* CASL_OPTINDATE [date in format YYYY-MM-DD]

This call required the API public key and private key for basic
authentication and the email address for the Localytics user. This email
address is used as their unique customer ID.

============================================================== */

// set defaults for URL param
$lang = "en-US";
$email = "";
$error = "";

$linktext_home = "Home";
$linktext_privacy = "Privacy";
$linktext_terms = "Web Terms of Use";

$error_redirect = "http://kodakmoments.com/unsubscribe/error.php";


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

// API call parameters
$api_key_public = "fc7887566ed1d14b184fbb0-a7bdb9b0-f884-11e3-6b61-0097b986e70c";
$api_key_secret = "a4025bddb6db028484b53f6-a7bdbbfe-f884-11e3-6b61-0097b986e70c";

$android_app_id = "51696";
$android_app_key = "6362966e23c8cc3eecfebf8-c070119c-5ab6-11e4-a374-005cf8cbabd8";

$ios_app_id = "51699";
$ios_app_key = "4186c71c35e3734015089cf-f24c6012-5ab5-11e4-2703-004a77f8b47f";

$api_url = "https://email-subscriptions.localytics.com/v1/" . $android_app_key . "/unsubscribe/";

$app_key_array = [$android_app_key, $ios_app_key];

//=================================================
// Process the unsubscribe call
//=================================================

if($error == ""){ // if no error, like missing email address

	
		// The data to send to the API
		$postData = array(
		    'attributes' => array(
		    	'CASL_OPTIN' => 'Y',
		    	'CASL_OPTINDATE' => date("Y-m-d")
		    )
		);
                                                                    
		$data_string = json_encode($postData);                                             
		                                                                                                                     
		$ch = curl_init("https://profile.localytics.com/v1/profiles/" . $email);                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
		curl_setopt($ch, CURLOPT_USERPWD, $api_key_public . ":" . $api_key_secret);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);                                                               
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json',                                                                                
		    'Content-Length: ' . strlen($data_string))                                                                       
		);                                                                                                                 
		                                                                                                                     
		$result = curl_exec($ch);

		 // echo "<pre>";
		 // var_dump($result);
		 // echo "</pre>";

		curl_close($ch);
	
} else {
	header("Location: " . $error_redirect);
	die();
}

?>

<html>
<head>
	<title>Kodak Alaris CASL Opt-In</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">

	<link href='https://fonts.googleapis.com/css?family=Open-Sans:400,700,600' rel='stylesheet' type='text/css'>

	<!-- Compressed CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.3/foundation.min.css">

	<link rel="stylesheet" href="./app.css">

	<!-- Compressed JavaScript -->
	<script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/foundation/6.2.3/foundation.min.js"></script> 
	

</head>
<body>
	<div class="body-container">

	<div class="row header">
		<div class="small-12 large-12 columns">
			<center><img src="http://www.kodakmoments.com/wp-content/uploads/2015/06/KodakMoment_232x28.png" alt="Kodak Alaris Inc."></center>
		</div>
	</div>
	<br>
	<div class="row top-icon">
		<div class="small-12 large-12 columns">
			<center><img src="checkmark-icon.png" width="80"></center>
		</div>
	</div>
	<br>
	
	<?php

	$about_text = "";
	$privacy_text = "";
	$terms_text = "";

	switch($lang) {

		// fr-CA 
		// ============================================
		case "fr-CA":
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Vous avez adhéré.</h3>
					<p class="text-center">Merci pour votre adhésion! Votre courriel <b>' . $email . '</b> est maintenant inscrit. Nous avons hâte de vous offrir davantage d&#39;options pour imprimer vos images et d&#39;idées pour créer des projets photo uniques et des cadeaux.</p>
				</div>
				</div>
			</div>';

			$about_text = "À propos de nous";
			$privacy_text = "Politique de confidentialité ";
			$terms_text = "Conditions d'utilisation du site";

			break;

		// fr-FR
		// ============================================
		case "fr-FR":
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Vous avez adhéré.</h3>
					<p class="text-center">Merci pour votre adhésion! Votre courriel <b>' . $email . '</b> est maintenant inscrit. Nous avons hâte de vous offrir davantage d&#39;options pour imprimer vos images et d&#39;idées pour créer des projets photo uniques et des cadeaux.</p>
				</div>
				</div>
			</div>';

			$about_text = "À propos de nous";
			$privacy_text = "Politique de confidentialité ";
			$terms_text = "Conditions d'utilisation du site";

			break;

		// en-CA 
		// ============================================
		case "en-CA":
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center"> You have opted in.</h3>
					<p class="text-center">Thank you for opting-in! Your email <b>' . $email . '</b> is now subscribed. We look forward to providing you with more options to print your pictures and ideas to create unique photo projects and gifts.</p>
				</div>
				</div>
			</div>';

			$about_text = "About Us";
			$privacy_text = "Privacy Policy";
			$terms_text = "Site Terms";
			
			break;
				
		// en-US 
		// ============================================
		default: 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center"> You have opted in.</h3>
					<p class="text-center">Thank you for opting-in! Your email <b>' . $email . '</b> is now subscribed. We look forward to providing you with more ways to print your pictures and ideas to create unique photo projects and gifts.</p>
				</div>
				</div>
			</div>';

			$about_text = "About Us";
			$privacy_text = "Privacy Policy";
			$terms_text = "Site Terms";

			break;

	} 
	?>
	</div>
	<div class="row footer-container">
		<div class="small-12 large-12 columns footer-nav">
			<center>
			<ul class="menu">
			  <li><a href="http://www.kodakalaris.com/about"><?php echo $about_text ?></a></li>
			  <li><a href="http://kodakalaris.com/privacy-policy"><?php echo $privacy_text ?></a></li>
			  <li><a href="http://kodakalaris.com/legal/terms-of-use"><?php echo $terms_text ?></a></li>
			</ul>
			</center>
		</div> <!-- end footer-nav -->

	</div> <!-- end  footer-container -->

</body>
</html>




