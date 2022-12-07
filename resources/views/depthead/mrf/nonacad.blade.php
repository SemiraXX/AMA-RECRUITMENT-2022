
<div class="hr-dashboard-main-content-wrapper">

<!--MAIN HEADER MENU TAB-->
@include('depthead.menu')


    @foreach($nonacad as $mrf)

            <div class="hrwrapperforapplicationslist">
            <div class="row">
                <div class="col-sm-1">
                <p class="resigned-list-icon"><i class="fa fa-file" aria-hidden="true"></i></p>
                </div>
                <div class="col-sm-4">
                <p class="title-info-p-text">{{$mrf->position}}</p>
                <p class="rsg-info-p-text">ID: {{$mrf->mrf_id}}</p>
                </div>
                <div class="col-sm-3">
                <p class="position-rsg-info-p-text">{{$mrf->department}}</p>
                </div>
                <div class="col-sm-1">
                <p class="approved-rsg-info-p-text">{{$mrf->mrf_status}}</p>
                </div>
                <div class="col-sm-3">
                <button type="button" class="manageapplicants-btn display_mrf" value="{{$mrf->id}}" id="{{$mrf->id}}" onclick="this.style.backgroundColor='#ACACAC'">View MRF</button>
                </div>
            </div>
            </div>
          
    @endforeach


</div>


<!-- The Modal -->
<div class="modal fade" id="filemrf">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"  style="background-color:transparent;border:none;">
  
      <!-- Modal body -->
      <div class="modal-body">
        <form action="{{ route('submit.NONACAD') }}" method="post">
          {{ csrf_field() }}

            <div class="input-group tab-wrapper">
                <a href="#"><button id="btntprocessmanage" type="button" class="hr-applicant-info-tab-btn info-tab-btn-active">Manage</button></a>
            </div>
            <div class="container"  style="background-color:white"><br>

            <div id="resigned_details"></div>

            </div>
        </form>
      </div>

    </div>
  </div>
</div>


<!-- The MRF -->
<div class="modal fade" id="NONACADfilemrf">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"  style="background-color:transparent;border:none;">
  
      <!-- Modal body -->
      <div class="modal-body">
        <form action="{{ route('submit.NONACAD') }}" method="post">
          {{ csrf_field() }}


            <div class="input-group tab-wrapper">
                <a href="#"><button id="btntprocessmanage" type="button" class="hr-applicant-info-tab-btn info-tab-btn-active">Manage</button></a>
            </div>
            <div class="container"  style="background-color:white"><br>
                
                <h1 class="mrf-title-text">MANPOWER REQUEST FORM (Non-Acad)</h1>
                <hr>
                <div id="file-non-acad"></div>
                <button type="submit" class="resigned-manageapplicants-btn">Submit</button>
                <br>

            </div>
        </form>
      </div>

    </div>
  </div>
</div>


<!-- The Modal -->
<div class="modal fade" id="viewmrf">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"  style="background-color:transparent;border:none;">
  
      <!-- Modal body -->
      <div class="modal-body">
        <form action="{{ route('submit.NONACAD') }}" method="post">
          {{ csrf_field() }}

            <div class="input-group tab-wrapper">
                <a href="#"><button id="btntprocessmanage" type="button" class="hr-applicant-info-tab-btn info-tab-btn-active">Manage</button></a>
            </div>
            <div class="container"  style="background-color:white"><br>
            <h1 class="mrf-title-text">MANPOWER REQUEST FORM (Non-Acad)</h1>
            <hr>
            <div id="file_mrf_details_here"></div>
            <br><br>
            </div>
        </form>
      </div>

    </div>
  </div>
</div>

