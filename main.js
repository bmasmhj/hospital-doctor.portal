function loaddata(){
    document.getElementById('newreq').click();
}
setInterval( notificon , 1000); 



function notificon(){
    $.ajax({
        url : 'controller/statecheck.php',
        data: {'check' : 'check'},
        method : 'post',
        dataType : 'text',
        success :function (response){
           var results = $.trim(response);
            if(results == 'true'){
                $("#anynew").addClass('noti-icon-badge');
            }
            else {
                $("#anynew").removeClass('noti-icon-badge');
                // $("#anynew").html(response);                
            }
        }
    });
}

function deleteedu(id){
   var ides = id;
    $.ajax({
        url : 'controller/udpate.php',
        data: {'deleteeduc' : ides},
        method : 'post',
        dataType : 'text',
        success :function (response){
            // document.getElementById('singleedu_'+id).style.display = 'none'; 
            educationdata();               
    
        }
    });
}
function deleteexp(id){
    var ides = id;
    $.ajax({
        url : 'controller/udpate.php',
        data: {'deleteexps' : ides},
        method : 'post',
        dataType : 'text',
        success :function (response){
            // document.getElementById('singleexp_'+id).style.display = 'none';                
            experiencedat();
        }
    });
}
function educationdata(){
    $.ajax({
        url : 'model/table.php',
        data: {'educationtraining' : 'any'},
        method : 'post',
        dataType : 'text',
        success :function (response){
            $('#educationandtrainingdata').html(response);  
        }
    });
}



function experiencedat(){
    $.ajax({
        url : 'model/table.php',
        data: {'experiencedata' : 'any'},
        method : 'post',
        dataType : 'text',
        success :function (response){
            $('#experincehtmldata').empty();
            $('#experincehtmldata').html(response);  
        }
    });
}

$('#iconnoti').click(function(){
    $.ajax({
        url : 'controller/usercontroller.php',
        data: {'notific' : 'notific'},
        method : 'post',
        dataType : 'text',
        success :function (response){
            $("#anynew").removeClass('noti-icon-badge'); 
            // $("#notficationdata").empty();
            $("#notficationdata").html(response);
        }
    });
});


$('#newreq').click(function(){
    $('#newreq').removeClass('btn-light');
    $('#newreq').addClass('btn-dark');
    $('#compltreq').removeClass('btn-dark');
    $('#compltreq').addClass('btn-light');
    $('#todayreq').removeClass('btn-dark');
    $('#todayreq').addClass('btn-light');
    $.ajax({
        url : 'model/table.php',
        data: {'newdata' : 'any'},
        method : 'post',
        dataType : 'text',
        success :function (response){
            $('#tabledata').empty();
            $('#tabledata').html(response);  
            atohere();
        }
    });


});
$('#compltreq').click(function(){
    $('#compltreq').removeClass('btn-light');
    $('#compltreq').addClass('btn-dark');
    $('#newreq').removeClass('btn-dark');
    $('#newreq').addClass('btn-light');
    $('#todayreq').removeClass('btn-dark');
    $('#todayreq').addClass('btn-light');
    $.ajax({
        url : 'model/table.php',
        data: {'alldata' : 'any'},
        method : 'post',
        dataType : 'text',
        success :function (response){
            $('#tabledata').empty();
            $('#tabledata').html(response);  
            atohere();
        }
    });
});


$('#todayreq').click(function(){
    $('#todayreq').removeClass('btn-light');
    $('#todayreq').addClass('btn-dark');
    $('#compltreq').removeClass('btn-dark');
    $('#compltreq').addClass('btn-light');
    $('#newreq').removeClass('btn-dark');
    $('#newreq').addClass('btn-light');
    $.ajax({
        url : 'model/table.php',
        data: {'today' : 'any'},
        method : 'post',
        dataType : 'text',
        success :function (response){
            $('#tabledata').empty();
            $('#tabledata').html(response);  
            atohere();
        }
    });
});


function declineapnt(id){
    const ide = id;
    $.ajax({
        url : 'controller/udpate.php',
        data: {'declineapnt' : ide},
        method : 'post',
        dataType : 'text',
        success :function (response){
            document.getElementById('newreq').click();
        }
    });
}
function deleteapnt (id){
    const ide = id;

    $.ajax({
        url : 'controller/udpate.php',
        data: {'deleteapnt' : ide},
        method : 'post',
        dataType : 'text',
        success :function (response){
            document.getElementById('compltreq').click();
             
        }
    });
}
function completedapnt(id){
    const ide = id;
    $.ajax({
        url : 'controller/udpate.php',
        data: {'completedapnt' : ide},
        method : 'post',
        dataType : 'text',
        success :function (response){
            document.getElementById('todayreq').click(); 

        }
    });
}
function acceptapnt(id){
    const ide = id;

    $.ajax({
        url : 'controller/udpate.php',
        data: {'acceptapnt' : ide},
        method : 'post',
        dataType : 'text',
        success :function (response){
            document.getElementById('newreq').click(); 
        }
    });
}


