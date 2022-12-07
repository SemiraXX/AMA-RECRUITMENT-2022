<!DOCTYPE html>
<html lang="en">
<head>
<title>AMA</title>
  <link href="/css/jobuser.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  @include('design.style')
</head>
<body style="background-color:#EFEFEF">

  @include('applicant.header')

  <div class="searchbarwrapper">
    <div class="container">
      <form action="{{ route('search.jobs') }}" method="get">
        <input type="text" name="whatjob" class="searchinput"  placeholder="WHAT"> 
        <input type="text" name="wharejob" class="searchinput"  placeholder="WHERE"> 
      <button type="submit" class="searchbtn">Find Job</button>
      </form>
    </div>
  </div>

  <div class="jobwrapper">

        <div class="applicationswrapper2">
          
              <div class="row">

                  <div class="col-sm-5">
                    <div class="input-group jobshortdetails">
                      <p class="job-label2">sort by: date or position</p>

                      <!--<form action="https://recruitment.amaes.com/depthead/authentication" method="get">
                      <input type="text"  name="_token" value="<?php echo uniqid();?>" required>
                      <input type="text"  name="department" value="TRES01" required>
                      <input type="text"  name="branch" value="AMACC52" required>
                      <input type="text"  name="userid" value="01043127" required>
                      <input type="text"  name="position" value="IT" required>
                      <button type="submit" class="">Submit</button>
                      </form>-->

                    </div>
                      <div class="row">
                      @foreach($allvacancies as $job)
                          <div class="col-sm-12 get_data">
                              <div class="jobthumbnail">
                              <img src="/assets/ama-br-logo.png" class="job-logo">
                              <p class="job-label1">{{$job->position}}</p>
                              <p class="job-label2">{{$job->JobDescription}} ({{$job->JDCode}})</p>
                              <button type="button" onclick="this.style.backgroundColor='#ACACAC'"  class="view-job-btn get_data" id="{{$job->JDCode}}">View</button>
                              <br>
                              </div>
                          </div>
                      @endforeach
                      </div>
                  </div>

                  <div class="col-sm-7 jobinfowrapper">
                  
                    <!--DEFAULT JOB-->
                    <div class="default main-job-set">

                      <div class="insidejobtitle">
                        <div class="row">
                          <div class="col-sm-2">
                            <img src="/assets/ama-br-logo.png" class="job-logo">
                          </div>
                          <div class="col-sm-7">
                            <p class="main-job-title">None</p>
                            <p class="main-job-label">Sample City Name</p>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group">
                            <a href="#"><button type="button" class="apply-btn">Apply</button></a>
                            <a href="#"><button type="button" class="save-app-btn"><i class="fa fa-star" aria-hidden="true"></i></button></a>
                            </div>
                            
                          </div>
                        </div>
          
                      </div>
                      <div class="singlejobthumbnail">
                          <p class="label-job-title">Job Details</p>

                          <div class="job-details-wrapper">
                            <p class="label-job-title1">Job Type:</p>
                            <p class="job-label2">Full-time</p>
                            <p class="job-label2">Permanent</p>
                            <br>
                            <p class="label-job-title1">Job Qualifications:</p>
                            <p class="job-label2">Bachelor Degree</p>
                            <p class="job-label2">3 years experience</p>
                            <p class="job-label2">None</p>
                            <br>
                            <p class="label-job-title1">Skills:</p>
                            <p class="job-label2">Microsoft Word</p>
                            <p class="job-label2">Microsoft Excel</p>
                            <br>
                            <p class="label-job-title1">Full job Descriptions:</p>
                            <p class="job-summary-label">None</p>
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
                        <br><br><br>
                      </div>
                    </div>
                    <!--DEFAULT JOB-->

                    <div id="jddetails"></div>

                  </div>

              </div>

        </div>
  </div>

<script>
function selectedthumbnail(){
  $('#foo').css({
        'background-color': 'red',
        'color': 'white',
        'font-size': '44px'
    });
}
$(document).ready(function(){  
  $(document).on('click', '.get_data', function(){  
           var id = $(this).attr("id");  
           if(id != '')  
           {  
                $.ajax({  
                     url:"/Find/job",  
                     method:"GET",  
                     data:{id:id},  
                     success:function(data){  
                          $('#jddetails').html(data);  
                          $('.default').hide();  
                     }  
                });  
           }            
      });

});
</script>

@include('animated.popups')
</body>
</html>