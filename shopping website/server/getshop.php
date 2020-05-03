
<?php

/**
* this php page add items to the shopping cart
*
*/
include "connect.php";
session_start();

//get data
$num = filter_input(INPUT_POST, 'num', FILTER_UNSAFE_RAW);
$id = filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW);
 //get price
$command = 'SELECT * FROM Items where item_ID = ?';
 $stmt = $dbh->prepare($command);
 $params = [$id];
 $success = $stmt->execute( $params);
  $row = $stmt->fetch();
  $price = $row['item_price'];

  //calculate total price
  $total = $num*$price;

  //get userID
  if ($_SESSION!=null){
  	$user_id = $_SESSION['data']['User_ID'];
  } else
  {
  	echo '0';
  	die;
  }
  
 // verify the item exist in shiopping cart
 $command1 = "SELECT * FROM shopping_cart where user_id = ? and item_id = ?";
 $stmt1 = $dbh->prepare($command1);
 $params1 = [$user_id,$id];
 $success1 = $stmt1->execute( $params1);
 $row1 = $stmt1->fetch();
  if($row1!=null){ //quantity add
  		$command = 'UPDATE shopping_cart SET quantity=quantity+? WHERE user_id = ? and item_id =?';
		 $stmt = $dbh->prepare($command);
		 $params = [$num,$user_id,$id];
		 $success = $stmt->execute( $params);
		 if ($success){
		 		echo '1';
		 	}
  } else {//not exist, add item to cart
  		$command= 'INSERT INTO shopping_cart (user_id,item_id,quantity,total) values(?,?,?,?)';
		 $stmt = $dbh->prepare($command);
		 $params = [$user_id,$id,$num,$total];
		 $success = $stmt->execute( $params);
		 	if ($success){
		 		echo '1';
		 	}
  }
