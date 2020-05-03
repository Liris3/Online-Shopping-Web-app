<?php
/**
**connect
 **/
try {
    $dbh = new PDO(
        "mysql:host=localhost;dbname=shop",
        "root",
        ""
    );
} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}
