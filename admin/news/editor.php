	
    <script src="./umeditor/third-party/jquery.min.js"></script>
    <script src="./umeditor/umeditor.config.js"></script>
    <script src="./umeditor/umeditor.min.js"></script>
    <script src="./umeditor/lang/zh-cn/zh-cn.js"></script>
	<script src='./ue/ueditor.config.js'></script> 
	<script src='./ue/ueditor.all.min.js'></script> 
	<script>
		var conf={'toolbars':[['fullscreen',  '|', 'undo', 'redo', '|','fontfamily', 'fontsize', '|',
		'bold', 'italic',   'superscript', 'subscript', 'removeformat', 'blockquote', '|',  'insertorderedlist', 'insertunorderedlist',  '|', 'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',              
		  'indent', '|', 'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|', 'link', 'unlink', '|',  'insertimage', 'emotion', 'map', '|', 'horizontal','|',  'preview']
		  ],initialFrameWidth:800,initialFrameHeight:300}
		  
					  
		UE.getEditor('editor',conf);
	
	</script>
