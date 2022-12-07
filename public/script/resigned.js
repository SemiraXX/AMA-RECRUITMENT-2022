
$(document).ready(function(){  

    $('.viewmrf').click(function(){
         $('#NONACADfilemrf').modal('show');  
         $('#filemrf').modal('hide');
    });

});

$(document).on('click', '.get_resigned', function(){  
    var id = $(this).attr("id");  
    var branch  = $(this).attr("value");  
    if(id != '')  
    {  
         $.ajax({  
              url:"/ajax/getresigned",  
              method:"GET",  
              data:{id:id,branch:branch},  
              success:function(data){  
                   $('#resigned_details').html(data);  
                   $('#filemrf').modal('show');
              }  
         });  
    }            
});


$(document).on('click', '.create_mrf', function(){  
    var id = $(this).attr("id");  
    var branch  = $(this).attr("value");  
    if(id != '')  
    {  
         $.ajax({  
              url:"/ajax/filed/NonAcad",  
              method:"GET",  
              data:{id:id,branch:branch},  
              success:function(data){  
                   $('#file-non-acad').html(data);  
                   $('#NONACADfilemrf').modal('show');
              }  
         });  
    }            
});


$(document).on('click', '.display_mrf', function(){  
     var id = $(this).attr("id");  
     var branch  = $(this).attr("value");  
     if(id != '')  
     {  
          $.ajax({  
               url:"/ajax/view/NonAcad",  
               method:"GET",  
               data:{id:id,branch:branch},  
               success:function(data){  
                    $('#file_mrf_details_here').html(data);  
                    $('#viewmrf').modal('show');
               }  
          });  
     }            
 });