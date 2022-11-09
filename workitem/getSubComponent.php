<?php
require '../config/pg_config.php';
$id = $_GET['id'];   // component code

$result = pg_query($con,"SELECT distinct \"sub_component_id\", \"sub_component_name\" FROM public.component_master Where \"component_id\" = $id  order by sub_component_name" )or die('could not execute query');

$tmp = array();
if (!$result) 
{
   
    $tmp[] = array("sub_component_id" => "0", "sub_component_name" => "All Sub-Component");
}
else {
        $tmp[] = array("sub_component_id" => "0", "sub_component_name" => "All Sub-Component");
        
        $row = pg_fetch_all($result);
        for($i=0;$i<sizeof($row );$i++)
        {
            $code = $row[$i]['sub_component_id'];
            $name = $row[$i]['sub_component_name'];

            $tmp[] = array("sub_component_id" => $code, "sub_component_name" => $name);
            
        }
}
// encoding array to json format
header('Content-Type: application/json');
echo json_encode($tmp);