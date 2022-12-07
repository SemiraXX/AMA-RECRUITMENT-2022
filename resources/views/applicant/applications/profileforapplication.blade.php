        
   <form action="{{ route('form.submit')}}" method="post">
        {{ csrf_field() }}

       
        <div class="application-form-wrapper3">
        <br><label class="application-title-label">{{$specificjd->JDDescription}}</label>
        </div>

        <div class="application-form-wrapper2">
          <div class="form-application-detail">
            <label class="application-sub-title">Job Summary</label>
            <p class="application-summary-label">{{$specificjd->Summary}}</p>
          </div>
        </div>
  
        <div class="application-form-wrapper2">

                <div class="resume-border-wrapper">
                    @if($resume)
                      <a href="#" data-target="#resume" data-toggle="modal">
                      <div class="input-group resume-border">
                      <h1 class="my-resume-icon"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></h1>
                      <p class="my-resume-text">{{$resume->file}}</p>
                      </div>
                      </a>
                    @else
                      <a href="#" data-target="#resume" data-toggle="modal">
                      <p class="my-resume-text">Upload</p>
                      </a>
                    @endif
                </div>
            <br>
            <div class="row applicantrowwrapper">
              <label class="application-title-label">Personal Information</label><br>
              <p class="application-summary-label">Name: {{$applicants->lname}}, {{$applicants->fname}}</p>
              <p class="application-summary-label">Gender: {{$applicants->gender}}</p>
              <p class="application-summary-label">Birthdate: {{$applicants->birthdate}}</p>
              <p class="application-summary-label">Birth Place: {{$applicants->birthplace}}</p>
              <p class="application-summary-label">Civil status: {{$applicants->civilstatus}}</p>
              <p class="application-summary-label">Citizenship: {{$applicants->citizenship}}</p>
              <p class="application-summary-label">Religion: {{$applicants->religion}}</p>
              <p class="application-summary-label">Mother: {{$applicants->mother_name}}</p>
              <p class="application-summary-label">Father: {{$applicants->father_name}}</p>
              <p class="application-summary-label">Spouse: {{$applicants->spouse}}</p>
            </div>
            <br>
            <div class="row applicantrowwrapper">
              <label class="application-title-label">Government</label><br>
              <p class="application-summary-label">SSS: {{$applicants->sss}}</p>
              <p class="application-summary-label">TIN: {{$applicants->tin}}</p>
              <p class="application-summary-label">PHILHEALTH: {{$applicants->philhealth}}</p>
              <p class="application-summary-label">PAG-IBIG FUND: {{$applicants->pagibig}}</p>
            </div>
            <br>
            <div class="row applicantrowwrapper">
              <label class="application-title-label">Contact Number</label><br>
              <p class="application-summary-label">{{$applicants->contact_number}}</p>
            </div>
            <br>
            <div class="row applicantrowwrapper">
              <label class="application-title-label">Email</label><br>
              <p class="application-summary-label">{{$applicants->email}}</p>
            </div>
            <br>
            <div class="row applicantrowwrapper">
              <label class="application-title-label">Address</label><br>
              <p class="application-summary-label">{{$applicants->complete_address}}</p>
              <p class="application-summary-label">{{$applicants->province}}, {{$applicants->city}}</p>
            </div>
            <br>
            <div class="row applicantrowwrapper">
              <label class="application-title-label">Drivers License</label><br>
              <p class="application-summary-label">{{$applicants->drivers_license}}</p>
              <p class="application-summary-label">Restrictions: {{$applicants->restriction}}</p>
            </div>
            <br>
            <div class="row applicantrowwrapper">
              <label class="application-title-label">For Uploading of Requirements</label><br>
              <button type="button" class="take-exam-btn uploadcredentials">Upload Requirments</button>
            </div>
            <br>

            <input type="hidden" name="fname" class="appform-input"  value="{{$applicants->fname}}" readonly style="cursor:not-allowed">
            <input type="hidden" name="lname" class="appform-input"  value="{{$applicants->lname}}" readonly style="cursor:not-allowed"> 
            <input type="hidden" name="mname" class="appform-input"  value="{{$applicants->mname}}" readonly style="cursor:not-allowed">
            <input type="hidden" name="suffix" class="appform-input"  value="{{$applicants->suffix}}" readonly style="cursor:not-allowed"> 
            <input type="hidden" name="nickname" class="appform-input"  value="{{$applicants->nickname}}" readonly style="cursor:not-allowed"> 
            <input type="hidden" name="gender" class="appform-input"  value="{{$applicants->gender}}" readonly style="cursor:not-allowed"> 
            <input type="hidden" name="email" class="appform-input"  value="{{$applicants->email}}" readonly style="cursor:not-allowed"> 
            <input type="hidden" name="contact_number" class="appform-input"  value="{{$applicants->contact_number}}" readonly style="cursor:not-allowed"> 
            <input type="hidden" name="province" class="appform-input"  value="{{$applicants->province}}" readonly style="cursor:not-allowed">  
            <input type="hidden" name="present_address" class="appform-input"  value="{{$applicants->complete_address}}" > 
            <input type="hidden" name="city" class="appform-input"  value="{{$applicants->city}}" readonly style="cursor:not-allowed"> 
            <input type="hidden" name="birthdate" class="appform-input"  value="{{$applicants->birthdate}}" readonly style="cursor:not-allowed">  
            <input type="hidden" name="birthplace" class="appform-input"  value="{{$applicants->birthplace}}" readonly style="cursor:not-allowed">  
            <input type="hidden" name="citizenship" class="appform-input"  value="{{$applicants->citizenship}}" readonly style="cursor:not-allowed">  
            <input type="hidden" name="religion" class="appform-input"  value="{{$applicants->religion}}" readonly style="cursor:not-allowed">
            <input type="hidden" name="civilstatus" class="appform-input"  value="{{$applicants->civilstatus}}" readonly style="cursor:not-allowed">
            <input type="hidden" name="mother_name" class="appform-input"  value="{{$applicants->mother_name}}" readonly style="cursor:not-allowed">  
            <input type="hidden" name="father_name" class="appform-input"  value="{{$applicants->father_name}}" readonly style="cursor:not-allowed"> 
            <input type="hidden" name="spouse" class="appform-input"  value="{{$applicants->spouse}}" readonly style="cursor:not-allowed">  
            <input type="hidden" name="no_of_siblings" class="appform-input"  value="{{$applicants->no_of_siblings}}" >  
            <input type="hidden" name="professional_license" class="appform-input"  value="{{$applicants->professional_license}}"placeholder="proflicense">  
            <input type="hidden" name="drivers_license" class="appform-input"  value="{{$applicants->drivers_license}}" placeholder="drivers_license">  
            <input type="hidden" name="restriction" class="appform-input"  value="{{$applicants->restriction}}" readonly style="cursor:not-allowed">  
            <input type="hidden" name="sss" class="appform-input"  value="{{$applicants->sss}}" readonly style="cursor:not-allowed">
            <input type="hidden" name="tin" class="appform-input"  value="{{$applicants->tin}}" readonly style="cursor:not-allowed">
            <input type="hidden" name="philhealth" class="appform-input"  value="{{$applicants->philhealth}}" readonly style="cursor:not-allowed">
            <input type="hidden" name="pagibig" class="appform-input"  value="{{$applicants->pagibig}}" readonly style="cursor:not-allowed">

            
          
            <div class="row applicantrowwrapper">
                <div class="col-sm-12">
                  <label class="application-sub-title">Licensed Professional?</label><br>
                  <input type="checkbox" id="licenseno" name="licens">
                  <label class="application-sub-title">No</label> &nbsp;&nbsp;
                  <input type="checkbox" id="licenseyes" name="licens">
                  <label class="application-sub-title">Yes, (Please Indicate)</label><br><br>
                  <input type="text" name="professional_license" id="professional_license" class="appform-input" value="None" required>
                  <hr>
                </div>
                <div class="col-sm-6">
                  <label class="application-sub-title">Currently Employed?</label><br>
                  <input type="checkbox" id="emplyedno" >
                  <label class="application-sub-title">No</label> &nbsp;&nbsp;
                  <input type="checkbox" id="emplyedyes">
                  <label class="application-sub-title">Yes</label>
                  <input type="hidden" name="employed" id="employed" class="appform-input" value="None" required>
                </div>
                <div class="col-sm-6">
                  <label class="application-sub-title">Previously Employed?</label><br>
                  <input type="checkbox" id="preemplyedno" >
                  <label class="application-sub-title">No</label> &nbsp;&nbsp;
                  <input type="checkbox" id="preemplyedyes">
                  <label class="application-sub-title">Yes</label>
                  <input type="hidden" name="previouly_employed" id="previouly_employed" class="appform-input" value="None" required>
                </div>
            </div>
            <br>
            <!--END OF PERSONAL INFO 4TH ROW-->

            <!--PERSONAL INFO 4TH ROW-->
            <div class="row applicantrowwrapper">
                <div class="col-sm-12">
                  <label class="application-sub-title" style="line-height:18px !important">RELATED BY 6TH DEGREE OF CONSANGUINITY OR AFFINITY UP TO ANY EMPLOYEE OF AMA?</label>
                  <br><input type="checkbox" id="relatedtoamano" >
                  <label class="application-sub-title">No</label> &nbsp;&nbsp;
                  <input type="checkbox" id="relatedtoamayes">
                  <label class="application-sub-title">Yes, (Please Indicate)</label>
                  <input type="text" name="related_to_ama_employee" id="related_to_ama_employee" class="appform-input" value="None" placeholder="type here...">  
                </div>
            </div>
            <br>
            <!--END OF PERSONAL INFO 4TH ROW-->


            <!--PERSONAL INFO 4TH ROW-->
            <div class="row applicantrowwrapper">
                <div class="col-sm-12">
                  <label class="application-sub-title" style="line-height:18px !important">HAVE YOU EVER BEEN DISMISSED BY YOUR FORMER EMPLOYERS? FOR ANY ADMINISTRATIVE OR JUST CAUSE?</label>
                  <br><input type="checkbox" id="dismissedno" >
                  <label class="application-sub-title">No</label> &nbsp;&nbsp;
                  <input type="checkbox" id="dismissedyes">
                  <label class="application-sub-title">Yes, (Please Indicate)</label>
                  <input type="text" name="been_dismissed" id="been_dismissed" class="appform-input" value="None" placeholder="type here...">  
                </div>
            </div>
            <br>
            <!--END OF PERSONAL INFO 4TH ROW-->



            <!--PERSONAL INFO 4TH ROW-->
            <div class="row applicantrowwrapper">
                <div class="col-sm-12">
                  <label class="application-sub-title" style="line-height:18px !important">HAVE YOU EVER BEEN INVOLVED IN ANY ADMINISTRATIVE, CIVIL OR CRIMINAL CASE?</label><br>
                  <input type="checkbox" id="crimincalno" >
                  <label class="application-sub-title">No</label> &nbsp;&nbsp;
                  <input type="checkbox" id="crimincalyes">
                  <label class="application-sub-title">Yes, (Please Indicate)</label>
                  <input type="text" name="involved_in_criminal_case" value="None" id="involved_in_criminal_case" class="appform-input" placeholder="type here...">  
                </div>
            </div>
            <br>
            <!--END OF PERSONAL INFO 4TH ROW-->


             <!--PERSONAL INFO 4TH ROW-->
             <div class="row applicantrowwrapper">
                <div class="col-sm-6">
                  <label class="application-sub-title">Postion Applying</label>
                  <input type="text" name="position_applying" class="appform-input"  value="{{$specificjd->JDDescription}}" readonly>  
                </div>
                <div class="col-sm-6">
                  <label class="application-sub-title">Desired Salary*</label>
                  <input type="text" name="desired_salary" class="appform-input"  placeholder="type here..." required>  
                </div>
            </div>
            <br>
            <!--END OF PERSONAL INFO 4TH ROW-->


            <!--PERSONAL INFO 4TH ROW-->
            <div class="row applicantrowwrapper">
                <div class="col-sm-4">
                  <label class="application-sub-title">Latin Awards</label>
                  <input type="text" name="latin_awards_honors" class="appform-input"  placeholder="type here..." required>  
                </div>
                <div class="col-sm-4">
                  <label class="application-sub-title">Tesda Certification</label>
                  <input type="text" name="tesda_cerfitification" class="appform-input"  placeholder="type here..." required>  
                </div>
                <div class="col-sm-4">
                  <label class="application-sub-title">WHERE DID YOU HEAR ABOUT US?</label>
                  <input type="text" name="when_hear_about_us" class="appform-input"  placeholder="type here..." required>  
                </div>
            </div>
            <br>
            <!--END OF PERSONAL INFO 4TH ROW-->

            <?php  $checkconsent = DB::table('tbl_consentform')->where('userid', '=', session('applicantsession'))->first(); ?>
            @if($checkconsent)
            <button type="submit" class="applicantformbtn">Submit</button>
            @else
            <button type="button" class="applicantformbtn get_data" id="submitapplicationform">Continue</button>
            @endif


           
            <br>
            </div>
  </form>

  
  <script src="/script/application.js"></script>



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
              <iframe id="blah" src="http://www.africau.edu/images/default/sample.pdf" style="width:100%;height:100vh"></iframe>
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


