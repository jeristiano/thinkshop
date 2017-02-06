//获取元素对象
var anameTig = document.getElementById("aname");
	var aname = frm.aname.value;
	
	var valid = function(){
	
	var aname = frm.aname.value;
		

		//获取表单控件值
		if(/^[a-zA-Z]\w{5,17}$/.test(aname)!=true){
			anameTig.innerHTML="用户名非法";//更改html标签的内容
			anameTig.style.color="white";//添加属性
			frm.uname.focus();//获取焦点
			return;
		}
		frm.submit();
	}