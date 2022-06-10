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
                            <h5>Education & Training</h5>    
                            <table class="table table-striped table-centered mb-0">
                                <tbody id="educationandtrainingdata">
                                        
                                </tbody>
                            </table>
                            <div class="mt-5 ">
                                <label class="form-label">Add Education & Trainings</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Education & Training" id="addneweducation">
                                    <button class="btn btn-dark" id="addeducationmore" type="button">Add <i class="mdi mdi-arrow-up-bold"></i> </button>
                                </div>
                            </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </body>  
 <?php require 'footer.php'?>

 <script>
     educationdata();

    
    //    document.getElementById('educationandtrainingdata').innerHTML = ' ';
    </script>