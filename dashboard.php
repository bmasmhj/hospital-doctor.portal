<?php require 'header.php' ?>
    <body onload="loaddata()">
      <?php require 'model/topbar.php' ?>
        <div class="p-2"></div>
        <div class="container-fluid mt-5">
            <div class="row m-auto  ">
               <?php require 'model/sidemenu.php'?>
                <div class="col-md-8">
                   <?php require 'model/appcounts.php' ?>
                    <h4 class="mt-3">Patient Appoinment</h5>
                    <div class="custom-card mt-3">
                        <div class="card-body">
                            <div class="mb-4">
                                <button type="button" id="newreq" class="btn mx-2 btn-dark btn-rounded">New Request</button>
                                <button type="button" id="todayreq" class="btn mx-2 btn-light btn-rounded">Today</button>
                                <button type="button" id="compltreq" class="btn mx-2 btn-light btn-rounded">Completed</button>
                            </div>                        
                          <div id="tabledata"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>  
 <?php require 'footer.php'?>