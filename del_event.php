<?php
require 'dbcon.php';

$name=	$_POST['name'];
$time=	$_POST['time'];

$SQLdel="
DELETE FROM eventcalendar
WHERE name = '$name' AND time = '$time'
";


$del = $con->query($SQLdel);

if ($del) {
	echo "Event Successfully Deleted";
}else{
	trigger_error('Wrong SQL: ' . $del . ' Error: ' . $con->error, E_USER_ERROR);
	echo "Failed";
}

require 'discon.php';
?>