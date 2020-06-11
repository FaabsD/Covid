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
            //maak verbinding met database
            $connection = dbConnect();
            
            $sql1 = "INSERT INTO `winkels`(winkelnaam, adres, plaats)
            VALUES (:winkelnaam, :adres, :plaats)";

            $sql2 = "INSERT INTO `drukte`(winkel_id, drukte)
            VALUES (:id, :drukte)";

            $nieuwewinkel =$connection->prepare($sql1);
            $druktewinkel = $connection->prepare($sql2);

            $connection->beginTransaction();
            $nieuwewinkel->execute([
                'winkelnaam' => $winkelnaam,
                'adres' => $adres,
                'plaats' => $plaats]);
            $last_id = $connection->lastInsertId();
            $druktewinkel->execute([
                'id' => $last_id,
                'drukte' => $drukte]);
            $connection->commit();
            // TODO bovenstaande code in functie stoppen
            // TODO Doorvewijzen naar een bevestiging


        }

    }
