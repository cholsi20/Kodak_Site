<?php
/*
==============================================================
Unsubscribe Confirmation page
This is the page the user is directed to after successfully
being unsubscribed.

URL Parameters
lang : [required] the language-country code for the region, e.g. en-US, en-GB, fr-FR
email: [required] the users email address to unsubscribe with

Makes call to Localytics API to perform unsubscribe operation.
This call required the API public key and private key for basic
authentication, the Localytics App IDs (for each app to unsubscribe
the user from), and the email address for the Localytics user. This email
address is used as their unique customer ID.

---------------------------------------------------------------
 Change Log
---------------------------------------------------------------
2017-1-4 DFH Updated to use new center endpoint within Azure to interface
             with SendGrid unsubscribe process. appx lines 59-100

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

$error_redirect = "http://apps.kodakmoments.com/unsubscribe/error.php?lang=" . $lang;

// API endpoint DEV
// $endpoint = "https://kacrmassistantdev.azurewebsites.net/api/Unsubscribe/EmailUnsubscribe";

// API endpoint PROD 
$endpoint = "https://kacrmassistant.azurewebsites.net/api/Unsubscribe/EmailUnsubscribe";

$group_domain = "offers"; // the group the user is unsubscrived from

// API call authentication
$api_key_id = "KMUnsubscribeWebSite";
$api_key_secret = "DFC06BE1-A2EF-4A0D-B34B-B92F2F5768DD";

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
	<title>Kodak Alaris Unsubscribe</title>
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
	switch($lang) {

		// en-US 
		// ============================================
		case "en-US": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center"> You have unsubscribed.</h3>
					<p class="text-center">Your email <b>' . $email . '</b> will no longer receive emails about consumer products, offers, and services.</p><br>
					<p class="text-center">If you didn&#39;t intend to unsubscribe, <a href="http://apps.kodakmoments.com/unsubscribe/resubscribe.php?lang=en-US&email=' . $email . '">click here to subscribe</a> again.</p>
				</div>
			</div>';

			$about_link = "http://www.kodakalaris.com/about";
			$about_text = "About Us";

			$privacy_link = "http://kodakalaris.com/privacy-policy";
			$privacy_text = "Privacy Policy";

			$terms_link = "http://kodakalaris.com/legal/terms-of-use";
			$terms_text = "Site Terms";
			break;

		// en-AU 
		// ============================================
		case "en-AU": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center"> You have unsubscribed.</h3>
					<p class="text-center">Your email <b>' . $email . '</b> will no longer receive emails about consumer products, offers, and services.</p><br>
					<p class="text-center">If you didn&#39;t intend to unsubscribe, <a href="http://apps.kodakmoments.com/unsubscribe/resubscribe.php?lang=en-US&email=' . $email . '">click here to subscribe</a> again.</p>
				</div>
			</div>';

			$about_link = "hhttp://www.kodakalaris.com.au/en-au/about";
			$about_text = "About Us";

			$privacy_link = "http://www.kodakalaris.com.au/en-au/privacy-policy";
			$privacy_text = "Privacy Policy";

			$terms_link = "http://www.kodakalaris.com.au/en-au/legal/terms-of-use";
			$terms_text = "Site Terms";
			break;

		// en-GB 
		// ============================================
		case "en-GB": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center"> You have unsubscribed.</h3>
					<p class="text-center">Your email <b>' . $email . '</b> will no longer receive emails about consumer products, offers, and services.</p><br>
					<p class="text-center">If you didn&#39;t intend to unsubscribe, <a href="http://apps.kodakmoments.com/unsubscribe/resubscribe.php?lang=en-GB&email=' . $email . '">click here to subscribe</a> again.</p>
				</div>
			</div>';

			$about_link = "http://www.kodakalaris.co.uk/en-gb/about";
			$about_text = "About Us";

			$privacy_link = "http://www.kodakalaris.co.uk/en-gb/privacy-policy";
			$privacy_text = "Privacy Policy";

			$terms_link = "http://www.kodakalaris.co.uk/en-gb/legal/terms-of-use";
			$terms_text = "Site Terms";
			break;

		// en-CA
		// ============================================
		case "en-CA": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">You have unsubscribed.</h3>
					<p class="text-center">Your email <b>' . $email . '</b> will no longer receive emails about consumer products, offers, and services.</p><br>
					<p class="text-center">If you didn&#39;t intend to unsubscribe, <a href="http://apps.kodakmoments.com/unsubscribe/resubscribe.php?lang=en-CA&email=' . $email . '">click here to subscribe</a> again.</p>
					<p class="text-center smaller">Note: you still may receive email from us based on choices you made on other sites shared with our business partners</p>
				</div>
			</div>';

			$about_link = "http://www.kodakalaris.ca/en-ca/about";
			$about_text = "About Us";

			$privacy_link = "http://kodakalaris.ca/en-ca/privacy-policy";
			$privacy_text = "Privacy Policy";

			$terms_link = "http://www.kodakalaris.ca/en-ca/legal/terms-of-use";
			$terms_text = "Site Terms";
			break;

		// fr-CA
		// ============================================
		case "fr-CA":
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Vous vous êtes désabonné.</h3>
					<p class="text-center">Votre courriel ' . $email . ', ne recevra plus de courriels sur les produits de consommation, offres et services.</p><br>
					
					<p class="text-center smaller">Si vous n&#39;aviez pas l&#39;intention de vous désabonner, <a href="http://apps.kodakmoments.com/unsubscribe/resubscribe.php?lang=fr-CA&email=' . $email . '">cliquez ici pour vous réabonner</a>.</p>
				</div>
				</div>
			</div>';

			$about_link = "http://www.kodakalaris.ca/fr-ca/about";
			$about_text = "À propos de nous ";

			$privacy_link = "http://www.kodakalaris.ca/fr-ca/privacy-policy";
			$privacy_text = "Politique de confidentialité";

			$terms_link = "http://www.kodakalaris.ca/fr-ca/legal/terms-of-use";
			$terms_text = "Conditions d'utilisation du site";

			break;


		// fr-FR 
		// ============================================
		case "fr-FR":
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Confirmation de désabonnement.</h3>
					<p class="text-center">L&#39;adresse mail ' . $email . ' a été supprimée de nos bases de données et ne recevra plus de communications email sur nos produits, services et offres commerciales.</p><br>
					
					<p class="text-center smaller">Si c&#39;est une erreur, il est encore temps de vous ré-abonner en <a href="http://apps.kodakmoments.com/unsubscribe/resubscribe.php?lang=fr-FR&email=' . $email . '">cliquant ici</a>.</p>
				</div>
				</div>
			</div>';
			
			$about_link = "http://www.kodakalaris.fr/fr-fr/about";
			$about_text = "à propos de nous";

			$privacy_link = "http://www.kodakalaris.fr/privacy-policy";
			$privacy_text = "Politique de confidentialité";

			$terms_link = "http://www.kodakalaris.fr/legal/terms-of-use";
			$terms_text = "Conditions générales";

			break;

		// es-MX
		// ============================================
		case "es-MX": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Su suscripción fue cancelada.</h3>
					<p class="text-center">Su correo electrónico ' . $email . ' dejará de recibir información sobre nuestros productos de consumo, ofertas y servicios</p><br>
					<p class="text-center">Si no tuvo  la intención de cancelar su suscripción, <a href="http://apps.kodakmoments.com/unsubscribe/resubscribe.php?lang=es-MX&email=' . $email . '">haga clic aquí para suscribirse</a> nuevamente.</p>
				</div>
			</div>';

			$about_link = "http://www.kodakalaris.com.mx/es-mx/about";
			$about_text = "Acerca de nosotros";

			$privacy_link = "http://www.kodakalaris.com.mx/es-mx/privacy-policy";
			$privacy_text = "Políticas de privacidad";

			$terms_link = "http://www.kodakalaris.com.mx/es-mx/legal/terms-of-use";
			$terms_text = "Términos de uso";
			break;

		// es-ES
		// ============================================
		case "es-ES": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Ha cancelado su suscripción.</h3>
					<p class="text-center">Su dirección de correo electrónico ' . $email . ' ya no recibirá más correos electrónicos sobre productos de consumo, ofertas y servicios.</p><br>
					<p class="text-center">Si no es su intención cancelar su suscripción, <a href="http://apps.kodakmoments.com/unsubscribe/resubscribe.php?lang=es-ES&email=' . $email . '">haga clic aquí para suscribirse</a> de nuevo.</p>
				</div>
			</div>';

			$about_link = "http://www.kodakalaris.es/es-es/about";
			$about_text = "Quiénes somos";

			$privacy_link = "http://www.kodakalaris.es/es-es/privacy-policy";
			$privacy_text = "Política de privacidad";

			$terms_link = "http://www.kodakalaris.es/es-es/legal/terms-of-use";
			$terms_text = "Términos del sitio";
			break;
		
		// es-AR
		// ============================================
		case "es-AR": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Su suscripción fue cancelada.</h3>
					<p class="text-center">Su correo electrónico ' . $email . ' dejará de recibir información sobre nuestros productos de consumo, ofertas y servicios</p><br>
					<p class="text-center">Si no tuvo  la intención de cancelar su suscripción, <a href="http://apps.kodakmoments.com/unsubscribe/resubscribe.php?lang=es-AR&email=' . $email . '">haga clic aquí para suscribirse</a> nuevamente.</p>
				</div>
			</div>';

			$about_link = "http://www.kodakalaris.com.ar/es-ar/about";
			$about_text = "Acerca de nosotros";

			$privacy_link = "http://www.kodakalaris.com.ar/es-ar/privacy-policy";
			$privacy_text = "Políticas de privacidad";

			$terms_link = "http://www.kodakalaris.com.ar/es-ar/legal/terms-of-use";
			$terms_text = "Términos de uso";
			break;


		// pt-BR
		// ============================================
		case "pt-BR": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Sua inscrição foi cancelada.</h3>
					<p class="text-center">Seu endereço de e-mail ' . $email . ' deixará de receber informações sobre nossos produtos, ofertas e serviços.</p><br>
					<p class="text-center">Se você não pretendia cancelar a sua inscrição, <a href="http://apps.kodakmoments.com/unsubscribe/resubscribe.php?lang=pt-BR&email=' . $email . '">clique aqui para inscrever-se novamente</a>.</p>
				</div>
			</div>';

			$about_link = "http://www.kodakalaris.com.br/pt-br/about";
			$about_text = "Sobre nós";

			$privacy_link = "http://www.kodakalaris.com.br/pt-br/privacy-policy";
			$privacy_text = "Políticas de privacidade";

			$terms_link = "http://www.kodakalaris.com.br/pt-br/legal/terms-of-use";
			$terms_text = "Termos de uso";
			break;


		// de-DE
		// ============================================
		case "de-DE": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Sie haben sich abgemeldet.</h3>
					<p class="text-center">Wir werden Ihnen ' . $email . ' keine weiteren E-Mails zu Verbraucherprodukten, Angeboten und Dienstleistungen senden.</p><br>
					<p class="text-center">Wenn Sie sich nicht abmelden möchten, <a href="http://apps.kodakmoments.com/unsubscribe/resubscribe.php?lang=de-DE&email=' . $email . '">klicken Sie hier</a>, um sich erneut anzumelden.</p>
				</div>
			</div>';

			$about_link = "http://www.kodakalaris.de/de-de/about";
			$about_text = "Über uns";

			$privacy_link = "http://www.kodakalaris.de/de-de/privacy-policy";
			$privacy_text = "Datenschutzrichtlinien";

			$terms_link = "http://www.kodakalaris.de/de-de/legal/terms-of-use";
			$terms_text = "Nutzungsbedingungen";
			break;

		// it-IT
		// ============================================
		case "it-IT": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Hai annullato la sottoscrizione.</h3>
					<p class="text-center">Non riceverai più messaggi su prodotti di consumo, offerte e servizi al tuo indirizzo di posta elettronica ' . $email . '.</p><br>
					<p class="text-center">Se non desideri annullare la sottoscrizione, fai <a href="http://apps.kodakmoments.com/unsubscribe/resubscribe.php?lang=de-DE&email=' . $email . '">clic qui per iscriverti nuovamente</a>.</p>
				</div>
			</div>';

			$about_link = "http://www.kodakalaris.it/it-it/about";
			$about_text = "Chi siamo";

			$privacy_link = "http://www.kodakalaris.it/it-it/privacy-policy";
			$privacy_text = "Informativa sulla privacy";

			$terms_link = "http://www.kodakalaris.it/it-it/legal/terms-of-use";
			$terms_text = "Termini del sito";

			break;

		// nl-NL
		// ============================================
		case "nl-NL": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Je abonnement.</h3>
					<p class="text-center">Uw e-mail ( ' . $email . ' ), zal niet langer e-mails over consumenten producten, aanbiedingen en diensten  ontvangen.</p><br>
					<p class="text-center">Als u niet van plan was om af te melden,
					<a href="http://apps.kodakmoments.com/unsubscribe/resubscribe.php?lang=nl-NL&email=' . $email . '">klik hier</a> om weer in te schrijven.</p>
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
					<h3 class="text-center"> You have unsubscribed.</h3>
					<p class="text-center">Your email <b>' . $email . '</b> will no longer receive emails about consumer products, offers, and services.</p><br>
					<p class="text-center">If you didn&#39;t intend to unsubscribe, <a href="http://apps.kodakmoments.com/unsubscribe/resubscribe.php?email=' . $email . '">click here to subscribe</a> again.</p>
					<p class="text-center smaller">Note: you still may receive email from us based on choices you made on other sites shared with our business partners</p>
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




