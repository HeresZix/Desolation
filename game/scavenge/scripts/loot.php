<?php

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
	//if(!in_array($curloot, $blacklist)){
	array_push($lootfound, $curloot);
	//}
}

echo getSerializedInventory($_SESSION['uid']);

echo "<br>You found:<br>";
echo getItemNameFromID($lootfound[1]) . "<br>";
echo addItemToInventory(getSerializedInventory($_SESSION['uid']), $lootfound[1], 1);

//for($y = 0; $y < $loottofind; $y++){
//	echo getItemNameFromID($lootfound[$y]) . "<br>";
//	echo addItemToInventory(getSerializedInventory($_SESSION['uid']), $lootfound[$y], 1);
//}
echo "<br>";
echo getSerializedInventory($_SESSION['uid']) . "<br>";
?>

<a href="../">Head Home</a>







