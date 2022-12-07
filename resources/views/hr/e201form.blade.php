<!DOCTYPE html>
<html lang="en">
<head>
<title>AMA - HR Dashboard</title>
  <link href="/css/applicant.css" rel="stylesheet">
  <link href="/css/hr.css" rel="stylesheet">
  <link href="/css/hrapplicants.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
  <link href="/css/transfer.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  @include('design.style')
</head>
<body style="background-color:#EFEFEF">

  <div class="hrwrapper1">
    

        <div class="row">

                <div class="dashboard-left-side">
                    @include('hr.leftmenu')
                </div>

                <div class="dashboard-right-side">
                    
                  @include('hr.e201.transferform')
                   
                </div>
        

        </div><!-- end of row div -->

  </div>
  <div class="messagewrapper" id="evalposted"><div class="alert-box evaluation"><i class="fa fa-warning" aria-hidden="true"></i> Posted </div></div>
  
@include('animated.popups')

<script src="/script/e201.js"></script>

</body>
</html>
