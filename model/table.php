<?php 

require '../controller/connection.php';
session_start();
$fetchid = $_SESSION['fetchid'];

if(isset($_POST['newdata'])){
    echo '  <table id="basic-datatable" class="table dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th id="descending" >Appointment Date</th>
            <th>Name</th>
            <th>Address</th>
            <th>Age</th>
            <th>Reason</th>
            <th>Sex</th>
            <th>Action</th>
        </tr>
    </thead>';
    
    $newdatasql = "SELECT * FROM appointment WHERE (doccode = '$fetchid' AND status = 'pending') ";
    $newdataeresult = $con->query($newdatasql);
    $newdataedata = [];
    if ($newdataeresult->num_rows > 0) {
        while ($newdataerow = $newdataeresult->fetch_assoc()) {
            array_push($newdataedata, $newdataerow);
        }
    }
    echo '
    <tbody>';

    foreach($newdataedata as $key => $valuenew ){ 
    $reason = wordwrap($valuenew["reason"], 40, "<br />\n");



    echo '
    <tr>
        <td>'.$valuenew["appointdate"].'</td>
        <td>'.$valuenew["fullname"].'</td>
        <td>'.$valuenew["address"].'</td>
        <td>'.$valuenew["age"].'</td>
        <td>'.$reason.'</td>
        <td>'.$valuenew["gender"].'</td>
        <td> 
        <button onclick="declineapnt('.$valuenew["id"].')" class="btn btn-rounded btn-danger">Decline</button>
        <button onclick="acceptapnt('.$valuenew["id"].')" class="btn btn-rounded btn-success">Accept</button>
        </td>
    </tr>';
    }
    echo'
    </tbody>
    </table>';

}
else if(isset($_POST['today'])){
    echo '  <table id="basic-datatable" class="table dt-responsive nowrap w-100">
<thead>
    <tr>
        <th id="descending" >Appointment Date</th>
        <th>Name</th>
        <th>Address</th>
        <th>Age</th>
        <th>Reason</th>
        <th>Sex</th>
        <th>Action</th>
    </tr>
</thead>';

    $alldatasql = "SELECT * FROM appointment WHERE ( doccode = '$fetchid') ";
    $alldataeresult = $con->query($alldatasql);
   $alldataedata = [];
   if ($alldataeresult->num_rows > 0) {
     while ($alldataerow = $alldataeresult->fetch_assoc()) {
         array_push($alldataedata, $alldataerow);
        }
    }
    echo '<tbody>';
    foreach($alldataedata as $key => $valueall ){
        $reason = wordwrap($valueall["reason"], 40, "<br />\n");
        $today = date("Y-m-d");
        $date = $valueall["appointdate"];
        $idasddf = $valueall["id"];
        if($today > $date ){
            if($valueall['status'] == 'pending'){
                $updtestat = "UPDATE `appointment` SET status = 'expired' WHERE id= '$idasddf'";
                if ($con->query($updtestat)) { $done = 'ok'; }
            }

        }

        if($valueall['status']=='accepted'){
            if($today === $date){
            echo '
                <tr>
                    <td>'.$valueall["appointdate"].'</td>
                    <td>'.$valueall["fullname"].'</td>
                    <td>'.$valueall["address"].'</td>
                    <td>'.$valueall["age"].'</td>
                <td>'.$reason.'</td>

                    <td>'.$valueall["gender"].'</td>
                    
                    <td> 
                    <button onclick="completedapnt('.$valueall["id"].')"  class="btn btn-rounded btn-success">Completed</button>
                    </td>
                </tr>'; 
                }   
            }
        }

    echo'
    </tbody>
    </table>';

}
else if(isset($_POST['alldata'])){
    echo '  <table id="basic-datatable" class="table dt-responsive nowrap w-100">
<thead>
    <tr>
        <th id="descending" >Appointment Date</th>
        <th>Name</th>
        <th>Address</th>
        <th>Age</th>
        <th>Reason</th>
        <th>Sex</th>
        <th>Action</th>
    </tr>
</thead>';

    $alldatasql = "SELECT * FROM appointment WHERE ( doccode = '$fetchid' AND status != 'pending' AND status !='accepted') ";
    $alldataeresult = $con->query($alldatasql);
   $alldataedata = [];
   if ($alldataeresult->num_rows > 0) {
     while ($alldataerow = $alldataeresult->fetch_assoc()) {
         array_push($alldataedata, $alldataerow);
        }
    }
    echo '<tbody>'; 
    foreach($alldataedata as $key => $valueall ){
        $reason = wordwrap($valueall["reason"], 40, "<br />\n");
        if($valueall["status"]!='deleted'){
    echo '
    <tr>
        <td>'.$valueall["appointdate"].'('.$valueall["status"].')</td>
        <td>'.$valueall["fullname"].'</td>
        <td>'.$valueall["address"].'</td>
        <td>'.$valueall["age"].'</td>
        <td>'.$reason.'</td>
        <td>'.$valueall["gender"].'</td>
        <td>    <button onclick="deleteapnt('.$valueall["id"].')" class="btn btn-rounded btn-danger">Delete</button>
        </td>
    </tr>'; }   } 

    echo'
    </tbody>
    </table>';

}
else if(isset($_POST['educationtraining'])){
    // $docid = $docviewrow['id'];
    $educationsql = "SELECT  * FROM education WHERE docid = '$fetchid'  ";
    $educationresult = $con->query($educationsql);
    $educationdata = [];
    if ($educationresult->num_rows > 0) {
      while ($educationrow = $educationresult->fetch_assoc()) {
        $edu = $educationrow['description'];
        $eduid =$educationrow['id'];
             echo " <tr id='singleedu_".$eduid."'> <td class='table-user'> ".$edu." </td>  
                    <td class='table-action'>
                    <a href='javascript: deleteedu(".$eduid.");' class='action-icon'> 
                    <i class='mdi mdi-delete'></i></a>
                    </td></tr>";
      }
  }
}
else if(isset($_POST['experiencedata'])){
    // $docid = $docviewrow['id'];
    $experencesql = "SELECT  * FROM workexperiene WHERE docid = '$fetchid'   ";
    $experenceresult = $con->query($experencesql);
    $experencedata = [];
    if ($experenceresult->num_rows > 0) {
      while ($experencerow = $experenceresult->fetch_assoc()) {
        $exp = $experencerow['description'];
        $expid =$experencerow['id'];
             echo " <tr id='singleexp_".$expid."'> <td class='table-user'> ".$exp." </td>  
                    <td class='table-action'>
                    <a href='javascript: deleteexp(".$expid.");' class='action-icon'> 
                    <i class='mdi mdi-delete'></i></a>
                    </td></tr>";
      }
  }
}


?>


 
        <!-- third party js -->
        <script src="../Hospital/assets/js/vendor/jquery.dataTables.min.js"></script>
        <script src="../Hospital/assets/js/vendor/dataTables.bootstrap5.js"></script>
        <script src="../Hospital/assets/js/vendor/dataTables.responsive.min.js"></script>
        <script src="../Hospital/assets/js/vendor/responsive.bootstrap5.min.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="../Hospital/assets/js/pages/demo.datatable-init.js"></script>
        <!-- end demo js-->