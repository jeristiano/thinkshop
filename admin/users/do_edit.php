<?php
include('../data.php');

//判断是否由get传值

if(isset($_POST['sub'])==false){
	exit('非法访问');

}
@$email=$_POST['email'];
@$cellphone=$_POST['cellphone'];
@$aname=$_POST['aname'];
$aid =$_POST['aid'];


//邮箱名字判断
		if(preg_match("/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/",$email)==0){
			exit("邮箱名有误<a href='./register.php'>返回</a>");}

//手机号码格式判断.

		if(preg_match("/^1[3|4|5|8|7]\d{9}$/",$cellphone)==0){
			exit("手机号码有误,11位!<a href='./edit_user.php'>返回</a>");
			}

$sql="update ts_admin set  email='{$email}',cellphone='{$cellphone}' where aid='{$aid}'";

	$res = mysql_query($sql);
	//判断
	if($res==true){
		echo"修改成功<a href='./ad_users.php'>返回</a>";
	}else{
		echo"修改失败<a href='./ad_users.php'>返回</a>";
	}
