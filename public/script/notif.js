

$(document).ready(function(){  

    $(document).on('click', '.circle-notification-wrapper', function(){  

        var id = 1;  
        if(id != '')  
        {  
             $.ajax({  
                  url:"/ajax/notification",  
                  method:"GET",  
                  data:{id:id},  
                  success:function(data){  
                       $('#notifdata').html(data); 
                       $('#notificationmodal').modal('show');  
                       
                  }  
             });  
        }
                         
    });

});