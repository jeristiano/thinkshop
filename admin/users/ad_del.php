<?php
include('F:/121/thinkshop/admin/data.php');

//判断是否由get传值
$aid=$_GET['aid'];
if(isset($_GET['aid'])==false){
	exit('非法访问');
}
 $sql="delete  from admin where aid='{$aid}'";
	$res = mysql_query($sql);
//判断
if($res==true){
	echo"删除成功<a href='./ad_users.php'>返回</a>";
}else{
	echo"删除失败<a href='./ad_users.php'>返回</a>";
}
