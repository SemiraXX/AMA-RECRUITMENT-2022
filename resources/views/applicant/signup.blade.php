<!DOCTYPE html>
<html lang="en">
<head>
  <title>AMA</title>
  <link href="/css/applicant.css" rel="stylesheet">
  <link href="/css/login.css" rel="stylesheet">
  <link href="/css/mobilelogin.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
  <link href="/css/wave.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  @include('design.style')
</head>
<body>
<br><br>

  <div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
  </div>

  

<div class="main-login-form-wrapper">


        <p class="login-text-1">Already registered?  <a href="/Login"><button type="submit" class="login-formloginurl">Login</button></a> | <a href="/"><button type="submit" class="login-formloginurl">Find jobs</button></a></p>
        <br><br><br>
          <p class="login-text-2">Create an account</p>
          <form action="{{ route('new.register') }}" method="post">
          {{ csrf_field() }}
          
          <label class="login-form-label">First Name</label>
          <input type="text" name="fname" class="login-form-input"  placeholder="type here..." required> 
            
          <label class="login-form-label">Last Name</label>
          <input type="text" name="lname" class="login-form-input"  placeholder="type here..." required> 
          
          <label class="login-form-label">Email</label>
          <input type="email" name="email" class="login-form-input"  placeholder="type here..." required> 
      
          <label class="login-form-label">Password</label>
          <input type="password" id="inputPasswordfirst" name="password" class="login-form-input"  placeholder="type here..." required> 

          <label class="login-form-label">Confirm Password</label>
          <input type="password" id="inputPasswordsecond" name="conpassword" class="login-form-input" onkeyup="checkPasswordMatch();"  placeholder="type here..." required> 
   
       

          <p class="password-notes" id="divCheckPasswordMatch"></p>
          <!--<p class="consent-note"><input type="checkbox" id="terms" name="terms" value="terms" required>
            By proceeding, I understand/give my consent that my personal information will be processed by the system </p>-->
          <button type="submit" class="login-formsubmitbtn">Submit</button>

          </form>
      

</div>




  <!--CHECK IG HAVE AGREED TO PRIVACY POLICY OR NOT-->
  @if($haveconsent == 0)
  <div class="privacy-pop" id="privacymodal" >

          <div class="modal-privacy-pop-wrapper">
          <p class="modal-privacy-pop"><i class="fa fa-exclamation" aria-hidden="true"></i></p>
          </div>
          <form action="{{ route('get.ip') }}" method="post">
          {{ csrf_field() }}
          
          <div class="privacy-content"  style="background-color:white">
          <p class="privacy-title">Privacy Content</p>
          <p class="privacy-contet-label">The National Privacy Commission (NPC) is mandated by the Sec.38 of the Implementing Rules and Regulations (IRR) of R.A. 10173 (DPA of 2012) to be notified by the personal information controller (PIC) or personal information processor (PIP) when there is reasonable belief that a personal data breach occurred. The Data Breach Notification Management System (DBNMS) is a digital platform that allows PICs and PIPs to submit their report to the NPC. It requires users to provide personal information such as full name, sex, email and contact number. All personal data is collected through the web forms and files uploaded within the DBNMS. The personal data that will be processed by the DBNMS will be within the custody of the NPC and will be shared with relevant government agencies as required following relevant laws and shall follow the requirements of the DPA of 2012 its IRR and other issuances of NPC. All collected Personal Data will be kept in accordance with NPC’s Retention policy. Users of the DBNMS may exercise their privacy rights such as right to be informed, right to object, right to access, right to rectification, right to erasure or blocking, right to data portability, right to file a complaint and right to damages. Rest assured that all personal data will be kept in a secure and confidential manner by implementing up to data protection measures.</p>
          <br>
          <div>
            <input type="checkbox" id="scales" name="consent" value="1" checked>
            <label class="consent-checkbox-label">By ticking the checkbox, you agree with the processing of your personal information</label>
          </div>
          <br><br>
          
          <button type="submit" onclick="proceed()" class="privacy-btn">Proceed <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
          <br><br>
          </form>
          
          </div>
      
  </div>
  @else
  @endif




<script>
$("#privacymodal").hide();

$(window).on("load", function () {
  $("#privacymodal").animate( { "opacity": "show", top:"30"} , 1200 );
});

function proceed()
{
  $("#privacymodal").hide();
}


function checkPasswordMatch() {
    $('.formsubmitbtn').attr('disabled','disabled');
    var password = $("#inputPasswordfirst").val();
    var confirmPassword = $("#inputPasswordsecond").val();
    if (password != confirmPassword)
    {
        $("#divCheckPasswordMatch").html("Make sure password match");
    }
    else{
        $("#divCheckPasswordMatch").html("Passwords match!");
        $('.formsubmitbtn').removeAttr('disabled');
    }
}
</script>
  

@include('animated.popups')
</body>
</html>
