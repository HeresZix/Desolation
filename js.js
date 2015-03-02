$(document).ready(function(){
	$(".hoverer").hover(function(){
		$(".timeleft").load("timetillscavenge.php");
	});
});