<?php

$inventory = getSerializedInventory($_SESSION['uid']);
$inventoryarray = explode(";", $inventory);

$arrlength = count($inventoryarray);

echo "Inventory<br>";

for ($x = 0; $x < $arrlength; $x++) {
	$itemdata = explode(":", $inventoryarray[$x]);
	echo getItemNameFromID($itemdata[0]) . ": " . getItemAmountFromInventory($inventory, $itemdata[0]) . "<br>";
}

?>