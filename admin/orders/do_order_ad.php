<?php
include('F:/121/thinkshop/admin/data.php');

if(isset($_GET['oid'])==false){
	exit('非法访问');
} 
$oid=$_GET['oid'];
$sql="update ts_orders set status='2' where oid='{$oid}'";
mysql_query($sql);
header('location:./order_man.php');



