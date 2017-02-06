<?php
session_start();
 include('F:/121/thinkshop/admin/data.php');
 $pid = $_GET['pid'];

//此处不能使用$cars代替$_SESSION['car'],程序不会自加.原因不清楚.

//判断数量是否超过了库存限制,库存在数据库中.
$sql ="select * from ts_goods where pid='{$pid}'";
$row = mysql_fetch_assoc(mysql_query($sql));
 $nums = $row['nums'];

//second 判断数量
	if($_SESSION['car'][$pid]['nums']<$nums){
		$_SESSION['car'][$pid]['nums']++;	
	}

header("location:./cart.php")


?>