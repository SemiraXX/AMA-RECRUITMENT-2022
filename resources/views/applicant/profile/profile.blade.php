<!DOCTYPE html>
<html lang="en">
<head>
<title>AMA</title>
  <link href="/css/profile.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
  <link href="/css/mobile.css" rel="stylesheet">
  <link href="/css/mobileprofile.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  @include('design.style')
  <!--for pdf
  <link href="css/smoothness/jquery-ui-1.9.0.custom.css" rel="stylesheet">
  <script language="javascript" type="text/javascript" src="jquery-1.8.2.js"></script>
  <script src="js/jquery-ui-1.9.0.custom.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>-->
  <!--for pdf-->
</head>
<body style="background-color:#EFEFEF;  overflow-x: hidden !important;">

  
  @include('applicant.header')

  <div class="profilemainwrapper">
    

        <div class="profile-content-wrapper">
          <div class="row">

            <div class="col-sm-1">
              <div class="profile-pic-wrapper">
              <p class="profile-pic"><i class="fa fa-user" aria-hidden="true"></i></p>
              </div>
            </div>
            <div class="col-sm-5">
              <div class="profile-top-content-wrapper">
              <p class="profile-top-name">{{$applicants->fname}} {{$applicants->lname}}</p>
              <p class="profile-top-sub-names">{{$applicants->complete_address}} | {{$applicants->city}}</p>
              @if($applicants->isverified == 0)
              <p class="profile-verify-info">NOT VERIFIED</p>
              @else
              <p class="profile-verify-info">ACCOUNT VERIFIED</p>
              @endif
              <p class="profile-top-sub-names">Last Login: {{$applicants->last_login}}</p>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="profile-top-content-wrapper">
                <p class="profile-contact-info"> 
                {{$applicants->email}} <i class="fa fa-envelope" aria-hidden="true"></i> 
                </p>
                <p class="profile-contact-info"> 
                {{$applicants->contact_number}} <i class="fa fa-phone-square" aria-hidden="true"></i>
                </p> 
                <a href="/applicant/edit/profile">
                  <button type="button" class="edit-profile-btn" >Edit Profile</button>
                </a>
              </div>
            </div>

          </div>
        </div>


        
        <div class="row">
          

          <!-- PERSONAL DETAILS-->
          <div class="col-sm-4">

              <div class="profile-sub-details-wrapper">
    

              <p class="profile-top-name">Personal Information <a href="/applicant/edit/profile"class="editlink">Edit</a><p>
              <p class="profile-top-sub-names">Gender: {{$applicants->gender}}</p>
              <p class="profile-top-sub-names">Birthdate: {{$applicants->birthdate}}</p>
              <p class="profile-top-sub-names">Birth Place: {{$applicants->birthplace}}</p>
              <p class="profile-top-sub-names">Civil Status: {{$applicants->civilstatus}}</p>
              <p class="profile-top-sub-names">Citizenship: {{$applicants->citizenship}}</p>
              <p class="profile-top-sub-names">Religion: {{$applicants->religion}}</p>
              <p class="profile-top-sub-names">Mother: {{$applicants->mother_name}}</p>
              <p class="profile-top-sub-names">Father: {{$applicants->father_name}}</p>
              <p class="profile-top-sub-names">No. of siblings: {{$applicants->no_of_siblings}}</p>
              <p class="profile-top-sub-names">Spouse: {{$applicants->spouse}}</p>
              <p class="profile-top-sub-names">Drivers License: {{$applicants->drivers_license}}</p>
              <p class="profile-top-sub-names">Restriction: {{$applicants->restriction}}</p>
              <br>
              <p class="profile-top-name">Other Details<p>
              <p class="profile-top-sub-names">SSS: {{$applicants->sss}}</p>
              <p class="profile-top-sub-names">TIN: {{$applicants->tin}}</p>
              <p class="profile-top-sub-names">PhilHealth: {{$applicants->philhealth}}</p>
              <p class="profile-top-sub-names">Pag-ibig fund: {{$applicants->pagibig}}</p>
              <p class="profile-top-sub-names">Last Login: {{$applicants->last_login}}</p>
              <br>
              <p class="profile-top-name">My Resume<p>
                <div class="resume-border-wrapper">
                    @if($resume)
                      <a href="#" onclick="resumeview()">
                      <div class="input-group resume-border">
                      <h1 class="my-resume-icon"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></h1>
                      <p class="my-resume-text">{{$resume->file}}</p>
                      </div>
                      </a>
                    @else
                      <a href="#" data-target="#resume" data-toggle="modal">
                        <p class="my-resume-text">Upload</p>
                      </a>
                    @endif
                </div>
                <br>
              </div>
          </div>


           <!-- OTHER DETAILS-->
           <div class="col-sm-8">
            

              <div class="profile-sub-details-wrapper-2">
              <!--EDUCATION -->
              <p class="profile-top-name">Educational Attainment <a href="/applicant/edit/profile#education"class="editlink">Edit</a><p>

              
              @if(!$educations->isEmpty())
                  

                  <div class="row">
                    @foreach($educations as $education)
                    <div class="col-sm-6">
                      <div class="profile-cred-container">
                          <p class="profile-cred-details-title">{{$education->educational_level}}</p>
                          <p class="profile-cred-details"><strong>{{$education->date_attended}}</strong></p>
                          <p class="profile-top-sub-names">{{$education->address}}</p>
                          <p class="profile-top-sub-names">{{$education->name_of_institution}}</p>
                          <p class="profile-top-sub-names">{{$education->degree}}</p>
                      </div>
                    </div>
                    @endforeach
                  </div>


                  
                 
              @else

              <h2 class="no_data_found">No data found</h2>
    
              @endif
             
                


                <br>


                <!--FAMILY -->
                <p class="profile-top-name">Family Background <a href="/applicant/edit/profile#family"class="editlink">Edit</a><p>
                <div class="table-wrapper">
                @if(!$families->isEmpty())
                  <table class="table table-bordered">
                 
                      <tr>
                        <th>Name</th>
                        <th>Relationship</th>
                        <th>Family Birthday</th>
                        <th>Occupation</th>
                        <th>Address</th>
                        <th>Contact</th>
                      </tr>
                   
                   
                        @foreach($families as $family)
                        <tr>
                          <td>{{$family->name}}</td>
                          <td>{{$family->relationship}}</td>
                          <td>{{$family->birthday}}</td>
                          <td>{{$family->occupation}}</td>
                          <td>{{$family->address}}</td>
                          <td>{{$family->contact_number}}</td>
                        </tr>
                        @endforeach
                    
                  </table>
                @else
                <h2 class="no_data_found">No data found</h2>
                @endif
              </div>


                <br>


                <!--FAMILY -->
                <p class="profile-top-name">Employment History<p>
                <div class="table-wrapper">
                @if(!$employment->isEmpty())
                <table class="table table-bordered">
                      <tr>
                        <th>Employer</th>
                        <th>Job Title</th>
                        <th>Address</th>
                        <th>Date Employed</th>
                        <th>Contact</th>
                        <th>Start Rate</th>
                        <th>End Rate</th>
                        <th>Separation Reason</th>
                      </tr>
                      @foreach($employment as $employ)
                      <tr>
                        <td>{{$employ->employer}}</td>
                        <td>{{$employ->job_title}}</td>
                        <td>{{$employ->address}}</td>
                        <td>{{$employ->date_employed}}</td>
                        <td>{{$employ->contact_number}}</td>
                        <td>{{$employ->starting_pay_rate}}</td>
                        <td>{{$employ->ending_pay_rate}}</td>
                        <td>{{$employ->separation_reason}}</td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
                @else
                <h2 class="no_data_found">No data found</h2>
                @endif
              </div>
              
         
         
              <br><br>
              <p class="profile-top-name">Other Attachements<p>

           
                <div class="input-group">
                @if(!$requirements->isEmpty())
                  @foreach($requirements as $file)
                  <a href="/files/requirements/{{$file->file_url}}" target="_blank" style="text-decoration:none">
                  <p class="file-p-text"><span class="span-profile-files"><i class="fa fa-file-o" aria-hidden="true"></i></span>
                  <br><span>{{$file->file_url}}</span></p></a>
                  @endforeach
                @else
    
                @endif
                <a href="#" class="viewattachementsmodal" style="text-decoration:none">
                <p class="file-p-text"><span class="span-profile-files">View All</p></a>
                </div>
                
              </div>
              <!-- DOCUMENTS -->



          </div>

        </div>


  </div>


