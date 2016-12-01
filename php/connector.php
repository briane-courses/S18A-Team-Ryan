<?php
    session_start();

    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "facultyattendancetracker";

    try {
        $conn = new PDO("mysql:host=$server;dbname=$db", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected."; 
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>