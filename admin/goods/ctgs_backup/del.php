<?php
	include('F:/121/thinkshop/admin/data.php');
	//接收数据
	if(isset($_GET['cid'])==false){
		exit("哦,不,非法访问!<a href='./goods_ctgs.php'>请跳转上级页面</a>");
	}
	$cid=$_GET['cid'];
	
	$sql1="select * from ts_goods_ctgs where fid='{$cid}'";
	
	if(mysql_num_rows(mysql_query($sql1))==true){
		exit("糟糕,遇到点问题,您想要抛弃的太多了,请先删除子分类!<a href='./goods_ctgs.php'>返回</a>");
	}	


	$sql="delete  from ts_goods_ctgs where cid='{$cid}'";
	$res=mysql_query($sql);
		if($res==true){
		exit("删除成功<a href='./goods_ctgs.php'>返回</a>");
		}else{
		exit("糟糕,删除失败了!<a href='./goods_ctgs.php'>返回</a>");
	}
		
	

	