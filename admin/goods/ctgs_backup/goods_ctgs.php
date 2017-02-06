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
				.ad_frm{width:1060px;margin:20px 0px;height:440px;border:1px solid #e6e6e6;border-radius:6px;}
			/*商品分类*/
				/*表格属性*/
				table{border-collapse:collapse;margin:0 auto;}
				.classify td{height:35px;font-size:16px;border:1px solid #c1c1c1;}
				
				.classify .td1 {width:450px;font-weight:bold;}
				.classify .td2 {width:350px;font-weight:bold;}
				.classify .td3 {width:150px;font-weight:bold;}
				.input{width:250px;height:20px;}
				.edit{width:60px;height:28px;position:relative;left:10px;}

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
					<table >
					<tr>
						<td class='td1'>分类名称</td>
						<td class='td2'>上级分类</td>
						<td class='td3'>操作</td>
					</tr>


			<?php 
				foreach($ctgs as $v){?>
				
				<form action='./do_modify_ctgs.php' method='post'>
					<input class='input' type='hidden' name='cid' value=<?php echo $v['cid']?>>
					<tr>
						
						<td ><!--删除-->
							<?php echo str_repeat('--',$v["level"])?>
							<input  class='input' type='text' name='cname' 
								value=<?php echo $v['cname'];?>>
						</td>
						<td >
							<?php echo  infinite_select($ctgs,'ctg','cid','cname',$v["fid"]);?>
						</td>
						<td ><!--编辑-->
							<a href='###'><img class='edit' onclick='del(<?php echo $v['cid'];?>)' src='../../img/admin/ad_del.png' alt=''></a>
							<input  class='edit' type='image'  src='../../img/admin/ad_edit.png'>
						</td>
					</tr>
				</form>
			<?php }?>


					<tr><!--添加-->
						<td colspan='3'>
							<a href='./add_ctgs.php'>
								<img  class='edit' src='../../img/admin/goods_add.png' alt=''>
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
include('F:/121/thinkshop/foot.php');
?>