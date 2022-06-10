<?php


session_start();
require '../controller/connection.php';
$username = $_SESSION['doctorusername'];
$fetchid = $_SESSION['doctorid'] ;
if(isset($_POST['password3'])){
    $startday = $_POST['startday'];
    $endday = $_POST['endday'];
    $startime = $_POST['startime'];
    $endtime = $_POST['endtime'];
    $status = 'changed';
    $password = mysqli_real_escape_string($con, $_POST['password3']);
    $encpass = password_hash($password, PASSWORD_BCRYPT);

    $sql = "UPDATE `doctor` SET `accstatus` = '$status', `password` = '$encpass' , `scheduledaystart` = '$startday' , `scheduledaayend`='$endday' , `scheduletimestart`='$startime', `scheduletimeend`='$endtime' , `code` = 'Changed' WHERE id= '$fetchid' ";
    if ($con->query($sql)) {    
        $_SESSION['doctorpassword'] =  $encpass;
            echo 'success';
    }else{
        die("Update failed $con->error");

    }


}
?>
