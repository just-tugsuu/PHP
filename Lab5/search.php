<?php
require './config/config.php';
// B190920004 github repo: https://github.com/just-tugsuu/Winter-class/tree/Dev 

// code nii tailbar hiih gej baigaad amjsangue ee bagshaa uuchlaarai 
// daraagiin labuudaa tsagt ni hiigeed yvna aa 😭 😭 
if (isset($_REQUEST['name'])) {
    $search_item = $mysql_db->real_escape_string(trim($_REQUEST["name"]));
    $checkbox = $_REQUEST["checkbox"];
    switch($checkbox) {
        case 'petname':
            search($mysql_db, $search_item, 'name');
            break;
        case 'owner':
            search($mysql_db, $search_item, 'owner');
            break;
    }
    $mysql_db->close();
}

function search($mysql, $item, $search) {
    if(strlen($item) > 0) {
        $sql = "SELECT * FROM pet WHERE $search LIKE CONCAT('%', '$item', '%');";
        $result = $mysql->query($sql);
        if($search === 'name') {
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li class='list-group-item'>" .$row["name"] ."  " . $row["owner"] . "</li>";
                }
            }
            else {
                echo "I couldn't search anything ";
            }
        }
        else {
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li class='list-group-item'>" .$row["name"] ."  " . $row["owner"] . "</li>";
                }
            }
            else {
                echo "I couldn't search anything ";
            }
        }
    }
    else{
        echo ' ';
    }
}

?>
