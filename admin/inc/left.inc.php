<!--aside nav-->
<aside class="lt_aside_nav content mCustomScrollbar">
 <h2><a href="index.php">起始页</a></h2>
 <ul>
  <li>
   <dl>
    <dt>商品管理</dt>
    <!--当前链接则添加class:active-->
    <dd><a href="product_list.html">商品列表</a></dd>
    <dd><a href="product_detail.html">新增商品</a></dd>
    <dd><a href="recycle_bin.html">商品回收站</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>商品分类管理</dt>
    <!--当前链接则添加class:active-->
    <dd><a href="product_list.html">基本分类列表</a></dd>
    <dd><a href="father_cate_add.php" <?php if(basename($_SERVER['SCRIPT_NAME'])=='father_cate_add.php'){echo 'class="active"';} ?>>新增基本分类</a></dd>
    <dd><a href="product_list.html">子分类列表</a></dd>
    <dd><a href="son_cate_add.php" <?php if(basename($_SERVER['SCRIPT_NAME'])=='son_cate_add.php'){echo 'class="active"';} ?>>新增子分类</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>订单信息</dt>
    <dd><a href="order_list.html">订单列表示例</a></dd>
    <dd><a href="order_detail.html">订单详情示例</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>会员管理</dt>
    <dd><a href="user_list.html">会员列表示例</a></dd>
    <dd><a href="user_detail.html">添加会员（详情）示例</a></dd>
    <dd><a href="user_rank.html">会员等级示例</a></dd>
    <dd><a href="adjust_funding.html">会员资金管理示例</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>基础设置</dt>
    <dd><a href="setting.html">站点基础设置示例</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>配送与支付设置</dt>
    <dd><a href="express_list.html">配送方式</a></dd>
    <dd><a href="pay_list.html">支付方式</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>在线统计</dt>
    <dd><a href="discharge_statistic.html">流量统计</a></dd>
    <dd><a href="sales_volume.html">销售额统计</a></dd>
   </dl>
  </li>
  <li>
   <p class="btm_infor">© www.lshop.com 版权所有</p>
  </li>
 </ul>
</aside>
<style>
.dataStatistic{width:400px;height:200px;border:1px solid #ccc;margin:0 auto;margin:10px;overflow:hidden}
#cylindrical{width:400px;height:200px;margin-top:-15px}
#line{width:400px;height:200px;margin-top:-15px}
#pie{width:400px;height:200px;margin-top:-15px}
</style>  