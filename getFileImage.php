<?php
 $con = pg_connect("host=localhost dbname=mrurban user=postgres password=Riyanshi") or die("could not connect to NRuM Postgres database");

$code = $_GET['id'];   // file code
    pg_query('SET bytea_output = "escape";');
    $query = "SELECT image FROM approved_workitems WHERE workitem_id = $code";
    $res = pg_query($con, $query) or die (pg_last_error($con)); 
    //Image fetching and conversion and storing into the file.jpg
    $img = pg_fetch_result($res, 'image');
    $unes_image = pg_unescape_bytea($img);
    header('Content-Type: image/jpeg');
    echo ($unes_image);

// encoding array to json format
//
pg_close($con);

?>