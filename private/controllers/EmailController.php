<?php

    namespace Website\Controllers;

use function DI\create;

/**
    * Class EmailController
    * 
     */
    //verstuur een testemail
    class EmailController {
    	public function sendTestEmail(){
            $mailer = getSwiftMailer();
            $message = createEmailMessage('Test@email.com', 'dit is een test', 'Fabian Hendriks', '19959@ma-web.nl');
            $message->setbody('de inhoud van de testmail');
            $aantal_verstuurd = $mailer->send($message);

            echo "aantal =" .$aantal_verstuurd; 

            
        }
    }
?>