<?php
include('F:/121/thinkshop/admin/data.php');
include('F:/121/thinkshop/admin/function.php');

if(isset($_POST['sub_x'])==false){
	exit('非法访问');}

$pid=$_POST['pid'];;
$pname=$_POST['pname'];
$price=$_POST['price'];
$ditprice=$_POST['ditprice'];
$ctg=$_POST['ctg'];
$nums=$_POST['nums'];
$description=$_POST['description'];
$description = htmlspecialchars($description);
$teacher=$_POST['teacher'];
$info=$_POST['info'];
	

//判断语句正则判断
			
	
	//价格
	if($reg=preg_match('/^[0-9]+(.[0-9]{2})?$/',$price)==false){
		exit("糟糕,价格格式有误,<a href='./edit_goods_info.php?pid={$pid}'>请跳转上级页面</a>");}
	if($reg=preg_match('/^[0-9]+(.[0-9]{2})?$/',$ditprice)==false){
		exit("糟糕,价格格式有误,<a href='./edit_goods_info.php?pid={$pid}'>请跳转上级页面</a>");}

	if($price<$ditprice){
		exit("打折价格高于定价,奸商都不带这么卖的.<a href='./edit_goods_info.php?pid={$pid}'>请跳转上级页面</a>");
	}
	if($reg=preg_match('/^[0-9]*[1-9][0-9]*$/',$nums)==false){
		exit("请输入库存数量<a href='./edit_goods_info.php?pid={$pid}'>请跳转上级页面</a>");}
		
	
//判断是否上传新图片
if($_FILES['imgs']['name'][0]!=''&&$_FILES['imgs']['name'][1]!='' && $_FILES['thumbs']['name'][0]!=''){

		$thumbs = implode(",",upload("thumbs",array("png","jpg"),"../upload/thumbs/"));
		$imgs = implode(",",upload("imgs",array("png","jpg"),"../upload/imgs/"));
		
		$mtime=time();
	
		
	//处理数据
	//sql语句
	  $sql="update  ts_goods set pname='{$pname}', price='{$price}', ditprice='{$ditprice}',
		  ctg='{$ctg}', description='{$description}', mtime='{$mtime}', nums='{$nums}'
		 , thumbs='{$thumbs}', imgs='{$imgs}',teacher='{$teacher}',info='{$info}' where pid='{$pid}'";	
			
		$res=mysql_query($sql);
		if($res==true){
			echo "商品修改成功<a href='./goods_info.php?pid={$pid}'>返回</a>";
		}else{
			echo "商品修改失败<a href='./edit_goods_info.php'>返回</a>";
		}
		
	}else{
		if($_FILES['imgs']['name'][0]==''&& $_FILES['imgs']['name'][1]=='' && $_FILES['thumbs']['name'][0]==''){
			$mtime=time();
		
		 $sql="update  ts_goods set pname='{$pname}', price='{$price}', ditprice='{$ditprice}',
		  ctg='{$ctg}', description='{$description}', mtime='{$mtime}', nums='{$nums}',teacher='{$teacher}',info='{$info}'
		 where pid='{$pid}'";
			
	
					
	$res=mysql_query($sql);
		if($res==true){
			echo "商品修改成功<a href='./goods_info.php?pid={$pid}'>返回</a>";
		}else{
			echo "商品修改失败<a href='./edit_goods_info.php'>返回</a>";
		}

		}else{
			echo "能力有限,请全部上传,或者不上传<a href='./goods_info.php?pid={$pid}'>返回</a>";
		}
	}
