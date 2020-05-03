<?php 

include "connect.php";

//get data
$username = filter_input(INPUT_POST, 'username', FILTER_UNSAFE_RAW	);
$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
$repassword = filter_input(INPUT_POST, 'repassword', FILTER_UNSAFE_RAW);

 if ($username == null)  { //user name can't be null
       
         echo '<script>alert("username can\'t be blank！")</script>';
          echo '<script>history.go(-1)</script>';
         die;
    } 
    if ($password == null)  { 
        
         echo '<script>alert("password can\'t be blank！")</script>';
          echo '<script>history.go(-1)</script>';
         die;
    } 
      if ($repassword == null)  { //password can't be null
        
         echo '<script>alert("password can\'t be blank！")</script>';
          echo '<script>history.go(-1)</script>';
         die;
    } 
     if ($password!=$repassword)  { //verift password
      
         echo '<script>alert("password don\'t match")</script>';
          echo '<script>history.go(-1)</script>';
         die;
    } 

       //verify account exist in batabase or not
 $command = 'select * from user_information where username=?';
 $stmt = $dbh->prepare($command);
 $params = [$username];
 $success = $stmt->execute( $params);
 $row = $stmt->fetch();
  if(!empty($row)){
     echo '<script>alert("account already exist")</script>';
      echo '<script>history.go(-1)</script>';
  } else {
  		    //user register
  $hash = password_hash($password,PASSWORD_DEFAULT);
 $command = 'insert into user_information (username,password) values(?,?)';
 $stmt = $dbh->prepare($command);
 $params = [$username,$hash];
 $success = $stmt->execute( $params);
 	if ($success){
 	
    echo '<script>location.href="../login.html"</script>';
 	} else {
 		
  echo '<script>alert("fail to register")</script>';
   echo '<script>history.go(-1)</script>';
 	}
  }