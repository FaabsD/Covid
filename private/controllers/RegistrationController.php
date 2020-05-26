<?php

    namespace Website\Controllers;
    /**
     * Hier wordt de registratie afgehandeld
     * - de registratie pagina
     * - afhandelen formulier
     * - misschien de bevestigingslink?
     */
    class RegistrationController {
    	public function registrationPage() {

		$template_engine = get_template_engine();
		echo $template_engine->render('register');

//		$template_engine = get_template_engine();
//		echo $template_engine->render('homepage');

    }
    public function handleRegistration(){
        // hier wordt het formulier afgehandeld

        $errors = [];
        // check op echt e-mailadres
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $password = trim($_POST['password']);
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];

        if ( $email === false ){
            $errors['email'] = "Geen geldig e-mailadres ingevuld";
        }
        // check of wachtwoord minstens 6 tekens bevat
        if ( strlen( $password ) < 6 ){
            $errors['password'] = "Wachtwoord is te kort (moet minstens 6 tekens bevatten)";
        }

        if ( count( $errors ) === 0 ) {
            //Sla gebruiker op
            //Check of het email al in gebruik is
            $connection = dbConnect();
            $sql = "SELECT * FROM users WHERE email = :email";
            $statement = $connection->prepare( $sql );
            $statement->execute( [ 'email' => $email ] );

            if ( $statement->rowCount() === 0 ){
                //geen gebruiker gevonden? Verder met opslaan
                $sql = "INSERT INTO users (email, full_name, user_name, password) 
                VALUES (:email, :fullname, :username, :password)";
                $statement = $connection->prepare( $sql );
                $safe_password = password_hash( $password, PASSWORD_DEFAULT );
                $params = [
                    'email' => $email,
                    'fullname' => $fullname,
                    'username' => $username,
                    'password' => $safe_password
                ];
                $statement->execute( $params );
                echo "Klaar";
                exit;
            } else{
                //anders aangeven dat het e-mail al wordt gebruikt
                $errors['email'] = "Dit e-mailadres is al in gebruik";
            }
        }
        $template_engine = get_template_engine();
        echo $template_engine->render('register', ['errors' => $errors]);
    }
    }
    /*
    TODO Ervoor zorgen dat foutmeldingen worden getoont:
    http://bap.mediadeveloper.amsterdam/covid-19/gebruikers-registratie/05-foutmeldingen-invoer-tonen/
    */
?>