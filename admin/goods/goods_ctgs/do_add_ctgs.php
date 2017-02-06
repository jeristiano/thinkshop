<?php
include('F:/121/thinkshop/admin/data.php');

//图片提交按钮传来的时坐标值
	if(isset($_POST['x'])==false){
		exit("哦,不,非法访问!<a href='./goods_ctgs.php'>请跳转上级页面</a>");
	}

	
	  $fid=$_POST['ctg'];
	  $cname=$_POST['cname'];

	//正则判断 
	if($reg=preg_match('/^[\一-\龥_a-zA-Z0-9]{3,30}+$/',$cname)==false){
		exit("糟糕,只能输入中文、英文数字、 字母、 下划线!<a href='./goods_ctgs.php'>请跳转上级页面</a>");	
	
	}
//添加的名字不能重复
	$sql="select * from ts_goods_ctgs where cname='{$cname}'";
		
	 $res= mysql_num_rows(mysql_query($sql));
	if($res==true){
		exit("糟糕!不能重复添加分类<a href='./goods_ctgs.php'>返回</a>");
		}


//添加分类名字
	 $sql="insert into ts_goods_ctgs(cname,fid) value('{$cname}','{$fid}')";
	
	
	$res=mysql_query($sql);
		if($res==true){
		exit("不错!添加成功<a href='./goods_ctgs.php'>返回</a>");
		}else{
		exit("糟糕,删除失败了!<a href='./goods_ctgs.php'>返回</a>");
	}

?>