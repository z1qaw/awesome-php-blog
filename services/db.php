<?php

require './config.php';

function OpenCon()
{
    global $config;

    $dbhost = $config["db_host"];
    $dbuser = $config["db_user"];
    $dbpass = $config["db_password"];
    $db = $config["db_name"];

    $dbh = new PDO("mysql:host=$dbhost;dbname=$db", $dbuser, $dbpass);

    return $dbh;
}

function CloseCon($conn)
{
    $conn -> close();
}

?>