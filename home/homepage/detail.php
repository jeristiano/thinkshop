<?php
 include('../../admin/data.php');
 include('../head.php');
 if(isset($_GET['pid'])==false){
	exit('非法访问');
 }
 $pid = $_GET['pid'];
 
//产品信息
$sql ="select * from ts_goods where pid='{$pid}'";
$res = mysql_query($sql);
$row = mysql_fetch_assoc($res);
//评论信息
$sql_cm = "select * from ts_comments where pid='{$pid}' ";
$res_cm = mysql_query($sql_cm);

//订单信息
$sql_or = "select * from ts_orders";
$res_or = mysql_query($sql_or);
//循环取出每个订单商品的信息进行json转码,
$sum =0;
while($v = mysql_fetch_assoc($res_or)){
	$goods= $v['goods'];
	$goods = json_decode($goods,true);
//循环中没有此商品pid,默认数量为0
	if(isset($goods[$pid]['nums'])==false){
		$goods[$pid]['nums']=0;	
	}
	$sum +=$goods[$pid]['nums'];
}
?>

<head>
	<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/front/detail.css' type = 'text/css'>
</head>			
					
<!---主页内容-->		
	<div class="product">
		
		<div class='product_l'>		

		<?php 
		//从数据库取出数组
		$v = explode(',',$row['imgs']);?>
		 	<img id='bigimg' src='http://127.0.0.1/thinkshop/admin/goods/upload/imgs/<?php echo $v[0];?>' alt=''>
			<img onmousemove='change(this)' class='smpic' src='http://127.0.0.1/thinkshop/admin/goods/upload/imgs/<?php echo $v[0];?>' alt=''>	
			<img onmousemove='change(this)' class='smpic' src='http://127.0.0.1/thinkshop/admin/goods/upload/imgs/<?php echo $v[1];?>' alt=''>			
			
		</div>
		
		<div class="product_r">
			
			<form method="post" action="../cars/add_cart.php">
				
				<table class="table" >
					<input type="hidden" name='pid' value="<?php echo $row['pid'];?>">
					<tr class="tr0">
						<td ><?php echo $row['pname'];?></td>
					</tr>

					<tr class="tr1"><td>&yen;<?php echo $row['ditprice'];?></td>
						
					</tr>

					<tr class="tr2">
						
						<td>
							<span style='text-decoration:line-through;'>原价:&yen;<?php echo $row['price'];?></span>
						</td>
						
					</tr>

					<tr class="tr3">
						<td >讲师：<?php echo $row['teacher'];?></td>
						
					</tr>

					<tr class="tr4">
						<td><?php echo $row['info'];?></td>
						
					</tr>

					<tr class="tr5">
						
						<td>已购买数:<?php echo $sum;?></td>
						
					</tr>
					
					<tr class="tr7">
						<td>
							<input type="image" src="../../img/frontend/buy.png" alt="" title="立即购买">
						</td>
						
					</tr>
				</table>
			</form>
			
		</div>
		<div class="clear"></div>
	</div> 
<!---主页内容结束-->
	<div class="clear"></div>

	<div class="course">
		<span class="course_top">课程详情：</span>
		<span class='course_detail'><?php echo htmlspecialchars_decode($row['description']);?></span>
	</div>

<!---评价内容-->
		<div class="comment">
			
			<div class="comment_cont1">学员评价:</div>
			
		
			<?php
				$p=isset($_GET["p"])==true?$_GET["p"]:1;
				$total_rows=mysql_num_rows(mysql_query("select * from ts_comments where pid = '{$pid}' "));
				$shownums =4;//每页显示数量
				$pages = ceil($total_rows/$shownums); 
				$limit = "limit {$start},{$shownums}";
				$sql_ct = "select * from ts_comments where pid = '{$pid}' {$limit} ";
				$res_ct = mysql_query($sql_ct);
				
			if(mysql_num_rows($res_ct)==true){
					while($row_cm = mysql_fetch_assoc($res_ct)){
						if($row_cm['status']==2){?>
					<?php
						//从订单中取出,uid
						$uid = $row_cm['uid'];
					
						$sql_u = "select * from ts_users where uid='{$uid}'";
						$re_u = mysql_query($sql_u);
						while($res_u = mysql_fetch_assoc($re_u)){?>
			<table class='com_content'  >							
				<tr>
					<td class='td1'>用户名:<?php echo $res_u['uname'];?></td>
				</tr>
				
				<tr>
					<td class='td2'><?php echo htmlspecialchars_decode($row_cm['comment']);?></td>
				</tr>

				<tr>
					<td class='td1'>评论时间:<?php echo date('Y-m-d H:i:s',$row_cm['ctime']);?></td>
				</tr>
				<?php }?>
				<?php }?>
			</table>								
				<?php }}else{?>
			<table class='com_content' >	
				<tr>
					<td>当前商品还没有评价</td> 
				</tr>
			<?php }?>
				
			</table>
			</div>
<!-- 评价内容结束 -->			
							

		<div class="nextpage">
	<?php
	//如果没有评论,页数为零,不输出分页内容
		if($pages!=0){?>	
			<ul>	
				<li class="block"><a href="./detail.php?p=<?php echo $pages;?>&pid=<?php echo $pid;?>">末页</a></li>	
				<li class="block">
					<a href="./detail.php?p=
						<?php if($pages<=1){echo $next=$p;}else{echo $next=$p+1;}?>&pid=<?php echo $pid;?>">下一页
					</a>
				</li>
		<?php 
			for($i=$pages;$i>=1;$i--){ ?>				
				<li class="block">					
					<a href="?p=<?php echo $i;?>&pid=<?php echo $pid;?>"><?php echo $i;?></a>
				</li>								
		<?php }?>
				<li class="block">
					<a href="./detail.php?p=
						<?php if($p>1){echo $p;}else{echo $p=1;}?>&pid=<?php echo $pid;?>">上一页
					</a>
				</li>
				<li  class="block"><a href="?p=1&pid=<?php echo $pid;?>">首页</a></li>						
			</ul>
			
	<?php }?> 		
	
		</div>
	
<script>
	var change=function(temp){
		var src =temp.src;
		bigimg.src=src;
	}	
</script>			
	
<?php
	include('../foot.php');
?>