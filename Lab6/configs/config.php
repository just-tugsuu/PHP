<?php
// тогтмол хувьсагч нар 

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'IT301');
define('HOST', '127.0.0.1');

 /*  
    Өгөгдлийн сантай холбогдох ба холболт амжилтгүй бол алдааны мэдээллийг хэвлэж,
    програмаас гарна
   */
$mysql_db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
   
if (!$mysql_db) {
      die("Connection failed: " . $mysql_db->connect_error);
}

$redis = new Redis();
try {
      $redis->connect(HOST, 6379);
}
catch( Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
}




