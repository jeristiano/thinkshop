<?php
include('../../head.php');
include('../data.php');
include('../function.php');
$sql ='select * from ts_news_ctgs';
$res = mysql_query($sql);
$ctgs=array();
while($row=mysql_fetch_assoc($res)){
	$ctgs[]=$row;
}
$ctgs=infinite_ctg($ctgs,array("0","fid","nid"));

?>

<head>
	<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/admin/add_news_ctg.css' type = 'text/css'>
</head>



<div class='win_main'>
	<div class='location'>
		<span><a href="../../admin.php">首页</a>&nbsp;&nbsp;&gt;</span>
		<span>新闻管理</span>
	</div>

	<div class='ad_frm'>
		<div class='location'>
			<span>新闻管理</span>
		</div>

<!-- 表单提交 -->
		<div class='classify'>
			<form action='./do_add_news_ctgs.php' method='post'>
			<table >
				<tr>
					<td class='td1'>上级分类</td>
					<td class='td2'><?php echo  infinite_select($ctgs,'ctg','nid','major');?></td>					
				</tr>
				<tr>
					<td class='td1'>分类名称</td>
					<td class='td2'><input type='text' name='major'></td>										
				</tr>
				<tr>
					<td class='td1' colspan='2'><a href=''><input type='image' class='edit' src='../../img/admin/goods_add.png' alt=''></a>
					</td>								
				</tr>
			</table>
			</form>
		</div>
	<div class='clear'></div>
</div><!--1边框-->

<?php
include('../../foot.php');
?>