<?php
session_start();
include('F:/121/thinkshop/admin/data.php');
include('F:/121/thinkshop/admin/function.php');

if(isset($_POST['uname'])==false){
	exit('非法访问');

}
//接收数据

$uname=$_POST['uname'];
$opwd=$_POST['pwd'];
 $pwd=md5($opwd);
$ltime=time();


//正则判断账号是否合法
	if(preg_match("/^[a-zA-Z]\w{4,16}\w$/",$uname)==0){
		exit("账号名非法,只能是数字 字母 下划线组合 6-18位<a href='./login_editor.php'>返回</a>");
	}	
	
//从数据库取出数据
	 $sql ="select uid from ts_users where uname='{$uname}' and pwd='{$pwd}'";
	  
	$query =mysql_query($sql);
	$res= mysql_num_rows($query);

	//判断输入的账户名 和密码是否合法
	if($res==false){
		exit("账户名或密码错误,请重输入<a href='./login_editor.php'>返回</a>");
	}	
	
	if($res==true){
		$row=mysql_fetch_assoc($query);
		$uid=$row['uid'];
		$_SESSION["uname"]=$uname;
		$_SESSION["uid"]=$uid;

		msg ("登录成功","../../homepage.php");
	
		//修改最后登录时间
		  $sql ="update ts_users set ltime='{$ltime}' where uname='{$uname}' and pwd='{$pwd}'";
	  mysql_query($sql);
	  
	 }