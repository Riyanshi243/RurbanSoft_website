<!DOCTYPE html>
<html>
<head>
	<title>ViewWorkItemsPhaseWise</title>
	<link rel="stylesheet" type="text/css" href="CSS/PhaseWise.css">
</head>
<body>
<div class="box-area">
    <header>
        <div class="wrapper">
           <nav class="navbar">
               <img src="Images/rurban.png" />
               <h1 class="heading">RurbanSoft</h1>
               <div>
               		<ul>
                        <li> <h4><a href="homePage.php" >Home</a></h4></li>
						<li> <a href="homePage.php?logout='1'" >Logout</a></li>
            		</ul>
            	</div>
        	</nav>
        </div>
    </header>
</div> 
<section id="home">
    <div class="main">
    <div>
            <center><h5>WorkItem Progress Status</h5></center>
        </div>
            <?php
                require 'workItemPhaseConnection.php';
                $getData = new workItemPhaseConnection;
                $allData = $getData->getWorkItemDetails();
                $allData = json_encode($allData,TRUE);
                echo '<div id="allData">'.$allData.'</div>';
            ?>
        <br/>
        <div class="container">
        <div class="left" id="map"></div>
            <div class="right">
                <div id="workitemRight" style="background-color:orange; text-align: center; padding-top: 2px;padding-bottom: 2px;">
                    <b>Filter Workitem </b>
                </div>    
               <br/>
               <!--State-->
               <div id="filterWorkItem">
                   <table>
                       <tr>
                           <td><b>Select State : </b></td>
                           <td>    
                                <select id="sel_state">
                                    <option value="0">All State</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="CHANDIGARH">Chandigarh</option>
                                    <option value="DADRA AND NAGAR HAVELI">Dadra and Nagar Haveli</option>
                                    <option value="DAMAN AND DIU">Daman and Diu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir">Jammu & Kashmir</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="LAKSHADWEEP">Lakshadweep</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>    
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Orissa">Odisha</option>
                                    <option value="PONDICHERRY">Pondicherry</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="West Bengal">West Bengal</option>                                      
                                </select>
                            
                           </td>
                       </tr>
                       <br/>
                       <div class="clear"></div>
                       <tr><td style="visibility: hidden">foobar</td></tr>
                       <tr>
                            <td><b>Select District : </b></td> 
                                <!--District-->
                            <td><select id="sel_district"> </select></td>
                        </tr>
                        <div class="clear"></div>
                        <tr><td style="visibility: hidden">foobar</td></tr>
                        <tr>
                            <td><b>Select Cluster : </b></td>    <!--Cluster-->
                            <td><select id="sel_cluster"></select></td> 
                        </tr>
                        <div class="clear"></div>
                        <tr><td style="visibility: hidden">foobar</td></tr>
                        <tr>
                            <td><b>Select GP : </b></td>        <!--GP-->
                            <td><select id="sel_gp"> </select></td>
                        </tr>
                        <div class="clear"></div>
                        <tr><td style="visibility: hidden">foobar</td></tr>
                        <tr>
                            <td><b>Select <br/> Components : </b></td>        <!--Components-->
                            <td><select id="sel_components"> </select></td>
                        </tr>
                        <div class="clear"></div>
                        <tr><td style="visibility: hidden">foobar</td></tr>
                        <tr>
                            <td><b>Select Sub-Components : </b></td>        <!--SubComponents-->
                            <td><select id="sel_subcomponents"> </select></td>
                        </tr>
                        <div class="clear"></div>
                        <tr><td style="visibility: hidden">foobar</td></tr>
                        <tr>
                            <td><b>Select Phase : </b></td>    <!--Phase-->
                            <td><select id="sel_phase"> </select></td>
                        </tr>      
                        <div class="clear"></div>
                    </table>
                </div>
            </div>
            <div class="clear"></div>
        </div>

	</div>
</section>

<footer id="footer"> 
    <div class="bottom">
    <div>
        <img src="Images/digitalindialogo.png" width="300" height="100"/>
        <img src="Images/india-gov.png" width="200" height="100"/>
        <img src="Images/nic.in.png" width="400" height="100"/>
        <img src="Images/ministry-of-rural-development.jpg" width="300" height="100"/>
    </div>
    <center>
        <span class="credit">National Informatics Center | </span>
        <span class="far fa-copyright"></span><span> 2022 All rights reserved.</span>
    </center>
    </div>
</footer>

</body>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQPnyGMJj5BL8vlDs-lOGCfipyWXduLbI&callback=myMap"></script>
</html>

