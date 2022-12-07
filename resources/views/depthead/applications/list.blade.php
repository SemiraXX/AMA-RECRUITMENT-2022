
<div class="hr-dashboard-main-content-wrapper">

    <div class="hrtabbtnwrapper">
    <div class="row">
        <div class="col-sm-8">
            <p class="hr-dashboard-title">Applications</p><br>
        </div>
        <div class="col-sm-4">
            <div class="input-group">
                <a href="#"><button id="btnjob" type="button" class="EXPORT-btn">Export</button></a>
                <input type="text" name="seachinput" id="seachinput" class="hr-search-input" placeholder="Search">
            </div>
        </div>
    </div>
    </div>



<!-- LIST OF ALL APPLICATIONS -->
@foreach($allapplications as $applicants)
<div class="hrwrapperforapplicationslist">
<div class="row">
    <div class="col-sm-1">
    <p><i class="fa fa-file" aria-hidden="true"></i></p>
    </div>
    <div class="col-sm-5">
    <p class="position-title">{{$applicants->lname}}, {{$applicants->fname}}</p>
    <p class="appplication-label1">{{$applicants->position_applying}}</p>
    </div>
    <div class="col-sm-2">
      <p class="view-status-label-row"><strong><i class="fa fa-circle" aria-hidden="true"></i></strong> {{$applicants->status}}</p>
    </div>
    <div class="col-sm-2">
      @include('hr.applicants.ratings')
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
                <a href="#"><button id="btntprocessrequirements" type="button" onclick="requirements()" class="hr-applicant-info-tab-btn">Requirements</button></a>
            </div>
            <div class="container"  style="background-color:white"><br>


            <div id="applicant_manage_details"></div>

            </div>
        </form>
      </div>

    </div>
  </div>
</div>


<!-- The Modal 
<div class="modal fade" id="manageapplication">
<div class="modal-dialog modal-dialog-centered modal-lg">
  <div class="modal-content"  style="background-color:transparent;border:none;">

    
    <div class="modal-body">

      <div class="input-group tab-wrapper">
          <a href="#"><button id="btntabprofile" type="button" onclick="Manage()" class="hr-applicant-info-tab-btn info-tab-btn-active">Manage Applicantion</button></a>
          <a href="#"><button id="btnother" type="button" onclick="tabother()" class="hr-applicant-info-tab-btn">Requirements</button></a>
          <a href="#"><button id="btnjob" type="button" onclick="tabattachements()" class="hr-applicant-info-tab-btn">Exam Results</button></a>
          <a href="#"><button id="btnjob" type="button" onclick="tabattachements()" class="hr-applicant-info-tab-btn">Evaluation</button></a>
      </div>
      <div class="container"  style="background-color:white">
      <br>
      <div id="applicant_manage_details"></div>
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      <br> <br>
      </div>
    </div>

  </div>
</div>
</div>