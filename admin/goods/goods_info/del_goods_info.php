<?php
	include('F:/121/thinkshop/admin/data.php');
	include('F:/121/thinkshop/admin/function.php');
	
	//接收数据
	if(isset($_GET['pid'])==false){
		exit("哦,不,非法访问!<a href='./goods_ctgs.php'>请跳转上级页面</a>");
	}
	$pid=$_GET['pid'];
	
	 $sql="delete from ts_goods where pid='{$pid}'";
	 mysql_query($sql);
	
	$res=mysql_query($sql);
		if($res==true){
		msg("删除成功!","./goods_info.php");
		return;
		}else{
		msg("糟糕,删除失败了!","./goods_info.php");
		return;
	}
		
	

	