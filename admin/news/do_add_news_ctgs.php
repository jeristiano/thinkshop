<?php
include('F:/121/thinkshop/admin/data.php');
include('F:/121/thinkshop/admin/function.php');

//图片提交按钮传来的时坐标值
if(isset($_POST['x'])==false){
	exit("哦,不,非法访问!<a href='./add_news_ctgs.php'>请跳转上级页面</a>");
}	
 $fid=$_POST['ctg'];
 $major=$_POST['major'];


//正则判断 
if($reg=preg_match('/^[\一-\龥_a-zA-Z0-9]{3,30}+$/',$major)==false){
 msg("糟糕,只能输入中文、英文数字、 字母、 下划线!",'./add_news_ctgs.php');
  return;
}
//添加的名字不能重复
$sql="select * from ts_news_ctgs where major='{$major}'";
	
 $res= mysql_num_rows(mysql_query($sql));
if($res==true){
	 msg("不能重复添加分类",'./add_news_ctgs.php');
	 return;
}

//添加分类名字
$sql="insert into ts_news_ctgs(major,fid) value('{$major}','{$fid}')";
$res=mysql_query($sql);
	if($res==true){
	 msg("添加成功",'./add_news_ctgs.php');
	  return;
	}else{
	 msg("添加失败",'./add_news_ctgs.php');
	  return;
}

