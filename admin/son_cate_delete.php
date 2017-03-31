<?php  
//文件引入及网页基本信息的建立
include '../inc/config.inc.php';
include '../inc/mysql.inc.php';
include '../inc/tool.inc.php';

$link = connect();

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	skip('3', 'father_cate.php', 'error', '操作出错，可能是删除的分类不存在！');
}

//判断分类下是否有子分类，有则不能直接删除
$query = "SELECT * from `lshop_cate` where pid={$_GET['id']}";
$result = execute($link, $query);
if(mysqli_num_rows($result)){
	skip('4', 'son_cate.php', 'error', '该子分类下有子分类，请将子分类删除后在删除该类！');
}
$query = "DELETE from `lshop_cate` where id={$_GET['id']}";
execute($link, $query);
if(mysqli_affected_rows($link) == 1) {
	skip('2', 'son_cate.php', 'ok', '删除分类成功！');
}else{
	skip('3', 'son_cate.php', 'error', '删除分类失败！');
}

?>