<?php

    /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    $link = mysqli_connect("localhost", "root", "");

    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    try {
        $conn = new mysqli($servername, $username, $password);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Create database
        $sql = "CREATE DATABASE myDB";
        if ($conn->query($sql) === TRUE) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $conn->error;
        }

        // Create table
        $sql = "CREATE TABLE Users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL,
            password VARCHAR(30) NOT NULL,
        )";
    } catch (Exception $exception) {
        echo $exception;
}

    $conn->close();
