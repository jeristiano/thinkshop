<?php
include('F:/121/thinkshop/head.php');
include('F:/121/thinkshop/admin/data.php');
include('F:/121/thinkshop/admin/function.php');


	$sql ='select * from ts_goods_ctgs';
	$res = mysql_query($sql);
	$ctgs=array();
	while($row=mysql_fetch_assoc($res)){
		$ctgs[]=$row;
	}


$ctgs=infinite_ctg($ctgs,array("0","fid","cid"));


?>
	<html>
		<head>
			<style>
			/*当编辑用户管理时,为此条框加伪类*/
				#ul2{border:1px solid #32465d;}
			

			/*右边框样式*/
				.location span{float:left;display:block;height:20px;line-height:20px;}
				.location span{color:white;font-size:14px;padding:15px 8px;}
				.location span a{font-size:14px;}
				.location{margin-top:0px}
				.location span{color:white;font-size:14px;padding:15px 4px;}
				.win_main{margin-top:15px;}
				.ad_frm{width:1060px;margin:20px 0px;height:400px;border:1px solid #e6e6e6;border-radius:6px;}
			/*商品分类*/
				/*表格属性*/
				table{border-collapse:collapse;margin:5% 10%;}
				.classify td{height:65px;font-size:16px;}
				
				.classify .td1 {width:80px;font-weight:bold;}
				.classify .td2 {width:400px;font-weight:bold;}
				.classify .td2 input{width:350px;height:35px;border-radius:2px;border:1px solid #d8d8d8;}
				
				.edit{width:62px;height:30px;position:relative;left:80px;}

			</style>
		</head>
	</html>

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
								<input type='image' class='edit' src='../../img/admin/goods_add.png' alt=''>
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
include('F:/121/thinkshop/foot.php');
?>