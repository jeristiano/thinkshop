<?php
include('F:/121/thinkshop/admin/data.php');
include('F:/121/thinkshop/admin/function.php');
if(isset($_POST['title'])==false){
	exit('非法访问');}
$title = $_POST['title'];
$ctg = $_POST['ctg'];
$author =  $_POST['author'];
$content = $_POST['content'];
$content = htmlspecialchars($content);
$ctime=time();
//判断语句正则判断
	//作者名字		
	
	if($reg=preg_match('/^[\一-\龥_a-zA-Z0-9]{3,100}+$/',$author)==false){
		exit("中文、英文数字、 字母、 下划线!<a href='./add_news.php'>请跳转上级页面</a>");}


//处理数据
//sql语句
 $sql="insert into ts_news(title,ctg,content,ctime,author)value('{$title}',{$ctg},'{$content}','{$ctime}','{$author}')";	
	
 $res=mysql_query($sql);
 
if($res==true){
	echo "新闻添加成功<a href='./add_news.php'>返回<a/>";
}else{
	echo "新闻添加失败<a href='./add_news.php'>返回<a/>";
}
