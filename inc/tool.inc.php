<?php
/**
 *	@name skip 跳转提示函数
 *	@author 刘敬雄  2016-11-30
 *	@abstract $time  跳转等待时间 
 			  $url  跳转路径
 *			  $pic  提示图标 example 'ok' 'error'
 *			  $message  提示信息
  *			  
 */	
function skip($time, $url, $pic, $message) {
$html =<<<A
	<!DOCTYPE html>
	<html lang="zh-CN">
		<head>
		<meta charset="utf-8" />
		<title>正在跳转中</title>
		<meta http-equiv="refresh" content="{$time};URL={$url}" />
		<link rel="stylesheet" type="text/css" href="../style/css/remind.css" />
		</head>
		<body>
		<div class="notice"><span class="pic {$pic}"></span> {$message} {$time}秒后自动跳转！ 点击此处<a href="{$url}">跳转</a></div>
		</body>
	</html>
A;
echo $html;
exit();
}
?>