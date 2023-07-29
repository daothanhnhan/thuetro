<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$tinh_id = $_GET['id'];
	$action = new action();

	$district = $action->getList('district', 'city_id', $tinh_id, 'id', 'asc', '', '', '');
?>
<option value="0">Chọn Huyện</option>
<?php foreach ($district as $item) { ?>
<option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
<?php } ?>