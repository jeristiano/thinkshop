<?php
header('content-type:text/html;charset=utf-8');

//引入数据库
		$link=@mysql_connect('127.0.0.1','root','root') or exit('服务器链接失败');

		mysql_select_db('thinkshop') or exit('数据库不存在');

		mysql_query('set names utf8');

?>