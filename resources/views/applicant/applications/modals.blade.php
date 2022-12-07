

<!--MODALS-->



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
                @foreach($credentials as $docu)
                  @if(($docu->FlUploadCode == "TOR") ||
                  ($docu->FlUploadCode == "DIPLOMA") ||
                  ($docu->FlUploadCode == "PRCLICENSE") ||
                  ($docu->FlUploadCode == "AWARDS") ||
                  ($docu->FlUploadCode == "OTHERS"))

                  <tr>
                    <th>{{$docu->FlUploadDesc}} 
                      <input type="hidden" name="reqname[]" value="{{$docu->FlUploadDesc}}">
                      <input type="hidden" name="reqcode[]" value="{{$docu->FlUploadCode}}">
                    </th>
                    <td><input type="file"  name="name[]" style="width:300px"></td>
                    <td>none</td>
                  </tr>
                  @else

                  @endif
                @endforeach
                </tbody>
              </table>
              
              <p class="requirments-note-text">*Upload your complete credetials in pdf format. You can merge mutilple document in one pdf file.</p>
              <input type="hidden" name="usernamereq" value="{{$applications->lname}}">
              <input type="hidden" name="useridreq" value="{{$applications->userid}}">
              <input type="hidden" name="appidreq" value="{{$applications->application_id}}">
              <button type="submit" class="upload-btn">Upload <i class="fa fa-upload" aria-hidden="true"></i></button>
              <br>
            </form>
          </div>
      </div>

    </div>
  </div>
</div>







<!--REQUIRMENTS MODAL-->
  <div class="modal fade" id="uploadrequirments">
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
              <input type="hidden" name="usernamereq" value="{{$applications->lname}}">
              <input type="hidden" name="useridreq" value="{{$applications->userid}}">
              <input type="hidden" name="appidreq" value="{{$applications->application_id}}">
              <button type="submit" class="upload-btn">Upload <i class="fa fa-upload" aria-hidden="true"></i></button>
              <br>
            </form>
          </div>
      </div>

    </div>
  </div>
</div>





  <!--SUBMITTED REQUIRMENTS MODAL-->
  <div class="modal fade" id="attachementrequirments">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content"  style="background-color:transparent;border:none;">

      <div class="modal-body">
          <div class="document-wrapper">
          <p class="document"><i class="fa fa-file-text-o" aria-hidden="true"></i></p>
          </div>
          <div class="requirments-instruction"  style="background-color:white">
          <p class="requirments-note-title">Document Files</p>
          <br>
            <div class="row">
              @foreach($requirements as $file)
              <div class="col-sm-2">
              <a href="/files/requirements/{{$file->file_url}}" target="_blank" style="text-decoration:none">
              <h1 class="document-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></h1>
              <p class="document-name">{{$file->file_url}}</p>
              </a>
              </div>
              @endforeach
            </div>
            <br><br>
            <button type="submit" class="upload-req-btn addmorereq">Upload Document</button>
            <br><br>
            <a class="docu-back-to closemodal1" href="#back">close</a>
          </div>
      </div>

    </div>
  </div>
</div>



<!--UPLOAD MORE REQUIRMENTS MODAL-->
<div class="modal fade" id="addrequirments">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content"  style="background-color:transparent;border:none;">

      <div class="modal-body">
        <form action="{{ route('document.submit')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="document-wrapper">
            <p class="document"><i class="fa fa-file-text-o" aria-hidden="true"></i></p>
            </div>
            <div class="requirments-instruction"  style="background-color:white">
            <p class="requirments-note-title">Upload additional requirement</p>
            <br>
            <select name="reqcode[]" class="appform-input" required>
              @foreach($documents as $docu)
              <?php $ifposted = DB::table('tbl_requirements')
              ->where('application_id', $applications->application_id)
              ->where('file_code', $docu->FlUploadCode)->first(); ?>

              @if($ifposted)
              <option value="{{$docu->FlUploadCode}}" disabled class="disabled"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>{{$docu->FlUploadDesc}}</option>
              @else
              <option value="{{$docu->FlUploadCode}}" class="notdisabled">{{$docu->FlUploadDesc}}</option>
              @endif
             

              @endforeach
            </select>
            <input type="hidden" name="reqname[]" value="default">
            <input type="file" class="appform-input"  name="name[]" required>
            <input type="hidden" name="usernamereq" value="{{$applications->lname}}">
            <input type="hidden" name="useridreq" value="{{$applications->userid}}">
            <input type="hidden" name="appidreq" value="{{$applications->application_id}}">
            <br><br>
            <button type="submit" class="upload-req-btn">Upload</button>
            <br><br>
            <a class="docu-back-to backtomodal" href="#back"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>






  <!--INSTRUCTION MODAL-->
  <div class="modal fade" id="beforeexammodalnote">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content"  style="background-color:transparent;border:none;">

      <div class="modal-body">
          <div class="exclamation-instruction-wrapper">
          <p class="exclamation"><i class="fa fa-exclamation" aria-hidden="true"></i></p>
          </div>
          <div class="exam-instruction"  style="background-color:white">
          <p class="exam-note-title">Please read the instructions carefully</p>
          <p class="note-label">1. Exam contains 63 mulitple questions and 1 essay portion.</p>
          <p class="note-label">2. You only have 30 minutes to submit your answer</p>
          <p class="note-label">3. Don't close browser to avoid reset</p>
          <button type="submit" class="note-exam-btn viewexambtn">Proceed to Exam</button>
          <button type="submit" class="note-exam-btn closemodal">Cancel</button>
          <br>
          </div>
      </div>

    </div>
  </div>
