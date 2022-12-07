        
        <div class="applicationforwrapper3">
          <div class="row">
              <div class="col-sm-8">
                <p class="appform-title2">1. Personal Information</p>
              </div>
              <div class="col-sm-4">
                <button type="submit" id="submitprofileform" class="applicantformbtn" >Save</button>
              </div>
          </div>
        </div>
  
        <div class="applicationforwrapper2">
            <!--PERSONAL INFO 1ST ROW-->
            <P class="form-note">complete the form, type "None" if not applicable</p>
            <div class="row applicantrowwrapper">
                <div class="col-sm-3">
                  <label class="form-label">First Name*</label>
                  <input type="text" name="fname" id="fname"  class="appform-input" value="{{$applicants->fname}}" required> 
                </div>
                <div class="col-sm-3">
                  <label class="form-label">Last Name*</label>
                  <input type="text" name="lname" id="lname" class="appform-input"  value="{{$applicants->lname}}" required> 
                </div>
                <div class="col-sm-2">
                  <label class="form-label">Middle*</label>
                  <input type="text" name="mname" id="mname" class="appform-input"  value="{{$applicants->mname}}" required> 
                </div>
                <div class="col-sm-1">
                  <label class="form-label">Suffix</label>
                  <input type="text" name="suffix" id="suffix" class="appform-input inputcheck"  value="{{$applicants->suffix}}"> 
                </div>
                <div class="col-sm-3">
                  <label class="form-label">Nickname</label>
                  <input type="text" name="nickname" id="nickname" class="appform-input inputcheck"  value="{{$applicants->nickname}}" required> 
                </div>
                <div class="col-sm-4">
                  <label class="form-label">Gender*</label>
                  <select name="gender" class="appform-input" required>
                      <option value="--Select--">Select</option>
                      @if($applicants->gender == "Male")
                      <option value="Male" selected>Male</option>
                      @else
                      <option value="Male">Male</option>
                      @endif
                      @if($applicants->gender == "Female")
                      <option value="Female" selected>Female</option>
                      @else
                      <option value="Female">Female</option>
                      @endif
                  </select>
                </div>
                <div class="col-sm-4">
                  <label class="form-label">Email*</label>
                  <input type="email" name="email" class="appform-input"  value="{{$applicants->email}}" readonly style="cursor:not-allowed">  
                </div>
                <div class="col-sm-4">
                  <label class="form-label">Contact Number*</label>
                  <div class="input-group">
                    <input type="text" style="width:20% !important;" class="appform-input" value="+63" disabled>  
                    <input type="text" name="contact_number" style="width:75% !important;margin-left:5px" class="appform-input" id="phone"  value="{{trim($applicants->contact_number,'+63')}}" placeholder="900 000 0000" required>  
                  </div>
                  
                </div>
            </div>
            <!--END OF PERSONAL INFO 1ST ROW-->


            <br>

            <!--PERSONAL INFO 2nd ROW-->
            <div class="row applicantrowwrapper">

                <div class="col-sm-2">
                  <label class="form-label">House/Lot No.</label>
                  <input type="text" name="house" class="appform-input"  placeholder="House/Lot No." value="24" required>  
                </div>
                <div class="col-sm-2">
                  <label class="form-label">Block No.</label>
                  <input type="text" name="blk" class="appform-input"  placeholder="Block No."  value="24" required>  
                </div>
                <div class="col-sm-2">
                  <label class="form-label">Street name</label>
                  <input type="text" name="street" class="appform-input"  placeholder="Street name"  value="24th st" required>  
                </div>
                <div class="col-sm-6">
                  <label class="form-label">Subdivision, Building, Unit, Flr etc</label>
                  <input type="text" name="unit" class="appform-input"  placeholder="Subdivision, Building, Unit, Flr etc"   value="Berlin" required>  
                </div>
               

                <div class="col-sm-4">
                  <label class="form-label">Province*</label>
                  <?php $stores = DB::table('tbl_Province')->orderBy('Province', 'ASC')->get();?>
                  <select name="province" class="province appform-input locationoption" required> 
                  <option value="id15" selected>{{$applicants->province}}</option>
                  @foreach($stores as $store)
                  <option value="id{{ $store->id }}">{{ $store->Province }}</option>
                  @endforeach
                  </select>
                </div>
                <div class="col-sm-4">
                  <label class="form-label">City/Town*</label>
                  <?php  $cities = DB::table('tbl_Cities')->orderBy('name', 'ASC')->get();?>
                  <select class="appform-input pro locationoption" name="city"  id="cities" required> 
                  @foreach($cities as $city)
                  <option value="{{ $city->name }} City">{{ $city->name }}</option>
                  @endforeach
                  </select>     
                </div>
                <div class="col-sm-4">
                  <label class="form-label">Brgy.*</label>
                  <input type="text" name="brgy" class="appform-input"  value="{{$applicants->brgy}}" required>  
                </div>
            </div>
            <!--END OF PERSONAL INFO 2nd ROW-->

         
            <br>


            <!--PERSONAL INFO 3rd ROW-->
            <div class="row applicantrowwrapper">
                <div class="col-sm-3">
                  <label class="form-label">Birth Date*</label>
                  <input type="date" name="birthdate" class="appform-input"  value="{{$applicants->birthdate}}" required>  
                </div>
                <div class="col-sm-3">
                  <label class="form-label">Birth Place</label>
                  <input type="text" name="birthplace" class="appform-input inputcheck"  value="{{$applicants->birthplace}}" required>  
                </div>
                <div class="col-sm-3">
                  <label class="form-label">Citizenship</label>
                  <select name="citizenship" class="appform-input" required>
                      <option class="selecteddata" value="{{$applicants->citizenship}}" selected> *{{$applicants->citizenship}}</option>
                      @foreach($citizenships as $citizenship)
                      <option value="{{ $citizenship->KeyDesc }}">{{ $citizenship->KeyDesc }}</option>
                      @endforeach
                  </select> 
                </div>
                <div class="col-sm-3">
                  <label class="form-label">Religion</label>
                  <select name="religion" class="appform-input" required>
                      <option class="selecteddata" value="{{$applicants->religion}}" selected> *{{$applicants->religion}}</option>
                      @foreach($religious as $religion)
                      <option value="{{ $religion->KeyDesc }}">{{ $religion->KeyDesc }}</option>
                      @endforeach
                  </select>
                </div>

                <div class="col-sm-2">
                  <label class="form-label">Civil Status*</label>  
                  <select name="civilstatus" class="appform-input" required>
                      <option class="selecteddata" value="{{$applicants->civilstatus}}" selected> *{{$applicants->civilstatus}}</option>
                      @foreach($civilstatuses as $civilstatus)
                      <option value="{{ $civilstatus->KeyDesc }}">{{ $civilstatus->KeyDesc }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="col-sm-3">
                  <label class="form-label">Mother Name*</label>
                  <input type="text" name="mother_name" class="appform-input"  value="{{$applicants->mother_name}}" required>  
                </div>
                <div class="col-sm-3">
                  <label class="form-label">Father Name</label>
                  <input type="text" name="father_name" class="appform-input inputcheck"  value="{{$applicants->father_name}}" required>  
                </div>
                <div class="col-sm-3">
                  <label class="form-label">Spouse</label>
                  <input type="text" name="spouse" class="appform-input inputcheck"  value="{{$applicants->spouse}}" required>  
                </div>
                <div class="col-sm-1">
                  <label class="form-label">Siblings</label>
                  <input type="number" name="no_of_siblings" class="appform-input inputcheck"  value="{{$applicants->no_of_siblings}}" required>  
                </div>
            </div>
            <!--END OF PERSONAL INFO 3rd ROW-->


            <br>


            <!--PERSONAL INFO 4TH ROW-->
            <div class="row applicantrowwrapper">
                <div class="col-sm-6">
                  <label class="form-label">Drivers License</label> 
                  <select name="drivers_license" class="appform-input" required>
                      <option value="--Select--">Select</option>
                      @if($applicants->drivers_license == "Professional")
                      <option value="Professional" selected>Professional</option>
                      @else
                      <option value="Professional">Professional</option>
                      @endif
                      @if($applicants->drivers_license == "Non-Professional")
                      <option value="Non-Professional" selected>Non-Professional</option>
                      @else
                      <option value="Non-Professional">Non-Professional</option>
                      @endif
                  </select>
                </div>
                <div class="col-sm-6">
                  <label class="form-label">Restrictions</label>
                  <input type="text" name="restriction" class="appform-input inputcheck"  value="{{$applicants->restriction}}" required>  
                </div>
            </div>
            <!--ENF OF PERSONAL INFO 4TH ROW-->

            <br>

            <!--PERSONAL INFO 4TH ROW-->
            <div class="row applicantrowwrapper">
                <div class="col-sm-6">
                  <label class="form-label">SSS</label>
                  <input type="text" name="sss" class="appform-input"  value="{{$applicants->sss}}" required>  
                </div>
                <div class="col-sm-6">
                  <label class="form-label">TIN</label>
                  <input type="text" name="tin" class="appform-input"  value="{{$applicants->tin}}" required>  
                </div>
                <div class="col-sm-6">
                  <label class="form-label">Philhealth</label>
                  <input type="text" name="philhealth" class="appform-input"  value="{{$applicants->philhealth}}" required>  
                </div>
                <div class="col-sm-6">
                  <label class="form-label">Pag-ibig Fund</label>
                  <input type="text" name="pagibig" class="appform-input"  value="{{$applicants->pagibig}}" required>  
                        </div>
                </div>
               
              
                <br><br>
            </div>
            <!--END OF PERSONAL INFO 4TH ROW-->

            @include('applicant.location')

