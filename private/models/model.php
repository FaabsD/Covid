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
