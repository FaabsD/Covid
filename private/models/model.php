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
// haal resultaten van zoekopdracht op uit database
function searchStore($search){
     
    // $sql = "SELECT * FROM `winkels` WHERE `winkelnaam` LIKE :search";
    $sql = "SELECT * FROM `winkels` RIGHT JOIN `drukte` ON `winkels`.`id` = `drukte`. `winkel_id` WHERE `winkelnaam` LIKE :search ORDER BY `winkelnaam`, `plaats`";
    $connection = dbConnect();
    $statement = $connection ->prepare( $sql );
    $params = [
        'search' => '%' . $search . '%'
    ];
    $statement->execute($params);
    
    return $statement->fetchAll();
}

//haal de winkel bij zijn id op voor de drukte aan te geven
function getStore($id){
    $connection = dbConnect();
    $sql = "SELECT `id`, `winkelnaam`, `adres`, `plaats` FROM `winkels` WHERE `id` = :id";
    $statement = $connection->prepare($sql);
    $statement->execute(['id' => $id]);
    return $statement->fetchAll();
} 

// Wijzig de drukte bij de aangegeven winkel
function changeDrukte($id, $drukte){
    $connection = dbConnect();
    $sql = "UPDATE `drukte` SET `drukte` = :nieuwedrukte WHERE drukte.winkel_id = :id";
    $statement = $connection->prepare($sql);
    $params = [
        'nieuwedrukte' => $drukte,
        'id' => $id
    ];
    $statement->execute($params);
}