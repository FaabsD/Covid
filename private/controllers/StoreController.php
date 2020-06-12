<?php

    namespace Website\Controllers;

use function DI\create;

/**
    * Class StoreController
    * 
     */
    
    class StoreController {
        // laad formulier
        public function storeForm(){
            $template_engine = get_template_engine();
            echo $template_engine->render('winkel-toevoegen');
            
        }
        public function addStore(){
            // zet ingevoerde gegevens in variabelen
            $winkelnaam = $_POST['winkelnaam'];
            $adres = $_POST['adres'];
            $plaats = $_POST['plaats'];
            $drukte = $_POST['drukte'];
           
            newStoreEntry($winkelnaam, $adres, $plaats, $drukte);
            // TODO bovenstaande code in functie stoppen
            // TODO Doorvewijzen naar een bevestiging


        }

    }
