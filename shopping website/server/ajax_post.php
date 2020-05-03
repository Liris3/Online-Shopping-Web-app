<?php
include "connect.php";
session_start();
$data = $_SESSION;
if ($data == null) {
    die;
}
$params = $_POST['values'];
$user_id = $data['data']['User_ID']; 
$addr =$params['addr'].$params['real']; 
$tel = $params['mob']; 
$name = $params['name'];   
if (empty($addr) || empty($tel) || empty($name)) { 
    echo json_encode(['success'=>false,'msg'=>'fail']);
    die;
}
$sql = "insert into addr (user_id,user_name,addr,tel) values ('{$user_id}','{$name}','{$addr}','{$tel}')";
$stmt = $dbh->prepare($sql);
$success = $stmt->execute();
if ($success) {
    echo json_encode(['success'=>true,'msg'=>'success']);
} else {
    echo json_encode(['success'=>false,'msg'=>'sucess']);
}