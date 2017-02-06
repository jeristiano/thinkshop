<?php
session_start();
 include('F:/121/thinkshop/admin/data.php');
 $pid = $_GET['pid'];


	
//second 判断数量
	if($_SESSION['car'][$pid]['nums']>1){
		$_SESSION['car'][$pid]['nums']--;	
	}

header("location:./cart.php");

