<?php

session_start();
include('./data.php');
include('./function.php');

//1 判断是否通过post传值
	if(isset($_POST['aname'])==false){
		exit("非法访问<a href='./login.php'>返回登录页面</a>");
	}
//2 接收数据
	
	$aname = $_POST["aname"];
	$pwd = $_POST["apwd"];
	$apwd = md5($pwd);
//3 正则验证用户名
	$reg=preg_match('/^[a-zA-Z]\w{5,17}$/',$aname);
	if($aname==''){
		exit("用户名不能为空!<a href='./login.php'>返回登录页面</a>");
	}

	if($reg==0){
		exit("用户名格式不正确!<a href='./login.php'>返回登录页面</a>");
	
	}
		 
//3 取得数据库数据

	$sql="select * from ts_admin where aname='{$aname}' and apwd='{$apwd}'";
	$res = mysql_query($sql);
	$row = mysql_fetch_assoc($res);
	if($row!=false){
		$_SESSION['aname']=$_POST["aname"];
		
		$lgtime=time();
		$sql="update ts_admin set date='{$lgtime}' where aname='{$aname}'";
		mysql_query($sql);
		echo msg('登录成功','./users/ad_users.php');
	}else{
		echo msg('糟糕,大概出了点问题,请重试','./login.php');
	}

		



