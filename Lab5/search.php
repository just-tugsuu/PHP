<?php
require './config/config.php';
if (isset($_REQUEST['name'])) {
    $search_item = $mysql_db->real_escape_string(trim($_REQUEST["name"]));
    if(strlen($search_item) > 0) {
        $result = $mysql_db->query("CALL searchPet('$search_item')");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo $row["name"] . " ";
                echo $row["owner"] . "<br>";
            }
        }
        else {
            echo 'Nou result found u know'; 
        }
    } else {
        echo ' ';
    } 
    $mysql_db->close();
}

// oroltiin utga hooson baih ym bol umnu ni echo hiisen yma tseverlene.. 
// herev checkbox bolon oroltiin utga baival uur punkts duudagdan ajilna..
?>
