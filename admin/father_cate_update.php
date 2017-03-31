<?php  
//文件引入及网页基本信息的建立
include '../inc/config.inc.php';
include '../inc/mysql.inc.php';
include '../inc/tool.inc.php';
$template['title'] = '编辑基本分类';
$template['js'] = array('style/js/jquery.js', 'style/js/jquery.mCustomScrollbar.concat.min.js');
$link = connect();
$charset = "SET NAMES 'utf8';";
execute($link, $charset);

//判断id参数的合法性
if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	skip('3', 'father_cate.php', 'error', '操作错误，可能是您要编辑的分类不存在！');
}
$query = "SELECT * from `lshop_cate` where id={$_GET['id']}";
$result = execute($link, $query);
$data = mysqli_fetch_assoc($result);
if(!mysqli_num_rows($result)) {
	skip('3', 'father_cate.php', 'error', '操作错误，可能是您要编辑的分类不存在！');
}
if(isset($_POST['submit'])) {
	$check_flag = 'update';
	include 'inc/check_father_cate.inc.php';
	$query = "UPDATE `lshop_cate` set cate_name='{$_POST['cate_name']}',sort={$_POST['sort']} where id={$_GET['id']}";
	execute($link, $query);
	if(mysqli_affected_rows($link) == 1) {
		skip('2', 'father_cate.php', 'ok', '修改成功！');
	}else{
		skip('3', 'father_cate.php', 'error', '修改失败，请重试！');
	}
}

?>
<?php include 'inc/header.inc.php' ?>
<?php include 'inc/left.inc.php' ?>
<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">编辑基本分类--<?php echo $data['cate_name']?></h2>
       <a href="father_cate.php" class="fr top_rt_btn">返回分类列表</a>
      </div>
     <section>
     <form method="post">
      <ul class="ulColumn2">
       <li>
        <span class="item_name" style="width:120px;">分类名称：</span>
        <input type="text" name="cate_name" class="textbox textbox_295" value="<?php echo $data['cate_name']?>" />
        <span class="errorTips">注意：栏目名称不得为空，最大不超过55个字符</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">排序：</span>
        <input type="text" name="sort" class="textbox" value="<?php echo $data['sort']?>"/>
        <span class="errorTips">注意：请填写数字</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" name="submit" value="更新" class="link_btn"  />
       </li>
       </ul>
     </form>
     </section>
 </div>
</section>
<?php include 'inc/footer.inc.php' ?>