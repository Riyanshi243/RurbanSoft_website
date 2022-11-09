<?php
require '../config/pg_config.php';
$id = $_GET['id'];   // component code

$result = pg_query($con,"SELECT distinct \"phase_id\", \"phase_name\" FROM public.phase order by phase_name" )or die('could not execute query');

$tmp = array();
if (!$result) 
{
   
    $tmp[] = array("phase_id" => "0", "phase_name" => "All Phase");
}
else {
        $tmp[] = array("phase_id" => "0", "phase_name" => "All Phase");
        
        $row = pg_fetch_all($result);
        for($i=0;$i<sizeof($row );$i++)
        {
            $code = $row[$i]['phase_id'];
            $name = $row[$i]['phase_name'];

            $tmp[] = array("phase_id" => $code, "phase_name" => $name);
            
        }
}
// encoding array to json format
header('Content-Type: application/json');
echo json_encode($tmp);