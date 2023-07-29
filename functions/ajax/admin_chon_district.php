<?php
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$action = new action();

	$id = $_GET['id'];

	$ward = $action->getList('ward', 'district_id', $id, 'id', 'asc', '', '', '');
	echo '<option value="0">Chọn Phường Xã</option>';
	foreach ($ward as $item) { 
?>
<option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
<?php } ?>