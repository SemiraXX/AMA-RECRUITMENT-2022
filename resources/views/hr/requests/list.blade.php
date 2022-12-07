

<!--GET ALL APPROVED MRF FOR JOB POSTING-->

<div class="hr-dashboard-main-content-wrapper">

<!--MAIN HEADER MENU TAB-->
@include('hr.requests.main')


@foreach($nonacad as $requests)
<div class="hrwrapperforapplicationslist">
<div class="row">
    <div class="col-sm-1">
    <p><i class="fa fa-file" aria-hidden="true"></i></p>
    </div>
    <div class="col-sm-3">
    <p class="position-title">{{$requests->educational_attainment}}</p>
    <p class="appplication-label1">{{$requests->mrf_id}} | {{$requests->position}} - ({{$requests->branch_code}})</p>
    </div>
    <div class="col-sm-2">
      <p class="normal-info-p-text" style="color:#56BDBA"><strong>Status:</strong><br>{{$requests->mrf_status}}</p>
    </div>
    <div class="col-sm-4">
      <p class="normal-info-p-text"><strong>Reason:</strong><br>{{$requests->justification}} | {{$requests->duties_and_responsibilities}}</p>
    </div>
   
    <div class="col-sm-2">
      <div class="input-group">
          <button type="button" class="manageapplicants-btn view_job" id="{{$requests->id}}" onclick="this.style.backgroundColor='#ACACAC'">Review</button>
      </div>
  </div>
</div>
</div>
@endforeach


</div>



<!-- The Modal -->
<div class="modal fade" id="viewapprovedmrf">
<div class="modal-dialog modal-dialog-centered modal-lg">
  <div class="modal-content"  style="background-color:transparent;border:none;">

    <!-- Modal body -->
    <div class="modal-body">

      <div class="input-group tab-wrapper">
          <a href="#"><button id="btntabprofile" type="button" onclick="tabprofile()" class="hr-applicant-info-tab-btn info-tab-btn-active">MRF Details</button></a>
      </div>
      <div class="container"  style="background-color:white">
      <br>
      <div id="job_details_here"></div>
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      <br> <br>
      </div>
    </div>

  </div>
</div>
</div>


<!-- The Modal -->
<div class="modal fade" id="createjob">
<div class="modal-dialog modal-dialog-centered modal-lg">
  <div class="modal-content"  style="background-color:transparent;border:none;">

    <!-- Modal body -->
    <div class="modal-body">

      <div class="input-group tab-wrapper">
          <a href="#"><button id="btntabprofile" type="button" class="hr-applicant-info-tab-btn">Create Job</button></a>
      </div>
      <div class="container"  style="background-color:white">
      <br>
      <form action="{{ route('post.job') }}" method="post">
          {{ csrf_field() }}
      <h1 class="mrf-title-text">Job Posting</h1>
      <br>
      <div id="job_form_create"></div>
      <button type="button" class="resigned-manageapplicants-btn" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="resigned-manageapplicants-btn">Submit</button>
      <br> <br>
      </form>
      </div>
    </div>

  </div>
</div>
</div>
