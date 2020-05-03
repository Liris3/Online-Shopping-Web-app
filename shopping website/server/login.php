<?php 
/**
* this php page allow user to login
* 
*/

include "connect.php";
session_start();
$username = filter_input(INPUT_POST, 'username', FILTER_UNSAFE_RAW	);
$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
 if ($username == null)  { //verify username not null
     
         echo '<script>alert("username can\'t be blank！")</script>';
          echo '<script>history.go(-1)</script>';
         die;
    } 
    if ($password == null)  { //password not null
        
          echo '<script>alert("password can\'t be blank！")</script>';
           echo '<script>history.go(-1)</script>';
         die;
    } 
    //verify password math
 $command = 'select * from user_information where username=? ';
 $stmt = $dbh->prepare($command);
 $params = [$username];
 $success = $stmt->execute( $params);
 $row = $stmt->fetch();
  if($row!=null){
  	if (password_verify($password, $row['password']))  //
        {
   
    $_SESSION['data'] = $row;
 //woring password
   echo '<script>location.href="../index.php"</script>';
        } else {
          echo '<script>alert("wrong password!")</script>';
    echo '<script>history.go(-1)</script>';
        }
  } else {
    echo '<script>alert("username doesn\'t exsit!")</script>';
    echo '<script>history.go(-1)</script>';
  }

  