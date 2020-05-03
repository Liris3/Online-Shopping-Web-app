<?php 

include "connect.php";
$id = filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW);

 if ($id != null) {
//delete
 $command = 'delete from shopping_cart where id = ?';
 $stmt = $dbh->prepare($command);
 $params = [$id];
 $success = $stmt->execute( $params);

 }