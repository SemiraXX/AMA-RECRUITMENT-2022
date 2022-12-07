
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
    <div class="col-sm-5">
    <p class="position-title">{{$applicants->lname}}, {{$applicants->fname}}</p>
    <p class="appplication-label1">{{$applicants->position_applying}}</p>
    </div>
    <div class="col-sm-2">
      <p class="view-status-label-row"><strong><i class="fa fa-spinner" aria-hidden="true"></i></strong> {{$applicants->status}}</p>
    </div>
    <div class="col-sm-2">
      @include('hr.applicants.ratings')
    </div>
    <div class="col-sm-2">
      <div class="input-group">
          <button style="width:100%" type="button" class="manageapplicants-btn evaluate_data" id="{{$applicants->id}}" onclick="this.style.backgroundColor='#ACACAC'">Review File</button>
      </div>
  </div>
</div>
</div>
@endforeach



</div>





<!-- The Modal -->
<div class="modal fade" id="applicantdetailsforeval">
<div class="modal-dialog modal-dialog-centered modal-xl">
  <div class="modal-content"  style="background-color:transparent;border:none;">

    <!-- Modal body -->
    <div class="modal-body">

      <div class="input-group tab-wrapper">
          <a href="#"><button id="btntabfile" type="button" onclick="tabfile()" class="hr-applicant-info-tab-btn info-tab-btn-active">File</button></a>
          <a href="#"><button id="btntabprofile" type="button" onclick="tabprofile()" class="hr-applicant-info-tab-btn">Profile</button></a>
          <a href="#"><button id="btntprocessrequirements" type="button" onclick="requirements()" class="hr-applicant-info-tab-btn">Documents</button></a>
      </div>
      <div class="container"  style="background-color:white">
      <br>
      
      <form action="{{ route('update.status') }}" method="post">
          {{ csrf_field() }}
          <div id="applicant_details"></div>
      </form>

      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      <br> <br>
      </div>
    </div>

  </div>
</div>
</div>


