


function search() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("seachinput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
}



//ajax for applicants
$(document).ready(function(){  

    //THIS IS TO SAVE EVALUATION 
    $(document).on('click', '.save_evaluation', function(){  

         var get_app_id = $('#get_app_id').val();
         var candidate = $('#candidate').val();
         var interviewer = $('#interviewer').val();
         var dateinterviewed = $('#dateinterviewed').val();
         var position = $('#position').val();

         var personality_cat = $('#personality_cat').val();
         var personality_eval = $('#personality_eval').val();
         var personality_remark = $('#personality_remark').val();

         var cs_cat = $('#cs_cat').val();
         var cs_eval = $('#cs_evals').val();
         var cs_remarks = $('#cs_remarks').val();

         var pa_cat = $('#pa_cat').val();
         var pa_eval = $('#pa_eval').val();
         var pa_remarks = $('#pa_remarks').val();

         var ao_cat = $('#ao_cat').val();
         var ao_eval = $('#ao_eval').val();
         var ao_remarks = $('#ao_remarks').val();

         var lm_cat = $('#lm_cat').val();
         var lm_eval = $('#lm_eval').val();
         var lm_remarks = $('#lm_remarks').val();

         var rm_cat = $('#rm_cat').val();
         var rm_eval = $('#rm_eval').val();
         var rm_remarks = $('#rm_remarks').val();

         var jf_cat = $('#jf_cat').val();
         var jf_eval = $('#jf_eval').val();
         var jf_remarks = $('#jf_remarks').val();


         var strengths = $('#strengths').val();
         var weaknesses = $('#weaknesses').val();
         var hiring_decision = $('#hiring_decision').val();
         var is_recommended = $('#is_recommended').val();

         if(get_app_id != '')  
         {  
              $.ajax({  
                   url:"/ajax/save/evaluation",  
                   method:"GET",  
                   data:{
                        get_app_id:get_app_id,
                        candidate:candidate,
                        interviewer:interviewer,
                        dateinterviewed:dateinterviewed,
                        position:position,

                        strengths:strengths,
                        weaknesses:weaknesses,
                        hiring_decision:hiring_decision,
                        is_recommended:is_recommended,

                        personality_cat:personality_cat,
                        personality_eval:personality_eval,
                        personality_remark:personality_remark,

                        cs_cat:cs_cat,
                        cs_eval:cs_eval,
                        cs_remarks:cs_remarks,

                        pa_cat:pa_cat,
                        pa_eval:pa_eval,
                        pa_remarks:pa_remarks,

                        ao_cat:ao_cat,
                        ao_eval:ao_eval,
                        ao_remarks:ao_remarks,

                        lm_cat:lm_cat,
                        lm_eval:lm_eval,
                        lm_remarks:lm_remarks,

                        rm_cat:rm_cat,
                        rm_eval:rm_eval,
                        rm_remarks:rm_remarks,

                        jf_cat:jf_cat,
                        jf_eval:jf_eval,
                        jf_remarks:jf_remarks
                   },  
                   success:function(data){  

                       alert("Success");
                   }  
              });  
         }            
    });


    //view specific job
    /*$(document).on('click', '.view_job', function(){  
         var id = $(this).attr("id");  
         if(id != '')  
         {  
              $.ajax({  
                   url:"/ajax/getjob",  
                   method:"GET",  
                   data:{id:id},  
                   success:function(data){  
                        $('#job_details_here').html(data);  
                        $('#viewapprovedmrf').modal('show');  
                   }  
              });  
         }            
    });*/



    $(document).on('click', '.get_data', function(){  
            var id = $(this).attr("id");  
            if(id != '')  
            {  
                 $.ajax({  
                      url:"/ajax/getapplicant",  
                      method:"GET",  
                      data:{id:id},  
                      success:function(data){  
                           $('#applicant_details').html(data);  
                           $(".secondinfo").hide();
                           $('#applicantdetails').modal('show');  
                      }  
                 });  
            }            
    });



    $(document).on('click', '.evaluate_data', function(){  
         var id = $(this).attr("id");  
         if(id != '')  
         {  
              $.ajax({  
                   url:"/ajax/criteria/evaluation",  
                   method:"GET",  
                   data:{id:id},  
                   success:function(data){  
                        $('#applicant_details').html(data);  
                        $(".firstinfo").hide();
                        $(".secondinfo").hide();
                        $(".examresults").hide(); 
                        $(".applicantfiles").hide();
                        $('#applicantdetailsforeval').modal('show');  
                   }  
              });  
         }
    
    });


    $(document).on('click', '.manage_data', function(){  
         var id = $(this).attr("id");  
         if(id != '')  
         {  
              $.ajax({  
                   url:"/ajax/manageapplicant",  
                   method:"GET",  
                   data:{id:id},  
                   success:function(data){  
                        $('#applicant_manage_details').html(data);  
                        $('#manageapplication').modal('show');  
                        $(".recentactivities").hide();
                   }  
              });  
         }
    
    });


    //manage for processing
    $(document).on('click', '.process_data', function(){  
         var id = $(this).attr("id");  
         if(id != '')  
         {  
              $.ajax({  
                   url:"/ajax/manageapplicantforprocess",  
                   method:"GET",  
                   data:{id:id},  
                   success:function(data){  
                        $('#applicant_manage_details').html(data); 
                        $(".examresults").hide(); 
                        $(".applicantfiles").hide();
                        $(".evaluationwrapper").hide();
                        $('#manageapplication').modal('show');  
                        
                   }  
              });  
         }
    
    });



    //transfer to e201
    $(document).on('click', '.transfer_e201', function(){  
         var id = $(this).attr("id");  
         if(id != '')  
         {  
              $.ajax({  
                   url:"/ajax/fore201",  
                   method:"GET",  
                   data:{id:id},  
                   success:function(data){  
                        $('#for_e201_data').html(data); 
                        $('#confirmationbeforetransferring').modal('show');  
                        
                   }  
              });  
         }
    
    });
 
 });


