<?php  
$servername= "localhost";
$username= "username";
$password="password";
$con= new mysqli($servername,$username,$password);
if ($con->connect_error) 
{
	echo "<h2>Sorry We Have Some Problem In The Server</h2>";
}

$sqlDB="
CREATE DATABASE IF NOT EXISTS cal;
";
$createDB=$con->query($sqlDB);
$con->close();

$dbname='cal';
$con= new mysqli($servername,$username,$password,$dbname);
if ($con->connect_error) 
{
	echo "<h2>Sorry We Have Some Problem In The Server</h2>";
}

?>