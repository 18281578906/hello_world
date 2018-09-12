<?php
$name=$_GET['name'];
$password=$_GET['password'];
$confirmPass=$_GET['confirmPass'];
header("Content-type:text/html;charset=utf8");
$link=mysqli_connect("127.0.0.1","root","","login");
mysqli_set_charset($link,"utf8");

$checkName="select * from login where username='$name'";
$res=mysqli_query($link,$checkName);
$reslut=mysqli_num_rows($res);
if($reslut!=0)
{
    echo 0;
}
if($reslut==0)
{
    $sql = "insert into 
            login(username,password,confirmPassword) 
            values ('$name','$password','$confirmPass');
            ";
    if (mysqli_query($link, $sql)) {
        echo 1;
    }else{
        echo 2;
    }
}