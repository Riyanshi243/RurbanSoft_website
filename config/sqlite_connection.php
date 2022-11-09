<?php
   class MyDB extends SQLite3 {
      function __construct( $DBname) {
         $this->open($DBname);
      }
   }
   $db = new MyDB('RurbanDB.db');
   //$db = new MyDB('test123.db');
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo "rurban Opened database successfully\n";
   }
?>