<?php

include("includes/functions.php");
connect();

mysql_query("DROP TABLE users");
mysql_query("DROP TABLE inventories");
mysql_query("DROP TABLE misc_data");

mysql_query("CREATE TABLE `desolation`.`users` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,  `username` VARCHAR(20) NOT NULL ,  `password` VARCHAR(32) NOT NULL ,  `email` VARCHAR(100) NOT NULL ) ENGINE = InnoDB;");
mysql_query("ALTER TABLE `users` ADD `gamestate` INT NOT NULL;");
mysql_query("CREATE TABLE `desolation`.`inventories` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,  `inventory` VARCHAR(2048) NOT NULL ) ENGINE = InnoDB");
mysql_query("CREATE TABLE `desolation`.`misc_data` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,  `timesinceloot` DATETIME NOT NULL ) ENGINE = InnoDB;");

echo "Done!";
?>