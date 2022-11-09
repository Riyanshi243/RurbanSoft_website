/**
*Ajax Phase Coding
*/

//phase select
$(document).ready(function(){
    $("#sel_phase").change(function(){
        var id = $(this).val();
        //alert(id);
        //code for filter
        HideshowMarker(1);
    });
});
//Phase -- state select 
$(document).ready(function (){
   $("#sel_state_boundary").change(function (){
       var s_name = $(this).val();
        //alert(s_name);
        ShowStateSpecificBoundary(s_name);
   }); 
});
/*
$(document).ready(function(){
    $("#sel_state_boundary").change(function(){
 $.get("http://sampleserver1.arcgisonline.com/ArcGIS/rest/services/Demographics/ESRI_Census_USA/MapServer?f=json", function(response) {
        data = response;
   }).error(function(){
    alert("Sorry could not proceed");
    });
    alert(data);
 }); });  */
//Phase -- on state select district combo gets filled
/*$(document).ready(function(){
    $("#sel_state_boundary").change(function(){
        var s_name = $(this).val();
        alert(s_name);
        $.ajax({
            url: 'http://sampleserver1.arcgisonline.com/ArcGIS/rest/services/Demographics/ESRI_Census_USA/MapServer?f=json',
            type: 'get',
            //data: {id:s_name},
            dataType: 'json',
            success:function(response){

                var len = response.length;

                alert(response.length);                       
                $("#sel_district_boundaries").empty();
                for( var i = 0; i<len; i++){
                    //var id = response[i]['district_code'];
                    var name = response[i]['district'];
                    $("#sel_district_boundaries").append("<option value='"+name+"'>"+name+"</option>");
                    //alert(i);        
                }
            }
        });//end ajax
//        ShowDistrictComboBox(1);
    });
});
*/
//boundary select
$(document).ready(function(){
    $("#sel_boundary").change(function(){
        var id = $(this).val();
        //alert(typeof(id));
        //code for filter
        showBoundary(id);
    });
});

//Phase - Tribal and Non-Tribal selection and marker showing 
$(document).ready(function (){
    $('#sel_tribe').change(function (){
       var val = $(this).val();
       //alert(val);
       HideshowMarker(2);
    });
});

//function for showing the boundaries on the map 
function showBoundary(opt){
    try{
        switch (opt){
            case "1":
                loadStateGeoJSON();
                break;
            case "2":
                loadDistrictGeoJSON();
                break;
            default :
        }
    }
    catch (err){
        alert(err);
    }
}

//function for showing the markers on the map 
function HideshowMarker(opt){
    try{
        clearMarkers();
        var alljsonData = JSON.parse($(allData).text());
        var filtera;
        switch(opt){
            case 1: // FOR Phase
                if($(sel_phase).val()==0){
                  filtera = alljsonData;
                }
                else{
                    var phase = $('#sel_phase :selected').text();
                    filtera = $(alljsonData).filter(function (i,n){
                        return n.phase===phase;
                    });
                    //alert(phase);
                    //ShowStateSpecificBoundary(phase);
                }
                break;
            case 2: //FOR TRIBAL AND NON-TRIBAL
                /*if($(sel_tribe).val()==0){
                    var phase = $('#sel_phase :selected').text();
                    alert(phase);
                    filtera = $(alljsonData).filter(function (i,n){
                        return n.phase===phase;
                    });*/
                if($(sel_tribe).val()==0){
                  filtera = alljsonData;
                }
                else{
                    var tribal_nontribal = $('#sel_tribe :selected').val();
                    //alert(tribe);
                    filtera = $(alljsonData).filter(function (i,n){
                        return n.tribal_nontribal===tribal_nontribal;
                    });
                    //alert(tribe);
                }
                break;
            default:
                alert("Select Phase For Filter");
        }
        showPhaseMarker(filtera);
    }
    catch (err){
        alert(err);
    }
}

function ShowDistrictComboBox(opt){
    try{
        //clearMarkers();
        var alljsonData = JSON.parse($(allData).text());
        var filtera;
        //alert("show district combobox function called");
        // FOR District
        switch (opt){
            case 1:
                if($('#sel_district_boundary').val()==0){
                    filtera = alljsonData;
                  //  alert('if condition');
                }
                else{
                    var dist = $('#sel_district_boundary :selected').text();
                    filtera = $(alljsonData).filter(function (i,n){
                        return n.district===dist;
                    });
                    //alert('else condition');
                    //alert(dist);
                    
                }
                break;
            default :
                alert("Select district first");
        }
        //ShowDistrictSpecificBoundary(dist);
        //showPhaseMarker(filtera);
    }
    catch (err){
        alert(err);
    }
}