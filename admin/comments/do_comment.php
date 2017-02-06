<?php
include('F:/121/thinkshop/admin/data.php');
if(isset($_GET['comid'])==false){
	exit('非法访问');
}
$comid = $_GET['comid'];

$sql = "update ts_comments set status='2' where comid='{$comid}'";
mysql_query($sql);
header('location:./comment_man.php');



















