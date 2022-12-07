
<div class="hr-dashboard-main-content-wrapper">


<!--MAIN HEADER MENU TAB-->
<div class="hrtabbtnwrapper">
    <div class="row">
        <div class="col-sm-8">
            <p class="hr-dashboard-title">For Transferring to E201</p><br>
        </div>
        <div class="col-sm-4">
            <div class="input-group">
                <a href="#"><button id="btnjob" type="button" class="EXPORT-btn">Export</button></a>
                <input type="text" name="seachinput" id="seachinput" class="hr-search-input" placeholder="Search">
            </div>
        </div>
    </div>
</div>

<div class="hrtabbtnwrapper" style="border-bottom:solid 1px white; padding-bottom:15px">
    <a href="/HR/dashboard"><button id="btnhrdashboard" type="button" class="manage-application-tab-btn">All Applications</button></a>
</div>



<!-- LIST OF ALL APPLICATIONS -->
@foreach($allapplications as $applicants)

    <!--CHECK IF IN E201 LIST-->
    <?php $ifonlist = DB::table('tbl_for_e201_transferring')->where('application_id', $applicants->application_id)->where('mrf_id', $applicants->mrf_number)->first(); ?>
    
    @if($ifonlist)
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
            <a href="{{ route('e201.transfer', ['id' => $applicants->id, 'application_id' => $applicants->application_id]) }}">
            <button style="width:100%" type="button" class="manageapplicants-btn">Manage</button>
            </a>
        </div>
    </div>
    </div>
    </div>
    @else

    @endif

@endforeach



</div>






