<?php
require '../config/pg_config.php';
$code = $_GET['id'];   // file code
    pg_query('SET bytea_output = "escape";');
    $query = "SELECT \"IMAGE\" FROM workitem WHERE \"ID\" = $code";
    $res = pg_query($con, $query) or die (pg_last_error($con)); 
    //Image fetching and conversion and storing into the file.jpg
    $img = pg_fetch_result($res, '"IMAGE"');
    $unes_image = pg_unescape_bytea($img);
    header('Content-Type: image/jpeg');
    echo ($unes_image);

// encoding array to json format
//
pg_close($con);
