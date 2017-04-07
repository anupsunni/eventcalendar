<?php  
require 'dbcon.php';

$rep=	$_POST['repeat'];
$name=	$_POST['name'];
$year=	$_POST['year'];
$month=	$_POST['month'];
$day=	$_POST['day'];
$time=	$_POST['time'];

$SQL_Cal_Table=
"
CREATE TABLE IF NOT EXISTS `eventcalendar`
(
num int AUTO_INCREMENT PRIMARY KEY,
name varchar(255),
year varchar(255),
month varchar(255),
day varchar(255),
time varchar(255),
rep varchar(255)
)
";
$SqlTable=$con->query($SQL_Cal_Table);

$sql_insert=
	"
		insert into `eventcalendar` (name,year,month,day,time,rep)
		values ('".$name."','".$year."','".$month."','".$day."','".$time."','".$rep."')
	";
$SqlAddTable=$con->query($sql_insert);

if ($SqlTable&&$SqlAddTable) {
	echo "Successfully Added";
}else{
	trigger_error('Wrong SQL: ' . $sql_create_Table . ' Error: ' . $con->error, E_USER_ERROR);
}

require 'discon.php';
?>
