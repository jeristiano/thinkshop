<?php 
 include('../../head.php');
include('../data.php');
 $aid=$_GET['aid'];
 
 if(isset($_GET['aid'])==false){
	exit('非法访问');
}
	$sql="select * from ts_admin where aid='{$aid}'";
	$res = mysql_query($sql);
	
	$row = mysql_fetch_assoc($res);
	
?>
<html>
	<head>
		<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/admin/edit_user.css' type = 'text/css'>	
	</head>
</html>
		<div class='win_main'>
				<div class='location'>
					<span><a href="../../admin.php">首页</a>&nbsp;&nbsp;&gt;</span>
					<span>系统设置&nbsp;&nbsp;&gt;</span>
					<span><a href="./ad_users.php">后台用户管理</a>&nbsp;&nbsp;&gt;</span>
					<span>后台用户编辑</span>
					
				</div>
				
					<div class='ad_frm'>
						<div class='location'>
							<span>后台用户编辑</span>
						</div>
					<form method='post' action='./do_edit.php'>
						<table >
						<tr>
							<td class='td1'></td>
							<td class='td2'><input type='hidden' name='aid' value=<?php echo $row['aid'] ?>></td>
						</tr>
						<tr>
							<td class='td1'>用户名</td>
							<td class='td2'><input disabled='text' name='aname' value=<?php echo $row['aname'] ?>></td>
						</tr>
						<tr>
							<td class='td1'>邮箱</td>
							<td class='td2'><input type='text' name='email' value=<?php echo $row['email'] ?>></td>
						</tr>
						<tr>
							<td class='td1'>电话</td>
							<td class='td2'><input type='text' name='cellphone' value=<?php echo $row['cellphone'] ?>></td>
						</tr>
						<tr>
						<?php 
						$sql="update admin set aid='{$aid}'";
						$res = mysql_query($sql);
		
						
						?>
							<td class='td1' colspan='2'>
							<input type='submit' name='sub' value='确认修改'>
							
							</td>
							
						</tr>
						</table>
					</form>
					</div>
				
				
		</div>
	</div><!--2边框-->
	<div class='clear'></div>
</div><!--1边框-->

		
<?php 
 include('../../foot.php');

?>
		
	