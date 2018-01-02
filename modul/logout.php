<?php

    include("session.php");
    session_unset();
    $_SESSION['user'] = "";
    session_destroy();
    echo "<script type='text/javascript'>window.location.replace('index.php');</script>";

?>