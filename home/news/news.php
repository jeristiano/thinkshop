<?php
if(@$_GET["nid"]==6){?>
	<img style='width:1300px; height:600px;'src="http://127.0.0.1/thinkshop/img/frontend/not.jpg">
<?php exit;}?>
<?php
include('F:/121/thinkshop/home/head.php');
include('F:/121/thinkshop/admin/data.php');
include('F:/121/thinkshop/admin/function.php');
$sql = "select * from ts_news_ctgs";
$res = mysql_query($sql);
?>
	
<head>
	<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/front/news.css' type = 'text/css'>
</head>	

	<div class='navigator'>
		<ul class='ul'>	
	<?php
		while($row = mysql_fetch_assoc($res)){ ?>
			<li><a href="./news.php?nid=<?php echo $row['nid'];?>"><?php echo $row['major'];?></a></li>			
	<?php }?>		
		</ul>
	</div>
	
<!-- 主页面内容 -->			
	<div class="news" >		
		<ul class='ul'>
		<?php
			//设置默认新闻主题
			$nid=isset($_GET["nid"])==true?$_GET["nid"]:1;
			$sql_nw = "select * from ts_news_ctgs where nid = '{$nid}'";
			$res_nw = mysql_query($sql_nw);
			$row_nw = mysql_fetch_assoc($res_nw)
		?>
			<li class='title'><?php echo $row_nw['major'];?></li>

		<?php
		    $sql_ct = "select * from ts_news  where ctg = '{$nid}' order by aid desc";
			$res_ct = mysql_query($sql_ct);			
			while($row_ct = mysql_fetch_assoc($res_ct)){ ?>

			<li><a href="./news_detail.php?aid=<?php echo $row_ct['aid'];?>"><?php echo $row_ct['title'];?></a></li>	
			
		<?php }?>	

			<li><?php echo $row['ctg'];?></li>				
		</ul>
		
	</div>							
			
	<div class='clear'></div>
	
<?php
	include('F:/121/thinkshop/home/foot.php');
?>