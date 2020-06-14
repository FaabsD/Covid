<?php
// Model functions
// In dit bestand zet je ALLE functions die iets met data of de database doen

function getUsers(){
    $connection = dbConnect();
    $sql        = "SELECT * FROM 'users'";
    $statement  = $connection->query( $sql );

    return $statement->fetchAll();
}

function getUserByEmail($email){
    $connection = dbConnect();
    $sql        = "SELECT * FROM `gebruikers` WHERE email = :email";
    $statement  = $connection->prepare( $sql );
    $statement->execute( [ 'email' => $email ] );

    if($statement->rowCount() === 1 ){
        return $statement->fetch();
    }
 return false;
}

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

// Voeg een nieuwe winkel toe aan de database en geeft daar
function newStoreEntry($winkelnaam, $adres, $plaats, $drukte){
    //maak verbinding met database
    $connection = dbConnect();
    // eerste query om uit te voeren
    $sql1 = "INSERT INTO `winkels`(winkelnaam, adres, plaats)
            VALUES (:winkelnaam, :adres, :plaats)";
    // tweede query om uit te voeren
    $sql2 = "INSERT INTO `drukte`(winkel_id, drukte)
            VALUES (:id, :drukte)";
    // bereidt de queries voor
    $nieuwewinkel = $connection->prepare($sql1);
    $druktewinkel = $connection->prepare($sql2);
    // voer de queries uit doormiddel van een transaction
    $connection->beginTransaction();
    $nieuwewinkel->execute([
        'winkelnaam' => $winkelnaam,
        'adres' => $adres,
        'plaats' => $plaats
    ]);
    // haal de laatste id op die via auto increment is toegevoegd en zet deze met drukte in de drukte tabel
    $last_id = $connection->lastInsertId();
    $druktewinkel->execute([
        'id' => $last_id,
        'drukte' => $drukte
    ]);
    $connection->commit();
}
