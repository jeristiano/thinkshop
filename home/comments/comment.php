<?php
include('F:/121/thinkshop/admin/data.php');
include('F:/121/thinkshop/home/head.php');
if(isset($_GET['oid'])==false){
	exit('非法访问');
}
//pid商品信息

$oid = $_GET['oid'];
$pid = $_GET['pid'];
$sql = "select * from ts_goods where pid='{$pid}'";
$res = mysql_query($sql);
$row = mysql_fetch_assoc($res);
//订单信息
$que = "select * from ts_orders where oid='{$oid}'";
$resu = mysql_query($que);

//唯一结果
$tem = mysql_fetch_assoc($resu);
//json转码
$feed = json_decode($tem['goods'],true);
$uid = $tem['uid'];
?> 
 <head>
	<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/front/comments.css' type = 'text/css'>
</head>	
	
			

<!-----评论-------------->
		<div class="orderlist">

			<table class='od_table'>
				<tr >
					<td  class='td1'>图片</td>
					<td class='td2'>商品</td>
					<td class='td3'>价格</td>
					<td class='td4'>数量</td>
					<td class='td5'>购买时间</td>
				</tr>

			</table>

			<table  class='od_table2'>
					<tr>
						<td class='td1'>
							<img alt='' src="http://127.0.0.1/thinkshop/admin/goods/upload/thumbs/<?php echo $row['thumbs'];?>">
						<td class='td2'><?php echo $row['pname'];?></td>
						<td class='td3'>&nbsp;&yen;<?php echo $row['ditprice'];?></td>
						<td class='td4'>&nbsp;&nbsp;<?php echo $feed[$pid]['nums'];?></td>
						<td class='td5'><?php echo date('Y-m-d H:i:s',$tem['ctime']);?></td>
					</tr>
			</table>
			
				<form action='./do_comment.php' method='post'>
						<input type="hidden" name="pid"  value="<?php echo $pid;?>">
						<input type="hidden" name="oid" value="<?php echo $oid;?>">
						<input type="hidden" name="uid" value="<?php echo $uid;?>">
						<textarea class='textarea' name="comment" placeholder='说点什么吧,哪怕是脏话'></textarea>
						<input class='submit' type="image" name='sub' src='../../img/frontend/submit_com.png' '>
				</form >
		
		<div  class="clear"></div>
	
		</div>
<!------评论结束--------->
		



<?php
include('F:/121/thinkshop/home/foot.php');
?>
