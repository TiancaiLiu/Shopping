<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title><?php echo $template['title'] ?></title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="style/css/style.css">
<!--[if lt IE 9]>
<script src="style/js/html5.js"></script>
<![endif]-->
<?php 
	foreach ($template['js'] as $value) {
		echo "<script type='text/javascript' src='{$value}'></script>";
	}
?>
<script>
	(function($){
		$(window).load(function(){
			
			$("a[rel='load-content']").click(function(e){
				e.preventDefault();
				var url=$(this).attr("href");
				$.get(url,function(data){
					$(".content .mCSB_container").append(data); //load new content inside .mCSB_container
					//scroll-to appended content 
					$(".content").mCustomScrollbar("scrollTo","h2:last");
				});
			});
			
			$(".content").delegate("a[href='top']","click",function(e){
				e.preventDefault();
				$(".content").mCustomScrollbar("scrollTo",$(this).attr("href"));
			});
			
		});
	})(jQuery);
</script>
</head>
<body>
<!--header-->
<header>
 <h1><img src="style/images/admin_logo.png"/></h1>
 <ul class="rt_nav">
  <li><a href="#" target="_blank" class="website_icon">站点首页</a></li>
  <li><a href="#" class="clear_icon">清除缓存</a></li>
  <li><a href="#" class="admin_icon">DeathGhost</a></li>
  <li><a href="#" class="set_icon">账号设置</a></li>
  <li><a href="login.html" class="quit_icon">安全退出</a></li>
 </ul>
</header>