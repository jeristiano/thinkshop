<?php
session_start();
header('content-type:text/html;charset=utf-8');
define('PATH',"http://127.0.0.1/thinkshop/");
?>																		
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">		
		<title>津英课堂后台管理系统</title>		
		<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/admin/head.css' type = 'text/css'>
	</head>
	
<body>
	<div class='wrap_ct'>
		<div class='logo'>
		<?php 
			if(isset($_SESSION['aname'])==true && $_SESSION['aname']!=''){?>				
				
					<img src=<?php echo PATH."img/admin/ad_logo3.png";?> alt=''>							
					<ul class='toolbar'>				
						<li>|&nbsp;<a href=<?php echo PATH."admin/logout.php";?>>注销</a>&nbsp;|</li>
						<li>|&nbsp;管理员: <?php echo $_SESSION['aname'];?>&nbsp;| </li>
					<ul>
		<?php }else{
				//js跳转效果
				function msg($content,$url){
					echo"<script>
							alert('$content');
							location.href='$url';
							</script>";
					}
				msg( "努力尝试后发现您还没登录!","http://127.0.0.1/thinkshop/admin/login.php");
				return;
			}?>		
			
		</div>
		<div class='clear'></div>

		<div class='wrap'>	
			<div class='nav'>
				<ul id='ul1'>
					<li class='bg_tool'>系统设置</li>
					<li class='tl_menu'><a class='ad_users' href=<?php echo PATH."admin/users/ad_users.php";?>>后台用户</a></li>
					<li class='tl_menu'><a class='add_users'href=<?php echo PATH."admin/users/add_users.php";?>>添加后台用户</a></li>
				</ul>

				<ul id='ul2'>
					<li class='bg_tool'>商品管理</li>
					<li class='tl_menu'>
						<a class='goods_ctgs' href=<?php echo PATH."admin/goods/goods_ctgs/goods_ctgs.php";?>>商品分类管理</a>
					</li>
					<li class='tl_menu'>
						<a class='goods_info' href=<?php echo PATH."admin/goods/goods_info/goods_info.php";?>>商品信息管理</a>
					</li>
					<li class='tl_menu'>
						<a class='add_goods_info' href=<?php echo PATH."admin/goods/goods_info/add_goods.php";?>>添加商品信息</a>
					</li>
				</ul>
				<ul id='ul3'>
					<li class='bg_tool'>订单管理</li>
					<li class='tl_menu'>
						<a class='orders' href=<?php echo PATH."admin/orders/order_man.php";?>>订单管理</a>
					</li>
					<li class='tl_menu'><a class='comments' href=<?php echo PATH."admin/comments/comment_man.php";?>>评论管理</a></li>
					
				</ul>

				<ul id='ul4'>
					<li class='bg_tool'>网站配置</li>
					<li class='tl_menu'>
						<a class='add_config' href=<?php echo PATH."admin/config/add_config.php";?>>增加配置</a>
					</li>
					<li class='tl_menu'>
						<a class='ad_config' href=<?php echo PATH."admin/config/ad_config.php";?>>配置修改</a>
					</li>					
				</ul>
				<ul id='ul5'>
					<li class='bg_tool'>新闻管理</li>
					<li class='tl_menu'><a class='news_ctgs' href=<?php echo PATH."admin/news/add_news_ctgs.php";?>>新闻分类</a></li>
					<li class='tl_menu'><a class='addnews' href=<?php echo PATH."admin/news/add_news.php";?>>添加新闻</a></li>
					<li class='tl_menu'><a class='news_man' href=<?php echo PATH."admin/news/edit_news.php";?>>新闻管理</a></li>
				</ul>
			</div>
		
