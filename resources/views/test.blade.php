

<form action="http://127.0.0.1:8000/depthead/authentication" method="get">
<input type="text"  name="_token" value="<?php echo uniqid();?>" required>
<input type="text"  name="department" value="TRES01" required>
<input type="text"  name="branch" value="AMACC52" required>
<input type="text"  name="userid" value="01043127" required>
<input type="text"  name="position" value="IT" required>
<button type="submit" class="">Submit</button>
</form>

<h1>FOR HR LOGIN</H1>
<form action="{{ route('hr.authlogin') }}" method="post">
          {{ csrf_field() }}
<input type="text"  name="username" value="01043127" required>
<input type="text"  name="password" value="@admindefault2022" required>
<button type="submit" class="">Submit</button>
</form>

<!--<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee Master</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Employee Master</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No.</th>
        <th>UserNo</th>
        <th>Name</th>
        <th>Branch</th>
        <th>DeptCode</th>
        <th>JDCode</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $all = DB::connection('sqlsrv3')
      ->table('EmpMaster')
      ->where('EmploymentStatus', 'ACTIVE')
      ->orderBy('LastName', 'DESC')
      ->get();

      $n = 0;
      
      ?>
      @foreach($all as $employee)
        @if( (empty($employee->InfoNo)) || (empty($employee->DeptCode)) ||
        (empty($employee->BranchCode)) || (empty($employee->JDCode))
        )
        <tr style="background-color:#D57171;color:white">
          <td><?php echo $n++; ?></td>
          <td>{{$employee->InfoNo}}</td>
          <td>{{$employee->LastName}}, {{$employee->FirstName}}</td>
          <td>{{$employee->BranchCode}}</td>
          <td>{{$employee->DeptCode}}</td>
          <td>{{$employee->JDCode}}</td>
        </tr>
        @else
        <tr>
          <td><?php echo $n++; ?></td>
          <td>{{$employee->InfoNo}}</td>
          <td>{{$employee->LastName}}, {{$employee->FirstName}}</td>
          <td>{{$employee->BranchCode}}</td>
          <td>{{$employee->DeptCode}}</td>
          <td>{{$employee->JDCode}}</td>
        </tr>
        @endif
      @endforeach
  
    </tbody>
  </table>
</div>

</body>
</html>
