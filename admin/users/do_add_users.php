 <?php
include('F:/121/thinkshop/admin/data.php');

//判断是否由post传值

if(isset($_POST['aname'])==false){
	exit('非法访问');
}
//正则判断

		@$email=$_POST['email'];
		@$aname=$_POST['aname'];
		@$cellphone=$_POST['cellphone'];
		@$apwd=$_POST['apwd'];
		@$apwd1=$_POST['apwd1'];
		
		

		//邮箱名字判断
		if(preg_match("/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/",$email)==0){
			exit("邮箱名有误<a href='./add_users.php'>返回</a>");
	
		}
		//账户名判断6-18位 数字和字母 下划线.

		if(preg_match("/^[a-zA-Z]\w{4,16}\w$/",$aname)==0){
			exit("账户名有误<a href='./add_users.php'>返回</a>");
	
		}
		

		//判断两次密码是否一致.
		if($apwd!=$apwd1){
			exit("两次密码不一致<a href='./add_users.php'>返回</a>");
		
		}else{
			$apwd=md5($apwd);
		}
		
		//手机号码格式判断.

		if(preg_match("/^1[3|4|5|8|7]\d{9}$/",$cellphone)==0){
			exit("手机号码有误,11位!<a href='./add_users.php'>返回</a>");
			}

	//写入sql语句
	@$ctdate=time();
	//echo $ctdate;
	
	@$sql="insert into admin(aname,apwd,cellphone,email,ctdate)
	value('{$aname}','{$apwd}','{$cellphone}','{$email}','{$ctdate}')";

	$res = mysql_query($sql);
	//判断
	if($res==true){
		echo "添加成功<a href='./ad_users.php'>返回</a>";
	}else{
		echo "添加失败<a href='./add_users.php'>返回</a>";
	}
?>