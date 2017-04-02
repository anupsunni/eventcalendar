<?php
if (isset($_GET['day'])) {
	$day = $_GET['day'];
}else{
	$day=date('j');
}
if (isset($_GET['month'])) {
	$month = $_GET['month'];
}else{
	$month=date('n');
}
if (isset($_GET['year'])) {
	$Year = $_GET['year'];
}else{
	$Year=date('Y');
}
if (isset($_GET['viewtype'])) {
	$viewtype = $_GET['viewtype'];
}else{
	$viewtype="month";
}
$currentTimeStamp=strtotime("$Year-$month-$day");
$monthName=date("F",$currentTimeStamp);
$numDays=date("t",$currentTimeStamp);
if ($month>9) {
		$m=$month;
	}else{
		$m="0".$month;
	}

?>