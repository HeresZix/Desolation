<?php

$craftingrecipies = array(
	"1:5;11:1;2:1=18",
	"3:1=9"
);
$arrlength = count($craftingrecipies);

for($x = 0; $x < $arrlength; $x++){
	$split = explode("=", $craftingrecipies[$x]);
	$result = $split[1];
	$items = explode(";", $split[0]);	
	$itemdata = explode(":", $items);
	
	
	
	echo $result . "<br>";
	echo $resultamt;
}


?>