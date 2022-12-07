<!DOCTYPE html>
<html lang="en">
<head>
<title>AMA</title>
  <link href="/css/applicant.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
  <link href="/css/application.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  @include('design.style')
</head>
<body style="background-color:#EFEFEF">

  @include('applicant.header')

  <div class="applicationswrapper">

        <div class="list-applicationswrapper2">

            <p class="appform-title1">Applications</p>

            <div class="input-group tab-wrapper">
                <a href="#"><button id="btnjob" type="button" class="application-tab-btn active-tab">My Jobs</button></a>
                <a href="#"><button id="btnjob" type="button" class="application-tab-btn">Saved Jobs</button></a>
                <a href="#"><button id="btnjob" type="button" class="application-tab-btn">Recently Viewed</button></a>
            </div>
            
            <div class="tab-content-view">        

                @foreach($applications as $application)
                <div class="row submittedapplicationswrapper">
                    <div class="col-sm-1">
                    <img src="/assets/ama-br-logo.png" class="application-logo">
                    </div>
                    <div class="col-sm-9">
                        <p class="position-title">{{$application->position_applying}}</p>
                        <p class="appplication-label1"><span class="status-label">{{$application->status}}</span>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>AMACC - Makati &nbsp;|&nbsp;
                        <i class="fa fa-clock-o" aria-hidden="true"></i> {{$application->date_applied}}</p>
                    </div>
                    <div class="col-sm-2">
                    <form action="{{ route('application.view') }}" method="get">
                        <button type="submit" class="updateapplicationbtn">Manage</button>
                        <input type="hidden"  name="id"  value="{{$application->id}}"> 
                    </form>
                    </div>
                </div>
                @endforeach

                

                            
            </div>

        </div>
  </div>

  @include('animated.popups')
  <script src="/script/application.js"></script>
</body>
</html>