//for tab view
$(document).ready(function(){  
    $(".secondinfo").hide();
    $(".examresults").hide();
    $(".applicantfiles").hide();
    $(".fileinfo").hide();
    $(".managethiswrapper").hide();
    $(".evaluationwrapper").hide();
});



//this for recent activities tab
function History(){
    $(".recentactivities").animate( { "opacity": "show", top:"100"} , 800 );
    $(".managemain").hide();
}

function Manage(){
    $(".managemain").animate( { "opacity": "show", top:"100"} , 800 );
    $(".recentactivities").hide();
}



function tabother(){
    $(".secondinfo").animate( { "opacity": "show", top:"100"} , 800 );
    $(".firstinfo").hide();
    $(".fileinfo").hide();
    
    var element = document.getElementById("btnother");
    element.classList.add("info-tab-btn-active");

    var element1 = document.getElementById("btntabprofile");
    element1.classList.remove("info-tab-btn-active");
    
    var element2 = document.getElementById("btntabfile");
    element2.classList.remove("info-tab-btn-active");
}

function tabprofile(){
    $(".firstinfo").animate( { "opacity": "show", top:"100"} , 800 );
    $(".secondinfo").hide();
    $(".fileinfo").hide();
    $(".applicantfiles").hide();
    $(".evaluationwrapper").hide();
    
    var element = document.getElementById("btntabprofile");
    element.classList.add("info-tab-btn-active");

    var element1 = document.getElementById("btnother");
    element1.classList.remove("info-tab-btn-active");

    var element2 = document.getElementById("btntabfile");
    element2.classList.remove("info-tab-btn-active");
}

function tabfile(){
    $(".fileinfo").animate( { "opacity": "show", top:"100"} , 800 );
    $(".secondinfo").hide();
    $(".firstinfo").hide();
    $(".applicantfiles").hide();
    $(".evaluationwrapper").hide();

    var element = document.getElementById("btntabfile");
    element.classList.add("info-tab-btn-active");

    var element1 = document.getElementById("btnother");
    element1.classList.remove("info-tab-btn-active");

    var element2 = document.getElementById("btntabprofile");
    element2.classList.remove("info-tab-btn-active");
}








//FOR PROCESSING
function processmanage(){
    $(".managethiswrapper").animate( { "opacity": "show", top:"100"} , 800 );
    $(".examresults").hide();
    $(".applicantfiles").hide();
    $(".evaluationwrapper").hide();

    var element = document.getElementById("btntprocessmanage");
    element.classList.add("info-tab-btn-active");

    var element1 = document.getElementById("btntprocessexam");
    element1.classList.remove("info-tab-btn-active");

    var element2 = document.getElementById("btntprocessrequirements");
    element2.classList.remove("info-tab-btn-active");

    var element = document.getElementById("btntevaluation");
    element.classList.remove("info-tab-btn-active");
}

function Examresult(){
    $(".examresults").animate( { "opacity": "show", top:"100"} , 800 );
    $(".managethiswrapper").hide();
    $(".applicantfiles").hide();
     $(".evaluationwrapper").hide();

    var element = document.getElementById("btntprocessexam");
    element.classList.add("info-tab-btn-active");

    var element1 = document.getElementById("btntprocessmanage");
    element1.classList.remove("info-tab-btn-active");

    var element2 = document.getElementById("btntprocessrequirements");
    element2.classList.remove("info-tab-btn-active");

    var element = document.getElementById("btntevaluation");
    element.classList.remove("info-tab-btn-active");
}

function requirements(){
    $(".applicantfiles").animate( { "opacity": "show", top:"100"} , 800 );
    $(".examresults").hide();
    $(".managethiswrapper").hide();
    $(".evaluationwrapper").hide();
    $(".firstinfo").hide();
    $(".fileinfo").hide();


    var element = document.getElementById("btntprocessrequirements");
    element.classList.add("info-tab-btn-active");

    var element1 = document.getElementById("btntprocessexam");
    element1.classList.remove("info-tab-btn-active");

    var element2 = document.getElementById("btntprocessmanage");
    element2.classList.remove("info-tab-btn-active");

    var element = document.getElementById("btntevaluation");
    element.classList.remove("info-tab-btn-active");
}

function evaluation(){
    $(".evaluationwrapper").animate( { "opacity": "show", top:"100"} , 800 );
    $(".examresults").hide();
    $(".managethiswrapper").hide();
    $(".applicantfiles").hide();

    var element = document.getElementById("btntevaluation");
    element.classList.add("info-tab-btn-active");

    var element = document.getElementById("btntprocessrequirements");
    element.classList.remove("info-tab-btn-active");

    var element1 = document.getElementById("btntprocessexam");
    element1.classList.remove("info-tab-btn-active");

    var element2 = document.getElementById("btntprocessmanage");
    element2.classList.remove("info-tab-btn-active");
}


