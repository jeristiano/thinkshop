<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="./umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <script src="./umeditor/third-party/jquery.min.js"></script>
    <script src="./umeditor/umeditor.config.js"></script>
    <script src="./umeditor/umeditor.min.js"></script>
    <script src="./umeditor/lang/zh-cn/zh-cn.js"></script>
	
</head>
<body>


<textarea name="new_content" id="myEditor" cols="150" rows="10"></textarea>

<script>
var bar = {
	toolbar:[
            'bold italic underline strikethrough | superscript subscript | forecolor backcolor | removeformat |',
        ],
		initialFrameHeight:200,//设置高度
		initialFrameWidth:1000//设置宽度 
};
UM.getEditor('myEditor',bar);

</script>


</body>
</html>