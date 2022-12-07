


<div class="hr-dashboard-main-content-wrapper">

    <div class="hrtabbtnwrapper">
    <div class="row">
        <div class="col-sm-8">
            <p class="hr-dashboard-title">{{$applicants->application_id}}</p><br>
        </div>
        <div class="col-sm-4">
        
        </div>
    </div>
    </div>

    <div class="hrtabbtnwrapper" style="border-bottom:solid 1px white; padding-bottom:15px">
        <button id="personalinfo" onclick="personalinfo()" type="button" class="manage-application-tab-btn">Personal Info</button>
        <button id="employmentinfo" onclick="employmentinfo()" type="button" class="manage-application-tab-btn">Employment</button>
        <button id="otherdetails" onclick="otherdetails()" type="button" class="manage-application-tab-btn">Other Details</button>
        <button id="documents" onclick="documents()" type="button" class="manage-application-tab-btn">Documents</button>
    </div>

<div class="form-wrapper-for-e201">
<form action="{{ route('e201.proceed') }}" method="post">
    {{ csrf_field() }}
    <button type="submit" class="trasfer-btn">Transfer to E201</button>
    <div class="personalinfo">
        @include('hr.e201.personalinfo')
    </div>

    <div class="employmentinfo">
        @include('hr.e201.employmentinfo')
    </div>

    <div class="otherdetails">
        @include('hr.e201.otherdetails')
    </div>

    <div class="documents">
        @include('hr.e201.documents')
    </div>

    <br><br>
    <input type="hidden" name="id" value="{{$applicants->id}}">
    </form>
</div>


</div>






