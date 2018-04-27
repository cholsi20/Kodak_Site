<!--
==============================================================
Unsubscribe Landing page
This is the page the user is directed to from the email

URL Parameters
lang : [required] the language-country code for the region, e.g. en-US, en-GB, fr-FR
email: [required] the users email address to unsubscribe with

The unsubscribe link will call thankyou.php to process the request,
and pass along the country locale andemail address as URL params.

Change Log
--------------------------------------------------------------
2016-11-22 DFH Added Dutch translation

============================================================== -->
<?php

// set defaults for URL param
$lang = "en-US";
$email = "";
$error = "no email address provided";

$submittext = "Unsubscribe";
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
		$error = "";
	} else {
		$error = "no email address provided";
	}
} 

$error_redirect = "http://apps.kodakmoments.com/unsubscribe/error.php?lang=" . $lang;

?>


<?php
// If there is an error, redirect to error page.
if ($error != ""){
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

	<link rel="stylesheet" href="./app.css">

	<style>


	</style>

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
			<center><img src="email-icon.png" width="80"></center>
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
					<h3 class="text-center"> We&#39;re sad to see you go</h3>
					<p class="text-center">To complete your request to no longer receive emails about consumer products, offers, and services for <b>' . $email . '</b>, click "unsubscribe" below.</p><br>
				</div>
			</div>';
			$submittext = "Unsubscribe";

			$about_link = "http://www.kodakalaris.com.au/en-au/about";
			$about_text = "About Us";

			$privacy_link = "http://www.kodakalaris.com.au/en-au/privacy-policy";
			$privacy_text = "Privacy Policy";

			$terms_link = "http://www.kodakalaris.com.au/en-au/legal/terms-of-use";
			$terms_text = "Site Terms";
			break;

		// en-AU 
		// ============================================
		case "en-AU": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center"> We&#39;re sad to see you go</h3>
					<p class="text-center">To complete your request to no longer receive emails about consumer products, offers, and services for <b>' . $email . '</b>, click "unsubscribe" below.</p><br>
				</div>
			</div>';
			$submittext = "Unsubscribe";

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
					<h3 class="text-center"> We&#39;re sad to see you go</h3>
					<p class="text-center">To complete your request to no longer receive emails about consumer products, offers, and services for <b>' . $email . '</b>, click "unsubscribe" below.</p><br>
				</div>
			</div>';
			$submittext = "Unsubscribe";

			$about_link = "http://www.kodakalaris.co.uk/en-gb/about";
			$about_text = "About Us";

			$privacy_link = "http://www.kodakalaris.co.uk/en-gb/privacy-policy";
			$privacy_text = "Privacy Policy";

			$terms_link = "http://www.kodakalaris.co.uk/en-gb/legal/terms-of-use";
			$terms_text = "Site Terms";
			break;

		// es-ES
		// ============================================
		case "es-ES": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Sentimos que nos deje.</h3>
					<p class="text-center">Para completar su solicitud de dejar de recibir correos electrónicos sobre productos de consumo, ofertas y servicios en la dirección  <b>' . $email . '</b>, haga clic en “Cancelar suscripción" a continuación.</p>
				</div>
			</div>';
			$submittext = "Cancelar Suscripción";

			$about_link = "http://www.kodakalaris.es/es-es/about";
			$about_text = "Quiénes somos";

			$privacy_link = "http://www.kodakalaris.es/es-es/privacy-policy";
			$privacy_text = "Política de privacidad";

			$terms_link = "http://www.kodakalaris.es/es-es/legal/terms-of-use";
			$terms_text = "Términos del sitio";
			break;


		// fr-CA 
		// ============================================
		case "fr-CA": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Nous allons regretter votre départ.</h3>
					<p class="text-center">Pour compléter votre demande d&#39;arrêt de réception des courriels sur les produits de consommation, offres et services pour <b>' . $email . '</b>, cliquez sur « Se désabonner » ci-dessous. </p>
				</div>
			</div>';
			$submittext = "Se désabonner";

			$about_link = "http://www.kodakalaris.ca/fr-ca/about";
			$about_text = "À propos de nous ";

			$privacy_link = "http://www.kodakalaris.ca/fr-ca/privacy-policy";
			$privacy_text = "Politique de confidentialité";

			$terms_link = "http://www.kodakalaris.ca/fr-ca/legal/terms-of-use";
			$terms_text = "Conditions d'utilisation du site";
			break;

		// en-CA 
		// ============================================
		case "en-CA": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center"> We&#39;re sad to see you go</h3>
					<p class="text-center">To complete your request to no longer receive emails about consumer products, offers, and services for <b>' . $email . '</b>, click "unsubscribe" below.</p><br>
					<p class="text-center smaller">Note: you still may receive email from us based on choices you made on other sites shared with our business partners</p>
				</div>
			</div>';
			$submittext = "Unsubscribe";

			$about_link = "http://www.kodakalaris.ca/en-ca/about";
			$about_text = "About Us";

			$privacy_link = "http://kodakalaris.ca/en-ca/privacy-policy";
			$privacy_text = "Privacy Policy";

			$terms_link = "http://www.kodakalaris.ca/en-ca/legal/terms-of-use";
			$terms_text = "Site Terms";
			break;

		// fr-FR 
		// ============================================
		case "fr-FR": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Vous souhaitez vous désabonner!?</h3>

					<p class="text-center">Pour confirmer votre demande de désabonnement et ne plus recevoir de communications concernant nos produits, services et offres commerciales à cette adresse mail <b>' . $email . '</b>, merci de cliquer sur le bouton ci-dessous</p><br>
				</div>
			</div>';

			$submittext = "Se désabonner";
			
			$about_link = "http://www.kodakalaris.fr/fr-fr/about";
			$about_text = "à propos de nous";

			$privacy_link = "http://www.kodakalaris.fr/privacy-policy";
			$privacy_text = "Politique de confidentialité";

			$terms_link = "http://www.kodakalaris.fr/legal/terms-of-use";
			$terms_text = "Conditions générales";

			break;

		// de-DE
		// ============================================
		case "de-DE": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Schade, dass Sie uns verlassen.</h3>

					<p class="text-center">Um Ihre Anfrage abzuschließen und vom Erhalt von E-Mails zu Verbraucherprodukten, Angeboten und Dienstleistungen <b>' . $email . '</b> abzumelden, klicken Sie unten auf „Abmelden“.</p><br>
				</div>
			</div>';

			$submittext = "Abmelden";
			
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
					<h3 class="text-center">Ci dispiace che tu te ne vada!</h3>

					<p class="text-center">Per completare la richiesta e non ricevere più messaggi di posta elettronica su prodotti di consumo, offerte e servizi all&#39;indirizzo <b>' . $email . '</b>, fai clic su "Annulla sottoscrizione" qui di seguito.</p><br>
				</div>
			</div>';

			$submittext = "Annulla sottoscrizione";
			
			$about_link = "http://www.kodakalaris.it/it-it/about";
			$about_text = "Chi siamo";

			$privacy_link = "http://www.kodakalaris.it/it-it/privacy-policy";
			$privacy_text = "Informativa sulla privacy";

			$terms_link = "http://www.kodakalaris.it/it-it/legal/terms-of-use";
			$terms_text = "Termini del sito";

			break;

		// es-MX
		// ============================================
		case "es-MX": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Estamos tristes que nos deja.</h3>
					<p class="text-center">Para completar su solicitud de no recibir más información sobre nuestros productos de consumo, ofertas y servicios en <b>' . $email . '</b> haga clic en el botón de abajo “Cancelar Suscripción” </p><br>
				</div>
			</div>';
			$submittext = "Cancelar Suscripción";

			$about_link = "http://www.kodakalaris.com.mx/es-mx/about";
			$about_text = "Acerca de nosotros";

			$privacy_link = "http://www.kodakalaris.com.mx/es-mx/privacy-policy";
			$privacy_text = "Políticas de privacidad";

			$terms_link = "http://www.kodakalaris.com.mx/es-mx/legal/terms-of-use";
			$terms_text = "Términos de uso";
			break;

		// es-AR
		// ============================================
		case "es-AR": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Estamos tristes que nos deja.</h3>
					<p class="text-center">Para completar su solicitud de no recibir más información sobre nuestros productos de consumo, ofertas y servicios en <b>' . $email . '</b> haga clic en el botón de abajo “Cancelar Suscripción” </p><br>
				</div>
			</div>';
			$submittext = "Cancelar Suscripción";

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
					<h3 class="text-center">Estamos tristes que você queira nos deixar.</h3>
					<p class="text-center">Para completar o seu pedido de cancelamento de nossos produtos, ofertas e serviços em <b>' . $email . '</b> clique no botão abaixo “Cancelar inscrição.</p><br>
				</div>
			</div>';
			$submittext = "Cancelar inscrição";

			$about_link = "http://www.kodakalaris.com.br/pt-br/about";
			$about_text = "Sobre nós";

			$privacy_link = "http://www.kodakalaris.com.br/pt-br/privacy-policy";
			$privacy_text = "Políticas de privacidade";

			$terms_link = "http://www.kodakalaris.com.br/pt-br/legal/terms-of-use";
			$terms_text = "Termos de uso";
			break;

		// nl-NL
		// ============================================
		case "nl-NL": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Wij betreuren het dat je weggaat.</h3>
					<p class="text-center">Om uw verzoek om niet langer e-mails over consumenten producten, aanbiedingen en diensten voor <b>' . $email . '</b> ontvangen te voltooien, klikt u op "afmelden" hieronder.</p><br>
				</div>
			</div>';
			$submittext = "Afmelden";

			$about_link = "http://www.kodakalaris.com/en-us/about";
			$about_text = "Over ons";

			$privacy_link = "http://www.kodakalaris.com/en-us/privacy-policy";
			$privacy_text = "Privacy Policy";

			$terms_link = "http://www.kodakalaris.com/en-us/legal/terms-of-use";
			$terms_text = "Site Voorwaarden";
			break;

		// default 
		// ============================================
		default: 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center"> We&#39;re sad to see you go</h3>
					<p class="text-center">To complete your request to no longer receive emails about consumer products, offers, and services for <b>' . $email . '</b>, click "unsubscribe" below.</p><br>
					<p class="text-center smaller">Note: you still may receive email from us based on choices you made on other sites shared with our business partners</p>
				</div>
			</div>';

			$submittext = "Unsubscribe";

			$about_link = "http://www.kodakalaris.com/about";
			$about_text = "About Us";

			$privacy_link = "http://kodakalaris.com/privacy-policy";
			$privacy_text = "Privacy Policy";

			$terms_link = "http://kodakalaris.com/legal/terms-of-use";
			$terms_text = "Site Terms";

			break;
	} 
	?>
	
		<div class="row">
			<div class="buttonrow"><br>
				<?php if($error == ""){
					echo '<p style="text-align: center;"><a class="unsubscribe-link" href="thankyou.php?email=' . $email . '&lang=' . $lang . '" id="unsub-button">' . $submittext . '</a></p>';
				} ?>
			</div>
		</div>
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
			  <li><a href="https://www.facebook.com/KodakMomentsUS"><img src="facebook.png" width="29" height="29"></a></li>
			  <li><a href="https://www.instagram.com/kodakmoments/"><img src="instagram.png" width="29" height="29"></a></li>
			  <li><a href="https://plus.google.com/+Kodak"><img src="google.png" width="29" height="29"></a></li>
			  <li><a href="https://twitter.com/KodakMomentsUS"><img src="twitter.png" width="29" height="29"></a></li>
			  <li><a href="https://www.pinterest.com/kodakmomentpins/"><img src="pinterest.png" width="29" height="29"></a></li>
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




