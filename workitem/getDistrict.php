<?php
require '../config/pg_config.php';
$code = $_GET['id'];   // state name in code variable

$result = pg_query($con,"SELECT distinct \"district_code\", \"district_name\" FROM public.cluster_master Where \"state_name\" = '".$code."' order by district_name" )or die('could not execute query');

//$district_arr = array();
$tmp = array();
if (!$result) 
{
   
    $tmp[] = array("district_code" => "0", "district_name" => "All District");
}
else {
        
        $tmp[] = array("district_code" => "0", "district_name" => "All District");
        
        $row = pg_fetch_all($result);
        for($i=0;$i<sizeof($row );$i++)
        {
            $code = $row[$i]['district_code'];
            $name = $row[$i]['district_name'];

            $tmp[] = array("district_code" => $code, "district_name" => $name);
            
        }
}
// encoding array to json format
header('Content-Type: application/json');
echo json_encode($tmp);
pg_close($con);
