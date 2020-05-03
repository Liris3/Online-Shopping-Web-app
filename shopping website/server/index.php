<?php
include "server/connect.php";
session_start();

// get items
$command = 'select * from items ';
$stmt = $dbh->prepare($command);
$success = $stmt->execute();

//session
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
    <script src="js/jq.js"></script>
</head>

<body>
<div class="nav">
    <ul>
        <?php if ($data == null) { ?>
            <li><a href="login.html"><b>Login</b></a></li>
            <li><a href="register.html"><b>Register</b></a></li>
        <?php } else { ?>
            <span><b>Welcome <?php echo $data['data']['username'] ?></b></span>
            <li><a href="server/logout.php"><b>Logout</b></a></li>
            <li><a href="changepwd.html"><b>Change Password</b></a></li>
        <?php } ?>
    </ul>
</div>
<div id="container">
    <div id="header">
        <h1>Mobile Phone Store</h1>
    </div>
    <div id="body">
        <div class="product">
            <h2>New Products</h2>
            <a href="shopcart.php"><h2 style="float:right"><i class="shopping-new"></i></h2></a>
            <div class="clear"></div>
            <!-- loop through to get products -->
            <?php while ($row = $stmt->fetch()) { ?>
                <div class="product_box">
                    <div class="img_box"><span></span>
                        <img src="img/<?php echo $row['img'] ?>" alt="image" width='150px' height='150px'/>
                    </div>
                    <h3 style='overflow: hidden;'><?php echo $row['item_name'] ?></h3>
                    <p class="price">$<?php echo $row['item_price'] ?></p>
                    <div style="width:150px;overflow:hidden">
                        <select class='sss' name="number">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>

                        </select>

                    </div>
                    <input type="hidden" class='id' value='<?php echo $row['item_ID'] ?>' name="aa">
                    <button class='shop'>Add to cart</button>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</body>
<script src='js/shop.js'></script>
<script type="text/javascript">

    $('.shop').on('click', function () {
        let cart = $('.shopping-new');
        let imgtodrag = $(this).parent().children('.img_box').find("img").eq(0);
        if (imgtodrag) {
            let imgclone = imgtodrag.clone()
                .offset({
                    top: imgtodrag.offset().top,
                    left: imgtodrag.offset().left
                })
                .css({
                    'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '100'
                })
                .appendTo($('body'))
                .animate({
                    'top': cart.offset().top + 10,
                    'left': cart.offset().left + 10,
                    'width': 75,
                    'height': 75
                }, 1000, 'easeInOutExpo');

            setTimeout(function () {
                cart.effect("shake", {
                    times: 2
                }, 200);
            }, 1500);

            imgclone.animate({
                'width': 0,
                'height': 0
            }, function () {
                $(this).detach()
            });
        }
    });
</script>
</html>