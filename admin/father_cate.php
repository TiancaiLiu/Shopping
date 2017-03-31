<?php 
//文件引入及网页基本信息的建立
include '../inc/config.inc.php';
include '../inc/mysql.inc.php';
include '../inc/tool.inc.php';
$template['title'] = '基本分类列表';
$template['js'] = array('style/js/jquery.js', 'style/js/jquery.mCustomScrollbar.concat.min.js');

$link = connect();

//排序
if(isset($_POST['submit'])) {
  foreach ($_POST['sort'] as $key => $val) {
    if(!is_numeric($val) || !is_numeric($key)) {
      skip('3', 'father_cate.php', 'error', '排序参数错误！');
    }
    $query[] = "UPDATE `lshop_cate` set sort={$val} where id={$key} and pid=0";
  }
  if(execute_multi($link, $query, $error)) {
    skip('2', 'father_cate.php', 'ok', '排序成功！');
  }else{
    skip('3', 'father_cate.php', 'error', $error);
  }
}

?>
<?php include 'inc/header.inc.php' ?>
<?php include 'inc/left.inc.php' ?>

<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">商品列表示例</h2>
       <a href="product_detail.html" class="fr top_rt_btn add_icon">添加商品</a>
      </div>
      <section class="mtb">
       <input type="text" class="textbox textbox_225" placeholder="输入分类关键词..."/>
       <input type="button" value="查询" class="group_btn"/>
      </section>
      <form method="post">
      <table class="table">
       <tr>
        <th>id</th>
        <th>排序</th>
        <th>分类名称</th>
        <th>操作</th>
       </tr>
       <?php
          $query = "SELECT * from `lshop_cate` where pid=0";
          $charset = "SET NAMES 'utf8';";
          execute($link, $charset);
          $result = execute($link, $query);
          while($data = mysqli_fetch_assoc($result)) {
            $url = urlencode("father_cate_delete.php?id={$data['id']}");
            $return_url = urlencode($_SERVER['REQUEST_URI']);
            $message = "您真的要删除基本分类 '♐ {$data['cate_name']}' 吗？";
            $delete_url = "confirm.php?url={$url}&return_url={$return_url}&message={$message}";
$html =<<<A
          <tr>
            <td class="center">{$data['id']}</td>
            <td class="center"><input type="text" name="sort[{$data['id']}]" value="{$data['sort']}" style="width:30px;" class="center" /></td>
            <td class="center">{$data['cate_name']}</td>
            <td class="center">
              <a href="#" title="预览" class="link_icon" target="_blank">&#118;</a>
              <a href="father_cate_update.php?id={$data['id']}" title="编辑" class="link_icon">&#101;</a>
              <a href="$delete_url" title="删除" class="link_icon">&#100;</a>
            </td>
          </tr>
A;
          echo $html;
          }
       ?>
      </table>
      <input type="submit" name="submit" value="排序" class="link_btn"  />
      </form>
      <aside class="paging">
       <a>第一页</a>
       <a>1</a>
       <a>2</a>
       <a>3</a>
       <a>…</a>
       <a>1004</a>
       <a>最后一页</a>
      </aside>
 </div>
</section>

<?php include 'inc/footer.inc.php' ?>