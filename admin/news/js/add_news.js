//获取元素对象
var titleTig = document.getElementById("title");
var authorTig = document.getElementById("author");

	var valid = function(){	
		var title = frm.title.value;	

		//获取表单控件值
		if(/[\u4e00-\u9fa5_a-zA-Z0-9_]{3,300}/.test(title)!=true){
			titleTig.innerHTML="中文、数字、 字母、 下划线!";//更改html标签的内容
			titleTig.style.color='#32465d';//添加属性
			frm.title.focus();//获取焦点
			return;
		}	

		//获取表单控件值
	var author = frm.author.value;
		if(/[\u4e00-\u9fa5_a-zA-Z0-9_]{1,100}/.test(author)!=true){
			authorTig.innerHTML="中文、数字、 字母、 下划线!";//更改html标签的内容
			authorTig.style.color='#32465d';//添加属性
			frm.author.focus();//获取焦点
			return;
		}	

	frm.submit();//提交表单
	}