<?php

require_once 'Database.php';

$loteid = isset($_GET['loteid']) ? $_GET['loteid'] : '';

if ($loteid != null) {

    Database::setDB(); 
    $cnx = Database::getConnection();
    $stmt = $cnx->query("SELECT * FROM debts WHERE lote = '$loteid'");

    $lotes = [];
    while($rows = $stmt->fetchArray(SQLITE3_ASSOC)){
        $lotes[] = (object) $rows;
    }

    echo(json_encode($lotes));
} else {
     echo (json_encode("No parameter received."));
}