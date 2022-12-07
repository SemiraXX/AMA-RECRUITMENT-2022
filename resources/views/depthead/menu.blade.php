



    <div class="hrtabbtnwrapper">
    <div class="row">
        <div class="col-sm-8">
            <p class="hr-dashboard-title">Resigned Employee</p><br>
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
        <a href="/Dept/Head/Resigned"><button id="btnhrdashboard" type="button" class="manage-application-tab-btn">Resignations</button></a>
        <a href="/Dept/Head/MRF"><button id="btnshortlist" type="button" class="manage-application-tab-btn">Filed MRF</button></a>
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
}
</script>