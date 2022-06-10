<?php require 'header.php' ?>
    <body>
      <?php require 'model/topbar.php' ?>
        <div class="p-2"></div>
        
        <div class="container-fluid mt-5">
            <div class="row m-auto  ">
               <?php require 'model/sidemenu.php'?>
                <div class="col-md-8">
                   <div class="custom-card">
                       <div class="card-body">
                           <h5>Basic information</h5>
                           <form action="controller/udpate.php" method="post">
                                <div class="row">   
                                    <div class="col-md-6 mb-3">
                                        <label for="docname" class="form-label">Name</label>
                                        <input type="text" id="docname" name="docname" value="<?php echo $docname?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">username</label>
                                        <input type="text" id="simpleinput" disabled value="<?php echo $docusername?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="docemail" class="form-label">Email</label>
                                        <input type="text" id="docemail" name="docemail" value="<?php echo $docemail?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <label for="simpleinput" class="form-label mb-2">Gender</label>
                                    <br>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" <?php if($gender=='male') { echo "checked"; } ?> id="gender" name="gender" value='male' class="form-check-input" required>
                                            <label class="form-check-label" for="customRadio3">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" <?php if($gender=='female') { echo "checked"; } ?> id="gender2" name="gender" value='female' class="form-check-input" required>
                                            <label class="form-check-label" for="customRadio4">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" <?php if($gender=='other') { echo "checked"; } ?> id="gender3" name="gender" value='others' class="form-check-input" required>
                                            <label class="form-check-label" for="customRadio4">Others</label>
                                        </div>  
                                    </div>                                    
                                </div>
                                <input type="submit" name="updatedoctorbasicdata" class="btn btn-rounded btn-success" value="Update">
                           </form>
                       </div>
                   </div>
                   <div class="custom-card mt-3">
                       <div class="card-body">
                           <h5>Information  </h5>
                           <form action="">
                              <div class="row">
                              <div class="col-md-12 mb-3">
                                    <div class="form-floating">
                                        <select class="form-select" id="doctorspeciality" aria-label="Floating label select example">
                                            <?php 
                                                foreach($specialitydata as $key => $specialitydatavalue){
                                                    if($specialityid === $specialitydatavalue['id'] ){
                                                        echo '<option value="'.$specialitydatavalue['id'].'" selected>'.$specialitydatavalue['name'].'</option>';
                                                        
                                                    }else {
                                                        echo '<option value="'.$specialitydatavalue['id'].'">'.$specialitydatavalue['name'].'</option>';

                                                    }
                                                }
                                            ?>
                                        </select>
                                        <label for="floatingSelectGrid">Speciality</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3 row">
                                    <label for="">Available  Days</label>
                                  <div class="col-5">   
                                        <select class="form-select" id="doctorstarday" aria-label="Floating label select example">
                                        <?php 
                                            foreach($daysdata as $key => $daysdatavalue){
                                                if($daystart === $daysdatavalue['value'] ){
                                                    echo '<option value="'.$daysdatavalue['value'].'" selected>'.$daysdatavalue['name'].'</option>';
                                                    
                                                }else {
                                                    echo '<option value="'.$daysdatavalue['value'].'">'.$daysdatavalue['name'].'</option>';

                                                }
                                            }   
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-2 p-1 text-center">
                                       TO
                                   </div>
                                    <div class="col-5">
                                        <select class="form-select" id="doctorendday" aria-label="Floating label select example">
                                        <?php 
                                            foreach($daysdata as $key => $enddaysdatavalue){
                                                if($dayend === $enddaysdatavalue['value'] ){
                                                    echo '<option value="'.$enddaysdatavalue['value'].'" selected>'.$enddaysdatavalue['name'].'</option>';
            
                                                }else {
                                                    echo '<option value="'.$enddaysdatavalue['value'].'">'.$enddaysdatavalue['name'].'</option>';

                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                
                                </div>
                                <div class="col-md-6 mb-3 row">
                                    <label for="">Available  Time</label>
                                    <div class="col-5">
                                            <div class="input-group">
                                                <input type="time" id="startimedoc" class="form-control"  value="<?php echo $timestart?>">
                                            </div>
                                        </div>
                                    <div class="col-2 p-1 text-center">
                                        TO
                                    </div>
                                    <div class="col-5">
                                        <div class="input-group">
                                            <input type="time" id="endtimedoc" class="form-control" value="<?php echo $timeend?>" >
                                        </div>
                                    </div>
                                </div>
                              </div>
                           </form>
                       </div>
                   </div>
                   <div class="custom-card mt-3 mb-3">
                       <div class="card-body">
                           <h5>Change Password</h5>
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="oldpassword" class="form-label mt-3">Old  Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="oldpassword" class="form-control" placeholder="Enter your Old password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    <label for="newpassword" class="form-label mt-3">New  Password</label>
                             
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="newpassword" class="form-control" placeholder="Enter your New password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    <label for="confpassword" class="form-label mt-3">Confirm  Password<i class="text-danger" id="resultforps"></i></label>
                          
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="confpassword" class="form-control" placeholder="Enter your Confirm password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>

                                    <buton type="button" id="changethispass" class="btn mt-3 btn-light btn-rounded"> Change Password </button>
                                </div>
                                <div class="col-5 text-center offset-1 d-md-block d-none">
                                    <p class="text-danger">
                                        * If you have forgotten your old password please contact admin to reset *
                                    </p>
                                    <img src="037-lock.png" class='w-50' alt="">
                                </div>
                            </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </body>  
 <?php require 'footer.php'?>

 