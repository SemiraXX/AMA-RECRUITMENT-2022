<!DOCTYPE html>
<html lang="en">
<head>
<title>AMA</title>
  <link href="/css/applicant.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  @include('design.style')
</head>
<body style="background-color:#EFEFEF">

  
  @include('applicant.header')

  <div class="applicationforwrapper">
    

        <div class="row">

            <div class="col-sm-3">
              <div class="profile-left-wrapper">
                  <p class="appform-title1">Profile</p>
                  <br>
                  <a class="formlink" href="#personalinfo"  ><p class="steps-label1">
                  <span class="steps-circle-label"><i class="fa fa-check" aria-hidden="true"></i></span> 
                  Personal Information</p></a>
                  <br>
                  
                  @if($educations)
                  <a class="formlink" href="#education" ><p class="steps-label1">
                  <span class="steps-circle-label">
                  <i class="fa fa-check" aria-hidden="true"></i></span> Educational Background</p></a>
                  @else
                  <a class="formlink" href="#education" ><p class="disabled-steps-label1">
                  <span class="disabled-steps-circle-label">
                  <i class="fa fa-check" aria-hidden="true"></i></span> Educational Background</p></a>
                  @endif
                  <br>

                  
                  @if($families)
                  <a class="formlink" href="#family"><p class="steps-label1">
                  <span class="steps-circle-label">
                  <i class="fa fa-check" aria-hidden="true"></i></span> Family Background</p></a>
                  @else
                
                  <p class="disabled-steps-label1"><span class="disabled-steps-circle-label"><i class="fa fa-check" aria-hidden="true"></i></span> Family Background</p>
                  @endif
                  <br>
                  
                  @if(!$employment->isEmpty())
                  <a class="formlink" href="#employment">
                  <p class="steps-label1"><span class="steps-circle-label"><i class="fa fa-check" aria-hidden="true"></i></span> Employment History</p>
                  </a>
                  @else
                  <p class="disabled-steps-label1"><span class="disabled-steps-circle-label"><i class="fa fa-check" aria-hidden="true"></i></span> Employment History</p>
                  @endif
                  <br>


                  <p class="disabled-steps-label1"><span class="disabled-steps-circle-label"><i class="fa fa-check" aria-hidden="true"></i></span> Character Reference</p>
                  <br>
                  <a class="formlink" href="#personalinfo"  ><p class="steps-label1">
                  <span class="steps-circle-label"><i class="fa fa-arrow-up" aria-hidden="true"></i></span> 
                  Back to Top</p></a>
                </div>
            </div>



            <div class="col-sm-9">
                <form action="{{ route('profile.update') }}" method="post" name="profileform" id="profileform">
                {{ csrf_field() }}
                  <div class="personalinfo">
                  @include('applicant.profile.applicationpersonalinfo')
                  </div>
                  <div class="education" id="education">
                  @include('applicant.profile.applicationeducation')
                  </div>
                  <div class="family" id="family">
                  @include('applicant.profile.applicationfamily')
                  </div>
                  <div class="employment" id="employment">
                  @include('applicant.profile.applicationemployment')
                  </div>
                </form>
            </div>

        </div>

  </div>

  
@include('animated.popups')

<script src="/script/profileform.js"></script>

</body>
</html>
