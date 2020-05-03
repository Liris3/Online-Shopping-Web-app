<?php


include "connect.php";
session_start();
$data = $_SESSION;
if ($data == null) {
    die;
}
$user_id = $data['data']['User_ID']; 
//get order  id
$order_no = date('Ymd') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);

$command = "select shopping_cart.*,items.item_name,items.item_price,items.img from items,shopping_cart where items.item_ID=shopping_cart.item_id and shopping_cart.user_id={$user_id} order by id desc";
$stmt = $dbh->prepare($command);
$success = $stmt->execute();
$row = $stmt->fetchAll();
foreach ($row as $key => $val) {
    $sql = "insert into order_detail (user_id,item_id,quantity,total,order_no) values ('{$user_id}','{$val['item_id']}','{$val['quantity']}','{$val['total']}','{$order_no}')";
    $st = $dbh->prepare($sql);
    $query = $st->execute();
}

$sql = "insert into `order` (user_id,order_id) values ('{$user_id}','{$order_no}')";
$stm = $dbh->prepare($sql);
$query = $stm->execute();
if ($query){ 
    
    $delSql = "delete from shopping_cart where user_id='{$user_id}'";
    $delStml = $dbh->prepare($delSql);
    $delQuery = $delStml->execute();
    if ($delQuery){
        echo json_encode(['success'=>true,'msg'=>'success']);
    } else {
        echo json_encode(['success'=>false,'msg'=>'fail']);
    }
}