

<p class="tab-title-text">Other Details</P>

    <br><br>
    <p class="e201-form-label">Cotact Information</p>
    
    <table class="table">
    <tr>
        <th style="width:5%">ID</th>
        <th style="width:20%">Detail</th>
        <th>Content</th>
    </tr>
    <tr>
        <td>1</td>
        <th>Contact No.</td>
        <td>{{$applicants->contact_no}}</td>
    </tr>
    <tr>
        <td>2</td>
        <th>Present Address</td>
        <td>{{$applicants->present_address}}</td>
    </tr>
    <tr>
        <td>3</td>
        <th>Province</td>
        <td>{{$applicants->province}}</td>
    </tr>
    <tr>
        <td>4</td>
        <th>City</td>
        <td>{{$applicants->province}}</td>
    </tr>
    </table>

    <br>
    
    <p class="e201-form-label">Government ID's</p>
    <table class="table">
    <tr>
        <th style="width:5%">ID</th>
        <th style="width:20%">Detail</th>
        <th>Content</th>
    </tr>
    <tr>
        <td>1</td>
        <th>sss</td>
        <td>{{$applicants->sss}}</td>
    </tr>
    <tr>
        <td>2</td>
        <th>tin</td>
        <td>{{$applicants->tin}}</td>
    </tr>
    <tr>
        <td>3</td>
        <th>philhealth</td>
        <td>{{$applicants->philhealth}}</td>
    </tr>
    <tr>
        <td>4</td>
        <th>pagibig</td>
        <td>{{$applicants->pagibig}}</td>
    </tr>
    </table>


    <br>
    <!--EDUCATION BG-->
    <p class="e201-form-label">Education Background</p>
    <table class="table">
    <tr>
        <th style="width:5%">ID</th>
        <th style="width:20%">Level</th>
        <th>Institution</th>
        <th>Address</th>
        <th>Degree</th>
        <th style="width:10%">Date Attended</th>
    </tr>
    @foreach($educations as $education)
    <tr>
        <td>1</td>
        <th>{{$education->educational_level}}</td>
        <td>{{$education->name_of_institution}}</td>
        <td>{{$education->address}}</td>
        <td>{{$education->degree}}</td>
        <td>{{$education->date_attended}}</td>
    </tr>
    @endforeach
    </table>

    <br>
    <!--EMPLOYMENT BG-->
    <p class="e201-form-label">Employment History</p>
    <table class="table">
    <tr>
        <th style="width:5%">ID</th>
        <th style="width:20%">Employer</th>
        <th>Positio</th>
        <th>Address</th>
        <th>Date Employed</th>
        <th>Separation Reason</th>
    </tr>
    @foreach($employment as $emph)
    <tr>
        <td>1</td>
        <th>{{$emph->employer}}</td>
        <td>{{$emph->job_title}}</td>
        <td>{{$emph->address}}</td>
        <td>{{$emph->date_employed}}</td>
        <td>{{$emph->separation_reason}}</td>
    </tr>
    @endforeach
    </table>