<?php
require_once ('connect.php');
mysqli_set_charset($link,'utf8');
$sql="select * from book";
$res=mysqli_query($link,$sql);
$length=mysqli_num_rows($res);
$totalPrice=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>cart</title>
    <link rel="stylesheet" href="css/cart.css">
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
                    <li><select name="" id="select">
                            <option value="">选项</option>
                            <option value="">我的订单</option>
                            <option value="">管理员</option>
                        </select></li>
                    <li><a href="#">注销</a></li>
                    <li><a href="register.html">注册</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="shop-body">
        <div class="list-nav">

                <ul class="list-title">
                    <li><p>菜名</p></li>
                    <li><p>单价</p></li>
                    <li><p>数量</p></li>
                    <li><p>操作</p></li>
                    <li><p>备注</p></li>
                </ul>

            <ul class="list">
                <?php
                    for($i=0;$i<$length;$i++):
                        if($data=mysqli_fetch_row($res)):
                            $totalPrice+=$data[2]*$data[3];
                ?>
                <li>
                    <div class="food-name"><p><?php echo $data[1]?></p></div>
                    <div class="food-price"><p><?php echo $data[2]?></p></div>
                    <div class="food-num"><p><?php echo $data[3]?></p></div>
                    <div class="food-action">
                        <button>+</button>
                        <button>-</button>
                    </div>
                    <div class="food-require"><input type="text"></div>
                </li>
                <?php
                    endif;
                    endfor;
                ?>
            </ul>
            <ul class="last">
                <li>
                    <div><p>订单总额：</p><input type="text" class="money" disabled value="<?php echo $totalPrice?>"></div>
                </li>
                <li>
                    <div><p>我的送餐地址：</p><select name="" id="addSelect">
                            <?php
                            $add="select * from address";
                            $from=mysqli_query($link,$add);
                            $size=mysqli_num_rows($from);
                            for($j=0;$j<$size;$j++):
                            if($address=mysqli_fetch_row($from)):
                            ?>
                            <option value="0"><?php echo $address[1]?></option>
                            <?php
                            endif;
                            endfor;
                            ?>
                        </select>
                        <button id="changeAddress" @click="addAddress">新增</button>
                        <textarea class="place"></textarea>
                    </div>

                </li>
                <li>
                    <button>提交订单</button>
                </li>
            </ul>

        </div>
    </div>
</div>
<script src="js/jquery-3.2.1%20(2).js"></script>
<script src="js/cart.js"></script>
</body>
</html>