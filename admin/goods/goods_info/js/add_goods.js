//获取元素对象
var pnameTig = document.getElementById("pname");
var infoTig = document.getElementById("info");
var teacherTig = document.getElementById("teacher");
var priceTig = document.getElementById("price");
var ditpriceTig = document.getElementById("ditprice");
var numsTig = document.getElementById("nums");


	var valid = function(){
	
		var pname = frm.pname.value;
		

		//获取表单控件值
		if(/[\u4e00-\u9fa5_a-zA-Z0-9_]{3,30}/.test(pname)!=true){
			pnameTig.innerHTML="中文、数字、 字母、 下划线!";//更改html标签的内容
			pnameTig.style.color='#32465d';//添加属性
			frm.pname.focus();//获取焦点
			return;
		}
		var price = frm.price.value;
		//获取表单控件值
		if(/^[0-9]+(.[0-9]{2})?$/.test(price)!=true){
			priceTig.innerHTML="价格格式有误!";//更改html标签的内容
			priceTig.style.color='#32465d';//添加属性
			frm.price.focus();//获取焦点
			return;
		}
		var ditprice= frm.ditprice.value;
		//获取表单控件值
		if(/^[0-9]+(.[0-9]{2})?$/.test(ditprice)!=true){
			ditpriceTig.innerHTML="优惠价格式有误!";//更改html标签的内容
			ditpriceTig.style.color='#32465d';//添加属性
			frm.ditprice.focus();//获取焦点
			return;
		}

		//获取表单控件值
		var nums = frm.nums.value;
		if(/^[0-9]*[1-9][0-9]*$/.test(nums)!=true){
			numsTig.innerHTML="请输入库存数量!";//更改html标签的内容
			numsTig.style.color='#32465d';//添加属性
			frm.nums.focus();//获取焦点
			return;
		}
		//获取表单控件值
		var teacher = frm.teacher.value;
		if(/[\u4e00-\u9fa5_a-zA-Z0-9_]{3,30}/.test(teacher)!=true){
			teacherTig.innerHTML="中文、数字、 字母、 下划线!";//更改html标签的内容
			teacherTig.style.color='#32465d';//添加属性
			frm.teacher.focus();//获取焦点
			return;
		}

		//获取表单控件值
		var info = frm.info.value;
		if(/[\u4e00-\u9fa5_a-zA-Z0-9_]/.test(info)!=true){
			infoTig.innerHTML="中文、数字、 字母、 下划线!";//更改html标签的内容
			infoTig.style.color='#32465d';//添加属性
			frm.info.focus();//获取焦点
			return;
		}


	frm.submit();//提交表单
	}