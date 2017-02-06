//获取元素对象
var anameTig = document.getElementById("aname");

var apwdTig = document.getElementById("apwd");
var apwd1Tig = document.getElementById("apwd1");
var emailTig = document.getElementById("email");
var cellphoneTig = document.getElementById('cellphone');

	var valid = function(){
	
		var aname = frm.aname.value;
		

		//获取表单控件值
		if(/^[a-zA-Z]\w{5,17}$/.test(aname)!=true){
			anameTig.innerHTML="用户名非法";//更改html标签的内容
			anameTig.style.color='#32465d';//添加属性
			frm.aname.focus();//获取焦点
			return;
		}
				
	
		var apwd = frm.apwd.value;	//获取表单控件值
		if(apwd==""){
			apwdTig.innerHTML="密码不能为空";
			apwdTig.style.color="#32465d";
			frm.apwd.focus();
			return;
		}
		

		var apwd1=frm.apwd1.value;	//获取表单控件值
		if(apwd!=apwd1){
			apwd1Tig.innerHTML="两次输入密码不一致";
			apwd1Tig.style.color="#32465d";
			frm.apwd1.focus();//获取焦点
			return;
		}
		var email = frm.email.value ;//获取表单控件值\
		if(/^[0-9a-z_][_.0-9a-z-]{0,32}@([0-9a-z][0-9a-z-]{0,32}\.){1,4}[a-z]{2,4}$/i.test(email)!=true){
			emailTig.innerHTML="邮箱格式不正确";//更改html标签的内容
			emailTig.style.color="#32465d";//添加属性
			frm.email.focus();//获取焦点
			return;
		}
		
		var cellphone = frm.cellphone.value;
				
		if(/^1[34578]{1}\d{9}$/.test(cellphone)!=true){
			cellphoneTig.innerHTML="手机号码错误";//更改html标签的内容
			cellphoneTig.style.color="#32465d";//添加属性
			frm.cellphone.focus();//获取焦点
			return;	
		}
	


	frm.submit();//提交表单
	}