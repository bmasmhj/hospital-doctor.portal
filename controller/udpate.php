<?php

require 'connection.php';

if(isset($_POST['deleteapnt'])){
    $id = $_POST['deleteapnt'];
    $updtestat = "UPDATE `appointment` SET status = 'deleted' WHERE id= '$id'";
    if ($con->query($updtestat)) { $done = 'ok'; }
    
    
}
if(isset($_POST['completedapnt'])){
    $id = $_POST['completedapnt'];
    $updtestat = "UPDATE `appointment` SET status = 'completed' WHERE id= '$id'";
    if ($con->query($updtestat)) { $done = 'ok'; }
    
    
}
if(isset($_POST['acceptapnt'])){
    $id = $_POST['acceptapnt'];
    $updtestat = "UPDATE `appointment` SET status = 'accepted' WHERE id= '$id'";
    if ($con->query($updtestat)) { $done = 'ok'; }
    
    
}
if(isset($_POST['declineapnt'])){
    $id = $_POST['declineapnt'];
    $updtestat = "UPDATE `appointment` SET status = 'cancelled' WHERE id= '$id'";
    if ($con->query($updtestat)) { $done = 'ok'; }
    
} 


session_start();
$id = $_SESSION['fetchid'];

if(isset($_POST['spec_doc'])){
    $spec = $_POST['spec_doc'];
    $updtestat = "UPDATE doctor SET specialityid = '$spec' WHERE `id` = '$id'";
    if ($con->query($updtestat)) { $done = 'ok'; }
}
else if(isset($_POST['spec_s_day'])){
    $spec = $_POST['spec_s_day'];
    $updtestat = "UPDATE doctor SET scheduledaystart = '$spec' WHERE `id` = '$id'";
    if ($con->query($updtestat)) { $done = 'ok'; }

}
else if(isset($_POST['spec_e_day'])){
    $spec = $_POST['spec_e_day'];
    $updtestat = "UPDATE doctor SET scheduledaayend = '$spec' WHERE `id` = '$id'";
    if ($con->query($updtestat)) { $done = 'ok'; }
    
}
else if(isset($_POST['spec_s_time'])){
    $spec = $_POST['spec_s_time'];
    $updtestat = "UPDATE doctor SET scheduletimestart = '$spec' WHERE `id` = '$id'";
    if ($con->query($updtestat)) { $done = 'ok'; }
}
else if(isset($_POST['spec_e_time'])){
    $spec = $_POST['spec_e_time'];
    $updtestat = "UPDATE doctor SET scheduletimeend = '$spec' WHERE `id` = '$id'";
    if ($con->query($updtestat)) { $done = 'ok'; }
    
}else if(isset($_POST['clearallnotif'])){
    // $id = $_SESSION['fetchid'];
    $deletestat ="DELETE FROM `personalnotify` WHERE docid = '$id' ";
    if ($con->query($deletestat)) { echo 'ok'; }
 
}
else if(isset($_POST['deletenoti'])){
    $ides = $_POST['deletenoti'];
   $deletestat ="DELETE FROM `personalnotify` WHERE id = '$ides' ";
   if ($con->query($deletestat)) { $done = 'ok'; }

}
else if( isset($_POST['oldpassword']) & isset($_POST['newpassword']) &  isset($_POST['confpassword']) ){

    $username = $_SESSION['doctorusername'] ;
    $new = $_POST['newpassword'];
    $password = $_POST['oldpassword'];
    $usernames = base64_decode($username);
    $chewckuser = "SELECT * FROM doctor WHERE username = '$username' OR email = '$usernames'";
        $res = mysqli_query($con, $chewckuser);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            $fetch_email = $fetch['email'];
            if(password_verify($password, $fetch_pass)){
                $changepw = password_hash($new, PASSWORD_BCRYPT);
                $sql = "UPDATE doctor SET `password` = '$changepw' ,`code` = 'Changed', `accstatus` = 'changed'  WHERE email = '$fetch_email' ";
                if ($con->query($sql)) {
                     echo "success"; 
                     $_SESSION['doctorpassword'] = $new;
                }
            }else{
                echo "oldwrong";  
            }
        }else {
            echo "error";

        }


}
else if(isset($_POST['addnewtrain'])){
    $data = $_POST['addnewtrain'];
    $id = $_SESSION['fetchid'];
    $addsql = "INSERT INTO `education`(`description`, `docid`) VALUES ('$data' , '$id')";
    if ($con->query($addsql)) { echo 'ok'; }

}
else if(isset($_POST['addnewexp'])){
    $data = $_POST['addnewexp'];
    $id = $_SESSION['fetchid'];
    $addsql = "INSERT INTO `workexperiene`(`description`, `docid`) VALUES ('$data' , '$id')";
    if ($con->query($addsql)) { echo 'ok'; }

}
else if(isset($_POST['deleteeduc'])){
    $idedc =  $_POST['deleteeduc'];
    $addsql = "DELETE FROM `education` WHERE id = '$idedc'";
    if ($con->query($addsql)) { echo 'ok'; }
}
else if(isset($_POST['deleteexps'])){
    $idex =  $_POST['deleteexps'];
    $addsql = "DELETE FROM `workexperiene` WHERE id = '$idex'";
    if ($con->query($addsql)) { echo 'ok'; }

}
elseif (isset($_POST['docbtnpp'])) {
    $id = $_SESSION['fetchid'];
	$image1 = $_POST['img'];
    if (isset($_FILES['photo'])) {
        $tmpFilePath = $_FILES['photo']['tmp_name'];
        if ($tmpFilePath != ""){
          $maxsize = 524288895959;
          $extsAllowed = array( 'jpg', 'jpeg', 'png' ,'gif');
          $uploadedfile = $_FILES['photo']['name'];
          $extension = pathinfo($uploadedfile, PATHINFO_EXTENSION);
          if (in_array($extension, $extsAllowed) ) {
            $newpicture = uniqid();
            $url = $newpicture.$uploadedfile ;
            $name = "../../Hospital/assets/images/uploads/doctors/".$url;
            $result = move_uploaded_file($_FILES['photo']['tmp_name'], $name);
            $imageofrecord = $url;

            $sql = "UPDATE doctor SET `image` = '$imageofrecord'  WHERE id = '$id' ";
                if ($con->query($sql)) {
                    header('location:../Dashboard');
                }

          }
      }
    }

}



    // echo'<pre>';
    // print_r($_POST);

if(isset($_POST['updatedoctorbasicdata'])){
    $docname = $_POST['docname'];
    $docemail = $_POST['docemail'];
    $gender = $_POST['gender'];

    $updatebasic = "UPDATE doctor SET `name`= '$docname' , `email`='$docemail' , `sex` = '$gender' WHERE `id` = '$id' ";
    if ($con->query($updatebasic)) { 
        header('Location: ../Profile?success');

     }

}

?>