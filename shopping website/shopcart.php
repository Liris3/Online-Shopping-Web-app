<!--  
   shoping cart UI page
-->
<?php
session_start();

$data = $_SESSION;
?>
<!DOCTYPE html>

<html>


<head>
    <title>Shop</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/shopcss.css">
    <script src="js/jquery.min.js"></script>
</head>

<body>
<div class="nav">
    <ul>


        <?php if ($data == null) { ?>
            <li><a href="login.html"><b>LoginM</b></a></li>
            <li><a href="register.html"><b>Register</b></a></li>
        <?php } else { ?>
            <span><b>Welcome <?php echo $data['data']['username'] ?></b></span>
            <li><a href="server/logout.php"><b>Logout</b></a></li>
        <?php } ?>
        <li class='vintage1'><a href="index.php"><b>Main Page</b></a></li>
    </ul>
</div>
<div id="container">
    <div id="header">
        <h1>Mobile Phone Store</h1>
    </div>
    <div class="shopping-cart">

        <div class="title">
            <h2>Shopping Cart</h2>
        </div>
        <div id='shop'></div>
    </div>
    <div class="aclick">
        check out
    </div>
</div>

</body>
<script src='js/shopcart.js'></script>
<script>
    $('.aclick').click(function(){
        $.post(
            "server/sendorder.php",
            function(result){
               res =  JSON.parse(result);
                if (res.success) {
                    window.location.href=res.msg
                } else {
                    alert(res.msg)
                }
            });
    })
</script>
</html>