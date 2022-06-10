<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">

    <link href="../../Hospital/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="../../Hospital/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
   
</head>
<style>
    .custom{
        text-align: center;
        margin-top : 22%;
    }
    

</style>
<?php 
session_start();

if(isset($_SESSION['doctorusername']) && isset($_SESSION['doctorpassword'])){
    require '../controller/connection.php';
    $username = $_SESSION['doctorusername'];
    $password = $_SESSION['doctorpassword'];
    $usernames = base64_decode($username);
    $chewckuser = "SELECT * FROM doctor WHERE username = '$username' OR email = '$usernames'";
        $res = mysqli_query($con, $chewckuser);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $name = $fetch['name'];
                $status = $fetch['accstatus'];
                    if($status === 'new'){
            
                    }else if($status === 'changed') {
                        header('Location: ../Dashboard');
                    }   
                    else if($status === 'newacc')
                    {
                       
                    }
                    else{
                        session_unset();
                        session_destroy();
                        header('Location: ../Login');
                    }
            }else{
  

                session_unset();
                session_destroy();
                header('Location: ../Login');

            }
        }else{
         

            session_unset();
            session_destroy();
            header('Location: ../Login');

       
        }
}
else {
    session_unset();
    session_destroy();
    header('Location: ../Login');
}

?>

<body style="background-color:#beebe4; background-image: url('doctor.png');background-size:contain; background-repeat: no-repeat; background-position: top;">
    <div class="custom d-flex align-items-center justify-content-center">
        <div class="customs-card" style="width:35%">
            <div class="card-body">
                <h4 class="header-title mb-3">Few more steps to go</h4>
                <div id="rootwizard">
                    <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                        <li class="nav-item" data-target-form="#accountForm"  id="accnt"> 
                            <a href="#first"  data-bs-toggle="tab" disabled data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 active">
                                <i class="mdi mdi-lock me-1"></i>
                                <span class="d-none d-sm-inline">Password</span>
                            </a>
                        </li>
                        <li class="nav-item" id="prfle" data-target-form="#profileForm">
                            <a href="#second" data-bs-toggle="tab" disabled data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                <i class="mdi mdi-timer-outline me-1"></i>
                                <span class="d-none d-sm-inline">Schedule</span>
                            </a>
                        </li>
                        <li class="nav-item disabled" data-target-form="#otherForm" >
                            <a href="#third" id="fnsh" data-bs-toggle="tab" disabled data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i>
                                <span class="d-none d-sm-inline">Finish</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content mb-0 b-0">

                        <div id="bar" class="progress mb-3" style="height: 7px;">
                            <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success" id='barsiner' style="width: 33.3333%;"></div>
                        </div>
                        
                        <div class="tab-pane active" id="first">
                            <form id="accountForm" method="post" action="#" class="form-horizontal">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="userName3">User name</label>
                                            <div class="col-md-9">
                                                <input type="text" disabled class="form-control" id="username" name="userName3" value="<?php echo $usernames?>" required="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="password3">New Password</label>
                                            <div class="col-md-9">
                                                <input type="password" id="password" name="password3" class="form-control" required="">
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="confirm3">Confirm Password</label>
                                            <div class="col-md-9">
                                                <input type="password" id="confirmps" name="confirm3" class="form-control" required="">
                                                <span id="error"></span>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </form>
                        </div>

                        <div class="tab-pane fade" id="second">
                            <form id="profileForm" method="post" action="#" class="form-horizontal">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="mb-4 row">
                                            <label class="col-md-3 col-form-label" for="name3">Available  Days</label>
                                            <div class="row col-md-9">
                                            <div class="col-5">   
                                                    <select class="form-select" required id="startday" aria-label="Floating label select example">
                                                        <option value='' selected disabled>Select Day</option>
                                                        <option value="SUN">Sunday</option>
                                                        <option value="MON">Monday</option>
                                                        <option value="TUE">Tuesday</option>
                                                        <option value="WED">Wednesday</option>
                                                        <option value="THUR">Thursday</option>
                                                        <option value="FRI">Friday</option>
                                                        <option va  lue="SAT">Saturday</option>
                                                    </select>
                                                </div>
                                                <div class="col-2 p-1 text-center">
                                                TO
                                            </div>
                                                <div class="col-5">
                                                    <select class="form-select" required id="endday" aria-label="Floating label select example">
                                                        <option selected value=''  disabled>Select Day</option>
                                                        <option value="SUN">Sunday</option>
                                                        <option value="MON">Monday</option>
                                                        <option value="TUE">Tuesday</option>
                                                        <option value="WED">Wednesday</option>
                                                        <option value="THUR">Thursday</option>
                                                        <option value="FRI">Friday</option>
                                                        <option value="SAT">Saturday</option>
                                                    </select>
                                                </div>
                                            
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                        <label class="col-md-3 col-form-label" for="name3">Available  Time</label>
                                        <div class="col-md-9 row">
                                        <div class="col-5">
                                                    <div class="input-group">
                                                        <input type="time" id="startime" required class="form-control" >
                                                    </div>
                                                </div>
                                            <div class="col-2 p-1 text-center">
                                                TO
                                            </div>
                                            <div class="col-5">
                                                <div class="input-group">
                                                    <input type="time"id="endtime" required class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row mb-4">
                                        
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </form>
                        </div>

                        <div class="tab-pane fade" id="third">
                            <form id="otherForm" method="post" action="#" class="form-horizontal"></form>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center">
                                            <h2 class="mt-0">
                                                <i class="mdi mdi-check-all"></i>
                                            </h2>
                                            <h3 class="mt-0">Thank you !</h3>   
                                            <span id="result"></span>

                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            
                        </div>

                        <ul id="nextprevbtn" class="list-inline wizard mb-0">
                            <li id="oldqw" class="previous list-inline-item disabled"><a href="#" id="previos" class="btn btn-info">Previous</a>
                            </li>
                            <li id="newqw" class="next list-inline-item float-end"><a href="#" id="next" class="btn btn-info">Next</a></li>
                        </ul>

                    </div> <!-- tab-content -->
                </div> <!-- end #rootwizard-->
            </div>
        </div> 
    </div>
