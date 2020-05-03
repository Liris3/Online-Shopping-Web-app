<?php 
/**
* this php page update the quanity of item
*/
include "connect.php";
$id = filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW);

 if ($id != null) {
 $command = 'update shopping_cart set quantity = quantity+1 where id = ?';
 $stmt = $dbh->prepare($command);
 $params = [$id];
 $success = $stmt->execute( $params);
 }