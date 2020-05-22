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
    }
?>