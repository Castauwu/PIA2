<html>
<head>
</head>
<?php
$p1=$_POST["p1"];
$p2=$_POST["p2"];
$p3=$_POST["p3"];
$p4=$_POST["p4"];
$p5=$_POST["p5"];
$p6=$_POST["p6"];
$p7=$_POST["p7"];
$p8=$_POST["p8"];
$p9=$_POST["p9"];
$sum=$p1+$p2+$p3+$p4+$p5+$p6+$p7+$p8+$p9;
if ($sum < 7){
	$col="#FF0000";
} 
if ($sum > 7 && $sum <= 14){
	$col="#FFF000";
}
if ($sum > 14 && $sum <= 21){
	$col="#0000FF";
}
if ($sum > 21 && $sum <= 28){
	$col="#00E4FF";
} 
if ($sum > 28){
	$col="#3AFF00";
}
echo '<body style="background-color":'.$col.'>';
?> 
</body>
</html>
