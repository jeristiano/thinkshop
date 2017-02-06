<?php
session_start();
include('F:/121/thinkshop/admin/data.php');
include('F:/121/thinkshop/admin/function.php');

	
if(isset($_POST['uname'])==false){
	msg('非法访问');

}

//获取post变量数据
$email =$_POST['email'];
$uname =$_POST['uname'];
$pwd =$_POST['pwd'];
$pwd2 =$_POST['pwd2'];
$cell =$_POST['cellphone'];


	
//正则判断是否符合要求,不符合返回 0
		
	//账户名判断6-18位 数字和字母 下划线.

		if(preg_match("/^[a-zA-Z]\w{4,16}\w$/",$uname)==0 ){
			msg("账户名有误","./register.php");
			return;
		}

		//邮箱名字判断
		if(preg_match("/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/",$email)==0){
			msg("邮箱名有误","./register.php");
			return;}
		

		//判断两次密码是否一致.
		if($pwd!=$pwd2){
			msg("两次密码不一致","./register.php");
			return;
		}
		
	//手机号码格式判断.

	if(preg_match("/^1[3|4|5|8|7]\d{9}$/",$cell)==0){
		msg("手机号码有误,11位!","./register.php");
		return;
	}
	
	//判断验证码
	 $code=$_POST['test'];
	
	if($code!=@$_SESSION['code']){
		msg ("验证码有误","./register.php");
		return;
	}	

$pwd=md5($pwd);
$ctime=time();

//判断用户名是否存在
 $query ="select * from ts_users where uname='{$uname}'";
	  
$result =mysql_num_rows(mysql_query($query));
if($result==true){
	msg("糟糕,此用户名已经存在,请换一个用户名","./register.php");
	return;
}else{	
	 $sql="insert into ts_users (uname,cellphone,email,pwd,ctime)
	value('{$uname}','{$cell}','{$email}','{$pwd}','{$ctime}')";


	$res=mysql_query($sql);
		if($res==false){
				msg("(糟糕,注册失败","../login/login_editor.php");
			}else{	
				msg("(⊙o⊙恭喜!注册成功","../login/login_editor.php");
			}
			
	}
