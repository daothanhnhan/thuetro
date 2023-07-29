<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$huyen_id = $_GET['id'];
	$action = new action();

	$ward = $action->getList('ward', 'district_id', $huyen_id, 'id', 'asc', '', '', '');
?>
<option value="0">Tất cả xã phường</option>
<?php foreach ($ward as $item) { ?>
<option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
<?php } ?>