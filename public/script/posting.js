

//view specific job
$(document).on('click', '.view_job', function(){  
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
});


//view specific job
$(document).on('click', '.create_job', function(){  
    var id = $(this).attr("id");  
    if(id != '')  
    {  
         $.ajax({  
              url:"/ajax/createjob",  
              method:"GET",  
              data:{id:id},  
              success:function(data){  
                   $('#job_form_create').html(data);  
                   $('#createjob').modal('show');  
              }  
         });  
    }            
});