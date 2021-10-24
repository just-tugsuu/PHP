<?php

function Redirect() {
    if(!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== false) {
        header('location: ../index.php');
        exit;
    }
}