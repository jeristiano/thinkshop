<?php
include('F:/121/thinkshop/admin/data.php');
include('F:/121/thinkshop/admin/function.php');

if(isset($_POST['aid'])==false){
	exit('非法访问');}

$aid = $_POST['aid'];
$title = $_POST['title'];
$content=$_POST['content'];
$content = htmlspecialchars($content);
$author = $_POST['author'];
$ctg = $_POST['ctg'];
$ctime = time();
//正则判断
if($reg=preg_match('/^[\一-\龥_a-zA-Z0-9]{3,30}+$/',$author)==false){
		exit("糟糕,中文、英文数字、字母、 下划线!<a href='./modify_news.php'>请跳转上级页面</a>");}

 $sql="update  ts_news set title='{$title}', ctg='{$ctg}', content='{$content}',ctime='{$ctime}', author='{$author}' where aid='{$aid}'";
			
				
$res = mysql_query($sql);
	if($res==true){
		echo '新闻修改成功<a href="./edit_news.php">返回</a>';
	}else{
		echo "新闻修改失败<a href='./edit_modify_news.php?aid=<?php $aid;?>'>返回</a>";
	}
