<?php
require './config/config.php';
if (isset($_REQUEST['name'])) {
    $search_item = $mysql_db->real_escape_string(trim($_REQUEST["name"]));
    $result = $mysql_db->query("CALL searchPet('$search_item')");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row["name"] . " ";
            echo $row["owner"] . "<br>";
        }
    }   
    $mysql_db->close();
}
?>
