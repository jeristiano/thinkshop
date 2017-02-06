<?php
include('F:/121/thinkshop/admin/data.php');

//图片提交按钮传来的时坐标值
	if(isset($_POST['x'])==false){
		exit("哦,不,非法访问!<a href='./goods_ctgs.php'>请跳转上级页面</a>");
	}

	 $cid=$_POST['cid'];
	 $fid=$_POST['ctg'];
	 $cname=$_POST['cname'];
//自己不能是自己的上级分类
	if($cid==$fid){
		exit("糟糕,这设置不可以!<a href='./goods_ctgs.php'>请跳转上级页面</a>");	
	
	}
//正则判断 
	if($reg=preg_match('/^[\一-\龥_a-zA-Z0-9]{3,30}+$/',$cname)==false){
		exit("糟糕,只能输入中文、英文数字、 字母、 下划线!<a href='./goods_ctgs.php'>请跳转上级页面</a>");	
	
	}

//修改添加未有的分类和判断
	$sql="update ts_goods_ctgs set cname='{$cname}',fid='{$fid}' where cid='{$cid}'";
	
	$res=mysql_query($sql);
		if($res==true){
		exit("不错!修改成功<a href='./goods_ctgs.php'>返回</a>");
		}else{
		exit("糟糕,修改失败了!<a href='./goods_ctgs.php'>返回</a>");
	}


?>