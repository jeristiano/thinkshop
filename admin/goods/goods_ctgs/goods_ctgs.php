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
	<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/admin/goods_ctgs.css' type = 'text/css'>
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
					<table >
					<tr class='tr_head'>
						<td class='td1'>分类名称</td>
						<td class='td2'>上级分类</td>
						<td class='td3'>操作</td>
					</tr>


			<?php 
				foreach($ctgs as $v){?>
				
				<form action='./do_modify_ctgs.php' method='post'>
					<input class='input' type='hidden' name='cid' value=<?php echo $v['cid']?>>
					<tr>
						
						<td >
							<?php echo str_repeat('--',$v["level"])?>
							<input  class='input' type='text' name='cname' 
								value=<?php echo $v['cname'];?>>
						</td>
						<td >
							<?php echo  infinite_select($ctgs,'ctg','cid','cname',$v["fid"]);?>
						</td>
						<td ><!--编辑--><!--删除-->
							<a href='###'><img class='edit' onclick='del(<?php echo $v['cid'];?>)' src='../../../img/admin/ad_del.png' alt=''></a>
							<input  class='edit' type='image'  src='../../../img/admin/ad_edit.png'>
						</td>
					</tr>
				</form>
			<?php }?>


					<tr><!--添加-->
						<td colspan='3'>
							<a href='./add_ctgs.php'>
								<img  class='edit' src='../../../img/admin/goods_add.png' alt=''>
							</a>
						</td>
						
					</tr>
					</table>
				
				<div>		



			</div>
				
				
	</div>
</div><!--2边框-->
<div class='clear'></div>

</div><!--1边框-->

	<script>
		var del = function(cid){
			if(confirm('确认删除吗?删除后无法恢复!')==true){
				location.href='./del.php?cid='+cid;
			
			}
		}
	</script>

<?php
include('../../../foot.php');
?>