
<?php
include "server/connect.php";
session_start();

$data = $_SESSION;
$user_id = $data['data']['User_ID']; //get user id
$sql = "select * from addr where user_id='{$user_id}'";
$stmt = $dbh->prepare($sql);
$success = $stmt->execute();
//get shopping cart
$command = "select shopping_cart.*,items.item_name,items.item_price,items.img from items,shopping_cart where items.item_ID=shopping_cart.item_id and shopping_cart.user_id={$user_id} order by id desc";
$sm = $dbh->prepare($command);
$su = $sm->execute();

$count = null;

?>
<!DOCTYPE html>

<html>


<head>
    <title>Shop</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tasp.css"/>
    <link href="css/orderconfirm.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/shopcss.css">
    <script src="js/jquery.min.js"></script>
    <style>
        #page {
            width: auto;
        }

        #comm-header-inner, #content {
            margin: auto;
        }

        #logo {
            padding-top: 26px;
            padding-bottom: 12px;
        }

        #header .wrap-box {
            margin-top: -67px;
        }

        #logo .logo {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 140px;
            height: 35px;
            font-size: 35px;
            line-height: 35px;
            color: #f40;
        }

        #logo .logo .i {
            position: absolute;
            width: 140px;
            height: 35px;
            top: 0;
            left: 0;
            background: url(http://a.tbcdn.cn/tbsp/img/header/logo.png);
        }

        .button,.mybtn {
            
            margin-left: 80px;
            box-shadow:inset 0px 1px 0px 0px #fce2c1;
            background:linear-gradient(to bottom, #ffc477 5%, #fb9e25 100%);
            background-color:#ffc477;
            border-radius:6px;
            border:1px solid #eeb44f;
            display:inline-block;
            cursor:pointer;
            color:#ffffff;
            font-family:Arial;
            font-size:12px;
            font-weight:bold;
            padding:8px 17px;
            text-decoration:none;
            text-shadow:0px 1px 0px #cc9f52;


}
    </style>
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
            <h2>Orders</h2>
        </div>
        <div id='shop'>
            <div id="content" class="grid-c">

                <div id="address" class="address" style="margin-top: 20px;" data-spm="2">
                    <form name="addrForm" id="addrForm" action="#">
                        <h3>confirm shipping address</h3>
                        <ul id="address-list" class="address-list">
                            <?php while ($row = $stmt->fetch()) {  ?>
                                <li class="J_Addr J_MakePoint clearfix  J_DefaultAddr "
                                    data-point-url="http://log.mmstat.com/buy.1.20">
                                    <s class="J_Marker marker"></s>
                                    <span class="marker-tip">shipping to: </span>
                                    <div class="address-info">
                                        <a href="#" class="J_Modify modify J_MakePoint"
                                           data-point-url="http://log.mmstat.com/buy.1.21">change address</a>
                                        <input
                                                id ='address'
                                                name="address"
                                               class="J_MakePoint "
                                               type="radio"
                                               id="addrId_674944241"
                                               checked="checked"
                                                value="<?php echo $row['addr']?>"
                                        >
                                        <label for="addrId_674944241" class="user-address">
                                        
                                            <?php echo $row['user_name' ] ; ?>
                                            <?php echo $row['addr'  ] ; ?>
                                            <?php echo $row['tel'   ]; ?>
                                        </label>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                        <div class="address-bar">
                            <a href="addr.php" class="button" >new shipping address</a>
                        </div>

                    </form>
                </div>
                <div id="address" class="address" style="margin-top: 20px;" data-spm="2">
                    <form name="addrForm" id="addrForm" action="#">
                        <h3>Credit Cards</h3>
                        <ul id="address-list" class="address-list">
                            <li class="J_Addr J_MakePoint clearfix  J_DefaultAddr ">
                                <div class="address-info" ><img style="width: 200px;margin-left: 450px" src="img/card.jpg" alt=""></div>
                            </li>
                            <li class="J_Addr J_MakePoint clearfix  J_DefaultAddr ">
                                <label for="addrId_674944241" class="user-address">
                                   Enter credit card number:
                                </label> &nbsp
                                <label for="addrId_674944241" class="user-address">
                                    expiration date:
                                </label>&nbsp
                                <label for="addrId_674944241" class="user-address">
                                    CVV:
                                </label>
                            </li>
                            <li>
                                <input style="width: 125px" id="bankCard" onkeyup="this.value=this.value.replace(/(\d{4})(?=[^\s])/,'$1 ');" type="text" maxlength="16" /> &nbsp&nbsp
                                <input style="width: 60px" id="data" onkeyup="this.value=this.value.replace(/(\d{4})(?=[^\s])/,'$1 ');" type="text" maxlength="4" />&nbsp&nbsp&nbsp
                                <input style="width: 40px" id="data" onkeyup="this.value=this.value.replace(/(\d{4})(?=[^\s])/,'$1 ');" type="text" maxlength="4" />
                            </li>
                        </ul>
                    </form>
                </div>
                <form id="J_Form" name="J_Form" action="/auction/order/unity_order_confirm.htm" method="post">
                    <div>
                        <h3 class="dib">order detail</h3>
                        <table cellspacing="0" cellpadding="0" class="order-table" id="J_OrderTable"
                               summary="order detail section">
                            <caption style="display: none">order detail section</caption>
                            <thead>
                            <tr>
                                <th  class="s-title">items
                                    <hr/>
                                </th>
                                <th class="s-price">price
                                    <hr/>
                                </th>
                                <th class="s-amount">quantity
                                    <hr/>
                                </th>
                                <th class="s-amount">discount
                                    <hr/>
                                </th>
                                <th class="s-total"> total
                                    <hr/>
                                </th>
                            </tr>
                            </thead>


                            <tbody data-spm="3" class="J_Shop" data-tbcbid="0" data-outorderid="47285539868"
                                   data-isb2c="false" data-postMode="2" data-sellerid="1704508670">
                            <tr class="first">
                                <td colspan="5"></td>
                            </tr>
                            <?php while ($res = $sm->fetch()) {   $count = $count +$res['total'];?>
                                <tr class="item" data-lineid="19614514619:31175333266:35612993875" data-pointRate="0">
                                    <td class="s-title">
                                            <img src="img/<?php echo $res['img'] ?>"
                                                 class="itempic"><span class="title J_MakePoint" data-point-url="http://log.mmstat.com/buy.1.5"><?php echo $res['item_name'] ?></span>
                                        <div>
                                            <span style="color:gray;">2 day shipping</span>
                                        </div>
                                    </td>
                                    <td class="s-price">
                                <span class='price '>
                             <em class="style-normal-small-black J_ItemPrice"><?php echo $res['total'] ?></em>
                              </span>
                                    </td>
                                    <td class="s-amount" data-point-url="">
                                        <input type="hidden" class="J_Quantity"
                                               name="19614514619_31175333266_35612993875_quantity"/><?php echo $res['quantity'] ?>

                                    </td>
                                    <td class="s-amount">
                                        <div class="J_Promotion promotion" data-point-url=""></div>
                                    </td>
                                    <td class="s-total">
                                       <span class='price '>
                                     <em class="style-normal-bold-red J_ItemTotal "><?php echo $res['total'] ?></em>
                                      </span>
                                        <input id="furniture_service_list_b_47285539868" type="hidden"
                                               name="furniture_service_list_b_47285539868"/>
                                    </td>
                                </tr>
                            <?php } ?>

                            <tr class="item-service">
                                <td colspan="5" class="servicearea" style="display: none"></td>
                            </tr>

                            <tr class="blue-line" style="height: 2px;">
                                <td colspan="5"></td>
                            </tr>
                           
                            <tr class="shop-total blue-line">
                                <td colspan="5">Subtotal<span class="J_Exclude" style="display: none"></span><span
                                            class="J_ServiceText" style="display: none"></span>：
                                    <span class='price g_price '>
 <span>&dollar;</span><em class="style-middle-bold-red J_ShopTotal"><?php echo $count; ?></em>
  </span>
                                    <input type="hidden" name="1704508670:2|creditcard" value="false"/>
                                    <input type="hidden" id="J_IsLadderGroup" name="isLadderGroup" value="false"/>

                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5">

                                    <div class="order-go" data-spm="4">
                                        
                                          
                                                
                                                
                                                <a id="J_Go" class="mybtn" 
                                                   title="submit">place order<b class="dpl-button"></b></a>
                                          
                                        

                                      
                                    </div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</body>
</html>
<script>
    function click() {
        var address = $("input[name='address']:checked").val();
        $('#J_AddrConfirm').html(address);
    }
    click()
    $('.address').click(function () {
        click()
    })
    $('#J_Go').click(function () {
        var address = $("input[name='address']:checked").val();
        if (address == null) {
            alert('enter shipping address');
            return
        }
        var bankCard = $("#bankCard").val();
        if (bankCard.length == 0 || bankCard == null) {
            alert('Please Enter Your Card Information');
            return
        }
       $.post('server/submit.php',function (data) {
           data = JSON.parse(data);
           if (data.success){
               alert(data.msg);
               window.location.href='index.php'
           } else {
               alert(data.msg);
               window.location.href='index.php'
           }
       })
    })
</script>