<?php
require_once ('connect.php');
mysqli_set_charset($link,"utf8");
$sql="select * from food where foodType='主食'";
$res=mysqli_query($link,$sql);
$length=mysqli_num_rows($res);
$height=$length%4+1;

$veg="select * from food where foodType='菜品'";
$mm=mysqli_query($link,$veg);
$length2=mysqli_num_rows($mm);
?>
<!DOCTYPE html>
<html lang="en" xmlns:v-bind="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>小羊羔的小店</title>
    <link rel="stylesheet" href="css/shop.css">
    <script src="js/lib/vue.min.js"></script>
    <script src="js/lib/vue-resource.js"></script>
</head>
<body>
<div id="shop">
    <div class="shop-nav">
        <div class="nav">
        <div class="title"><h1>小羊羔的小店</h1></div>
        <div class="nav-list">
        <ul>
            <li><select onchange="window.location=this.value" name="" id="select">
                    <option value="">选项</option>
                    <option value="cart.php">我的订单</option>
                    <option value="">管理员</option>
                </select></li>
            <li><a href="#">注销</a></li>
            <li><a href="register.html">注册</a></li>
        </ul>
        </div>
        </div>
    </div>
    <div class="shop-body">

        <div class="food-list">
            <div class="one">
            <div class="food-Title"><h2>主食</h2></div>
           <div class="food">
                <ul>
                    <?php
                    for($i=0;$i<$length;$i++):
                    $data=mysqli_fetch_row($res);
                    if($data):
                    ?>
                    <li>
                        <img src="<?php echo $data[3]?>" alt="">
                        <p class="food-name"><?php echo $data[1]?></p>
                        <p class="food-price">价格：￥<?php echo $data[2]?></p>
                        <button class="food-book" value="<?php echo $data[0]?>">预定</button>
                    </li>
                    <?php
                    endif;
                    endfor;
                    ?>
                </ul>
           </div>
            </div>
            <div class="two">
            <div class="food-Title"><h2>菜品</h2></div>
           <div class="food">
                <ul>
                    <?php
                    for($j=0;$j<$length2;$j++):
                    $row=mysqli_fetch_row($mm);
                    if($row):
                    ?>
                    <li>
                        <img src="<?php echo $row[3]?>" alt="">
                        <p class="food-name"><?php echo $row[1]?></p>
                        <p class="food-price">价格：￥<?php echo $row[2]?></p>
                        <button class="food-book" value="<?php echo $row[0]?>">预定</button>
                    </li>
                    <?php
                    endif;
                    endfor;
                    ?>
                </ul>
           </div>
        </div>
        </div>
    </div>
</div>
<script src="js/jquery-3.2.1%20(2).js"></script>
<script src="js/shop.js"></script>
</body>
</html>