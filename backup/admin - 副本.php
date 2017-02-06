<?php
session_start();
header('content-type:text/html;charset=utf-8');
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		
		<title>欣才课堂后台管理系统</title>
		<style>
		/**初始化信息**/
		*{padding:0px;margin:0px;font-size:16px;color:#000000;font-family:微软雅黑;text-decoration:none;list-style-type:none;}
		
		/*logo信息栏*/
		.logo ul{float:right;}
		.logo ul li{float:right;line-height:20px;height:20px;padding:20px 0px;margin-right:45px;}
		.logo ul li a:hover{color:#1690cf;}
		.logo img{width:200px;position:relative;left:20px;top:2px;}
	
}
		
		/*左导航栏*/
		.nav{width:200px;}
		.nav ul{width:200px;border-radius:10px;border:1px solid #e7e7e7;margin:10px 20px;}
		
		.nav ul li{height:20px;line-height:20px;padding:12px 8px;}
		.nav ul li a:hover{color:#1690cf;}
		.tl_menu{border-top:1px solid #e7e7e7;}
		.bg_tool{background:#32465d;color:#ffffff;border-top-left-radius:6px;border-top-right-radius:6px;}
		/*右侧主栏*/
		.win_main{width:1060px;height:560px;margin:0px 20px;}
		/*导航栏*/
		.location{width:1060px;height:50px;background:#32465d;margin:15px 0;border-radius:4px;}
		.nav,.win_main{float:left;}
		.location span{display:block;height:20px;line-height:20px;padding:14px 20px;}
		.location span a{color:white;}
		.location span a:hover{color:#ff6700;}
		/*主操作栏*/
		.info_main{width:900px;height:400px;background:#f5f5f5;margin:35px auto;}
		.info_main{background:url('./img/admin/ad_pic1.png')no-repeat 50% 50%;}
		</style>
	</head>
	
	<body>
		<div class='wrap'>
			<div class='logo'>
			<?php 
				if(isset($_SESSION['aname'])==true && $_SESSION['aname']!=''){?>
					
					
						<img src='./img/admin/ad_logo.png' alt=''>
								
						<ul class='toolbar'>
					
							<li><a href='./admin/logout.php'>注销</a></li>
							<li>管理员: <?php echo $_SESSION['aname'];?> </li>
						<ul>
				

				<?php }else{
					exit( "糟糕,非法访问模式,请先登录!&nbsp;&nbsp;<a href='./admin/login.php'>点我</a>");

			}
			
			
			?>
			</div>
			<div class='nav'>
				<ul>
					<li class='bg_tool'>系统设置</li>
					<li class='tl_menu'><a href="./users/ad_users">后台用户</a></li>
					<li class='tl_menu'><a href="./users/add_users">添加后台用户</a></li>
				</ul>

				<ul>
					<li class='bg_tool'>商品管理</li>
					<li class='tl_menu'><a href="./users/ad_users">添加商品</a></li>
					<li class='tl_menu'><a href="./users/add_users">删除商品</a></li>
					<li class='tl_menu'><a href="./users/add_users">修改商品</a></li>
				</ul>
				<ul>
					<li class='bg_tool'>订单管理</li>
					<li class='tl_menu'><a href="./users/ad_users">添加订单</a></li>
					<li class='tl_menu'><a href="./users/add_users">删除订单</a></li>
					<li class='tl_menu'><a href="./users/add_users">修改订单</a></li>
				</ul>
			</div>
			<div class='win_main'>
				<div class='location'>
					<span><a href="./admin.php">首页</a></span>
					
				</div>
				<div class='info_main'></div>
			</div>
		</div>
	</body>


</html> 