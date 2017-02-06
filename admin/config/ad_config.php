<?php
 include('../../head.php');
include('../data.php');
include('../function.php');
$sql = "select * from ts_config";
$res = mysql_query($sql);
?>

<head>
	<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/admin/ad_config.css' type = 'text/css'>
</head>

	<div class='win_main'>
		<div class='location'>
			<span><a href="">首页</a>&nbsp;&nbsp;&gt;</span>
			<span>网站配置</span>
		</div>

		<div class='ad_frm'>
			<div class='location'>
				<span>配置修改</span>
			</div>

		<div>

			<?php
				//分页
				$p=isset($_GET["p"])==true?$_GET["p"]:1;//页码
				$total_rows=mysql_num_rows(mysql_query("select * from ts_config"));
				$shownums = 2;//每页显示数量				
				$pages = ceil($total_rows/$shownums);//总页数
				$start = ($p-1)*$shownums; 
				$limit = "limit {$start},{$shownums}";
				$query  = "select * from ts_config  {$limit} ";
				$result = mysql_query($query);

				while($row = mysql_fetch_assoc($result)){
					extract($row);
					
			?>			
			<table class='table'>
			<form method="post" action="./do_edit_config.php">
					<input type="hidden" name="cfgid" value='<?php echo $cfgid;?>'>
				<tr>
					<td class='td1'>配置项名称(中文)</td>
					<td class='td2'><input type="text" name="cfgname_zh" value='<?php echo $cfgname_zh;?>'></td>
				</tr>
				<tr>
					<td>配置项名称(英文)</td>
					<td  class='td2'><input type="text" name="cfgname_en" value='<?php echo $cfgname_en;?>'></td>
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
				<?php
					if($cfgtype=='text'){?>
					<td  class='td2'><input type="text" name="cfgvalue" value='<?php echo $cfgvalue;?>'></td>
				<?php }else{?>
					<td  class='td2'><textarea class='area' name="cfgvalue" value='<?php echo $cfgvalue;?>'></textarea></td>	
					
				<?php }?>
				</tr>
				<tr>
					<td colspan='2' ><input type="submit" name="sub" value='提交'></td>
				</tr>
			</form>
			</table>
			<?php }?>
<!-- 分页内容 -->
			<div class="nextpage">
				<ul>	
					<li class="block"><a href="./ad_config.php?p=<?php echo $pages;?>">末页</a>
					</li>	
					<li class="block">
						<a href="./ad_config.php?p=
						<?php $next = $p+1;if($next<=$pages){echo $next;}else{echo $pages;}?>">下一页
						</a>
					</li>
			<?php 
				for($i=$pages;$i>=1;$i--){?>				
					<li class="block"><a href="?p=<?php echo $i;?>"><?php echo $i;?></a></li>					
			<?php }?>						
					<li  class="block"><a href="?p=1">首页</a></li>						
				</ul>						
			</div>	
		</div>
	</div>

</div>
	<div class='clear'></div>
</div><!--1边框-->

<?php
include('../../foot.php');
?>