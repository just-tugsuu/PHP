<?php
   // тогтмол хувьсагч нар 
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_NAME', 'IT301');

   /*  
    Өгөгдлийн сантай холбогдох ба холболт амжилтгүй бол алдааны мэдээллийг хэвлэж,
    програмаас гарна
   */
   $mysql_db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
   
   if (!$mysql_db) {
       die("Connection failed: " . $mysql_db->connect_error);
    }
