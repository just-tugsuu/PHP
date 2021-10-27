<?php

function Redirect() {
     /*  
        SESSION-г шалгах ба хэрэглэгч нэвтрээгүй бол index.php руу шилжүүлнэ
     */
    if(!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== false) {
        header('location: ../index.php');
        exit;
    }
}

function logout() {
    /*  
        SESSION-г устгаж, index.php руу шилжүүлнэ.
     */
    session_destroy();
    header('location: ../index.php');
}

function InsertData($mysql, $user_description, $email) {
     /*  
        тусгай тэмдэгтүүдийг устгаж, хэрэглэгчийн сэтгэгдлийг comment хүснэгт рүү
        insert хийх болно.
     */
    $description = htmlspecialchars($mysql->real_escape_string(trim($user_description)));
    $sql = 'INSERT INTO comment VALUES (NULL, ?, NOW(), ? );';
    try{
    if($stmt = $mysql->prepare($sql)) {
        // SQL STATEMENT BINDING    
        $stmt->bind_param('ss', $description, $email); 
        $stmt->execute();
    }
} catch(Exception $e) {
    echo 'Something unexpected happen: ' . $e->getMessage(), "\n";
}
}

function fetchComments($mysql) {
    $sql = 'SELECT description, inserteddate FROM comment;';
    if($result = $mysql->query($sql)) {
        if($result->num_rows > 0) {
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
    /*  
        Өгөгдлийн сангаас хүснэгтийн утгуудыг унших ба
        хүснэгт хэвлэж харуулна 
    */
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
