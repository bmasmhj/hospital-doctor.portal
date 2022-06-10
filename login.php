<!DOCTYPE html>

<html lang="en">
<?php 
session_start();

if(isset($_SESSION['doctorusername']) && isset($_SESSION['doctorpassword'])){
    require 'controller/connection.php';
    $username = $_SESSION['doctorusername'];
    $password = $_SESSION['doctorpassword'];
    $usernames = base64_decode($username);
    $chewckuser = "SELECT * FROM doctor WHERE username = '$username'";
        $res = mysqli_query($con, $chewckuser);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $name = $fetch['name'];
                $status = $fetch['accstatus'];
                if($status === 'newacc'){
                    $sql = "UPDATE doctor SET accstatus = 'new' WHERE username = '$username' ";
                    if ($con->query($sql)) {
                         header('Location: newuser');
                    }
                }

                header('Location: Dashboard');

            }else{
                session_start();
                session_unset();
                session_destroy();
            }
        }else{
            session_start();
            session_unset();
            session_destroy();
       
        }
}

?>

    <head>
        <meta charset="utf-8">
        <title>Dashboard | Doctr </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" href="../Hospital/assets/images/favicon.png">
    
        <link href="../Hospital/assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="../Hospital/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
       
    
    </head>
 
    <body>
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">
                            <div class="card-body p-4">            
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                                    <p class="text-muted mb-4" id="alert">Enter your username and password to login.</p>
                                </div>
                                <form action="#" id="logindoctr" class="needs-validation" novalidate>
                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Username/Email</label>
                                        <input class="form-control" type="text" id="doctorusername" name="doctorusername" required="" placeholder="Enter your username or email">
                                    </div>
                                    <div class="mb-3">
                                        <a href="pages-recoverpw.html" class="text-muted float-end"><small>Forgot your password?</small></a>
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" required name="doctorpassword" id="doctorpassword" class="form-control" placeholder="Enter your password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 mb-0 text-center">
                                        <button class="btn btn-primary" type="submit"> Log In </button>
                                    </div>

                                </form>
                            </div> 
                        </div>  
                    </div>
                </div>
            </div>
        </div>

        <script src="../Hospital/assets/js/vendor.min.js"></script>
        <script src="../Hospital/assets/js/app.min.js"></script>
        
        <script>
    $('#logindoctr').on('submit', function(e) {
	e.preventDefault();
	var username = $('#doctorusername').val();
	var password = $('#doctorpassword').val();


    if(username!='' & password !=''){
	$('#alert').html('Verifying User');

	setTimeout(() => {
		$.ajax({
			url: "checker.php",
			type: "POST",
			data: new FormData(this),
			contentType: false,
			processData: false,
			success:function(response){
				var result = $.trim(response);
				if(result == 'nouser'){
					$('#alert').html('Could not verify User !');
					$('#doctorusername').val('');
					$('#doctorpassword').val('');

				}
				else if (result == 'wronguser'){
					$('#alert').html('Your Password is incorrect !');
					$('#doctorpassword').val('');
				}
				else if(result == 'success'){
					$('#alert').html('User Verified !');
					setTimeout(() => { $('#alert').html('Logging in as '+username);   }, 500);  
					setTimeout(() => { window.location.href = "Dashboard"; }, 600);  
				}
                else {
					$('#alert').html(response);

                }
			}
		});
	}, 800);
    }
});
        </script>
    </body>
</html>
