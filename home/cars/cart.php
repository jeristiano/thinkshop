<?php
include('F:/121/thinkshop/admin/data.php');
include('F:/121/thinkshop/admin/function.php');
session_start();

//若没登录,不能查看购物车
if(@$_SESSION['uid']=='' || @isset($_SESSION['uid'])==false ){
	msg('您还没有登录','../login/login_editor.php');
	return;
}
//登录后购物车为空   
if(@$_SESSION['car']=='' || isset($_SESSION['car'])==false){
	$car = array(); 
}else{
	$car = $_SESSION['car'];
}

//判断session,如果用户已登录,才可查看数据库订单数量
if( isset($_SESSION['uid'])==true &&$_SESSION['uid']!=''){
	$uid = $_SESSION['uid']; 
	$sql_h = "select oid from ts_orders where uid='{$uid}'";
	$order = mysql_num_rows(mysql_query($sql_h));
}else{
	$order=0;
}


//配置项
$sql_cfg = "select * from ts_config"; 
$res_cfg = mysql_query($sql_cfg);
$config_cfg = array();

while($row_cfg = mysql_fetch_assoc($res_cfg)){
	$config_cfg[$row_cfg["cfgname_zh"]]=$row_cfg["cfgvalue"];

	}	
?>		


<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $config_cfg['津英课堂'];?></title>	
		<link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/front/cart.css' type = 'text/css'>

</head>	
	
<body>
	<div class="wrap">
		<div class="toolbar">
			<ul class="toolbar_l">
				<li><a href="###">我的津英</a></li>
				<li>
					<a href="http://127.0.0.1/thinkshop/home/orders/order.php?order=<?php echo $order;?>">我的订单（<?php echo $order;?>）</a>
				</li>

				<li>
					<a href="http://127.0.0.1/thinkshop/home/cars/cart.php">
						我的购物车（
						<?php 
							if(isset($_SESSION['car'])==true && $_SESSION['car']!=''){
							echo count($_SESSION['car']);}else{echo "0";}
						?>）
					</a>
				</li>
			
			</ul>

			<?php 
				if(isset($_SESSION['uname'])==true && $_SESSION['uname']!=''){?>
					<ul class="toolbar_r">
						<li><a href="http://127.0.0.1/thinkshop/home/login/logout.php">注销</a></li>
						<li class="color_gray">您好！<?php echo $_SESSION['uname'];?></li>
						<li>Welcome to Geniusite course！</li>
						
					</ul>
			<?php }else{?>
					<ul class="toolbar_r">
					<li><a href="http://127.0.0.1/thinkshop/home/register/register.php">欢迎注册</a></li>
					<li><a href="http://127.0.0.1/thinkshop/home/login/login_editor.php">登录</a></li>
									
				</ul>
										
			<?php }?>		
		</div>
		
		
<!---搜索栏--------->			
	<?php
		if(isset($_GET["ctg"])==true && empty($_GET["ctg"])==false){
			$ctg = $_GET["ctg"];
			$where = "where ctg='{$ctg}'";
			}else{
				$ctg='';
				$where ="where 1";
			}
					
		$p=isset($_GET["p"])==true?$_GET["p"]:1;//页码
		$start = ($p-1)*8; 
		if(isset($_GET['key'])==true){
			$key=$_GET['key'];
			$where .= "&&pname like '%{$key}%'";
		}
		$total_rows=mysql_num_rows(mysql_query("select * from ts_goods {$where} "));
		$shownums=8;//每页显示数量				
		$pages = ceil($total_rows/$shownums);//总页数
		$start = ($p-1)*$shownums; 
		$limit = "limit {$start},{$shownums}";
	?>
	<div class="logo_item">

		<div class="logo_pic" >
			<a href="http://127.0.0.1/thinkshop/homepage.php">
				<img src="http://127.0.0.1/thinkshop/img/frontend/ad_logo3.png" title="">
			</a>
		</div>
			
		<form class='logo_search' action="http://127.0.0.1/thinkshop/homepage.php">
			<input type="hidden" name="p" value="<?php echo $p;?>">
			<input type="hidden" name="ctg" value="<?php echo $ctg;?>">
			<input  class="search_bar" type="text" name="key" placeholder="请输入搜索内容">
			<input class="button" type="image"	src="http://127.0.0.1/thinkshop/img/frontend/search_button.png" name='sub'>
		
		</form>

	</div>

	<div class="nav_bar">
		<ul>
			<li><a href="http://127.0.0.1/thinkshop/homepage.php">首页</a></li>
			<li><a href="###">课程</a></li>				
			<li><a href="###">津英论坛</a></li>
			<li><a href="###">行业动态</a></li>				
			<li><a href="http://127.0.0.1/thinkshop/home/news/news.php">新闻</a></li>			
			<li><a href="###">联系客服</a></li>
		</ul>
	
	</div>
<!-------------购物车----------------------->
		<div class="cartlist">
			
			<table  >

				<tr class="row1">
					<td >图片</td>
					<td>商品</td>
					<td>单价</td>
					<td>数量</td>
					<td>操作</td>
							
				</tr>
			</table>
			<table>
			<?php 
				$total=0;
				foreach($car as $v){
					$pid=$v['pid'];	
					$sql ="select * from ts_goods where pid='{$pid}'";
					$row = mysql_fetch_assoc(mysql_query($sql));
			?>
			
				<tr class="row2">
					<td >
						<img class="adjust" src="../../admin/goods/upload/thumbs/<?php echo $row['thumbs'];?>" title="">
						
					</td>

					<td><?php echo $row['pname'];?></td>

					<td class="price">&yen<?php echo $row['ditprice'];?></td>
					
					<td >
						<a href="./minus.php?pid=<?php echo $pid;?>"> － </a>
						<input class='input' type="text" value="<?php echo $v['nums'];?>">
						<a href="./plus.php?pid=<?php echo $pid;?>"> + </a>
					</td>

					<td>				
						<img onclick="del(<?php echo $pid;?>)" class='del' src="../../img/frontend/fr_del.png"  alt="">
						
					</td>
						
				</tr>			
					
			<?php 
				$subtotal=($row['ditprice'])*($v['nums']);
				$total += $subtotal; 
			
			}?>	
					
			</table>

			<div class='clear'></div>

			<div class="total">
				<span class='car_pic'><a href="./del_car.php"><img src="../../img/frontend/del_cart.png"  alt=""></a></span>
				<span class='total_prc'>商品总价:<span class="price">&yen;<?php echo $total;?><span></span>
			</div>
			
		
		

<!-- 收货地址栏 -->
		<form action='../orders/do_order.php' method='post'>	
			
			<div class='addr'>
				<div class='title'>选择收货地址</div>
				
				<input class='addr1' type="text" name="addr" placeholder='地址'>
								
				<input class='addr1' type="text" name="tel" placeholder='电话'>
							
				<input class='ps' type="text" name="ps" placeholder='卖家留言'>
				
				<input class="button"  type='image' name='sub' src="../../img/frontend/cart4.png" title="去结算">
				<a href="../../homepage.php">
				<img class="button"  src="../../img/frontend/cart5.png" alt="继续购物">
				</a>
							
			</div>
		</form>
				
		</div>
		
	<div class='blank'></div>

			
	
<!------------js内容---------------->		
	<script>
		var del =function(pid){
			
			if(confirm('确认删除吗?')==true){
			location.href='./del.php?pid='+pid;
			}
		}

	</script>


<?php
include('F:/121/thinkshop/home/foot.php');
?>