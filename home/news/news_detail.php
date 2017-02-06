<?php
include('../head.php');
include('../../admin/data.php');
include('../../admin/function.php');

//判断get传值
$aid=isset($_GET["aid"])==true?$_GET["aid"]:exit("非法访问<a href='./news.php'></a>");

$sql = "select * from ts_news_ctgs";
$res = mysql_query($sql);	

?>
	
<head>
	<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/front/news_detail.css' type = 'text/css'>
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
		<?php
			//查询数据库
		    $sql_tl = "select * from ts_news where aid = '{$aid}'";	
			$res_tl = mysql_fetch_assoc(mysql_query($sql_tl));
		?>			
		<table >
		<tr class='item'>
<!-- 新闻主题 -->	
			<td><?php echo $res_tl['title'];?></td>
		</tr>
		<tr class='info'>
			<td>发布时间:<?php echo date('Y年m月d日 H:i:s',$res_tl['ctime']);?></td>		
		</tr>
		<tr class='author'>
			<td>作者:<?php echo $res_tl['author'];?></td>		
		</tr>
		<tr class='report'>			
			<td><?php echo htmlspecialchars_decode($res_tl['content']);?></td>
		</tr>
		<tr>
			<td class='read'>阅读:<?php echo $res_tl['amount_rd'];?></td>
		</tr>
		</table>
		
	</div>							
			
	<div class='clear'></div>
	
<?php
	include('../foot.php');
	//点击本页一次,阅读数量增加一次
	 $i = $res_tl['amount_rd'];
	 $i++;	
  $sql_nums = "update ts_news set amount_rd = '{$i}' where aid = '{$aid}'";
	mysql_query($sql_nums);
?>








