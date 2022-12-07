

//FOR check BUTTONS
$(document).ready(function(){
    
    $('#submitapplicationform').click(function(){
        $('#forminstruction').modal('show');  
    });
    
    $('.close-modal').click(function(){
        $('#forminstruction').modal('hide');  
    });

    $('.close-modal1').click(function(){
        $('#viewconsentform').modal('hide');  
    });

    $('.open-consent').click(function(){
        $('#viewconsentform').modal('show');  
        var idx = $('.modal:visible').length;
         $('#viewconsentform').css('z-index', 1040 + (10 * idx));
    });

    $("#professional_license").hide();
    $("#related_to_ama_employee").hide();
    $("#been_dismissed").hide();
    $("#involved_in_criminal_case").hide();

    $('#licenseno').change(function () {
        if ($(this).prop('checked')) 
        {
            $( "#licenseyes" ).prop( "checked", false );
            $("#professional_license").val("None");
            $("#professional_license").hide();
        }
    });

    $('#licenseyes').change(function () {
        if ($(this).prop('checked')) 
        {
            $( "#licenseno" ).prop( "checked", false );
            $("#professional_license").val("...");
            $("#professional_license").show();
        }
        else
        {
            $("#professional_license").hide();
            $("#professional_license").val("...");
        }
    });


    $('#emplyedno').change(function () {
        if ($(this).prop('checked')) 
        {
            $("#emplyedyes").prop( "checked", false );
            $("#employed").val("Not Employed");
        }
    });
    
    $('#emplyedyes').change(function () {
        if ($(this).prop('checked')) 
        {
            $("#emplyedno").prop( "checked", false );
            $("#employed").val("Employed");
        }
    });

    $('#preemplyedno').change(function () {
        if ($(this).prop('checked')) 
        {
            $("#preemplyedyes").prop( "checked", false );
            $("#previouly_employed").val("NO");
        }
    });

    $('#preemplyedyes').change(function () {
        if ($(this).prop('checked')) 
        {
            $("#preemplyedno").prop( "checked", false );
            $("#previouly_employed").val("YES");
        }
    });


    $('#relatedtoamano').change(function () {
        if ($(this).prop('checked')) 
        {
            $("#relatedtoamayes").prop( "checked", false );
            $("#related_to_ama_employee").hide();
            $("#related_to_ama_employee").val("No");
        }
    });

    $('#relatedtoamayes').change(function () {
        if ($(this).prop('checked')) 
        {
            $("#relatedtoamano").prop( "checked", false );
            $("#related_to_ama_employee").show();
        }
        else
        {
            $("#related_to_ama_employee").hide();
            $("#related_to_ama_employee").val("No");
        }
    });


    $('#dismissedno').change(function () {
        if ($(this).prop('checked')) 
        {
            $("#dismissedyes").prop( "checked", false );
            $("#been_dismissed").hide();
            $("#been_dismissed").val("No");
        }
    });


    $('#dismissedyes').change(function () {
        if ($(this).prop('checked')) 
        {
            $("#dismissedno").prop( "checked", false );
            $("#been_dismissed").show();
        }
        else
        {
            $("#been_dismissed").hide();
            $("#been_dismissed").val("No");
        }
    });



    $('#crimincalno').change(function () {
        if ($(this).prop('checked')) 
        {
            $("#crimincalyes").prop( "checked", false );
            $("#involved_in_criminal_case").hide();
            $("#involved_in_criminal_case").val("No");
        }
    });
    $('#crimincalyes').change(function () {
        if ($(this).prop('checked')) 
        {
            $("#crimincalno").prop( "checked", false );
            $("#involved_in_criminal_case").show();
        }
        else
        {
            $("#involved_in_criminal_case").hide();
            $("#involved_in_criminal_case").val("No");
        }
    });

});