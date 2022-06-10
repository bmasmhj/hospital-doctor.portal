<?php 
session_start();

if(isset($_SESSION['doctorusername']) && isset($_SESSION['doctorpassword'])){
    require 'controller/connection.php';
    $username = $_SESSION['doctorusername'];
    $password = $_SESSION['doctorpassword'];
    $usernames = base64_decode($username);
    $chewckuser = "SELECT * FROM doctor WHERE username = '$username' OR email = '$usernames'";
        $res = mysqli_query($con, $chewckuser);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $docname = $fetch['name'];
                $docemail = $fetch['email'];
                $docusername = base64_decode($fetch['username']);


                $specialityid = $fetch['specialityid'];
                $gender = $fetch['sex'];
                $daystart = $fetch['scheduledaystart'];
                $dayend = $fetch['scheduledaayend'];
                $timestart = $fetch['scheduletimestart'];
                $timeend = $fetch['scheduletimeend'];
                $docimge = $fetch['image'];   
                $status = $fetch['accstatus'];
                $fetchid = $fetch['id'];

                $_SESSION['fetchid'] = $fetchid;
                if($status === 'newacc'){

                    $sql = "UPDATE doctor SET accstatus = 'new' WHERE id = $fetchid";
                    if ($con->query($sql)) {
                         header('Location: newuser');
                    }
                }else if($status === 'new'){
                    header('Location: newuser');    
                }

            }else{
                session_start();
                session_unset();
                session_destroy();
                header('Location: Login');
            }
        }else{
            session_start();
            session_unset();
            session_destroy();
            header('Location: Login');
       
        }
}
else{
    header('Location: Login');
}
require 'controller/infofetcher.php';

?>