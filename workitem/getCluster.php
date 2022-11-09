<?php
$con = pg_connect("host=localhost dbname=mrurban user=postgres password=Riyanshi") or die("could not connect to NRuM Postgres database");


$id = $_GET['id'];   // state code

$result = pg_query($con,"SELECT distinct \"clucter_code\", \"cluster_name\" FROM cluster_master Where \"district_code\" = $id order by cluster_name" )or die('could not execute query');

$tmp = array();
if (!$result) 
{
   
    $tmp[] = array("clucter_code" => "0", "cluster_name" => "All CLuster");
}
else {
        $tmp[] = array("clucter_code" => "0", "cluster_name" => "All CLuster");
        
        $row = pg_fetch_all($result);
        for($i=0;$i<sizeof($row );$i++)
        {
            $code = $row[$i]['clucter_code'];
            $name = $row[$i]['cluster_name'];

            $tmp[] = array("clucter_code" => $code, "cluster_name" => $name);
            
        }
}
// encoding array to json format
header('Content-Type: application/json');
echo json_encode($tmp);