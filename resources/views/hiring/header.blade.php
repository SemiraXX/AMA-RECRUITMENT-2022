

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" ><img src="/assets/ama-br-logo.png" class="menu-logo"></a>

    <button class="navbar-toggler" type="button" onclick="openNav()">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="closethinav">
    <button class="navbar-toggler" type="button" onclick="closeNav()">
     <i class="fa fa-times" aria-hidden="true"></i>
    </button>
    </div>
    
    <div class="desktop">
     <form class="d-flex">
        <a href="/"><button id="btnjob" type="button" class="headermenubtn">Jobs</button></a>
        <a href="/Login"><button type="button" class="headermenubtn">Login</button></a>
        <a href="/Register"><button id="btnprofile" type="button" class="highlight">Register</button></a>
        <a href="#"><button id="btnprofile" type="button" class="headermenubtn">About</button></a>
        <a href="/Register"><button id="btnprofile" type="button" class="highlight">Employer</button></a>
      </form>
    </div>

  </div>
</nav>


<div id="mySidebar" class="sidebar" style="position: fixed;z-index: 1043453420px !important;">
  <br> <br>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">About</a>
  <a href="/">Jobs</a>
  <a href="/Login">Login</a>
  <a href="/Register">Register</a>
  <a href="#">About</a>
</div>


@include('animated.notif')
<link href="/css/notif.css" rel="stylesheet">

<script>
$(document).ready(function(){  
  $('.closethinav').hide();
});

if (window.location.pathname  == '/applicant/applications') {
  var element = document.getElementById("btnapplication");
  element.classList.add("active");
}else if(window.location.pathname  == '/applicant/dashboard') {
  var element = document.getElementById("btnprofile");
  element.classList.add("active");
}else if(window.location.pathname  == '/find/jobs') {
  var element = document.getElementById("btnjob");
  element.classList.add("active");
}else if (window.location.pathname  == '/applicant/apply/form') {
  var element = document.getElementById("btnapplication");
  element.classList.add("active");
}

function openNav() {
  document.body.style.overflow = "no";
  document.getElementById("mySidebar").style.width = "100%";
  document.getElementById("main").style.marginLeft = "250px";
  $('.closethinav').show();
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  $('.closethinav').hide();
}
</script>