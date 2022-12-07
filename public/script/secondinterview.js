    
//ajax for applicants
$(document).ready(function(){  
    
    //THIS IS TO SAVE EVALUATION 
    $(document).on('click', '.DEPT_save_evaluation', function(){  

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
                url:"/Dept/save/evaluation",  
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

});