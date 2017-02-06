<?php
session_start();
//删除购物车就是删除pid
 $pid = $_GET['pid'];

if(isset($pid)==false){
	exit("非法访问<a href='./cart.php'>返回</a>");
}
unset($_SESSION['car'][$pid]);
echo "删除成功!<a href='./cart.php'>返回购物车</a>";
