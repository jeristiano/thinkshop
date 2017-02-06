<?php
$link=@mysql_connect('127.0.0.1','root','root') or exit('服务器链接失败');
mysql_select_db('thinkshop') or exit('数据库不存在');
mysql_query('set names utf8');
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
		<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/front/login.css' type = 'text/css'>
	</head>		
	
	<body >
		<div class='wrap'>	
			<div class='logo_w'>			
				
					<a href="http://127.0.0.1/thinkshop/homepage.php"><img src='../../img/frontend/fr_logo.png'></a>
					
					<div class='reg'>
						<a href='../register/register.php'>注册</a>
					</div>
					
			</div>			
			

			
							
			<div class="form">
				<form  action="./do_login.php" method="post" id='frm'>
					<table >
						<tr>
							<td class='fr_logo'>
								<img src='../../img/frontend/fr_logo2.png' alt=''>
							</td>
							
						</tr>
						<tr>
							<td class='input'>
								<input  type='text' name='uname' placeholder='账号'>
							</td>
							<td>
								<span id='uname'></span>
							</td>
						</tr>
						<tr>
							<td class='input'>
								<input type='password' name='pwd' placeholder='密码'>
							</td>
						</tr>

						<tr>
							<td class='login'>
							<img onclick='valid();'
								name='sub' src='../../img/frontend/fr_login.png'>
							</td>
						</tr>
						<tr>
							<td class='forgetpwd'><a href="###">忘了密码?</a>
							</td>
						</tr>

					</table>
					
	
				</form>
				
			</div>
			<div class='clear'></div>
<!-- 底部信息栏 -->	
			<div class="foot">				
				<ul>	
		<?php
			
			$que = "select * from ts_config where cfgtype = 'textarea'";
			$resu = mysql_query($que);
			while($row = mysql_fetch_assoc($resu)){?>
			
					<li><a href="http://127.0.0.1/thinkshop/home/news/news.php?nid=7"><?php echo $row['cfgname_zh'];?></a></li>
		<?php } ?>
				</ul>				
			</div>	
		</div>
		<script type="text/javascript" src='./login.js'></script>
	</body>


</html> 