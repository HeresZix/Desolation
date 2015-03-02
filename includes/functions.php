<?php

function connect() {
    mysql_connect("localhost", "root", "");
    mysql_select_db("desolation");   
}

function protect($string) {
    return mysql_real_escape_string(strip_tags(addslashes($string)));
}

function getUser() {
    $id = $_SESSION['uid'];
    $id_check = mysql_query("SELECT username FROM users WHERE id='$id'") or die(mysql_error());
    if (mysql_num_rows($id_check) == 0) {
        return "N/A";
    } else {
        $get_id = mysql_fetch_assoc($id_check);
        $userid = $get_id['username'];
        return $userid;
    }
}

function time_elapsed_string($datetime, $full = false) {
	
	date_default_timezone_set('Australia/Melbourne');
	
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function getTimeSinceLastLoot($date, $id){
	date_default_timezone_set('Australia/Melbourne');
	
	$timecheck = mysql_query("SELECT timesinceloot FROM misc_data WHERE id='$id'") or die(mysql_error());
	if (mysql_num_rows($timecheck) == 0){
		echo "You broke it. Im not sure how, but you did.";
	} else {
		
		$timeget = mysql_fetch_assoc($timecheck);
		$timesinceloot = $timeget['timesinceloot'];
		
		$seconds  = strtotime($date) - strtotime($timesinceloot);

		$months = floor($seconds / (3600*24*30));
		$day = floor($seconds / (3600*24));
		$hours = floor($seconds / 3600);
		$mins = floor(($seconds - ($hours*3600)) / 60);
		$secs = floor($seconds % 60);

		if($seconds < 60) {
			$time = $secs;
		} else if($seconds < 60*60 ) {
			$time = $mins;
		} else if($seconds < 24*60*60) {
			$time = $hours;
		} else if($seconds < 24*60*60) {
			$time = $day;
		} else {
			$time = $months." month ago";
		}
		return $mins;
		}
}

function canLoot($id) {
	// In minutes
	$loottimer = 10;
	$timecheck = mysql_query("SELECT timesinceloot FROM misc_data WHERE id='$id'") or die(mysql_error());
	if (mysql_num_rows($timecheck) == 0){
		echo "You broke it. Im not sure how, but you did.";
	} else {
		$timeget = mysql_fetch_assoc($timecheck);
		$timesinceloot = $timeget['timesinceloot'];
		if(getTimeSinceLastLoot(date("Y-m-d H:i:s"), $id) >= $loottimer) {
			return true;
		} else {
			return false;
		}
	}
}

function getSerializedInventory($id) {
	$inv_check = mysql_query("SELECT inventory FROM inventories WHERE id='$id'") or die(mysql_error());
	if (mysql_num_rows($inv_check) == 0) {
		return "N/A";
	} else {
		$get_inv = mysql_fetch_assoc($inv_check);
        $inv = $get_inv['inventory'];
        return $inv;
	}
}

function getGameState($id) {
	$state_check = mysql_query("SELECT gamestate FROM users WHERE id='$id'") or die(mysql_error());
	if (mysql_num_rows($state_check) == 0) {
		return "N/A";
	} else {
		$get_state = mysql_fetch_assoc($state_check);
        $state = $get_state['gamestate'];
        return $state;
	}
}

function getInventoryArray($inventory) {
	$items = explode(";", $inventory);
	return $items;
}

function getItemAmountFromInventory($inventory, $id) {
	$items = explode(";", $inventory);
	$arrlength = count($items);
	for ($x = 0; $x < $arrlength; $x++) {
		$item = explode(":", $items[$x]);
		if ($item[0] == $id){
			return $item[1];
		}
	}
}

function getItemNameFromInventory($inventory, $id) {
	$items = explode(";", $inventory);
	$arrlength = count($items);
	for ($x = 0; $x < $arrlength; $x++) {
		$item = explode(":", $items[$x]);
		if ($item[0] == $id){
			$item_check = mysql_query("SELECT name FROM items WHERE id='$id'") or die(mysql_error());
			if (mysql_num_rows($item_check) == 0) {
				return "N/A";
			} else {
				$get_item = mysql_fetch_assoc($item_check);
				$item = $get_item['name'];
				return $item;
			}
		}
	}
}

function getItemNameFromID($id){
	$item_check = mysql_query("SELECT name FROM items WHERE id='$id'") or die(mysql_error());
	if (mysql_num_rows($item_check) == 0) {
		return "N/A";
	} else {
		$get_item = mysql_fetch_assoc($item_check);
        $item = $get_item['name'];
        return $item;
	}
}

function addItemToInventory($inventory, $itemID, $amount) {
	$items = explode(";", $inventory);
	$arrlength = count($items);
	
	$newinvarray = array();
	
	for ($x = 0; $x < $arrlength; $x++) {
		$item = explode(":", $items[$x]);
		array_push($newinvarray, $items[$x]);
		
		if (!in_array($itemID, $newinvarray)) {
			array_push($newinvarray, $itemID . ":" . $amount);
		}
		
		if ($item[0] == $itemID) {
			$item[1] = $item[1] + $amount;
			$newitemdata = implode(":", array($item[0], $item[1]));
			unset($newinvarray[$x]);
			array_push($newinvarray, $newitemdata);
		}
	}

	$newinvarray = implode(";", $newinvarray);
	
	echo $newinvarray;
}
?>






















