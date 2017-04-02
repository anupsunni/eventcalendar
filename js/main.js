$(document).ready(function(){
var month=(($(".MYdiv").attr("id")).split("/"))[0];
var year=(($(".MYdiv").attr("id")).split("/"))[1];
var nodays=(($(".MYdiv").attr("id")).split("/"))[2];
var viewtype=$(".viewtype").attr("id");
var day=$(".daysel").attr("id");
var evID='';
var evTmp='';
var evYR='';
var evMon='';
var evDay='';
var evTime='';
var delEvNm='';
var delEvTm='';

function daysInMonth(month,year) {
    return new Date(year, month, 0).getDate();
}

$(".next").click(function(){
	if (viewtype=='month') {
	month++;
	if (month>12) {year++;month=1;}
	window.open("?month="+month+"&&year="+year+"&&viewtype="+viewtype+"&&day="+day,"_self");
	
	}else if (viewtype=='month'){


	}else if (viewtype=='day'){
	day++;
	if (day>nodays) {
		month++; day=1;
	}
	if (month>12) {year++;month=1;}
	window.open("?month="+month+"&&year="+year+"&&viewtype="+viewtype+"&&day="+day,"_self");
	}

});



$(".back").click(function(){
	if (viewtype=='month') {
	month--;
	if (month<1){year--;month=12;}
	window.open("?month="+month+"&&year="+year+"&&viewtype="+viewtype+"&&day="+day,"_self");
	}else if (viewtype=='month'){


	}else if (viewtype=='day'){
	day--;
	if (day<1) {
		month--; day=daysInMonth(month,year);
	}
	if (month<1) {year--;month=12;}
	window.open("?month="+month+"&&year="+year+"&&viewtype="+viewtype+"&&day="+day,"_self");
	}
});



$(".day").click(function(){

var Sday=$(this).attr('id');
var y=(Sday.split('/'))[0];
var m=(Sday.split('/'))[1];
var d=(Sday.split('/'))[2];
window.open("?month="+m+"&&year="+y+"&&viewtype="+"day"+"&&day="+d,"_self");
});



$(".viewday").click(function(){

	viewtype='day';
	window.open("?month="+month+"&&year="+year+"&&viewtype="+viewtype+"&&day="+day,"_self");

});

$(".viewmonth").click(function(){

viewtype='month';
	window.open("?month="+month+"&&year="+year+"&&viewtype="+viewtype+"&&day="+day,"_self");

});

$('.event').click(function(){

	evID=$(this).attr("id");
	evTmp=evID.split('/');
	evYR=evTmp[0];
	evMon=evTmp[1];
	evDay=((evTmp[2]).split('|'))[0];
	evTime=((evTmp[2]).split('|'))[1];

	$('.evform').show('200');

});

$('.close').click(function(){
	$('.evform').hide('200'); $('.evform2').hide('200'); 
});

$('.submit').click(function(){
	var evName=$(".evName").val();
	var rep=$(".rep").find(":selected").attr("value");
	var obj={
		name:evName,
		year:evYR,
		month:evMon,
		day:evDay,
		time:evTime,
		repeat:rep
	};
	$.post('add_event.php',obj,function(ret){
		alert(ret);
	window.open("?month="+month+"&&year="+year+"&&viewtype="+viewtype+"&&day="+day,"_self");

	});

});


$(".eventadded").click(function(){
	$('.evform2').show(100);
	evID=$(this).attr("id");
	evTmp=evID.split('/');
	evYR=evTmp[0];
	evMon=evTmp[1];
	evDay=((evTmp[2]).split('|'))[0];
	delEvTm=((evTmp[2]).split('|'))[1];
	delEvNm=$(this).text();
});

$('.delete').click(function(){
	var obj={
		name:delEvNm,
		time:delEvTm
	};
	$.post('del_event.php',obj,function(ret){
	alert(ret);
	window.open("?month="+month+"&&year="+year+"&&viewtype="+viewtype+"&&day="+day,"_self");
	});

});


});