<?php
require '../config/pg_config.php';
$id = $_GET['id'];   // component code

$result = pg_query($con,"SELECT distinct \"component_id\", \"component_name\" FROM public.component_master order by component_name" )or die('could not execute query');

$tmp = array();
if (!$result) 
{
   
    $tmp[] = array("component_id" => "0", "component_name" => "All Component");
}
else {
        $tmp[] = array("component_id" => "0", "component_name" => "All Component");
        
        $row = pg_fetch_all($result);
        for($i=0;$i<sizeof($row );$i++)
        {
            $code = $row[$i]['component_id'];
            $name = $row[$i]['component_name'];

            $tmp[] = array("component_id" => $code, "component_name" => $name);
            
        }
}
// encoding array to json format
header('Content-Type: application/json');
echo json_encode($tmp);