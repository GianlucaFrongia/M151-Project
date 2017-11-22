<?php

	date_default_timezone_set('Europe/Berlin');
    mysql_connect("localhost", "root", "") or die (mysql_error ());
    mysql_select_db("example") or die(mysql_error());

?>