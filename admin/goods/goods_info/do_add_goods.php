<?php
include('F:/121/thinkshop/admin/data.php');
include('F:/121/thinkshop/admin/function.php');

if(isset($_POST['pname'])==false){
	exit('非法访问');}


$pname = $_POST['pname'];
$price = $_POST['price'];
$ditprice = $_POST['ditprice'];
$ctg = $_POST['ctg'];
$nums = $_POST['nums'];
$teacher =  $_POST['teacher'];
$info =  $_POST['info'];
 $description = $_POST['description'];
$description = htmlspecialchars($description);

$thumbs = implode(",",upload("thumbs",array("png","jpg"),"../upload/thumbs/"));
$imgs = implode(",",upload("imgs",array("png","jpg"),"../upload/imgs/"));

$ttmp_name = $_FILES['thumbs']['tmp_name'];

$itmp_name = $_FILES['imgs']['tmp_name'];
$ctime=time();
$mtime=time();

//判断语句正则判断
	//商品名字
		
	
	//价格
	if($reg=preg_match('/^[0-9]+(.[0-9]{2})?$/',$price)==false){
		exit("糟糕,价格格式有误,<a href='./add_goods.php'>请跳转上级页面</a>");}
	if($reg=preg_match('/^[0-9]+(.[0-9]{2})?$/',$ditprice)==false){
		exit("糟糕,价格格式有误,<a href='./add_goods.php'>请跳转上级页面</a>");}

	if($price<$ditprice){
		exit("打折价格高于定价,奸商都不带这么卖的.<a href='./add_goods.php'>请跳转上级页面</a>");
	}
	if($reg=preg_match('/^[0-9]*[1-9][0-9]*$/',$nums)==false){
		exit("请输入库存数量<a href='./add_goods.php'>请跳转上级页面</a>");}
	
	if($reg=preg_match('/^[\一-\龥_a-zA-Z0-9]{3,30}+$/',$teacher)==false){
		exit("糟糕,只能输入中文、英文数字、 字母、 下划线!<a href='./add_goods.php'>请跳转上级页面</a>");}

	if($reg=preg_match('/^[\一-\龥_a-zA-Z0-9]{3,30}+$/',$info )==false){
		exit("糟糕,只能输入中文、英文数字、 字母、 下划线!<a href='./add_goods.php'>请跳转上级页面</a>");}

//处理数据
//sql语句
 $sql="insert into ts_goods(pname,price,ditprice,ctg,thumbs,imgs,description,ctime,mtime,nums,info,teacher)
	value('{$pname}','{$price}','{$ditprice}',{$ctg},'{$thumbs}','{$imgs}','{$description}','{$ctime}','{$mtime}','{$nums}','{$info}','{$teacher}')";	
		
	$res=mysql_query($sql);
	if($res==true){
		msg("商品添加成功","./goods_info.php");
		return;
	}else{
		msg("商品添加失败","./goods_info.php");
		return;
	}
?>