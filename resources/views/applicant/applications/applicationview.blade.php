<!DOCTYPE html>
<html lang="en">
<head>
<title>AMA</title>
  <link href="/css/applicant.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
  <link href="/css/applicationview.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  @include('design.style')
</head>
<body style="background-color:#EFEFEF">

@include('applicant.header')


  <div class="view-main-wrapper">

        <div class="row">

            <div class="col-sm-5">
              <div class="transparentjobwrapper">
                @include('applicant.applications.progress')
              </div>
            </div>



            <!--APPLICATION DETAILS-->
            <div class="col-sm-7">
          
              <div class="whitejobwrapper">
                <p class="view-application-job-title">{{$applications->position_applying}}</p>
                <p class="label-job-title">Application details</p>
                <div class="job-details-wrapper">
                <p class="label-job-title1">Application Status:</p>
                <p class="job-label2">{{$applications->employment_status}}</p>
                <br>
                <p class="label-job-title1">Application Details:</p>
                <p class="job-label2">Date Applied: {{$applications->date_applied}}</p>
                <br>
                <p class="label-job-title1">Applicant:</p>
                <p class="job-label2">Name: {{$applications->lname}}, {{$applications->fname}} {{$applications->mname}}</p>
                <p class="job-label2">License: {{$applications->professional_license}}</p>
                <p class="job-label2">Awards: {{$applications->latin_awards_honors}}</p>
                <br>
                <p class="label-job-title1">Skills:</p>
                <p class="job-label2">Microsoft Word</p>
                <p class="job-label2">Microsoft Excel</p>
                <br>
                <p class="label-job-title1">Full job Descriptions:</p>
                <p class="job-summary-label">{{$applications->date_applied}}</p>
                <br>
                <p class="label-job-title1">Benefits:</p>
                <p class="job-label2">Health insurance</p>
                <p class="job-label2">Life insurance</p>
                <br>
                <p class="label-job-title1">Schedule:</p>
                <p class="job-label2">8 hour shift</p>
                <p class="job-label2">Monday to Friday</p>
                <br>
                <p class="label-job-title1">Supplemental Pay:</p>
                <p class="job-label2">13th month salary</p>
                <p class="job-label2">Performance bonus</p>
              </div>
            </div>


        </div>  

  </div>
        



  

@include('applicant.applications.modals')

@include('animated.popups')



<script src="/script/view.js"></script>


</body>
</html>