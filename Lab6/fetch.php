<?php

include './configs/config.php';

if(strlen(trim($_POST['searchItem'])) > 0){
   checkCache($redis, $mysql_db);
   $mysql_db->close();
}
else {
    echo 'empty';
}


function checkCache($redis, $mysql_db) {
    if($redis->exists(trim($_POST['searchItem']))){
        echo " <p> <b>Redis</b> -с уншив</p>";
        printTable($mysql_db, $redis, "redis");
    } 
    else {
        echo ' <p> <b>Mysql</b> -аас хүснэгтийн утгыг уншив</p>';
        printTable($mysql_db, $redis, "mysql");
    }
}

function fetchData($mysql_db, $redis) {
    $search_item = $mysql_db->real_escape_string(trim($_POST['searchItem']));
    $sql = "SELECT * FROM pet WHERE name LIKE CONCAT('%', '$search_item', '%');";
    $result = $mysql_db->query($sql);
    if($result->num_rows > 0) {
        $pets = array();
        while($row = $result->fetch_assoc()) {
            $pets[] =  $row;
            echo '<tr>';
            echo '<td>' .$row['name'] . '</td>';
            echo '<td>' .$row['owner'] . '</td>';
            echo '<td>' .$row['birth'] . '</td>';
            echo '<td>' .$row['gender'] . '</td>';
            echo '</tr>';
        }
        $redis->set($search_item, serialize($pets));
    }
}

function printTable($mysql, $redis, $source) {
    echo '<table class = "table table-sm">
    <thead>
                    <tr>
                        <th scope="col">Нэр</th>
                        <th scope="col">Эзэмшигч</th>
                        <th scope="col">Төрсөн өдөр</th>
                        <th scope="col">Хүйс</th>
                    </tr>
                </thead>';
    echo '<tbody>';
    if($source === "mysql"){
        fetchData($mysql, $redis);
    }
    else {
         $pets = unserialize($redis->get(trim($_POST['searchItem'])));
         fetchRedis($pets);
    }
    echo '</tbody>
         </table>';  
}

function fetchRedis($serialized){
    foreach($serialized as $serialized_objects => $row) {
        echo '<tr>';
        echo '<td>' .$row['name'] . '</td>';
        echo '<td>' .$row['owner'] . '</td>';
        echo '<td>' .$row['birth'] . '</td>';
        echo '<td>' .$row['gender'] . '</td>';
        echo '</tr>';
    }
}



