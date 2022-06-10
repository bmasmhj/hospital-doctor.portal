<?php
if(isset($_POST['check'])){
require 'connection.php';
session_start();
$fetchid = $_SESSION['fetchid'];

$newdatasql = "SELECT * FROM personalnotify WHERE (docid = '$fetchid' AND status = '0') ";
$newdataeresult = $con->query($newdatasql);
if ($newdataeresult->num_rows > 0) {
    echo 'true';
}else{
   echo 'false';
}
}

?>
