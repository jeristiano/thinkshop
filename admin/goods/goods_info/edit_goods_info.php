<?php
include('../../../head.php');
include('../../../admin/data.php');
include('../../../admin/function.php');

if(isset($_GET['pid'])==false){
		exit('非法访问');
	}
$pid=$_GET['pid'];

$sql ='select * from ts_goods_ctgs';
	$res = mysql_query($sql);
	$ctgs=array();
	while($row=mysql_fetch_assoc($res)){
		$ctgs[]=$row;
	}

	$ctgs=infinite_ctg($ctgs,array("0","fid","cid"));


?>
	
<head>
	<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/admin/edit_goods.css' type = 'text/css'>
</head>
	

	<div class='win_main'>
		<div class='location'>
			<span><a href="../../admin.php">首页</a>&nbsp;&nbsp;&gt;</span>
			<span><a href="./goods_info.php">商品信息管理</a>&nbsp;&nbsp;&gt;</span>
			<span>商品信息修改</span>
		</div>
				
		<div class='ad_frm'>
			<div class='location'>
				<span>商品信息修改</span>
			</div>
			
			<div class='classify'>
				<form action='./do_edit_goods_info.php' method='post' enctype='multipart/form-data'>
					
				<table >

					<?php
					
						 $sql ="select * from ts_goods where pid='{$pid}'";
						$info = mysql_fetch_assoc(mysql_query($sql));
						
					?>
					
					<tr>
						<input type='hidden' name='pid' value=<?php echo $pid;?>>
						<td class='td1'>商品名称</td>
						<td class='td2'>
							<input type='text' name='pname' value=<?php echo $info['pname'];?>>
						</td>
					</tr>
					
					<tr>
						<td class='td1'>商品价格</td>
						<td class='td2'>
						<input type='text' name='price'  value=<?php echo $info['price'];?> >&nbsp;&nbsp;元
						</td>
					</tr>
					<tr>
						<td class='td1'>优惠价格</td>
						<td class='td2'>
							<input type='text' name='ditprice' value=<?php echo $info['ditprice'];?>>&nbsp;&nbsp;元
						</td>
					</tr>
					<tr>
						<td class='td1'>分类</td>
						<td class='td2'>
						<?php echo infinite_select($ctgs,'ctg','cid','cname',$info['ctg']);?>
						</td>
					</tr>
						
					<tr>
						<td class='td1'>库存</td>
						<td class='td2'>
							<input type='text' name='nums' value=<?php echo $info['nums'];?> >&nbsp;&nbsp;个
						</td>
					</tr>
					<tr>
						<td class='td1'>讲师</td>
						<td class='td2'>
							<input type='text' name='teacher' value=<?php echo $info['teacher'];?> >&nbsp;&nbsp;个
						</td>
					</tr>
					<tr>
						<td class='td1'>课程信息</td>
						<td class='td2'>
							<input type='text' name='info' value=<?php echo $info['info'];?> >&nbsp;&nbsp;个
						</td>
					</tr>

					<tr>
						<td class='td1'>当前缩略图</td>
						
						<td >
					<?php 
						$thumbs_arr=explode(',',$info['thumbs']);
						foreach($thumbs_arr as $iv){ ?>
							<img class='pics' alt='' src="http://127.0.0.1/thinkshop/admin/goods/upload/thumbs/<?php echo $iv; ?>">
						
					<?php }?>
						</td>	
					</tr>		
												
						
					<tr>
						<td class='td1'>上传缩略图</td>
						<td class='td2'><input type='file'  name='thumbs[]'></td>
					</tr>
					<tr>
						<td class='td1'>当前展示图</td>
						
						<td>
					<?php 
						$imgs_arr=explode(',',$info['imgs']);
						foreach($imgs_arr as $iv){ ?>
						
						
						<img class='pics' alt='' src="http://127.0.0.1/thinkshop/admin/goods/upload/imgs/<?php echo $iv; ?>">
						
					<?php }?>
						</td>	
					</tr>		
						
						<tr>
							<td class='td1'>上传新展示图</td>
							<td class='td2'><input type='file' name='imgs[]'><input type='file' name='imgs[]'></td>
						</tr>
					</tr>
					<tr>
						<td class='td3'>商品描述<td>
						<textarea id='editor' name='description'><?php echo $info['description']?></textarea>
					</tr>	
						
					<tr>

						 <td colspan='2'><input class='edit' type="image"  src='../../../img/admin/ad_confirm.png' name='sub'>
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
	
		<script src='./ue/ueditor.config.js'></script> 
		<script src='./ue/ueditor.all.min.js'></script> 
		<script>
			var conf={'toolbars':[['fullscreen',  '|', 'undo', 'redo', '|','fontfamily', 'fontsize', '|',
            'bold', 'italic',   'superscript', 'subscript', 'removeformat', 'blockquote', '|',  'insertorderedlist', 'insertunorderedlist',  '|',
            'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
              
              'indent', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
            'link', 'unlink', '|', 
             'insertimage', 'emotion', 'map', '|',
            'horizontal','|',  'preview']]};
			UE.getEditor('editor',conf);
		
		</script> 




<?php
include('../../../foot.php');
?>