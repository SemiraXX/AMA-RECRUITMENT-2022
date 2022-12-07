<!DOCTYPE html>
<html lang="en">
<head>
  <title>AMA</title>
  <link href="/css/applicant.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
  <link href="/css/login.css" rel="stylesheet">
  <link href="/css/mobilelogin.css" rel="stylesheet">
  <link href="/css/wave.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  @include('design.style')
</head>
<body>
<br><br><br>

  <div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
  </div>

  

<div class="main-login-form-wrapper">

        <p class="login-text-1">Not registered registered?  <a href="/Register"><button type="submit" class="login-formloginurl">Signup</button></a> | <a href="/"><button type="submit" class="login-formloginurl">Find jobs</button></a></p>
        <br><br><br><br><br>
          <p class="login-text-2">Login</p>
          <form action="{{ route('user.logging') }}" method="get">
          {{ csrf_field() }}
          <br>

          <label class="login-form-label">Email</label>
          <input type="email" name="email" class="login-form-input"  placeholder="type here..."> 
      
          <label class="login-form-label">Password</label>
          <input type="password" name="password" class="login-form-input"  placeholder="type here..."> 

          <br><br>
          <button type="submit" class="login-formsubmitbtn">Submit</button>
          <br><br><br><br><br><br>
          </form>
        
</div>

  

@include('animated.popups')
</body>
</html>
