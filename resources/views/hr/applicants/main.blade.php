



    <div class="hrtabbtnwrapper">
    <div class="row">
        <div class="col-sm-8">
            <p class="hr-dashboard-title">Applications</p><br>
        </div>
        <div class="col-sm-4">
            <div class="input-group">
                <a href="#"><button id="btnjob" type="button" class="EXPORT-btn">Export</button></a>
                <input type="text" name="seachinput" id="seachinput" class="hr-search-input" placeholder="Search">
            </div>
        </div>
    </div>
    </div>

    <div class="hrtabbtnwrapper" style="border-bottom:solid 1px white; padding-bottom:15px">
        <a href="/HR/dashboard"><button id="btnhrdashboard" type="button" class="manage-application-tab-btn">All Applications</button></a>
        <a href="/HR/shortlisted"><button id="btnshortlist" type="button" class="manage-application-tab-btn">Short Listed</button></a>
        <a href="/HR/For-Evaluation"><button id="btnevaluation" type="button" class="manage-application-tab-btn"><i style="color:yellow" class="fa fa-star" aria-hidden="true"></i> Criteria Evaluation</button></a>
        <a href="/HR/processing"><button id="btnhrprocessing" type="button" class="manage-application-tab-btn">Processing</button></a>
        <a href="/HR/Onboarding"><button id="btnhron" type="button" class="manage-application-tab-btn">Onboarding</button></a>
    </div>
             
   
                      
<script>
if (window.location.pathname  == '/HR/dashboard') {
  var element = document.getElementById("btnhrdashboard");
  element.classList.add("active-application-tab-btn");
}else if(window.location.pathname  == '/HR/shortlisted') {
  var element = document.getElementById("btnshortlist");
  element.classList.add("active-application-tab-btn");
}else if(window.location.pathname  == '/HR/processing') {
  var element = document.getElementById("btnhrprocessing");
  element.classList.add("active-application-tab-btn");
}else if(window.location.pathname  == '/HR/For-Evaluation') {
  var element = document.getElementById("btnevaluation");
  element.classList.add("active-application-tab-btn");
}else if(window.location.pathname  == '/HR/Onboarding') {
  var element = document.getElementById("btnhron");
  element.classList.add("active-application-tab-btn");
}
</script>