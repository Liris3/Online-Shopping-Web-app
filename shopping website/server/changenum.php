<?php 
/**
* this php page change the quantity of items in cart
*/
include "connect.php";
$id = filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW);
$num = filter_input(INPUT_POST, 'num', FILTER_UNSAFE_RAW);
 if ($id != null && $num !=null) {
 $command = 'update shopping_cart set quantity = ? where id = ?';
 $stmt = $dbh->prepare($command);
 $params = [$num,$id];
 $success = $stmt->execute( $params);
 }