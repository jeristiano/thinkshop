<?php
include('../../head.php');
include('../data.php');
include('../function.php');

if(isset($_GET['aid'])==false){
		exit('非法访问');
	}
$aid=$_GET['aid'];
$sql ='select * from ts_news_ctgs';
$res = mysql_query($sql);
$ctgs=array();
	while($row=mysql_fetch_assoc($res)){
		$ctgs[]=$row;
	}

$ctgs=infinite_ctg($ctgs,array("0","fid","nid"));
?>
	<html>
		<head>
			<link href="./umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
			<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/admin/modify_news.css' type = 'text/css'>
		</head>
	</html>

	<div class='win_main'>
		<div class='location'>
			<span><a href="../../admin.php">首页</a>&nbsp;&nbsp;&gt;</span>
			<span><a href="./goods_info.php">新闻信息管理</a>&nbsp;&nbsp;&gt;</span>
			<span>新闻信息修改</span>
		</div>
				
		<div class='ad_frm'>
			<div class='location'>
				<span>新闻信息修改</span>
			</div>
			
			<div class='classify'>
				<form action='./do_modify_news.php' method='post' >					
				<table >
			<?php					
				 $sql ="select * from ts_news where aid='{$aid}'";
				$info = mysql_fetch_assoc(mysql_query($sql));						
			?>					
					<tr>
						<input type='hidden' name='aid' value=<?php echo $aid;?>>
						<td class='td1'>新闻标题</td>
						<td class='td2'><input type='text' name='title' value=<?php echo $info['title'];?>></td>				
					</tr>
					<tr>
						<td class='td1'>撰写人</td>
						<td class='td2'><input type='text' name='author' value=<?php echo $info['author'];?>></td>				
					</tr>
					
					<tr>
						<td class='td1'>分类</td>
						<td class='td2'>
						<?php echo infinite_select($ctgs,'ctg','nid','major',$info['ctg']);?>
						</td>
					</tr>						
					<tr>
						<td  colspan='2'>新闻内容<td>
					</tr>
					<tr>
						<td class='td3' colspan='2'><textarea name="content" id="editor"><?php echo $info['content'];?></textarea>
						</td>
					</tr>
						
					<tr>
						 <td colspan='2'><input class='edit' type="image"  src='../../img/admin/ad_confirm.png' name='sub'>
						</td>
					</tr>
				
				</table>
					
				</form>
				
			<div>		

		</div>
				
				
	</div>
</div><!--2边框-->
<div class='clear'></div>

</div><!--1边框-->

    <script src="./umeditor/umeditor.config.js"></script>
    <script src="./umeditor/umeditor.min.js"></script>   
	<script src='./ue/ueditor.config.js'></script> 
	<script src='./ue/ueditor.all.min.js'></script> 
	<script>
		var conf={'toolbars':[['fullscreen',  '|', 'undo', 'redo', '|','fontfamily', 'fontsize', '|',
		'bold', 'italic',   'superscript', 'subscript', 'removeformat', 'blockquote', '|',  'insertorderedlist', 'insertunorderedlist',  '|', 'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',              
		  'indent', '|', 'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|', 'link', 'unlink', '|',  'insertimage', 'emotion', 'map', '|', 'horizontal','|',  'preview']
		  ],initialFrameWidth:1000,initialFrameHeight:400}		  
					  
		UE.getEditor('editor',conf);
	
	</script>	

<?php
include('../../foot.php');
?>