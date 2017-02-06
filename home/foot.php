		
		<div  class="clear"></div>			
		<div class="footinfo">
		
				<ul>	
		<?php			
			$que = "select * from ts_config where cfgtype = 'textarea'";
			$resu = mysql_query($que);
			while($row = mysql_fetch_assoc($resu)){?>
			
					<li><a href="http://127.0.0.1/thinkshop/home/news/news.php?nid=7"><?php echo $row['cfgname_zh'];?></a></li>
		<?php } ?>
				</ul>			
				<img class ='footlogo' src = 'http://127.0.0.1/thinkshop/img/frontend/fr_logo.png' alt=''>	
		</div>
		
		<div class='policy'><?php echo $config_cfg['政策法规'];?></div>	
	</div>

</body>


</html>