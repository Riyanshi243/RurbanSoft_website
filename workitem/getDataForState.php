<?php


$code = $_GET['sid'];   // state code
 require 'pg_connection.php';
                $getData = new pg_connection;
                $allData = $getData->getAllDetails($code); //getAllDetails4state($code);
                
                $allData = json_encode($allData,TRUE);
                //echo '<div id="allData">'.$allData. '</div>';
                header('Content-Type: application/json');
                echo $allData;
?>