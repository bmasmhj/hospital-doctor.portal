<?php 
    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);  
?>
<div class="col-md-3 mb-3 " >
    <div style="position:fixed; width:23%">
        <div class="custom-card" >
            <div class="card-body text-center">
                <div class="avatar-upload mb-3">
                    <form action="controller/udpate.php" method="POST" enctype="multipart/form-data">
                    <div class="avatar-edit">
                        <input type='file' id="imageUpload" name="photo" />
                        <input type='hidden' name="img" value="<?php echo $docimge;?>" />
                        <label for="imageUpload" class=" "><i class="mdi mdi-pencil editpen" ></i></label>
                    </div>
                    <div class="avatar-preview">
                        <div id="imagePreview" style="background-image: url(../Hospital/assets/images/uploads/doctors/<?php echo $docimge;?>);">
                        </div>
                    </div>
                    <input type="submit"  name="docbtnpp" id="docbtnpp" class="btn btn-light d-none btn-rounded mt-2" value="Update">
                </form>
                </div>
                <!-- <img src=".default.jpg" class="w-custom" alt=""> -->
                <h4 class="mt-2"><?php echo $docname?></h4>
                <h5 class="text-muted"><?php echo $docspeciality ?></h5>
            </div>
            <a class="menu" href="Dashboard">
            <div class="card-body cursor-pointer border-top p-2">
                <h4 <?php  if( 'Dashboard' == $url){ echo" class='text-primary' "; }?>><i class="mdi mdi-home-outline"></i> Dashboard</h4>
            </div>
            </a>
            <a class="menu" href="Notification">

            <div class="card-body cursor-pointer border-top p-2">
                <h4 <?php  if( 'Notification' == $url){ echo" class='text-primary' "; }?> ><i class="mdi mdi-bell-ring-outline"></i> Notification</h4>
            </div>
            </a>
            <a class="menu" href="Profile">
            <div class="card-body cursor-pointer border-top p-2">
                <h4 <?php  if( 'Profile' == $url){ echo" class='text-primary' "; }?>><i class="mdi mdi-account-cog-outline"></i> Profile Settings</h4>
            </div>
            </a>
            <!-- <a class="menu" href="Dashboard">
            <div class="card-body cursor-pointer border-top p-2">
                <h4 <?php  if( 'index.php' == $url){ echo" class='text-primary' "; }?>><i class="mdi mdi-bell-ring-outline"></i> Schedule</h4>
            </div>
            </a> -->
            <a class="menu" href="Education">
            <div class="card-body cursor-pointer border-top p-2">
                <h4 <?php  if( 'Education' == $url){ echo" class='text-primary' "; }?>><i class="mdi mdi-book-education-outline"></i> Education & Trainings</h4>
            </div>
            </a>
            <a class="menu" href="Experience">
            <div class="card-body cursor-pointer border-top p-2">
                <h4 <?php  if( 'Experience' == $url){ echo" class='text-primary' "; }?>><i class="mdi mdi-doctor"></i> Work Experience</h4>
            </div>
            </a>
        </div>
    </div>
</div>

<script>


</script>