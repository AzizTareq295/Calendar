<?php
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "calender_event";
$connect = mysql_connect("$db_host","$db_username","$db_password") or die("could not connect database");
mysql_select_db("$db_name") or die("no database found");
