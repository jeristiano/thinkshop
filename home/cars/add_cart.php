<?php
 include('F:/121/thinkshop/admin/function.php');
session_start();

if(isset($_POST['pid'])==false){
	msg("非法访问",'../login/login_editor.php');
	return;}
if(@$_SESSION['uid']=='' || @isset($_SESSION['uid'])==false ){
	msg("您还没有登录","../login/login_editor.php");
	return;
}
$pid = $_POST['pid'];
//空车推过来
if(isset($_SESSION['car'])==false){
		$_SESSION['car'] =array();			
	}
//添加商品信息到session
$_SESSION['car'][$pid]= array('pid'=>$pid,'nums'=>1);

	msg("添加成功!","./cart.php");

