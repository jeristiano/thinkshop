<?php
 include('../../../head.php');
include('../../data.php');
include('../../function.php');
$sql ='select * from ts_goods_ctgs';
	$res = mysql_query($sql);
	$ctgs=array();
	while($row=mysql_fetch_assoc($res)){
		$ctgs[]=$row;
	}

	$ctgs=infinite_ctg($ctgs,array("0","fid","cid"));


?>
	
<head>
	<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/admin/add_goods.css' type = 'text/css'>
</head>


	<div class='win_main'>
		<div class='location'>
			<span><a href="../../admin.php">首页</a>&nbsp;&nbsp;&gt;</span>
			<span>商品分类</span>
		</div>
				
			<div class='ad_frm'>
				<div class='location'>
					<span>添加商品信息</span>
				</div>
				
				<div class='classify'>
					<form id='frm' action='./do_add_goods.php' method='post' enctype='multipart/form-data'>
						<table >
						<tr>
							<td class='td1'>商品名称</td>
							<td class='td2'><input type='text' name='pname' placeholder="中文 3~10个汉字,英文,30个字符"><span id='pname'></span>
							</td>
							
						</tr>
				
						<tr>
							<td class='td1'>商品价格</td>
							<td class='td2'><input type='text' name='price' placeholder="包含两位小数">&nbsp;&nbsp;元</td><span id='price'></span>
							
						</tr>
							
						<tr>
							<td class='td1'>优惠价格</td>
							<td class='td2'><input type='text' name='ditprice' placeholder="包含两位小数">&nbsp;&nbsp;元</td><span id='ditprice'></span>
							
						</tr>
						<tr>
							<td class='td1'>分类</td>
							<td class='td2'>
							<?php echo infinite_select($ctgs,'ctg','cid','cname');?></td>
						</tr>
							
						<tr>
							<td class='td1'>库存</td>
							<td class='td2'>
								<input type='text' name='nums' placeholder="库存数量">&nbsp;&nbsp;个
							</td><span id='nums'></span>
							
						</tr>
						
						<tr>
							<td class='td1'>主讲人</td>
							<td class='td2'>
								<input type='text' name='teacher' placeholder="主讲人">
							</td><span id='teacher'></span
							
							
						</tr>
						<tr>
							<td class='td1'>课程信息</td>
							<td class='td2'>
								<input type='text' name='info' placeholder="课程信息">
							</td><span id='info'></span>
							
						</tr>
							
							
						<tr>
							<td class='td1'>缩略图</td>
							<td class='td2'>
								<input type='file'  name='thumbs[]'>
							</td>
						</tr>
						<tr>
							<td class='td1'>展示图</td>
							<td class='td2'>
								<input type='file'  name='imgs[]'>
								
							</td>
							<tr>
								<td class='td1'></td>
								<td><input type='file'  name='imgs[]'></td>
							</tr>
						</tr>
						<tr>
							<td class='td3'>商品描述<td>
						</tr>	
						<tr>
							<td colspan='2'><textarea id='editor' name='description'></textarea></td>
						</tr>
							
						<tr>
							<td colspan='2'><img onclick='valid();'class='edit' alt='' src='../../../img/admin/goods_add.png' name='sub'>
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
		<script src='./js/add_goods.js'></script> 
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
include('../../../foot.php');
?>