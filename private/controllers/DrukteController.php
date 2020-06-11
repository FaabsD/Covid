<?php

    namespace Website\Controllers;

use function DI\create;

/**
    * Class DrukteController
    * 
     */
    
    class DrukteController {

        public function GetDrukte($id){
            $winkel = getStore($id);
           
            $template_engine = get_template_engine();
            
            echo $template_engine->render('drukte', ['winkel' =>$winkel]);
            
        }

        public function handleDrukte(){
            $id = $_POST['id'];
            $drukte = $_POST['drukte'];
            changeDrukte($id, $drukte);

            $template_engine = get_template_engine();
            echo $template_engine->render('drukte',['bevestiging' => 'Drukte is Aangepast']);
            
        }

    	/* public function SearchResults(){
            
            $search = $_POST['search'];

           $results = searchStore($search);
            // print_r($results);

            $template_engine = get_template_engine();
            echo $template_engine->render('zoek-resultaten', ['results' => $results]);
        }*/
    }
