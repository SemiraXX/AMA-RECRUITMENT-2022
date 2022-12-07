
<div class="hr-dashboard-main-content-wrapper">

<!--MAIN HEADER MENU TAB-->
@include('hr.applicants.main')



<!-- LIST OF ALL APPLICATIONS -->

@foreach($allapplications as $applicants)
<div class="hrwrapperforapplicationslist">
<div class="row">
    <div class="col-sm-1">
    <p><i class="fa fa-file" aria-hidden="true"></i></p>
    </div>
    <div class="col-sm-3">
    <p class="position-title">{{$applicants->lname}}, {{$applicants->fname}}</p>
    <p class="appplication-label1">{{$applicants->position_applying}} {{$applicants->application_id}}</p>
    </div>

    <div class="col-sm-2">
      <p class="view-status-label-row"><strong><i class="fa fa-spinner" aria-hidden="true"></i></strong> {{$applicants->status}}</p>
    </div>
  
    
      <?php $remark = DB::table('tbl_hr_applications_movement_trail')
        ->where('applicationID', $applicants->application_id)
        ->orderBy('datelogged', 'DESC')
        ->first(); ?>

      <div class="col-sm-4">
      @include('hr.applicants.ratings')
        @if($remark)
        <ul class="events">
        <li class="past-progress">
            <time datetime="1">*</time> 
            <span><strong class="remarks-label1">{{$remark->actiontaken}}</strong></span>
            <br><br>
        </li>
        </ul>
        @else
      @endif


      </div>

    <div class="col-sm-2">
      <div class="input-group">
          <button type="button" class="manageapplicants-btn process_data" id="{{$applicants->id}}" onclick="this.style.backgroundColor='#ACACAC'">Manage</button>
          <button type="button" class="manageapplicants-btn get_data" id="{{$applicants->id}}" onclick="this.style.backgroundColor='#ACACAC'">View</button>
      </div>
  </div>
</div>
</div>
@endforeach



</div>





<!-- The Modal -->
<div class="modal fade" id="applicantdetails">
<div class="modal-dialog modal-dialog-centered modal-lg">
  <div class="modal-content"  style="background-color:transparent;border:none;">

    <!-- Modal body -->
    <div class="modal-body">

      <div class="input-group tab-wrapper">
          <a href="#"><button id="btntabprofile" type="button" onclick="tabprofile()" class="hr-applicant-info-tab-btn info-tab-btn-active">Profile</button></a>
          <a href="#"><button id="btntabprofile" type="button" onclick="tabeduc()" class="hr-applicant-info-tab-btn">Education</button></a>
          <a href="#"><button id="btnother" type="button" onclick="tabother()" class="hr-applicant-info-tab-btn">Other info</button></a>
          <a href="#"><button id="btnjob" type="button" onclick="tabattachements()" class="hr-applicant-info-tab-btn">Attachments</button></a>
      </div>
      <div class="container"  style="background-color:white">
      <br>
      <div id="applicant_details"></div>
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      <br> <br>
      </div>
    </div>

  </div>
</div>
</div>

<!-- The Modal -->
<div class="modal fade" id="manageapplication">
  <div class="modal-dialog modal-xl">
    <div class="modal-content"  style="background-color:transparent;border:none;">
  
      <!-- Modal body -->
      <div class="modal-body">
        <form action="{{ route('update.status') }}" method="post">
          {{ csrf_field() }}


            <div class="input-group tab-wrapper">
                <a href="#"><button id="btntprocessmanage" type="button" onclick="processmanage()" class="hr-applicant-info-tab-btn info-tab-btn-active">Manage</button></a>
                <a href="#"><button id="btntprocessexam" type="button" onclick="Examresult()" class="hr-applicant-info-tab-btn">Exam Results</button></a>
                <a href="#"><button id="btntevaluation" type="button" onclick="evaluation()" class="hr-applicant-info-tab-btn">Evaluations</button></a>
                <a href="#"><button id="btntabprofile" type="button" onclick="History()" class="hr-applicant-info-tab-btn">HR Recent Activity</button></a>
                <a href="#"><button id="btntabprofile" type="button" onclick="getconvo()" class="hr-applicant-info-tab-btn">Messages</button></a>
            </div>
            <div class="container"  style="background-color:white"><br>


            <div id="applicant_manage_details"></div>

            <br>
        

            </div>
        </form>
      </div>

    </div>
  </div>
</div>


