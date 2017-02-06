//获取元素对象
var unameTig = document.getElementById("uname");

var pwdTig = document.getElementById("pwd");
var pwd2Tig = document.getElementById("pwd2");
var emailTig = document.getElementById("email");
var cellphoneTig = document.getElementById('cellphone');
var testTig = document.getElementById("test");
var test1Tig = document.getElementById("test1");
		
	var valid = function(){
	
		var uname = frm.uname.value;
		

		//获取表单控件值
		if(/^[a-zA-Z]\w{5,17}$/.test(uname)!=true ){
			unameTig.innerHTML="用户名非法";//更改html标签的内容
			unameTig.style.color="white";//添加属性
			frm.uname.focus();//获取焦点
			return;
		}else{
			unameTig.innerHTML="";
		}
		
		var email = frm.email.value ;//获取表单控件值\
		if(/^[0-9a-z_][_.0-9a-z-]{0,32}@([0-9a-z][0-9a-z-]{0,32}\.){1,4}[a-z]{2,4}$/i.test(email)!=true){
			emailTig.innerHTML="邮箱格式不正确";//更改html标签的内容
			emailTig.style.color="white";//添加属性
			frm.email.focus();//获取焦点
			return;
		}else{
			emailTig.innerHTML="";
		}
	
		var pwd = frm.pwd.value;	//获取表单控件值
		if(pwd==""){
			pwdTig.innerHTML="密码不能为空";
			pwdTig.style.color="white";
			frm.pwd.focus();
			return;
		}else{
			pwdTig.innerHTML="";
		}
		

		var pwd2=frm.pwd2.value;	//获取表单控件值
		if(pwd!=pwd2){
			pwd2Tig.innerHTML="两次输入密码不一致";
			pwd2Tig.style.color="white";
			frm.pwd2.focus();//获取焦点
			return;
		}else{
			pwd2Tig.innerHTML="";
		}
		
		
		var cellphone = frm.cellphone.value;
	
			
		if(/^1[34578]{1}\d{9}$/.test(cellphone)!=true){
			cellphoneTig.innerHTML="手机号码错误";//更改html标签的内容
			cellphoneTig.style.color="white";//添加属性
			frm.cellphone.focus();//获取焦点
			return;	
		}else{
			cellphoneTig.innerHTML="";
		}
		/*验证码输入框
		var test = frm.test.value;
		console.log(testTig.innerHTML);
		if(testTig.innerHTML != test ){
			test1Tig.innerHTML ="验证码错误";
			test1Tig.style.color = 'white';
			frm.test.focus();
			return;		
		}else{
			test1Tig.innerHTML ="";
		}*/

	frm.submit();//提交表单
	}
