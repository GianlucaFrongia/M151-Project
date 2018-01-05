<?php

    include("./../session.php");
	include("./../../database/database.php");

    if($_POST['toDo'] == "addFav"){
        
        $planID = $_POST["planID"];
        
        $stmt = $mysqli->prepare("INSERT INTO `tb_userhasfavorite` (`user_id`, `plan_id`) VALUES (?, ?);");
        $stmt->bind_param("ii", $userid, $planID);
        $stmt->execute();
        
    }
    
    if($_POST['toDo'] == "deleteFav"){
        
        $planID = $_POST["planID"];
        
        $stmt = $mysqli->prepare("DELETE FROM `tb_userhasfavorite` WHERE user_id = ? AND plan_id = ?;");
        $stmt->bind_param("ii", $userid, $planID);
        $stmt->execute();
        
    }

?>