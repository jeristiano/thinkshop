<?php
 include('F:/121/thinkshop/admin/data.php');
 //数据库中取出一级分类
		$sql ='select * from ts_goods_ctgs where fid=0';
		$res=mysql_query($sql);
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>首页</title>
	<style>
		/**初始化信息**/
		*{padding:0px;margin:0px;font-size:16px;color:#000000;font-family:微软雅黑;text-decoration:none;list-style-type:none;}

		/**外边框**/
		
		.wrap{width:1346px;margin:0px auto;border:1px red solid;}
		
		/**顶部工具栏**/
		.toolbar{width:1300px;height:35px;#ffffff;background:#f5f5f5;border:1px red solid;}
		.toolbar li,.toolbar a {float:left; color:#353535;font-size:12px;}
		 li a:hover{color:#ff6700;}
		.toolbar .toolbar_l li {float:left;width:35;line-height:35px;padding:0px 8px;}
		.toolbar .toolbar_r li {float:right;width:35;line-height:35px;padding:0px 16px;}
		.toolbar .toolbar_r .color_gray {color:gray ;font-size:12px;}


		/**logo搜索栏**/
		.logo_item{width:1300px;height:95px;border:1px green solid;}
		.logo_pic{width:342px;height:95px;background:#ffffff}
		.logo_pic img{margin:8px 15px;}
		.logo_pic,.logo_search ,.logo_r{float:left;}
		.logo_item .search_bar{width:450px;height:30px;border:2px solid gray;}
		.logo_item .variety{width:100px;height:32px;border:2px solid gray;margin-top:30px ;}
		.logo_item .button{position:relative;top:10px;}
		.logo_item .logo_r{float:right;margin:0px 10px;}
	

		/**导航栏**/
		.nav_bar{width:1300px;height:40px;background:#32465d;border:1px green solid;}
		.nav_bar li{float:left;margin-left:80px;}
		.nav_bar li a{color:white;display:block;height:40px;line-height:40px;padding:0px 6px;}
		.nav_bar li a:hover{background:#1690cf;}


		/**分类二级页面**/
		.nav{height:45px;background:#5679a0;width:1300px;border:1px green solid;}
		.nav .ul{margin:0px 100px;}
		
		.nav a{color:#ffffff;display:block;height:45px;line-height:45px;padding:0px 40px;}
		.nav a:hover {background:#1690cf;}
		.nav li{float:left;}
		.nav2{display:none;background:#1690cf;position:absolute;}
		.nav2 li{clear:both;}
		.nav2 li a{color:#ffffff;}
		.nav1:hover .nav2{display:block;width:260px;}
		 .nav1 .nav2 a:hover{background:#ff6700;width:180px;}
		
		
		/**主内容页面**/
		.homepage{border:1px green solid;height:600px;width:1300px;}
		.homepage .hmpg_ct1{width:250px;height:240px;border:2px solid #efefef;margin:10px 10px;float:left;}
		.homepage .hmpg_ct1:hover{border:2px solid #32465d;}
		.homepage .hmpg_ct1 .hmpg_ct2 {display:block;height:30px;line-height:30px;color:#2f2f2f;text-align:center;}
		.homepage .hmpg_ct1 a:hover{text-decoration:underline;}
		.homepage .hmpg_ct1 .price {color:#ff6700;text-align:left;font-size:18px;padding:0px 14px;}
		.homepage .hmpg_ct1 .hmpg_ct3 {float:left;padding:0 14px;}
		.homepage .hmpg_ct1 .hmpg_ct4 {float:right;padding:0 14px;}
		.hmpg_ct3 span ,.hmpg_ct4 span {color:#ff6700;}
	


		/**换页**/
		.nextpage{width:1300px; height:40px;}
		.nextpage li{float:right;height:35px;line-height:35px;padding:0px 15px;}
		.nextpage ul{margin:5px 50px;}
		.nextpage .block{border:1px solid #c5c5c5;background:#ffffff;}
		.nextpage .block:hover{background:#1690cf;}
		.clear{clear:both;}
		/**根部信息栏**/

		.footinfo{width:1300px;height:150px;background:#32465d;border:1px green solid;}
		.footinfo li{float:left;padding:10px 15px;}
		.footinfo ul{margin:30px 350px;}
		.footinfo ul a{color:white;}
		.footinfo ul a:hover{color:#ff6700;}
		.footinfo span {display:block;color:white;padding:5px 10px;font-size:14px;margin-left:300px;}
	
	</style>

	</head>

	<body>
		<div class="wrap">
			<div class="toolbar" width=''>
				<ul class="toolbar_l">
					<li><a href="###">网站首页</a></li>
					<li><a href="###">我的欣才</a></li>
					<li><a href="###">我的订单（0）</a></li>
					<li><a href="###">我的购物车（0）</a></li>
				
				</ul>
				<ul class="toolbar_r">
					<li><a href="###">退出</a></li>
					<li><a href="./register.html">欢迎注册</a></li>
					<li><a href="./login.html">登录</a></li>
					<li class="color_gray">您好！jeristiano !</li>
					<li>欢迎来到欣才课堂！</li>
				
				</ul>
			
			</div>
			
<!---------------------------------------------搜索栏---------------------------------------------------------->				<?php
				if(isset($_GET["ctg"])==true && empty($_GET["ctg"])==false){
					$ctg = $_GET["ctg"];
					$where = "where ctg='{$ctg}'";
					}else{
						$ctg='';
						$where ="where 1";
					}
	
						
				$p=isset($_GET["p"])==true?$_GET["p"]:1;		//页码
				$start = ($p-1)*8; 
			?>		



			
			<div class="logo_item">
				<div class="logo_pic" >
					<a href="###"><img src="./img/frontend/ad_logo3.png" title=""></a>
				</div>
				<form  action="./homepage.php">
					<input type="hidden" name="p" value="<?php echo $p;?>">
					<input type="hidden" name="ctg" value="<?php echo $ctg;?>">
					<input  class="search_bar" type="text" name="key" placeholder="请输入搜索内容">
					<input class="button" type="image" src="./img/frontend/search_button.png" name='sub'  >
				
				</form>
				
				

			</div>
			<div class='clear'></div>

	
			<div class="nav_bar">
				<ul>
					<li><a href="###">首页</a></li>
					<li><a href="###">课程</a></li>
					<li><a href="###">活动</a></li>
					<li><a href="###">礼品卡卷</a></li>
					<li><a href="###">欣才论坛</a></li>
					<li><a href="###">行业动态</a></li>
					<li><a href="###">联系客服</a></li>
					<li><a href="###">下载APP</a></li>
					
				
				</ul>
					
			
			</div>
		
<!--二级分类页面start--------------------------------------------------------------------------------------->

			<div class="nav">
				<ul class="ul">
					<li><a href="###">分类</a></li>
					<li><a href="./homepage.php">全部</a></li>

		<?php
		
			while($row=mysql_fetch_assoc($res)){?>
					
					<li class="nav1">
						<a href=""><?php echo $row['cname'];?></a>
						<ul class="nav2">
					
							<?php 
									
								$ccid=$row['cid'];
								$sql2 ="select * from ts_goods_ctgs where fid='{$ccid}'";
								$res2=mysql_query($sql2);
									
								while($row2=mysql_fetch_assoc($res2)){?>
								
								<li>
									<a href="./homepage.php?ctg=<?php echo $row2['cid'];?>"><?php echo $row2['cname'];?></a>
								</li>
								
								
							<?php }?>
				

						</ul>	
					</li>	
	
					
			
		<?php }?>
		
			
				</ul>
						
			</div>
		
	<!--二级分类页面end-->	
	
	<!--分类查询分页-->
	
<!--主页面内容------------------------------------------------------------------------------------------>			
			<div class="homepage">
			<?php
				if(isset($_GET["ctg"])==true && empty($_GET["ctg"])==false){
				$ctg = $_GET["ctg"];
				$where = "where ctg='{$ctg}'";
				}else{
					$ctg='';
					$where ="where 1";
				}
				

			//搜索栏内容
			
			if(isset($_GET['key'])==true){
			$key=$_GET['key'];
				$where .= "&&pname like '%{$key}%'";
			}
			 $total_rows=mysql_num_rows(mysql_query("select * from ts_goods {$where} "));
			$shownums=8;									//每页显示数量				
			$pages = ceil($total_rows/$shownums);			//总页数
		
			$start = ($p-1)*$shownums; 
			$limit = "limit {$start},{$shownums}";
			$query ="select * from ts_goods {$where} {$limit}";
			$res=mysql_query($query);
				while($row=mysql_fetch_assoc($res)){?>
					
			
					<ul class="hmpg_ct1">
						<li>
							<a href="./home/homepage/detail.php?pid=<?php echo $row['pid'];?>">
							<img src="#######">
							</a>
						</li>
						<li class="price">&yen;<?php echo $row['price'];?></li>
						<li class="price">&yen;<?php echo $row['ditprice'];?></li>
							
						<li class="hmpg_ct2">
							<a href="./home/homepage/detail.php?pid=<?php echo $row['pid'];?>" target="_blank"><?php echo $row['pname'];?></a>
						</li>
								
						<li class="hmpg_ct3">名额：<span ><?php echo $row['nums'];?></span> 人
						</li> 
								
						<li class="hmpg_ct4">评论:<span ></span>人
						</li>
					</ul>
				<?php }?>
								
				
			</div>
								
			
			<div class='clear'></div>
<!------------------------------------------------分页内容-------------------------------------------------------->
			<div class="nextpage">
					<ul>	
						
						<li class="block"><a href="./homepage.php?p=<?php echo $pages;?>&ctg=<?php echo $ctg;?>">末页</a></li>
						
						<li class="block">
							<a href="./homepage.php?p=
								<?php if($pages<=1){echo $next=$p;}
								else{echo $next=$p+1;}?>&ctg=<?php echo $ctg;?>">下一页
							</a>
						</li>
				<?php 
					for($i=$pages;$i>=1;$i--){ ?>
						
						<li class="block">
							
							<a href="?p=<?php echo $i;?>&ctg=<?php echo $ctg;?>"><?php echo $i;?></a>
						</li>
										
					<?php }?>
												
					<li  class="block"><a href="./homepage.php?ctg=<?php echo $ctg;?>">首页</a>
					</li>
					
				</ul>
			</div>
			
<!------------------------------------------------分页内容-------------------------------------------------------->			
			<div class="footinfo">
					<div>
						<ul>
							<li><a href="###">关于我们</a></li>
							<li><a href="###">联系我们</a></li>
							<li><a href="###">人才招聘</a></li>
							<li><a href="###">友情链接</a></li>
						
						
						</ul><br>
						</div>
					
						<div class="clear"></div>					
						<span > 苏公网安备 11000002000118号  | 苏ICP证170359号    | 
								Copyright © 2007-2016  thinksite.cn			版权所有
						</span>
				</div>
				
		
		</div>
		
	</body>


</html>