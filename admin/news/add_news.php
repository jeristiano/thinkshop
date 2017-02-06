<?php
include('../../head.php');
include('../data.php');
include('../function.php');
$sql ='select * from ts_news_ctgs';
	$res = mysql_query($sql);
	$ctgs=array();
	while($row=mysql_fetch_assoc($res)){
		$ctgs[]=$row;
	}
$ctgs=infinite_ctg($ctgs,array("0","fid","nid"));

?>

<head>
	<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/admin/add_news.css' type = 'text/css'>
</head>


	<div class='win_main'>
		<div class='location'>
			<span><a href="../../admin.php">首页</a>&nbsp;&nbsp;&gt;</span>
			<span>添加新闻</span>
		</div>
				
			<div class='ad_frm'>
				<div class='location'>
					<span>添加新闻</span>
				</div>
				
				<div class='classify'>
					<form id='frm' action='./do_add_news.php' method='post' >
						<table >
						<tr>
							<td class='td1'>新闻标题</td>
							<td class='td2'><input type='text' name='title' placeholder="汉字,英文"><span id='title'></span>
							</td>
							
						</tr>				
						
						<tr>
							<td class='td1'>分类</td>
							<td class='td2'>
							<?php echo infinite_select($ctgs,'ctg','nid','major');?></td>
						</tr>	
					
						
						<tr>
							<td class='td1'>撰写人</td>
							<td class='td2'>
								<input type='text' name='author' placeholder="作者">
							</td><span id='author'></span>				
							
						</tr>
						
						<tr>
							<td class='td3'>新闻内容<td>
						</tr>	
						<tr>
							<td colspan='2'><textarea id='editor' name='content'></textarea></td>
						</tr>
							
						<tr>

							<td colspan='2'>
								<img onclick='valid();' class='edit' 
									alt=''  src='../../img/admin/ad_confirm.png' name='sub'>
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

		<script src='./js/add_news.js'></script> 
		<script src='./ue/ueditor.config.js'></script> 
		<script src='./ue/ueditor.all.min.js'></script> 
		<script>
			var conf={'toolbars':[['fullscreen',  '|', 'undo', 'redo', '|','fontfamily', 'fontsize', '|',
            'bold', 'italic',  'forecolor', 'superscript', 'subscript', 'removeformat', 'blockquote', '|',  'insertorderedlist', 'insertunorderedlist',  '|',
            'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
              
              'indent', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
            'link', 'unlink', '|', 
               '|',
            'horizontal','|',  'preview']]};
			UE.getEditor('editor',conf);
		
		</script> 



<?php
include('../../foot.php');
?>