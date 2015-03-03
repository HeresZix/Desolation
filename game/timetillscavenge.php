<?php
session_start();
include("../includes/functions.php");
connect();

echo 2 - getTimeSinceLastLoot(date("Y-m-d H:i:s"), $_SESSION['uid']);

if (2 - getTimeSinceLastLoot(date("Y-m-d H:i:s"), $_SESSION['uid']) <= 0){
	echo "
	<script type=\"text/javascript\">
		$(document).ready(function(){
			$(\".hoverer\").hover(function(){
				$(\".scavenge\").html(\"<a href=\"scavenge\">Scavenge</a>\");
			});
		});
	</script>
	";
}
?> 