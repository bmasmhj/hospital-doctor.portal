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
                       <h4>Notification</h4>
                       <div class="container" id="notificationcontain">
                        <a href="javascript:clearall();" class="row float-end"> Clear all </a>
                            <?php 
                                require 'controller/timeago.php';

                                foreach($fullnotifiydata as $key => $notificationvalues){
                                    $time = $notificationvalues['created'];
                                    $timeago = time_elapsed_string($time);  
                                ?>
                                <a id="notify_<?php echo $notificationvalues['id']?>" href="javascript:void(0);" class="dropdown-item notify-item">
                                <div  class="mb-3 d-flex justify-content-between align-items-center " style="flex-direction:row" >
                                    <div class="d-flex flex-direction-row align-items-center">
                                        <div class="rounded-circle mx-3 d-flex  align-items-center justify-content-center bg-<?php echo $notificationvalues['color']?>" style="width:50px; height:50px">
                                            <i class="mdi <?php echo $notificationvalues['icon']?> text-white" style="font-size : 22px"></i>
                                        </div>
                                        <div>
                                            <span ><?php echo $notificationvalues['message'] ?></span>  <br>
                                            <span class="justify-content-end text-muted"><?php echo $timeago ?> </span>
                                        </div>
                                        
                                    </div>  
                                        <i onclick="deletenotification(<?php echo $notificationvalues['id']?>)" class="float-end btn text-danger mdi mdi-bell-remove-outline" style="font-size : 20px;"> </i>
                                </div>
                                </a>
                            <?php   } ?> 

                            </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </body>  
 <?php require 'footer.php'?>
 <script>

    </script>