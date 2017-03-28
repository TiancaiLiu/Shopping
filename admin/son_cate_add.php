<?php 	
//文件引入及网页基本信息的建立
include '../inc/config.inc.php';
include '../inc/mysql.inc.php';
include '../inc/tool.inc.php';
$template['title'] = '新增子分类';
$template['js'] = array('style/js/jquery.js', 'style/js/jquery.mCustomScrollbar.concat.min.js');

//连接数据库及编码设置
$link = connect();
$charset = "SET NAMES 'utf8';";
execute($link, $charset);

//递归分类
function getList($pid=0, &$result=array(), $space=0) {
  $conn = connect();
  $space += 1;
  $query = "SELECT * from `lshop_cate` where pid=$pid";
  $res = execute($conn, $query);
  while($data = mysqli_fetch_assoc($res)) {
    $data['cate_name'] = str_repeat('&nbsp;&nbsp;&nbsp;', $space) . '♐' . '&nbsp;'. $data['cate_name'];
    $result[] = $data;
    getList($data['id'],$result,$space);
  }
  return $result;
}
$rs = getList();
//表单验证
if(isset($_POST['submit'])) {
  include 'inc/check_son_cate.inc.php';
  $query = "INSERT into `lshop_cate`(pid,cate_name,sort) values ({$_POST['pid']}, '{$_POST['cate_name']}', {$_POST['sort']})";
  execute($link, $query);
  if(mysqli_affected_rows($link) == 1) {
    skip('2', 'son_cate_add.php', 'ok', '添加栏目成功!');
  }else{
    skip('3', 'son_cate_add.php', 'error', 'sorry,添加失败!');
  }
}

?>
<?php include 'inc/header.inc.php' ?>
<?php include 'inc/left.inc.php' ?>
<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">新增基本分类</h2>
       <a class="fr top_rt_btn">返回分类列表</a>
      </div>
     <section>
     <form action="son_cate_add.php" method="post">
      <ul class="ulColumn2">
       <li>
        <span class="item_name" style="width:120px;">分类名称：</span>
        <input type="text" name="cate_name" class="textbox textbox_295" placeholder="商品名称..."/>
        <span class="errorTips">注意：栏目名称不得为空，最大不超过55个字符</span>
       </li>
       <li>
         <span class="item_name" style="width:120px;">选择基本分类：</span>
         <?php
          echo "<select class='select' name='pid'>";
          echo "<option value='0'>选择基本分类 ▼</option>";
          foreach ($rs as $key => $value) {
            echo "<option value='{$value['id']}'>{$value['cate_name']}</option>";
          }
          echo "</select>";
         ?>
         <span class="errorTips">注意：必选项</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">排序：</span>
        <input type="text" name="sort" class="textbox" value="0"/>
        <span class="errorTips">注意：请填写数字</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" name="submit" value="添加" class="link_btn"  />
       </li>
       </ul>
     </form>
     </section>
 </div>
</section>
<?php include 'inc/footer.inc.php' ?>