<?php
session_start();
include('./function.php');
if(isset($_SESSION['aname'])==false){
	echo msg('非法访问','./login.php');
}
session_destroy();
echo msg('注销成功转到登录页','./login.php');

