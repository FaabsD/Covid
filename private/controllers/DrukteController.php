<?php

    namespace Website\Controllers;

use function DI\create;

/**
    * Class DrukteController
    * 
     */
    
    class DrukteController {
        // haal de naam en id op van de winkel waarvan de drukte wordt aangepast
        public function GetDrukte($id){
            $winkel = getStore($id);
           
            $template_engine = get_template_engine();
            
            echo $template_engine->render('drukte', ['winkel' =>$winkel]);
            
        }
        // wijzig de drukte en stuur weer door naar de drukte pagina waar i.p.v. formulier een bevestiging wordt getoont
        public function handleDrukte(){
            $id = $_POST['id'];
            $drukte = $_POST['drukte'];
            changeDrukte($id, $drukte);

            $template_engine = get_template_engine();
            echo $template_engine->render('drukte',['bevestiging' => 'Drukte is Aangepast']);
            
        }

    }
