
<div class="hr-dashboard-main-content-wrapper">

  <!--MAIN HEADER MENU TAB-->
  @include('hr.applicants.main')



  <!-- LIST OF ALL APPLICATIONS -->
  <?php  $allapplications = DB::table('tbl_applications')->where('status', 'Awaiting')->orderBy('date_applied', 'DESC')->get(); ?>

  @foreach($allapplications as $applicants)
  <div class="hrwrapperforapplicationslist">
  <div class="row">
      <div class="col-sm-1">
      <p><i class="fa fa-file" aria-hidden="true"></i></p>
      </div>
      <div class="col-sm-3">
      <p class="position-title">{{$applicants->lname}}, {{$applicants->fname}}</p>
      <p class="appplication-label1">{{$applicants->position_applying}}</p>
      </div>

      <?php $remark = DB::table('tbl_hr_applications_movement_trail')
        ->where('applicationID', $applicants->application_id)
        ->orderBy('datelogged', 'DESC')
        ->first(); ?>

      <div class="col-sm-4">
      @if($remark)
      <p class="remarks-label1">HR#{{$remark->hrID}} : <strong>Latest update:</strong> {{$remark->actiontaken}}
      | <strong>Remarks:</strong> {{$remark->remarks}} | <strong>Comments:</strong> "{{$remark->othercomment}}"</p>
      @else
      @endif
      </div>
      <div class="col-sm-2">
        @include('hr.applicants.ratings')
      </div>
      <div class="col-sm-2">
        <div class="input-group">
            <button type="button" class="manageapplicants-btn manage_data" id="{{$applicants->id}}" onclick="this.style.backgroundColor='#ACACAC'">Manage</button>
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
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content"  style="background-color:transparent;border:none;">
    <form action="{{ route('update.status') }}" method="post">
    {{ csrf_field() }}
      <!-- Modal body -->
      <div class="modal-body">

        <div class="input-group tab-wrapper">
            <a href="#"><button id="btntabprofile" type="button" onclick="Manage()" class="hr-applicant-info-tab-btn info-tab-btn-active">Manage</button></a>
            <a href="#"><button id="btntabprofile" type="button" onclick="History()" class="hr-applicant-info-tab-btn">Recent Activity</button></a>
        </div>
        <div class="container"  style="background-color:white">
        <br>

        <div id="applicant_manage_details"></div>
            
    </form>
        <br> <br>
        </div>
      </div>

    </div>
  </div>
</div>


