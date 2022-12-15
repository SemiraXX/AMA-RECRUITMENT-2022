
<div class="hr-dashboard-main-content-wrapper">

    <!--MAIN HEADER MENU TAB-->
    @include('hr.resume.main')

    <div class="divresume">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Date Submitted</th>
        <th scope="col">Application ID</th>
        <th scope="col">File</th>
        <th scope="col">File Url</th>
        </tr>
    </thead>
    <tbody>
        @foreach($uploadedresume as $resume)
        <tr>
        <td scope="row">{{$resume->id}}</th>
        <td>{{$resume->date_submitted}}</td>
        <td>{{$resume->applicationID}}</td>
        <td>{{$resume->file_name}}</td>
        <td><i class="fa fa-file-text-o" aria-hidden="true"></i> <a class="viewresumelink" href="/files/resume/{{$resume->file_url}}" target="_blank">{{$resume->file_url}}</a></td>
        </tr>
        <tr>
        @endforeach
        
    </tbody>
    </table>
    </div>


</div>