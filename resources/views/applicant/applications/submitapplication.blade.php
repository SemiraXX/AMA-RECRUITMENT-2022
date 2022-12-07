<!DOCTYPE html>
<html lang="en">
<head>
<title>AMA</title>
  <link href="/css/style.css" rel="stylesheet">
  <link href="/css/application.css" rel="stylesheet">
  <link href="/css/mobileapplication.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  @include('design.style')
</head>
<body style="background-color:#EFEFEF">

  @include('applicant.header')

  <div class="createapplicationswrapper">

        <div class="createapplicationswrapper2">

            <p class="appform-title1">Application Form</p>

            @include('applicant.applications.profileforapplication')
            
        </div>
  </div>


  <!-- The Modal -->
  <div class="modal fade" id="viewconsentform">
    <div class="modal-dialog modal-dialog-centered modal-xl" style="height:600px">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <p class="instruction-title1">You must download and sign this document.</p>
          <p class="close-modal1">&times;</p>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <iframe src="/files/sample-consent-form.pdf" style="width:100%;height:500px"></iframe>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>



  <!-- The Modal -->
  <div class="modal fade" id="forminstruction">
    <div class="modal-dialog modal-dialog-centered modal-lg" style="height:600px">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <p class="instruction-title1">SUBMIT CONSENT FORM</p>
          <p class="close-modal">&times;</p>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <br>
        <p class="instruction-title3">You must comply with the <span class="open-consent">consent form</span> to process your appication.<br> Follow the steps:</p>
        <br>
          <div class="row">
          <div class="col-sm-4" style="text-align:center">
          <p class="instruction-title2">Download Consent form file here</p>
          <h1><i class="fa fa-file" aria-hidden="true"></i></h1><br>
          <div class="input-group" style="justify-content:space-between">
          <a href="/files/consent/CONSENT-FORM-NON FACULTY-APPLICANT.pdf" target="_blank" download>
          <button type="button" class="dlbtn">Download</button></a>
          <a href="/files/consent/CONSENT-FORM-NON FACULTY-APPLICANT.pdf" target="_blank">
          <button type="button" class="dlbtn">View</button></a>
          </div>
         
          </div>
          <div class="col-sm-4" style="text-align:center">
          <p class="instruction-title2">Fill upSign the consent form file</p>
          <h1><i class="fa fa-pencil" aria-hidden="true"></i></h1>
          </div>
          <div class="col-sm-4" style="text-align:center">
          <p class="instruction-title2">Upload the signed consent form</p>
          <h1><i class="fa fa-upload" aria-hidden="true"></i></h1><br>

          <form action="{{ route('submit.consent')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="file"  class="appform-input" name="name" size="50" />
          <button type="submit" class="dlbtn">Submit</button>
          </form>

          </div>
          <br><br>
        </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <p>*don't close this modal<p>
        </div>
        
      </div>
    </div>
  </div>
  


  
<!--SUBMITTED REQUIRMENTS MODAL-->
<div class="modal fade" id="resume">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"  style="background-color:transparent;border:none;">
      <div class="modal-body">
          <div class="document-wrapper">
          <p class="document"><i class="fa fa-file-text-o" aria-hidden="true"></i></p>
          </div>
          <div class="requirments-instruction"  style="background-color:white">
              <div>
              <form action="{{ route('submit.resume')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type='file' id="upfile" name="name" onchange="readURL(this);" style="display:none" />

              @if($resume)
              <iframe id="blah" src="/files/resume/{{$resume->file}}" style="width:100%;height:100vh"></iframe>
              @else
              <iframe id="blah" src="#" style="width:100%;height:300px"></iframe>
              @endif
              <br><br>

              <button type="submit" class="resume-profile-btn" >Save</button>
              <button type="button" onclick="getFile()" class="resume-profile-btn" >Change file</button>
              <br><br>
              </form>
              </div>
            
          </div>
      </div>

    </div>
  </div>
</div>


  @include('animated.popups')
  
</body>
</html>