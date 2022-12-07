

<div class="applicationforwrapper3">
        <p class="appform-title2">2. Educational Background</p>
</div>


<div class="applicationforwrapper2">
        
        @foreach($educations as $education)
        <div class="applicantrowwrapper">
          <div class="row">
                  <div class="col-sm-4">
                    <label class="form-label">Education Level</label>
                    <select name="educational_level[]" class="appform-input" required>
                      <option value="{{$education->educational_level}}" selected>{{$education->educational_level}}</option>
                      <option value="High School">High School</option>
                      <option value="College Graduate">Bachelor/College Graduate</option>
                      <option value="Masters Graduate">Masters Graduate</option>
                      <option value="Masters Graduate">PhD Graduate</option>
                    </select>
                    
                  </div>
                  
                  <div class="col-sm-4">
                    <label class="form-label">Name of Institution</label>
                    <input type="text" name="name_of_institution[]" id="name_of_institution[]" class="appform-input"  value="{{$education->name_of_institution}}" placeholder="type here..." required> 
                  </div>
                  <div class="col-sm-4">
                    <label class="form-label">Degree Earned</label>
                    <input type="text" name="degree[]" id="degree[]" class="appform-input"  value="{{$education->degree}}" placeholder="type here..." required> 
                  </div>
                  <div class="col-sm-8">
                    <label class="form-label">Address</label>
                    <input type="text" name="address[]" id="address[]" class="appform-input"  value="{{$education->address}}" placeholder="type here..." required> 
                  </div>
                  <div class="col-sm-4">
                    <label class="form-label">Year Graduated</label>
                    <div class="input-group">
                      <input type="text"  onfocus="(this.type='date')" name="date_attended[]" id="date_attended[]" class="appform-input"  value="{{$education->date_attended}}" required> 
                    </div>
                  </div>
          </div>
            
                <a href="{{ route('educattainment.delete', ['id' => $education->id]) }}">
                  <button type="button" class="delete-append-div"><i class="fa fa-trash" aria-hidden="true"></i> remove</button>
                  <input type="hidden"  name="id"   value="{{$education->id}}"> 
                </a>
        </div><br>
        @endforeach
        

       <section id="educationalwrapperappend"></section>
       <button type="button" id="btn2">Add more</button>

</div>