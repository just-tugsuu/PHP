<?php
/* 
    Readme файл нэг сонирхоод үзээрэй багшаа ✨
    github repo: https://github.com/just-tugsuu/PHP/tree/main/Lab6 *
*/


include './configs/mysql.php';
include './configs/redis.php';

if(strlen(trim($_POST['searchItem'])) > 0){
   checkCache($redis, $mysql_db);
   $mysql_db->close();
}
else {
    echo 'Та хоосон утга оруулсан байна.';
}
/*  Хэрэглэгчийн оруулсан утга кэш дотор байвал кэшээс харуулна
    үгүй бол өгөгдлийн сантай холбогдож fetch хийсэн утгыг кэш дотор хадгалана. */

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

/*   
    Хүснэгт хэвлэх бөгөөд кэш дотор утга байгаа эсэхээс
    хамааруулж өгөгдлийг уншина. 
*/

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

//  Redis - ээс орж ирсэн массивийг давталт ашиглан гүйлгэн уншина.
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

// Өгөгдлийн сангаас утгыг хайх бөгөөд redis кэшд хадгална  

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
        /* 
           Өгөгдлийн сангаас гаргаж авсан утгуудыг pets array дотор хадгалах ба
           serialize буюу тэмдэгт мөрөн цуваа болгож кэш дотор хадгална. Ингэснээр
           өгөгдлийн бүтцийг алдахгүй байх давуу талтай 👍
        */
        $redis->set($search_item, serialize($pets));
    }
}




