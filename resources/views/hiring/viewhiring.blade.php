<!DOCTYPE html>
<html lang="en">
<head>
<title>AMA</title>
  <link href="/css/applicant.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
  <link href="/css/hiring.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  @include('design.style')
</head>
<body style="background-color:#EFEFEF">

  @include('hiring.header')

  <div class="jobdetail-main-wrapper">

        <div class="hiring-thumbnail-wrapper">

        <div class="jobdetailwrapper">
                <p class="jobdetail-title1">{{$jobdetails->JDDescription}}</p>

                        <form action="{{ route('hiring.apply') }}" method="get">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="'.$id.'">
                            <button type="submit" class="apply-btn">Apply</button>
                          </form>
                          <br>

                <p class="label-job-title">Job Details</p>

                          <div class="job-details-wrapper">
                            <p class="label-job-title1">Job Type:</p>
                            <p class="job-label2">Full-time</p>
                            <p class="job-label2">Permanent</p>
                            <br>
                            <p class="label-job-title1">Job Qualifications:</p>
                            <p class="job-label2">Bachelor Degree</p>
                            <p class="job-label2">3 years experience</p>
                            <p class="job-label2">$qlfc->QlfDesc</p>
                            <br>
                            <p class="label-job-title1">Skills:</p>
                            <p class="job-label2">Microsoft Word</p>
                            <p class="job-label2">Microsoft Excel</p>
                            <br>
                            <p class="label-job-title1">Full job Descriptions:</p>
                            <p class="job-summary-label">{{$jobdetails->Summary}}</p>
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






<script>
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