<?php 
include '../inc/config.inc.php';
include '../inc/mysql.inc.php';

function getList($pid=0, &$result=array(), $space=0) {
	$link = connect();
	$space += 2;
	$query = "SELECT * from `lshop_cate` where pid=$pid";
	$res = execute($link, $query);
	while($data = mysqli_fetch_assoc($res)) {
		$data['cate_name'] = str_repeat('&nbsp;&nbsp;', $space) . '|--' . $data['cate_name'];
		$result[] = $data;
		getList($data['id'],$result,$space);
	}
	return $result;
}
$rs = getList();
echo "<select name='pid'>";
foreach ($rs as $key => $val) {
	echo "<option>{$val['cate_name']}</option>";
}
echo "</select>";
?>
<!-- $query = "SELECT * from `lshop_cate`";
            $result = execute($link, $query);
            while($data = mysqli_fetch_assoc($result)) {
              echo "<option value='{$data['id']}'>{$data['cate_name']}</option>";
            } -->