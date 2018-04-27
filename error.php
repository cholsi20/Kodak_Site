<html>
<head>
	<title>Kodak Alaris | Unsubscribe error</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">

	
	<link href='https://fonts.googleapis.com/css?family=Khula:400,700,600' rel='stylesheet' type='text/css'>

	<!-- Compressed CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.3/foundation.min.css">

	<link rel="stylesheet" href="./app.css">

	<!-- Compressed JavaScript -->
	<script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/foundation/6.2.3/foundation.min.js"></script> 
	

</head>
<body>
	<div class="body-container">
	<?php

	// set defaults for URL param
	$lang = "en-US";
	$email = "";
	$error = "";

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
	?>

	<div class="row header">
		<div class="small-12 large-12 columns">
			<center><img src="http://www.kodakmoments.com/wp-content/uploads/2015/06/KodakMoment_232x28.png" alt="Kodak Alaris Inc."></center>
		</div>
	</div>
	<br>
	<div class="row top-icon">
		<div class="small-12 large-12 columns">
			<center><img src="error-icon.png" width="80"></center>
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
					<h3 class="text-center">An error has occured.</h3>
					<p class="text-center">We are unable to process your request at this time.<br>Please try again later.</p><br>
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
					<h3 class="text-center">An error has occured.</h3>
					<p class="text-center">We are unable to process your request at this time.<br>Please try again later.</p><br>
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

		// en-AU
		// ============================================
		case "en-AU": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">An error has occured.</h3>
					<p class="text-center">We are unable to process your request at this time.<br>Please try again later.</p><br>
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

		// en-GB
		// ============================================
		case "en-GB": 
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">An error has occured.</h3>
					<p class="text-center">We are unable to process your request at this time.<br>Please try again later.</p><br>
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

		// fr-FR 
		// ============================================
		case "fr-FR":
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Oups ! Une erreur est survenue.</h3>
					<p class="text-center">Nous ne pouvons pas traiter votre demande. Veuillez réessayer ultérieurement.</p><br>
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

		// fr-CA 
		// ============================================
		case "fr-CA":
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Une erreur s&#39;est produite.</h3>
					<p class="text-center">Il nous est impossible de traiter votre demande en ce moment. Veuillez réessayer plus tard.</p><br>
				</div>
			</div>';

			$about_link = "http://www.kodakalaris.ca/fr-ca/about";
			$about_text = "À propos de nous ";

			$privacy_link = "http://www.kodakalaris.ca/fr-ca/privacy-policy";
			$privacy_text = "Politique de confidentialité";

			$terms_link = "http://www.kodakalaris.ca/fr-ca/legal/terms-of-use";
			$terms_text = "Conditions d'utilisation du site";
			break;

		// es-ES
		// ============================================
		case "es-ES":
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Ha ocurrido un error.</h3>
					<p class="text-center">No es posible procesar su solicitud en este momento. Inténtelo de nuevo más tarde.</p><br>
				</div>
				</div>
			</div>';

			$about_link = "http://www.kodakalaris.es/es-es/about";
			$about_text = "Quiénes somos";

			$privacy_link = "http://www.kodakalaris.es/es-es/privacy-policy";
			$privacy_text = "Política de privacidad";

			$terms_link = "http://www.kodakalaris.es/es-es/legal/terms-of-use";
			$terms_text = "Términos del sitio";
			break;

		// es-MX
		// ============================================
		case "es-MX":
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Un error ha ocurrido.</h3>
					<p class="text-center">No podemos procesar su solicitud en este momento. Por favor inténtelo de nuevo más tarde</p><br>
				</div>
				</div>
			</div>';

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
					<h3 class="text-center">Un error ha ocurrido.</h3>
					<p class="text-center">No podemos procesar su solicitud en este momento. Por favor inténtelo de nuevo más tarde</p><br>
				</div>
				</div>
			</div>';

			$about_link = "http://www.kodakalaris.com.ar/es-ar/about";
			$about_text = "Acerca de nosotros";

			$privacy_link = "http://www.kodakalaris.com.ar/es-ar/privacy-policy";
			$privacy_text = "Políticas de privacidad";

			$terms_link = "http://www.kodakalaris.com.ar/es-ar/legal/terms-of-use";
			$terms_text = "Términos de uso";
			break;

		// it-IT
		// ============================================
		case "it-IT":
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Si è verificato un errore.</h3>
					<p class="text-center">Non siamo in grado di elaborare la tua richiesta in questo momento. Riprova più tardi.</p><br>
				</div>
				</div>
			</div>';

			$about_link = "http://www.kodakalaris.it/it-it/about";
			$about_text = "Chi siamo";

			$privacy_link = "http://www.kodakalaris.it/it-it/privacy-policy";
			$privacy_text = "Informativa sulla privacy";

			$terms_link = "http://www.kodakalaris.it/it-it/legal/terms-of-use";
			$terms_text = "Termini del sito";
			break;

		// pt-BR
		// ============================================
		case "pt-BR":
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Ocorreu um erro.</h3>
					<p class="text-center">Não podemos processar a sua solicitação nesse momento. Por favor tente novamente mais tarde.</p><br>
				</div>
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
					<h3 class="text-center">Ein Fehler ist aufgetreten.</h3>
					<p class="text-center">Wir können Ihre Anfrage im Moment nicht bearbeiten. Versuchen Sie es später erneut.</p><br>
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

		// nl-NL
		// ============================================
		case "nl-NL":
			echo '	
			<div class="row">
				<div class="small-12 large-12 columns">
					<h3 class="text-center">Er is een fout opgetreden.</h3>
					<p class="text-center">We zijn niet in staat om uw verzoek op dit moment te verwerken. Probeer het later opnieuw.</p><br>
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
					<h3 class="text-center">An error has occured.</h3>
					<p class="text-center">We are unable to process your request at this time.<br>Please try again later.</p><br>
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
			  <li><a href="<?php echo $about_link; ?>"><?php echo $about_text ?></a></li>
			  <li><a href="<?php echo $privacy_link; ?>"><?php echo $privacy_text ?></a></li>
			  <li><a href="<?php echo $terms_link; ?>"><?php echo $terms_text ?></a></li>
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




