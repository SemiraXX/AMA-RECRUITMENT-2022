
function resumeview(){
    $('#resume').modal('show'); 
}

//TO TRIGGER UPLOAD BUTTON
function getFile(){
    document.getElementById("upfile").click();
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}



//APPEND EDUCATIONAL BACKGROUND
$(document).ready(function(){
    $("#btn2").click(function(){
      $("#educationalwrapperappend").append('<div class="row applicantrowwrapper"><div class="col-sm-4"><label class="form-label">Education Level</label><select name="educational_level[]" class="appform-input" required><option value="High School">High School</option><option value="College Graduate">Bachelor/College Graduate</option><option value="Masters Graduate">Masters Graduate</option><option value="Masters Graduate">PhD Graduate</option></select></div><div class="col-sm-4"><label class="form-label">Name of Institution</label><input type="text" name="name_of_institution[]" id="name_of_institution[]" class="appform-input inputcheck"  placeholder="type here..." required></div><div class="col-sm-4"><label class="form-label">Degree Earned</label><input type="text" name="degree[]" id="degree[]" class="appform-input inputcheck"  placeholder="type here..." required></div><div class="col-sm-8"><label class="form-label">Address</label><input type="text" name="address[]" id="address[]" class="appform-input inputcheck"  placeholder="type here..." required></div><div class="col-sm-4"><label class="form-label">Year Graduated</label><div class="input-group"><input type="date"  name="date_attended[]" id="date_attended[]" class="appform-input inputcheck"  required></div></div></div><br>');
    });
    $("#appendfamily").click(function(){
        $("#familywrapperappend").append('<div class="applicantrowwrapper"><div class="row"><div class="col-sm-5"><label class="form-label">Name</label><input type="text" name="name[]" id="name[]" class="appform-input inputcheck" placeholder="type here..." required></div><div class="col-sm-4"><label class="form-label">Relationship</label><input type="text" name="relationship[]" id="relationship[]" class="appform-input inputcheck"  placeholder="type here..." required></div><div class="col-sm-3"><label class="form-label">Birthdate</label><input type="date" name="familybirthday[]" id="familybirthday[]" class="appform-input inputcheck" placeholder="type here..." required></div><div class="col-sm-3"><label class="form-label">Occupation</label><input type="text" name="occupation[]" id="occupation[]" class="appform-input inputcheck"   placeholder="type here..." required></div><div class="col-sm-3"><label class="form-label">Contact No.</label><input type="text" name="famcontact_number[]" id="famcontact_number[]" class="appform-input inputcheck"  placeholder="type here..." required></div><div class="col-sm-6"><label class="form-label">Address</label><div class="input-group"><input type="text" name="famaddress[]" id="famaddress[]" class="appform-input inputcheck"  placeholder="type here..." required> </div></div></div></div><br>');
    });
    $("#appendemployment").click(function(){
        $("#employmentwrapperappend").append('<div class="applicantrowwrapper"><div class="row"><div class="col-sm-3"><label class="form-label">Employerdwee</label><input type="text" name="company_employer[]" id="company_employer[]" class="appform-input"  placeholder="type here..." required> </div><div class="col-sm-3"><label class="form-label">Job Title</label><input type="text" name="job_title[]" id="job_title[]" class="appform-input"  placeholder="type here..." required></div><div class="col-sm-4"><label class="form-label">Address</label><input type="text"  name="company_address[]" id="company_address[]" class="appform-input"   placeholder="type here..." required></div><div class="col-sm-2"><label class="form-label">Date Employed</label><input type="date" name="date_employed[]" id="date_employed[]" class="appform-input"  placeholder="type here..." required> </div><div class="col-sm-3"><label class="form-label">length_of_stay</label><input type="number" name="length_of_stay[]" id="length_of_stay[]" class="appform-input"  placeholder="type here..."  required></div><div class="col-sm-3"><label class="form-label">contact_number</label><input type="text" name="employer_contact_number[]" id="employer_contact_number[]" class="appform-input"  placeholder="type here..." required></div><div class="col-sm-3"><label class="form-label">Starting Payrate</label><input type="number" name="starting_pay_rate[]" id="starting_pay_rate[]" class="appform-input"  placeholder="type here..." required></div><div class="col-sm-3"><label class="form-label">Ending Payrate</label><input type="number" name="ending_pay_rate[]" id="ending_pay_rate[]" class="appform-input"  placeholder="type here..." required></div><div class="col-sm-12"><label class="form-label">Separation Reason</label><input type="text" name="separation_reason[]" id="separation_reason[]" class="appform-input"  placeholder="type here..." required></div></div></div><br>');
    });
});




