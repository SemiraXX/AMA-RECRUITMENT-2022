

<p class="tab-title-text">Uploaded Documents</P>
<br>
    <!--requirements-->
    <p class="e201-form-label">Employment History</p>
    <table class="table">
    <tr>
        <th style="width:10%">file_code</th>
        <th style="width:20%">requirement_name</th>
        <th>file_url</th>
        <th>date_submitted</th>
        <th>View</th>
    </tr>
    @foreach($requirements as $requirement)
    <tr>
        <td>{{$requirement->file_code}}</td>
        <td>{{$requirement->requirement_name}}</td>
        <td>{{$requirement->file_url}}</td>
        <td>{{$requirement->date_submitted}}</td>
        <td><a href="/files/requirements/{{$requirement->file_url}}" target="_blank">View</a></td>
    </tr>
    @endforeach
    </table>