<?php
$con = pg_connect("host=localhost dbname=mrurban user=postgres password=Riyanshi") or die("could not connect to NRuM Postgres database");


$id = $_GET['id'];   // state code

$result = pg_query($con,"SELECT distinct \"gp_code\", \"gp_name\" FROM public.cluster_master Where \"clucter_code\" = $id order by gp_name" )or die('could not execute query');

$tmp = array();
if (!$result) 
{
   
    $tmp[] = array("gp_code" => "0", "gp_name" => "All GP");
}
else {
        $tmp[] = array("gp_code" => "0", "gp_name" => "All GP");
        
        $row = pg_fetch_all($result);
        for($i=0;$i<sizeof($row );$i++)
        {
            $code = $row[$i]['gp_code'];
            $name = $row[$i]['gp_name'];

            $tmp[] = array("gp_code" => $code, "gp_name" => $name);
            
        }
}
// encoding array to json format
header('Content-Type: application/json');
echo json_encode($tmp);