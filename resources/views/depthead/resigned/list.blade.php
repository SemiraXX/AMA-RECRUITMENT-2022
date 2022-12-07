
<div class="hr-dashboard-main-content-wrapper">

<!--MAIN HEADER MENU TAB-->
@include('depthead.menu')


    @foreach($resigned as $employee)

        <?php 

        $TranNo = $employee->SqncNo;
        $Branch = $employee->Branch;
        $useid = $employee->EmpNo;
        
        $getstatus = DB::connection('sqlsrv2')
        ->table('ForApproval')
        ->where('TranNo', $TranNo)
        ->where('TranType', 'Rsgn')
        ->where('BranchCode', $Branch)
        ->where('FinalAction', 1)
        ->get();

        $checkiffile = DB::table('tbl_mrf_non_acad')
        ->where('branch_code', $Branch)
        ->where('resigned_employee_id', $useid)
        ->first();

        ?>

        @if($checkiffile)

        <!--IF ALREALDY FILED TO MRF, DONT DISPLAY HERE-->

        @else

            @if($getstatus)
            <div class="hrwrapperforapplicationslist">
            <div class="row">
                <div class="col-sm-1">
                <p class="resigned-list-icon"><i class="fa fa-file" aria-hidden="true"></i></p>
                </div>
                <div class="col-sm-5">
                <p class="title-info-p-text">{{$employee->RequestedBy}}</p>
                <p class="rsg-info-p-text"><strong>Effectivity:</strong> {{$employee->EffectiveDateResign}}</p>
                <p class="rsg-info-p-text"><strong>Letter:</strong> {{$employee->ResignationLetter}}</p>
                </div>
                <div class="col-sm-2">
                <p class="position-rsg-info-p-text">{{$employee->EmpPos}}</p>
                </div>
                <div class="col-sm-1">
                <p class="approved-rsg-info-p-text">Approved</p>
                </div>
                <div class="col-sm-3">
                <button type="button" class="manageapplicants-btn get_resigned" value="{{$employee->Branch}}" id="{{$employee->SqncNo}}" onclick="this.style.backgroundColor='#ACACAC'">Manage</button>
                <button type="button" class="manageapplicants-btn create_mrf" value="{{$employee->Branch}}" id="{{$employee->SqncNo}}" onclick="this.style.backgroundColor='#ACACAC'">Create MRF</button>
                </div>
            </div>
            </div>
            @else
            
            @endif
            
        @endif

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
                <br><br><br>

            </div>
        </form>
      </div>

    </div>
  </div>
</div>

