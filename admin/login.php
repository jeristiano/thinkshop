<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>后台登录</title>
		<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/admin/login.css' type = 'text/css'>
	
	</head>
	
	<body>
		<div class='wrap'>
			<div class='logo'>
				<img src='../img/admin/logo.png' alt=''>
			</div>
			<div class='login'>
				<form id='frm' class='form' method="post" action="./do_login.php">
					<table >
					<tr>
						<td class='title' >账户名:</td>
						<td><input class='input' type='text' name='aname' placeholder='6~18位数字、字母、下划线'></td>
						<td><span id='aname'></span></td>
					</tr>
					<tr>
						<td class='title'>密   码:</td>
						<td><input class='input' type='password' name='apwd'  placeholder='请输入密码'>
						</td>
						
					</tr>
					
					</table>
					<div class='button'>
						<img onclick='valid();' 
							class='sub'  src='../img/admin/login.png'>
					</div>
				</form>
			
			</div>
		</div>
		<script type="text/javascript" src='./js/login.js'></script>
	</body>


</html> 