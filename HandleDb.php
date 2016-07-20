<?php
function prepare($stmt) {
    try {
        $dbh = new PDO("mysql:dbname=marphil;host=localhost","root", "iah");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh->prepare($stmt);
    } catch(PDOException $e) {
        die($e->getMessage());
    }
}

