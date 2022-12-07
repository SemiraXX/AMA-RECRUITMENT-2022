

//hide other divs first
$(".employmentinfo").hide();
$(".otherdetails").hide();
$(".documents").hide();


function personalinfo(){
    $(".personalinfo").animate( { "opacity": "show", top:"100"} , 800 );
    $(".employmentinfo").hide();
    $(".otherdetails").hide();
    $(".documents").hide();
}

function employmentinfo(){
    $(".employmentinfo").animate( { "opacity": "show", top:"100"} , 800 );
    $(".personalinfo").hide();
    $(".otherdetails").hide();
    $(".documents").hide();
}

function otherdetails(){
    $(".otherdetails").animate( { "opacity": "show", top:"100"} , 800 );
    $(".personalinfo").hide();
    $(".employmentinfo").hide();
    $(".documents").hide();
}


function documents(){
    $(".documents").animate( { "opacity": "show", top:"100"} , 800 );
    $(".personalinfo").hide();
    $(".employmentinfo").hide();
    $(".otherdetails").hide();
}