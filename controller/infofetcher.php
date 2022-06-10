<?php require 'connection.php';

$fetchid = $_SESSION['fetchid'];
$fullnotifiysql = "SELECT * FROM personalnotify WHERE docid = '$fetchid' ORDER BY id desc ";
$fullnotifiyeresult = $con->query($fullnotifiysql);
$fullnotifiydata = [];
if ($fullnotifiyeresult->num_rows > 0) {
while ($fullnotifiyerow = $fullnotifiyeresult->fetch_assoc()) {
    array_push($fullnotifiydata, $fullnotifiyerow);
    
}
}


$specialityidsql = "SELECT * FROM `speciality`";
$specialityresult = $con->query($specialityidsql);
$specialitydata = [];
if ($specialityresult->num_rows > 0) {
while ($specialityrow = $specialityresult->fetch_assoc()) {
    array_push($specialitydata, $specialityrow);
}
}

$daysidsql = "SELECT * FROM `days`";
$daysresult = $con->query($daysidsql);
$daysdata = [];
if ($daysresult->num_rows > 0) {
while ($daysrow = $daysresult->fetch_assoc()) {
    array_push($daysdata, $daysrow);
}
}
foreach($specialitydata as $key => $specialitydatavalue){
    if($specialityid === $specialitydatavalue['id'] ){
        $docspeciality = $specialitydatavalue['name'];
    }
}


$appointment_sql = "SELECT COUNT(id) FROM appointment WHERE doccode = '$fetchid'";
$appointment_result = mysqli_query($con,$appointment_sql);
$appointment_row = mysqli_fetch_array($appointment_result);
$appointment_count = number_format($appointment_row[0]);

$todaydate = date("Y-m-d");

$aptoday_sql = "SELECT COUNT(id) FROM appointment WHERE (doccode = '$fetchid' AND appointdate = '$todaydate')";
$aptoday_result = mysqli_query($con,$aptoday_sql);
$aptoday_row = mysqli_fetch_array($aptoday_result);
$aptoday_count = number_format($aptoday_row[0]);


$apcanceled_sql = "SELECT COUNT(id) FROM appointment WHERE (doccode = '$fetchid' AND status != 'accepted' and status != 'pending')";
$apcanceled_result = mysqli_query($con,$apcanceled_sql);
$apcanceled_row = mysqli_fetch_array($apcanceled_result);
$apcanceled_count = number_format($apcanceled_row[0]);
?>