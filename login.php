<?php
header("Content-type:text/html;charset=UTF-8");
$name=$_GET['name'];
$password=$_GET['password'];
$link=mysqli_connect("127.0.0.1","root","","login");
if($link){
    mysqli_set_charset($link,"utf-8");


        $sql="select username,password from login where username='$name'AND password='$password'";
        $res=mysqli_query($link,$sql);
        if(mysqli_num_rows($res)!=0){
         echo 1;
        }
        else{
            echo 0;
        }

}