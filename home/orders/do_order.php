<?php
include('F:/121/thinkshop/admin/data.php');
include('F:/121/thinkshop/admin/function.php');
session_start();
if(isset($_POST['sub_x'])==false){
	exit('非法访问');
}

//验证购物车是否为空或者没设置
if(isset($_SESSION['car'])==false or $_SESSION['car']==''){
	echo msg('购物车为空,不能结算','../cars/cart.php');
	return;
}

$car = $_SESSION['car'];
$uid =$_SESSION['uid'];
$tel=$_POST['tel'];
$addr=$_POST['addr'];


//手机号码格式判断.

if(preg_match("/^1[3|4|5|8|7]\d{9}$/",$tel)==0){
	exit("不能为空,手机号码有误,11位!<a href='../cars/cart.php'>返回</a>");
	}

if($addr = ''){	
	exit("地址不能为空<a href='../cars/cart.php'>返回</a>");
	}

//特殊字符转码
$addr = htmlspecialchars($addr);
$ctime=time();
$onum=date('Ymd',$ctime).rand(1111,9999);
if(empty($_POST['ps'])==''){$ps='';}else{$ps=$_POST['ps'];}
//json转码
$goods=json_encode($car,true);

$sql="insert into ts_orders (uid,goods,onum,ctime,status,addr,tel,ps)
	value('{$uid}','{$goods}','{$onum}','{$ctime}','1','{$addr}','{$tel}','{$ps}')";
mysql_query($sql);
//清空购物车
$_SESSION["car"]=array();

msg("购买成功!进入到订单页查看详情!","./order.php");


