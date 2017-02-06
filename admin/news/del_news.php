<?php
	include('F:/121/thinkshop/admin/data.php');
	include('F:/121/thinkshop/admin/function.php');
	
	//接收数据
	if(isset($_GET['aid'])==false){
		exit("哦,不,非法访问!<a href='./edit_news.php'>请跳转上级页面</a>");
	}
	$aid=$_GET['aid'];
	
	 $sql="delete from ts_news where aid='{$aid}'";
	 mysql_query($sql);
	
	$res=mysql_query($sql);
		if($res==true){
		msg("删除成功","./edit_news.php");
		
		}else{
		msg("糟糕,删除失败了!","./edit_news.php");
		
	}
		
	