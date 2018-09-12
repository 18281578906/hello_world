<?php
require_once ('../connect.php');
$id=$_GET['id'];
if($link)
{
    mysqli_set_charset($link,'utf8');
    $sql="select * from food where id='$id'";
    $res=mysqli_query($link,$sql);
   $result=mysqli_fetch_row($res);
   $foodName=$result[1];
   $foodPrice=$result[2];
   $foodNum=1;

   $check="select * from book where foodName='$foodName'";
   $check2=mysqli_query($link,$check);
   if(mysqli_num_rows($check2)){
       $foodNum++;
       $new = "update book set foodNum='$foodNum' where foodName='$foodName'";
       if (mysqli_query($link, $new)) {
           echo 2;
       }
       return;
   }else {
       $new = "insert into book(foodName,foodPrice,foodNum) values ('$foodName','$foodPrice','$foodNum')";
       if (mysqli_query($link, $new)) {
           echo 1;
       }
   }

}