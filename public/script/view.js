
$("#examwraning").hide();


$('.thisradio').change(function() {

     var value = $(this).val();
     
     $(this).closest('.answerwrapper').find("#answerget").val(value);

});


$(document).ready(function(){  

     $('.viewattachement').click(function(){
          $('#attachementrequirments').modal('show');  
     });

     $('.addmorereq').click(function(){
          $('#addrequirments').modal('show');  
          $('#attachementrequirments').modal('hide');  
     });

     $('.backtomodal').click(function(){
          $('#addrequirments').modal('hide');  
          $('#attachementrequirments').modal('show');  
     });

     $('.closemodal1').click(function(){
          $('#addrequirments').modal('hide');  
          $('#attachementrequirments').modal('hide');  
     });
   
     $('.uploadrequirments').click(function(){
          $('#uploadrequirments').modal('show');  
     });

     $('.uploadcredentials').click(function(){
          $('#uploadcredrequirments').modal('show');  
     });


    $('.takeexambtn').click(function(){
       $('#beforeexammodalnote').modal('show');  
    });

    $('.viewexambtn').click(function(){

     $('#beforeexammodalnote').modal('hide'); 

     $('#exammodal').modal('show');  

     var sec = 500;
     var timer = setInterval(function(){
         document.getElementById('safeTimerDisplay').innerHTML= sec+' seconds';
         sec--;
         if(sec < 0) {
             clearInterval(timer);
             document.getElementById('examsubmitthis').click();
         }else if(sec < 11)
         {
          $("#examwraning").show();
         }
     }, 1000);

  });
  
    $(document).on('click', '.get_data', function(){  
             var id = $(this).attr("id");  
             if(id != '')  
             {  
                  $.ajax({  
                       url:"/Find/job",  
                       method:"GET",  
                       data:{id:id},  
                       success:function(data){  
                            $('#jddetails').html(data);  
                            $('.default').hide();  
                       }  
                  });  
             }            
        });
  
  });