//FOR PHONE FORMAT
$("#phone").on("change keyup paste", function (e) {
    if (e.keyCode !== 8) {
      var output = '';
      var input = $("#phone").val();
      input = input.replace(/[^0-9]/g, '');
      var area = input.substr(0, 3);
      var pre = input.substr(3, 3);
      var tel = input.substr(6, 4);
      if (area.length < 3) {
          output = area;
      }
      else {
        if (pre.length < 3) {
          output =  area + "-" + pre;
        }
        if (pre.length == 3) {
          output = area + "-" + pre + "-" + tel;
        }
      }
      $("#phone").val(output);
    }
});



//TO SAVE PROFILE DATA AJAX
/*
$(document).ready(function(){  
    $(document).on('click', '.get_data', function(){  

        var id = $(this).attr("id");
        var fname, lname, mname, nickname, suffix;

        //FOR EDUCATIONAL BACKGROUND
        var educational_level = [];
        $('input[name="educational_level[]"]').each( function() {
            educational_level.push(this.value);
        });

        var name_of_institution = [];
        $('input[name="name_of_institution[]"]').each( function() {
            name_of_institution.push(this.value);
        });

        var degree = [];
        $('input[name="degree[]"]').each( function() {
            degree.push(this.value);
        });

        var address = [];
        $('input[name="address[]"]').each( function() {
            address.push(this.value);
        });

        var date_attended = [];
        $('input[name="date_attended[]"]').each( function() {
            date_attended.push(this.value);
        });

        //FOR FAMILY BACKGROUND
        var name = [];
        $('input[name="name[]"]').each( function() {
            if($(this).val()==""){
                alert("Family name field required");
                return true;
            }
            else
            {
                name.push(this.value)
            }
            
        });

        var relationship = [];
        $('input[name="relationship[]"]').each( function() {
            if($(this).val()==""){
              alert("Family relationship field required");
              return true;
            }
            else
            {
                relationship.push(this.value)
            }
            
        });

        var familybirthday = [];
        $('input[name="familybirthday[]"]').each( function() {
            if($(this).val()==""){
                alert("Family birthday field required");
                return true;
              }
              else
              {
                familybirthday.push(this.value)
              }
        });

        var occupation = [];
        $('input[name="occupation[]"]').each( function() {
            if($(this).val()==""){
                alert("Family occupation field required");
                return true;
              }
              else
              {
                occupation.push(this.value)
              }
        });

        var famcontact_number = [];
        $('input[name="famcontact_number[]"]').each( function() {
            famcontact_number.push(this.value);
            if($(this).val()==""){
                alert("Family contact field required");
                return true;
            }
            else
            {
                famcontact_number.push(this.value)
            }
        });

        var famaddress = [];
        $('input[name="famaddress[]"]').each( function() {
            if($(this).val()==""){
                alert("Family address field required");
                return true;
            }
            else
            {
                famaddress.push(this.value)
            }
        });


        //FOR PERSONAL INFO
        fname = $("#fname").val();
        lname = $("#lname").val();
        mname = $("#mname").val();
        nickname = $("#nickname").val();
        suffix = $("#suffix").val();

        if(id != '')  
            {  
            $.ajax({  
                url:"/applicant/Update",  
                method:"GET",  
                data:{
                    id:id,
                    fname:fname,
                    lname:lname,
                    mname:mname,
                    nickname:nickname,
                    suffix:suffix,
                    dateattended:date_attended,
                    educational_level:educational_level,
                    name_of_institution:name_of_institution,
                    degree:degree,
                    address:address,
                    name:name,
                    relationship:relationship,
                    familybirthday:familybirthday,
                    occupation:occupation,
                    famcontact_number:famcontact_number,
                    famaddress:famaddress,
                },  
                success:function (){
                    setTimeout(function(){ 
                        location.reload(); 
                        }, 
                        500);
                        $( "div.process" ).fadeIn(200 ).delay(1200).fadeOut( 800 );
                } 
    
                });  
            }           
    });

});*/




//hide tempo the other panel
//$(".education").hide();

//$(".sltd2").hide();
//$(".sltd3").hide();
/*
function personalinfo(){
    $(".personalinfo").animate( { "opacity": "show", top:"100"} , 800 );
    $(".education").hide();
    $(".family").hide();
    $(".sltd1").show();
    $(".sltd2").hide();
    $(".sltd3").hide();
}

function education(){
    $(".education").animate( { "opacity": "show", top:"100"} , 800 );
    $(".personalinfo").hide();
    $(".family").hide();
    $(".sltd1").hide();
    $(".sltd2").show();
    $(".sltd3").hide();
}

function family(){
    $(".family").animate( { "opacity": "show", top:"100"} , 800 );
    $(".personalinfo").hide();
    $(".education").hide();
    $(".sltd1").hide();
    $(".sltd2").hide();
    $(".sltd3").show();
}*/