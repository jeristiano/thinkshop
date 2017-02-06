<?php
include('../../admin/data.php');
session_start();
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
		<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/front/register.css' type = 'text/css'>
	</head>		
	
	<body >
		<div class='wrap'>	
			<div class='logo_w'>			
				
					<a href="http://127.0.0.1/thinkshop/homepage.php"><img src='../../img/frontend/fr_logo.png'></a>
					
					<div class='reg'>
						<a href='../login/login_editor.php'>登录</a>
					</div>
					
			</div>			
			<!-- 注册列表 -->			
								
			<div class="form">
				<form  action="./do_register.php" method="post" id='frm'>
					<table >
						<tr>							
							<td class='fr_logo'>
								<img src='../../img/frontend/fr_logo2.png' alt=''>
							</td>
							
						</tr>

						<tr>	
							
							<td class='input'>
								<input type='text' name='uname' placeholder='数字,字母,下划线,6-18位'>
							</td>
							<td class='td3'><span id='uname'></span></td>
						</tr>

						<tr>	
							
							<td class='input'>
								<input type='text' name='email' placeholder='邮箱'>
							</td>
							<td class='td3'><span id='email'></span></td>
						</tr>
						<tr>
							<td class='input'>
								<input type='password' name='pwd' placeholder='密码'>
							</td>
							<td class='td3'><span id='pwd'></span></td>
						</tr>
						<tr>
							
							<td class='input'>
								<input type='password' name='pwd2' placeholder='确认密码'>
							</td>
							<td class='td3'><span id='pwd2'></span></td>
						</tr>
						<tr>	
							
							<td class='input'>
								<input type='text' name='cellphone' placeholder='11位手机号码'>
							</td>
							<td class='td3'><span id='cellphone'></span></td>
						</tr>
						<tr>	
							
							<td class='input'>
								<input type='text' name='test' placeholder='右侧验证码'>
							</td>
							<td class='td3'>
								<span id='test'>
									<?php 
										echo $code = rand(1111,9999);
										$_SESSION["code"]=$code;
									?>
								</span><span id='test1'></span>
							</td>
						</tr>

						<tr>							
							<td  class='login'><img onclick="valid();"  name="sub" src='../../img/frontend/fr_reg.png'></td>			
						</tr>

						<tr>							
							<td class='forgetpwd'>用户注册即代表同意
								<a href="http://127.0.0.1/thinkshop/home/news/news.php?nid=7">《隐私政策》</a>
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
	<script type="text/javascript" src="./register.js"></script>
</body>

	
</html> 