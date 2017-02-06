<?php
include('../../admin/data.php');
include('../..//admin/function.php');
include('../head.php');

//未登录,不能查看订单
if(@empty($_SESSION['uid'])==true){

	msg("您还未登录","../login/login_editor.php");
	return;
}
//从数据库取出订单 按订单倒序排列
$uid=$_SESSION['uid'];
$sql = "select * from ts_orders where uid='{$uid}' order by oid desc";
$res = mysql_query($sql);
?> 

<head>
	<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/front/order.css' type = 'text/css'>	
</head>	

<!-- 订单开始 -->
		<div class="orderlist">

			<table class='od_table'>
				<tr >
					<td  class='td1'>图片</td>
					<td class='td2'>商品</td>
					<td class='td3'>价格</td>
					<td class='td4'>数量</td>
					<td class='td5'>交易状态</td>
				</tr>

			</table >
			<?php
				while($row = mysql_fetch_assoc($res)){
					 $goods = json_decode($row['goods'],true);
				?>
						
			<table  class='od_table2'>
				<tr>
					<td class='td0' colspan='5'>
						<?php echo date('Y-m-d H:i:s',$row['ctime']);?>&nbsp;&nbsp;订单号:<?php echo $row['onum'];?>
					</td>
					
				</tr>
			<?php
				//遍历出json-goods数组	
				foreach($goods as $v){
					 $pid=$v['pid'];
					$sta= mysql_fetch_assoc(mysql_query("select * from ts_goods where pid='{$pid}'"));
			?>						
			
				<td class='td1'>
					<img alt='' src="http://127.0.0.1/thinkshop/admin/goods/upload/thumbs/<?php echo $sta['thumbs'];?>">
				</td>
					<td  class='td2'><?php echo $sta['pname'];?></td>
					<td  class='td3'>&yen;<?php echo $sta['ditprice'];?></td>
					<td  class='td4'><?php echo $v['nums'];?></td>
					
					
				<?php 
					$oid = $row["oid"];
					//三种状态放进数组
					$status = array(1=>"待发货",2=>"卖家已发货",3=>"已收货");
					
					if($row["status"]==1){
						echo "<td class='td5'>待发货</td>";
					}
					if($row["status"]==3){
						//如果已经评价完成就不能再评价了;
						$sql="select * from ts_comments where pid='{$pid}' && oid='{$oid}'";
						$comt =  mysql_num_rows(mysql_query($sql));
						//如果返回结果不为0,就不能评价							
						if($comt!=0){
							echo "<td class='td5'>已评价</td>";
						}else{
							echo "<td class='td5'><a href='../comments/comment.php?pid={$pid}&oid={$oid}'>去评价</a></td>";
							}
					}else{
						if($row["status"]==2){
							$oid = $row["oid"];
							echo "<td class='td5'><a href='./confirm.php?oid={$oid}'>确认收货</a></td>";
					}
				}?>
								
				</tr>	
							
			<?php }?>
				
				</table>
		
			<?php }?>		

			<div  class="clear"></div>
				
			<div class="submit">
				<span>
				<a href="../../homepage.php"><img class="adjust"  src="../../img/frontend/cart5.png" title="继续购物"></a>
				</span>
			</div>
			
		</div>
		<div class='block'></div>

<?php
include('../foot.php');
?>
