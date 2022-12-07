

<p class="tab-title-text">Personal Info</P>
    <br><br>
    <div class="row">
        <div class="col-sm-3">
            <p class="e201-form-label">Employee ID:</p>
            <input type="text" name="employee_id" class="not-allowed-e201-input" value="{{$applicants->id}}<?php echo rand(0, 999999); ?>{{$applicants->id}}"  readonly> 
        </div>
        <div class="col-sm-3">
            <p class="e201-form-label">Last Name:</p>
            <input type="text" name="" class="not-allowed-e201-input" value="{{$applicants->fname}}"  readonly> 
        </div>
        <div class="col-sm-3">
            <p class="e201-form-label">Fist Name:</p>
            <input type="text" name="" class="not-allowed-e201-input" value="{{$applicants->lname}}"  readonly> 
        </div>
        <div class="col-sm-3">
            <p class="e201-form-label">Middle Name:</p>
            <input type="text" name="" class="not-allowed-e201-input" value="{{$applicants->mname}}"  readonly> 
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-4">
            <p class="e201-form-label">Suffix:</p>
            <input type="text" name="" class="not-allowed-e201-input" value="{{$applicants->suffix}}"  readonly> 
        </div>
        <div class="col-sm-4">
            <p class="e201-form-label">Nickname:</p>
            <input type="text" name="" class="not-allowed-e201-input"" value="{{$applicants->nickname}}"  readonly> 
        </div>
        <div class="col-sm-4">
            <p class="e201-form-label">Gender:</p>
            <input type="text" name="" class="not-allowed-e201-input" value="{{$applicants->gender}}"  readonly> 
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-12">
            <p class="e201-form-label">Birth Place:</p>
            <input type="text" name="" class="not-allowed-e201-input"" value="{{$applicants->birth_place}}"  readonly> 
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-4">
            <p class="e201-form-label">Civil Status:</p>
            <input type="text" name="" class="not-allowed-e201-input" value="{{$applicants->civil_status}}"  readonly> 
        </div>
        <div class="col-sm-4">
            <p class="e201-form-label">Citizenship:</p>
            <input type="text" name="" class="not-allowed-e201-input" value="{{$applicants->citizenship}}"  readonly> 
        </div>
        <div class="col-sm-4">
            <p class="e201-form-label">Religion:</p>
            <input type="text" name="" class="not-allowed-e201-input" value="{{$applicants->religion}}"  readonly> 
        </div>
    </div>