<?php
include('./admin/data.php');
session_start();
//判断session,如果用户已登录,才可查看数据库订单数量
if( isset($_SESSION['uid'])==true &&$_SESSION['uid']!=''){
	$uid = $_SESSION['uid']; 
	$sql_h = "select oid from ts_orders where uid='{$uid}'";
	$order = mysql_num_rows(mysql_query($sql_h));                                                    
}else{
	$order=0;
}
//配置项
$sql_cfg = "select * from ts_config"; 
$res_cfg = mysql_query($sql_cfg);
$config_cfg = array();

while($row_cfg = mysql_fetch_assoc($res_cfg)){
	$config_cfg[$row_cfg["cfgname_zh"]]=$row_cfg["cfgvalue"];

	}	
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $config_cfg['津英课堂'];?></title>
		<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/front/head.css' type = 'text/css'>
</head>	
	
<body>
	<div class="wrap">
		<div class="toolbar">
			<ul class="toolbar_l">
				<li><a href="http://127.0.0.1/thinkshop/home/mygeniusite/mygenius.php">我的津英</a></li>
				<li>
					<a href="http://127.0.0.1/thinkshop/home/orders/order.php?order=<?php echo $order;?>">我的订单（<?php echo $order;?>）</a>
				</li>

				<li>
					<a href="http://127.0.0.1/thinkshop/home/cars/cart.php">
						我的购物车（
						<?php 
							if(isset($_SESSION['car'])==true && $_SESSION['car']!=''){
							echo count($_SESSION['car']);}else{echo "0";}
						?>）
					</a>
				</li>
			
			</ul>
			<?php 
				if(isset($_SESSION['uname'])==true && $_SESSION['uname']!=''){?>
					<ul class="toolbar_r">
						<li><a href="http://127.0.0.1/thinkshop/home/login/logout.php">|&nbsp;&nbsp;注销&nbsp;&nbsp;|</a></li>
						<li class="color_gray">|&nbsp;&nbsp;<?php echo $_SESSION['uname'];?>&nbsp;&nbsp;|</li>
						<li>Welcome to Geniusite course！</li>
						
					</ul>
			<?php }else{?>
					<ul class="toolbar_r">
					<li><a href="http://127.0.0.1/thinkshop/home/register/register.php">欢迎注册</a></li>
					<li><a href="http://127.0.0.1/thinkshop/home/login/login_editor.php">登录</a></li>
									
				</ul>
										
			<?php }?>		
		</div>
		
		
<!---搜索栏--------->			
	<?php
		if(isset($_GET["ctg"])==true && empty($_GET["ctg"])==false){
			$ctg = $_GET["ctg"];
			$where = "where ctg='{$ctg}'";
			}else{
				$ctg='';
				$where ="where 1";
			}
					
		$p=isset($_GET["p"])==true?$_GET["p"]:1;//页码
		$start = ($p-1)*8; 
		if(isset($_GET['key'])==true){
			$key=$_GET['key'];
			$where .= "&&pname like '%{$key}%'";
		}
		$total_rows=mysql_num_rows(mysql_query("select * from ts_goods {$where} "));
		$shownums=8;//每页显示数量				
		$pages = ceil($total_rows/$shownums);//总页数
		$start = ($p-1)*$shownums; 
		$limit = "limit {$start},{$shownums}";
	?>
	<div class="logo_item">

		<div class="logo_pic" >
			<a href="http://127.0.0.1/thinkshop/homepage.php">
				<img src="http://127.0.0.1/thinkshop/img/frontend/ad_logo3.png" title="">
			</a>
		</div>
			
		<form class='logo_search' action="http://127.0.0.1/thinkshop/homepage.php">
			<input type="hidden" name="p" value="<?php echo $p;?>">
			<input type="hidden" name="ctg" value="<?php echo $ctg;?>">
			<input  class="search_bar" type="text" name="key" placeholder="请输入搜索内容">
			<input class="button" type="image"	src="http://127.0.0.1/thinkshop/img/frontend/search_button.png" name='sub'>
		
		</form>

	</div>

	<div class="nav_bar">
		<ul>
			<li><a href="http://127.0.0.1/thinkshop/homepage.php">首页</a></li>
			<li><a href="http://127.0.0.1/thinkshop/home/mygeniusite/mygenius.php">视频下载</a></li>				
			<li><a href="###">津英论坛</a></li>
			<li><a href="###">行业动态</a></li>				
			<li><a href="http://127.0.0.1/thinkshop/home/news/news.php">新闻</a></li>			
			<li><a href="http://127.0.0.1/thinkshop/home/mygeniusite/mygenius.php">联系客服</a></li>
		</ul>
	
	</div>
		