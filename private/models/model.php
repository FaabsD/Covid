<?php
// Model functions
// In dit bestand zet je ALLE functions die iets met data of de database doen

//zoek een gebruiker bij de code
function getUserByCode($code){
    $connection = dbConnect();
    $sql = "SELECT * FROM `users` WHERE `code` = :code";
    $statement = $connection->prepare($sql);

    $statement->execute(['code' => $code]);

    if ( $statement->rowCount() === 1 ) {
        return $statement->fetch();
    }
    return false;
}
// haal resultaten van zoekopdrachtop uit database
function searchStore($search){
     
    // $sql = "SELECT * FROM `winkels` WHERE `winkelnaam` LIKE :search";
    $sql = "SELECT * FROM `winkels` RIGHT JOIN `drukte` ON `winkels`.`id` = `drukte`. `winkel_id` WHERE `winkelnaam` LIKE :search ORDER BY `plaats`";
    $connection = dbConnect();
    $statement = $connection ->prepare( $sql );
    $params = [
        'search' => '%' . $search . '%'
    ];
    $statement->execute($params);
    
    return $statement->fetchAll();
}
