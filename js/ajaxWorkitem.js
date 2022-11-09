/*
 * Ajax WorkItem Coding
 */

//district ajax coding 
            $(document).ready(function(){

                $("#sel_state").change(function(){
                    var code = $(this).val();
                   
                    //alert(code);
                    $.ajax({
                        url: 'workitem/getDistrict.php?id=',
                        type: 'get',
                        data: {id:code},
                        dataType: 'json',
                        success:function(response){

                            var len = response.length;
                            
                            //alert(response.length);
                            
                            $("#sel_district").empty();
                            for( var i = 0; i<len; i++){
                                var id = response[i]['district_code'];
                                var name = response[i]['district_name'];

                                $("#sel_district").append("<option value='"+id+"'>"+name+"</option>");
                      //          alert(i);        
                            }
                        }
                    });//end ajax
                    ShowStateSpecificBoundary(code);
                    //code for filter
                    showHideMarker(1);
                });

            });
            //cluster ajax code
            $(document).ready(function(){

                $("#sel_district").change(function(){
                    var code = $(this).val();

                    $.ajax({
                        url: 'workitem/getCluster.php?id=',
                        type: 'get',
                        data: {id:code},
                        dataType: 'json',
                        success:function(response){

                            var len = response.length;

                            $("#sel_cluster").empty();
                            for( var i = 0; i<len; i++){
                                var id = response[i]['clucter_code'];
                                var name = response[i]['cluster_name'];

                                $("#sel_cluster").append("<option value='"+id+"'>"+name+"</option>");

                            }
                        }
                    });
                    showHideMarker(2);
                });

            });
            
            //GP ajax coding
            $(document).ready(function(){

                $("#sel_cluster").change(function(){
                    var code = $(this).val();

                    $.ajax({
                        url: 'workitem/getGP.php?id=',
                        type: 'get',
                        data: {id:code},
                        dataType: 'json',
                        success:function(response){

                            var len = response.length;

                            $("#sel_gp").empty();
                            for( var i = 0; i<len; i++){
                                var id = response[i]['gp_code'];
                                var name = response[i]['gp_name'];

                                $("#sel_gp").append("<option value='"+id+"'>"+name+"</option>");

                            }
                        }
                    });
                    showHideMarker(3);
                });

            });
            
            //Component ajax coding
            $(document).ready(function(){

                $("#sel_gp").change(function(){
                    var code = $(this).val();

                    $.ajax({
                        url: 'workitem/getComponent.php',
                        type: 'get',
                        data: {id:code},
                        dataType: 'json',
                        success:function(response){

                            var len = response.length;

                            $("#sel_components").empty();
                            for( var i = 0; i<len; i++){
                                var id = response[i]['component_id'];
                                var name = response[i]['component_name'];

                                $("#sel_components").append("<option value='"+id+"'>"+name+"</option>");

                            }
                        }
                    });
                    showHideMarker(4);
                });

            });
            
            //Sub-Component ajax coding
            $(document).ready(function(){

                $("#sel_components").change(function(){
                    var code = $(this).val();

                    $.ajax({
                        url: 'workitem/getSubComponent.php?id=',
                        type: 'get',
                        data: {id:code},
                        dataType: 'json',
                        success:function(response){

                            var len = response.length;

                            $("#sel_subcomponents").empty();
                            for( var i = 0; i<len; i++){
                                var id = response[i]['sub_component_id'];
                                var name = response[i]['sub_component_name'];

                                $("#sel_subcomponents").append("<option value='"+id+"'>"+name+"</option>");

                            }
                        }
                    });
                    showHideMarker(5);
                });

            });
            
            //Phase ajax coding
            $(document).ready(function(){

                $("#sel_subcomponents").change(function(){
                    var code = $(this).val();

                    $.ajax({
                        url: 'workitem/getPhase.php',
                        type: 'get',
                        data: {id:code},
                        dataType: 'json',
                        success:function(response){

                            var len = response.length;

                            $("#sel_phase").empty();
                            for( var i = 0; i<len; i++){
                                var id = response[i]['phase_id'];
                                var name = response[i]['phase_name'];

                                $("#sel_phase").append("<option value='"+id+"'>"+name+"</option>");

                            }
                        }
                    });
                    showHideMarker(6);
                });

            });
            
            function showHideMarker(opt){
                try{
                    clearMarkers();
                    var alljsonData = JSON.parse($(allData).text());
                    var filtera;
                    switch(opt){
                    
                        case 1: // FOR State 
                            if($(sel_state).val()==0){
                                filtera = alljsonData;
                            }
                            else{
                                var state = $('#sel_state :selected').text();
                                filtera = $(alljsonData)
                                         .filter(function (i,n){
                                      return n.STATE===state;
                                });
                            }
                            
                            break;
                    case 2: //for district
                        if($(sel_district).val()==0){
                            var state = $('#sel_state :selected').text();
                            filtera = $(alljsonData).filter(function (i,n){
                                return n.STATE===state;
                            });
                        }
                        else{
                            var district = $('#sel_district :selected').text();
                            filtera = $(alljsonData).filter(function (i,n){
                                return n.DISTRICT===district;
                            });
                        }
                        break;
                    case 3: //for Cluster
                        if($(sel_cluster).val()==0){
                                var district = $('#sel_district :selected').text();
                                filtera = $(alljsonData).filter(function (i,n){
                                    return n.DISTRICT===district;
                                });
                            }
                            else{
                                var cluster = $('#sel_cluster :selected').text();
                                    filtera = $(alljsonData)
                                             .filter(function (i,n){
                                          return n.CLUSTER===cluster;
                                    });
                        }
                        break;
                    case 4: //for GP
                        if($(sel_gp).val()==0){
                            var cluster = $('#sel_cluster :selected').text();
                            filtera = $(alljsonData).filter(function (i,n){
                                return n.CLUSTER===cluster;
                            });
                        }
                        else{
                            var gp = $('#sel_gp :selected').text();
                            filtera = $(alljsonData).filter(function (i,n){
                                return n.GP===gp;
                            });
                        }
                        break;
                    case 5: // for Components
                        if($(sel_components).val()==0){
                            var gp = $('#sel_gp :selected').text();
                            filtera = $(alljsonData).filter(function (i,n){
                                return n.GP===gp;
                            });
                        }
                        else{
                            var component = $('#sel_components :selected').text();
                            filtera = $(alljsonData).filter(function (i,n){
                                return n.COMPONENT===component;
                            });
                        }
                        break;
                    case 6: //for SubComponents
                        if($(sel_subcomponents).val()==0){
                            var component = $('#sel_components :selected').text();
                            filtera = $(alljsonData).filter(function (i,n){
                                return n.COMPONENT===component;
                            });
                        }
                        else{
                            var subcomponent = $('#sel_subcomponents :selected').text();
                            filtera = $(alljsonData).filter(function (i,n){
                                return n.SUB_COMPONENT===subcomponent;
                            });
                        }
                        break;
                    case 7: //for Phase
                        if($(sel_phase).val()==0){
                            var subcomponent = $('#sel_subcomponents :selected').text();
                            filtera = $(alljsonData).filter(function (i,n){
                                return n.SUB_COMPONENT===subcomponent;
                            });
                        }
                        else{
                            var phase = $('#sel_phase :selected').text();
                            filtera = $(alljsonData).filter(function (i,n){
                                return n.PHASE===phase;
                            });
                        }
                        break;
                    default:
                        alert("Select State For Filter");
                    }
                    showWorkitemMarker(filtera);
                }
                    catch(err){
                        alert(err);}
                
            }