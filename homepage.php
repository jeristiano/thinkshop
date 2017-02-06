<?php
include('./home/head.php');
include('./admin/data.php');
 //数据库中取出一级分类
$sql ='select * from ts_goods_ctgs where fid=0';
$res=mysql_query($sql);

?>	
<head>
	<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/front/homepage.css' type = 'text/css'>
	
</head>	
			
		
<!--二级分类页面start-------->

			<div class="nav">
				<ul class="ul">
					<li><a href="./homepage.php">全部</a></li>
		<?php		
			while($row=mysql_fetch_assoc($res)){?>					
					<li class="nav1">
						<a href=""><?php echo $row['cname'];?></a>
						<ul class="nav2">					
					<?php							
						$ccid=$row['cid'];
						$sql2 ="select * from ts_goods_ctgs where fid='{$ccid}'";
						$res2=mysql_query($sql2);							
						while($row2=mysql_fetch_assoc($res2)){?>						
							<li>
								<a href="./homepage.php?ctg=<?php echo $row2['cid'];?>"><?php echo $row2['cname'];?></a>
							</li>					
					<?php }?>
						</ul>	
					</li>		
		<?php }?>					
				</ul>
						
			</div>
		
<!--二级分类页面end-->	
	
<!-- 主页面内容 -->			
			<div class="homepage">
				<?php 
				$query ="select * from ts_goods {$where} {$limit}";
				$res=mysql_query($query);
				while($row=mysql_fetch_assoc($res)){?>
			
				<ul class="hmpg_ct1">

					<li>
						<a href="./home/homepage/detail.php?pid=<?php echo $row['pid'];?>">
							<img src="http://127.0.0.1/thinkshop/admin/goods/upload/thumbs/<?php echo $row['thumbs'];?>"></a>
					</li>
					<li class="ditprice">&yen;<?php echo $row['ditprice'];?></li>

					<li class="price">&yen;<?php echo $row['price'];?></li>
						
					<li class="pname">
						<a href="./home/homepage/detail.php?pid=<?php echo $row['pid'];?>"><?php echo $row['pname'];?></a>
					</li>

					<li class="teacher">T:讲师: <?php echo $row['teacher'];?></li>		
				
				</ul>
			<?php }?>								
				
			</div>							
			
			<div class='clear'></div>
<!--分页内容---->
			<div class="nextpage">
				<ul>						
					<li class="block"><a href="./homepage.php?p=<?php echo $pages;?>&ctg=<?php echo $ctg;?>">末页</a>
					</li>
					
					<li class="block"><a href="./homepage.php?p=<?php if($p<$pages){echo $p+1;}else{echo $pages;}?>&ctg=<?php echo $ctg;?>">下一页</a>						
					</li>
			<?php 
				for($i=$pages;$i>=1;$i--){ ?>	
				
					<li class="block">							
						<a href="?p=<?php echo $i;?>&ctg=<?php echo $ctg;?>"><?php echo $i;?></a>
					</li>	
					
			<?php }?>	
					<li class="block">
						<a href="./homepage.php?p=<?php if($p>1){echo $p-1;}else{echo 1;}?>&ctg=<?php echo $ctg;?>">上页</a>
					</li>	
					<li class="block">
						<a href="./homepage.php?ctg=<?php echo $ctg;?>">首页</a>
					</li>					
				</ul>
			</div>
			
<!---分页内容---->			
<?php
	include('./home/foot.php');
?>