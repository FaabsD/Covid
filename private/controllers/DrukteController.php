<?php

    namespace Website\Controllers;

use function DI\create;

/**
    * Class DrukteController
    * 
     */
    
    class DrukteController {

        public function SetDrukte($id){
            
            echo $id;
    
            $connection = dbConnect();
            $sql = "SELECT `winkelnaam` FROM `winkels` WHERE `id` = :id";
            $statement = $connection->prepare($sql);
            $statement->execute(['id' => $id]);
            $winkel= $statement->fetchAll();
            $template_engine = get_template_engine();
            
            echo $template_engine->render('drukte', ['winkel' =>$winkel]);
            
        }

    	/* public function SearchResults(){
            
            $search = $_POST['search'];

           $results = searchStore($search);
            // print_r($results);

            $template_engine = get_template_engine();
            echo $template_engine->render('zoek-resultaten', ['results' => $results]);
        }*/
    }
?>