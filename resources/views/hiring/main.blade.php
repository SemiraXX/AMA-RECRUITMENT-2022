<!DOCTYPE html>
<html lang="en">
<head>
<title>AMA</title>
  <link href="/css/applicant.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
  <link href="/css/hiring.css" rel="stylesheet">
  <link href="/css/wave.css" rel="stylesheet">
  <link href="/css/mobile.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  @include('design.style')
</head>
<body style="background-color:#EFEFEF;overflow-x: hidden;">

  <div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
  </div>

  

  @include('hiring.header')

  <div class="home-banner-wrapper">
  <h1 class="home-title">Search for a job</h1>
  </div>
 
  <div class="desktop">
  <div id="navbar">
    <div class="home-search-wrapper">
      <form action="{{ route('hiring.job') }}" method="get">
        <input type="text" name="wharejob" class="home-searchinput"  placeholder="Job Title"> 
        <button type="submit" class="home-searchbtn">Find Job</button>
      </form>
      <br>
    </div>
  </div>
  </div>


  <div class="mobile">
    <div class="home-search-wrapper">
      <form action="{{ route('hiring.job') }}" method="get">
        <input type="text" name="wharejob" class="home-searchinput"  placeholder="Job Title"> 
        <button type="submit" class="home-searchbtn">Find Job</button>
      </form>
      <br>
    </div>
  </div>

  <div class="hiring-main-wrapper">

        <div class="hiring-thumbnail-wrapper">
          
                <div class="row">
                    @foreach($allvacancies as $job)
                    <div class="col-sm-4">
                    <div class="hiring-thumbnail">
                    <p class="job-thumbnail-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></p>
                    <div class="hiring-jdescription-wrapper">
                    <p class="hiring-label1">{{$job->position}}</p>
                    </div>
                    <hr>
                    <div class="hiring-sumamry-wrapper">
                    <p class="hiring-label2">{{$str = substr($job->JobDescription, 0, 130)}}...</p>
                    </div>
                    
                    <form action="{{ route('hiring.view') }}" method="get">
                      <button type="submit" class="hiring-view-job-btn">View</button>
                      <input type="hidden"  name="id"  value="{{$job->JDCode}}"> 
                    </form>
                 
                    </div>
                    </div>
                    @endforeach
                </div>

        </div>

  </div>

  

<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>

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