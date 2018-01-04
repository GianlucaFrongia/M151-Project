<?php
    
    if(!isset($_SESSION['user'])){
        session_start();
    }
    
    session_regenerate_id();
    
    if(isset($_SESSION['user']['username'])){
        $username = $_SESSION['user']['username'];
        $userid = $_SESSION['user']['id'];
    } else {
        header("Location: ./index.php");
        exit();
    }
    
?>