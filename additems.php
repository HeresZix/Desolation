<?php
include("includes/functions.php");
connect();

mysql_query("DROP TABLE items");
mysql_query("CREATE TABLE `desolation`.`items` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,  `name` VARCHAR(2048) NOT NULL ) ENGINE = InnoDB");

$items = array(
	"Cloth",
	"Wooden Board",
	"Aluminium Can (Empty)",
	"Blank CD",
	"Written CD",
	"Iron Nugget",
	"Copper Nugget",
	"Coal Nugget",
	"Copper Wire",
	"Vinyl Scratch Plushie",
	"Glass Shard",
	"Survival Knife",
	"Server Rack",
	"Supply Crate",
	"Metal Pole",
	"Broken Keyboard",
	"Keyboard",
	"Crude Glass Spear"
);

$itemlength = count($items);

for ($x = 0; $x < $itemlength; $x++){
	mysql_query("INSERT INTO items (name) VALUES ('$items[$x]')") or die(mysql_error());
}

echo "Successfully added " . $itemlength . " items to the database.";

?>


















