<?php

include "connect.php";
session_start();
$data = $_SESSION;
if ($data == null) {
    die;
}
$user_id = $data['data']['User_ID']; //get id

//get order
$command = "select shopping_cart.*,items.item_name,items.item_price,items.img from items,shopping_cart where items.item_ID=shopping_cart.item_id and shopping_cart.user_id={$user_id} order by id desc";
$stmt = $dbh->prepare($command);
$success = $stmt->execute();
$row = $stmt->fetchAll();
if(empty($row)) {  
    echo json_encode(['success'=>false,'msg'=>'cart can not be empty']);
 } else {
    echo json_encode(['success'=>true,'msg'=>'order.php']);
}