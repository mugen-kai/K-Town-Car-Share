<?php
include 'Core/init.php';
redirect_to_login();
$vin = $_GET['vin'];
$date = $_GET['date'];
$memID = $_SESSION['MemberID'];
$length = $_GET['length'];
$code = '';
for ($i = 0; $i < 4; $i ++){
	$code.= mt_rand(0,9);
}
$query = "INSERT INTO reservation(MemberID,VIN,ReservationDate,AccessCode,Length) VALUES (".$memID.",".$vin.",'".$date."',".$code.",".$length.")";
mysql_query($query);
if(mysql_error()){
	header("Location: userProfile.php?error=failed%20to%20add%20car");
}else{
	header("Location: userProfile.php");
}
?>
