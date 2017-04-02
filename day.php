<?php 
require 'dbcon.php';
require 'getvar.php';

$events=array(
null,null,null,null,null,null,null,null,null,null,
null,null,null,null,null,null,null,null,null,null,
null,null,null,null,null,null,null,null,null,null,
null,null,null,null,null,null,null,null,null,null,
null	
);


$SQL_EVENTS= " select * from eventcalendar ";
$ctr=$con->query($SQL_EVENTS);

if($ctr === false) 
        {
        trigger_error('Wrong SQL: ' . $SQL_EVENTS . ' Error: ' . $con->error, E_USER_ERROR);
        }else{
        	$ctr->data_seek(0);
		  while ($row = $ctr->fetch_assoc())
		    {
		
		
				$cn=$row['name'];
				$cy=$row['year'];
				$cm=$row['month'];
				$cd=$row['day'];
				$ct=$row['time'];
				$cr=$row['rep'];
				$cTS=$currentTimeStamp;
				
			
		   		$monthName = date('F', mktime(0, 0, 0, $cm, 10));
				$diff=$cTS-strtotime("$cd-$monthName-$cy");	

				$datediff=floor($diff / (60 * 60 * 24));
				
				if ($datediff>=0) {

					$n=((intval((explode(":",$ct))[0])-8)*4+(intval((explode(":",$ct))[1])/15));
					if ($datediff%$cr==0) {
						$events[$n]=$cn;
					}
		
				}
			}	
		  // Free result set
		  mysqli_free_result($ctr);
		}



$hr=8;
$min=0;
for ($i=0; $i <sizeof($events) ; $i++) {
	if ($min==0) {
		$min='00';
	}

	if ($events[$i]==null) {
echo "<tr><td >".$hr.":".$min."</td><td id=".$Year."/".$m."/".$day.'|'.$hr.':'.$min." class='event'><div style='width:400px;'></div>"."</td></tr>";
	}
	else{
echo "<tr><td >".$hr.":".$min."</td><td id=".$Year."/".$m."/".$day.'|'.$hr.':'.$min." class='eventadded'><div style='width:400px;' class='appt'>".$events[$i]."</div>"."</td></tr>";
}

	$min+=15;
	if ($min==60) {
		$min=0;
		$hr++;
	}

}

require 'discon.php';

?>