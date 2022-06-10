<?php

require 'connection.php';

if(isset($_POST['notific'])){
    require 'timeago.php';

    $active = '';
    session_start();
    $fetchid = $_SESSION['fetchid'];

    $notimsgsql = "SELECT * FROM personalnotify WHERE docid = '$fetchid' ORDER BY id desc ";
    $notimsgeresult = $con->query($notimsgsql);
    if ($notimsgeresult->num_rows > 0) {
        while ($notimsgerow = $notimsgeresult->fetch_assoc()) {
            $time = $notimsgerow['created'];
            $timeago = time_elapsed_string($time);  
            if($notimsgerow['status']==0){
                $active = 'active';
            }
            else {
                $active = '';
            }
        echo '
            <a class="dropdown-item notify-item '.$active.' ">
                <div class="notify-icon bg-'.$notimsgerow["color"].'">
                    <i class="mdi '.$notimsgerow["icon"].'"></i>
                </div>
                <p class="notify-details">
                    '.$notimsgerow["message"].'
                    <small class="text-muted">'.$timeago.'</small>
                </p>
            </a>';
        }
        $update = "UPDATE `personalnotify` SET `status`='1' WHERE docid = '$fetchid'";
        if ($con->query($update)) { 
            
        }
        else{
            die("Update failed $connection->error");
        }
    } 
    
}
// else if(){

// }


?>

