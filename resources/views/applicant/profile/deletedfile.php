                <!--<div class="col-sm-4">
                  <label class="form-label">Province*</label>
                  <?php //$stores = DB::table('tbl_Province')->orderBy('Province', 'ASC')->get();?>
                  <select name="province" class="province appform-input locationoption" required> 
                  <option value="id15" selected>{{$applicants->province}}</option>
                  @foreach($stores as $store)
                  <option value="id{{ $store->id }}">{{ $store->Province }}</option>
                  @endforeach
                  </select>
                </div>
                <div class="col-sm-4">
                  <label class="form-label">City/Town*</label>
                  <?php // $cities = DB::table('tbl_Cities')->orderBy('name', 'ASC')->get();?>
                  <select class="appform-input pro locationoption" name="city"  id="cities" required> 
                  @foreach($cities as $city)
                  <option value="{{ $city->name }} City">{{ $city->name }}</option>
                  @endforeach
                  </select>     
                </div>-->



                <!--<select name="citizenship" class="appform-input" required>
                      <option class="selecteddata" value="{{$applicants->citizenship}}" selected> *{{$applicants->citizenship}}</option>
                      @foreach($citizenships as $citizenship)
                      <option value="{{ $citizenship->KeyDesc }}">{{ $citizenship->KeyDesc }}</option>
                      @endforeach
                  </select> -->


                  <!--<select name="religion" class="appform-input" required>
                      <option class="selecteddata" value="{{$applicants->religion}}" selected> *{{$applicants->religion}}</option>
                      @foreach($religious as $religion)
                      <option value="{{ $religion->KeyDesc }}">{{ $religion->KeyDesc }}</option>
                      @endforeach
                  </select>-->



                   <!--<select name="civilstatus" class="appform-input" required>
                      <option class="selecteddata" value="{{$applicants->civilstatus}}" selected> *{{$applicants->civilstatus}}</option>
                      @foreach($civilstatuses as $civilstatus)
                      <option value="{{ $civilstatus->KeyDesc }}">{{ $civilstatus->KeyDesc }}</option>
                      @endforeach
                  </select>-->

                  @include('applicant.location')