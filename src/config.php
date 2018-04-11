<?php
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'username');
define('DB_PASSWORD', 'password');
define('DB_DATABASE', 'databasename');


function DB() {
    $dbhost=DB_SERVER;
    $dbuser=DB_USERNAME;
    $dbpass=DB_PASSWORD;
    $dbname=DB_DATABASE;

    try {
        $dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $dbConnection->exec("set names utf8");
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    }
    catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }

}
?>