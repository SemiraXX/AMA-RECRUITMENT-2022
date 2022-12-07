

<div class="applicationforwrapper3">
        <p class="appform-title2">4. Employment History</p>
</div>


<div class="applicationforwrapper2">

      @if(!$employment->isEmpty())
        @foreach($employment as $employ)

              <div class="applicantrowwrapper">
                <div class="row">
                  <div class="col-sm-3">
                    <label class="form-label">Employerdwee</label>
                    <input type="text" name="company_employer[]" id="company_employer[]" class="appform-input"  value="{{$employ->employer}}" required> 
                  </div>
                  <div class="col-sm-3">
                    <label class="form-label">Job Title</label>
                    <input type="text" name="job_title[]" id="job_title[]" class="appform-input"  value="{{$employ->job_title}}" required> 
                  </div>
                  <div class="col-sm-4">
                    <label class="form-label">Address</label>
                    <input type="text"  name="company_address[]" id="company_address[]" class="appform-input"  value="{{$employ->address}}" required> 
                  </div>
                  <div class="col-sm-2">
                    <label class="form-label">Date Employed</label>
                    <input type="text" onfocus="(this.type='date')" name="date_employed[]" id="date_employed[]" class="appform-input"  value="{{$employ->date_employed}}" required> 
                  </div>
                  <div class="col-sm-3">
                    <label class="form-label">length_of_stay</label>
                    <input type="number" name="length_of_stay[]" id="length_of_stay[]" class="appform-input" value="{{$employ->length_of_stay}}" required> 
                  </div>
                  <div class="col-sm-3">
                    <label class="form-label">contact_number</label>
                    <input type="text" name="employer_contact_number[]" id="employer_contact_number[]" class="appform-input" value="{{$employ->contact_number}}" required> 
                  </div>
                  <div class="col-sm-3">
                    <label class="form-label">Starting Payrate</label>
                    <input type="number" name="starting_pay_rate[]" id="starting_pay_rate[]" class="appform-input"  value="{{$employ->starting_pay_rate}}" required> 
                  </div>
                  <div class="col-sm-3">
                    <label class="form-label">Ending Payrate</label>
                    <input type="number" name="ending_pay_rate[]" id="ending_pay_rate[]" class="appform-input"  value="{{$employ->ending_pay_rate}}" required> 
                  </div>
                  <div class="col-sm-12">
                    <label class="form-label">Separation Reason</label>
                    <input type="text" name="separation_reason[]" id="separation_reason[]" class="appform-input"  value="{{$employ->separation_reason}}" required> 
                  </div>
                </div>
            </div><br>
            @endforeach

      @else
    
      @endif

       <section id="employmentwrapperappend"></section>
       <button id="appendemployment">Add more</button>

</div>