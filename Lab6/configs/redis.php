<?php 

define('HOST', '127.0.0.1');

//  Redis сервертэй холбогдоно.
$redis = new Redis();
try {
      $redis->connect(HOST, 6379);
}
catch( Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
}