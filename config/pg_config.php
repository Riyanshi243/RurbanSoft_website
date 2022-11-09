<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    // Connects to your Database 
    //============= Variables for Database ===================
    $hostname = "localhost";
    $username = "postgres";
    $password = "Riyanshi";
    $database = "mrurban";
    //========================================================

    //Connection...
    $con = pg_connect("host=$hostname user=$username password=$password  dbname=$database") or die ("Could not connect to server\n");
?>