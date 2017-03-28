<?php
if(empty($_POST['cate_name'])) {
	skip('3', 'father_cate_add.php', 'error', '栏目名称不得为空!');
}
if(mb_strlen($_POST['cate_name']) > 55) {
	skip('3', 'father_cate_add.php', 'error', '栏目名称不得多于55个字符!');
}
if(!is_numeric($_POST['sort'])) {
	skip('3', 'father_cate_add.php', 'error', '排序只能填写数字!');
}
$_POST = escape($link, $_POST);

//判断提交的数据是否重复
$query = "SELECT * from `lshop_cate` where cate_name='{$_POST['cate_name']}'";
$result = execute($link, $query);
if(mysqli_num_rows($result)) {
	skip('3', 'father_cate_add.php', 'error', '这个栏目名称已存在，不得重复!');
}
?>