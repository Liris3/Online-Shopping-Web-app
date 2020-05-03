<?php

include "connect.php";
include 'product.php';
session_start();

$data = $_SESSION;
if ($data == null) {
    die;
}
$user_id = $data['data']['User_ID']; //get id
$command = "select shopping_cart.*,items.item_name,items.item_price,items.img from items,shopping_cart where items.item_ID=shopping_cart.item_id and shopping_cart.user_id={$user_id} order by id desc";
$stmt = $dbh->prepare($command);
$success = $stmt->execute();
$shop = [];
while ($row = $stmt->fetch()) {
    $shops = new Product($row["id"], $row["item_name"], $row['quantity'], $row['item_price'], $row['img']);
    array_push($shop, $shops);
}

echo json_encode($shop);