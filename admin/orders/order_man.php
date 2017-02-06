<?php
include('../../head.php');
include('../data.php');
include('../function.php');
?>
<head>
	<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/admin/order_man.css' type = 'text/css'>	
</head>
	<div class='win_main'>
		<div class='location'>
			<span><a href="../../admin.php">首页</a>&nbsp;&nbsp;&gt;</span>
			<span>订单管理</span>
		</div>
				
		<div class='ad_frm'>
			<div class='location'>
				<span>订单管理</span>
			</div>
				
				
				
				
<!---订单图表主页-->		
		<div class='classify'>
				
			<?php
			//分页
			$p=isset($_GET["p"])==true?$_GET["p"]:1;//页码
			$total_rows=mysql_num_rows(mysql_query("select * from ts_orders"));
			$shownums = 2;//每页显示数量				
			$pages = ceil($total_rows/$shownums);//总页数
			$start = ($p-1)*$shownums; 
			$limit = "limit {$start},{$shownums}";
			$query  = "select * from ts_orders order by status  {$limit}  ";
			$result = mysql_query($query);

			//从ts_orders 循环取出所有数据,放在二维数组里
			$info=array();
			while($row=mysql_fetch_assoc($result)){
				$goods = json_decode($row['goods'],true);
				 $oid=$row['oid'];
			?>
				
			<table class='table'>
				<tr>
					<td colspan='9' class='td1'>
						订单号:<?php echo $row['onum'];?>&nbsp;&nbsp;
						时间:<?php echo date('Y-m-d H:i:s',$row['ctime']);?>
					</td>
				</tr>
				<tr class='tr2'>					
					<td class='td2'>购买用户</td>
					<td class='td3'>商品图片</td>
					<td class='td4'>商品名称</td>
					<td class='td5'>商品价格</td>
					<td class='td6' >数量</td>
					<td class='td7' >购买时间</td>
					<td class='td8' >地址</td>
					<td class='td9' >电话</td>
					<td class='td10' >备注留言</td>
					
				</tr>
		
			<?php 
				//循环遍历goods得到,json里商品pid

				foreach($goods as $v){
					$pid=$v['pid'];
					$sta= mysql_fetch_assoc(mysql_query("select * from ts_goods  where pid='{$pid}'"));?>
				<tr>
				<?php	
						$uid = $row['uid'];
						$sql = "select uname from ts_users where uid='{$uid}'";
						$res1 = mysql_query($sql);
						$uname = (mysql_fetch_assoc($res1));
				?>
					<td><?php echo $uname['uname'];?></td>
					<td >
						<img alt=''src="http://127.0.0.1/thinkshop/admin/goods/upload/thumbs/
							<?php echo $sta['thumbs'];?>" class='img'>
					</td>
					<td><?php echo $sta['pname'];?></td>
					<td>&yen;<?php echo $sta['ditprice'];?></td>
					<td><?php echo $v['nums'];?></td>
					<td><?php echo date('Y-m-d H:i:s',$row['ctime']);?></td>
					<!-- html特殊字符解码 -->
					<td><?php echo htmlspecialchars_decode($row['addr']);?></td>
					<td><?php echo $row['tel'];?></td>
					<td><?php echo $row['ps'];?></td>
					
				</tr>
			
			<?php }?>
				<tr>
					
					<?php
				
						$status=array(1=>'买家已付款',2=>'已发货',3=>'买家已收货');
						$res = $status[$row['status']];
						if($row['status']==1){
							echo "<td colspan='9' class='td11'><a href='./do_order_ad.php?oid={$oid}'>买家已付款&nbsp;&nbsp;现在发货</a></td>";
						}else{
							if($row['status']==2){
								echo "<td colspan='9' class='td12'>已发货</td>";
							}else{
								echo "<td colspan='9' class='td13'>买家已收货</td>";
								}
						}
					?>		
						
				</tr>	
			</table>			
				
			<?php }?>
<!-- 分页内容 -->
			<div class="nextpage">
				<ul>	
					<li class="block"><a href="./order_man.php?p=<?php echo $pages;?>">末页</a>
					</li>	
					<li class="block">
						<a href="./order_man.php?p=
						<?php $next = $p+1;if($next<=$pages){echo $next;}else{echo $pages;}?>">下一页
						</a>
					</li>
			<?php 
				for($i=$pages;$i>=1;$i--){?>				
					<li class="block"><a href="?p=<?php echo $i;?>"><?php echo $i;?></a></li>					
			<?php }?>						
					<li  class="block"><a href="?p=1">首页</a></li>						
				</ul>						
			</div>	
			
<!-- 分页内容 -->	
		</div>
  </div>
</div><!--2边框-->
	<div class='clear'></div>

</div><!--1边框-->

<?php
include('../../foot.php');
?>