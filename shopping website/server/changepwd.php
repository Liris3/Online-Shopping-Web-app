<?php 
/**
* this php page changes user account's password

*/
include "connect.php";
session_start();

$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
$repassword = filter_input(INPUT_POST, 'repassword', FILTER_UNSAFE_RAW);

    if ($password == null)  { //verify password not null
        
         echo '<script>alert("password can\'t be blank")</script>';
            echo '<script>history.go(-1)</script>';
         die;
    } 
      if ($repassword == null)  { 
        
         echo '<script>alert("password can\'t be blank")</script>';
            echo '<script>history.go(-1)</script>';
         die;
    } 
     if ($password!=$repassword)  { //password don't match
    
         echo '<script>alert("password don\'t match")</script>';
            echo '<script>history.go(-1)</script>';
         die;
    } 
    //get user info
$data = $_SESSION;
if ($data != null){
  $id = $data['data']['User_ID'];
  $hash = password_hash($password,PASSWORD_DEFAULT);
//change password
 $command = 'update user_information set password = ?  where User_ID = ?';
 $stmt = $dbh->prepare($command);
 $params = [$hash,$id];
 $success = $stmt->execute( $params);
   if($success){  //change password, destory session
    session_destroy();
  header("Location: ../login.html"); 
   } else {
      echo '<script>alert("fail to change password")</script>';
   }
} else {
   echo '<script>location.href="../login.html"</script>';
}