</div>






<!--EXAM SHEET MODAL-->
<div class="modal fade" id="exammodal">
<div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content"  style="background-color:transparent;border:none;">

      <div class="modal-body">

      <div class="exammessagewrapper" id="examwraning"><div class="alert-box exam"><i class="fa fa-warning" aria-hidden="true"></i> 10 seconds left </div></div>
        <!--TIMER DESIGN-->
        <div class="timer-wrapper">
          <div id="safeTimer">
            <h2 class="timer-label">Exam Timer</h2>
            <p class="timer-count-label" id="safeTimerDisplay">00:30</p>
          </div>
        </div>

        <div class="input-group tab-wrapper">
            <a href="#"><button id="btntabprofile" type="button" onclick="exam()" class="modal-info-tab-btn">Exam</button></a>
            <a href="#"><button id="btnother" type="button" onclick="essay()" class="modal-info-tab-btn">Essay</button></a>
        </div>
        <div class="container"  style="background-color:white">
        <br>
        <form action="{{ route('answer.submit')}}" method="post">
        {{ csrf_field() }}
        @if($lateststatus)

            @if(($lateststatus->status == "For-Exam") || ($lateststatus->status == "For-Exam-and-Essay"))

                <div class="exam-content-wrapper">
                <p class="label-job-title">Examination</p>
                  <?php $examination = DB::table('ExamDetails')->where('SetCode', $lateststatus->exam)->get(); ?>
                  @foreach($examination as $myexam)
                  <div class="exam-wrapper">
                  <p class="exam-question">{{$myexam->Question}}</p>
                  <div class="input-group answergroup answerwrapper">
                    <div class="checkbox">
                    <label class="exam-choices"><strong>A.</strong> <input type="radio" name="{{$myexam->QuestionNo}}[]" class="checkbox-input thisradio" value="{{$myexam->ChoiceA}}"> {{trim($myexam->ChoiceA,"_01")}}</label>
                    </div>
                    <div class="exam-choices">
                    <label><strong>B.</strong> <input type="radio" name="{{$myexam->QuestionNo}}[]"  class="checkbox-input thisradio" value="{{$myexam->ChoiceB}}"> {{trim($myexam->ChoiceB,"_01")}}</label>
                    </div>
                    <div class="exam-choices">
                    <label><strong>C.</strong> <input type="radio" name="{{$myexam->QuestionNo}}[]"  class="checkbox-input thisradio" value="{{$myexam->ChoiceC}}"> {{trim($myexam->ChoiceC,"_01")}}</label>
                    </div>
                    <div class="exam-choices">
                    <label><strong>D.</strong> <input type="radio" name="{{$myexam->QuestionNo}}[]"  class="checkbox-input thisradio" value="{{$myexam->ChoiceD}}"> {{trim($myexam->ChoiceD,"_01")}}</label>
                    </div>
                  <input type="hidden" name="answer[]" id="answerget" value="none"> 
                  <input type="hidden" name="question[]" value="{{$myexam->QuestionNo}}">  
                  <input type="hidden" name="code[]" value="{{$myexam->SetCode}}">
                  </div>
                  </div>
                  @endforeach
                </div>

            @else
                    
            @endif
        @else

        @endif

        
        <input type="hidden" name="application_id" value="{{$applications->application_id}}"> 
        

        <div class="exam-content-wrapper">
          <button type="submit" id="examsubmitthis" class="submit-exam-btn">Submit</button>
          <br><br>
        </div>
        

        </form>
        

        <br><br>
        </div>
      </div>

    </div>
  </div>
</div>
