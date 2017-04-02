<?php require "getvar.php"; ?>

<html>
<head>
<title>ASRcalendar</title>
<link rel="stylesheet" type="text/css" href="css/calendar.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
	<tr><button class="viewday">Day</button><button class="viewmonth">Month</button></tr>
	
	<table style="border:3px solid green;" class="cal">

	<tr>
	
	<td><button class="back">Back</button></td>
	<td colspan="5">
	<?php echo "<span class=MYdiv id=".$month."/".$Year."/".$numDays.">".$day.",".$monthName.", ".$Year."</span>"; 
		  echo "<div class='daysel' style='display:none;' id=".$day."></div>";
	?>
	<button class="next">Next</button>
	</td>
	
	</tr>
<?php 
echo "<div class='viewtype' id=".$viewtype." style='display:none;'></div>";

if ($viewtype=="month") {
require 'month.php'; 
}
if ($viewtype=="day") {
require 'day.php'; 
}

?>
</table>

<div class="evform" style="display:none;">
<button class="close">Close</button>	
	<h5>Event Name:</h5>
	<input class="evName" type="text"><br>
	<h5>Repeating:</h5>
   <select class="rep" name="form_repeat_freq" title="Every, every other, every 3rd, etc.">
    <option value="1">everyday</option>
    <option value="2">every 2 days</option>
    <option value="3">every 3 days</option>
    <option value="4">every 4 days</option>
    <option value="5">every 5 days</option>
    <option value="6">every 6 days</option>
   	<option value="7">Weekly</option>
   </select>


   <br><button class="submit">Submit</button>
</div>

<div class="evform2" style="display:none;">
<button class="close">Close</button>	<br><br><br><br><br><br><br><br>
<h4>Are you sure you want to delete the event?</h4>
<button class="delete">Delete Event</button>

</div>

</body>
</html>