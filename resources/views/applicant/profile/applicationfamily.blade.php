

<div class="applicationforwrapper3">
        <p class="appform-title2">3. Family Background</p>
</div>


<div class="applicationforwrapper2">

    @if(!$families->isEmpty())
        @foreach($families as $family)
            <div class="applicantrowwrapper">
                <div class="row">
                  <div class="col-sm-5">
                    <label class="form-label">Name</label>
                    <input type="text" name="name[]" id="name[]" class="appform-input" value="{{$family->name}}"  placeholder="type here..." required> 
                  </div>
                  <div class="col-sm-4">
                    <label class="form-label">Relationship</label>
                    <input type="text" name="relationship[]" id="relationship[]" class="appform-input"  value="{{$family->relationship}}" placeholder="type here..." required> 
                  </div>
                  <div class="col-sm-3">
                    <label class="form-label">Birthdate</label>
                    <input type="text" onfocus="(this.type='date')" name="familybirthday[]" id="familybirthday[]" class="appform-input"  value="{{$family->birthday}}" placeholder="type here..." required> 
                  </div>
                  <div class="col-sm-3">
                    <label class="form-label">Occupation</label>
                    <input type="text" name="occupation[]" id="occupation[]" class="appform-input"  value="{{$family->occupation}}" placeholder="type here..." required> 
                  </div>
                  <div class="col-sm-3">
                    <label class="form-label">Contact No.</label>
                    <input type="text" name="famcontact_number[]" id="famcontact_number[]" class="appform-input"  value="{{$family->contact_number}}" placeholder="type here..." required> 
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label">Address</label>
                    <div class="input-group">
                      <input type="text" name="famaddress[]" id="famaddress[]" class="appform-input"  value="{{$family->address}}" required> 
                    </div>
                  </div>
                </div>
                <a href="{{ route('family.delete', ['id' => $family->id]) }}">
                  <button type="button" class="delete-append-div"><i class="fa fa-trash" aria-hidden="true"></i> remove</button>
                  <input type="hidden"  name="id"   value="{{$family->id}}"> 
                </a>
            </div><br>
            @endforeach
    @else
    
    @endif

       <section id="familywrapperappend"></section>
       <button id="appendfamily">Add more</button>

</div>