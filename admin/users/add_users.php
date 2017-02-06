<?php 
 include('../../head.php');
include('../data.php');
 	
?>

<head>
	<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/admin/add_users.css' type = 'text/css'>
</head>

		<div class='win_main'>
				<div class='location'>
					<span><a href="../../admin.php">首页</a>&nbsp;&nbsp;&gt;</span>
					<span><a href="../../admin.php">系统设置</a>&nbsp;&nbsp;&gt;</span>
					<span>后台用户添加</span>
					
					
				</div>
				
					<div class='ad_frm'>
						<div class='location'>
							<span>后台用户添加</span>
						</div>
					<form method='post' action='./do_add_users.php' id='frm'>
						<table >
						<tr>
							<td class='td1'>用户名</td>
							<td class='td2'>
								<input  type='text' name='aname' placeholder='英文、数字、字母、下划线6~18位' >
							</td>
							<td class='td3'>
								<span id='aname'></span>
							</td>
						</tr>
						<tr>
							<td class='td1'>密 码</td>
							<td class='td2'>
								<input type='password' name='apwd' placeholder='请输入密码'>
							</td>
							<td>
								<span id='apwd'></span>
							</td>
						</tr>
						<tr>
							<td class='td1'>确认密码</td>
							<td class='td2'>
								<input type='password' name='apwd1' placeholder='请确认密码' >
							</td>
							<td>
								<span id='apwd1'></span>
							</td>
						</tr>
						<tr>
							<td class='td1'>邮 箱</td>
							<td class='td2'>
								<input type='text' name='email' placeholder='请输入邮箱'  >
							</td>
							<td>
								<span id='email'></span>
							</td>
						</tr>
						<tr>
							<td class='td1'>电 话</td>
							<td class='td2'>
								<input type='text' name='cellphone' placeholder='11位大陆手机号码' >
							</td>
							<td>
								<span id='cellphone'></span>
							</td>
						</tr>
						<tr>
						
							<td class='td1' colspan='2'>
								<img onclick='valid()' src='../../img/admin/goods_add.png' name='sub'>
							
							</td>
							
						</tr>
						</table>
					</form>
					</div>
				
				
		</div>
	</div><!--2边框-->	
	<div class='clear'></div>
</div>
	<script type="text/javascript" src='./js/add_users.js'></script>
<?php 
 include('../../foot.php');

?>
		
	