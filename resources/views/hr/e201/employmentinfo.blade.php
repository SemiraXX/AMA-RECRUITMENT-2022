

<p class="tab-title-text">Employment</P>
    <br><br>
    <div class="row">
        <div class="col-sm-12">
            <p class="e201-form-label">Branch:</p>
            <input type="text" name="Branchcode" class="not-allowed-e201-input" value="{{$applicants->branch_code}}"> 
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-12">
            <p class="e201-form-label">Department:</p>
            <input type="text" name="DeptCode" class="not-allowed-e201-input"  value="{{$applicants->department}}"> 
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-12">
            <p class="e201-form-label">Job Description:</p>
            <input type="text" name="" class="not-allowed-e201-input" value="{{$applicants->position_applying}}"  > 
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-12">
            <p class="e201-form-label">Title:</p>
            <input type="text" name="EmpTitle" class="e201-input" value="{{$applicants->position_applying}}"  > 
        </div>
    </div>  
    <br><br>
    <div class="row">
        <div class="col-sm-3">
            <p class="e201-form-label">Employee Status:</p>
            <input type="text" name="EmpStatus" class="not-allowed-e201-input" value="Fixed Term"  > 
        </div>
        <div class="col-sm-3">
            <p class="e201-form-label">Start Date:</p>
            <input type="date" name="EmpStartDate" class="e201-input" > 
        </div>

        <div class="col-sm-3">
            <p class="e201-form-label">Time Keeping:</p>
            <select name="TimeKeepingCode" class="e201-input" >
                <option selected>Select</option>
                @foreach($timekeeping as $time)
                <option value="{{$time->TKDescription}}">{{$time->TKDescription}}</option>
                @endforeach
            </select>
                    
        </div>

        <div class="col-sm-3">
            <p class="e201-form-label">Tax Shield Percentage:</p>
            <input type="text" name="TaxShieldPercentage" class="e201-input" value="0" > 
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-6">
            <p class="e201-form-label">Required Hours:</p>
            <input type="text" name="HrsRequired" class="e201-input" value="0"  > 
        </div>
        <div class="col-sm-6">
            <p class="e201-form-label">Required Hours Label:</p>
            <input type="text" name="" class="e201-input"value="---"  > 
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-4">
            <p class="e201-form-label">Basic Pay Scheme Type:</p>
            <select name="BasicPaySchemeType" class="e201-input" >
                <option value="Matrix">Matrix</option>
                <option value="Custom">Custom</option>
            </select>
        </div>
        <div class="col-sm-4">
            <p class="e201-form-label">Rank:</p>
            <select name="EmpRankCode" class="e201-input" >
                <option selected>Select</option>
                @foreach($ranks as $rank)
                <option value="{{$rank->KeyCode}}">{{$rank->KeyDesc}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-4">
            <p class="e201-form-label">Rank Level:</p>
            <input type="number" name="EmpRankLevel" class="e201-input" value="1" > 
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-4">
            <p class="e201-form-label">Matrix Group:</p>
            <select name="educational_level[]" class="e201-input" >
                <option selected>Select</option>
                @foreach($matrix as $mtrx)
                <option value="{{$mtrx->KeyCode}}">{{$mtrx->KeyDesc}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-4">
            <p class="e201-form-label">Sub Group:</p>
            <select name="educational_level[]" class="e201-input" >
            <option value="none">Select</option>
            @foreach($submatrix as $submtrx)
                <option value="{{$submtrx->KeyCode}}">{{$submtrx->KeyDesc}}</option>
            @endforeach
            </select>
        </div>
        <div class="col-sm-4">
            <p class="e201-form-label">Basic Rate Value:</p>
            <input type="number" name="" class="e201-input" value="1"  > 
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-4">
            <p class="e201-form-label">Basic Rate Label:</p>
            <select name="educational_level[]" class="e201-input" >
            <option value="none">Select</option>
            @foreach($PayType as $brl)
                <option value="{{$brl->KeyCode}}">{{$brl->KeyDesc}}</option>
            @endforeach
            </select>
        </div>
        <div class="col-sm-4">
            <p class="e201-form-label">Pay Currency:</p>
            <select name="" class="e201-input" >
            <option value="none">Select</option>
            @foreach($Currency as $crncy)
                <option value="{{$crncy->KeyCode}}">{{$crncy->KeyDesc}}</option>
            @endforeach
            </select>
        </div>
        <div class="col-sm-4">
            <p class="e201-form-label">Payout Mode:</p>
            <select name="" class="e201-input" >
            <option value="none">Select</option>
            @foreach($PayoutMode as $pytmode)
                <option value="{{$pytmode->KeyCode}}">{{$pytmode->KeyDesc}}</option>
            @endforeach
            </select> 
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-6">
            <p class="e201-form-label">Computation Type:</p>
            <select name="educational_level[]" class="e201-input" >
            <option value="none">Select</option>
            @foreach($CompType as $cmptyp)
                <option value="{{$cmptyp->KeyCode}}">{{$cmptyp->KeyDesc}}</option>
            @endforeach
            </select> 
        </div>
        <div class="col-sm-6">
            <p class="e201-form-label">CompBen Group:</p>
            <select name="educational_level[]" class="e201-input" >
            <option value="none">Select</option>
            @foreach($CompBenGrp as $cbg)
                <option value="{{$cbg->KeyCode}}">{{$cbg->KeyDesc}}</option>
            @endforeach
            </select> 
        </div>
    </div>
    <br><br>
  