<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "qlxe";

    // Create a new mysqli connection
    $connect = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    // Check the connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }
?>