//获取元素对象
var unameTig = document.getElementById("uname");
	var uname = frm.uname.value;
	
	var valid = function(){
	
	var uname = frm.uname.value;
		

		//获取表单控件值
		if(/^[a-zA-Z]\w{5,17}$/.test(uname)!=true){
			unameTig.innerHTML="用户名非法";//更改html标签的内容
			unameTig.style.color="white";//添加属性
			frm.uname.focus();//获取焦点
			return;
		}
		frm.submit();
	}