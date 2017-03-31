<?php 
//文件引入及网页基本信息的建立
include '../inc/config.inc.php';
include '../inc/mysql.inc.php';
include '../inc/tool.inc.php';
$template['title'] = '子分类列表';
$template['js'] = array('style/js/jquery.js', 'style/js/jquery.mCustomScrollbar.concat.min.js');

$link = connect();
$charset = "SET NAMES 'utf8';";
execute($link, $charset);

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
      <table class="table">
       <tr>
        <th>id</th>
        <th>所属分类[id]</th>
        <th>分类名称</th>
        <th>操作</th>
       </tr>
       <?php  
          $query = "SELECT * from `lshop_cate` where pid!=0";
          $result = execute($link, $query);
          while($data = mysqli_fetch_assoc($result)) {
            $query_i = "SELECT id,cate_name from `lshop_cate` where id={$data['pid']}";
            $result_i = execute($link, $query_i);
            $data_i = mysqli_fetch_assoc($result_i);
            $url = urlencode("son_cate_delete.php?id={$data['id']}");
            $return_url = urlencode($_SERVER['REQUEST_URI']);
            $message = "您真的要删除子分类 '♐ {$data['cate_name']}' 吗？";
            $delete_url = "confirm.php?url={$url}&return_url={$return_url}&message={$message}";
$html =<<<A
          <tr>
            <td class="center">{$data['id']}</td>
            <td class="center">{$data_i['cate_name']}[{$data_i['id']}]</td>
            <td class="center">{$data['cate_name']}</td>
            <td class="center">
              <a href="#" title="预览" class="link_icon" target="_blank">&#118;</a>
              <a href="son_cate_update.php?id={$data['id']}" title="编辑" class="link_icon">&#101;</a>
              <a href="$delete_url" title="删除" class="link_icon">&#100;</a>
            </td>
          </tr>
A;
          echo $html;
            
          }
       ?>     
      </table>
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