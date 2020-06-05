<?php

    namespace Website\Controllers;

use function DI\create;

/**
    * Class SearchController
    * 
     */
    //haal zoekresultaten op
    class SearchController {
    	public function SearchResults(){
            
            $search = $_POST['search'];

           $results = searchStore($search);
            // print_r($results);

            $template_engine = get_template_engine();
            echo $template_engine->render('zoek-resultaten', ['results' => $results]);
        }
    }
?>