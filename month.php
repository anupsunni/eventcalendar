<tr>
	<td width="50px">Sun</td>
	<td width="50px">Mon</td>
	<td width="50px">Tue</td>
	<td width="50px">Wed</td>
	<td width="50px">Thu</td>
	<td width="50px">Fri</td>
	<td width="50px">Sat</td>
</tr>

<?php
$d=1;

$counter=1;

	echo "<tr>";
	$j=0;
	$timeStamp= strtotime("$Year-$month-1");
	$firstday= date("w",$timeStamp);
	
	for ($i=1; $i <=$numDays+$firstday ; $i++,$counter++) { 
		$timeStamp= strtotime("$Year-$month-$i");
		
		if ($i==1) {
		$firstday= date("w",$timeStamp);
		}

		if ($j<$firstday) {
			$j++;
			echo "<td>&nbsp</td>";
		}
		else{
		echo "<td class='day' id=".$Year."/".$m."/".$d.">".$d++."</td>";
		}

		if ($counter%7==0) 
		{
			echo "</tr><tr>";
		}


	}

	echo "</tr>";
?>
