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
            
        }
    }
?>