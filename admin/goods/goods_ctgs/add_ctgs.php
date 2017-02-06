<?php
 include('../../../head.php');
include('../../../admin/data.php');
include('../../../admin/function.php');
$sql ='select * from ts_goods_ctgs';
$res = mysql_query($sql);
$ctgs=array();
while($row=mysql_fetch_assoc($res)){
	$ctgs[]=$row;
}
$ctgs=infinite_ctg($ctgs,array("0","fid","cid"));

?>
	
<head>
	<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/admin/add_ctgs.css' type = 'text/css'>
</head>


	<div class='win_main'>
		<div class='location'>
			<span><a href="../../admin.php">首页</a>&nbsp;&nbsp;&gt;</span>
			<span>商品分类</span>
		</div>
				
			<div class='ad_frm'>
				<div class='location'>
					<span>商品分类</span>
				</div>
				
				<div class='classify'>
					<form action='./do_add_ctgs.php' method='post'>
						<table >
						<tr>
							<td class='td1'>上级分类</td>
							<td class='td2'>
								<?php echo  infinite_select($ctgs,'ctg','cid','cname');?>
							</td>
							
						</tr>
						<tr>
							<td class='td1'>分类名称</td>
							<td class='td2'>
								<input type='text' name='cname' >
							</td>
							
						</tr>
						<tr>
							<td class='td1' colspan='2'>
								<a href=''>
								<input type='image' class='edit' src='../../../img/admin/goods_add.png' alt=''>
							</a>
						
							</td>
							
							
						</tr>
						</table>

					</form>
				
				<div>		



			</div>
				
				
	</div>
</div><!--2边框-->
<div class='clear'></div>

</div><!--1边框-->

	



<?php
include('../../../foot.php');
?>