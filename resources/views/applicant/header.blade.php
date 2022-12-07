
<!--
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="/assets/ama-br-logo.png" class="menu-logo"></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="topnav-centered">
      
    </div>

     <form class="d-flex">
     <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="/find/jobs"><button id="btnjob" type="button" class="headermenubtn">Find Jobs</button></a>
        </li>
        <li class="nav-item">
          <a href="/list/applications"><button id="btnapplication" type="button" class="headermenubtn">Applications</button></a>
        </li>
        <li class="nav-item">
          <a href="/applicant/profile"><button id="btnprofile" type="button" class="headermenubtn">Profile</button></a>
        </li>
        </li>
        <li class="nav-item">
          <a href="#"><button id="btnprofile" type="button" class="headermenubtn">Setting</button></a>
        </li>
        <li class="nav-item">
          <a href="#"><button type="button" class="headermenubtn">About</button></a>
        </li>
      </ul>
         <a href="/applicant/logout"><button id="btnprofile" type="button" class="headermenubtn">logout</button></a>
      </form>

  </div>
</nav>


<script>
if (window.location.pathname  == '/list/applications') {
  var element = document.getElementById("btnapplication");
  element.classList.add("active");
}else if(window.location.pathname  == '/applicant/profile') {
  var element = document.getElementById("btnprofile");
  element.classList.add("active");
}else if(window.location.pathname  == '/applicant/edit/profile') {
  var element = document.getElementById("btnprofile");
  element.classList.add("active");
}else if(window.location.pathname  == '/find/jobs') {
  var element = document.getElementById("btnjob");
  element.classList.add("active");
}else if (window.location.pathname  == '/applicant/apply/form') {
  var element = document.getElementById("btnapplication");
  element.classList.add("active");
}
</script>-->




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
     <a href="/find/jobs"><button id="btnjob" type="button" class="headermenubtn">Find Jobs</button></a>
     <a href="/list/applications"><button id="btnapplication" type="button" class="headermenubtn">Applications</button></a>
     <a href="/applicant/profile"><button id="btnprofile" type="button" class="headermenubtn">Profile</button></a>
     <a href="#"><button id="btnprofile" type="button" class="headermenubtn">Setting</button></a>
     <a href="/applicant/logout"><button id="btnprofile" type="button" class="headermenubtn">logout</button></a>
      </form>
    </div>

  </div>
</nav>


<div id="mySidebar" class="sidebar" style="position: fixed;z-index: 1043453420px !important;">
  <br> <br>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">About</a>
  <a href="/list/applications">Applications</a>
  <a href="/applicant/profile">Profile</a>
  <a href="/applicant/profile">Settings</a>
  <a href="/applicant/logout">Logout</a>
</div>

@include('animated.notif')
<link href="/css/notif.css" rel="stylesheet">

<script>
$(document).ready(function(){  
  $('.closethinav').hide();
});

if (window.location.pathname  == '/list/applications') {
  var element = document.getElementById("btnapplication");
  element.classList.add("active");
}else if(window.location.pathname  == '/applicant/profile') {
  var element = document.getElementById("btnprofile");
  element.classList.add("active");
}else if(window.location.pathname  == '/applicant/edit/profile') {
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