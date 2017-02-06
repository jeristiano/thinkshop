<?php
 include('../../head.php');
include('../data.php');
include('../function.php');

?>

<head>
	<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/admin/add_config.css' type = 'text/css'>
</head>

<div class='win_main'>
	<div class='location'>
		<span><a href="">首页</a>&nbsp;&nbsp;&gt;</span>
		<span>网站配置</span>
	</div>

	<div class='ad_frm'>
		<div class='location'>
			<span>添加配置</span>
		</div>

<!-- 表单提交 -->
		<div >
			<table class='table'>
			<form method="post" action="./do_add_config.php">
								
				<tr>
					<td class='td1'>配置项名称(中文)</td>
					<td class='td2'><input type="text" name="cfgname_zh"></td>
				</tr>
				<tr>
					<td>配置项名称(英文)</td>
					<td  class='td2'><input type="text" name="cfgname_en"></td>
				</tr>
				<tr>
					<td>表单类型</td>
					<td ><select name="cfgtype">
							<option value="1" selected>文本
							<option value="2">文本框
						</select>
					</td>
				</tr>
				<tr>
					<td>配置内容</td>
					<td  class='td2'><input type="text" name="cfgvalue"></td>
				</tr>
				<tr>
					<td colspan='2' ><input type="submit" name="sub" value='提交'></td>
				</tr>
			</form>
			</table>
		</div>
	</div>

</div>
	<div class='clear'></div>
</div><!--1边框-->

<?php
include('../../foot.php');
?>