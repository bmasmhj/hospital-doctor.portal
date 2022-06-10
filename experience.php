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
                            <h5>Experience</h5>    
                            <table class="table table-striped table-centered mb-0">
                                <tbody id="experincehtmldata">
                                        
                                </tbody>
                            </table>
                            <div class="mt-5 ">
                                <label class="form-label">Add Experiences</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="newexperiencevalaue" placeholder="Experiences">
                                    <button class="btn btn-dark" id="addexpericemore" type="button">Add <i class="mdi mdi-arrow-up-bold"></i>    </button>
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
     experiencedat();

    
    //    document.getElementById('educationandtrainingdata').innerHTML = ' <tr> <td class="table-user">MBBS, Manipal College of Medical Sciences, Kathmandu University (1992-1994) </td>  <td class="table-action"><a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a></td></tr>'
    </script>