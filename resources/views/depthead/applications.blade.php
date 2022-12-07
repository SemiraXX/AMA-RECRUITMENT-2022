<!DOCTYPE html>
<html lang="en">
<head>
<title>AMA - Departmen Head Dashboard</title>
  <link href="/css/applicant.css" rel="stylesheet">
  <link href="/css/hr.css" rel="stylesheet">
  <link href="/css/hrapplicants.css" rel="stylesheet">
  <link href="/css/resigned.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  @include('design.style')
</head>
<body style="background-color:#EFEFEF">

  <div class="hrwrapper1">
    

        <div class="row">

                <div class="dashboard-left-side">
                  <img src="/assets/ama-br-logo.png" class="bar-logo">

                  @include('depthead.leftmenu')
                  
                </div>


                <div class="dashboard-right-side">
                    
                  @include('depthead.applications.list')
                   
                </div>
        

        </div><!-- end of row div -->

  </div>

@include('animated.popups')

<script src="/script/resigned.js"></script>
<script src="/script/hr.js"></script>

</body>
</html>
