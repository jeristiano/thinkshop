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
<html>
<head>
	<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/admin/goods_info.css' type = 'text/css'>
	
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
					<tr class='tr_head'>
						<td class='td1'>商品编号</td>
						<td class='td2'>商品图片</td>
						<td class='td30'>商品名称</td>
						<td class='td4'>商品价格</td>
						<td class='td5'>优惠价格</td>
						<td class='td6'>分类</td>
						<td class='td7'>库存</td>
						<td class='td8'>创建时间</td>
						<td class='td10'>操作</td>
					</tr>

					<tr class='tr_cont'><!--添加-->
			<?php 
				//分页
				$p=isset($_GET["p"])==true?$_GET["p"]:1;//页码
				$total_rows=mysql_num_rows(mysql_query("select * from ts_goods"));
				$shownums = 4;//每页显示数量				
				$pages = ceil($total_rows/$shownums);//总页数
				$start = ($p-1)*$shownums; 
				$limit = "limit {$start},{$shownums}";
				$query  = "select * from ts_goods order by ctime desc {$limit} ";
				$result = mysql_query($query);

				//从ts_goods 循环取出所有数据,放在二维数组里
				$info=array();
				while($row=mysql_fetch_assoc($result)){
					$info[]= $row;
				
			}?>						
			<?php 
				
			foreach($info as $lv){?>
					<tr>						
						<td class='td1'><?php echo $lv['pid'];?></td>
						
						<td><img class='thumbs' alt =''src="http://127.0.0.1/thinkshop/admin/goods/upload/thumbs/<?php echo $lv['thumbs'];?>">
						</td>
						<td class='td3'><?php echo $lv['pname'];?></td>
						<td>&yen;<?php echo $lv['price'];?></td>
						<td>&yen;<?php echo $lv['ditprice'];?></td>
						<td><?php echo infinite_select($ctgs,'ctg','cid','cname',$lv['ctg']);?></td>
						<td><?php echo $lv['nums'];?>个</td>
						<td class='td3'><?php echo date('Y/m/d H:i:s',$lv['ctime']);?></td>
						<td >
							<a href='###'>
								<img class='edit' onclick='del(<?php echo $lv['pid'];?>)' src='../../../img/admin/ad_del.png' alt=''>
							</a>
							<a href='./edit_goods_info.php?pid=<?php echo $lv['pid'];?>'>
								<img  class='edit'  src='../../../img/admin/ad_edit.png'>
							</a>
						</td>						
					</tr>
			<?php }?>	
		
						<td colspan='10'>
							<a href='./add_goods.php'><img class='add' src='../../../img/admin/goods_add.png' alt=''>
							</a>
						</td>
				 
				</table>
	<!-- 分页内容 -->
				<div class="nextpage">
					<ul>	
						<li class="block"><a href="?p=<?php echo $pages;?>">末页</a>
						</li>	
						<li class="block">
							<a href="?p=<?php if($p<$pages){echo $p+1;}else{echo $pages;}?>">下一页
							</a>
						</li>
				<?php 
					for($i=$pages;$i>=1;$i--){?>				
						<li class="block">					
							<a href="?p=<?php echo $i;?>"><?php echo $i;?></a>
						</li>								
				<?php }?>
						<li class="block">
							<a href="?p=<?php if($p>1){echo $p-1;}else{echo 1;}?>">上一页
							</a>
						</li>
						<li  class="block"><a href="?p=1">首页</a></li>						
					</ul>
				</div>
	<!-- 分页内容 -->	
			</div>		
		
		</div>
		
	</div>
<!--2边框-->
<div class='clear'></div>

</div><!--1边框-->

<script>
	var del = function(pid){
		if(confirm('确认删除吗?删除后无法恢复!')==true){
			location.href='./del_goods_info.php?pid='+pid;
		
		}
	}
</script>

<?php
include('../../../foot.php');
?>