@include('animated.popups')





<script src="/script/profileform.js"></script>


  
<!--SUBMITTED REQUIRMENTS MODAL-->
<div class="modal fade" id="resume">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"  style="background-color:transparent;border:none;">
      <div class="modal-body">
          <div class="document-wrapper">
          <p class="document"><i class="fa fa-file-text-o" aria-hidden="true"></i></p>
          </div>
          <div class="requirments-instruction"  style="background-color:white">
              <div>
              <form action="{{ route('submit.resume')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type='file' id="upfile" name="name" onchange="readURL(this);" style="display:none" />

              @if($resume)
              <iframe id="blah" src="/files/resume/{{$resume->file}}" style="width:100%;height:100vh"></iframe>
              @else
              <iframe id="blah" src="http://www.africau.edu/images/default/sample.pdf" style="width:100%;height:100vh"></iframe>
              @endif
              <br><br>

              <button type="submit" class="resume-profile-btn" >Save</button>
              <button type="button" onclick="getFile()" class="resume-profile-btn" >Change file</button>
              <br><br>
              </form>
              </div>
            
          </div>
      </div>

    </div>
  </div>
</div>



<!--CREDENTIAL REQUIRMENTS MODAL-->
<div class="modal fade" id="uploadcredrequirments">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content"  style="background-color:transparent;border:none;">

      <div class="modal-body">
          <div class="document-wrapper">
          <p class="document"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></p>
          </div>
          <div class="all-documents-modal"  style="background-color:white">
          <p class="document-title">My Documents</p>
              <table class="table">
                <thead>
                  <tr>
                    <th>Requirements</th>
                    <th>Date Submitted</th>
                    <th>File</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
               
                @foreach($allrequirements as $docu)             
                  <tr>
                    <th>{{$docu->file_code}}</th>
                    <td>{{ $docu->date_submitted}}</td>
                    <td><strong><i class="fa fa-file-o" aria-hidden="true"></i> {{ $docu->file_url}}</strong></td>
                    <td style="text-align:center;color:#05D431"><a href="/files/requirements/{{$docu->file_url}}" target="_blank" style="text-decoration:none">View</a></td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              
              <br>
          </div>
      </div>

    </div>
  </div>
</div>

<script>
  $(document).on('click', '.viewattachementsmodal', function(){   
    $('#uploadcredrequirments').modal('show');  
  });
</script>

</body>
</html>
