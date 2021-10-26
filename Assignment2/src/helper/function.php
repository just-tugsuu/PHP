<?php

function Redirect() {
    if(!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== false) {
        header('location: ../index.php');
        exit;
    }
}

function logout() {
    session_destroy();
    header('location: ../index.php');
}

function InsertData($mysql, $user_description, $email) {
    $description = htmlspecialchars($mysql->real_escape_string(trim($user_description)));
    $sql = 'INSERT INTO comment VALUES (NULL, ?, NOW(), ? );';
    try{
    if($stmt = $mysql->prepare($sql)) {
        $stmt->bind_param('ss', $description, $email);
       if($stmt->execute()) {
           // show user notifcation here ...
       }
       else {
           echo 'shit it\'s failed';
       }
       
    }
} catch(Exception $e) {
    echo 'Something unexpected happen: ' . $e->getMessage(), "\n";
}
}


function emptyTable() {
    echo'<div class = "comment-section">';
    echo '<table class = "table table-hover>" 
          <thead>
                 <tr>
                    <th colspan = "2"scope="col">Сэтгэгдэл</th>
                 </tr>
          </thead>
                 <tbody>';
    echo '</tbody>
         </table>'; 
    echo '</div>';
}

function fetchComments($mysql) {
    $sql = 'SELECT description, inserteddate FROM comment;';
    if($result = $mysql->query($sql)) {
        if($result->num_rows > 0) {
            // fetch data;
            while($row = $result->fetch_array()) {
                echo '<tr>';
                echo '<td>' .$row['description'] . '</td>';
                echo '<td>' .$row['inserteddate'] . '</td>';
                echo '</tr>';
            }
        }
        else {
         echo '';
        }
    }
    $result->free_result();
}

function showComments($mysql) {
    echo'<div class = "comment-section">';
    echo '<table class = "table table-hover>" 
          <thead>
                 <tr>
                    <th colspan = "2"scope="col">Сэтгэгдэл</th>
                 </tr>
          </thead>
                 <tbody>';
    fetchComments($mysql);
    echo '</tbody>
         </table>'; 
    echo '</div>';
}
