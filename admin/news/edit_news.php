<?php
include('../../head.php');
include('../data.php');
include('../function.php');
$sql ='select * from ts_news_ctgs';
$res = mysql_query($sql);
//无线分类
$ctgs=array();
	while($row=mysql_fetch_assoc($res)){
		$ctgs[]=$row;
	}
$ctgs=infinite_ctg($ctgs,array("0","fid","nid"));
?>
	
<head>
	<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/admin/edit_news.css' type = 'text/css'>
</head>
	

	<div class='win_main'>
		<div class='location'>
			<span><a href="../../admin.php">首页</a>&nbsp;&nbsp;&gt;</span>
			<span><a href="./goods_info.php">新闻信息管理</a>&nbsp;&nbsp;&gt;</span>
			<span>新闻管理</span>
		</div>
				
		<div class='ad_frm'  >
			<div class='location'>
				<span>新闻管理</span>
			</div>
			
			<div class='classify'  >
				<table>
					<tr class='tr1'>
						<td class='td1'>分类</td>
						<td class='td2'>新闻标题</td>						
						<td class='td1'>撰写人</td>
						<td class='td3'>新闻内容</td>
						<td class='td4'>发表时间</td>
						<td class='td5'>阅读数量</td>
						<td class='td6'>操作</td>
					</tr>
					
		<?php 
			//分页
			$p=isset($_GET["p"])==true?$_GET["p"]:1;//页码
			$total_rows=mysql_num_rows(mysql_query("select * from ts_news"));
			$shownums =4;//每页显示数量				
			$pages = ceil($total_rows/$shownums);//总页数
			$start = ($p-1)*$shownums; 
			$limit = "limit {$start},{$shownums}";
			$query  = "select * from ts_news order by aid desc {$limit}  ";
			$result = mysql_query($query);

			//从ts_news 循环取出所有数据,放在二维数组里
			$info=array();
			while($row=mysql_fetch_assoc($result)){
				$info[]= $row;				
			}

			// 循环出列表内容
			foreach($info as $v){?>										
					<tr class='tr2'>					
						<td><?php echo infinite_select($ctgs,'ctg','nid','major',$v['ctg']);?></td>
						<td><?php echo $v['title'];?></td>
						<td><?php echo $v['author'];?></td>
						<td class='cont'><textarea><?php echo $v['content'];?></textarea></td>
						<td><?php echo date('Y-m-d H:i:s',$v['ctime']);?></td>
						<td><?php echo $v['amount_rd'];?></td>
						<td> <!-- 删除和编辑按钮 -->
							<a href='###'>
								<img class='edit' onclick='del(<?php echo $v['aid'];?>)' src='../../img/admin/ad_del.png' alt=''>
							</a>
							<a href='./modify_news.php?aid=<?php echo $v['aid'];?>'>
								<img class='edit'  src='../../img/admin/ad_edit.png'>
							</a>
						</td>	
					</tr>
			<?php }?>	
					
					<tr>
						<td colspan='10'><a href='./edit_news.php'><img class='edit' src='../../img/admin/goods_add.png' alt=''></a>							
						</td>
					</tr>	
				</table>
				
	<!-- 分页内容 -->
				
				<div class="nextpage" >
					<ul>	
						<li class="block"><a href="./edit_news.php?p=<?php echo $pages;?>">末页</a></li>						
						<li class="block">
							<a href="./edit_news.php?p=<?php if($pages<=1){echo $next=$p;}else{echo $next=$p+1;}?>">下一页
							</a>
						</li>
				<?php 
					for($i=$pages;$i>=1;$i--){?>				
						<li class="block"><a href="?p=<?php echo $i;?>"><?php echo $i;?></a></li>								
				<?php }?>										
						<li  class="block"><a href="?p=1">首页</a></li>						
					</ul>
				</div>
				<div class='clear'></div>
	<!-- 分页内容 -->
			</div>
	
	</div><!--2边框-->

</div><!--1边框-->

<script>
	var del = function(aid){
		if(confirm('确认删除吗?删除后无法恢复!')==true){
			location.href='./del_news.php?aid='+aid;
		
		}
	}
</script>
	
	
<?php
include('../../foot.php');
?>