<?php
include('F:/121/thinkshop/admin/data.php');
include('F:/121/thinkshop/admin/function.php');
//验证表单提交方式
if(isset($_POST['sub'])==false){
	echo msg('非法访问','./add_config.php');
}
$cfgname_en = $_POST['cfgname_en'];
$cfgname_zh= $_POST['cfgname_zh'];
$cfgtype = $_POST['cfgtype'];
$cfgvalue= $_POST['cfgvalue'];

//正则判断

if($reg=preg_match('/^[\一-\龥_a-zA-Z0-9]+$/',$cfgname_zh)==false){
		exit("输入中文<a href='./add_config.php'>返回</a>");}

if($reg=preg_match('/^[a-zA-Z]+$/',$cfgname_en)==false){
		exit("输入不合规则<a href='./add_config.php'>返回</a>");}
	

if($cfgtype==1){$cfgtype='text';}else{$cfgtype='textarea';}

//sql语句

$sql="insert into ts_config(cfgname_en,cfgname_zh,cfgtype,cfgvalue)
value('{$cfgname_en}','{$cfgname_zh}','{$cfgtype}','{$cfgvalue}')";
$res=mysql_query($sql);

if($res==true){
	exit("添加成功<a href='./add_config.php'>返回</a>");
}else{
	exit("bummer,添加失败<a href='./add_config.php'>返回</a>");
}





