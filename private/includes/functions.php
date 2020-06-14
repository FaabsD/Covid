<?php
// Dit bestand hoort bij de router, enb bevat nog een aantal extra functiesdie je kunt gebruiken
// Lees meer: https://github.com/skipperbent/simple-php-router#helper-functions
require_once __DIR__ . '/route_helpers.php';

// Hieronder kun je al je eigen functies toevoegen die je nodig hebt
// Maar... alle functies die gegevens ophalen uit de database horen in het Model PHP bestand

/**
 * Verbinding maken met de database
 * @return \PDO
 */
function dbConnect() {

	$config = get_config('DB');

	try {
		$dsn = 'mysql:host=' . $config['HOSTNAME'] . ';dbname=' . $config['DATABASE'] . ';charset=utf8';

		$connection = new PDO( $dsn, $config['USER'], $config['PASSWORD'] );

		$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$connection->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );

		return $connection;

	} catch ( \PDOException $e ) {
		echo 'Fout bij maken van database verbinding: ' . $e->getMessage();
		exit;
	}

}

/**
 * Geeft de juiste URL terug: relatief aan de website root url
 * Bijvoorbeeld voor de homepage: echo url('/');
 *
 * @param $path
 *
 * @return string
 */
function site_url( $path = '' ) {
	return get_config( 'BASE_URL' ) . $path;
}

function absolute_url( $path = '' ){
	return get_config( 'BASE_HOST' ) . $path;
}

function get_config( $name ) {
	$config = require __DIR__ . '/config.php';
	$name = strtoupper( $name );

	if ( isset( $config[ $name ] ) ) {
		return $config[$name];
	}

	throw new \InvalidArgumentException( 'Er bestaat geen instelling met de key: ' . $name );
}

/**
 * Hier maken we de template engine en vertellen de template engine waar de templates/views staan
 * @return \League\Plates\Engine
 */
function get_template_engine() {

	$templates_path = get_config( 'PRIVATE' ) . '/views';

	return new League\Plates\Engine( $templates_path );

}

function validateRegistrationData($data)
{

	$errors = [];

	// Checks: valideren of email echt een geldig email is
	$email      = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
	$wachtwoord = trim($data['password']);

	if ($email === false) {
		$errors['email'] = 'Geen geldig email ingevuld';
	}

	// Checks: wachtwoord minimaal 6 tekens bevat
	if (strlen($wachtwoord) < 6) {
		$errors['password'] = 'Geen geldig password (minimaal 6 tekens)';
	}

	// Resultaat array
	$data = [
		'email' => $data['email'],
		'password' => $wachtwoord
	];

	return [
		'data' => $data,
		'errors' => $errors
	];
}

function validateRegisterData($data){
	$errors = [];
        // check op echt e-mailadres
        $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
        $password = trim($data['password']);
        $fullname = $data['fullname'];
        $username = $data['username'];

        if ( $email === false ){
            $errors['email'] = "Geen geldig e-mailadres ingevuld";
        }
        // check of wachtwoord minstens 6 tekens bevat
        if ( strlen( $password ) < 6 ){
            $errors['password'] = "Wachtwoord is te kort (moet minstens 6 tekens bevatten)";
		}
		//Result array
		$data = [
			'email'=>$data['email'],
			'password'=>$password,
			'fullname'=>$fullname,
			'username'=>$username
		];

		return [
			'data'=>$data,
			'errors'=>$errors
		];
		
}
function userNotRegistered($email){
	    //Check of het email al in gebruik is
        $connection = dbConnect();
        $sql = "SELECT * FROM users WHERE email = :email";
        $statement = $connection->prepare( $sql );
		$statement->execute( [ 'email' => $email ] );
		
		return ($statement->rowCount() === 0);
}

function createUser($email, $password, $fullname, $username, $code){
    $connection = dbConnect();
	 //geen gebruiker gevonden? Verder met opslaan
                $sql = "INSERT INTO users (email, full_name, user_name, password, code) 
                VALUES (:email, :fullname, :username, :password, :code)";
                $statement = $connection->prepare( $sql );
                $safe_password = password_hash( $password, PASSWORD_DEFAULT );
                $params = [
                    'email' => $email,
                    'fullname' => $fullname,
                    'username' => $username,
					'password' => $safe_password,
					'code' => $code
                ];
                $statement->execute( $params );
               
}

/**
 * Maak de SwiftMailer aan en stet hem op de juiste manier in
 *
 * @return Swift_Mailer
 */
function getSwiftMailer() {
	$mail_config = get_config( 'MAIL' );
	$transport   = new \Swift_SmtpTransport( $mail_config['SMTP_HOST'], $mail_config['SMTP_PORT'] );
	$transport->setUsername($mail_config['SMTP_USER'] );
	$transport->setPassword($mail_config['SMTP_PASSWORD']);

	$mailer = new \Swift_Mailer( $transport );

	return $mailer;
}

/**
 * Maak een Swift_Message met de opgegeven subject, afzender en ontvanger
 *
 * @param $to
 * @param $subject
 * @param $from_name
 * @param $from_email
 *
 * @return Swift_Message
 */
function createEmailMessage( $to, $subject, $from_name, $from_email ) {

	// Create a message
	$message = new \Swift_Message( $subject );
	$message->setFrom( [ $from_email => $from_email ] );
	$message->setTo( $to );

	// Send the message
	return $message;
}

/**
 *
 * @param $message \Swift_Message De Swift Message waarin de afbeelding ge-embed moet worden
 * @param $filename string Bestandsnaam van de afbeelding (wordt automatisch uit juiste folder gehaald)
 *
 * @return mixed
 */
function embedImage( $message, $filename ) {
	$image_path = get_config( 'WEBROOT' ) . '/images/email/' . $filename;
	if ( ! file_exists( $image_path ) ) {
		throw new \RuntimeException( 'Afbeelding bestaat niet: ' . $image_path );
	}

	$cid = $message->embed( \Swift_Image::fromPath( $image_path ) );

	return $cid;
}

function sendConfirmationMail($email, $code){

	$url = url('register.confirm', ['code' => $code]);
	$absolute_url = absolute_url($url);

	$mailer = getSwiftMailer();
	$message = createEmailMessage($email, 'Bevestig je account', 'DrukteZoeker', '19959@ma-web.nl');
	$email_text = 'Welkom bij DrukteZoeker. Gebruik de volgende link om je account te bevestigen: '. '<a href ="'. $absolute_url. '">Klik hier om je account te bevestigen</a>';

	$message->setBody($email_text, 'text/html');

	$mailer->send($message);


}


/**
 * confirm an account by confirmation code
 */
function confirmAccount($code){
	$connection = dbConnect();
	$sql = "UPDATE `users` SET `code` = NULL WHERE `code` = :code";
	$statement = $connection->prepare( $sql );
	$params = [
		'code' => $code
	];
	$statement->execute($params);
}