<!--CREDENTIAL REQUIRMENTS MODAL-->
<div class="modal fade" id="uploadcredrequirments">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content"  style="background-color:transparent;border:none;">

      <div class="modal-body">
          <div class="document-wrapper">
          <p class="document"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></p>
          </div>
          <div class="requirments-instruction"  style="background-color:white">
          <p class="requirments-note-title">Upload all requirements</p>
    
            <form action="{{ route('document.submit')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
              <table class="table">
                <thead>
                  <tr>
                    <th>Requirements</th>
                    <th></th>
                    <th>File</th>
                  </tr>
                </thead>
                <tbody>
                <?php $documents = DB::table('ApplicantRequirements')->where('ClassType', 'NONACAD')->get(); ?>
                @foreach($documents as $docu)
                    <?php  $checkrequirements = DB::table('tbl_requirements')->where('file_code', $docu->FlUploadCode)->first(); ?>
                   @if($checkrequirements)
                      <tr>
                        <th>{{$docu->FlUploadDesc}} 
                          <input type="hidden" name="reqname[]" value="{{$docu->FlUploadDesc}}">
                          <input type="hidden" name="reqcode[]" value="{{$docu->FlUploadCode}}">
                        </th>
                        <td>submitted</td>
                        <td>{{ $checkrequirements->file_name}}</td>
                      </tr>
                    @else
                    <tr>
                        <th>{{$docu->FlUploadDesc}} 
                          <input type="hidden" name="reqname[]" value="{{$docu->FlUploadDesc}}">
                          <input type="hidden" name="reqcode[]" value="{{$docu->FlUploadCode}}">
                        </th>
                        <td><input type="file"  name="name[]" style="width:300px"></td>
                        <td>none</td>
                      </tr>
                    @endif
                @endforeach
                </tbody>
              </table>
              
              <p class="requirments-note-text">*Upload your complete credetials in pdf format. You can merge mutilple document in one pdf file.</p>
              <input type="hidden" name="usernamereq" value="{{$applicants->lname}}">
              <input type="hidden" name="useridreq" value="{{$applicants->userid}}">
              <input type="hidden" name="appidreq" value="12345567">
              <button type="submit" class="upload-btn">Upload <i class="fa fa-upload" aria-hidden="true"></i></button>
              <br>
            </form>
          </div>
      </div>

    </div>
  </div>
</div>

<script src="/script/view.js"></script>