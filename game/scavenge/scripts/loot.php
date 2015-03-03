<?php

date_default_timezone_set('Australia/Melbourne');
$mysql_date_now = date("Y-m-d H:i:s");

$id = $_SESSION['uid'];

mysql_query("UPDATE `desolation`.`misc_data` SET `timesinceloot` = '$mysql_date_now' WHERE `misc_data`.`id` = '$id';") or die(mysql_error());

$lootfound = array();

$loottofind = mt_rand(1, 4);

// Add non findable items here
$blacklist = array(
	10,
	13,
	17,
	15,
	2,
	12
);

for($x = 0; $x < $loottofind; $x++){
	$curloot = mt_rand(1, 12);
	if(!in_array($curloot, $blacklist)){
		array_push($lootfound, $curloot);
	}
}

echo "<br>You found:<br>";

for($y = 0; $y < count($lootfound); $y++) {
	echo getItemNameFromID($lootfound[$y]) . "<br>";
	addItemToInventoryAndSave(getSerializedInventory($_SESSION['uid']), $lootfound[$y], 1);
}
echo "<br>";
?>

<a href="../">Head Home</a>







