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


function fetchComments($mysql) {
    $sql = 'SELECT commentid, description, inserteddate FROM comment;';
    if($result = $mysql->query($sql)) {
        if($result->num_rows > 0) {
            // fetch data;
        }
    }

}

function showComments() {
    echo '<h4>Сэтгэгдэл</h4>';
}
