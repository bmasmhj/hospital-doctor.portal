<?php 

require 'controller/connection.php';

if(isset($_POST['doctorusername'])){
    $username = $_POST['doctorusername'];
    $password = $_POST['doctorpassword'];

    $userconvert = base64_encode($username); 

    $chewckuser = "SELECT * FROM doctor WHERE username = '$userconvert' OR email = '$username' ";
        $res = mysqli_query($con, $chewckuser);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            $fetch_name = $fetch['name'];
            $fetch_id = $fetch['id'];

            if(password_verify($password, $fetch_pass)){
                session_start();
                $_SESSION['doctorusername'] = $userconvert;
                $_SESSION['doctorpassword'] = $password;
                $_SESSION['doctorid'] = $fetch_id;

                echo "success";
            }
            else{
                echo "wronguser";
            }
        }else{
            echo "nouser";
        }
    // $encpass = password_hash($password, PASSWORD_BCRYPT);
}
?>