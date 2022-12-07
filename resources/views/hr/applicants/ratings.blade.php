


<p class="star-rates">
        @if(($applicants->latin_awards_honors == "None") || ($applicants->latin_awards_honors == "none")  || ($applicants->latin_awards_honors == "N/A"))
        @else
        <i class="fa fa-star" aria-hidden="true"></i>
        @endif

        @if(($applicants->professional_license == "None") || ($applicants->professional_license == "none")  || ($applicants->professional_license == "N/A"))
        @else
        <i class="fa fa-star" aria-hidden="true"></i>
        @endif

        @if(($applicants->tesda_cerfitification == "None") || ($applicants->tesda_cerfitification == "none")  || ($applicants->tesda_cerfitification == "N/A"))
        @else
        <i class="fa fa-star" aria-hidden="true"></i>
        @endif

        @if(($applicants->driving_license_type == "None") || ($applicants->driving_license_type == "none")  || ($applicants->driving_license_type == "N/A"))
        @else
        <i class="fa fa-star" aria-hidden="true"></i>
        @endif



        @if($applicants->been_dismissed == "No")
        
        @else
        &nbsp; &nbsp; <i class="fa fa-flag" aria-hidden="true" style="color:red"></i>
        @endif


        @if($applicants->involved_in_criminal_case == "No")
        
        @else
        <i class="fa fa-flag" aria-hidden="true" style="color:red"></i>
        @endif
</p>