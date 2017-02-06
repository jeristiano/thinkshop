<?php 
/*无限分类*/
function infinite_ctg($cates,$fid=array("0","fid","cid"),$level=0){
	static $classes = array();
	// 让数据在递归中保持上次得到的结果
	foreach($cates as $vo){
		if($fid[0]== $vo[$fid[1]]){
			$vo["level"]=$level;
			$classes[]=$vo;
			infinite_ctg($cates,array($vo[$fid[2]],$fid[1],$fid[2]),$level+1);
		}		
	}
	return $classes;
}
/*无限分类下拉菜单*/
function infinite_select($data,$name,$value,$text,$fid=false){
	$html="<select name={$name}><option value=0>顶级菜单</option>";	
	foreach($data as $k=>$v){
		if($fid==$v[$value]){
			$html .= "<option value='".$v[$value]."' selected >".str_repeat("--",$v["level"]).$v[$text]."</option>"; 
			continue;
		}
		$html .= "<option value='".$v[$value]."'>".str_repeat("--",$v["level"]).$v[$text]."</option>"; 
	}
	$html .= "</select>";
	return $html;
}
//上传文件
//文件上传
function upload($ctrl_name,$allow_type=array("jpg","png"),$path = "./upload/",$allow_max_size=2){	
	if(is_dir($path)==false){
		@mkdir($path,0777);
	}	
	$res = array();
	for($i=0;$i<count($_FILES[$ctrl_name]["name"]);$i++){
		$count = $i+1;
		$file_name = $_FILES[$ctrl_name]["name"][$i];
		$tmp_name = $_FILES[$ctrl_name]["tmp_name"][$i];
		$error = $_FILES[$ctrl_name]["error"][$i];
		$size = $_FILES[$ctrl_name]["size"][$i];
		
		//判断是否有文件上传
		if(empty($file_name)==true){
			//exit("请选择要上传文件！");
			$err[] = "请选择第{$count}文件！";
			continue;
		}
		if(is_dir($path)==false){
			@mkdir($path,0777);
		}
		//4、判断文件类型是否合法
		$file_name_arr = explode(".",$file_name);
		$pfix = end($file_name_arr);//或取后缀名
		
		if(in_array($pfix,$allow_type)==false){
			$err[] = "第{$count}文件类型非法,允许的类型是".implode(",",$allow_type);
			continue;
		}
		//5、判断错误类型
		if($error!=0){
			$err[] = "第{$count}文件上传出错！";
			continue;
		}
		//6、判断临时文件是否存在
		if(is_file($tmp_name)==false){
			$err[] = "第{$count}文件临时文件不存在！";
			continue;
		}
		//判断文件上传大小
		
		
		if($size>$allow_max_size*1024*1024){
			$err[] = "第{$count}文件大小超出限制";
			continue;
		}
		//生成文件名
		$file_name = md5(time().rand(1111,9999)).".".$pfix;
		if(move_uploaded_file($tmp_name,$path.$file_name)==false){
			$err[] = "第{$count}文件上传失败";			
		}else{
			$res[]=$file_name;
			//echo "第{$count}文件上传成功";
		}
	}
	return $res;
}
	
	//js跳转效果
		function msg($content,$url){
				echo"<script>
					alert('$content');
					location.href='$url';
					</script>";
			}