$('#doctorspeciality').change(function(){
    var spec_val = $('#doctorspeciality').val();
    $.ajax({
        url : 'controller/udpate.php',
        data: {'spec_doc' : spec_val},
        method : 'post',
        dataType : 'text',
        success :function (response){
                    
        }
    });
  });
  
  $('#doctorstarday').change(function(){
    var spec_val = $('#doctorstarday').val();
    $.ajax({
        url : 'controller/udpate.php',
        data: {'spec_s_day' : spec_val},
        method : 'post',
        dataType : 'text',
        success :function (response){
                    
        }
    });
  });

  $('#doctorendday').change(function(){
    var spec_val = $('#doctorendday').val();
    $.ajax({
        url : 'controller/udpate.php',
        data: {'spec_e_day' : spec_val},
        method : 'post',
        dataType : 'text',
        success :function (response){
                    
        }
    });
  });
 
  $('#startimedoc').change(function(){
    var spec_val = $('#startimedoc').val();
    $.ajax({
        url : 'controller/udpate.php',
        data: {'spec_s_time' : spec_val},
        method : 'post',
        dataType : 'text',
        success :function (response){
                    
        }
    });
  });
 
  $('#endtimedoc').change(function(){
    var spec_val = $('#endtimedoc').val();
    $.ajax({
        url : 'controller/udpate.php',
        data: {'spec_e_time' : spec_val},
        method : 'post',
        dataType : 'text',
        success :function (response){
            
        }
    });
  });
 
  $('#changethispass').click(function(){
   var oldpassword = $('#oldpassword').val();
   var newpassword = $('#newpassword').val();
   var confpassword = $('#confpassword').val();
   if(oldpassword!='' & newpassword!='' & confpassword!='' ){
        if(newpassword == confpassword){
            $.ajax({
                url : 'controller/udpate.php',
                data: {'oldpassword' : oldpassword , 'newpassword' : newpassword ,'confpassword' : confpassword  },
                method : 'post',
                dataType : 'text',
                success :function (response){
                // alert(response);
                    var result = $.trim(response);
                    if(result == 'oldwrong'){
                        alert("Wrong Old Password");
                    }
                    else if (result == 'error'){
                        alert("Database Error");
                    }
                    else if (result == 'success'){
                        alert("Changed Successfully");
                    }
                    else {
                        alert("Contact Admin");
                    }
                }
            });
        }
    }else {
        if(oldpassword == ''){
            $('#oldpassword').addClass("is-invalid");
        }
        if(newpassword == ''){
            $('#newpassword').addClass("is-invalid");
        }
        if(confpassword == ''){
            $('#confpassword').addClass("is-invalid");
        }
    } 
  });


  $('#newpassword').keyup(function(){
    var newpassword = $('#newpassword').val();
    var confpassword = $('#confpassword').val();
    
    if(newpassword == confpassword){
        $('#newpassword').removeClass("is-invalid")
        $('#confpassword').removeClass("is-invalid")
        $('#resultforps').html('');
    }
    else {
        $('#confpassword').addClass("is-invalid");
        $('#resultforps').html('*Password not matched*');
    }
  });

  $('#oldpassword').keyup(function(){ 
    $('#oldpassword').removeClass("is-invalid")
  });


  $('#confpassword').keyup(function(){
    var newpassword = $('#newpassword').val();
    var confpassword = $('#confpassword').val();
    if(newpassword == confpassword){
        $('#newpassword').removeClass("is-invalid")
        $('#confpassword').removeClass("is-invalid");
        $('#resultforps').html('');
    }
    else {
        $('#confpassword').addClass("is-invalid");
        $('#resultforps').html('*Password not matched*');


    }
  });
  
  function deletenotification(id) {
   
    $.ajax({
        url : 'controller/udpate.php',
        data: {'deletenoti' : id},
        method : 'post',
        dataType : 'text',
        success :function (response){
            document.getElementById('notify_'+id).style.display = 'none';                
        }
    });


    
}
function clearall(){
    if(confirm("Are you sure want to change ?") == true ){
        $.ajax({
            url : 'controller/udpate.php',
            data: {'clearallnotif' : 'clearallnotif'},
            method : 'post',
            dataType : 'text',
            success :function (response){
                document.getElementById('notificationcontain').innerHTML = '';   
            }
        });

   }

}

$('#addexpericemore').click(function(){
    const value = $('#newexperiencevalaue').val();
    if(value!=''){
        $('#newexperiencevalaue').removeClass('is-invalid');
        $.ajax({
            url : 'controller/udpate.php',
            data: {'addnewexp' : value},
            method : 'post',
            dataType : 'text',
            success :function (response){
                $('#newexperiencevalaue').val('');
                experiencedat();
                
            }
        });
       


    }else{
        $('#newexperiencevalaue').addClass('is-invalid');
    }
 });
 $('#newexperiencevalaue').keyup(function(){
    $('#newexperiencevalaue').removeClass('is-invalid');
 });;

 $('#addeducationmore').click(function(){
    const value = $('#addneweducation').val();
    if(value!=''){
        $('#addneweducation').removeClass('is-invalid');
        $.ajax({
            url : 'controller/udpate.php',
            data: {'addnewtrain' : value},
            method : 'post',
            dataType : 'text',
            success :function (response){
                $('#addneweducation').val('');
                educationdata();
            }
        });
       


    }else{
        $('#addneweducation').addClass('is-invalid');
    }
 });
 $('#addneweducation').keyup(function(){
    $('#addneweducation').removeClass('is-invalid');
 });

{/* <span> <strong>Bimash</strong> wants to book an Appointment </span> */}

$('#imageUpload').change(function(){
    var image = document.getElementById('imageUpload').files;     
    var url = URL.createObjectURL(image[0]);
    $('#docbtnpp').removeClass('d-none');
    document.getElementById('imagePreview').style.backgroundImage = "url("+url+")";
});

function atohere(){
    console.log('sa');
    setTimeout(() => {
      $('#descending').click();
        
    }, 100);
  }