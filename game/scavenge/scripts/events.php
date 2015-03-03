<?php

$eventarray = array(
	"EVENT_HELIDROP",
	"EVENT_HELICRASH",
	"EVENT_PLANEDROP",
	"EVENT_PLANECRASH",
	"EVENT_NA",
	"EVENT_NA",
	"EVENT_NA",
	"EVENT_NA",
	"EVENT_NA",
	"EVENT_NA",
	"EVENT_NA",
	"EVENT_NA",
	"EVENT_NA",
	"EVENT_NA",
	"EVENT_NA",
	"EVENT_NA",
	"EVENT_NA",
	"EVENT_NA"
);
$event = $eventarray[mt_rand(0, count($eventarray) - 1)];

if ($event == "EVENT_HELICRASH") {
	include("helicrash.html");
} elseif($event == "EVENT_HELIDROP") {
	include("helidrop.html");
} elseif($event == "EVENT_PLANEDROP"){
	include("planedrop.html");
} elseif($event == "EVENT_PLANECRASH"){
	include("planecrash.html");
}

?>