</body>

<script src="../../Hospital/assets/js/vendor.min.js"></script>

<script src="../../Hospital/assets/js/app.min.js"></script>
<script src="../../Hospital/assets/js/pages/demo.form-wizard.js"></script>

<script>
    var step = 0;
    
   

    $('#next').html('');    
    $('#next').removeClass('btn btn-info'); 
    $('#previos').html(''); 
    $('#previos').removeClass('btn btn-info');  



    $('#previos').click(function(){
        step--;
        if(step<0){
            step = 0;
            $('#barsiner').width('33.3333%');
            $('#previos').html(''); 
            $('#previos').removeClass('btn btn-info');  
        }
        if(step == 0){
            $('#barsiner').width('33.3333%');
            $('#previos').html(''); 
            $('#previos').removeClass('btn btn-info');  
        }
        if(step == 1){
            $('#barsiner').width('66.6666%')
            $('#previos').html('Previous'); 
            $('#previos').addClass('btn btn-info');  ;
        } 
    });

    $('#next').click(function(){
        $('#previos').html('Previous'); 
        $('#previos').addClass('btn btn-info');  

        var username = $('#username').val();
        var password3 = $('#password').val();
        var confirm3 = $('#confirmps').val();
        var startday = $('#startday').val();
        var endday = $('#endday').val();
        var startime = $('#startime').val();
        var endtime = $('#endtime').val();
        if(step == 0 ){
            if(username != '' & password3!='' & confirm3!=''){
                step++;
                $('#barsiner').width('66.6666%');
            }
        }
            
        if(step == 1){
            if(startday!='' & endday!='' & startime!='' & endtime!='' & username != '' & password3!='' & confirm3!='' ){
                step++;
                $('#next').html("Finish"); 
                $('#barsiner').width('100%');
            }
            else if( username == '' || password3 =='' || confirm3==''){
               setTimeout(() => {
                $('#previos').click();
               }, 500);
                step = 0;
    
            }

        }
        if(step == 2 ){
            step++;
        }

    
        if(step >= 3){
            step = 2;
            $('#barsiner').width('100%');
            // alert();
            $.ajax({
                url : 'savedata.php',
                data: {'username':username,
                        'password3':password3,
                        'confirm3' :confirm3,
                        'startday' : startday,
                        'endday' : endday,
                        'startime': startime+':00',
                        'endtime': endtime+':00',
                    },
                method : 'post',
                dataType : 'text',
                success :function (response){
                    $("#result").html(response);
                    $('#nextprevbtn').html('');
                    setTimeout(() => { window.location.href = "../Dashboard"; }, 600);  
                }
            });

        }
       

    });

    $('#confirmps').keyup(function(){
        var p1 = $('#password').val();
        var p2 = $('#confirmps').val();
        if(p1!=p2){
            $('#confirmps').addClass('is-invalid');
            $('#error').html('Password not matched');
            $('#next').html('');    
            $('#next').removeClass('btn btn-info'); 
        }
        if(p1==p2){
            $('#confirmps').removeClass('is-invalid');
            $('#error').html('');
            $('#next').html('Next');    
            $('#next').addClass('btn btn-info'); 

        }
    });
    $('#password').keyup(function(){
        var p1 = $('#password').val();
        var p2 = $('#confirmps').val();
        if(p1!=p2){
            $('#confirmps').addClass('is-invalid');
            $('#error').html('Confirm Password did not matched');
            $('#next').html('');    
            $('#next').removeClass('btn btn-info'); 

        }
        if(p1==p2){
            $('#confirmps').removeClass('is-invalid');
            $('#error').html('');
            $('#next').html('Next');    
            $('#next').addClass('btn btn-info'); 

        }
    });


    
</script>

</html>