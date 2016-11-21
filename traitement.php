<?php
	header('Content-Type: text/html; charset=utf-8');

	// CONDITIONS PRENOM
	if ( (isset($_POST["prenom"])) && (strlen(trim($_POST["prenom"])) > 0) ) {
		$prenom = stripslashes(strip_tags($_POST["prenom"]));
	} else {
		echo "Merci d'écrire un prenom <br />";
		$prenom = "";
	}
	// CONDITIONS NOM
	if ( (isset($_POST["nom"])) && (strlen(trim($_POST["nom"])) > 0) ) {
		$nom = stripslashes(strip_tags($_POST["nom"]));
	} else {
		echo "Merci d'écrire un nom <br />";
		$nom = "";
	}

	// CONDITIONS EMAIL
	if ( (isset($_POST["email"])) && (strlen(trim($_POST["email"])) > 0) && (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) ) {
		$email = stripslashes(strip_tags($_POST["email"]));
	} elseif (empty($_POST["email"])) {
		echo "Merci d'écrire une adresse email <br />";
		$email = "";
	} else {
		echo "Email invalide :(<br />";
		$email = "";
	}

	// CONDITIONS TEL
	if ( (isset($_POST["tel"])) && (strlen(trim($_POST["tel"])) > 0) && (filter_var($_POST["tel"])) ) {
		$tel = stripslashes(strip_tags($_POST["tel"]));
	} elseif (empty($_POST["tel"])) {
		echo "Merci d'écrire un numéro de téléphone <br />";
		$tel = "";
	} else {
		echo "Téléphone invalide :(<br />";
		$tel = "";
	}

	// CONDITIONS SUJET
	if ( (isset($_POST["sujet"])) && (strlen(trim($_POST["sujet"])) > 0) ) {
		$sujet = stripslashes(strip_tags($_POST["sujet"]));
	} else {
		echo "Merci d'écrire un sujet <br />";
		$sujet = "";
	}



	// CONDITIONS MESSAGE
	if ( (isset($_POST["message"])) && (strlen(trim($_POST["message"])) > 0) ) {
		$message = stripslashes(strip_tags($_POST["message"]));
	} else {
		echo "Merci d'écrire un message<br />";
		$message = "";
	}

	// Les messages d'erreurs ci-dessus s'afficheront si Javascript est désactivé

	// PREPARATION DES DONNEES
	$ip           = $_SERVER["REMOTE_ADDR"];
	$hostname     = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
	$destinataire = "clement.perret.etudes@gmail.com";
	$objet        = "[Contact Portfolio] " . $sujet;
	$contenu      = "Nom de l'expéditeur : " . $prenom . " " . $nom . "\r\n";
	$contenu     .= "Adresse e-mail : " .$email . " Téléphone : ". $tel ."\r\n\n";
	$contenu     .= $message . "\r\n\n";
	$contenu     .= "Adresse IP de l'expéditeur : " . $ip . "\r\n";
	$contenu     .= "DLSAM : " . $hostname;

	$headers  = "CC: " . $email . " \r\n"; // ici l'expediteur du mail
	$headers .= "Content-Type: text/plain; charset=\"ISO-8859-1\"; DelSp=\"Yes\"; format=flowed /r/n";
	$headers .= "Content-Disposition: inline \r\n";
	$headers .= "Content-Transfer-Encoding: 7bit \r\n";
	$headers .= 'From:' . $prenom." ".$nom." " .' <'.$email.'>' . "\r\n" .
	'Reply-To:'.$email. "\r\n" .
	'X-Mailer:PHP/'.phpversion();
	$headers .= "MIME-Version: 1.0";

	// SI LES CHAMPS SONT MAL REMPLIS
	if ( (empty($prenom)) && (empty($nom)) && (empty($sujet)) && (empty($nom)) && (empty($email)) && (!filter_var($email, FILTER_VALIDATE_EMAIL)) && (empty($message)) ) {
		echo 'echec :( <br /><a href="contact.html">Retour au formulaire</a>';
	} else {
		// ENCAPSULATION DES DONNEES
		mail($destinataire, $objet, utf8_decode($contenu), $headers);
		echo 'Formulaire envoyé'.$_POST['tel'];
	}

	// Les messages d'erreurs ci-dessus s'afficheront si Javascript est désactivé
?>