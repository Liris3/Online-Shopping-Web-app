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
            <li><a href="order.php"><b>Order</b></a></li>
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
        <div id='shop'>
            <form class="registerform" target="_blank" >
            <div class="iDo-basic">
                <p class="iDo-info-p">
                    <span class="iDo-info-title">Name：</span>
                    <span class="iDo-info-box"><input required="required" type="text" name="name" datatype="zh2-4" class="txt-len-1" nullmsg="请填写收货人姓名。"></span>
                    <span class="iDo-info-tips"><i><em>*</em>enter full name</i></span>
                    <span class="iDo-cl"></span>
                </p>
               
                <p class="iDo-info-p">
                    <span class="iDo-info-title">Address：</span>
                    <span class="iDo-info-box"><input required="required" type="text" name="addr" class="txt-len-1" nullmsg="请填写收货地址。"></span>
                    <span class="iDo-info-tips"><i><em>*</em>enter street name and number</i></span>
                    <span class="iDo-cl"></span>
                </p>

                <p class="iDo-info-p">
                    <span class="iDo-info-title">City/Province：</span>
                    <span class="iDo-info-box"><input type="text" name="real" class="txt-len-7" required="required"></span>
                    <span class="iDo-info-tips"><i><em>*</em> enter city and province</i></span>
                    <span class="iDo-cl"></span>
                </p>

                

                <p class="iDo-info-p">
                    <span class="iDo-info-title">phone：</span>
                    <span class="iDo-info-box"><input required="required" type="text" datatype="m" name="mob" class="txt-len-1" nullmsg="请填写收货联系方式。"></span>
                    <span class="iDo-info-tips"><i><em>*</em>enter contact number</i></span>
                    <span class="iDo-cl"></span>
                </p>
            </div>
            </form>
            <hr>
            <div><input class="aclick" type="submit" value="submit" /></div>
        </div>
    </div>
</div>

</body>
</html>
<script>
    $('.aclick').click(function () {
        
        var params = $("form").serializeArray();
        var values = {};
        var x;
        for(x in params){
            values[params[x].name] = params[x].value;
        }
        //ajax send back
        $.post('server/ajax_post.php',{values},function (data) {
            var data = JSON.parse(data);
            if (data) {
                window.location.href='order.php';
            } else {
                alert(data.msg);
            }
        })
    })
</script>