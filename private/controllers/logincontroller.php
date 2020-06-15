<?php

    namespace Website\Controllers;

use function DI\create;


    class LoginController {
    	public function loginForm() {

		$template_engine = get_template_engine();
		echo $template_engine->render('login_form');
 }

    public function handleLoginForm(){
       $result = validateRegistrationData($_POST);

       if(userNotRegistered( $result['data']['email'] ) ) {
        $result['errors']['email'] = 'deze gebruiker is nog niet geregistreerd';
       } else{
        $user = getUserByEmail( $result['data']['email'] );
        if(password_verify($result['data']['wachtwoord'], $user['password'])){

            $_SESSION['user_id'] =$user['id'];

            redirect(url('user.dashboard'));

        }else{
            $result['errors']['wachtwoord'] = 'Wachtwoord is incorrect';
        }
       }

       $template_engine = get_template_engine();
       echo $template_engine->render( 'login_form', ['errors' => $result['errors']] );
    }

    public function userDashboard(){

        echo "Je ben ingelogd";
    }
}