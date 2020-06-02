<?php

    namespace Website\Controllers;

use function DI\create;

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

        $result = validateRegisterData($_POST);
    
    
        if ( count( $result['errors'] ) === 0 ) {
            //Sla gebruiker op

            if ( userNotRegistered($result['data']['email']) ){
                
                // verificatie code
                $code = md5(uniqid(rand(), true));

               createUser($result['data']['email'], $result['data']['password'], $result['data']['fullname'], $result['data']['username'], $code);
                // Doorsturen naar bedankpagina
                $bedanktUrl = url('register.bedankpagina');
                redirect($bedanktUrl);


            } else{
                //anders aangeven dat het e-mail al wordt gebruikt
                $errors['email'] = "Dit e-mailadres is al in gebruik";
            }
        }
        $template_engine = get_template_engine();
        echo $template_engine->render('register', ['errors' => $result['errors']]);
    }
    public function registrationThanks(){
        $template_engine = get_template_engine();
        echo $template_engine->render('bedankpagina');
    }

    public function confirmRegistration($code){
        // hier wordt de code gelezen
        echo $code;
        //gebruiker ophalen bij deze code

        //Gebruiker activeren: code leegmaken in database
    }

    }
    /*
    TODO Verder met bevesitigingsmail sturen functions aanmaken en test:
    http://bap.mediadeveloper.amsterdam/covid-19/features/bevestigings-e-mail-sturen/
    */
?>