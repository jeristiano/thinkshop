<?php
 include('../../head.php');
include('../../data.php');
include('../../function.php');
$sql = 'select * from ts_comments';
$res = mysql_query($sql);

?>
	<html>
		<head>
			<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/admin/comments.css' type = 'text/css'>
		</head>
	</html>

	<div class='win_main'>
		<div class='location'>
			<span><a href="../../admin.php">首页</a>&nbsp;&nbsp;&gt;</span>
			<span>评论管理</span>
		</div>
				
		<div class='ad_frm'>
			<div class='location'>
				<span>评论管理</span>
			</div>
			
				
<!---订单图表主页-->	
		<div class='table'>
						
			<table>
							
				<tr class='tr1'>
					<td class='td1'>用户</td>
					<td class='td2'>商品图片</td>
					<td class='td3'>商品名称</td>
					<td class='td4'>评论内容</td>
					<td class='td5'>评论时间</td>
					<td class='td6'>审核状态</td>
					
				</tr>
	<?php 
		//分页
			$p=isset($_GET["p"])==true?$_GET["p"]:1;//页码
			$total_rows=mysql_num_rows(mysql_query("select * from ts_comments"));
			$shownums =5;//每页显示数量				
			$pages = ceil($total_rows/$shownums);//总页数
			$start = ($p-1)*$shownums; 
			$limit = "limit {$start},{$shownums}";
		    $query  = "select * from ts_comments order by status  {$limit} ";
			$res = mysql_query($query);

		while($row = mysql_fetch_assoc($res)){
			$uid = $row['uid'];
			$pid = $row['pid'];
			$sql_u = "select * from ts_users where uid='{$uid}'";
			$res_u = mysql_fetch_assoc(mysql_query($sql_u));
			$sql_gd = "select * from ts_goods where pid='{$pid}'";				
			$res_gd = mysql_fetch_assoc(mysql_query($sql_gd));
			$comid = $row['comid'];
			?>
				<tr class='tr2'>
					<td><?php echo $res_u['uname'];?></td>
					<td>
						<img class='img' alt=''src="http://127.0.0.1/thinkshop/admin/goods/upload/thumbs/
							<?php echo $res_gd['thumbs'];?>">
					</td>
					<td><?php echo $res_gd['pname'];?></td>
					<td><?php echo $row['comment'];?></td>
					<td><?php echo date('Y-m-d H:i:s',$row['ctime']);?></td>
					
					<?php						
						$status = array(1=>'待审核',2=>'审核通过');
						if($row['status']==1){
							echo "<td class='check1'><a href='./do_comment.php?comid={$comid}'>".$status[$row['status']]."</a></td>";
						}else{
							if($row['status']==2){
								echo "<td class='check2'>".$status[$row['status']]."</td>";
							}
						}							
					?>		
				</tr>	
		<?php }?>
			</table>
<!-- 分页内容	 -->		
			<div class="nextpage">
				<ul>	
					<li class="block"><a href="./comment_man.php?p=<?php echo $pages;?>">末页</a>
					</li>	
					<li class="block">
						<a href="./comment_man.php?p=
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
<!-- 分页内容	 -->
		
		</div>

	</div>
</div><!--2边框-->
	<div class='clear'></div>

</div><!--1边框-->

	

<?php
include('../../foot.php');
?>