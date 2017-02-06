<?php
include('F:/121/thinkshop/admin/data.php');
include('F:/121/thinkshop/admin/function.php');
if(isset($_POST['pid'])==false){
	exit('非法访问');
}
$pid = $_POST['pid'];
$oid = $_POST['oid'];
$uid = $_POST['uid'];
if($_POST['comment']==''){
	exit("评价不能为空!<a href='./comment.php?pid={$pid}&oid={$oid}'>返回评论</a>");
}

//过滤判断 

$comment = $_POST['comment'];
//转码
$comment =  htmlspecialchars($comment);

$ctime=time();
 $sql = "insert into ts_comments (comment,ctime,status,pid,uid,oid)
		value('{$comment}','{$ctime}','1','{$pid}','{$uid}','{$oid}')";
mysql_query($sql);
msg("评论成功返回到订单页","../orders/order.php");









